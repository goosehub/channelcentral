<?php

class Admin extends CI_Controller {

	public function index()
	{
	    $data['title'] = 'MASTER';
		$this->load->view('header', $data);
		$this->load->view('master', $data);
		$this->load->view('footer', $data);
	}

}