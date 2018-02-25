<?php
class User_model extends CI_Model {


    public function login($data)
    {
        $query = $this->db->get_where('tb_admin', $data);
        return $query;
    }

    public function get_data_member(){
        $query =  $this->db->get_where('tb_admin', array ( 'id_user' => $this->session->userdata('id_user') ));
        return $query->row();
    }
    
    public function cek_pass( $level, $user, $pass )
    {       
        return $this->db->get_where('tb_admin', array('user' => $user, 'pass' => $pass))->result();
    }
    
    public function update($data, $user)
    {
        $this->db->update( 'tb_admin', $data, array( 'user' => $user ) );                    
    }

    public function input_pendaftaran($fields, $table){
            $this->db->insert($table,$fields);
    }
}