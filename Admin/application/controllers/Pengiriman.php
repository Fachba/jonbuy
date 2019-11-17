<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengiriman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date','url','form');
		$this->load->library('form_validation');
		$this->load->model('M_pengiriman');
        $this->load->model('M_penjualan');
        $idm=$this->session->userdata('idm');
        if ($idm==null)
        {
            redirect('Login','refresh');
        }
	}

    public function v_detail($value)
    {
        $data['pengiriman']=$this->M_pengiriman->pengirimanid($value)->row_array();
        $this->load->view('V_pengiriman.php',$data);
    } 

    public function edit($kode)
    {
        
        $config['upload_path']      = './assets/images/resi/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png';
        $config['max_size']         = 1000000000;
        $config['max_width']        =10240;
        $config['max_height']       =7680;

        $this->load->library('upload',$config);
        if ($this->upload->do_upload('image')==null)
        {
            $this->M_pengiriman->edit_nf($kode);
            redirect('Pengiriman/v_detail/'.$kode.'','refresh');
        }
        else
        {
            if($this->upload->display_errors())
            {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error',$error['error']);
                redirect('Pengiriman/v_detail/'.$kode.'','refresh');
            }
            else
            {
                $res=$this->M_pengiriman->pengirimanid($kode)->result();
                if ($res)
                {
                    $row = $res[0]; 
                    $gambar=$row->resi;
                    //unlink("./assets/images/resi/".$gambar);
                    unlink(FCPATH."assets".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."resi".DIRECTORY_SEPARATOR.$gambar);

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
                
                $this->M_pengiriman->edit($kode);
                $this->M_penjualan->edit_status($kode,3);
                redirect('Penjualan/index','refresh');
            }
        }
    }

    public function hapus($value)
    {
        
    }

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */ 