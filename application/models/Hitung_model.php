<?php
class Hitung_model extends CI_Model {    
    public function get_data()
    {
        return $this->db->query("SELECT a.kode_alternatif, k.kode_kriteria, ra.nilai
            FROM tb_alternatif a 
            	INNER JOIN tb_rel_alternatif ra ON ra.kode_alternatif=a.kode_alternatif
            	INNER JOIN tb_kriteria k ON k.kode_kriteria=ra.kode_kriteria
            ORDER BY a.kode_alternatif, k.kode_kriteria")->result();
    }    
}