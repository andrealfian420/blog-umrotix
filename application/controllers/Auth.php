<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('User_Model', 'user');
    }

    public function index()
    {
        $data['pageTitle'] = 'Login Admin';

        // Validation Rules
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() === false) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('admin/index');
            $this->load->view('templates/admin/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // retrieve user data based on email
        $user = $this->user->getUserByEmail($email);

        // if user exist
        if ($user) {
            // password checking
            if (password_verify($password, $user['password'])) {
                // all ok
                $data = $user;
                $this->session->set_userdata($data);

                redirect('admin');
            } else {
                // wrong password
                $this->session->Set_flashdata('wrongPassword', 'Oops!');
                redirect('auth');
            }
        } else {
            // user doesn't exist
            $this->session->set_flashdata('loginFailed', 'Oops!');
            redirect('auth');
        }
    }
}
