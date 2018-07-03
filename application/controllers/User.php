<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
				
		$this->load->library('form_validation');
		$this->load->helper('MY');
		$this->load->model('user_model');
	}

	// Register user
	public function register(){
		$data['page_title'] = 'Pendaftaran User';

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]');

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('register', $data);
		} else {
			// Encrypt password
			$enc_password = md5($this->input->post('password'));

			$this->user_model->register($enc_password);

			// Set message
			$this->session->set_flashdata('user_registered', 'Anda telah teregistrasi.');

			redirect('User/login');
		}
	}

	// Log in user
	public function login(){
		$data['page_title'] = 'Log In';

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('login', $data);
		} else {
			
	// Get username
	$username = $this->input->post('username');
	// Get & encrypt password
	$password = md5($this->input->post('password'));

	// Login user
	$id_user = $this->user_model->login($username, $password);

	if($id_user){
		// Buat session
		$user_data = array(
			'id_User' => $id_user,
			'username' => $username,
			'logged_in' => true,
			'level' => $this->user_model->get_user_level($id_user),
		);

		$this->session->set_userdata($user_data);

		// Set message
		$this->session->set_flashdata('user_loggedin', 'Anda sudah login');

		redirect('user/dashboard');
	} else {
		// Set message
		$this->session->set_flashdata('login_failed', 'Login invalid');

		redirect('user/login');
	}		
		}
	}

	// Log user out
	public function logout(){
		// Unset user data
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('id_User');
		$this->session->unset_userdata('username');

		// Set message
		$this->session->set_flashdata('user_loggedout', 'Anda sudah log out');

		redirect('user/login');
	}
//untuk memanggil sesion level 
	public function get_userdata(){
        $userData = $this->session->userdata();
        return $userData;
    }

	function dashboard()
	{
		// Must login
		if(!$this->session->userdata('logged_in')) 
			redirect('user/login');

		$id_user = $this->session->userdata('id_User');

		// Dapatkan detail dari User
		$data['user'] = $this->user_model->get_user_details( $id_user );

		$userData = $this->get_userdata();
        if ($userData['fk_level_id'] === '1'){
            $this->load->view('templates/header');
            $this->load->view('userWow', $data);
        } else if ($userData['fk_level_id'] === '2'){
            $this->load->view('templates/header');
            $this->load->view('userBiasa', $data);
        } else if ($userData['fk_level_id'] === '3') {
            $this->load->view('templates/header');
            $this->load->view('v_dashboard', $data);
        }
	}
	
}