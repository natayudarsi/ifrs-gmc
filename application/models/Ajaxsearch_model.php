<?php
class Ajaxsearch_model extends CI_Model
{
	function fetch_data($query)
	{
		$this->db->select("*");
		$this->db->from("obat");
		if($query != '')
		{
			$this->db->like('id_obat', $query);
			$this->db->or_like('nama_obat', $query);
			$this->db->or_like('jenis', $query);
		}
		$this->db->order_by('id_obat', 'ASC');
		return $this->db->get();
	}
}
?>