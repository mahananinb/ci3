<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class open extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_berita');
	}
	
	function index()
	{
		//$this->load->view('Home');
		$x['data']=$this->m_berita->get_all_berita();
		$this->load->view('Home',$x);
	}
	
	function about()
	{
		$this->load->view('About');
	}
	


	function lists(){
		$x['data']=$this->m_berita->get_all_berita();
		$this->load->view('Home',$x);
	}

	function view(){
		$kode=$this->uri->segment(3);
		$x['data']=$this->m_berita->get_berita_by_kode($kode);
		$this->load->view('V_news',$x);
	}

} 