<?php

class Home extends CI_Controller {

 function __construct()
 {
	parent::__construct();
	$this->load->library('session');
 }

	public function index()
	{
	    $data['title'] = 'ChannelCentral';
		$this->load->view('templates/header', $data);
		$this->load->view('home');
		$this->load->view('templates/footer', $data);
	}
}