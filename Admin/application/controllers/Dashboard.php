<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date','url','form');
		$this->load->library('form_validation');
		$this->load->model('M_barang');
		$idm=$this->session->userdata('idm');
		if ($idm==null)
		{
			redirect('Login','refresh');
		}
	}

	public function index()
	{
		$idm=$this->session->userdata('idm');

        $data['barang']=$this->M_barang->tampilbarang($idm);
        $this->load->view('V_dashboard.php', $data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */ 