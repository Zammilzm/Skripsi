<?php
/**
 * Created by PhpStorm.
 * User: Zammil
 * Date: 08/03/2018
 * Time: 11:28
 */

class Kontrak_model extends CI_Model {

    public function Tambah_booking($fields){
        $this->db->insert('tb_booking_lahan', $fields);
    }
}