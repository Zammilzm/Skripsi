<?php
/**
 * Created by PhpStorm.
 * User: Zammil
 * Date: 23/02/2018
 * Time: 16:46
 */

    class Member extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('User_model');
    }

    public function index(){
        load_view_user('user/home');
    }

    public function profil()
    {
        $this->form_validation->set_rules('user', 'Username', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() === false) {
            $data['user'] = $this->User_model->get_data_member();
            load_view_user('user/profil_user', $data);
        } else {
            $data = array(
                'user' => $this->input->post('user'),
                'pass' => $this->input->post('pass'),
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email')
            );
            $this->User_model->update_data_member($data);
            $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Member/profil');
        }
    }
}

