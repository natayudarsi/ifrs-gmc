<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Pembelian extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin');
		$this->load->model('model_pembelian');
	}

	public function index()
	{
		if($this->admin->logged_id())
		{
			$isi['namalogin'] = $this->admin->namalogin();
			$isi['content'] = 'pembelian/daftar_pembelian';
			$isi['search'] = 'kosong';
			$isi['data'] = $this->model_pembelian->daftarpembelian();
			$this->load->view('home', $isi);
		}
		else
		{
			redirect('login');
		}
	}

	public function detailpembelian()
	{
		if($this->admin->logged_id())
		{
			$key = $this->uri->segment(3);
			$isi['namalogin'] = $this->admin->namalogin();
			$isi['content'] = 'pembelian/detail_pembelian';
			$isi['search'] = 'kosong';
			//$isi['data'] = $this->model_pembelian->detailpembelian($key);
			$isi['data'] = $this->model_pembelian->detail_adddetailpembelian($key);
			$isi['data2'] = $this->model_pembelian->detailpembelian2($key);
			$this->load->view('home', $isi);
		}
		else
		{
			redirect('login');
		}
	}

	public function addpembelian()
	{
		if($this->admin->logged_id())
		{
			$isi['sc_obat'] = 'script/autoload_obat';
			$isi['namalogin'] = $this->admin->namalogin();
			$isi['noinvoice'] = $this->model_pembelian->noinvoices();
			$isi['noinvoiceakhir'] =$this->model_pembelian->getnopembelian();
			$noinvoiceakhir =$this->model_pembelian->getnopembelian();
			$data = $this->db->query("select * from detail_pembelian where proses='1' and no_pembelian='$noinvoiceakhir'");

			if($data->num_rows() < 1)
			{
				$isi['data1'] = $this->model_pembelian->detail_addpembelian($noinvoiceakhir);
				$isi['data'] = $this->model_pembelian->detail_adddetailpembelian($noinvoiceakhir);
				$isi['content'] = 'pembelian/add_detailpembelian';
				$isi['search'] ='pembelian/_autoloadobat';
				$this->load->view('home',$isi);
			}
			else
			{
				$isi['content'] = 'pembelian/add_pembelian';
				$isi['search'] ='pembelian/_autoloadobat';
				$this->load->view('home',$isi);
			}
		}
		else
		{
			redirect('login');
		}
	}

	public function simpan()
	{
		$data['no_pembelian'] = $this->input->post('no_pembelian');
		$data['tgl_pengiriman'] = $this->input->post('tgl_pengiriman');
		$data['id_karyawan'] = $this->input->post('id_karyawan');
		$data['nama_pbo'] =$this->input->post('nama_pbo');

		$data1['no_pembelian'] = $this->input->post('no_pembelian');
    	$data1['id_obat'] = $this->input->post('id_obat');
    	$data1['jumlah'] = $this->input->post('jumlah');

		$this->model_pembelian->getinsert($data, $data1);
		redirect('pembelian/addpembelian');
	}

		//auto id obat
    public function get_autocomplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->model_pembelian->search_obat($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
            		'label' => $row->nama_obat,
            		'id_obat' => $row->id_obat,
            		'harga_beli' => $row->harga_beli,
            		'stok' => $row->stok,
            		'jenis' => $row->jenis
            	);
                echo json_encode($arr_result);
            }
        }
    }

    public function simpandetail()
    {
    	$key = $this->input->post('id_obat');
    	$key1 = $this->model_pembelian->getnopembelian();
    	$query = $this->db->query("select * from detail_pembelian where no_pembelian='$key1' AND id_obat='$key'");

    	if($query->num_rows() > 0)
    	{
    		echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Obat sudah diinputkan!</div>');
	        redirect('pembelian/addpembelian');  
    	}
    	else
    	{
    	$data['no_pembelian'] = $this->input->post('no_pembelian');
    	$data['id_obat'] = $this->input->post('id_obat');
    	$data['jumlah'] = $this->input->post('jumlah');
    	
    	$this->model_pembelian->getinsert_detail($data);
    	redirect('pembelian/addpembelian');
    	}	
    }

    public function hapus_detail()
    {
    	$key = $this->model_pembelian->getnopembelian();
    	$key1 = $this->uri->segment(3);
    	$this->model_pembelian->hapus_detail($key,$key1);
    	redirect('pembelian/addpembelian');
    }

    public function simpansemua()
    {
    	$data = $this->model_pembelian->getnopembelian();
    	$this->model_pembelian->getsimpansemua($data);
    	redirect('pembelian');
    }

    public function hapus()
    {
    	$key = $this->uri->segment(3);
    	$this->model_pembelian->hapus_detailpembelian($key);
    	$this->model_pembelian->hapus_pembelian($key);
    	redirect('pembelian');
    }
}