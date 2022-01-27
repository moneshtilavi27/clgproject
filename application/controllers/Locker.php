<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Locker extends CI_Controller
{
    // custrocter to load 
    public function __construct()
    {
        parent::__construct();
        // load database
        $this->load->database();
        // load model
        $this->load->model('Lock',"key");
        //load library 
        $this->load->library('form_validation');
         // load session
         $this->load->library('session');
    }

    public function index()
    {
        if(isset($_POST['login']))
        {   
            $username = $this->input->post("username");
            $password = $this->input->post("pass");
            $data = $this->key->Login($username, $password);
                if($data!=-1 && $data[0]->user=="Admin" && $data[0]->me_id == 0 )
                {
                    $this->session->set_userdata('user_id', 1);
                    redirect('Admin/');                   
                }else if($data!=-1 && $data[0]->user=="Faculty" && $data[0]->me_id > 0)
                {
                    $this->session->set_userdata('user_id', $data[0]->me_id);
                    redirect('Faculty/'); 
                }else{
                    echo "<script>alert('Wrong Creadential, Try Again...');</script>";
                }
        }
        $this->load->view('locker/login');
    }

    public function userVerification()
    {
        $this->load->view('locker/forgetPassword');
    }

    public function userVerify()
    {
        if(isset($_POST['action']))
        {
           $username = $this->input->post("username");
           $user_id = $this->input->post("user_id");
           $data = $this->key->verify($username, $user_id);
           if($data=="true")
           {
                $me = $this->key->getDataId1("me","me_id",$user_id);
                $mee = $me->result();
                $num = $mee[0]->mob;
                $otp= rand(100000,999999);
                //$otp="1000000";
                $msg= "Your Password Recovary Otp is ". $otp;
                $_SESSION['otp'] = $otp;
                $this->session->mark_as_temp('otp', 900);
                $this->sms($num,$msg);
           }
           echo $data;
        }
    }

    public function sms($num,$msg)
    {
            $data = $this->key->smsCount();
			if($data <= 100){

			//Your authentication key
			$authKey = "35480ArCB0iT8G5e5f72ccP30";

			//Multiple mobiles numbers separated by comma
			$mobileNumber = $num;

			//Sender ID,While using route4 sender id should be 6 characters long.
			$senderId = "SHIVAM";

			//Your message to send, Add URL encoding here.
			$message = urlencode($msg);

			//Define route 
			$route = "default";
			//Prepare you post parameters
			$postData = array(
			    'authkey' => $authKey,
			    'mobiles' => $mobileNumber,
			    'message' => $message,
			    'sender' => $senderId,
			    'route' => $route
			);

			//API URL
			$url="http://sms.fastsmsindia.com/api/sendhttp.php";

			// init the resource
			$ch = curl_init();
			curl_setopt_array($ch, array(
			    CURLOPT_URL => $url,
			    CURLOPT_RETURNTRANSFER => true,
			    CURLOPT_POST => true,
			    CURLOPT_POSTFIELDS => $postData
			    //,CURLOPT_FOLLOWLOCATION => true
			));


			//Ignore SSL certificate verification
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


			//get response
			$output = curl_exec($ch);

			//Print error if any
			if(curl_errno($ch))
			{
			    echo 'error:' . curl_error($ch);
			}
			curl_close($ch);
			$date=date("Y-m-d");
            $time=date("H:i:s");
            
            $array = array(
                'sms_id' => "",
                'number' => $num,
                'msg'  => $msg,
                'date' => $date,
                'time' =>$time
            );
			$this->key->data_Insertion("sms", $array);
		}else{
			return "false";
		}		
    }

    public function otpVerify()
    {
        $otp = $this->input->post("otp");
        if($_SESSION['otp']==$otp)
        {
           echo "true";
        }else{
            echo "false";
        }
    }

    public function updatePass()
    {
       $user_id = $this->input->post("userid");
       $pass = $this->input->post("pass");
       $this->key->logUpdate($user_id, $pass);
    }

}
?>