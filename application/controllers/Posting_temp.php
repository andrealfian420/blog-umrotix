<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posting_temp extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
        $this->load->model('Post_temp_Model', 'post_temp');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('temp/post');
    }

    public function artikel()
    {
        $data['kategori'] = $this->post_temp->getKategori();

        $this->form_validation->set_rules('author', 'Author', 'required|trim');
        $this->form_validation->set_rules('kategori_id', 'Kategori', 'required|trim');
        $this->form_validation->set_rules('nama_artikel', 'Nama Artikel', 'required|trim');
        $this->form_validation->set_rules('artikel_short', 'Isi Artikel Pendek', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('artikel_text', 'Isi Artikel Pendek', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('temp/artikel', $data);
        } else {
            $this->post_temp->insertArtikel();

            $this->session->set_flashdata('successInsert', 'Artikel sudah ditambahkan!');

            return redirect('posting_temp/artikel');
        }
    }

    public function kategori()
    {
        $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('temp/kategori');
        } else {
            $title = $this->input->post('kategori');
            $slug  = strtolower(url_title($title));

            $data = [
                'kategori' => $title,
                'slug'  => $slug
            ];

            $this->post_temp->insertKategori($data);

            $this->session->set_flashdata('successInsert', 'Kategori sudah ditambahkan!');

            return redirect('posting_temp/kategori');
        }
    }
}
