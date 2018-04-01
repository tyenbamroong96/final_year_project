<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

  public function show_about() {
    $about = $this->db->get_where('text', array('type' => 'About'));
    return $about;
  }

  public function show_welcome() {
    $welcome = $this->db->get_where('text', array('type' => 'Welcome'));
    return $welcome;
  }

  public function update_text($text) {
    $this->db->replace('text', $text);
  }

}
