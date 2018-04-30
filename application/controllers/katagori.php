<?php
defined('BASEPATH') or exit('No direct script access allowed');

class katagori extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
 
		// Load custom helper applications/helpers/MY_helper.php
		$this->load->helper('MY');

		// Load semua model yang kita pakai
		$this->load->model('M_berita');
		$this->load->model('m_katagori');
	}

	public function index() 
	{

		// Judul Halaman
		$data['page_title'] = 'List Kategori';

		// Dapatkan semua kategori
		$data['categories'] = $this->m_katagori->get_all_categories();

		$this->load->view('V_katagori',$data);
	}

	public function create() 
	{
		// Judul Halaman
		$data['page_title'] = 'Buat Kategori';

		// Kita butuh helper dan library berikut
		$this->load->helper('form');
		$this->load->library('form_validation');
 
		// Form validasi untuk Nama Kategori
		$this->form_validation->set_rules(
			'nama_katagori',
			'Nama Kategori',
			'required|is_unique[tbl_katagori.nama_katagori]',
			array(
				'required' => 'Isi %s donk, males amat.',
				'is_unique' => 'Judul ' . $this->input->post('title') . ' sudah ada bosque.'
			)
		);

		if($this->form_validation->run() === FALSE){
			$this->load->view('V_newkatagori', $data);
		} else {
			$this->m_katagori->create_category();
			redirect('katagori');
		}

		$id=$this->input->post('id_katagori');
        $kat=$this->input->post('nama_katagori');
	}

	// Menampilkan semua artikel dalam kategori yang dipilih
	public function artikel($id_katagori) 
	{

		// Menampilkan judul berdasar nama kategorinya
		$data['page_title'] = $this->m_katagori->get_category_by_id($id_katagori)->nama_katagori;

		// Dapatkan semua artikel dalam kategori ini
		$data['all_artikel'] = $this->m_katagori->get_artikel_by_category($id_katagori);

		// Kita gunakan view yang sama pada controller Blog
		$this->load->view('v_news', $data);
	}

	public function edit($id = NULL)
	{

		//$data['page_title'] = 'Edit Kategori';

		// Get artikel dari model berdasarkan $id
		$data['katagori'] = $this->m_katagori->get_category_by_id($id);
		// Jika id kosong atau tidak ada id yg dimaksud, lempar user ke halaman list category
		if ( empty($id) || !$data['katagori'] ) redirect('open');

		// Kita butuh helper dan library berikut
	    $this->load->helper('form');
	    $this->load->library('form_validation');

	    // Cek apakah input valid atau tidak
	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('v_edit_katagori', $data);

	    } else {

	    	$post_data = array(
	    	    'nama_katagori' => $this->input->post('nama_katagori'),
	    	    'desk_katagori' => $this->input->post('desk_katagori'),
	    	);
	     if ($this->m_katagori->update_category($post_data, $id)) {
		        $this->load->view('Home', $data);
	        } else {
		        $this->load->view('Home', $data);
	        }    
	    }
	}

	public function delete()
	{

		$id_katagori = $this->uri->segment(3);
            $this->m_katagori->delete_category($id_katagori);
            redirect('katagori/index','refresh');

	}
}