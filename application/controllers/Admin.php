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
        $this->load->model('Artikel_Model', 'artikel');

        $data['pageTitle'] = 'Dashboard Admin';
        $data['user'] = $this->user->getUserByEmail($this->session->userdata('email'));

        $data['total_views'] = $this->artikel->countTotalViews($data['user']['id']);
        $data['total_posts'] = $this->artikel->countTotalPosts($data['user']['id']);

        // echo $data['total_views'];
        // die;

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
