<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pa_model extends CI_Model
{
    public $table = 'pa';
    public $id_pa = 'pa.id_pa';
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
    public function getById($id_pa)
    {
        $this->db->where($this->id_pa, $id_pa);
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($id_pa)
    {
        $this->db->where($this->id_pa, $id_pa);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    public function get_keyword($keyword)
    {
        $this->db->select('p.*,m.nama as mahasiswa,k.nama as koor');
        $this->db->from('pa p');
        $this->db->join('mahasiswa m', 'p.nim=m.nim');
        $this->db->join('koor_pa k', 'p.nip=k.nip');
        $this->db->like('id_pa', $keyword);
        $this->db->or_like('m.nama', $keyword);
        $this->db->or_like('k.nama', $keyword);
        $this->db->or_like('judul_pa', $keyword);
        $this->db->or_like('periode_pa', $keyword);
        $this->db->or_like('status', $keyword);
        $this->db->or_like('kbk', $keyword);
        return $this->db->get()->result_array();
    }
    public function edit($data)
    {
        $this->db->where($this->id_pa, $data['id_pa']);
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
    public function getByNim($nim)
    {
        $this->db->select('p.*,k.nama as koor');
        $this->db->from('pa p');
        $this->db->join('koor_pa k', 'p.nip=k.nip');
        $this->db->where('p.nim', $nim);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getByNip($nip)
    {
        $this->db->select('p.*,m.nama as mahasiswa');
        $this->db->from('pa p');
        $this->db->join('mahasiswa m', 'p.nim=m.nim');
        $this->db->where('p.nip', $nip);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getByStatus($nip)
    {
        $this->db->select('p.*,m.nama as mahasiswa');
        $this->db->from('pa p');
        $this->db->join('mahasiswa m', 'p.nim=m.nim');
        $this->db->where('p.nip', $nip);
        $this->db->where('p.status', 'proses');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getSemua()
    {
        $this->db->select('p.*,m.nama as mahasiswa,k.nama as koor');
        $this->db->from('pa p');
        $this->db->join('mahasiswa m', 'p.nim=m.nim');
        $this->db->join('koor_pa k', 'p.nip=k.nip');
        $query = $this->db->get();
        return $query->result_array();
    }
}
