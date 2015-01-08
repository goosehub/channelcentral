<?php

class Admin extends CI_Controller {

	public function index()
	{
	    $data['title'] = 'MASTER';
		$this->load->view('templates/header', $data);
		$this->load->view('command/admin', $data);
		$this->load->view('templates/footer', $data);
	}

}