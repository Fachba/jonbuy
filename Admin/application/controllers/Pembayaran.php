<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

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

	public function verifikasi($value)
	{
        $this->M_pembayaran->verifikasi($value);
        redirect('Penjualan/index','refresh');
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */ 