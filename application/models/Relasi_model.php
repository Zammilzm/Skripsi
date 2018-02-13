<?php
class Relasi_model extends CI_Model {

    public function tampil($search = '')
    {                           
        $query = $this->db->query("SELECT r.*, a.nama_alternatif
        FROM tb_rel_alternatif r
            INNER JOIN tb_kriteria k ON k.kode_kriteria=r.kode_kriteria
            INNER JOIN tb_alternatif a ON a.kode_alternatif=r.kode_alternatif            
        WHERE (a.kode_alternatif LIKE '%".$search."%' OR a.nama_alternatif LIKE '%".$search."%')
        ORDER BY r.kode_alternatif, r.kode_kriteria");
                                
        return $query->result();
    }
    
    public function get_relasi( $ID ) 
    {
        $query = $this->db->query("SELECT
            r.*, a.nama_alternatif, k.nama_kriteria
        FROM tb_rel_alternatif r 
        	INNER JOIN tb_kriteria k ON k.kode_kriteria=r.kode_kriteria
            INNER JOIN tb_alternatif a ON a.kode_alternatif=r.kode_alternatif            
        WHERE a.kode_alternatif='$ID' 
        ORDER BY r.kode_kriteria");
                
        return $query->result();
    }
                        
    public function ubah($kode_crips)
    {           
        foreach ($kode_crips as $key => $val){                   
            $this->db->update( 'tb_rel_alternatif', array('nilai' =>$val), array('ID' => $key));   
        }                       
    }    
}