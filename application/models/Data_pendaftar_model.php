<?php
/**
 * Created by PhpStorm.
 * User: Zammil
 * Date: 14/05/2018
 * Time: 9:27
 */
class Data_pendaftar_model extends CI_Model {

    protected $table = 'tb_admin';

    public function list_user(){
        $query = $this->db->query("SELECT * from tb_admin where level <> 'Admin'");
        return $query->result();
    }
    public function tambah($fields){
        $this->db->insert($this->table, $fields);
    }
    public function hapus($user)
    {
        $this->db->delete($this->table, array('user' => $user));
    }
}