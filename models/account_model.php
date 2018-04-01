<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

  public function find_type($username){
    $array_by_id = array('userEmail' => $username);
		$user_array = $this->db->get_where('users', $array_by_id);
		return $user_array;
  }

}
