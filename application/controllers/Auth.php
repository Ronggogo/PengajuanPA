<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
	}
	public function index()
	{
		include_once APPPATH . "../vendor/autoload.php";
		$google_client = new Google_Client();
		$google_client->setClientId('122911335916-fqadrpu2a66nou3g5cmh93qu9gi2t6ft.apps.googleusercontent.com'); //masukkan ClientID anda 
		$google_client->setClientSecret('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'); //masukkan Client Secret Key anda
		$google_client->setRedirectUri('http://localhost/pepa/'); //Masukkan Redirect Uri anda
		$google_client->addScope('email');
		$google_client->addScope('profile');

		if (isset($_GET["code"])) {
			$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
			if (!isset($token["error"])) {
				// $google_client->setAccessToken($token['access_token']);
				$this->session->set_userdata('access_token', $token['access_token']);
				$google_service = new Google_Service_Oauth2($google_client);
				$data = $google_service->userinfo->get();
				$current_datetime = date('Y-m-d H:i:s');
				$haystack = $data['email'];
				$needle = 'mahasiswa';
				if (strpos($haystack, $needle) !== false) {
					$user = $this->Auth_model->getnimByEmail($data['email']);
					$id = $user['nim'];
					$role = "mahasiswa";
				} else {
					$user = $this->Auth_model->getnipByEmail($data['email']);
					$id = $user['nip'];
					$role = "koor";
				}
				$user_data = array(
					'first_name' => $data['given_name'],
					'last_name' => $data['family_name'],
					'email_address' => $data['email'],
					'profile_picture' => $data['picture'],
					'updated_at' => $current_datetime,
					'id' => $id,
					'role' => $role
				);
				$this->session->set_userdata('user_data', $user_data);
			}
		}
		$login_button = '';
		if (!$this->session->userdata('access_token')) {
			$login_button = '<a href="' . $google_client->createAuthUrl() . '">
			<img style = "border : 1px solid black; width : 350px; height : 50px;" src="https://1.bp.blogspot.com/-gvncBD5VwqU/YEnYxS5Ht7I/AAAAAAAAAXU/fsSRah1rL9s3MXM1xv8V471cVOsQRJQlQCLcBGAsYHQ/s320/google_logo.png" /></a>';
			$data['login_button'] = $login_button;
			$this->form_validation->set_rules('username', 'Username', 'trim|required', [
				'required' => 'id Wajid di isi'
			]);
			$this->form_validation->set_rules('password', 'Password', 'trim|required', [
				'required' => 'Password Wajib di isi'
			]);
			if ($this->form_validation->run() == false) {
				$this->load->view('layout/headerAuth');
				$this->load->view('Auth/login', $data);
				$this->load->view('layout/footerAuth');
			} else {
				$this->cek_login();
			}
		} else {
			// uncomentar kode dibawah untuk melihat data session email
			// echo json_encode($this->session->userdata('access_token'));
			// echo json_encode($this->session->userdata('user_data'));
			$login_button = '<a href="' . $google_client->createAuthUrl() . '"><img src="https://1.bp.blogspot.com/-gvncBD5VwqU/YEnYxS5Ht7I/AAAAAAAAAXU/fsSRah1rL9s3MXM1xv8V471cVOsQRJQlQCLcBGAsYHQ/s320/google_logo.png" /></a>';
			$data['login_button'] = $login_button;
			$this->form_validation->set_rules('username', 'Username', 'trim|required', [
				'required' => 'id Wajid di isi'
			]);
			$this->form_validation->set_rules('password', 'Password', 'trim|required', [
				'required' => 'Password Wajib di isi'
			]);
			if ($this->form_validation->run() == false) {
				$this->load->view('layout/headerAuth');
				$this->load->view('Auth/login', $data);
				$this->load->view('layout/footerAuth');
			} else {
				$this->cek_login();
			}
		}
	}

	public function cek_login()
	{
		$id = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$role = $this->input->post('role');
		switch ($role) {
			case 'mahasiswa':
				$user = $this->db->get_where('mahasiswa', ['nim' => $id])->row_array();
				break;
			case 'koor':
				$user = $this->db->get_where('koor_pa', ['nip' => $id])->row_array();
				break;
			case 'admin':
				$user = $this->db->get_where('admin', ['id_admin' => $id])->row_array();
				break;
			default:
				break;
		}
		if ($user) {
			if ($password == $user['password']) {
				switch ($role) {
					case 'mahasiswa':
						$data = [
							'id' => $user['nim'],
							'role' => $user['role']
						];
						break;
					case 'koor':
						$data = [
							'id' => $user['nip'],
							'role' => $user['role']
						];
						break;
					case 'admin':
						$data = [
							'id' => $user['id_admin'],
							'role' => $user['role']
						];
						break;
					default:
						break;
				}
				$this->session->set_userdata('user_data', $data);
				if ($user['role'] == 'admin') {
					redirect('Admin');
				} elseif ($user['role'] == 'koor') {
					redirect('Koor');
				} elseif ($user['role'] == 'mahasiswa') {
					redirect('Mahasiswa');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger " role="alert" style="color: white;"> Password Salah! </div>');
				redirect('auth?pilRole=' . $role);
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" style="color: white;"> Akun belum Terdaftar! </div>');
			redirect('auth?pilRole=' . $role);
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('access_token');
		$this->session->unset_userdata('user_data');
		redirect('Auth');
	}
}
