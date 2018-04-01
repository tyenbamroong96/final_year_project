<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->helper(array('form', 'url'));
    $this->load->library('upload');
  }

  public function index() {
    $this->load->view('admin/edit/upload_form');
  }

  public function do_upload() {
    $config['upload_path'] = "assets/files";
	  $config['max_size'] = '100000';
    $config['allowed_types'] = 'gif|jpg|png|pdf|docx|zip';

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    // Uploaded file array
    $isUploaded = $this->upload->do_upload('userfile');
    $data = $this->upload->data(); // containing file meta data
    $file = array(
      'fileName' => $data['file_name'],
      'filePath' => $data['file_path'],
      'fileCategory' => $this->input->post('fileCategory'),
      'description' => $this->input->post('description')
    );

    if ($isUploaded) {
        $this->load->model('Upload_model');
        if ($this->Upload_model->upload_file($file)) {
          redirect(base_url('Admin/edit_files'));
        } else {
          $this->load->view('admin/upload/failure');
        }
    } else {
        $this->load->view('admin/upload/failure');
    }
  }

  public function edit_file() {
    $id = $this->uri->segment(3);
    $this->load->model('Upload_model');
    $data['file_by_id'] = $this->Upload_model->get_file_by_id($id);
    $this->load->view('admin/edit/edit_file.php', $data);
  }

  public function update_file() {
    $this->load->model('Upload_model');
    $file = array(
      'fileID' => $this->uri->segment(3),
      'description' => $this->input->post('description'),
      'fileCategory' => $this->input->post('fileCategory')
    );
    echo $this->Upload_model->update_file($file);
  }

  public function delete_file($id) {
    $this->load->model('Upload_model');
    $id = $this->uri->segment(3);
    $this->Upload_model->delete_file_by_id($id);
    redirect(base_url('Admin/edit_files'));
  }

  public function show_files() {
    $this->load->model('Upload_model');
    $data['files'] = $this->Upload_model->get_files();
    $this->load->view('member/pages/articles', $data);
  }

}
