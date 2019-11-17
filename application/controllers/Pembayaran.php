<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date','url','form');
		$this->load->library('form_validation');
		$this->load->model('pembayaran_model');

		$status=$this->session->userdata('statusjb');
		if ($status=="") 
		{
			redirect('Login','refresh');
		}
	}

	public function index()
	{
		$idpelanggan=$this->session->userdata('id_pelanggan');
		$data['pembayaran']=$this->pembayaran_model->lihatpembayaran($idpelanggan)->result();
		$this->load->view('toko/v_pembayaran.php',$data);
			
	}

	public function cari()
	{
		$idpelanggan=$this->session->userdata('id_pelanggan');
		$data['pembayaran']=$this->pembayaran_model->caripembayaran($idpelanggan)->result();
		$this->load->view('toko/v_pembayaran.php',$data);
			
	}

	public function konfirmasi($value)
	{
		$idpelanggan=$this->session->userdata('id_pelanggan');
		$data['pembayaran']=$this->pembayaran_model->pembayaranid($value)->row_array();
		$this->load->view('toko/v_konfirmasi.php',$data);
			
	}

	public function edit($kode)
    {
        $config['upload_path']      = './admin/assets/images/nota/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png';
        $config['max_size']         = 1000000000;
        $config['max_width']        =10240;
        $config['max_height']       =7680;

        $this->load->library('upload',$config);
        if ($this->upload->do_upload('image')==null)
        {
            $this->M_pembayaran->edit_nf($kode);
            redirect('Pembayaran/konfirmasi/'.$kode.'','refresh');
        }
        else
        {
            if($this->upload->display_errors())
            {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error',$error['error']);
                redirect('Pembayaran/konfirmasi/'.$kode.'','refresh');
            }
            else
            {
                $res=$this->pembayaran_model->pembayaranid($kode)->result();
                if ($res)
                {
                    $row = $res[0]; 
                    $gambar=$row->bukti;
                    //unlink("./assets/images/resi/".$gambar);
                    unlink(FCPATH."admin".DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."nota".DIRECTORY_SEPARATOR.$gambar);

                }

                $image_data=$this->upload->data();

                $configer=array
                (
                    'image_library'=>'gd2',
                    'source_image'=>$image_data['full_path'],
                    'maintain_ratio'=>TRUE,
                    'width'=>1000,
                    'height'=>1000,);

                $this->load->library('image_lib',$config);

                $this->image_lib->clear();
                $this->image_lib->initialize($configer);
                $this->image_lib->resize();
                
                $this->pembayaran_model->edit($kode);
                $this->pembayaran_model->edit_status($kode,1);
                redirect('Pembayaran/index','refresh');
            }
        }
    }


}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */ 