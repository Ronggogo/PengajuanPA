<?php 
defined('BASEPATH') or exit('No direct script access allowed');
class Auth_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getnimByEmail($email) {
        $this->db->where('mahasiswa.email', $email);
        $this->db->from('mahasiswa');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getnipByEmail($email) {
        $this->db->where('koor_pa.email', $email);
        $this->db->from('koor_pa');
        $query = $this->db->get();
        return $query->row_array();
    }
}

?>