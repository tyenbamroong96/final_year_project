<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

  public function upload_file($file) {
    if ($this->db->insert('files', $file)) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

	public function get_files() {
		$files = $this->db->get('files');
		return $files;
	}

	public function get_file_by_id($id) {
		$file_array = $this->db->get_where('files', array('fileID' => $id));
		return $file_array;
	}

	public function get_technical() {
		$technical = $this->db->get_where('files', array('fileCategory' => 'Technical'));
		return $technical;
	}

	public function get_sales() {
		$sales = $this->db->get_where('files', array('fileCategory' => 'Sales'));
		return $sales;
	}

	public function update_file($file) {
		return $this->db->update('files', $file, array('fileID' => $file['fileID']));
	}

	public function delete_file_by_id($fileID) {
		$file_array = array(
			'fileID' => $fileID
		);
		$this->db->delete('files', $file_array);
	}
}
