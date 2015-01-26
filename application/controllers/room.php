<?php
session_start();

// Used to display channels

class Room extends CI_Controller {

 function __construct()
 {
	parent::__construct();
	$this->load->model('room_model','',TRUE);
	$this->load->helper(array('form'));
	$this->load->library('session');
	$this->load->helper('url');
 }

// Channel View
	public function view($slug)
	{
	    $data['title'] = $slug;
	    $data['test'] = $slug;
		$data['slug'] = $_POST['slug'] = $slug;
	    $check = $this->room_model->check_slug_exists($slug);
// If channel exists, load
	    if ($check)
	    {
		$this->load->view('room/main_view', $data);
	    }
// Else, load new channel form
	    else
	    {
		$this->load->view('templates/form_header', $data);
		$this->load->view('room/new', $data);
		$this->load->view('templates/form_footer', $data);
		}
	}
// Displays the channel information
	public function shows($slug)
	{
		$data['slug'] = $_POST['slug'] = $slug;
		$this->load->view('room/shows', $data);
	}
// Displays the upload form after post
	public function upload($slug)
	{
		$data['slug'] = $_POST['slug'] = $slug;
		$this->load->view('room/upload', $data);
	}
// Displays the upload form for initial load
	public function upload_view($slug)
	{
		$data['slug'] = $slug;
	    $data['title'] = 'Upload Form';
		$this->load->view('room/upload', $data);
	}
// Used to display host page
	public function host($slug)
	{
// If logged in, load host page
		if($this->session->userdata('logged_in')['username'] === $slug)
		{
		    $data['title'] = $slug.' Host Page';
			$data['slug'] = $_POST['slug'] = $slug;
			$this->load->view('templates/form_header', $data);
			$this->load->view('command/host', $data);
			$this->load->view('templates/form_footer', $data);
		}
// Else, request login
		else
		{
		    $data['title'] = $slug;
		 	$data['slug'] = $slug;
			$this->load->view('templates/form_header', $data);
		 	$this->load->view('command/login', $data);
			$this->load->view('templates/form_footer', $data);
		}
	}
	
}

?>