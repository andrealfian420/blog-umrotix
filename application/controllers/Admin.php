<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $data['pageTitle'] = 'Login Admin';

        $this->load->view('templates/admin/header', $data);
        $this->load->view('admin/index');
        $this->load->view('templates/admin/footer');
    }
}
