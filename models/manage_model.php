<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function update_status($user) {
		$this->db->update('users', $user, array('userID' => $user['userID']));
	}

	public function create_user($user){
    $this->db->insert('users', $user);
  }

  public function read_user(){
		$users = $this->db->get('users');
		return $users;
  }

  public function update_user($updated_user_array){
		if ($this->db->update('users', $updated_user_array, array('userID' => $updated_user_array['userID']))){
			return 1;
		} else{
			return 0;
		}
  }

  public function delete_user_by_id($userID){
		$user_array = array(
			'userID' => $userID
		);
		$this->db->delete('users', $user_array);
  }

	public function get_user_by_id($id){
		$array_by_id = array('userID' => $id);
		$user_array = $this->db->get_where('users', $array_by_id);
		return $user_array;
	}

	public function get_by_email($username){
		$array_by_email = array('userEmail' => $username);
		$user_array = $this->db->get_where('users', $array_by_email);
		return $user_array;
	}

	public function read_profile($userID){
		$profile = $this->db->get_where('users', array('userID' => $userID));
		return $profile;
	}

	public function read_counselors($userType) {
		$counselors = $this->db->get_where('users', array('userType' => $userType));
		return $counselors;
	}
}
