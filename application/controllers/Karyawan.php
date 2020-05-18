<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('admin');
        $this->load->model('model_karyawan');
    }

	public function index()
	{
		if($this->admin->logged_id())
		{
			if ($this->session->userdata("user_level") == '1'){
				$isi['namalogin'] = $this->admin->namalogin();
				$isi['content'] = 'Karyawan/detail_karyawan';
				$isi['search'] = 'kosong';
				$isi['data'] = $this->model_karyawan->daftarkaryawan();
				$this->load->view('home',$isi);
			}
			else
				{
					redirect('dashboard');
				}
		}
		else{
			redirect('login');
		}

	}

	public function addkaryawan()
	{
		if($this->admin->logged_id())
		{	
			$isi['namalogin'] = $this->admin->namalogin();
			$isi['content'] = 'Karyawan/add_karyawan';
			$this->load->view('home', $isi);
		}
		else{
			redirect('login');
		}
	}

	public function simpan()
	{		
		$idkar = $this->input->post('id_karyawan');
		$query = $this->db->query("select id_karyawan from karyawan_ifrs where id_karyawan ='$idkar'");
		if($query->num_rows() > 0){
				echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Id Karyawan Sudah Ada!</div>');
	            redirect('karyawan/addkaryawan');            	
		}
		else{
			$data['id_karyawan'] = $this->input->post('id_karyawan');
			$data['nama_karyawan'] = $this->input->post('nama_karyawan');
			$data['no_hp'] = $this->input->post('no_hp');
			$data['alamat'] = $this->input->post('alamat');
			$data['jabatan'] = $this->input->post('jabatan');
			$data1['id_karyawan'] = $this->input->post('id_karyawan');
			$data1['username'] = $this->input->post('username');
			$data1['password'] = md5($this->input->post('password'));
			$data1['level'] = $this->input->post('level');
			$data1['keterangan'] = $this->input->post('keterangan');

			$this->model_karyawan->getinsert($data, $data1);
			redirect('karyawan');
		}
	}

	public function edit()
	{
		if($this->admin->logged_id())
		{
			$isi['namalogin'] = $this->admin->namalogin();
			$isi['content'] = 'karyawan/edit_karyawan';

			$key = $this->uri->segment('3');
			$query = $this->db->query("select * from karyawan_ifrs, user_login where karyawan_ifrs.id_karyawan = user_login.id_karyawan AND karyawan_ifrs.id_karyawan ='$key'");

			if($query->num_rows() > 0)
			{
				foreach($query->result() as $row)
				{
					$isi['id_karyawan'] = $row->id_karyawan;
					$isi['nama_karyawan'] = $row->nama_karyawan;
					$isi['no_hp'] = $row->no_hp;
					$isi['alamat'] = $row->alamat;
					$isi['jabatan'] = $row->jabatan;
					$isi['username'] = $row->username;
					$isi['password'] = $row->password;
					$isi['level'] = $row->level;
					$isi['keterangan'] = $row->keterangan;
				}
			}
			$this->load->view('home', $isi);
		}
		else{
			redirect('login');
		}
	}

	public function update()
	{
		$key = $this->input->post('id_karyawan');
		$data['id_karyawan'] = $this->input->post('id_karyawan');
		$data['nama_karyawan'] = $this->input->post('nama_karyawan');
		$data['no_hp'] = $this->input->post('no_hp');
		$data['alamat'] = $this->input->post('alamat');
		$data['jabatan'] = $this->input->post('jabatan');

		$this->model_karyawan->getupdate($key,$data);
		redirect('karyawan');
	}

	public function delete()
	{
		$key = $this->uri->segment(3);
		$this->model_karyawan->getdelete($key);
		redirect('karyawan');
	}
}
