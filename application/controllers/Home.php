<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Artikel_Model', 'artikel');
        $this->load->model('Kategori_Model', 'kategori');
    }

    public function index()
    {
        $data['pageTitle'] = 'Blog Umrotix';
        $data['artikel_baru']  = $this->artikel->getNewestArticle();
        $data['artikel_tengah'] = $this->artikel->getMiddleArticle();
        $data['artikel_lama'] = $this->artikel->getOldArticle();
        $data['artikel_bawah'] = $this->artikel->getLowerArticle();

        // var_dump($data['artikel_lama']);
        // die;

        $this->load->view('templates/main/header', $data);
        $this->load->view('home/index');
        $this->load->view('templates/main/footer');
    }

    public function detail($slug)
    {
        $data['artikel'] = $this->artikel->getArticleBySlug($slug);

        if (!$data['artikel']) {
            redirect(base_url());
        }


        $data['pageTitle'] = $data['artikel']['nama_artikel'];

        $artikel_id = $data['artikel']['id'];

        $data['artikel_terkait'] = $this->artikel->getRelatedArticle($artikel_id);
        $data['artikel_populer'] = $this->artikel->getPopularArticle();

        $this->artikel->addViewersNumber($artikel_id);

        $this->load->view('templates/main/header', $data);
        $this->load->view('home/detail');
        $this->load->view('templates/main/footer');
    }
}
