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
        $query = $this->db->query("Select *,tba.nama_alternatif from tb_kontrak tbk JOIN tb_booking_lahan tbb
        ON tbk.id_booking_lahan = tbb.id_booking_lahan
        JOIN tb_alternatif tba
        on tba.kode_alternatif = tbb.kode_alternatif
        WHERE tbk.id_user = $login;");
        return $query->result();
    }

    public function tambah($fields,$ID){
        $this->db->update($this->table, $fields,array('id_kontrak' => $ID));
    }

    public function verifikasi_panen($fields,$id){
        $this->db->update($this->table, $fields, array('id_kontrak' => $id));
    }
}