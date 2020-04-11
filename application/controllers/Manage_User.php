<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('loginFirst', 'Silahkan login terlebih dahulu!');
            return redirect('auth');
        } else if ($this->session->userdata('role_id') != 1) {
            return redirect('notfound');
            die;
        }

        $this->load->model('User_Model', 'user');
    }

    public function index()
    {
        echo 'ok';
    }
}
