<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->helper('url', 'form');
  }

  // Display a current users table
  public function index(){
    $this->load->model('Manage_model');
    $data['users'] = $this->Manage_model->read_user();
    $this->load->view('admin/manageUsers/users_table', $data);
  }

  // ------------ Render views to manage accounts ----------------------------
  public function render_create_user(){
    $this->load->view('admin/manageUsers/create_user');
  }

  public function render_delete_user(){
    $this->load->view('manage_users/delete_user_view');
  }
  // --------------------------------------------------------------------------

  // ------------- Interact with database to manage accounts ------------------
  public function create_user(){
    $this->load->model('Manage_model');
    $user_array = array(
      'userType' => $this->input->post('userType'),
      'userEmail' => $this->input->post('userEmail'),
      'userPass' => $this->input->post('userPass'),
      'userTitle' => $this->input->post('userTitle'),
      'firstName' => $this->input->post('firstName'),
      'lastName' => $this->input->post('lastName')
    );
    $test = $this->Manage_model->create_user($user_array);
    $this->index();
  }

  public function read_user(){
    $this->load->model('Manage_model');
    $users = $this->Manage_model->read_user();
    foreach ($users->result_array() as $row) {
      echo $row['userType'];
      echo $row['userEmail'];
      echo $row['userPass'];
      echo $row['userTitle'];
      echo $row['firstName'];
      echo $row['lastName'];
      echo "<br /><br />";
    }

  }

  public function update_user() {
    $this->load->model('Manage_model');
    $updated_user_array = array(
      'userID' => $this->uri->segment(3),
      'userType' => $this->input->post('userType'),
      'userEmail' => $this->input->post('userEmail'),
      'userPass' => $this->input->post('userPass'),
      'userTitle' => $this->input->post('userTitle'),
      'firstName' => $this->input->post('firstName'),
      'lastName' => $this->input->post('lastName'),
    );

    echo $this->Manage_model->update_user($updated_user_array);
  }

  public function change_status() {
    $this->load->model('Manage_model');
    $user = array(
      'userID' => $this->input->post('id'),
      'isActive' => $this->input->post('status')
    );
    $this->Manage_model->update_status($user);
  }

  public function edit_user() {
    $id = $this->uri->segment(3);
    $this->load->model('Manage_model');
    $data['user_by_id'] = $this->Manage_model->get_user_by_id($id);
    $this->load->view('admin/manageUsers/edit_user', $data);
  }

  public function delete_user() {
    $this->load->model('Manage_model');
    $id = $this->uri->segment(3);
    $this->Manage_model->delete_user_by_id($id);
    $this->index();
  }
}
