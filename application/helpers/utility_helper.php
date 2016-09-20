<?PHP
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Bangkok");

        function debuga($arr){
            echo"==><br/>";
            echo"<pre>";
            print_r ($arr);
            echo"</pre>";
        }

	function ClassLoad($class_name=NULL,$type=".php"){
		$path = "controllers/";
		$className = ucfirst($class_name);
		if(trim($className)!=NULL)
		{
			/* autoload library classes */
			if(is_file(APPPATH.$path.$className.$type))
			{
				@include_once( APPPATH.$path.$className.$type );
					
				return new $className;
					
			}else{
				echo "Can't load class : ".APPPATH.$path.$className.$type;exit();
			}
		}
	}

	function console($data=NULL,$stop=FALSE){
		echo '<pre>';
		print_r($data);
		echo '</pre>';
	
		if($stop)
			exit();
	}

	function getapi($url=NULL, $send_cookie=NULL){
		if(!$url)
			return false;

		$ch=curl_init($url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		
		if($send_cookie){
			//curl_setopt($ch, CURLOPT_COOKIE, 'username="'.$_COOKIE['username'].'";token="'.$_COOKIE['token'].'"');
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cookie: username={$_COOKIE['username']};token={$_COOKIE['token']}"));
			//curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cookie: username=true;token=aed8b71f-60cb-400c-a9ef-1b5006a9ceb2"));
		}
		
		$xmlResponse=curl_exec($ch);

		curl_close($ch);

		return 	 $xmlResponse;
	}
	
	function postapi($url=NULL, $post_data=NULL){
		if(!$url)
			return false;
		
		$ch=curl_init($url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Content-Length: ' . strlen($post_data),
		"Cookie: username={$_COOKIE['username']};token={$_COOKIE['token']}"
		));
		
		$xmlResponse=curl_exec($ch);
		
		curl_close($ch);
		
		return 	 $xmlResponse;
	}
	
	function check_login(){
		if(!isset($_COOKIE['username']) && !isset($_COOKIE['token'])){
			redirect('login', 'refresh');
		}
		
		$result=getapi(API_URL.'pracharath/secured/account?name='.$_COOKIE['username'], TRUE);
		$result_data=json_decode($result);
		
		if($result_data->status==401){
			redirect('login', 'refresh');
		}
		else{
			return $result_data;
		}
	}
	
	function get_company($url=NULL){
		if(!$url){
			return false;
		}
		
		$process = curl_init();
		curl_setopt($process,CURLOPT_URL,$url);
		curl_setopt($process,CURLOPT_TIMEOUT,10);
		curl_setopt($process, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		));
		curl_setopt($process, CURLOPT_COOKIE, 'username="'.$_COOKIE['username'].'";token="'.$_COOKIE['token'].'"');
		$xmlResponse=curl_exec($process);
		
		curl_close($process);
	}
	
	function outputCSV($data) {
		$output = fopen("php://output", "w");
		foreach ($data as $row) {
			fputcsv($output, $row); // here you can change delimiter/enclosure
		}
		fclose($output);
	}
?>