<?php

/**
 * Created by PhpStorm.
 * User: Zammil
 * Date: 14/05/2018
 * Time: 9:16
 */
class data_pendaftar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->Model('Kontrak_model');
        $this->load->Model('Data_pendaftar_model');
    }

    public function index()
    {
        $data['total'] = $this->Kontrak_model->jumlah_lahan();
        $data['user'] = $this->Kontrak_model->jumlah_user_aktif();
        $data['rows'] = $this->Data_pendaftar_model->list_user();
        load_view('datapendaftar', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_admin.user]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('namalengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('alamatlengkap', 'Alamat Lengkap', 'required');
        $this->form_validation->set_rules('nohp', 'No Hp', 'required');
//        $this->form_validation->set_rules('ktp', 'Foto KTP', 'required');
        if ($this->form_validation->run() === FALSE) {
            load_view('datapendaftar_tambah');
        } else {
            $this->load->library('upload');
            $nmfile = "file_" . time(); //nama file + fungsi time
            $config['upload_path'] = './assets/uploads/'; //Folder untuk menyimpan hasil upload
            $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '3072'; //maksimum besar file 3M
            $config['max_width'] = '5000'; //lebar maksimum 5000 px
            $config['max_height'] = '5000'; //tinggi maksimu 5000 px
            $config['file_name'] = $nmfile; //nama yang terupload nantinya

            $this->upload->initialize($config);
            if ($_FILES['ktp']['name']) {
                if ($this->upload->do_upload('ktp')) {
                    $gbr = $this->upload->data();
                    $image_name = $gbr['file_name'];
                }
            } else {
                $image_name = $this->input->post('old');
            }
            $fields = array(
                'user' => $this->input->post('username'),
                'pass' => $this->input->post('password'),
                'nama' => $this->input->post('namalengkap'),
                'level' => 'User',
                'No_hp' => $this->input->post('nohp'),
                'Alamat_lengkap' => $this->input->post('alamatlengkap'),
                'Foto_ktp' => $image_name,
            );
            $this->Data_pendaftar_model->tambah($fields);
            redirect('data_pendaftar');
        }
    }
    public function hapus($user)
    {
        $this->Data_pendaftar_model->hapus($user);
        redirect('data_pendaftar');
    }
}