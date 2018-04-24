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
		$data['catagories'] = $this->m_katagori->get_all_categories();

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
	}

	// Menampilkan semua artikel dalam kategori yang dipilih
	public function artikel($id) 
	{

		// Menampilkan judul berdasar nama kategorinya
		$data['page_title'] = $this->category_model->get_category_by_id($id)->cat_name;

		// Dapatkan semua artikel dalam kategori ini
		$data['all_artikel'] = $this->blog_model->get_artikel_by_category($id);

		// Kita gunakan view yang sama pada controller Blog
		$this->load->view('templates/header');
		$this->load->view('blogs/blog_view', $data);
		$this->load->view('templates/footer');
	}
}