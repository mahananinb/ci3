<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class open extends CI_Controller {

	public function index()
	{
		$this->load->view('Home');
	}

	public function about()
	{
		$this->load->view('About');
	}
}