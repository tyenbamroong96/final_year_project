<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qnaire_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function store($ans, $userID) {
    $this->db->where('userID', $userID);
    $this->db->update('users', $ans);
  }

  public function read_user() {
		$users = $this->db->get('users');
		return $users;
  }

}
