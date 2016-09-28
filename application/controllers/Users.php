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
    
    public function _render($output = null)
    {      
        $this->load->view('layouts/default',$output);
    }
    
    public function index() {

        
        if($this->session->userdata('logged_in'))
        {
            
            $session_data = $this->session->userdata('logged_in');
            $users = $this->Users_m->get_data();

            $this->_render((object)array(
                    'data' => $users,
                    'username'=>$session_data['username'],
                    'content'=>'users/index',
                    'menu'=>'users',
                    'js_files' => array() ,
                    'css_files' => array()));
        }else{
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }
        
    
    public function edit($id) {
        if($this->session->userdata('logged_in'))
        {   
            $session_data = $this->session->userdata('logged_in');
            $users = $this->Users_m->get_users_by_id($id);
                //debuga($users);
                $data = $users;
                $content = "users/edit";
                
            $message = " Missing argument 1 for Users ID";
            $severity = "warning";
             $this->_render((object)array(
                       'data' => $data,
                       'username'=>$session_data['username'],
                       'content'=>$content,
                       'menu'=>'users',
                       'js_files' => array() ,
                       'css_files' => array()));
        }else{
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
        
    }
    
}