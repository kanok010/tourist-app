<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PricePlan extends CI_Controller{
    
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->database();
        $this->load->model('PricePlan_m');
        //check_login();
    }
    
    public function _render($output = null)
    {      
        $this->load->view('layouts/default',$output);
    }
    function index(){
        if($this->session->userdata('logged_in'))
        {
            
            $session_data = $this->session->userdata('logged_in');
            $data = $this->PricePlan_m->get_all_data();

            $this->_render((object)array(
                    'data' => $data,
                    'username'=>$session_data['username'],
                    'content'=>'priceplan/index',
                    'menu'=>'price-plan',
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
                           'content'=>"priceplan/create",
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
                if($this->PricePlan_m->create($data)){
                     $this->session->set_flashdata('message','Data Inserted Successfully');                     
                      redirect('priceplan');               
                }              
            }
            
        }else{
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }
    
    
    
    public function edit($id) {
        if($this->session->userdata('logged_in'))
        {   
            $session_data = $this->session->userdata('logged_in');
            
            //Clear Value
            $this->session->set_flashdata('success','');    
            $this->session->set_flashdata('error','');    

            //------------------------------------------------------
             $this->load->library('form_validation');

            $this->form_validation->set_error_delimiters('<div class="alert alert-warning alert-dismissible">', '</div>');

            //Validating Package Name Field
            $this->form_validation->set_rules('package_name', 'Package Name', 'required');

            //Validating Price Plan Field
            $this->form_validation->set_rules('price_plan', 'Price Plan', 'required');

            //Validating Status Field
            $this->form_validation->set_rules('status', 'Status', 'required');
            
            if(isset($_POST['action']) && ($_POST['action']=='update')){
                $data = array
                (                 
                  'id' => $this->input->post('id'),
                  'package_name' => $this->input->post('package_name'),
                  'price_plan' => $this->input->post('price_plan'),
                  'status' => $this->input->post('status')
                );
            }else{
                $data = $this->PricePlan_m->get_data_by_id($id);
            }
            

            if ($this->form_validation->run() == TRUE) {               
                if($this->PricePlan_m->update($data)){
                    $this->session->set_flashdata('success','Data Updated Successfully');                     
                     // redirect('priceplan');               
                }else{
                    $this->session->set_flashdata('error','Data Updated Unsuccessfully'); 
                }

            }
            //------------------------------------------------------
//            if(isset($_POST['action']) && ($_POST['action']=='update')){
//                $data = array
//                (
//                  'id' => $this->input->post('id'),
//                  'package_name' => $this->input->post('package_name'),
//                  'price_plan' => $this->input->post('price_plan'),
//                  'status' => $this->input->post('status')
//                );
//                $this->load->model('PricePlan_m');
//                $result = $this->PricePlan_m->update($data);
//                
//                if($result) // call the method from the controller
//                {
//                    // update successful...
//
//                    echo "update data successful";
//                }
//                else
//                {
//                    // update not successful...
//                    echo "update data not successful";
//                }
//            }else{
//                 $data = $this->PricePlan_m->get_data_by_id($id);
//            }
            //debuga($data);
            //----------------------------------------------------
            $this->_render((object)array(
                       'data' => $data,
                       'username'=>$session_data['username'],
                       'content'=>"priceplan/edit",
                       'menu'=>'price-plan',
                       'js_files' => array() ,
                       'css_files' => array()));
        }else{
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }
    
    function delete($id)
    {
            if($this->PricePlan_m->delete($id))
            {
                $this->session->set_flashdata('success','The Price Plan has been deleted.'); 
                redirect('priceplan');
            }else{
                $this->session->set_flashdata('error','An error occured and the Price Plan was not deleted.'); 
                redirect('priceplan');
            }

    }
    

}
