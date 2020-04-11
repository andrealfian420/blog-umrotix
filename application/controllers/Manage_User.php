<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('loginFirst', 'Silahkan login terlebih dahulu!');
            return redirect('auth');
        } else if ($this->session->userdata('role_id') != 1) {
            return redirect('notfound');
            die;
        }

        $this->load->model('User_Model', 'user');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['pageTitle'] = 'Daftar User';
        $data['user'] = $this->user->getUserByEmail($this->session->userdata('email'));

        $data['user_data'] = $this->user->getAllUsers();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/user_list/index');
        $this->load->view('templates/admin/footer');
    }

    public function tambahUser()
    {
        $data['pageTitle'] = 'Update Profil';
        $data['user'] = $this->user->getUserByEmail($this->session->userdata('email'));

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|min_length[6]|matches[password1]');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/topbar');
            $this->load->view('admin/user_list/tambah_user');
            $this->load->view('templates/admin/footer');
        } else {

            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            ];

            $this->user->addNewUser($data);

            $this->session->set_flashdata('successTambah', 'User baru berhasil ditambahkan!');
            return redirect('manage_user/tambahUser');
        }
    }

    public function editPassword($id)
    {
        $data['pageTitle'] = 'Update Password';
        $data['user'] = $this->user->getUserByEmail($this->session->userdata('email'));
        $data['user_data'] = $this->user->getUserById($id);

        $this->form_validation->set_rules('newPassword1', 'New Password', 'required|trim|min_length[6]|matches[newPassword2]');
        $this->form_validation->set_rules('newPassword2', 'Confirm New Password', 'required|trim|min_length[6]|matches[newPassword1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/topbar');
            $this->load->view('admin/user_list/update_password');
            $this->load->view('templates/admin/footer');
        } else {
            $newPassword = $this->input->post('newPassword1');

            // password ok
            $password_hash = password_hash($newPassword, PASSWORD_DEFAULT);
            $this->user->updatePasswordById($id, $password_hash);

            $this->session->set_flashdata('passwordChanged', 'diubah!');
            redirect('manage_user/editPassword/' . $id);
        }
    }

    public function getStatus()
    {
        echo json_encode($this->db->get('status')->result_array());
    }

    public function updateStatus()
    {
        $this->user->updateStatus($this->input->post('id'));

        $this->session->set_flashdata('statusUpdated', 'Status keaktifan berhasil diubah!');
        redirect('manage_user');
    }

    public function hapusUser($id)
    {
        $this->user->deleteUser($id);

        $this->session->set_flashdata('userDeleted', 'User berhasil dihapus!');
        redirect('manage_user');
    }
}
