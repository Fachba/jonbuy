<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function tampilbarang($id)
	{
		$query=$this->db->query("SELECT * FROM `barang` JOIN mitra USING(id_mitra) WHERE id_mitra=".$id."");
		return $query->result();
	}

	public function barangid($id,$idm)
	{
		$this->db->where('kode_barang', $id);
		$this->db->where('id_mitra', $idm);
		return $this->db->get('barang');
	}

	public function tambah()
	{
		$data = array(
		'id_mitra'		=> $this->session->userdata('idm'),
		'kode_barang'	=> $this->input->post('kode'),
		'nama_barang'	=> $this->input->post('nama'),
		'merk'			=> $this->input->post('merk'),
		'stok'			=> $this->input->post('stok'),
		'harga_jual'	=> $this->input->post('harga'),
		'warna'			=> $this->input->post('warna'),
		'diskon'		=> $this->input->post('diskon'),
		'ket_barang'	=> $this->input->post('ket'),
		'gambar'		=>$this->upload->data('file_name')
		);

		$this->db->insert('barang', $data);
	}

	public function edit($id)
	{
		$data = array(
		'nama_barang'	=> $this->input->post('nama'),
		'merk'			=> $this->input->post('merk'),
		'stok'			=> $this->input->post('stok'),
		'harga_jual'	=> $this->input->post('harga'),
		'warna'			=> $this->input->post('warna'),
		'diskon'		=> $this->input->post('diskon'),
		'ket_barang'	=> $this->input->post('ket'),
		'gambar'		=>$this->upload->data('file_name')
		);

		$this->db->where('kode_barang', $id);
		$this->db->update('barang', $data);
	}

	public function edit_nf($id)
	{
		$data = array(
		'nama_barang'	=> $this->input->post('nama'),
		'merk'			=> $this->input->post('merk'),
		'stok'			=> $this->input->post('stok'),
		'harga_jual'	=> $this->input->post('harga'),
		'warna'			=> $this->input->post('warna'),
		'diskon'		=> $this->input->post('diskon'),
		'ket_barang'	=> $this->input->post('ket')
		);

		$this->db->where('kode_barang', $id);
		$this->db->update('barang', $data);
	}

	public function hapus($id,$idm)
	{
		$this->db->where('kode_barang', $id);
		$this->db->where('id_mitra', $idm);
		$this->db->delete('barang');
	}

}

/* End of file user.php */
/* Location: ./application/models/user.php */
 ?>