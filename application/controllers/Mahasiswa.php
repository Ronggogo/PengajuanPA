<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $userdata = $this->session->userdata('user_data');
        if ($userdata['role'] != "mahasiswa") {
            if ($userdata['role'] == "admin") {
                redirect("Admin");
            } elseif ($userdata['role'] == "koor") {
                redirect("Koor");
            } elseif (!isset($userdata['role'])) {
                redirect("Auth");
            }
        }
        $this->load->model('Pa_model');
        $this->load->model('Mahasiswa_model');
    }
    public function index()
    {
        $data['judul'] = 'Mahasiswa';
        $data['judul2'] = 'Home';
        $userdata = $this->session->userdata('user_data');
        $data['pa'] = $this->Pa_model->getByNim($userdata['id']);
        $this->load->view('Layout/header2', $data);
        $this->load->view('Mahasiswa/home');
        $this->load->view('Layout/footer');
    }
    public function pa()
    {
        $data['judul'] = 'Mahasiswa';
        $data['judul2'] = 'Input Data PA';
        $userdata = $this->session->userdata('user_data');
        $data['mhs'] = $this->Mahasiswa_model->getByNim($userdata['id']);
        $this->load->view('Layout/header2', $data);
        $this->load->view('Mahasiswa/inputPA');
        $this->load->view('Layout/footer');
    }
    public function profil()
    {
        $data['judul'] = 'Mahasiswa';
        $data['judul2'] = 'Profil';
        $userdata = $this->session->userdata('user_data');
        $data['mhs'] = $this->Mahasiswa_model->getByNim($userdata['id']);
        $this->load->view('layout/header2', $data);
        $this->load->view('Mahasiswa/profil');
        $this->load->view('layout/footer');
    }
    public function uploadpa()
    {
        $data = [
            "nim" => $this->input->post('nim'),
            "nip" => $this->input->post('nip'),
            "judul_pa" => $this->input->post('judul'),
            "periode_pa" => $this->input->post('periode_pa'),
            "kbk" => $this->input->post('kbk')
        ];
        $upload_pa = $_FILES['file_pa']['name'];
        if ($upload_pa) {
            $config['allowed_types'] = 'pdf|zip|rar';
            $config['max_size'] = '1000000';
            $config['upload_path'] = './upload/pa/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file_pa')) {
                $new_file = $this->upload->data('file_name');
                $this->db->set('file_pa', $new_file);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->Pa_model->insert($data, $upload_pa);
        $this->session->set_flashdata('message', '<div class="alert alert-success"
            role="alert" style="color: white;">PA Berhasil di Upload!</div>');
        redirect('Mahasiswa');
    }
    public function gantiPassword()
    {
        $userdata = $this->session->userdata('user_data');
        $mhs = $this->Mahasiswa_model->getByNim($userdata['id']);
        $passlama = $this->input->post('passlama');
        var_dump($mhs);
        var_dump($passlama);
        if (md5($passlama) == $mhs['password']) {
            $data = [
                "password" => md5($this->input->post('passbaru'))
            ];
            $this->Mahasiswa_model->gantiPassword($userdata['id'], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success bg-gradient-success"
            role="alert" style="color: white;">Berhasil Mengubah Password!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger bg-gradient-danger"
            role="alert" style="color: white;">password lama salah!</div>');
        }
        redirect('Mahasiswa/profil');
    }
}
