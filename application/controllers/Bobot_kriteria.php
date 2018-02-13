<?php
class Bobot_kriteria extends CI_Controller {

        public function __construct()
        {
            parent::__construct();                                 
            $this->load->model('bobot_kriteria_model');   
            $this->load->model('kriteria_model');       
        }

        public function index()
        {                  
            $parent = $this->input->get('parent');   
                                             
            $data['parent'] = get_parent_array();                                           
            $data['title'] = 'Bobot';
            $data['kriteria'] = $this->get_kriteria_options($parent);
            
            $this->form_validation->set_rules( 'nilai', 'nilai', 'required|callback_cek_nilai' );
                        
            if ($this->form_validation->run() !== FALSE){
                $dt = array(
                    'ID1' => $this->input->post('ID1'),
                    'ID2' => $this->input->post('ID2'),
                    'nilai' => $this->input->post('nilai'),
                );
                $this->bobot_kriteria_model->update_nilai($dt);
            }
            $data['matriks'] = $this->get_bobot($parent);
            $data['total_baris'] = get_total_baris($data['matriks']);
            $data['bobot_prioritas'] = get_bobot_prioritas($data['matriks'], $data['total_baris']);
            $data['total_bobot_prioritas'] = get_total_bobot_prioritas($data['bobot_prioritas']);
            
            $this->save_bobot($data['total_bobot_prioritas']);
                      
            load_view('bobot_kriteria', $data);   
        }        
        
        public function cek_nilai()
        {       
            if($this->input->post('ID1')==$this->input->post('ID2') && $this->input->post('nilai')!=1)
            {
                $this->form_validation->set_message('cek_nilai', 'Kriteria sama, harus bernilai 1');
                return false;
            }
            return true;
        }
        
        function get_bobot($parent)
        {
            $rows = $this->bobot_kriteria_model->tampil($parent);
            
            $bobot = array();
            
            foreach($rows as $row)
            {
                $bobot[$row->ID1][$row->ID2] = $row->nilai;
            }
            return $bobot;
        }
        
        function get_kriteria_options($parent)
        {
            $parent = ($parent===NULL) ? '' : $parent;
            
            $rows = $this->kriteria_model->get_by_parent($parent);
                                    
            $data = array();
            foreach($rows as $row){
                $str = $row->kode_kriteria . '-' . $row->nama_kriteria;
                $data[$row->kode_kriteria] = (strlen($str) > 30)  ?  substr($str, 0, 30) . '...' : $str;
            }
            return $data;
        }       
        
        function save_bobot($bobot = array())
        {
            foreach($bobot as $key => $val)
            {
                $this->bobot_kriteria_model->save_bobot($key, $val);
            }
        }
}