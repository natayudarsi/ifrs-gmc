<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('admin');
        $this->load->model('model_obat');
    }

    public function index()
    {
    	if($this->admin->logged_id())
    	{
	    	$isi['namalogin'] = $this->admin->namalogin();
			$isi['content'] = 'Obat/detail_obat';
			$isi['data'] = $this->model_obat->daftarobat();
            $isi['search'] = 'Obat/_search';
			$this->load->view('home',$isi);
		}
		else
		{
			redirect('login');
		}
    }

    public function addobat()
    {
    	if($this->admin->logged_id())
    	{
    		$isi['namalogin'] = $this->admin->namalogin();
    		$isi['content'] = 'Obat/add_obat';
            $isi['search'] = 'kosong';
    		$this->load->view('home',$isi);
    	}
    	else
    	{
    		redirect('login');
    	}
    }

    public function simpan()
    {
    	$idobat = $this->input->post('id_obat');
    	$query = $this->db->query("select * from obat where id_obat = '$idobat'");
    	if($query->num_rows() > 0)
    	{
    		echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Id Obat Sudah Ada!</div>');
    		redirect('obat/addobat');
    	}
    	else
    	{
    		$data['id_obat'] = $this->input->post('id_obat');
    		$data['nama_obat'] = $this->input->post('nama_obat');
    		$data['jenis'] = $this->input->post('jenis');
    		$data['letak'] = $this->input->post('letak');
    		$data['stok'] = $this->input->post('stok');

    		$this->model_obat->getinsert($data);
    		redirect('obat');
    	}

    }

    public function edit()
    {
    	if($this->admin->logged_id())
    	{
    		$isi['namalogin'] = $this->admin->namalogin();
    		$isi['content'] = 'obat/edit_obat';
            $isi['search'] = 'kosong';

    		$key = $this->uri->segment(3);
    		$query = $this->db->query("select * from obat where id_obat = '$key'");

    		if($query->num_rows() > 0)
    		{
    			foreach ($query->result() as $row) 
    			{
    				$isi['id_obat'] = $row->id_obat;
    				$isi['nama_obat'] = $row->nama_obat;
    				$isi['jenis'] = $row->jenis;
    				$isi['stok'] = $row->stok;
    				$isi['letak'] = $row->letak;
    			}
    		}
    		$this->load->view('home', $isi);
    	}
    	else
    	{
    		redirect('login');
    	}
    }

    public function update()
    {
    	$key = $this->input->post('id_obat');
    	$data['id_obat'] = $this->input->post('id_obat');
    	$data['nama_obat'] = $this->input->post('nama_obat');
    	$data['jenis'] = $this->input->post('jenis');
    	$data['stok'] = $this->input->post('stok');
    	$data['letak'] = $this->input->post('letak');

    	$this->model_obat->getupdate($key,$data);
    	redirect('obat');
    }

    public function delete()
    {
    	$key = $this->uri->segment(3);
    	$this->model_obat->getdelete($key);
    	redirect('obat');
    }

    function search()
    {
        $this->load->view('obat/search');
    }

    function fetch()
    {
        $output = '';
        $query = '';
        $this->load->model('ajaxsearch_model');
        if($this->input->post('query'))
        {
            $query = $this->input->post('query');
        }
        $data = $this->ajaxsearch_model->fetch_data($query);
        if ($this->session->userdata("user_level") == '1'){
            $output .= '
            <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                        <thead>
                            <tr>
                                
                                <th>Id Obat</th>
                                <th>Nama Obat</th>
                                <th>Jenis</th>
                                <th>Stok</th>
                                <th>Letak</th>
                                <th>Aksi</th>
                                

                            </tr>
                            </thead>
            ';
            if($data->num_rows() > 0)
            {
                foreach($data->result() as $row)
                {
                    
                    $output .= '
                        <tbody>
                            <tr>
                               
                                <td>'.$row->id_obat.'</td>
                                <td>'.$row->nama_obat.'</td>
                                <td>'.$row->jenis.'</td>
                                <td>'.$row->stok.'</td>
                                <td>'.$row->letak.'</td>
                                
                                <td>
                                    <a href="obat/edit/'.$row->id_obat.'"><span class="error"><span class="fas fa-pencil-square"></a>&nbsp;&nbsp;&nbsp;
                                        <a href="obat/delete/'.$row->id_obat.'"><span class="error"><span class="fas fa-eraser"></a>
                                </td>
                          
                            </tr>
                            </tbody>
                    ';
                }
            }
            else
            {
                $output .= '<tr>
                                <td colspan="5">No Data Found</td>
                            </tr>';
            }
            $output .= '</table>';
        }
        else{
            $output .= '
            <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                        <thead>
                            <tr>
                                
                                <th>Id Obat</th>
                                <th>Nama Obat</th>
                                <th>Jenis</th>
                                <th>Stok</th>
                                <th>Letak</th>
                              

                            </tr>
                            </thead>
            ';
            if($data->num_rows() > 0)
            {
                foreach($data->result() as $row)
                {
                    
                    $output .= '
                        <tbody>
                            <tr>
                               
                                <td>'.$row->id_obat.'</td>
                                <td>'.$row->nama_obat.'</td>
                                <td>'.$row->jenis.'</td>
                                <td>'.$row->stok.'</td>
                                <td>'.$row->letak.'</td>

                            </tr>
                            </tbody>
                    ';
                }
            }
            else
            {
                $output .= '<tr>
                                <td colspan="5">No Data Found</td>
                            </tr>';
            }
            $output .= '</table>';
        }
        echo $output;
    }
}