<?php

/**
 * Created by PhpStorm.
 * User: Zammil
 * Date: 21/03/2018
 * Time: 17:01
 */
class Mitra extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->Model('Kontrak_model');
        $this->load->Model('Panen_model');
    }

    public function index(){
        $data['Tittle'] = 'Halaman';
        $data['setuju'] = $this->Kontrak_model->list_lahan_tersetujui();
        $data['kepemilikan'] = $this->Kontrak_model->list_lahan_kepemilikan();
        load_view('list_Mitra', $data);
    }

    public function setuju_alih_lahan(){
        $id_user = $this->input->post('id_user');
        $kode = $this->input->post('kode_alternatif');

        $fields = array(
            'id_booking_lahan' => $this->input->post('id_booking_lahan'),
            'id_user' => $this->input->post('id_user'),
            'Status_kontrak' => 'Kontrak awal'
        );
        $this->Kontrak_model->Tambah_kontrak($fields);

        $fields = array(
            'Status' => 'Ditolak',
        );
        $this->Kontrak_model->update_booking_tolak($fields,$kode);

        $fields = array(
            'Status' => 'Kepemilikan',
        );
        $this->Kontrak_model->update_booking($fields,$id_user,$kode);

        redirect('Mitra');
    }

    public function batalkan_alih_lahan(){
        $id = $this->input->post('kode_alternatif');
        $id_user = $this->input->post('id_user');

        $fields = array(
            'Status' => 'Ditolak',
        );
        $this->Kontrak_model->update_booking($fields,$id_user,$id);

        redirect('Mitra');
    }

    public function verifikasi_panen(){
        $id = $this->input->post('id_kontrak');
        $id_booking_lahan_selesai = $this->input->post('id_booking_lahan');

        if ($this->input->post('verifikasi')){
            $putus = array(
                'Status' => 'Kontrak Selesai'
            );
            $this->Kontrak_model->selesai_kontrak($putus, $id_booking_lahan_selesai);

            $fields = array(
                'Pesan' => $this->input->post('pesan'),
                'Status_verifikasi_panen' => 'Terverifikasi'
            );
        }
        elseif ($this->input->post('okupasi')){
            $data = array(
                'id_booking_lahan' => $this->input->post('id_booking_lahan'),
                'id_user' => $this->input->post('id_user'),
                'Status_kontrak' => 'Kontrak Lanjutan'
            );
            $this->Kontrak_model->Tambah_kontrak($data);

            $fields = array(
                'Pesan' => $this->input->post('pesan'),
                'Status_verifikasi_panen' => 'Terverifikasi',
            );
        }
        elseif ($this->input->post('tinjau')){
            $fields = array(
                'Pesan' => $this->input->post('pesan'),
                'Status_verifikasi_panen' => 'Tinjau ulang',
            );
        }
        $this->Panen_model->verifikasi_panen($fields,$id);

        redirect('Mitra');
    }
}