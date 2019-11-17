<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penjualan extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function tampil($idm)
	{
		$query=$this->db->query("SELECT `kode_penjualan`,`id_pelanggan`,`sub_total`,tanggal_awal as tanggal ,`status_penjualan`, nama_mitra, status_pembayaran, id_pembayaran FROM `penjualan` JOIN detail_penjualan USING(kode_penjualan) JOIN barang USING(kode_barang) JOIN mitra USING(id_mitra) JOIN pembayaran USING(kode_penjualan) WHERE id_mitra=".$idm." GROUP BY kode_penjualan");
		return $query->result();
	}

	public function tampildetail($idm,$kode)
	{
		$query=$this->db->query("SELECT * FROM `penjualan` JOIN detail_penjualan USING(kode_penjualan) JOIN barang USING(kode_barang) WHERE id_mitra=".$idm." AND kode_penjualan=".$kode."");
		return $query->result();
	}

	public function edit_status($id,$status)
	{
		$data = array(
		'status_penjualan'	=> $status
		);

		$this->db->where('kode_penjualan', $id);
		$this->db->update('penjualan', $data);
	}

}

/* End of file user.php */
/* Location: ./application/models/user.php */
 ?>