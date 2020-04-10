<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('loginFirst', 'Silahkan login terlebih dahulu!');
            redirect('auth');
        }

        $this->load->model('User_Model', 'user');
    }

    public function index()
    {
        $data['pageTitle'] = 'Dashboard Admin';
        $data['user'] = $this->user->getUserByEmail($this->session->userdata('email'));

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/index');
        $this->load->view('templates/admin/footer');
    }

    public function user_list()
    {
        echo 'ok';
    }
}
