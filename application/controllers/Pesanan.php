<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pesanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date','url','form');
		$this->load->library('form_validation');
		$this->load->model('pesanan_model');

		$status=$this->session->userdata('statusjb');
		if ($status=="") 
		{
			redirect('Login','refresh');
		}
	}

	public function index()
	{
		$idpelanggan=$this->session->userdata('id_pelanggan');
		$data['pesanan']=$this->pesanan_model->lihatpesanan($idpelanggan)->result();
		$this->load->view('toko/v_pesanan.php',$data);
			
	}

    public function detail($kode)
    {
        $idpelanggan=$this->session->userdata('id_pelanggan');
        $data['detailpesanan']=$this->pesanan_model->detailpesanan($idpelanggan,$kode)->result();
        $this->load->view('toko/v_detailpesanan.php',$data);       
    }

	public function cari()
	{
		$idpelanggan=$this->session->userdata('id_pelanggan');
		$data['pesanan']=$this->pesanan_model->caripesanan($idpelanggan)->result();
		$this->load->view('toko/v_pesanan.php',$data);
			
	}

    public function pengiriman($kode)
    {
        $idpelanggan=$this->session->userdata('id_pelanggan');
        $data['pengiriman']=$this->pesanan_model->lihatpengiriman($idpelanggan,$kode)->row_array();
        $this->load->view('toko/v_pengiriman.php',$data);
            
    }

	public function konfirmasi($value)
	{
		
			
	}

	

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */ 