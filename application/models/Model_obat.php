<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_obat extends CI_Model {

	Public function daftarobat()
	{
		$data = "select * from obat ORDER BY id_obat ASC";
		return $this->db->query($data);
	}

	Public function getinsert($data)
	{
		$this->db->insert('obat',$data);
	}

	Public function getupdate($key, $data)
	{
		$this->db->where('id_obat',$key);
		$this->db->update('obat',$data);
	}

	Public function getdelete($key)
	{
		$this->db->where('id_obat',$key);
		$this->db->delete('obat');
	}

}