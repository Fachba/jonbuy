<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembayaran extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function cekbayar($kode)
	{
		$query=$this->db->query("SELECT * FROM `pembayaran` WHERE kode_penjualan=".$kode."");
		return $query->result();
	}

	public function pembayaranid($id)
	{
		$sql = "SELECT * FROM `pembayaran` JOIN penjualan USING(kode_penjualan) JOIN detail_penjualan USING(kode_penjualan) JOIN barang USING(kode_barang) JOIN mitra USING(id_mitra) JOIN pelanggan USING(id_pelanggan) WHERE id_pembayaran=".$id." GROUP BY kode_penjualan ";
		return $this->db->query($sql);
	}

	public function verifikasi($id)
	{
		$data = array(
		'status_pembayaran'=>2
		);

		$this->db->where('id_pembayaran', $id);
		$this->db->update('pembayaran', $data);
	}

}

/* End of file user.php */
/* Location: ./application/models/user.php */
 ?>