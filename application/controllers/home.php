<?php

// Used for front page

class Home extends CI_Controller {

 function __construct()
 {
	parent::__construct();
	$this->load->model('home_model','',TRUE);
	$this->load->library('form_validation');
	$this->load->library('session');
	$this->load->helper('form');
	$this->load->helper('url');
}

// Front page index
	public function index()
	{
// If logged in, set username
		if ($this->session->userdata('logged_in')['username'])
		{
			$data['username'] = $this->session->userdata('logged_in')['username'];
		}
// Set time active is defined as
		$active_limit = time() - 1200;
// Get active channels
		$channels_by_chat = $this->home_model->active_channels_by_chat($active_limit);
		$channels_by_upload = $this->home_model->active_channels_by_upload($active_limit);
		$data['active_channels'] = $channels_by_chat;
// Get empty channels
		$empty_channels_by_chat = $this->home_model->empty_channels_by_chat($active_limit);
		$data['empty_channels'] = $empty_channels_by_chat;
// Disabled model calls
		// $recent_uploads = $data['recent_uploads'] = $this->home_model->recently_uploaded();
		// $recent_chats = $data['recent_chats'] = $this->home_model->recent_chats();
// Load view
	    $data['title'] = 'ChannelCentral';
		$this->load->view('templates/header', $data);
		$this->load->view('home/default', $data);
		$this->load->view('templates/footer', $data);
	}
// Returns search results
	public function do_search()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('search', 'Search', 'trim|required|xss_clean|alpha_dash|max_length[24]');
		if($this->form_validation->run() == FALSE)
		{
		}
		else
		{
			$slug = $this->input->post('search');
			$slug = strtolower($slug);
			redirect($slug, 'refresh');
		}
	}
// Not found page
	public function not_found()
	{
	    $data['title'] = 'Page Not Found';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/not_found', $data);
		$this->load->view('templates/footer', $data);
	}
	public function random()
	{
		$random_room = $this->home_model->random_room();
		$random_room = $random_room->slug;
		redirect($random_room, 'refresh');
	}
}