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

    public function updateProfil()
    {
        $nama = $this->input->post('nama');

        $this->db->where('email', $this->input->post('email'));
        $this->db->set('nama', $nama);
        $this->db->update('users');
    }

    public function updatePhoto($image)
    {
        $this->db->set('image', $image);
        $this->db->where('email', $this->input->post('email'));
        $this->db->update('users');
    }

    public function updatePassword($password)
    {
        $this->db->set('password', $password);
        $this->db->where('email', $this->session->userdata('email'));
        $this->db->update('users');
    }
}
