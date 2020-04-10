<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel_list extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('loginFirst', 'Silahkan login terlebih dahulu!');
            redirect('auth');
        }

        $this->load->model('Artikel_Model', 'artikel');
        $this->load->model('Kategori_Model', 'kategori');
        $this->load->model('User_Model', 'user');
    }

    public function index()
    {
        $data['pageTitle'] = 'Daftar Artikel';
        $role_id = $this->session->userdata('role_id');
        $data['artikel'] = $this->artikel->getArticleByRole($role_id);

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/artikel_list/index');
        $this->load->view('templates/admin/footer');
    }

    public function tambahArtikel()
    {
        $this->load->library('form_validation');
        $this->load->helper('text');

        $data['pageTitle'] = 'Artikel Baru';
        $data['kategori'] = $this->kategori->getKategori();

        $this->form_validation->set_rules('author_id', 'Author', 'required|trim');
        $this->form_validation->set_rules('kategori_id', 'Kategori', 'required|trim');
        $this->form_validation->set_rules('nama_artikel', 'Nama Artikel', 'required|trim');
        $this->form_validation->set_rules('artikel_short', 'Isi Artikel Pendek', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('artikel_text', 'Isi Artikel', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/topbar');
            $this->load->view('admin/artikel_list/tambah');
            $this->load->view('templates/admin/footer');
        } else {
            $this->artikel->insertArtikel();

            $this->session->set_flashdata('successInsert', 'Artikel sudah ditambahkan!');

            return redirect('artikel_list/tambahArtikel');
        }
    }

    public function hapusArtikel($id)
    {
        $this->artikel->deleteArtikelById($id);

        $this->session->set_flashdata('deleted', 'Artikel sudah terhapus');
        return redirect('artikel_list');
    }

    public function editArtikel($id)
    {
        $this->load->library('form_validation');
        $this->load->helper('text');

        $data['pageTitle'] = 'Update Artikel';
        $data['artikel'] = $this->artikel->getArticleById($id);
        $data['author'] = $this->user->getAllUser();

        $data['kategori'] = $this->kategori->getKategori();

        $this->form_validation->set_rules('author_id', 'Author', 'required|trim');
        $this->form_validation->set_rules('kategori_id', 'Kategori', 'required|trim');
        $this->form_validation->set_rules('nama_artikel', 'Nama Artikel', 'required|trim');
        $this->form_validation->set_rules('artikel_short', 'Isi Artikel Pendek', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('artikel_text', 'Isi Artikel', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/topbar');
            $this->load->view('admin/artikel_list/edit');
            $this->load->view('templates/admin/footer');
        } else {

            // If user upload new article image
            $uploadImage = $_FILES['image']['name'];
            if ($uploadImage) {
                $this->load->library('image_lib');

                $config['upload_path']          = './assets/content-img/';
                $config['allowed_types']        = 'jpg|png|jpeg';
                $config['encrypt_name']         = true;
                $config['overwrite']            = true;
                $config['max_size']             = 2048;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    // delete old image
                    $old = $this->db->get_where('artikel', ['id' => $id])->row_array();
                    unlink(FCPATH . '/assets/content-img/' . $old['image']);

                    $image = $this->upload->data();

                    $config_image = [
                        'image_library' => 'gd2',
                        'source_image' => $image['full_path'],
                        'maintain_ratio' => true,
                        'width' => 730,
                        'height' => 441
                    ];

                    $this->image_lib->clear();
                    $this->image_lib->initialize($config_image);
                    $this->image_lib->resize();

                    $newImage = $this->upload->data('file_name');
                    $this->artikel->updateImageArtikel($newImage);
                } else {
                    $this->session->set_flashdata('uploadFailed', $this->upload->display_errors());
                    return redirect('artikel_list/editArtikel/' . $this->input->post('id'));
                    die;
                }
            }

            $this->artikel->updateArtikel();

            $this->session->set_flashdata('successUpdate', 'Artikel sudah diupdate!');

            return redirect('artikel_list/editArtikel/' . $id);
        }
    }
}
