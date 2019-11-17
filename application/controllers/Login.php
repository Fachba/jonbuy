<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->helper('url','date','form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('user_model');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function cekLogin()
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','username','trim|required');
		$this->form_validation->set_rules('password','password','trim|required|callback_cekDb');
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view('login');
		} else 
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->session->set_userdata('username',$username);
			$this->session->set_userdata('password',$password);
			
			$cek=$this->user_model->login($username,$password)->row_array();
			$id_pelanggan = $cek['id_pelanggan'];
			$nama_pelanggan = $cek['nama_pelanggan'];
			$email = $cek['email'];
			$nomor = $cek['telp'];

			$this->session->set_userdata('id_pelanggan',$id_pelanggan);
			$this->session->set_userdata('nama_pelanggan',$nama_pelanggan);
			$this->session->set_userdata('email',$email);
			$this->session->set_userdata('nomor',$nomor);

			$this->session->set_userdata('statusjb','login');
			redirect('Sangar','refresh');
		}
	}

	public function cekDb($password)
	{
		
		$username = $this->input->post('username');
		$result = $this->user_model->login($username,$password);
		if($result)
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('cekDb',"Login Gagal Username dan Password tidak valid");
			return false;
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('Sangar','refresh');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
 ?>