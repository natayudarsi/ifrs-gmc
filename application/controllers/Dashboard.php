<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('admin');
        $this->load->model('model_dashboard');
    }

	public function index()
	{
		if($this->admin->logged_id())
		{
			if($this->model_dashboard->warning_obat()->num_rows() == 0)
			{
			$isi['namalogin'] = $this->admin->namalogin();
			$isi['total_obatkeluar'] = $this->admin->total_obatkeluar();
			$isi['totalpembelian'] = $this->admin->totalpembelian();
			$isi['content'] = 'dashboard';
			$isi['search']	= 'charts';
			$isi['data'] = $this->model_dashboard->obat_terlaris();
			$isi['warning'] = $this->model_dashboard->warning_obat();
			$isi['peringatan'] = 'kosong';
		}
		else
		{
			$isi['namalogin'] = $this->admin->namalogin();
			$isi['total_obatkeluar'] = $this->admin->total_obatkeluar();
			$isi['totalpembelian'] = $this->admin->totalpembelian();
			$isi['content'] = 'dashboard';
			$isi['search']	= 'charts';
			$isi['data'] = $this->model_dashboard->obat_terlaris();
			$isi['warning'] = $this->model_dashboard->warning_obat();
			$isi['peringatan'] ='peringatan1';
		}

			$this->load->view("home",$isi);			

		}else{

			//jika session belum terdaftar, maka redirect ke halaman login
			redirect("login");

		}
	}


public function test(){

	$query = $this->db->query("select * from obat where stok <= 50");
	
	if($query->num_rows() > 0){
	foreach($query->result() as $query)
    		
    		{
    			echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Stok Obat Tidak Cukup!'.$query->stok.'</div>');
			    
    		}
    		redirect('Dashboard');
    	}
}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

}
