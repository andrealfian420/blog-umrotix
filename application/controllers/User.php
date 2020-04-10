<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('loginFirst', 'Silahkan login terlebih dahulu!');
            redirect('auth');
        }

        $this->load->model('User_Model', 'user');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['pageTitle'] = 'Profil';
        $data['user'] = $this->user->getUserByEmail($this->session->userdata('email'));

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/profile/index');
        $this->load->view('templates/admin/footer');
    }

    public function update()
    {
        $data['pageTitle'] = 'Update Profil';
        $data['user'] = $this->user->getUserByEmail($this->session->userdata('email'));

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/topbar');
            $this->load->view('admin/profile/update');
            $this->load->view('templates/admin/footer');
        } else {
            // if user upload new profile image
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $this->load->library('image_lib');

                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size']      = '2048';
                $config['encrypt_name'] = true;
                $config['upload_path']   = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    // delete old picture
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

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

                    // upload new picture
                    $new_image = $this->upload->data('file_name');
                    $this->user->updatePhoto($new_image);
                } else {
                    // upload failed
                    $this->session->set_flashdata('failedUpload', $this->upload->display_errors());
                    redirect('user/update');
                    die;
                }
            }

            $this->user->updateProfil();

            $this->session->set_flashdata('successUpdate', 'Profil berhasil diupdate!');
            return redirect('user/update');
        }
    }

    public function updatePassword()
    {
        $data['pageTitle'] = 'Update Password';
        $data['user'] = $this->user->getUserByEmail($this->session->userdata('email'));

        $this->form_validation->set_rules('currentPassword', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('newPassword1', 'New Password', 'required|trim|min_length[6]|matches[newPassword2]');
        $this->form_validation->set_rules('newPassword2', 'Confirm New Password', 'required|trim|min_length[6]|matches[newPassword1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/topbar');
            $this->load->view('admin/profile/update_password');
            $this->load->view('templates/admin/footer');
        } else {
            $currentPassword = $this->input->post('currentPassword');
            $newPassword = $this->input->post('newPassword1');

            if (!password_verify($currentPassword, $data['user']['password'])) {
                $this->session->set_flashdata('wrongPassword', 'salah!');
                redirect('user/updatePassword');
                die;
            } else {
                if ($currentPassword == $newPassword) {
                    $this->session->set_flashdata('sameOldPassword', 'sama!');
                    redirect('user/updatePassword');
                    die;
                } else {
                    // password ok
                    $password_hash = password_hash($newPassword, PASSWORD_DEFAULT);
                    $this->user->updatePassword($password_hash);

                    $this->session->set_flashdata('passwordChanged', 'diubah!');
                    redirect('user/updatePassword');
                }
            }
        }
    }
}
