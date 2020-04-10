<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_list extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('loginFirst', 'Silahkan login terlebih dahulu!');
            redirect('auth');
        }

        $this->load->model('Kategori_Model', 'kategori');
        $this->load->model('User_Model', 'user');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['pageTitle'] = 'Daftar Kategori';
        $data['kategori'] = $this->kategori->getKategori();
        $data['user'] = $this->user->getUserByEmail($this->session->userdata('email'));

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/kategori_list/index');
        $this->load->view('templates/admin/footer');
    }

    public function tambahKategori()
    {
        $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');

        $data = [
            'kategori' => $this->input->post('kategori'),
            'slug' => strtolower(url_title($this->input->post('kategori')))
        ];

        $this->kategori->insertKategori($data);

        $this->session->set_flashdata('successInsert', 'Kategori sudah ditambahkan!');

        return redirect('kategori_list');
    }

    public function hapusKategori($id)
    {
        $this->kategori->hapusKategoriById($id);

        $this->session->set_flashdata('deleted', 'Kategori sudah dihapus!');

        return redirect('kategori_list');
    }

    public function getDataKategori()
    {
        echo json_encode($this->kategori->getKategoriById($this->input->post('id')));
    }

    public function updateKategori()
    {
        $this->form_validation->set_rules('kategori', 'kategori', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('failedUpdate', validation_errors());

            return redirect('kategori_list');
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'kategori' => $this->input->post('kategori'),
                'slug' => strtolower(url_title($this->input->post('kategori')))
            ];

            $this->kategori->updateKategori($data);

            $this->session->set_flashdata('successUpdate', 'Kategori berhasil diubah!');

            return redirect('kategori_list');
        }
    }
}
