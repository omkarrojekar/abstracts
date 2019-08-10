<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function index()
	{
		
	}

	public function not_found()
	{
		//$this->load->view('layout/header');
		$this->load->view('public/admin/pagenotfound');
		//$this->load->view('layout/footer');
	}
}
