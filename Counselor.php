<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Counselor extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->helper(array('url', 'form'));
    $this->load->library('session');
    }

  // Display welcome message
  public function index(){

  }

  public function my_profile() {
    $this->load->model('Manage_model');
    $data['profile'] = $this->Manage_model->read_profile($this->session->userID);
    $this->load->view('counselor/my_profile', $data);
  }

  public function display_counselors() {
    $this->load->model('Manage_model');
    $userType = 'Counselor';
    $data['counselors'] = $this->Manage_model->read_counselors($userType);
    $this->load->view('member/pages/show_counselors', $data);
  }

  public function edit_profile() {
    $this->load->model('Manage_model');
    $data['profile'] = $this->Manage_model->read_profile($this->session->userID);
    $this->load->view('counselor/edit_profile', $data);
  }

  public function update_prfile() {
    $this->load->model('Manage_model');
    $profile = array(
      'userID' => $this->session->userID,
      'userTitle' => $this->input->post('userTitle'),
      'firstName' => $this->input->post('firstName'),
      'lastName' => $this->input->post('lastName'),
      'userEmail' => $this->input->post('userEmail'),
      'specialisation' => $this->input->post('specialisation'),
      'description' => $this->input->post('description'),
    );

    echo $this->Manage_model->update_user($profile);
  }

}
