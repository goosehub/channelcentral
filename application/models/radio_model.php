<?php
class Radio_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function set_chat($filename)
	{

		date_default_timezone_set('America/New_York');
		$date = date("g:i a"); 

		$data = array(
			'name' => $this->input->post('name'),
			'message' => $this->input->post('message'),
			'host' => $this->input->post('host'),
			'timestamp' => $date
		);

		return $this->db->insert('news', $data);
	}

}