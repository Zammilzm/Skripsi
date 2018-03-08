<?php
class Alternatif_model extends CI_Model {
    
    protected $table = 'tb_alternatif';
    protected $kode = 'kode_alternatif';
    
    public function tampil( $search='' )
    {                
        $this->db->like( $this->kode, $search );
        $this->db->or_like( 'nama_alternatif', $search );
        $this->db->order_by( $this->kode );
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function peringkat_lahan(){
        $this->db->from($this->table);
        $this->db->order_by("nf","desc");
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_alternatif( $ID = null )
    {
        $query = $this->db->get_where($this->table, array ( $this->kode => $ID ));                
        return $query->row();
    }

    public function get_alternatif_lahan_user($ID = NULL)
    {
        $query = $this->db->query("SELECT *
        FROM tb_alternatif 
        WHERE kode_alternatif = '$ID'
        LIMIT 1");

        return $query->row();
    }
            
    public function tambah( $fields )
    {
        $this->db->insert($this->table, $fields);
        $this->db->query("INSERT INTO tb_rel_alternatif(kode_kriteria, kode_alternatif, nilai) 
            SELECT kode_kriteria, '$fields[kode_alternatif]', 0  FROM tb_kriteria");
    }
    
    public function ubah( $fields, $ID )
    {
        $this->db->update($this->table, $fields, array($this->kode => $ID));                  
    }
    
    public function hapus( $ID )
    {
        $this->db->delete($this->table, array($this->kode=> $ID));
        $this->db->delete('tb_rel_alternatif', array($this->kode=> $ID));
    }
}