<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Model extends CI_Model
{
    public function getUserByEmail($email)
    {
        return $this->db->get_where('users', ['email' => $email])->row_array();
    }

    public function getUserById($id)
    {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    public function getAllUser()
    {
        return $this->db->get('users')->result_array();
    }
}
