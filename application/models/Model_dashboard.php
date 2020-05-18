<?php    
class Model_dashboard extends CI_Model{
    function report(){
        $query = $this->db->query("SELECT * from obat");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function obat_terlaris(){
    	$query	= $this->db->query("SELECT obat.id_obat, obat.nama_obat, sum(detail_penjualan.jumlah) as jumlah from obat, detail_penjualan where obat.id_obat = detail_penjualan.id_obat group by obat.id_obat order by jumlah desc limit 10");

    	if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function warning_obat(){
        $this->db->where('stok<','30');
        return $this->db->get('obat');
    }
}