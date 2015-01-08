<?php
session_start();


class Room extends CI_Controller {

 function __construct()
 {
	parent::__construct();
	$this->load->model('room_model','',TRUE);
	$this->load->helper(array('form'));
	$this->load->library('session');
 }

	public function view($slug)
	{
	    $data['title'] = $slug;
	    $data['test'] = $slug;
		$data['slug'] = $_POST['slug'] = $slug;
	    $check = $this->room_model->check_slug_exists($slug);
	    if ($check)
	    {
		$this->load->view('room', $data);
	    }
	    else
	    {
		$this->load->view('new', $data);
		}
	}
	public function shows($slug)
	{
		$data['slug'] = $_POST['slug'] = $slug;
		$this->load->view('shows', $data);
	}
	public function upload($slug)
	{
		$data['slug'] = $_POST['slug'] = $slug;
		$this->load->view('upload', $data);
	}
	public function host($slug)
	{
		if($this->session->userdata('logged_in')['username'] === $slug)
		{
		    $data['title'] = $slug.' Host Page';
			$data['slug'] = $_POST['slug'] = $slug;
			$this->load->view('host', $data);
		}
		else
		{
// Request login
		    $data['title'] = $slug;
		 	$data['slug'] = $slug;
		 	$this->load->view('login', $data);
		}
	}
	public function master($slug)
	{
	    $data['title'] = $slug.' Master Page';
		$data['slug'] = $_POST['slug'] = $slug;
		$this->load->view('master', $data);
	}
	public function main($slug)
	{
	    $data['title'] = $slug;
		$data['slug'] = $_POST['slug'] = $slug;
		$this->load->view('room', $data);
	}
	
}

?>