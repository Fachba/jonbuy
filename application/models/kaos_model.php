<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class kaos_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	function getAll($config){  
        $hasilquery=$this->db->get('barang', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0)
         {
            foreach ($hasilquery->result() as $value)
            {
                $data[]=$value;
            }
            return $data;
        }      
    }

	public function tampilkaos()
	{
		$query=$this->db->query("SELECT*FROM barang");
		return $query->result();
	}

	public function tampildetailkaosukuran($id)
	{
		$query=$this->db->query("SELECT * FROM `ukuran` JOIN barang ON ukuran.kode_barang_ukuran=barang.kode_barang WHERE kode_barang_ukuran=".$id."");
		return $query->result();
	}

	public function tampildetailkaos($id)
	{
		$this->db->where('kode_barang', $id);
		return $this->db->get('barang');
	}

	public function tambahkaos()
	{
			$kaos=array(
			'nama'=>$this->input->post('nama'),
			'harga'=>$this->input->post('harga'),
			'stok'=>$this->input->post('stok'),
			'ket'=>$this->input->post('ket'),
			'gambar'=>$this->upload->data('file_name')
			);
			$this->db->insert('barang',$kaos);	
	}



}
?>