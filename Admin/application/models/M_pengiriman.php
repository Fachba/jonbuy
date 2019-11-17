<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengiriman extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function pengirimanid($kode)
	{
		$query=$this->db->query("SELECT * FROM `pengiriman` WHERE kode_penjualan=".$kode."");
		return $query;
	}

	public function edit($id)
	{
		$data = array(
		'jasa'	=> $this->input->post('kurir'),
		'biaya'	=> $this->input->post('biaya'),
		'keterangan'	=> $this->input->post('ket'),
		'resi'		=>$this->upload->data('file_name')
		);

		$this->db->where('kode_penjualan', $id);
		$this->db->update('pengiriman', $data);
	}

	public function edit_nf($id)
	{
		$data = array(
		'jasa'	=> $this->input->post('kurir'),
		'biaya'	=> $this->input->post('biaya'),
		'keterangan'	=> $this->input->post('ket')
		);

		$this->db->where('kode_penjualan', $id);
		$this->db->update('pengiriman', $data);
	}


}

/* End of file user.php */
/* Location: ./application/models/user.php */
 ?>