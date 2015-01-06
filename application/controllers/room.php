<?php

class Room extends CI_Controller {

	public function view($slug)
	{
		session_start();
	    $data['title'] = $slug;
		$data['slug'] = $slug;
		$this->load->view('room', $data);
	}
	public function host($slug)
	{
	    $data['title'] = $slug.' Host Page';
		$data['slug'] = $slug;
		$this->load->view('host', $data);
	}
	public function master($slug)
	{
	    $data['title'] = $slug.' Master Page';
		$data['slug'] = $slug;
		$this->load->view('master', $data);
	}
	public function main($slug)
	{
	    $data['title'] = $slug;
		$data['slug'] = $slug;
		$this->load->view('room', $data);
	}
	
}