<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class penjualan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		date_default_timezone_set("Asia/Jakarta");
	}

	function tambahpenjualan($kode,$sub_total)
	{
		$string = date("d-m-Y");
		$timestamp = strtotime($string);
		$str = date("dmY", $timestamp);
		$idp=$this->session->userdata('id_pelanggan');
		$pj= $str.$kode;

			$pesen=array(
			'kode_penjualan'=>$pj,
			'id_pelanggan'=>$this->session->userdata('id_pelanggan'),
			'sub_total'=>$sub_total,
			'tanggal_awal'=> date('Y-m-d H:i:s',strtotime('now')),
			'status_penjualan'=>0
			);
			$this->db->insert('penjualan',$pesen);

			$bayar=array(
			'kode_penjualan'=>$pj
			);
			$this->db->insert('pembayaran',$bayar);	
	}

	function tambahpengiriman($kode)
	{
		$string = date("d-m-Y");
		$timestamp = strtotime($string);
		$str = date("dmY", $timestamp);
		$idp=$this->session->userdata('id_pelanggan');
		$pj= $str.$kode;

			$kirim=array(
			'kode_penjualan'=>$pj,
			'nama'=>$this->input->post('nama'),
			'telp'=>$this->input->post('telp'),
			'jasa'=>$this->input->post('kurir'),
			'prov'=>$this->input->post('provinsi'),
			'kota'=>$this->input->post('kabupaten'),
			'alamat'=>$this->input->post('alamat')
			//'biaya'=>$this->input->post('biaya')
			);
			$this->db->insert('pengiriman',$kirim);	
	}

	function tambahdetail($kode,$kode_barang,$jumlah,$total)
	{
		$string = date("d-m-Y");
		$timestamp = strtotime($string);
		$str = date("dmY", $timestamp);
		$idp=$this->session->userdata('id_pelanggan');
		$pj= $str.$kode;

		$detailpesen=array(
			'kode_penjualan'=>$pj,
			'kode_barang'=>$kode_barang,
			'jumlah'=>$jumlah,
			'total'=>$total,
			'status_detail'=>0
			);
		$this->db->insert('detail_penjualan',$detailpesen);
	}

}
?>	