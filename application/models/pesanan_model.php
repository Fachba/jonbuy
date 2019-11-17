<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class pesanan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		date_default_timezone_set("Asia/Jakarta");
	}

	public function lihatpesanan($pelanggan)
	{
		$sql = "SELECT * FROM `pembayaran` JOIN penjualan USING(kode_penjualan) JOIN detail_penjualan USING(kode_penjualan) JOIN barang USING(kode_barang) JOIN mitra USING(id_mitra) WHERE id_pelanggan=".$pelanggan." AND status_pembayaran=2 GROUP BY kode_penjualan ORDER BY tanggal_awal DESC";
		return $this->db->query($sql);
	}

	public function caripesanan($pelanggan)
	{
		$kode=$this->input->post('kode');
		if ($kode==null)
		{
			$kode=0;
		}
		$sql = "SELECT * FROM `pembayaran` JOIN penjualan USING(kode_penjualan) JOIN detail_penjualan USING(kode_penjualan) JOIN barang USING(kode_barang) JOIN mitra USING(id_mitra) WHERE id_pelanggan=".$pelanggan." AND kode_penjualan=".$kode." AND status_pembayaran=2 GROUP BY kode_penjualan ORDER BY tanggal_awal DESC";
		return $this->db->query($sql);
	}

	public function detailpesanan($pelanggan,$kode)
	{
		$sql = "SELECT * FROM `pembayaran` JOIN penjualan USING(kode_penjualan) JOIN detail_penjualan USING(kode_penjualan) JOIN barang USING(kode_barang) JOIN mitra USING(id_mitra) WHERE id_pelanggan=".$pelanggan." AND kode_penjualan=".$kode." ";
		return $this->db->query($sql);
	}

	public function lihatpengiriman($pelanggan,$kode)
	{
		$sql = "SELECT * FROM `penjualan` JOIN pengiriman USING(kode_penjualan) JOIN detail_penjualan USING(kode_penjualan) JOIN barang USING(kode_barang) JOIN mitra USING(id_mitra) WHERE id_pelanggan=".$pelanggan." AND kode_penjualan=".$kode." ";
		return $this->db->query($sql);
	}

	public function edit_status($id,$status)
	{
		$data = array(
		'status_pembayaran'	=> $status
		);

		$this->db->where('id_pembayaran', $id);
		$this->db->update('pembayaran', $data);
	}

}
?>