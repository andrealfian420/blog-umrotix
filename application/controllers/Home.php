<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['pageTitle'] = 'Blog Umrotix';

        $this->load->view('templates/main/header', $data);
        $this->load->view('home/index');
        $this->load->view('templates/main/footer');
    }
}
