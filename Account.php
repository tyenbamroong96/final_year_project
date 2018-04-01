<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->helper(array('url', 'form'));
    $this->load->library('session');
    }

  public function index(){
    $this->load->view('log_in/login');
  }

  public function log_in(){
    if ($this->session->userType == 'Admin') {
      $this->load->view('admin/welcome');
    } elseif ($this->session->userType == 'Member') {
      redirect(base_url('Message/welcome'));
    } elseif ($this->session->userType == 'Counselor'){
      redirect(base_url('Message/welcome'));
    } else {
      $this->deny_access();
    }
  }

  public function forgot(){
    $this->load->view('log_in/forgot_view.php');
  }

  public function sign_up(){
    $this->load->view('sign_up.php');
  }

  public function log_out(){
    $this->session->sess_destroy();
    $this->index();
  }

  public function deny_access(){
    $this->load->view('log_in/access_deny_view');
  }

  public function render_parter_page(){
    $this->load->view('pages/partner_page_view');
  }

}
