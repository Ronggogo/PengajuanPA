<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Koor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $userdata = $this->session->userdata('user_data');
        if ($userdata['role'] != "koor") {
            if ($userdata['role'] == "admin") {
                redirect("Admin");
            } elseif ($userdata['role'] == "mahasiswa") {
                redirect("Mahasiswa");
            } elseif (!isset($userdata['role'])) {
                redirect("Auth");
            }
        }
        $this->load->model('Koor_model');
        $this->load->model('Pa_model');
    }
    public function index()
    {
        $data['judul'] = 'Koordinator';
        $data['judul2'] = 'Home';
        $userdata = $this->session->userdata('user_data');
        $data['koor'] = $this->Pa_model->getByStatus($userdata['id']);
        $this->load->view('layout/header3', $data);
        $this->load->view('Koor/home', $data);
        $this->load->view('layout/footer');
    }
    public function pa()
    {
        $data['judul'] = 'Koordinator';
        $data['judul2'] = 'Seluruh Data PA';
        $userdata = $this->session->userdata('user_data');
        $data['koor'] = $this->Pa_model->getByNip($userdata['id']);
        $this->load->view('Layout/header3', $data);
        $this->load->view('Koor/dataPA', $data);
        $this->load->view('Layout/footer');
    }
    public function profil()
    {
        $data['judul'] = 'Koordinator';
        $data['judul2'] = 'Profil';
        $userdata = $this->session->userdata('user_data');
        $data['koor'] = $this->Koor_model->getByNip($userdata['id']);
        $this->load->view('layout/header3', $data);
        $this->load->view('Koor/profil', $data);
        $this->load->view('layout/footer');
    }
    public function gantiPassword()
    {
        $userdata = $this->session->userdata('user_data');
        $koor = $this->Koor_model->getByNip($userdata['id']);
        $passlama = $this->input->post('passlama');
        if (md5($passlama) == $koor['password']) {
            $data = [
                "password" => md5($this->input->post('passbaru'))
            ];
            $this->Koor_model->gantiPassword($userdata['id'], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success bg-gradient-success"
            role="alert" style="color: white;">Berhasil Mengubah Password!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger bg-gradient-danger"
            role="alert" style="color: white;">password lama salah!</div>');
        }
        redirect('Koor/profil');
    }
    public function editStatus()
    {
        $data = [
            'id_pa' => $this->input->post('id_pa'),
            'status' => $this->input->post(strtolower('status'))
        ];
        $this->Pa_model->edit($data);
        redirect('Koor/pa');
    }
}
