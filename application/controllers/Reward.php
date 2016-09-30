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
    
    function create() {
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            //Including validation library
            $this->load->library('form_validation');

            $this->form_validation->set_error_delimiters('<div class="alert alert-warning alert-dismissible">', '</div>');

            //Validating Package Name Field
            $this->form_validation->set_rules('package_name', 'Package Name', 'required');

            //Validating Price Plan Field
            $this->form_validation->set_rules('price_plan', 'Price Plan', 'required');

            //Validating Status Field
            $this->form_validation->set_rules('status', 'Status', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->_render((object)array(
                           'data' => '',
                           'username'=>$session_data['username'],
                           'content'=>"reward/create",
                           'menu'=>'price-plan-add',
                           'js_files' => array() ,
                           'css_files' => array()));
            } else {
                //Setting values for tabel columns
                $data = array
                (                 
                  'package_name' => $this->input->post('package_name'),
                  'price_plan' => $this->input->post('price_plan'),
                  'status' => $this->input->post('status')
                );
                //Transfering data to Model
                if($this->Reward_m->create($data)){
                     $this->session->set_flashdata('message','Data Inserted Successfully');                     
                      redirect('reward');               
                }              
            }
            
        }else{
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }
}
