<?php
/**
 * Created by PhpStorm.
 * User: Zammil
 * Date: 08/03/2018
 * Time: 11:28
 */

class Kontrak_model extends CI_Model
{

    public function Tambah_booking($fields)
    {
        $this->db->insert('tb_booking_lahan', $fields);
    }

    public function jumlah_peminat_lahan()
    {
        $query = $this->db->query("SELECT COUNT(kode_alternatif) as jumlah FROM tb_booking_lahan");
        return $query->row();
    }

    public function jumlah_lahan()
    {
        $query = $this->db->query("SELECT COUNT(kode_alternatif) as total_lahan FROM tb_alternatif");
        return $query->row();
    }

    public function jumlah_user_aktif()
    {
        $query = $this->db->query("SELECT COUNT(id_user) as jumlah FROM tb_admin WHERE level = 'user'");
        return $query->row();
    }

    public function tabel_peminat_lahan()
    {
        $query = $this->db->query("SELECT tbl.kode_alternatif, tba.nama_alternatif, tba.keterangan, COUNT(tbl.kode_alternatif) as jumlah_peminat
                                  FROM tb_booking_lahan tbl
                                    join tb_alternatif tba
                                    on tbl.kode_alternatif = tba.kode_alternatif
                                    GROUP BY tba.kode_alternatif
                                    ORDER BY jumlah_peminat DESC ");
        return $query->result();
    }

    public function list_peminat($ID)
    {
        $query = $this->db->query("SELECT tbl.id_booking_lahan,tbl.Status,tbl.Tipe_penawaran, tba.nama, tba.email, tba.gambar, tba.id_user 
                                FROM tb_booking_lahan tbl
                                join tb_admin tba
                                on tbl.id_user = tba.id_user
                                where tba.level = 'user' AND kode_alternatif = '$ID'");

        return $query->result();
    }

    public function upload_kontrak_lahan($data,$ID){
        $this->db->update('tb_booking_lahan',$data, array('id_booking_lahan' => $ID));
    }
}
