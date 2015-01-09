<?php

class Room extends CI_Controller {

 function __construct()
 {
	parent::__construct();
	$this->load->model('room_model','',TRUE);
	$this->load->helper(array('form'));
	$this->load->library('session');
	$this->load->helper('url');
 }

	public function view($slug)
	{
	    $data['title'] = $slug;
	    $data['test'] = $slug;
		$data['slug'] = $_POST['slug'] = $slug;
	    $check = $this->room_model->check_slug_exists($slug);
	    if ($check)
	    {
		$this->load->view('room/main_view', $data);
	    }
	    else
	    {
		$this->load->view('templates/form_header', $data);
		$this->load->view('room/new', $data);
		$this->load->view('templates/form_footer', $data);
		}
	}
	public function shows($slug)
	{
		$data['slug'] = $_POST['slug'] = $slug;
		$this->load->view('room/shows', $data);
	}
	public function upload($slug)
	{
		$data['slug'] = $_POST['slug'] = $slug;
		$this->load->view('room/upload', $data);
	}
	public function host($slug)
	{
		if($this->session->userdata('logged_in')['username'] === $slug)
		{
		    $data['title'] = $slug.' Host Page';
			$data['slug'] = $_POST['slug'] = $slug;
			$this->load->view('templates/form_header', $data);
			$this->load->view('command/host', $data);
			$this->load->view('templates/form_footer', $data);
		}
		else
		{
// Request login
		    $data['title'] = $slug;
		 	$data['slug'] = $slug;
			$this->load->view('templates/form_header', $data);
		 	$this->load->view('command/login', $data);
			$this->load->view('templates/form_footer', $data);
		}
	}
	public function master($slug)
	{
	    $data['title'] = $slug.' Master Page';
		$data['slug'] = $_POST['slug'] = $slug;
		$this->load->view('command/master', $data);
	}
	public function main($slug)
	{
	    $data['title'] = $slug;
		$data['slug'] = $_POST['slug'] = $slug;
		$this->load->view('room/main_view', $data);
	}
	
}

?>