<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class open extends CI_Controller {
	
	function __construct(){ 
		parent::__construct();
		$this->load->model('m_berita');
		$this->load->library('upload');
		$this->load->model('m_katagori');
	}
	 
	function index()
	{

		$limit_per_page = 1;

		// URI segment untuk mendeteksi "halaman ke berapa" dari URL
		$start_index = ( $this->uri->segment(3) ) ? $this->uri->segment(3) : 0;

		// Dapatkan jumlah data 
		$total_records = $this->m_berita->get_total();
		
		if ($total_records > 0) {
			// Dapatkan data pada halaman yg dituju
			$data["artikel"] = $this->m_berita->get_all_tabel_artikel($limit_per_page, $start_index);
			
			// Konfigurasi pagination
			$config['base_url'] = base_url() . 'blog/index';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config['uri_segment'] = 3;
			
			$this->pagination->initialize($config);
				
			// Buat link pagination
			$data['links'] = $this->pagination->create_links();
		}
		$this->load->view('Home',$data);
	}
	
	function about()
	{
		$this->load->view('About');
	}
	

	function news(){
		$data['category'] = $this->m_katagori->get_all_categories();
		$this->load->view('V_form',$data);
	}

	function simpan_post(){
		$config['upload_path'] = './assets/images/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

 		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['category'] = $this->m_katagori->get_all_categories();
	     $this->form_validation->set_rules('berita_judul', 'Berita Judul', 'required|is_unique[blogs.post_title]',
			array(
				'required' 		=> 'Isi %s donk, males amat.',
				'is_unique' 	=> 'Berita Judul <strong>' .$this->input->post('berita_judul'). '</strong> sudah ada bosque.'
			));

	    $this->upload->initialize($config);
	    if(!empty($_FILES['filefoto']['name'])){
	        if ($this->upload->do_upload('filefoto')){
	        	$gbr = $this->upload->data();
	            //Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']='./assets/images/'.$gbr['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= FALSE;
	            $config['quality']= '60%';
	            $config['width']= 710;
	            $config['height']= 420;
	            $config['new_image']= './assets/images/'.$gbr['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();

	            $gambar=$gbr['file_name'];
	            $id=$this->input->post('id');
                $jdl=$this->input->post('judul');
                $berita=$this->input->post('berita');
                $author=$this->input->post('author');
                $emailAuthor=$this->input->post('emailAuthor');
                $sumberBerita=$this->input->post('sumberBerita');
                $id_katagori=$this->input->post('id_katagori');

				$this->m_berita->simpan_berita($jdl,$berita,$gambar,$author,$emailAuthor,$sumberBerita,$id_katagori);
				redirect('open/index');
		}else{
			redirect('open');
	    }
	                 
	    }else{
			redirect('open');
		}
				
	}
	function view(){
		$kode=$this->uri->segment(3);
		$x['data']=$this->m_berita->get_berita_by_kode($kode);
		$this->load->view('V_news',$x);
	}

	public function delete_news(){
            $kode = $this->uri->segment(3);
            $this->m_berita->delete_news($kode);
            redirect('open/index','refresh');
        }

	public function edit($id){
		$this->load->model("m_berita");
		$this->load->model("m_katagori");
		$data['category'] = $this->m_katagori->get_all_categories();
		$data['tipe'] = "Edit";
		$data['default'] = $this->m_berita->get_single($id);

		if(isset($_POST['simpan'])){
			$this->m_berita->update($_POST, $id);
			redirect("open");
		}

		$this->load->view("V_edit",$data);
	}

	

}
