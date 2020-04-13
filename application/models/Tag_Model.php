<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tag_Model extends CI_Model
{
    public function insertTag($data)
    {
        $this->db->insert('tag', $data);
    }

    public function getTag()
    {
        return $this->db->get('tag')->result_array();
    }

    public function getTagById($id)
    {
        return $this->db->get_where('tag', ['id' => $id])->row_array();
    }

    public function hapusTagById($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tag');
    }

    public function updateTag($data)
    {
        $this->db->set('tag', $data['tag']);
        $this->db->where('id', $data['id']);
        $this->db->update('tag');
    }
}
