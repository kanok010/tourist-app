<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function index()
	{
            echo "test new file";
		$this->load->view('welcome_message');
	}
        

        
        public function myfunction(){   
            $this->load->database();   
            $this->load->model('news_m');   
            echo $this->news_m->get_data(); 
            
        }
}
