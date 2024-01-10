<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Koor_model extends CI_Model
{
    public $table = 'koor_pa';
    public $nip = 'koor_pa.nip';
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
    public function getByNip($nip)
    {
        $this->db->where($this->nip, $nip);
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($nip)
    {
        $this->db->where($this->nip, $nip);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('koor_pa');
        $this->db->like('nip', $keyword);
        $this->db->or_like('email', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('angkatan_pa', $keyword);
        return $this->db->get()->result_array();
    }
    public function edit($data)
    {
        $this->db->where($this->nip, $data['nip']);
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
    public function gantiPassword($nip, $data)
    {
        $this->db->where($this->nip, $nip);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }
}
