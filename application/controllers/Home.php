<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Artikel_Model', 'artikel');
        $this->load->model('Kategori_Model', 'kategori');
        $this->load->model('User_Model', 'user');
    }

    public function index()
    {
        $data['pageTitle'] = 'Blog Umrotix';
        $data['user'] = $this->user->getUserByEmail($this->session->userdata('email'));

        $data['artikel_baru']  = $this->artikel->getNewestArticle();
        $data['artikel_tengah'] = $this->artikel->getMiddleArticle($data['artikel_baru']['id']);
        $data['artikel_lama'] = $this->artikel->getOldArticle();
        $data['artikel_bawah'] = $this->artikel->getLowerArticle();


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

    public function cari()
    {
        if (!$this->input->post('keyword')) {
            return redirect('home');
        }

        $data['pageTitle'] = 'Hasil Pencarian';
        $data['artikel'] = $this->artikel->getArticleByKeyword($this->input->post('keyword'));

        $data['artikel_lama'] = $this->artikel->getOldArticle();


        $this->load->view('templates/main/header', $data);
        $this->load->view('home/cari');
        $this->load->view('templates/main/footer');
    }
}
