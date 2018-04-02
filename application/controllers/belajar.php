<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belajar extends CI_Controller {
	function __construct(){
 		parent::__construct();
 		$this->load->model('m_data');
 	}


	function biodata(){
		$data['biodata'] = $this->m_data->get_data()->result();
		$this->load->view('V_data.php',$data);
	}
}