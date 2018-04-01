<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validation_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Validate user
  public function validate_user($user_array){
    $query = $this->db->get_where('users', $user_array);
		if(!empty($query->result_array())){
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
