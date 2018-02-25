<?php
/**
 * Created by PhpStorm.
 * User: Zammil
 * Date: 23/02/2018
 * Time: 10:22
 */

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index(){
        $data['tittle'] = 'ADMIN';
        load_view('home', $data);
    }


}