<?php

class Pages extends CI_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->model('radio_model');
}

public function view($page = 'radio')
{

	if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}

	$data['title'] = ucfirst($page); // Capitalize the first letter

	$this->load->view('templates/header', $data);
	$this->load->view('pages/'.$page, $data);
	$this->load->view('templates/footer', $data);

}

public function loadChat()
{
	$this->news_model->get_radio();
}

}