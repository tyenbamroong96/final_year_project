<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sess extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->helper('url', 'form');
    $this->load->library('session');
  }

  public function index(){
  }

  public function check_session(){
    return $this->sessison->userdata('logged_in');
  }

}
