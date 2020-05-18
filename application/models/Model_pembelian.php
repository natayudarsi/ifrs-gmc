<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_pembelian extends CI_Model {

	public function daftarpembelian()
	{
		//$data = "select * from pembelian";
		$data = "SELECT DISTINCT(no_pembelian), nama_pbo, tgl_pengiriman FROM `lap_pembelian` WHERE proses='1' order by no_pembelian desc";
		return $this->db->query($data);
	}

	public function detailpembelian($key)
	{
		$this->db->where('no_pembelian', $key);
		return $this->db->get('detail_pembelian');
	}

	public function detailpembelian2($key)
	{
		$this->db->where('no_pembelian', $key);
		return $this->db->get('pembelian');
	}

	public function detail_addpembelian($noinvoiceakhir)
	{
		$this->db->where('no_pembelian', $noinvoiceakhir);
		return $this->db->get('pembelian');
	}

	public function detail_adddetailpembelian($noinvoiceakhir)
	{
		$this->db->where('no_pembelian', $noinvoiceakhir);
		return $this->db->get('lap_pembelian');
	}

		//no penjualan terakhir+1
	public function noinvoices()
	{
		$data = $this->db->query("select max(right(no_pembelian,4)) As kd_max from pembelian where date(tgl_pengiriman) = curdate()");
		$kd="";
		$beli = "B";
		if($data ->num_rows()>0){
			foreach($data->result() as $k){
				$tmp = ((int) $k->kd_max)+1;
				$kd = sprintf("%04s", $tmp);
			}
		}
		else{
			$kd="0001";
		}
		date_default_timezone_set('Asia/Jakarta');
		return $beli.date('ymd').$kd;
	}

		//nomor penjualan terakhir
	public function getnopembelian()
	{
		$data = $this->db->query("select max(no_pembelian) As kd_max from pembelian");
		$kd="";
		if($data ->num_rows()>0){
			foreach($data->result() as $k){
				$kd = ($k->kd_max);
			}
		}
		return $kd;
	}


	public function getinsert($data, $data1)
	{
		$this->db->trans_start();

		$this->db->insert('pembelian' , $data);
		$this->db->insert_id();

		$this->db->insert('detail_pembelian' , $data1);

		$this->db->trans_complete();
		
	}

	public function search_obat($nama_obat)
	{
        $this->db->like('nama_obat', $nama_obat , 'both');
         $this->db->where('stok>','30');
        $this->db->order_by('id_obat', 'ASC');
        $this->db->limit(10);
        return $this->db->get('obat')->result();
    }

    public function getinsert_detail($data)
    {
    	$this->db->insert('detail_pembelian', $data);
    }

	public function hapus_detail($key, $key1)
	{
		$this->db->where('no_pembelian', $key);
		$this->db->where('id_obat', $key1);
		$this->db->delete('detail_pembelian');
	}

	public function getsimpansemua($data)
	{
		$this->db->set('proses', '1', FALSE);
		$this->db->where('no_pembelian', $data);
		$this->db->update('detail_pembelian');
	}

	public function hapus_detailpembelian($key)
	{
		$this->db->where('no_pembelian', $key1);
		$this->db->delete('detail_pembelian');
	}

	public function hapus_pembelian($key)
	{
		$this->db->where('no_pembelian',$key);
		$this->db->delete('pembelian');
	}
}