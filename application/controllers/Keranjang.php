<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keranjang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date','url','form');
		$this->load->library('form_validation');
		$this->load->model('keranjang_model');

		$status=$this->session->userdata('statusjb');
		if ($status=="") 
		{
			redirect('Login','refresh');
		}
	}

	public function tambahkeranjang($barang)
	{
		$ukuran=$this->input->post('ukuran');
		$cek=$this->keranjang_model->cekbarang($barang,$ukuran)->row_array();
		if($cek!="") 
		{
			$jumlahcek = $cek['jumlah'];
			$no = $cek['no'];
			//$jumlah=$jumlahcek+1;
			$ukuran=$this->input->post('ukuran');
			$jumlah=$jumlahcek+$this->input->post('quantity');
			$this->keranjang_model->tambahitem($no,$jumlah,$ukuran);
		}
		else
		{
			//$jumlah=1;
			$ukuran=$this->input->post('ukuran');
			$jumlah=$this->input->post('quantity');
			$this->keranjang_model->tambahkeranjang($barang,$jumlah,$ukuran);
		}
		$idpelanggan=$this->session->userdata('id_pelanggan');
		$cek=$this->keranjang_model->jumlahkeranjang($idpelanggan)->row_array();
		$jumlah = $cek['total'];
		$this->session->set_userdata('keranjang',$jumlah);

		redirect('Sangar/index','refresh');
		
	}

	public function index($value)
	{
		if ($value==0)
		{
			$idpelanggan=$this->session->userdata('id_pelanggan');
			$cek=$this->keranjang_model->jumlahkeranjang($idpelanggan)->row_array();
			$jumlah = $cek['total'];
			$this->session->set_userdata('keranjang',$jumlah);
			$data['keranjang']=$this->keranjang_model->lihatkeranjang($idpelanggan)->result();
			$this->load->view('toko/keranjang.php',$data);
		}
		else
		{
			$idpelanggan=$this->session->userdata('id_pelanggan');
			// $cek=$this->keranjang_model->jumlahkeranjangmitra($idpelanggan,$value)->row_array();
			// $jumlah = $cek['total'];
			$cek=$this->keranjang_model->jumlahkeranjang($idpelanggan)->row_array();
			$jumlah = $cek['total'];
			$this->session->set_userdata('keranjang',$jumlah);
			$data['keranjang']=$this->keranjang_model->lihatkeranjangmitra($idpelanggan,$value)->result();
			$this->load->view('toko/keranjang.php',$data);
		}
			
	}	

	public function hapusitem($value)
	{
		$this->keranjang_model->hapusitem($value);
		redirect('Keranjang/index','refresh');
	}

	public function hapuskeranjang()
	{
		$value=$this->session->userdata('id_pelanggan');
		$this->keranjang_model->kosongkeranjang($value);
		redirect('Keranjang/index','refresh');
	}

	public function formkaos()
	{
		$this->load->view('inproduk.php');
	}


}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */ 