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

    public function profil(){
        $data['user'] = $this->User_model->get_data_member();
        load_view_user('user/profil_user', $data);
    }


}

