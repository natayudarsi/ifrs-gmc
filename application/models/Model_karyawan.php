<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_karyawan extends CI_Model {

	public function daftarkaryawan()
	{
		$data ="select * from karyawan_ifrs";
		return $this->db->query($data);
	}

	public function getinsert($data, $data1)
	{
		$this->db->trans_start();

		$this->db->insert('karyawan_ifrs' , $data);
		$this->db->insert_id();

		$this->db->insert('user_login' , $data1);

		$this->db->trans_complete();
	}

	public function getupdate($key, $data)
	{
		$this->db->where('id_karyawan',$key);
		$this->db->update('karyawan_ifrs',$data);
	}

	public function getdelete($key)
	{
		$this->db->where('id_karyawan', $key);
		$this->db->delete('karyawan_ifrs');
	}
}