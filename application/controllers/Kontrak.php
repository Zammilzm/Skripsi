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
    }

    public function index(){
        $data['Tittle'] = 'DAFTAR PEMINAT LAHAN';
        $data['peminat'] = $this->Kontrak_model->jumlah_peminat_lahan();
        $data['total'] = $this->Kontrak_model->jumlah_lahan();
        $data['user'] = $this->Kontrak_model->jumlah_user_aktif();
        $data['lahan'] = $this->Kontrak_model->tabel_peminat_lahan();
        load_view('peminat_lahan', $data);
    }

    public function detail_peminat($ID){
        $data['row'] = $this->alternatif_model->get_alternatif($ID);
        $data['users'] = $this->Kontrak_model->list_peminat($ID);
        load_view('peminat_lahan_detail', $data);
    }

    public function upload_kontrak($ID = null){
        $this->load->library('upload');
        $nmfile = "file_".time(); //nama file + fungsi time
        $config['upload_path'] = './assets/uploads/'; //Folder untuk menyimpan hasil upload
        $config['allowed_types'] = 'doc|docx|pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);
        if($_FILES['berkas_kontrak']['name'])
        {
            if ($this->upload->do_upload('berkas_kontrak')) {
                $gbr = $this->upload->data();
                $data = array(
                    'Status' => 'Disetujui',
                    'Doc_Kontrak_admin' => $gbr['file_name']
                );
                $this->Kontrak_model->upload_kontrak_lahan($data,$ID); //akses model untuk menyimpan ke database
                redirect('Kontrak');
            }
        }
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

    public function list_status_booking(){
        $data["Tittle"] = "List Status";
        $data['lahans'] = $this->Kontrak_model->list_lahan();
        load_view_user('user/Lahan_user', $data);
    }

}