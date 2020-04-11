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

    public function getAllUsers()
    {
        return $this->db->get('users')->result_array();
    }

    public function getUserRole($role_id)
    {
        return $this->db->get_where('user_role', ['id' => $role_id])->row_array();
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

    public function updatePasswordById($id, $password)
    {
        $this->db->set('password', $password);
        $this->db->where('id', $id);
        $this->db->update('users');
    }

    public function updateStatus($id)
    {
        $this->db->set('is_active', $this->input->post('is_active'));
        $this->db->where('id', $id);
        $this->db->update('users');
    }

    public function addNewUser($data)
    {
        $this->db->insert('users', $data);
    }

    public function deleteUser($id)
    {
        $this->db->where('author_id', $id);
        $this->db->set('author_id', 0);
        $this->db->update('artikel');

        $this->db->where('id', $id);
        $this->db->delete('users');
    }
}
