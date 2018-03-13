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
        $this->load->model('alternatif_model');
        $this->load->helper('download');
    }

    public function index()
    {
        $data['Tittle'] = 'DAFTAR PEMINAT LAHAN';
        $data['peminat'] = $this->Kontrak_model->jumlah_peminat_lahan();
        $data['total'] = $this->Kontrak_model->jumlah_lahan();
        $data['user'] = $this->Kontrak_model->jumlah_user_aktif();
        $data['lahan'] = $this->Kontrak_model->tabel_peminat_lahan();
        load_view('peminat_lahan', $data);
    }

    public function detail_peminat($ID)
    {
        $data['row'] = $this->alternatif_model->get_alternatif($ID);
        $data['users'] = $this->Kontrak_model->list_peminat($ID);
        load_view('peminat_lahan_detail', $data);
    }

    public function kirim_kontrak($ID = null)
    {
        $fileInfo = $this->Kontrak_model->get_data_booking($ID);
        $status = $fileInfo->Tipe_penawaran;

        if ($status === 'Tebu Rakyat Mandiri'){
            $fields = array(
                'Status' => 'Disetujui',
                'Doc_Kontrak_admin' => 'https://drive.google.com/file/d/1TIC_bKiYxv4xIKThpS-R-3TgooiOb1Lj/view?usp=sharing'
            );
            $this->Kontrak_model->Kirim_kontrak($fields, $ID);
        } else {
            $fields = array(
                'Status' => 'Disetujui',
                'Doc_Kontrak_admin' => 'https://drive.google.com/file/d/1rCoWakaYIIcOkmv4IMuP22fFZwGqFRSK/view?usp=sharing'
            );
            $this->Kontrak_model->Kirim_kontrak($fields, $ID);
        }
        redirect('Kontrak');
    }

    public function set_booking_mandiri()
    {
        $fields = array(
            'id_user' => $this->session->userdata('id_user'),
            'kode_alternatif' => $this->input->post('kode_alternatif'),
            'Tipe_penawaran' => 'Tebu Rakyat Mandiri',
            'status' => 'Diproses',
        );
        $this->Kontrak_model->Tambah_booking($fields);
        redirect('Member/index');
    }

    public function set_booking_kredit()
    {
        $fields = array(
            'id_user' => $this->session->userdata('id_user'),
            'kode_alternatif' => $this->input->post('kode_alternatif'),
            'Tipe_penawaran' => 'Tebu Rakyat Kredit',
            'status' => 'Diproses',
        );
        $this->Kontrak_model->Tambah_booking($fields);
        redirect('Member/index');
    }

    public function list_status_booking()
    {
        $data["Tittle"] = "List Status";
        $data['setuju'] = $this->Kontrak_model->list_lahan_disetujui();
        $data['proses'] = $this->Kontrak_model->list_lahan_diproses();
        $data['tolak'] = $this->Kontrak_model->list_lahan_ditolak();
        load_view_user('user/Lahan_user', $data);
    }

    public function download_file_kontrak($ID)
    {

        $fileInfo = $this->Kontrak_model->get_data_booking($ID);

        $filename = $fileInfo['Doc_Kontrak_admin'];

        $fileContents = file_get_contents(base_url('assets/uploads/'. $fileInfo['Doc_Kontrak_admin']));

        force_download($filename,$fileContents);
    }

}