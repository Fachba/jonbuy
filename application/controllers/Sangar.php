<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sangar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date','url','form');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->model('kaos_model');
		$this->load->model('keranjang_model');
	}

	public function index()
	{
		$status=$this->session->userdata('statusjb');
		$jumlah = 0;
		if ($status!=null) 
		{
			$idpelanggan=$this->session->userdata('id_pelanggan');
		
			$cek=$this->keranjang_model->jumlahkeranjang($idpelanggan)->row_array();
			$jumlah = $cek['total'];
			$this->session->set_userdata('keranjang',$jumlah);
			//echo $status;
		}
		else
		{
			$jumlah = 0;
			$this->session->set_userdata('keranjang',$jumlah);
		}

		// konfigurasi class pagination
        $config['base_url']=base_url()."index.php/Sangar/index";
            $config['total_rows']= $this->db->query("SELECT * FROM barang;")->num_rows();
            $config['per_page']=6;
        $config['num_links'] = 2;
            $config['uri_segment']=3;
           
        //Tambahan untuk styling
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
 
        $config['first_link']='< Pertama ';
        $config['last_link']='Terakhir > ';
        $config['next_link']='>> ';
        $config['prev_link']='<< ';
        $this->pagination->initialize($config);



        // konfigurasi model dan view untuk menampilkan data
        $data['kaos']=$this->kaos_model->getAll($config);
        $this->load->view('shop.php', $data);

		// $data['kaos']=$this->kaos_model->tampilkaos();
		// $this->load->view('shop.php',$data);
	}

	public function detailkaos($id)
	{
		$data['kaos']=$this->kaos_model->tampildetailkaos($id)->row_array();
		//$data['ukuran']=$this->kaos_model->tampildetailkaosukuran($id);
		$this->load->view('toko/produk_detail.php',$data);
	}

	public function keranjang()
	{
		$this->load->view('toko/keranjang.php');
	}

	public function saran()
	{
		$this->load->view('saran.php');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */ 