<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->model('Koor_model');
        $this->load->model('Pa_model');
        $userdata = $this->session->userdata('user_data');
        if ($userdata['role'] != "admin") {
            if ($userdata['role'] == "mahasiswa") {
                redirect('Mahasiswa');
            } elseif ($userdata['role'] == "koor") {
                redirect('Koor');
            } elseif (!isset($userdata['role'])) {
                redirect('Auth');
            }
        }
    }
    public function index()
    {
        $data['judul'] = 'Dashboard Admin';
        $data['judul2'] = 'Dashboard';
        $data['mahasiswa'] = $this->Mahasiswa_model->jumlah();
        $data['koor'] = $this->Koor_model->jumlah();
        $data['pa'] = $this->Pa_model->jumlah();
        $this->load->view('layout/header', $data);
        $this->load->view('Admin/dashboard', $data);
        $this->load->view('layout/footer');
    }
    public function mahasiswa()
    {
        $data['judul'] = 'Dashboard Admin';
        $data['judul2'] = 'Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->get();
        $this->load->view('layout/header', $data);
        $this->load->view('Admin/mahasiswa', $data);
        $this->load->view('layout/footer');
    }
    public function cariMahasiswa()
    {
        $data['judul'] = 'Dashboard Admin';
        $data['judul2'] = 'Mahasiswa';
        $keyword = $this->input->post('keyword');
        $data['mahasiswa'] = $this->Mahasiswa_model->get_keyword($keyword);
        $this->load->view('layout/header', $data);
        $this->load->view('Admin/mahasiswa', $data);
        $this->load->view('layout/footer');
    }
    public function koor()
    {
        $data['judul'] = 'Dashboard Admin';
        $data['judul2'] = 'Koordinator PA';
        $data['koor'] = $this->Koor_model->get();
        $this->load->view('layout/header', $data);
        $this->load->view('Admin/koor', $data);
        $this->load->view('layout/footer');
    }
    public function cariKoor()
    {
        $data['judul'] = 'Dashboard Admin';
        $data['judul2'] = 'Koordinator PA';
        $keyword = $this->input->post('keyword');
        $data['koor'] = $this->Koor_model->get_keyword($keyword);
        $this->load->view('layout/header', $data);
        $this->load->view('Admin/koor', $data);
        $this->load->view('layout/footer');
    }
    public function pa()
    {
        $data['judul'] = 'Dashboard Admin';
        $data['judul2'] = 'Dokumen PA';
        $data['pa'] = $this->Pa_model->getSemua();
        $this->load->view('layout/header', $data);
        $this->load->view('Admin/pa', $data);
        $this->load->view('layout/footer');
    }
    public function cariPA()
    {
        $data['judul'] = 'Dashboard Admin';
        $data['judul2'] = 'Dokumen PA';
        $keyword = $this->input->post('keyword');
        $data['pa'] = $this->Pa_model->get_keyword($keyword);
        $this->load->view('layout/header', $data);
        $this->load->view('Admin/pa', $data);
        $this->load->view('layout/footer');
    }
    public function tambahMahasiswa()
    {
        $data['judul'] = 'Dashboard Admin';
        $data['judul2'] = 'Tambah Mahasiswa';
        $this->load->view('layout/header', $data);
        $this->load->view('Admin/tambahMahasiswa');
        $this->load->view('layout/footer');
    }
    public function tambahKoor()
    {
        $data['judul'] = 'Dashboard Admin';
        $data['judul2'] = 'Tambah Koordinator PA';
        $this->load->view('layout/header', $data);
        $this->load->view('Admin/tambahKoor');
        $this->load->view('layout/footer');
    }
    public function uploadMahasiswa()
    {
        $data = [
            'nim' => $this->input->post('nim'),
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'angkatan' => $this->input->post('angkatan'),
            'jurusan' => $this->input->post('jurusan'),
            'kelas' => $this->input->post('kelas')
        ];
        $this->Mahasiswa_model->insert($data);
        redirect('Admin/mahasiswa');
    }
    public function uploadKoor()
    {
        $data = [
            'nip' => $this->input->post('nip'),
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'angkatan_pa' => $this->input->post('angkatan_pa'),
        ];
        $this->Koor_model->insert($data);
        redirect('Admin/koor');
    }
    public function editMhs()
    {
        $data = [
            'nim' => $this->input->post('nim'),
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'kelas' => $this->input->post('kelas'),
            'angkatan' => $this->input->post('angkatan'),
            'jurusan' => $this->input->post('jurusan')
        ];
        $this->Mahasiswa_model->edit($data);
        redirect('Admin/mahasiswa');
    }
    public function editKoor()
    {
        $data = [
            'nip' => $this->input->post('nip'),
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'angkatan_pa' => $this->input->post('angkatan_pa')
        ];
        $this->Koor_model->edit($data);
        redirect('Admin/koor');
    }
    public function editPA()
    {
        $data = [
            'id_pa' => $this->input->post('id_pa'),
            'nim' => $this->input->post('nim'),
            'nip' => $this->input->post('nip'),
            'judul_pa' => $this->input->post('judul_pa'),
            'periode_pa' => $this->input->post('periode_pa'),
            'kbk' => $this->input->post('kbk'),
            'status' => $this->input->post('status')
        ];
        $this->Pa_model->edit($data);
        redirect('Admin/pa');
    }
}
