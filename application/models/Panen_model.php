<?php
/**
 * Created by PhpStorm.
 * User: Zammil
 * Date: 18/04/2018
 * Time: 8:06
 */

class Panen_model extends CI_Model
{
    protected $table = 'tb_kontrak';

    public function tampil()
    {
        $login = $this->session->userdata('id_user');
        $query = $this->db->query("Select *,tba.nama_alternatif from tb_kontrak tbk JOIN tb_alternatif tba
        ON tbk.kode_alternatif = tba.kode_alternatif
        WHERE id_user = $login;");
        return $query->result();
    }

    public function tambah($fields,$ID){
        $this->db->update($this->table, $fields,array('id_kontrak' => $ID));
    }

    public function verifikasi_panen($fields,$id){
        $this->db->update($this->table, $fields, array('id_kontrak' => $id));
    }
}