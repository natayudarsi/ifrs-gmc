<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Penjualan extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin');
		$this->load->model('model_penjualan');
	}

	public function index()
	{
		if($this->admin->logged_id())
		{
			$isi['namalogin'] = $this->admin->namalogin();
			$isi['content'] = 'penjualan/daftar_penjualan';
			$isi['search'] = 'kosong';
			$isi['data'] = $this->model_penjualan->daftarpenjualan();
			$this->load->view('home', $isi);
		}
		else
		{
			redirect('login');
		}
	}

	public function detailpenjualan()
	{
		if($this->admin->logged_id())
		{
			$key = $this->uri->segment(3);
			$isi['namalogin'] = $this->admin->namalogin();
			$isi['content'] = 'penjualan/detail_penjualan';
			$isi['search'] = 'kosong';
			//$isi['data'] = $this->model_penjualan->detailpenjualan($key);
			$isi['data'] = $this->model_penjualan->detail_adddetailpenjualan($key);
			$isi['data2'] = $this->model_penjualan->detailpenjualan2($key);
			$this->load->view('home',$isi);
		}
		else
		{
			redirct('login');
		}
	}

	public function addpenjualan()
	{
		if($this->admin->logged_id())
		{
			
			$isi['sc_obat'] = 'script/autoload_obat';
			$isi['namalogin'] = $this->admin->namalogin();
			$isi['noinvoice'] = $this->model_penjualan->noinvoices();
			$isi['noinvoiceakhir'] = $this->model_penjualan->getnopenjualan();
			$noinvoiceakhir = $this->model_penjualan->getnopenjualan();
			$data = $this->db->query("select * from detail_penjualan where proses='1' and no_penjualan ='$noinvoiceakhir'");
			

			if($data->num_rows() < 1)
			{
				$isi['data1'] = $this->model_penjualan->detail_addpenjualan($noinvoiceakhir);
				$isi['data'] = $this->model_penjualan->detail_adddetailpenjualan($noinvoiceakhir);
				$isi['content'] = 'penjualan/add_detailpenjualan';
				$isi['search'] ='penjualan/_autoloadobat';
				$this->load->view('home',$isi);
			}
			else
			{	
			
				$isi['content'] = 'penjualan/add_penjualan';
				$isi['search'] ='penjualan/_autoloadobat';
				$this->load->view('home', $isi);
			}
		}
		else
		{
			redirect('login');
		}
	}

	public function simpan()
	{
		$key = $this->input->post('id_obat');
		$jumlah = $this->input->post('jumlah');
    	$obat = $this->db->query("select * from obat where id_obat='$key'");

    	if(($obat->result(stok))<$jumlah)
    		{
    			echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Stok Obat Tidak Cukup!</div>');
			    redirect('penjualan/addpenjualan');
    		}
    		else
    		{

		$data['no_penjualan'] = $this->input->post('no_penjualan');
		$data['tgl_penjualan'] =$this->input->post('tgl_penjualan');
		$data['id_karyawan'] = $this->input->post('id_karyawan');
		$data['nama_pasien'] = $this->input->post('nama_pasien');
		$data['tlp_pasien'] = $this->input->post('tlp_pasien');
		$data['alamat_pasien'] = $this->input->post('alamat_pasien');

		$data1['no_penjualan'] = $this->input->post('no_penjualan');
		$data1['id_obat'] = $this->input->post('id_obat');
		$data1['jumlah'] = $this->input->post('jumlah');
    	$data1['total_harga'] = substr($this->input->post('harga_jual'), 3) * $this->input->post('jumlah');


		$this->model_penjualan->getinsert($data, $data1);
		redirect('penjualan/addpenjualan');

		}	
}

	//auto id obat
    public function get_autocomplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->model_penjualan->search_obat($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
            		'label' => $row->nama_obat,
            		'id_obat' => $row->id_obat,
            		'harga_jual' =>$row->harga_jual,
            		'stok' => $row->stok,
            		'jenis' =>$row->jenis
            	);
                echo json_encode($arr_result);
            }
        }
    }

    public function simpandetail()
    {
    	$key = $this->input->post('id_obat');
    	$key1 = $this->model_penjualan->getnopenjualan();
    	$jumlah = $this->input->post('jumlah');
    	$obat = $this->db->query("select * from obat where id_obat='$key'");
    	$query = $this->db->query("select * from detail_penjualan where id_obat='$key' AND no_penjualan='$key1'");

    	foreach($obat->result() as $obat){
    		if(($obat->stok)<$jumlah)
    		{
    			echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Stok Obat Tidak Cukup!</div>');
			    redirect('penjualan/addpenjualan');
    		}
    		else
    		{
    	
		    	if($query->num_rows() > 0)
		    	{
		    		echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Obat sudah diinputkan!</div>');
			        redirect('penjualan/addpenjualan');  
		    	}
		    	else
		    	{
		    		$data['no_penjualan'] = $this->input->post('no_penjualan');
			    	$data['id_obat'] = $this->input->post('id_obat');
			    	$data['jumlah'] = $this->input->post('jumlah');
			    	$data['total_harga'] = substr($this->input->post('harga_jual'), 3) * $this->input->post('jumlah');

			    	$this->model_penjualan->getinsert_detail($data);
			    	redirect('penjualan/addpenjualan');
		    	}
		    }
	    }
    }

    public function hapus_detail()
    {
    	$key1 = $this->uri->segment(3);
    	$key = $this->model_penjualan->getnopenjualan();
    	$this->model_penjualan->hapus_detail($key1,$key);
    	redirect('penjualan/addpenjualan');
    }

    public function simpansemua()
    {
    	$data = $this->model_penjualan->getnopenjualan();
    	$this->model_penjualan->getsimpansemua($data);
    	redirect('penjualan');
    }

    public function hapus()
    {
    	$key = $this->uri->segment(3);
    	$this->model_penjualan->hapus_detailpenjualan($key);
    	$this->model_penjualan->hapus_penjualan($key);
    	redirect('penjualan');
    }

}