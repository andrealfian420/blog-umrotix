<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tag_list extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('loginFirst', 'Silahkan login terlebih dahulu!');
            redirect('auth');
        }

        $this->load->model('Tag_Model', 'tag');
        $this->load->model('User_Model', 'user');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['pageTitle'] = 'Daftar Tag';
        $data['tags'] = $this->tag->getTag();
        $data['user'] = $this->user->getUserByEmail($this->session->userdata('email'));

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/tag_list/index');
        $this->load->view('templates/admin/footer');
    }

    public function tambahTag()
    {
        $this->form_validation->set_rules('tag', 'Tag', 'required|trim');

        $data = [
            'tag' => $this->input->post('tag')
        ];

        $this->tag->insertTag($data);

        $this->session->set_flashdata('successInsert', 'Tag sudah ditambahkan!');

        return redirect('tag_list');
    }

    public function hapusTag($id)
    {
        $this->tag->hapusTagById($id);

        $this->session->set_flashdata('deleted', 'Tag sudah dihapus!');

        return redirect('tag_list');
    }

    public function getDataTag()
    {
        echo json_encode($this->tag->getTagById($this->input->post('id')));
    }

    public function updateTag()
    {
        $this->form_validation->set_rules('tag', 'Tag', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('failedUpdate', validation_errors());

            return redirect('tag_list');
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'tag' => $this->input->post('tag')
            ];

            $this->tag->updateTag($data);

            $this->session->set_flashdata('successUpdate', 'Tag berhasil diubah!');

            return redirect('tag_list');
        }
    }
}
