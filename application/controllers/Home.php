<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Post_temp_Model', 'post_temp');
    }

    public function index()
    {
        $data['pageTitle'] = 'Blog Umrotix';
        $data['artikel_baru']  = $this->post_temp->getNewestArticle();
        $data['artikel_tengah'] = $this->post_temp->getMiddleArticle();
        $data['artikel_lama'] = $this->post_temp->getOldArticle();
        $data['artikel_bawah'] = $this->post_temp->getLowerArticle();

        // var_dump($data['artikel_lama']);
        // die;

        $this->load->view('templates/main/header', $data);
        $this->load->view('home/index');
        $this->load->view('templates/main/footer');
    }

    public function detail($slug)
    {
        $data['artikel'] = $this->post_temp->getArticleBySlug($slug);
        $data['artikel_related'] = $this->post_temp->getMiddleArticle();
        $data['artikel_popular'] = $this->post_temp->getPopularArticle();
        $data['pageTitle'] = $data['artikel']['nama_artikel'];

        $this->load->view('templates/main/header', $data);
        $this->load->view('home/detail');
        $this->load->view('templates/main/footer');
    }
}
