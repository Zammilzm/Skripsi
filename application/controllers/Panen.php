<?php
/**
 * Created by PhpStorm.
 * User: Zammil
 * Date: 18/04/2018
 * Time: 7:45
 */

class Panen extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->Model('Panen_model');
    }

    public function index(){
        $data["title"] = 'Data Panen';
        $data['panen'] = $this->Panen_model->tampil();
        load_view_user('user/panen', $data);
    }

    public function update_panen($ID = NULL){
        $ID = $this->input->post('id_kontrak');

        $this->form_validation->set_rules('tanggal', 'Tanggal Panen', 'required');
        $this->form_validation->set_rules('jumlahpanen', 'Jumlah Panen', 'required');
        $fields = array(
            'Tanggal_panen' => $this->input->post('tanggal'),
            'Jumlah_panen' => $this->input->post('jumlahpanen'),
            'Status_verifikasi_panen' => 'Menunggu',
        );
        $this->Panen_model->tambah($fields,$ID);
        redirect('Panen');
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect();
    }
}