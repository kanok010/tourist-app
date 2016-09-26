<?php

    defined('BASEPATH') OR exit('No direct script access allowed');  
    //require(APPPATH.'libraries/REST_Controller.php');  
 
    class Profile extends CI_Controller{
        
        public function getCDBData($msisdn){            
            $ch = curl_init();
              curl_setopt( $ch, CURLOPT_URL, 'http://172.19.188.7:10080/cdbldap/query_cdb.jsp?msisdn='.$msisdn.'&action=getting' );
              curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
              $content = curl_exec( $ch );
              curl_close($ch);
              $output = (explode('|', $content));
              
              if($output[1]){
                    $data = array();
                    $data['MSISDN']       = $output[0];
                    $data['IMSI']         = $output[1];
                    $data['STATUS']       = $output[2];
                    $data['SUBTYPE']      = $output[3];
                    $data['SUBCAT']       = $output[4];
                    $data['PRICEPLAN']    = $output[5];
                    $data['INCHAIN']      = $output[6];
                    $data['VAS']          = $output[7];
                    $data['CONVERGENCE']  = $output[8];
                    $data['FIRTCALL']     = $output[9];
                    $data['OPER']         = $output[10]; 
                    
                    $key = "msisdn:".$msisdn;
                    $redis = new Redis();
                    $redis->connect(REDIS_HOST, REDIS_PORT);
                    date_default_timezone_set("Asia/Bangkok");
                    $redis->hmset($key, [
                            'MSISDN'    => $data['MSISDN'],
                            'IMSI'      => $data['IMSI'],
                            'STATUS'    => $data['STATUS'],
                            'SUBTYPE'   => $data['SUBTYPE'],
                            'SUBCAT'    => $data['SUBCAT'],
                            'PRICEPLAN' => $data['PRICEPLAN'],
                            'INCHAIN'   => $data['INCHAIN'],
                            'VAS'       => $data['VAS'],
                            'CONVERGENCE'=> $data['CONVERGENCE'],
                            'FIRTCALL'   => $data['FIRTCALL'],
                            'OPER'       => $data['OPER'],
                            'TIMESTAMP'  => date("Y-m-d H:i:s"),
                         ]);
                        $redis->expire($key, 3600*24); // expires in 1 hour
                    return $data;
              }else{
                    return "no";
              }
        }
        
        public function index(){
            $msisdn = "66839956235"; 
            $redis = new Redis();
            $redis->connect(REDIS_HOST, REDIS_PORT);
            $key = "msisdn:".$msisdn;
            $data = $redis->hgetall($key);
            if($data){
                debuga($data); 
            }else{
                $data = $this->getCDBData($msisdn);
                debuga($data);
            }
           
            // $data = $this->getCDBData($msisdn);
            // debuga($data);
           
        }
        
        public function getAccountProfile($msisdn){
   
            $data = $this->getCDBData($msisdn);
           
            debuga($data);
           
        }
        
        public function check_active($msisdn){
        
            $data = $this->getCDBData($msisdn);
           
            if(is_array($data)){
                if($data['STATUS']=="active"){
                    
                    echo "yes";
                    
                }else{
                    
                    echo "no";
                    
                } 
            }else{
               
                echo "no";
                
            } 
        }
    }
