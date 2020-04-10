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
}
