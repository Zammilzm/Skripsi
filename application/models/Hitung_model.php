<?php
class Hitung_model extends CI_Model {
    
    public function get_relasi()
    {
        $query = $this->db->query("SELECT * FROM tb_rel_alternatif ORDER BY kode_alternatif, kode_kriteria");            
        return $query->result();        
    }
    
    public function get_data()
    {
        $rows = $this->db->get('tb_alternatif')->result();
        foreach($rows as $row){
            $data['alternatif'][$row->kode_alternatif] = $row;
        }        
        $rows = $this->db->get('tb_kriteria')->result();
        foreach($rows as $row){
            $data['kriteria'][$row->kode_kriteria] = $row;
        }
        $data['relasi'] = $this->db->query("SELECT * FROM tb_rel_alternatif ORDER BY kode_alternatif, kode_kriteria")->result();
        
        return $data;
    }
    
    public function simpan_bobot($data)
    {
        foreach ($data['bobot'] as $key => $value) 
        {
            $this->db->update('kriteria', array ('bobot'=> $value), array ('kode_kriteria' => $key));
        }
        $this->db->update('paket_beasiswa', array('nilai_min' => $data['nilai_min']), array('id_beasiswa'=> $data['id_beasiswa']) );
    }    
    
    public function cetak ()
    {        
        $query = $this->db->query("SELECT * FROM pelamar_beasiswa p INNER JOIN mahasiswa m ON m.nim=p.nim ORDER BY p.total DESC");
        return $query->result();
    }
    
    public function simpan_hasil( $rank = array(), $total = array() )
    {        
        foreach ($rank as $key => $value)
        {            
            $this->db->update(
                'pelamar_beasiswa', 
                array ( 'total' => $total[$key], 'rank' => $value ), 
                array ( 'id_pelamar' => $key)
            );    
        }
    }
}