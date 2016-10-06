<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reward extends CI_Controller{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
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

            
            $this->form_validation->set_rules('title', 'Title', 'required');

            $this->form_validation->set_rules('detail', 'Detail', 'required');

            $this->form_validation->set_rules('date_range', 'Start Date - End Date', 'required');

            $this->form_validation->set_rules('status', 'Status', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->_render((object)array(
                           'data' => '',
                           'username'=>$session_data['username'],
                           'content'=>"reward/create",
                           'menu'=>'reward-add',
                           'js_files' => array() ,
                           'css_files' => array()));
            } else {
                
                    if($_FILES['image']['name']){
			$config['upload_path'] = 'addons/default/modules/articles/uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			//$ends  = $this->get_extension($_FILES['userfile']['name']);		
			$ends=end(explode(".",$_FILES['userfile']['name']));
			$config['file_name']	= "articles_".time();		
			$filename=$config['file_name'].".".$ends;
			$this->load->library('upload', $config);
			$this->upload->do_upload();
                    }
            
                //Setting values for tabel columns
                $data = array
                (                 
                    'title' => $this->input->post('title'),
                    'detail' => $this->input->post('detail'),
                    'image' => $this->input->post('image'),
                    'point' => $this->input->post('point'),
                    'condition' => $this->input->post('condition'),
                    'start_date' => $this->input->post('start_date'),
                    'end_date' => $this->input->post('end_date'),
                    'status' => $this->input->post('status'),
                    'create_on' => date('Y-m-d H:i:s')
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
