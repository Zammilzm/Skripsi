<?php
/**
 * Created by PhpStorm.
 * User: Zammil
 * Date: 08/03/2018
 * Time: 10:56
 */

class Kontrak extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->Model('Kontrak_model');
    }

    public function index(){
        $data['Tittle'] = 'DAFTAR PEMINAT LAHAN';
        $data['peminat'] = $this->Kontrak_model->jumlah_peminat_lahan();
        $data['total'] = $this->Kontrak_model->jumlah_lahan();
        $data['user'] = $this->Kontrak_model->jumlah_user_aktif();
        $data['lahan'] = $this->Kontrak_model->tabel_peminat_lahan();
        load_view('peminat_lahan', $data);
    }

    public function set_booking_mandiri(){
        $fields = array(
            'id_user' => $this->session->userdata('id_user'),
            'kode_alternatif' => $this->input->post('kode_alternatif'),
            'Tipe_penawaran' => 'Tebu Rakyat Mandiri',
            'status' => 'Diproses',
        );
        $this->Kontrak_model->Tambah_booking($fields);
        redirect('Member/index');
    }

    public function set_booking_kredit(){
        $fields = array(
            'id_user' => $this->session->userdata('id_user'),
            'kode_alternatif' => $this->input->post('kode_alternatif'),
            'Tipe_penawaran' => 'Tebu Rakyat Kredit',
            'status' => 'Diproses',
        );
        $this->Kontrak_model->Tambah_booking($fields);
        redirect('Member/index');
    }

}