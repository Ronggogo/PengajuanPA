<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mahasiswa_model extends CI_Model
{
    public $table = 'mahasiswa';
    public $nim = 'mahasiswa.nim';
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getByNim($nim)
    {
        $this->db->where($this->nim, $nim);
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($nim)
    {
        $this->db->where($this->nim, $nim);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function detail_data($id = null)
    {
        $query = $this->db->get_where('mahasiswa', array('id' => $id))->row();
        return $query;
    }
    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->like('nim', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('kelas', $keyword);
        $this->db->or_like('email', $keyword);
        $this->db->or_like('angkatan', $keyword);
        $this->db->or_like('jurusan', $keyword);
        return $this->db->get()->result_array();
    }
    public function edit($data)
    {
        $this->db->where($this->nim, $data['nim']);
        $this->db->update($this->table, $data);
        $result = $this->db->affected_rows();
        return $result;
    }
    public function jumlah()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        return $this->db->get()->num_rows();
    }
    public function gantiPassword($nim, $data)
    {
        $this->db->where($this->nim, $nim);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }
}
