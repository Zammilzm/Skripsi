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
            $data['pict'] = $this->User_model->get_foto_profil();
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
    public function ganti_foto(){
        $this->load->library('upload');
        $nmfile = "file_".time(); //nama file + fungsi time
        $config['upload_path'] = './assets/uploads/'; //Folder untuk menyimpan hasil upload
        $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '3072'; //maksimum besar file 3M
        $config['max_width']  = '5000'; //lebar maksimum 5000 px
        $config['max_height']  = '5000'; //tinggi maksimu 5000 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if($_FILES['filefoto']['name'])
        {
            if ($this->upload->do_upload('filefoto')) {
                $gbr = $this->upload->data();
                $data = array(
                    'gambar' => $gbr['file_name']
                );
                $this->User_model->update_foto_profil($data); //akses model untuk menyimpan ke database
                redirect('Member/profil');
            }
        }
    }

        public function profil_usaha()
        {
            $this->form_validation->set_rules('profil', 'Profil Perusahaan', 'required');

            if ($this->form_validation->run() === false) {
                $data['profil'] = $this->User_model->profil_perusahaan()->result();
                load_view_user('user/profil_perusahaan', $data);
            } else {
                $data = array(
                    'profil' => $this->input->post('profil')
                );
                $this->User_model->update_profil_perusahaan($data);
                redirect('Member/profil_usaha');
            }

        }
}

