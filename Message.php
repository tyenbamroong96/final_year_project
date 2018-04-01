<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

  public function index() {
  }

  public function about() {
    $this->load->model('Message_model');
    $data['about'] = $this->Message_model->show_about();
    $userType = $this->session->userType;
    if ($userType == 'Admin') {
      $this->load->view('admin/edit/about.php', $data);
    } elseif ($userType == 'Councilor') {
      $this->load->view('councilor/welcome', $data);
    } else {
      $this->load->view('member/pages/partner_page_view', $data);
    }
  }

  public function welcome() {
    $this->load->model('Message_model');
    $data['welcome'] = $this->Message_model->show_welcome();
    $userType = $this->session->userType;
    if ($userType == 'Admin') {
      $this->load->view('admin/edit/welcome.php', $data);
    } elseif ($userType == 'Counselor') {
      $this->load->view('counselor/welcome.php', $data);
    } else {
      $this->load->view('member/pages/welcome', $data);
    }
  }

  public function update_about() {
    $data = array(
      'type' => 'About',
      'topic' => $this->input->post('topic'),
      'body' => $this->input->post('body')
    );
    $this->load->model('Message_model');
    $this->Message_model->update_text($data);
    $this->about();
  }

  public function update_welcome() {
    $data = array(
      'type' => 'Welcome',
      'topic' => $this->input->post('topic'),
      'body' => urldecode($this->input->post('body'))
    );
    $this->load->model('Message_model');
    $this->Message_model->update_text($data);
  }
}
