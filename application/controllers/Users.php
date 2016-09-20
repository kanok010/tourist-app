<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->database();
        $this->load->model('Users_m');
    }
    
    public function index() {

        
        if($this->session->userdata('logged_in'))
        {
            
            $session_data = $this->session->userdata('logged_in');
            $users = $this->Users_m->get_data();

            $data = array(
                'users'=>$users,
                'username'=>$session_data['username'],
                'content'=>'users/index',
                'menu'=>'users'
            );
            $this->load->view('layouts/default',$data);
        }else{
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }

	

	
	
}