<?php
class User extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');               
    }

    public function daftar(){
        load_view('daftar');
    }
        
    public function cetak( $search ='' )
    {
        $data['rows'] = $this->user_model->tampil($search);
        load_view_cetak('user_cetak', $data);
    }
    
    public function login()
    {
        if($this->session->userdata('login'))
        {
            redirect();
        }
        
        $this->form_validation->set_rules( 'user', 'Username', 'required' );
        $this->form_validation->set_rules( 'pass', 'Password', 'required|callback_ceklogin' );
                          
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('login');        
        }
        else
        {                        
            redirect();
        }    
    }
           
    function ceklogin()
    {        
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');
        
        $user_login = $this->user_model->login($user, $pass);
        
        if($user_login)
        {         
            $this->session->set_userdata('ID', $user_login->ID);
            $this->session->set_userdata('login', TRUE);
            $this->session->set_userdata('user', $user_login->user);
            $this->session->set_userdata('level', $user_login->level);
                        
            return true;
        } 
        else 
        {                        
            $this->form_validation->set_message('ceklogin', 'Login gagal');
            return false;
        }
    }
    
    function logout(){
        $this->session->sess_destroy();
        redirect();
    }
    
    function password()
    {
        $this->form_validation->set_rules('pass1', 'Password Lama', 'required|callback_cek_pass');
        $this->form_validation->set_rules('pass2', 'Password Baru', 'required|matches[pass3]');
        $this->form_validation->set_rules('pass3', 'Konfirmasi Password Baru', 'required');
        
        if($this->form_validation->run() === false)
        {
            $data['title'] = 'Ubah Password';
            load_view('password', $data);           
        }
        else
        {
            $data = array( 'pass' => $this->input->post('pass2') );
            $this->user_model->update( $data, $this->session->userdata('user') );
            $data['title'] = 'Password Berhasil Diubah';
            load_message('Password berhasil diubah', 'success');
        }
    }
    
    public function cek_pass()
    {        
        if( !$this->user_model->cek_pass ($this->session->userdata('level'), $this->session->userdata('user'), $this->input->post('pass1')))
        {
            $this->form_validation->set_message('cek_pass', '%s salah');
            return false;
        }
        return true;
    }            
}