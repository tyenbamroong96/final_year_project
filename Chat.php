<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->helper('url', 'form');
  }

  // Display a current users table
  public function index(){
    $this->load->model('Chat_model');
    if ($this->session->logged_in == TRUE) {
      $chatroom = $this->Chat_model->get_chatroom($this->session->userID);
      $data['messages'] = $this->Chat_model->read_messages($chatroom);
    }
    $this->load->view('chat/chatroom.php', $data);
  }

  public function display() {
    $this->load->view('chat/log.html');
  }

  public function post() {

  }

}
