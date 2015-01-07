<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 function __construct()
 {
	parent::__construct();
	$this->load->model('room_model','',TRUE);
	$this->load->helper(array('form'));
	$this->load->helper('url'); 
	$this->load->library('session');
 }

 public function admin($slug)
 {
    $data['title'] = $slug;
 	$data['slug'] = $slug;
 	$this->load->view('login', $data);
 }
 function verifylogin($slug)
  {
//This method will have the validation
   $this->load->library('form_validation');
   $this->form_validation->set_rules('slug', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
//Field validation failed.  User redirected to login page
     $data['title'] = 'Login';
     $this->load->view('login');
   }
   else
   {
//Go to private area
     redirect('/', 'refresh');
   }

 }
  function check_database($password)
 {
//Field validation succeeded.  Validate against database
   $slug = $this->input->post('slug');

//query the database
   $result = $this->room_model->verify_room_password($slug, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'username' => $row->slug
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
  function logout($slug)
  {
    session_start();
// Clear session data
    $this->session->unset_userdata('logged_in');
    session_destroy();
// Send to login page
    redirect('/', 'refresh');
  }


}

?>