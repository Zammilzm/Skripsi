<?php
/**
 * Created by PhpStorm.
 * User: Zammil
 * Date: 14/05/2018
 * Time: 9:27
 */
class Data_pendaftar_model extends CI_Model {

    public function list_user(){
        $query = $this->db->query("SELECT * from tb_admin where level <> 'Admin'");
        return $query->result();
    }
}