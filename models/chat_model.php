<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert_data($data_array) {
		if ($this->db->insert('posts', $data_array)) {
				return TRUE;
		} else {
				return FALSE;
		}
	}

	public function read_messages($chatroom) {
		$this->db->get_where('messages', array('chatroom' => $chatroom));
		$this->db->order_by('postDate', 'desc');
		$messages = $this->db->get('messages');
		return $messages;
	}

	public function get_chatroom($userID) {
		$query = $this->db->get_where('chat', array('student' => $userID));

		foreach ($query->result() as $row) {
		   $chatroom =  $row->id;
		}

		return $chatroom;
	}

	public function read_public_posts() {
		$posts = $this->db->query("SELECT posts.* ,COUNT(comments.commentID) AS count FROM posts
						 LEFT JOIN comments ON comments.postID = posts.postID WHERE public = 'Public'
						 GROUP BY posts.postID ORDER BY postDate DESC");
		return $posts;
	}

	public function show_post_by_id($postID) {
		$post = $this->db->get_where('posts', array('postID' => $postID));
		return $post;
	}

	public function read_posts_type($postType) {
		$posts = $this->db->query("SELECT posts.* ,COUNT(comments.commentID) AS count FROM posts
							LEFT JOIN comments ON comments.postID = posts.postID WHERE posts.postType = '$postType'
							GROUP BY posts.postID ORDER BY postDate DESC");
		return $posts;
	}

	public function delete_post($postID) {
		$this->db->delete('comments', array('postID' =>$postID));
		$this->db->delete('posts', array('postID' => $postID));
	}

	public function add_comment($comment) {
		$this->db->insert('comments', $comment);
	}

	public function get_comments($postID) {
		$comments = $this->db->get_where('comments', array('postID' => $postID));
		return $comments;
	}

	public function delete_comment($commentID) {
		$this->db->delete('comments', array('commentID' => $commentID));
	}

	public function update_access($post) {
		$this->db->update('posts', $post, array('postID' => $post['postID']));
	}
}
