<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date','url','form');
		$this->load->library('form_validation');
		$this->load->model('keranjang_model');
		$this->load->model('penjualan_model');

		$status=$this->session->userdata('statusjb');
		if ($status=="") 
		{
			redirect('Login','refresh');
		}
	}

	public function tambahpenjualan($kode,$sub_total,$ket,$no)
	{
		$this->penjualan_model->tambahpengiriman($kode);
		$this->penjualan_model->tambahpenjualan($kode,$sub_total);

		$idpelanggan=$this->session->userdata('id_pelanggan');
		//$data['keranjang']=$this->keranjang_model->lihatkeranjang($idpelanggan)->result();
		
		if ($ket=="perbarang")
		{
			$idpelanggan=$this->session->userdata('id_pelanggan');
			$data['keranjang']=$this->keranjang_model->lihatkeranjangid($idpelanggan,$no)->result();
		}
		else if($ket=="permitra")
		{
			$idpelanggan=$this->session->userdata('id_pelanggan');
			$data['keranjang']=$this->keranjang_model->lihatkeranjangmitra($idpelanggan,$no)->result();
		}

		foreach ($data['keranjang'] as $key ) 
		{
			$kode_barang = $key->kode_barang;
			$jumlah = $key->jumlah;
			$total = $key->jumlah*($key->harga_jual);
			$bank = $key->bank;
			$nama = $key->nama_mitra;
			$rekening = $key->rekening;
			$this->penjualan_model->tambahdetail($kode,$kode_barang,$jumlah,$total);
		}
		// $data['nominal']=$sub_total;
		// $data['bank']=$bank;
		// $data['rekening']=$rekening;
		// $this->load->view('toko/ordercomplete.php',$data);
		redirect('Penjualan/ordercomplete/'.$sub_total.'/'.$nama.'/'.$bank.'/'.$rekening.'','refresh');
	}

	public function ordercomplete($value,$nama,$bank,$rekening)
	{
		$data['nominal']=$value;
		$data['bank']=$bank;
		$data['rekening']=$rekening;
		$data['nama']=$nama;
		$this->load->view('toko/ordercomplete.php',$data);
	}

	public function complete()
	{
		$this->load->view('toko/ordercomplete.php');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */ 