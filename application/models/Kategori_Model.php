<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_Model extends CI_Model
{
    public function insertKategori($data)
    {
        $this->db->insert('kategori', $data);
    }

    public function getKategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    public function getKategoriById($id)
    {
        return $this->db->get_where('kategori', ['id' => $id])->row_array();
    }

    public function hapusKategoriById($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kategori');
    }

    public function updateKategori($data)
    {
        $this->db->set('kategori', $data['kategori']);
        $this->db->set('slug', $data['slug']);
        $this->db->where('id', $data['id']);
        $this->db->update('kategori');
    }
}
