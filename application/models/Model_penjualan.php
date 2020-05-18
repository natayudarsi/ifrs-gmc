<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_penjualan extends CI_Model {

	public function daftarpenjualan()
	{
		//$data = "select * from detailpenjualan";
		$data = "SELECT DISTINCT(no_penjualan), nama_pasien, tgl_penjualan FROM `detailpenjualan` WHERE proses='1' order by no_penjualan desc";
		return $this->db->query($data);
	}

	public function detailpenjualan($key)
	{
		$this->db->where('no_penjualan', $key);
		return $this->db->get('detail_penjualan');
	}

	public function detailpenjualan2($key)
	{
		$this->db->where('no_penjualan', $key);
		return $this->db->get('penjualan');
	}

	public function detail_adddetailpenjualan($noinvoicesakhir)
	{
		$this->db->where('no_penjualan', $noinvoicesakhir);
		return $this->db->get('detailpenjualan');
	}

	public function detail_addpenjualan($noinvoicesakhir)
	{
		$this->db->where('no_penjualan', $noinvoicesakhir);
		return $this->db->get('penjualan');
	}

	//no penjualan terakhir+1
	public function noinvoices()
	{
		$data = $this->db->query("select max(right(no_penjualan,4)) As kd_max from penjualan where date(tgl_penjualan) = curdate()");
		$kd="";
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
		return date('ymd').$kd;
	}

	//nomor penjualan terakhir
	public function getnopenjualan()
	{
		$data = $this->db->query("select max(no_penjualan) As kd_max from penjualan");
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

		$this->db->insert('penjualan' , $data);
		$this->db->insert_id();

		$this->db->insert('detail_penjualan' , $data1);

		$this->db->trans_complete();
		
	}

	public function search_obat($nama_obat){
        $this->db->like('nama_obat', $nama_obat , 'both');
        $this->db->where('stok>','30');
        $this->db->order_by('id_obat', 'ASC');
        $this->db->limit(10);
        return $this->db->get('obat')->result();
    }

    public function getinsert_detail($data)
    {
    	$this->db->insert('detail_penjualan', $data);
    }

    public function hapus_detail($key1,$key)
    {
    	$this->db->where('no_penjualan',$key);
    	$this->db->where('id_obat', $key1);
    	$this->db->delete('detail_penjualan');
    }

    // setelah transaksi selesai klik simpan/submit edit proses jadi 1
    public function getsimpansemua($data)
    {
    	$this->db->set('proses', '1', FALSE);
		$this->db->where('no_penjualan', $data);
		$this->db->update('detail_penjualan');
    }

    public function hapus_detailpenjualan($key)
    {
    	$this->db->where('no_penjualan', $key);
    	$this->db->delete('detail_penjualan');
    }

    public function hapus_penjualan($key)
    {
    	$this->db->where('no_penjualan', $key);
    	$this->db->delete('penjualan');
    }
}