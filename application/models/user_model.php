<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function login($username,$password)
	{
		$this->db->select('id_pelanggan,username,password,nama_pelanggan,email,telp');
		$this->db->from('pelanggan');
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