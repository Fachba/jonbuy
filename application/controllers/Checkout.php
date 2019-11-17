<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends CI_Controller {

	var $API ="";

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date','url','form');
		$this->load->library('form_validation');
		$this->load->model('keranjang_model');
		$this->API="http://dev.farizdotid.com/api/daerahindonesia";
		$status=$this->session->userdata('statusjb');
		if ($status=="") 
		{
			redirect('Login','refresh');
		}
	}

	public function index()
	{
			$idpelanggan=$this->session->userdata('id_pelanggan');
			$data['prov']=json_decode($this->curl->simple_get($this->API.'/provinsi'));
			$this->load->view('toko/checkout.php',$data);
	}	

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */ 