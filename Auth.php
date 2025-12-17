<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mebel_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
    }

    public function login() {
        if ($this->session->userdata('status') == 'login') {
            redirect(base_url('administrator'));
        }

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login_view');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->Mebel_model->cek_login($username);

            // Verifikasi password tanpa enkripsi (plain text)
            if ($user && $password == $user['password']) { 
                $data_session = array(
                    'id_user' => $user['id_user'],
                    'username' => $user['username'],
                    'level' => $user['level'],
                    'status' => 'login'
                );
                $this->session->set_userdata($data_session);
                redirect(base_url('administrator'));
            } else {
                $this->session->set_flashdata('error', 'Username atau Password salah.');
                redirect(base_url('login'));
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}