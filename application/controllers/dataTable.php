<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dataTable extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_berita');
	}

	public function index()
	{
		// Dapatkan data artikel dari model
		$artikel['data'] = $this->M_berita->get_all_tabel_artikel();
		$this->load->view('dataTableView', $artikel);
	}

	public function get_json()
	{
		$artikel['data'] = $this->M_berita->get_all_tabel_artikel();
		
		// Tampilkan dalam bentuk format
		echo json_encode($artikel);
	}

	public function view_json()
	{
		$this->load->view('dataTableView/dt_json');
	}

}
