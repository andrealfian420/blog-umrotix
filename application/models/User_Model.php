<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Model extends CI_Model
{
    public function getUserByEmail($email)
    {
        return $this->db->get_where('users', ['email' => $email])->row_array();
    }
}
