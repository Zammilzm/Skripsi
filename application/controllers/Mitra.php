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
        $this->load->model('alternatif_model');
    }

    public function index(){
        $data['Tittle'] = 'Halaman';
        load_view('list_Mitra', $data);
    }
}