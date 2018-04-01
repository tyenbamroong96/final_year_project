<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validation extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->helper('url', 'form');
  }

  public function index(){
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $user_array = array(
      'userEmail' => $username,
      'userPass' => $password,
      'isActive' => "Active"
    );
    $isUser = $this->attempt_login($user_array);
    // If member, create a session
    if ($isUser){
      $this->load->model('Manage_model');
      // Pulling fields of logging in member from database
      foreach ($this->Manage_model->get_by_email($username)->result_array() as $row) {
        $session = array(
          'userID' => $row['userID'],
          'ans1' => $row['ans1'],
          'userType' => $row['userType'],
          'userEmail' => $username,
          'userTitle' => $row['userTitle'],
          'firstName' => $row['firstName'],
          'lastName' => $row['lastName'],
          'logged_in' => TRUE
        );
        // Create session
        $this->session->set_userdata($session);
        echo $isUser;
      }
    }
  }

  public function attempt_login($user_array){
    $this->load->model('Validation_model');
    return $this->Validation_model->validate_user($user_array);
  }
}
