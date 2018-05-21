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

    public function index(){
        $data['total'] = $this->Kontrak_model->jumlah_lahan();
        $data['user'] = $this->Kontrak_model->jumlah_user_aktif();
        $data['rows'] = $this->Data_pendaftar_model->list_user();
        load_view('datapendaftar', $data);
    }
}