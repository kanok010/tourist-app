<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  

class Example extends CI_Controller {  

     public function __construct()  
    {  
        parent::__construct();  
        $this->load->library('PHPRequests');  
    }  
  
    public function index(){  
        $url = 'http://localhost/tourist_ci/api/news/';  
        $headers = array('Content-Type' => 'application/json');  
        $data = array(  
            'id' => 3,  
            'topic'=>"ใหม่ หัวข้อข่าวที่ 3 อัพเดท"  
        );  
        $response = Requests::post($url, $headers, json_encode($data));  
        $responseData = $response->body; // ได้ข้อมูล json กลับมา  
        // แปลงข้อมูลกลับ และให้เป็น array  
        $arrData = json_decode($responseData,true);  
        echo "<pre>";  
        print_r($arrData); // ทดสอบแสดงข้อมูลจากตัวแปร array  
        echo "</pre>";  
    }  
}  