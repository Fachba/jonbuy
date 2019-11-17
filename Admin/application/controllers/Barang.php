<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang extends CI_Controller {

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
        $this->load->view('V_barang.php', $data);
	}

	public function v_tambah()
	{
        $data['ket']="tambah";
        $data['idm']=$this->session->userdata('idm');
        $this->load->view('V_barang_detail.php',$data);
	}

    public function v_detail($value)
    {
        $data['ket']="detail";
        $data['idm']=$this->session->userdata('idm');
        $idm=$this->session->userdata('idm');
        $data['barang']=$this->M_barang->barangid($value,$idm)->row_array();
        $this->load->view('V_barang_detail.php',$data);
    }

    public function v_edit($value)
    {
        $data['ket']="edit";
        $data['idm']=$this->session->userdata('idm');
        $idm=$this->session->userdata('idm');
        $data['barang']=$this->M_barang->barangid($value,$idm)->row_array();
        $this->load->view('V_barang_detail.php',$data);
    }    

	public function tambah()
	{
		$config['upload_path']      = './assets/images/barang/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 1000000000;
        $config['max_width']        =10240;
        $config['max_height']       =7680;

        $this->load->library('upload',$config);
        if(! $this->upload->do_upload('image'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error',$error['error']);
            redirect('Barang/v_tambah','refresh');
        }
        else
        {
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
            
            $this->M_barang->tambah();

            redirect('Barang/index','refresh');
        }
	}

    public function edit($kode)
    {
        //$kode=$this->input->post('kode');

        $config['upload_path']      = './assets/images/barang/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 1000000000;
        $config['max_width']        =10240;
        $config['max_height']       =7680;

        $this->load->library('upload',$config);
        if ($this->upload->do_upload('image')==null)
        {
            $this->M_barang->edit_nf($kode);
            redirect('Barang/index','refresh');
        }
        else
        {
            if($this->upload->display_errors())
            {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error',$error['error']);
                redirect('Barang/v_edit/'.$kode.'','refresh');
            }
            else
            {
                $idm=$this->session->userdata('idm');
                $res=$this->M_barang->barangid($kode,$idm)->result();
                if ($res)
                {
                    $row = $res[0]; 
                    $gambar=$row->gambar;
                    unlink("./assets/images/barang/".$gambar);
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
                
                $this->M_barang->edit($kode);
                redirect('Barang/index','refresh');
            }
        }
    }

    public function hapus($value)
    {
        $idm=$this->session->userdata('idm');        
        $res=$this->M_barang->barangid($value,$idm)->result();
        if ($res)
        {
            $row = $res[0]; 
            $gambar=$row->gambar;

            unlink("./assets/images/barang/".$gambar);
            $this->M_barang->hapus($value,$idm);        
            redirect('Barang/index','refresh');
        }
    }

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */ 