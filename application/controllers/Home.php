<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {
         function __construct()
         {
           parent::__construct();
         }
//	public function index(){            
//            $data = array('content'=>'home/index');
//	    $this->load->view('layouts/default',$data);
//	}
        
        function index()
        {
            if($this->session->userdata('logged_in'))
            {
                $session_data = $this->session->userdata('logged_in');

                $data = array('username'=>$session_data['username'],'content'=>'home/index');
                $this->load->view('layouts/default',$data);
            }else{
                //If no session, redirect to login page
                redirect('login', 'refresh');
            }
         
        }

        function logout()
        {
            $this->session->unset_userdata('logged_in');
            session_destroy();
            redirect('home', 'refresh');
        }
	
	

}