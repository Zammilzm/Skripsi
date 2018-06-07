<?php

class Alternatif_model extends CI_Model
{

    protected $table = 'tb_alternatif';
    protected $kode = 'kode_alternatif';

    public function tampil()
    {
        $this->db->order_by($this->kode);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function peringkat_lahan()
    {
        $query = $this->db->query("select * from tb_alternatif
                where kode_alternatif NOT IN
                (select kode_alternatif from tb_booking_lahan where Status = 'Kepemilikan')
                ORDER BY nf DESC ");
        return $query->result();
    }

    public function get_alternatif($ID = null)
    {
        $query = $this->db->get_where($this->table, array($this->kode => $ID));
        return $query->row();
    }

    public function get_alternatif_lahan_user($ID = NULL)
    {
        $query = $this->db->query("SELECT *
        FROM tb_alternatif 
        WHERE kode_alternatif = '$ID'");

        return $query->row();
    }

    public function cek_status_booking($ID = NULL)
    {
        $login = $this->session->userdata('id_user');

        $query = $this->db->query("SELECT tbl.Status
        FROM tb_alternatif tba
        JOIN  tb_booking_lahan tbl
        on tba.kode_alternatif = tbl.kode_alternatif
        JOIN tb_admin tbad
        on tbl.id_user = tbad.id_user
        WHERE tbl.kode_alternatif = '$ID' AND tbad.id_user = $login
        ORDER BY tbl.id_booking_lahan DESC ");

        return $query->row();
    }

    public function tambah($fields)
    {
        $this->db->insert($this->table, $fields);
        $this->db->query("INSERT INTO tb_rel_alternatif(kode_kriteria, kode_alternatif, nilai) 
            SELECT kode_kriteria, '$fields[kode_alternatif]', 0  FROM tb_kriteria");
    }

    public function ubah($fields, $ID)
    {
        $this->db->update($this->table, $fields, array($this->kode => $ID));
    }

    public function hapus($ID)
    {
        $this->db->delete($this->table, array($this->kode => $ID));
        $this->db->delete('tb_rel_alternatif', array($this->kode => $ID));
    }
}