<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->database();
        $this->load->model('Admin_m');
    }
    
    public function _render($output = null)
    {      
        $this->load->view('layouts/default',$output);
    }
    
    public function index() {

        
        if($this->session->userdata('logged_in'))
        {
            
            $session_data = $this->session->userdata('logged_in');
            $users = $this->Admin_m->get_data();

            $this->_render((object)array(
                    'data' => $users,
                    'username'=>$session_data['username'],
                    'content'=>'admin/index',
                    'menu'=>'admin',
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
            $users = $this->Admin_m->get_users_by_id($id);
                //debuga($users);
                $data = $users;
                $content = "admin/edit";
                  
             $this->_render((object)array(
                       'data' => $data,
                       'username'=>$session_data['username'],
                       'content'=>$content,
                       'menu'=>'admin',
                       'js_files' => array() ,
                       'css_files' => array()));
        }else{
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
        
    }
    
}