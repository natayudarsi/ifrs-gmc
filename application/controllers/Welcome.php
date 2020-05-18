<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		$isi['content'] = 'dashboard';
		$this->load->view('home',$isi);
	}
}
