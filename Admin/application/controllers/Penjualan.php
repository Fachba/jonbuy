<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date','url','form');
		$this->load->library('form_validation');
		$this->load->model('M_penjualan');
        $this->load->model('M_pembayaran');
        $idm=$this->session->userdata('idm');
        if ($idm==null)
        {
            redirect('Login','refresh');
        }
	}

	public function index()
	{
		$idm=$this->session->userdata('idm');

        $data['penjualan']=$this->M_penjualan->tampil($idm);
        $this->load->view('V_penjualan.php', $data);
	}

    public function status($id,$status)
    {
        $cekbayar=$this->M_pembayaran->cekbayar($id);
        $row = $cekbayar[0]; 
        $cek = $row->status_pembayaran;
        if ($cek!=0&&$status==1)
        {
            $this->M_penjualan->edit_status($id,$status);
            redirect('Penjualan','refresh');
        }
        else if($cek>1&&$status==2)
        {
            $this->M_penjualan->edit_status($id,$status);
            redirect('Penjualan','refresh');   
        }
        else if($cek>=2&&$status==3)
        {
            redirect('Pengiriman/v_detail/'.$id.'','refresh');   
        }
        else
        {
            redirect('Penjualan','refresh');
        }
    }

    public function detail($kode)
    {
        $idm=$this->session->userdata('idm');

        $data['penjualan']=$this->M_penjualan->tampildetail($idm,$kode);
        $this->load->view('V_penjualan_detail.php', $data);
    }

    public function statusbayar($kode)
    {
        $data['pembayaran']=$this->M_pembayaran->pembayaranid($kode)->row_array();
        $this->load->view('V_pembayaran.php', $data);
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */ 