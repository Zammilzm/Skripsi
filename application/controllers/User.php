<?php

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function daftar()
    {
        $this->form_validation->set_rules('full_name', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === false) {
            $this->load->view('daftar');

        } else {
            $fields = array(
                'user' => $this->input->post('username'),
                'pass' => $this->input->post('password'),
                'nama' => $this->input->post('full_name'),
                'email' => $this->input->post('email')
            );
            $this->user_model->input_pendaftaran($fields, 'tb_admin');
            redirect('Awal/index');
        }
    }

    public function cetak($search = '')
    {
        $data['rows'] = $this->user_model->tampil($search);
        load_view_cetak('user_cetak', $data);
    }

    public function login()
    {
        $this->load->view('login');
    }

    function ceklogin()
    {

        $data = array(
            'user' => $this->input->post('user', TRUE),
            'pass' => $this->input->post('pass', TRUE)
        );

        $user_login = $this->user_model->login($data);

        if ($user_login->num_rows() == 1) {
            foreach ($user_login->result() as $sesi) {
                $this->session->set_userdata('id_user', $sesi->id_user);
                $this->session->set_userdata('user', $sesi->user);
                $this->session->set_userdata('level', $sesi->level);
            }
            if ($this->session->userdata('level') == 'Admin') {
                redirect('Admin/index');
            } elseif ($this->session->userdata('level') == 'User') {
                redirect('Admin/user');
            }
        } else {
            $this->form_validation->set_message('ceklogin', 'Login gagal');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect();
    }

    function password()
    {
        $this->form_validation->set_rules('pass1', 'Password Lama', 'required|callback_cek_pass');
        $this->form_validation->set_rules('pass2', 'Password Baru', 'required|matches[pass3]');
        $this->form_validation->set_rules('pass3', 'Konfirmasi Password Baru', 'required');

        if ($this->form_validation->run() === false) {
            $data['title'] = 'Ubah Password';
            load_view('password', $data);
        } else {
            $data = array('pass' => $this->input->post('pass2'));
            $this->user_model->update($data, $this->session->userdata('user'));
            $data['title'] = 'Password Berhasil Diubah';
            load_message('Password berhasil diubah', 'success');
        }
    }

    public function cek_pass()
    {
        if (!$this->user_model->cek_pass($this->session->userdata('level'), $this->session->userdata('user'), $this->input->post('pass1'))) {
            $this->form_validation->set_message('cek_pass', '%s salah');
            return false;
        }
        return true;
    }
}