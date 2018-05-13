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
        $query = $this->db->query("SELECT COUNT(kode_alternatif) as jumlah FROM tb_booking_lahan where Status = 'Diproses'");
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
                                    where tbl.Status <> 'kepemilikan' AND tbl.Status <> 'Ditolak'
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

    public function Kirim_kontrak($data, $ID)
    {
        $this->db->update('tb_booking_lahan', $data, array('id_booking_lahan' => $ID));
    }

    public function list_lahan_disetujui()
    {
        $login = $this->session->userdata('id_user');
        $query = $this->db->query("SELECT tba.nama_alternatif, tba.kode_alternatif, tba.keterangan, tbl.Tipe_penawaran,tbl.id_booking_lahan, tbl.Status, tba.gambar1, tbl.Doc_Kontrak_admin
                                FROM tb_booking_lahan tbl 
                                JOIN tb_alternatif tba
                                on tba.kode_alternatif = tbl.kode_alternatif
                                where tbl.id_user = $login AND tbl.Status = 'Disetujui'");

        return $query->result();
    }

    public function list_lahan_dimiliki()
    {
        $login = $this->session->userdata('id_user');
        $query = $this->db->query("SELECT tba.nama_alternatif, tba.kode_alternatif, tba.keterangan, tbl.Tipe_penawaran,tbl.id_booking_lahan, tbl.Status, tba.gambar1, tbl.Doc_Kontrak_admin
                                FROM tb_booking_lahan tbl 
                                JOIN tb_alternatif tba
                                on tba.kode_alternatif = tbl.kode_alternatif
                                where tbl.id_user = $login AND tbl.Status = 'Kepemilikan'");

        return $query->result();
    }

    public function list_lahan_diproses()
    {
        $login = $this->session->userdata('id_user');
        $query = $this->db->query("SELECT tba.nama_alternatif, tba.kode_alternatif, tba.keterangan, tbl.Tipe_penawaran,tbl.id_booking_lahan, tbl.Status, tba.gambar1, tbl.Doc_Kontrak_admin
                                FROM tb_booking_lahan tbl 
                                JOIN tb_alternatif tba
                                on tba.kode_alternatif = tbl.kode_alternatif
                                where tbl.id_user = $login AND tbl.Status = 'Diproses'");

        return $query->result();
    }

    public function list_lahan_ditolak()
    {
        $login = $this->session->userdata('id_user');
        $query = $this->db->query("SELECT tba.nama_alternatif, tba.kode_alternatif, tba.keterangan, tbl.Tipe_penawaran,tbl.id_booking_lahan, tbl.Status, tba.gambar1, tbl.Doc_Kontrak_admin
                                FROM tb_booking_lahan tbl 
                                JOIN tb_alternatif tba
                                on tba.kode_alternatif = tbl.kode_alternatif
                                where tbl.id_user = $login AND tbl.Status = 'Ditolak'");

        return $query->result();
    }

    public function get_data_booking($ID = NULL)
    {
        $query = $this->db->query("SELECT * from tb_booking_lahan WHERE id_booking_lahan = $ID");
        return $query->row();
    }

    public function list_lahan_tersetujui()
    {
        $query = $this->db->query("SELECT tba.nama_alternatif, tba.kode_alternatif, tba.keterangan, tbl.Tipe_penawaran,tbl.id_booking_lahan, tbl.Status, tbad.nama, tbad.id_user, tbl.Doc_Kontrak_admin, tba.lat, tba.lng
                                FROM tb_booking_lahan tbl 
                                JOIN tb_alternatif tba
                                on tba.kode_alternatif = tbl.kode_alternatif
                                JOIN tb_admin tbad
                                ON tbl.id_user = tbad.id_user
                                where tbl.Status = 'Disetujui'");

        return $query->result();
    }

    public function Tambah_kontrak($fields)
    {
        $this->db->insert('tb_kontrak', $fields);
    }

    public function update_booking_tolak($fields, $id)
    {
        $this->db->update('tb_booking_lahan', $fields, array('kode_alternatif' => $id));
    }

    public function update_booking($fields, $id_user, $id)
    {
        $this->db->update('tb_booking_lahan', $fields, array('id_user' => $id_user, 'kode_alternatif' => $id));
    }


    public function list_lahan_kepemilikan()
    {
        $query = $this->db->query("SELECT tba.nama_alternatif, tba.kode_alternatif, tba.keterangan, tbad.id_user, tbad.user, tbad.nama, tbad.email, tbad.gambar, tba.lat, tba.lng, tba.gambar1, tbk.*
                                FROM tb_kontrak tbk
                                JOIN tb_booking_lahan tbl
                                on tbk.id_booking_lahan = tbl.id_booking_lahan
                                JOIN tb_alternatif tba
                                on tba.kode_alternatif = tbl.kode_alternatif
                                JOIN tb_admin tbad
                                ON tbl.id_user = tbad.id_user
                                where tbl.Status = 'kepemilikan' OR tbl.Status = 'Kontrak Selesai'");

        return $query->result();
    }

    public function selesai_kontrak($putus, $id_booking_lahan_selesai){
        $this->db->update('tb_booking_lahan', $putus, array('id_booking_lahan' => $id_booking_lahan_selesai));
    }
}
