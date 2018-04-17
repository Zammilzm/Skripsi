<?php
class Kriteria_model extends CI_Model {
    
    protected $table = 'tb_kriteria';
    protected $kode = 'kode_kriteria';
    
    public function tampil()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
    public function get_kriteria( $ID = null )
    {
        $query = $this->db->get_where($this->table, array ( $this->kode => $ID ));                
        return $query->row();
    }
            
    public function tambah($fields)
    {
        $this->db->insert($this->table, $fields);
        $this->db->query("INSERT INTO tb_rel_alternatif(kode_kriteria, kode_alternatif, nilai) 
            SELECT '$fields[kode_kriteria]', kode_alternatif, 0  FROM tb_alternatif");         
    }
    
    public function ubah($fields, $ID)
    {                          
        $this->db->update($this->table, $fields, array($this->kode => $ID));                  
    }
    
    public function hapus( $ID )
    {
        $this->db->delete($this->table, array($this->kode=> $ID));
        $this->db->delete('tb_rel_alternatif', array($this->kode=> $ID));
    }
}