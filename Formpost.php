<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Formpost extends CI_Controller {

    public function __construct(){
  		parent::__construct();
      $this->load->helper(array('url', 'form'));
  	}

  	public function index(){
  		$this->load->view('member/forums/formpost');
  	}

    // Send all posts to posts.php
    public function show_posts() {
        $this->load->model('Formpost_model');
        if ($this->session->logged_in == FALSE) {
          $data['posts'] = $this->Formpost_model->read_public_posts();
        } else {
          $data['posts'] = $this->Formpost_model->read_posts();
        }
        $this->load->view('member/forums/posts', $data);
    }

    // Show selected post
    public function show_post_by_id() {
      $postID = $this->uri->segment(3);
      $this->load->model('Formpost_model');
      $data['post'] = $this->Formpost_model->show_post_by_id($postID);
      $data['comments'] = $this->Formpost_model->get_comments($postID);
      $userType = $this->session->userType;
      if ($userType == 'Admin') {
        $this->load->view('admin/edit/forum', $data);
      } else {
        $this->load->view('member/forums/single_post', $data);
      }
    }

    public function data_submitted(){
      $this->load->model('Formpost_model');
      $postType = $this->input->post('postType');
      $postTitle = $this->input->post('postTitle');
      $postBody = $this->input->post('postBody');
      $userID = $this->session->userID;
      $data_array = array(
        'postType' => $postType,
        'postTitle' => $postTitle,
        'userID' => $userID,
        'postBody' => $postBody
      );
      $isSet = $this->Formpost_model->insert_data($data_array);
      if ($isSet && $this->session->userType == 'Member') {
        redirect(base_url('Formpost/show_posts'));
      } else {
        redirect(base_url('Loadview/edit_forums'));
      }
    }

    public function delete_post() {
      $this->load->model('Formpost_model');
      $postID = $this->uri->segment(3);
      $this->Formpost_model->delete_post($postID);
      redirect(base_url('Loadview/edit_forums'));
    }

    public function comment() {
      $this->load->model('Formpost_model');
      $postID = $this->uri->segment(3);
      $comment = array(
        'postID' => $postID,
        'commentBody' => $this->input->post('commentBody'),
        'userID' => $this->session->userID
      );
      $this->Formpost_model->add_comment($comment);
      redirect(base_url('Formpost/show_post_by_id') . "/" . $postID);
    }

    public function delete_comment() {
      $this->load->model('Formpost_model');
      $commentID = $this->input->post('id');
      $this->Formpost_model->delete_comment($commentID);
    }

    public function change_access() {
      $this->load->model('Formpost_model');
      $post = array(
        'postID' => $this->input->post('id'),
        'public' => $this->input->post('status')
      );
      $this->Formpost_model->update_access($post);
    }

  }
