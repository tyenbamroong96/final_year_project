<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Page extends CI_Controller {

    public function __construct(){
  		parent::__construct();
      $this->load->helper('url', 'form');
  	}
  	public function index(){
      $this->load->view('index.php');
  	}

    // -------------- MEMBER -----------------------------------//
    public function partner_page(){
      $this->load->view('member/pages/partner_page_view');
    }

    public function partner_page2(){
      $this->load->view('member/pages/partner_page_view2');
    }

    // -------------- ADMIN -----------------------------------//
    public function edit_about(){
      $this->load->view('admin/edit/about.php');
    }

    public function edit_welcome(){
      $this->load->view('admin/edit/welcome.php');
    }

    public function edit_forums(){
      $this->load->model('Formpost_model');
      $data['posts'] = $this->Formpost_model->read_posts();
      $this->load->view('admin/edit/edit_forums', $data);
    }

    public function upload_form(){
      $this->load->view('admin/edit/upload_form');
    }

    public function edit_faq(){
      $this->load->view('admin/edit/edit_faq');
    }

    public function show_downloads() {
      $this->load->model('Upload_model');
      $data['technical'] = $this->Upload_model->get_technical();
      $data['sales'] = $this->Upload_model->get_sales();
      $this->load->view('member/downloads', $data);
    }

    public function load_faq() {
      $this->load->view('faq.php');
    }

    public function edit_files() {
      $this->load->model('Upload_model');
      $data['files'] = $this->Upload_model->get_files();
      $this->load->view('admin/edit/files.php', $data);
    }

    public function forum_admin() {
      $this->load->view('admin/edit/forum_form.php');
    }

    public function contact() {
      $this->load->view('contact.php');
    }
    // For testing only
    public function test() {
      $this->load->view('log_in/log-in-test');
    }

    public function for_councilor() {
      $this->load->view('councilor/for_councilor.php');
    }


}
