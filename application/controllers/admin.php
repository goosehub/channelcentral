<?php

// Used for channel administration

class Admin extends CI_Controller {

	public function index()
	{
	    $data['title'] = 'MASTER';
		$this->load->view('templates/form_header', $data);
		$this->load->view('command/admin', $data);
		$this->load->view('templates/form_footer', $data);
	}

}