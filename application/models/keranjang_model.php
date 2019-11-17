<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class keranjang_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function lihatkeranjang($pelanggan)
	{
		$sql = "SELECT no,kode_barang,id_mitra,nama_mitra,nama_barang,harga_jual,jumlah,gambar FROM `keranjang` JOIN barang USING(kode_barang) JOIN mitra USING(id_mitra) WHERE id_pelanggan=".$pelanggan."";
		return $this->db->query($sql);
	}

	public function lihatkeranjangmitra($pelanggan,$idm)
	{
		$sql = "SELECT no,kode_barang,id_mitra,nama_mitra,nama_barang,harga_jual,jumlah,gambar,rekening,bank FROM `keranjang` JOIN barang USING(kode_barang) JOIN mitra USING(id_mitra) WHERE id_pelanggan=".$pelanggan." AND id_mitra=".$idm."";
		return $this->db->query($sql);
	}

	public function lihatkeranjangid($pelanggan,$no)
	{
		$sql = "SELECT no,kode_barang,id_mitra,nama_mitra,nama_barang,harga_jual,jumlah,gambar,rekening,bank FROM `keranjang` JOIN barang USING(kode_barang) JOIN mitra USING(id_mitra) WHERE id_pelanggan=".$pelanggan." AND no=".$no."";
		return $this->db->query($sql);
	}

	public function jumlahkeranjang($pelanggan)
	{
		$sql = "SELECT COUNT(`kode_barang`) as total FROM `keranjang` WHERE `id_pelanggan`= ".$pelanggan." ";
		return $this->db->query($sql);
	}

	public function jumlahkeranjangmitra($pelanggan,$idm)
	{
		$sql = "SELECT COUNT(`kode_barang`) as total FROM `keranjang` JOIN barang USING(kode_barang) JOIN mitra USING(id_mitra) WHERE id_pelanggan=".$pelanggan." AND id_mitra=".$idm."";
		return $this->db->query($sql);
	}

	public function cekbarang($id)
	{
		$idpelanggan=$this->session->userdata('id_pelanggan');
		$this->db->where('kode_barang', $id);
		$this->db->where('id_pelanggan', $idpelanggan);
		return $this->db->get('keranjang');
	}

	public function tambahkeranjang($barang,$jumlah)
	{
		$idpelanggan=$this->session->userdata('id_pelanggan');

			$keranjangtambah=array(
			'id_pelanggan'=>$idpelanggan,
			'kode_barang'=>$barang,
			'jumlah'=>$jumlah
			);
			$this->db->insert('keranjang',$keranjangtambah);
	}

	public function tambahitem($no,$jumlah)
	{
			$keranjang=array(
			'jumlah'=>$jumlah
			);
			$this->db->where('no',$no);
			$this->db->update('keranjang',$keranjang);
	}

	public function hapusitem($id)
	{
		$this->db->where('no', $id);
		$this->db->delete('keranjang');
	}

	public function kosongkeranjang($id)
	{
		$this->db->where('id_pelanggan', $id);
		$this->db->delete('keranjang');
	}

}
?>