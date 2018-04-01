<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Questionnaire extends CI_Controller {

    public function __construct() {
  		parent::__construct();
      $this->load->helper('url', 'form');
  	}
  	public function index(){
      $this->load->view('member/questionnaire/form.php');
  	}

    public function store(){
      $userID = $this->session->userID;
      $ans1 = $this->input->post('q1');
      $ans2 = $this->input->post('q2');
      $ans3 = $this->input->post('q3');
      $ans4 = $this->input->post('q4');
      $ans5 = $this->input->post('q5');
      $ans6 = $this->input->post('q6');
      $ans7 = $this->input->post('q7');
      $ans8 = $this->input->post('q8');
      $ans9 = $this->input->post('q9');
      $ans10 = $this->input->post('q10');

      $answers = array(
        'ans1' => $ans1,
        'ans2' => $ans2,
        'ans3' => $ans3,
        'ans4' => $ans4,
        'ans5' => $ans5,
        'ans6' => $ans6,
        'ans7' => $ans7,
        'ans8' => $ans8,
        'ans9' => $ans9,
        'ans10' => $ans10
      );
      $this->load->model('Qnaire_model');
      $this->Qnaire_model->store($answers, $userID);
      echo 1;
    }
  }
?>
