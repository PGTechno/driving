<?php
//App::uses('Component', 'Controller');
class CustomComponent extends Component {
    function prd($data) {
        echo "<pre>";
        print_r($data);
        exit;
    }

    function uploadImage($newImg, $destination='images/users/', $prefix="user", $oldImg=""){
    	if($newImg){
    		$allowedTypes = array('jpg','jpeg','png');
    		$ext = strtolower(pathinfo($newImg['name'], PATHINFO_EXTENSION));
    		if (in_array($ext, $allowedTypes)) {
			    $imgName = uniqid($prefix.'_').".".$ext;
			    if(copy($newImg['tmp_name'],$destination.$imgName)){
			    	$this->deleteOldImage($destination.$oldImg);
			    	return	$imgName;
			    }else{
			    	return false;
			    }
			}else{
				return false;
			}    			
    	}    	
    }

    function deleteOldImage($url){
    	if(file_exists($url)){
    		if(unlink($url)){
    			return true;
    		}else{
    			return false;
    		}
    	}else{
    		return false;
    	}
    }

    function packageTimeInterval(){
        $interval = 15;
        $workingHours = 8*4*$interval/2;
        $time = array();
        for($interval;$interval < $workingHours; $interval+=15){
            $time[$interval] = $interval." Minutes"; 
        }
        return $time;
    }

    function timeZone($ip=""){
        try{     
              $url = "http://ip-api.com/json/$ip";
              $curl_handle=curl_init();
              curl_setopt($curl_handle,CURLOPT_URL,$url);
              curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
              curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
              $buffer = curl_exec($curl_handle);
              curl_close($curl_handle);
              if($buffer){
                    return json_decode($buffer,true);
              }else{
                    return false;
              }
        } catch (Exception $e) {
            $buffer = array('as'=>'AS9829 National Internet Backbone','city'=>'Jodhpur','country'=>'India','countryCode'=>'IN','isp'=>'BSNL','lat'=>'26.2867','lon'=>'73.03','org'=>'BSNL','query'=>'59.94.138.247','region'=>'RJ','regionName'=>'Rajasthan','status'=>'success','timezone'=>'Asia/Kolkata','zip'=>'342001');
            return $buffer;
        }      
    }

    function convertDate($date="",$oldTimeZone="UTC",$newTimeZone="",$format="Y-m-d H:i:s"){
        $oData = array();
        if($newTimeZone==""){ $oData = $this->timeZone(); $newTimeZone = $oData['timezone'];}
        $date = new DateTime($date, new DateTimeZone($oldTimeZone));
        $date->setTimezone(new DateTimeZone($newTimeZone));
        return $date->format($format);
    }
}