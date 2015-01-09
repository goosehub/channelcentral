<?php

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

	public function index()
	{
// If logged in, set username
		if ($this->session->userdata('logged_in')['username'])
		{
			$data['username'] = $this->session->userdata('logged_in')['username'];
		}
// Get channel list
		$channels = $data['channels'] = $this->home_model->channel_list();
		$recent_uploads = $data['recent_uploads'] = $this->home_model->recently_uploaded();
	    $data['title'] = 'ChannelCentral';
		$this->load->view('templates/header', $data);
		$this->load->view('home', $data);
		$this->load->view('templates/footer', $data);
	}
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
			redirect($slug, 'refresh');
		}
	}
	public function not_found()
	{
	    $data['title'] = 'Page Not Found';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/not_found', $data);
		$this->load->view('templates/footer', $data);
	}
}