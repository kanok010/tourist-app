<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reward extends CI_Controller{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->database();
        $this->load->model('Reward_m');
    }
    
    public function _render($output = null)
    {      
        $this->load->view('layouts/default',$output);
    }
    
    
    function index(){
        if($this->session->userdata('logged_in'))
        {
            
            $session_data = $this->session->userdata('logged_in');
            $data = $this->Reward_m->get_all_data();

            $this->_render((object)array(
                    'data' => $data,
                    'username'=>$session_data['username'],
                    'content'=>'reward/index',
                    'menu'=>'reward',
                    'js_files' => array() ,
                    'css_files' => array()));
        }else{
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }
}
