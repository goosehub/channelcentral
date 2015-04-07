<?php

// Used for creating new channels

class Create extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('room_model', '', TRUE);
        $this->load->model('create_model', '', TRUE);
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
    }
// Process new channel request
    public function make_room($slug) {
// Validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|alpha_dash|min_length[1]|max_length[100]|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('hostLengthInput', 'Length Limit', 'trim|xss_clean|integer');
        $this->form_validation->set_rules('hostQueueLimitInput', 'Queue Limit', 'trim|xss_clean|integer');
        $this->form_validation->set_rules('hostCurrentShowNameInput', 'Headline', 'trim|xss_clean');
        $this->form_validation->set_rules('hostCurrentShowDescInput', 'Description', 'trim');
        $slug       = strtolower($slug);
        $check_slug = $this->room_model->check_slug_exists($slug);
        
// If validation fails
        if ($this->form_validation->run() == FALSE) {
// Reload create page
            $data['title'] = 'Problem with your form';
            $this->load->view('templates/form_header', $data);
            $this->load->view('room/new', $data);
            $this->load->view('templates/form_footer', $data);
        } else if ($check_slug) {
// Room is already taken. Redirect to home page
            redirect('/', 'refresh');
        } else {
            // Image upload
            // Set rules
            $config['upload_path']   = './upload/background/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size']      = '100000000';
            $config['max_width']     = '10240';
            $config['max_height']    = '7680';
            $config['encrypt_name']  = TRUE;
            $this->load->library('upload', $config);
            // If upload failed, create room anyways, with default background
            if (!$this->upload->do_upload() && ! isset($file)) {
                $filename = 'default.jpg';

            }
            // Else, set filename with data
            else 
            {
                $file     = $this->upload->data();
                $filename = $file['file_name'];
            }
            $password = $this->input->post('password');
            $hostLengthInput = $this->input->post('hostLengthInput');
            $hostQueueLimitInput = $this->input->post('hostQueueLimitInput');
            $hostCurrentShowNameInput = $this->input->post('hostCurrentShowNameInput');
            $hostCurrentShowDescInput = $this->input->post('hostCurrentShowDescInput');
            // Convert times into minutes
            $hostQueueLimitInput = $hostQueueLimitInput * 60;
            $hostLengthInput = $hostLengthInput * 60;
            // Create room
            $result   = $this->create_model->new_room($slug, $password, $hostLengthInput, 
                $hostQueueLimitInput, $hostCurrentShowNameInput, $hostCurrentShowDescInput, $filename);
            // Create session
            $result   = $this->room_model->verify_room_password($slug, $password);
            if ($result) {
                $sess_array = array();
                foreach ($result as $row) {
                    $sess_array = array(
                        'username' => $row->slug
                    );
                    $this->session->set_userdata('logged_in', $sess_array);
                }
            }
// Redirect to channel
            redirect('' . $slug, 'refresh');
        }
    }
// Landing page after creating room, currently disabled
    public function start($slug) {
        $data['slug']  = $slug;
        $data['title'] = 'Get Started';
        $this->load->view('templates/form_header', $data);
        $this->load->view('command/start', $data);
        $this->load->view('templates/form_footer', $data);
    }
    
}

?>