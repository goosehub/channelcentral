<?php

// Used for Top Level Administration

class Master extends CI_Controller {

	public function index()
	{
	    $data['title'] = 'MASTER';
		$this->load->view('templates/form_header', $data);
		$this->load->view('command/master', $data);
		$this->load->view('templates/form_footer', $data);
	}

}