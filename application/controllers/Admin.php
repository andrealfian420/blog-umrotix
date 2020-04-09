<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('loginFirst', 'Silahkan login terlebih dahulu!');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['pageTitle'] = 'Dashboard Admin';

        $this->load->view('templates/admin/header', $data);
        $this->load->view('admin/index');
        $this->load->view('templates/admin/footer');
    }
}
