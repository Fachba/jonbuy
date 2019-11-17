<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class pembayaran_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		date_default_timezone_set("Asia/Jakarta");
	}

	public function lihatpembayaran($pelanggan)
	{
		$sql = "SELECT * FROM `pembayaran` JOIN penjualan USING(kode_penjualan) JOIN detail_penjualan USING(kode_penjualan) JOIN barang USING(kode_barang) JOIN mitra USING(id_mitra) WHERE id_pelanggan=".$pelanggan." AND status_pembayaran<=1 GROUP BY kode_penjualan ORDER BY tanggal_awal DESC";
		return $this->db->query($sql);
	}

	public function caripembayaran($pelanggan)
	{
		$kode=$this->input->post('kode');
		$kode=$this->input->post('kode');
		if ($kode==null)
		{
			$kode=0;
		}
		$sql = "SELECT * FROM `pembayaran` JOIN penjualan USING(kode_penjualan) JOIN detail_penjualan USING(kode_penjualan) JOIN barang USING(kode_barang) JOIN mitra USING(id_mitra) WHERE id_pelanggan=".$pelanggan." AND kode_penjualan=".$kode." GROUP BY kode_penjualan ORDER BY tanggal_awal DESC";
		return $this->db->query($sql);
	}

	public function pembayaranid($id)
	{
		$sql = "SELECT * FROM `pembayaran` JOIN penjualan USING(kode_penjualan) JOIN detail_penjualan USING(kode_penjualan) JOIN barang USING(kode_barang) JOIN mitra USING(id_mitra) WHERE id_pembayaran=".$id." GROUP BY kode_penjualan ";
		return $this->db->query($sql);
	}

	public function edit($id)
	{
		$data = array(
		'bukti'	=>$this->upload->data('file_name'),
		'tanggal'=> date('Y-m-d H:i:s',strtotime('now'))
		);

		$this->db->where('id_pembayaran', $id);
		$this->db->update('pembayaran', $data);
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