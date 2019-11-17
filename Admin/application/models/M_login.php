<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function login($username,$password)
	{
		$this->db->select('id_mitra,nama_mitra,username,password,email,nomor');
		$this->db->from('mitra');
		$this->db->where('username', $username);
		$this->db->where('password',$password);
		$query=$this->db->get();
		if($query->num_rows()==1)
		{
			return $query;
		}
		else
		{
			return false;
		}

	}

}

/* End of file user.php */
/* Location: ./application/models/user.php */
 ?>