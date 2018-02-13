<?php
class Relasi extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
                        
            $this->load->model('relasi_model');       
        }

        public function index()
        {      
            $this->load->helper('form');
            $data['rows'] = $this->relasi_model->tampil($this->input->get('search'));                                    
            $data['title'] = 'Bobot';
    
            load_view('relasi', $data);
        }
                        
        public function ubah( $ID = null )
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
                        
            $this->form_validation->set_rules( 'kode_crips[]', 'Crips', 'required|is_natural' );
            
            $data['title'] = 'Ubah Bobot ';
            
            if ($this->form_validation->run() === FALSE)
            {
                $data['rows'] = $this->relasi_model->get_relasi($ID);
                
                if($data['rows']) 
                {                    
                    $data['title'] .= $data['rows'][0]->nama_alternatif;
                }
                
                $this->load->view('header', $data);
                $this->load->view('relasi_ubah', $data);
                $this->load->view('footer');        
            }
            else
            {
                $this->relasi_model->ubah( $this->input->post('kode_crips') );
                redirect('relasi');
            }            
        }
}