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
    }

    public function index(){
        $data['tittle'] = 'User';
        load_view_user('user/home', $data);
    }

}

