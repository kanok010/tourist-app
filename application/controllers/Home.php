<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {
        function __construct()
        {
           parent::__construct();
        }
         
        public function _render($output = null)
	{
            $this->load->view('layouts/default',$output);
	}
      
        function index()
        {
            if($this->session->userdata('logged_in'))
            {
                $session_data = $this->session->userdata('logged_in');

                $this->_render((object)array(
                    'data' => '',
                    'username'=>$session_data['username'],
                    'content'=>'home/index',
                    'menu'=>'home' ,
                    'js_files' => array() ,
                    'css_files' => array()));
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
        
        function redis(){

           //Connecting to Redis server on localhost
            $redis = new Redis();
            $redis->connect(REDIS_HOST, REDIS_PORT);
            $key = 'msisdn:12347';
           $redis->set($key, 'age', 86400);
            $test = $redis->get($key);
            if($test)
            {
                print_r($redis->get('$key'));
            }
          


           
            // finally
           // $data = $redis->hgetall($key);
          //  print_r($data); // returns all key-value that belongs to the hash

        }
        
        function error404(){
            if($this->session->userdata('logged_in'))
            {
                $session_data = $this->session->userdata('logged_in');
           
                $this->_render((object)array(
                       'data' => '',
                       'username'=>$session_data['username'],
                       'content'=>'home/404',
                       'menu'=>'home' ,
                       'js_files' => array() ,
                       'css_files' => array()));
            }else{
                //If no session, redirect to login page
                redirect('login', 'refresh');
            }
         
        }
}