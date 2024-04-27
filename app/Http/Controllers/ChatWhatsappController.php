<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatWhatsappController extends Controller
{
    public function pullMessege(){
        // Pull messages (for push messages please go to settings of the number) 
        $my_apikey = "MRK3JMUWVHQ3DYF0609K"; 
        $number = "6288228832803"; 
        $type = "IN"; 
        $markaspulled = "0"; 
        $getnotpulledonly = "0"; 
        $api_url  = "http://panel.apiwha.com/get_messages.php"; 
        $api_url .= "?apikey=". urlencode ($my_apikey); 
        $api_url .=	"&number=". urlencode ($number); 
        $api_url .= "&type=". urlencode ($type); 
        $api_url .= "&markaspulled=". urlencode ($markaspulled); 
        $api_url .= "&getnotpulledonly=". urlencode ($getnotpulledonly); 
        $my_json_result = file_get_contents($api_url, false); 
        $my_php_arr = json_decode($my_json_result); 
        $a=0;

        // dd($my_php_arr[0]);
        for($i=0; $i<count($my_php_arr);$i++) 
        { 
        $x[$a] = "Sender : ".$my_php_arr[0]->from."/n Messege :".$my_php_arr[0]->text . "/n Creation Date :".$my_php_arr[0]->creation_date ."/n";
        }
        return $x;
        
    }

    public function ChatWa($phone){
        $my_apikey = "MRK3JMUWVHQ3DYF0609K"; 
        $destination = $phone; 
        $message = "Testing"; 
        $api_url = "http://panel.apiwha.com/send_message.php"; 
        $api_url .= "?apikey=". urlencode ($my_apikey); 
        $api_url .= "&number=". urlencode ($destination); 
        $api_url .= "&text=". urlencode ($message); 
        dd($api_url, false);
        $my_result_object = json_decode(file_get_contents($api_url, false)); 
        echo "<br>Result: ". $my_result_object->success; 
        echo "<br>Description: ". $my_result_object->description;
        echo "<br>Code: ". $my_result_object->result_code;
    }
    public function tes(){
        // $text = '088228832803';
        // $text = str_split($text);
        // $x = str_replace('0','62',$text[0]);
        // $y=null;
        // for($i=1; $i <count($text)-1 ; $i++){
        //  $y .= $text[$i+1];
        // }
        // echo $x.$y;
    }
}
