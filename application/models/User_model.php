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

    public function update_data_member($data){
        $this->db->update('tb_admin',$data, array('id_user' => $this->session->userdata('id_user')));
    }

    public function update_foto_profil($data){
        $this->db->update('tb_admin',$data, array('id_user' => $this->session->userdata('id_user')));
    }

    public function get_foto_profil(){
        $this->db->select('gambar');
        $this->db->from('tb_admin');
        $this->db->where('id_user',$this->session->userdata('id_user'));
        $query = $this->db->get();
        return $query->result();
    }

    public function profil_perusahaan(){
        $query = $this->db->get('tb_profil_perusahaan');
        return $query;
    }

    public function update_profil_perusahaan($data){
        $this->db->update('tb_profil_perusahaan', $data);
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