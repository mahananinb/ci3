<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class open extends CI_Controller {
	
	function __construct(){ 
		parent::__construct();
		$this->load->model('m_berita');
		$this->load->library('upload');
	}
	 
	function index()
	{
		$x['data']=$this->m_berita->get_all_berita();
		$this->load->view('Home',$x);
	}
	
	function about()
	{
		$this->load->view('About');
	}
	

	function news(){
		$this->load->view('V_form');
	}

	function simpan_post(){
		$config['upload_path'] = './assets/images/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	    $this->load->helper('form');
		$this->load->library('from_validation');
	    $this->form_validation->set_rules('judul', 'Judul Berita', 'trim|required');
	    $this->form_validation->set_rules('author', 'Nama Author', 'trim|required');
	    $this->form_validation->set_rules('sumberBerita', 'Sumber Berita', 'trim|required');

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

				$this->m_berita->simpan_berita($jdl,$berita,$gambar,$author,$emailAuthor,$sumberBerita);
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
		$data['tipe'] = "Edit";
		$data['default'] = $this->m_berita->get_single($id);

		if(isset($_POST['simpan'])){
			$this->m_berita->update($_POST, $id);
			redirect("open");
		}

		$this->load->view("V_edit",$data);
	}

}
