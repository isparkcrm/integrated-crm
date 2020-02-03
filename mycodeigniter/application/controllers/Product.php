<?php
class Product extends  CI_Controller {
	     public function __construct()
        {
			parent::__construct();
				$this->load->library('session');
				$this->load->view('inc/header');
				$this->load->view('inc/sidebar');
				$this->load->helper('form');
				$this->load->helper('url');	
				$this->load->library('form_validation');
				$this->load->model('product_model');
				$this->load->model('EmailTicket');
				date_default_timezone_set('Asia/Kolkata');					
		}
	public function index()
	{
		$this->load->view('campaign');
	}
	public function processview()
	{
		$this->load->view('processmaster');
	}
	public function add()
	{
		$this->load->model('Product_model');
		$data['getService'] = $this->Product_model->getService(); 
		$this->load->view('product_form',$data);
	}
	public function ticket()
	{
		$this->load->helper('json_output_helper');
		$this->load->model('Product_model');
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST')
		{
			echo "tst";
			json_output(500,array('status' => 500,'message' => 'Bad request.'));
		}
		else
		{
			header('Content-type: application/json');
			$params = json_decode(file_get_contents('php://input'),true);
			$email = $params['email'];
			$username = "santhiya@futurecalls.com";
			$campaignID=$this->EmailTicket->FindCampaign($username);
			$clientID=$this->EmailTicket->FindClient($email);
		    if($clientID=="")
			{
				$output='<p>Dear Customer,</p>';
				  $output.='<p>You are not a registered customer please contact system admin to register your account </p>' ; 
				  $output.='<p>Thanks & Regards,</p>';
				  $output.='<p>Futurecalls Helpdesk Team</p>';
				  $body = $output; 
				  $subject = 'Access Denied';
				  $email_to = $email;
				  $mail=new PHPMailer;
		  
				  $mail->isSMTP();      
				  $mail->Host='smtp.futurecalls.com';
				  $mail->SMTPAuth=true; 
				  $mail->Username ='helpdesk@futurecalls.com';
				  $mail->Password = 'Password@123'; 
				  $mail->SMTPSecure = 'tls';
				  $mail->Port ='587';
				  $mail->SetFrom('helpdesk@futurecalls.com'); 				  
				  $mail-> addAddress($email_to); 
				  $mail->Subject=$subject;
				  $mail->Body = $body;
				  $mail->isHTML(true); 
				  $mail->SMTPOptions = array
				(
					'ssl' => array
					(
						'verify_peer' => false,
						'verify_peer_name' => false,
						'allow_self_signed' => true
					)
				);
				  if(!$mail->Send())
				  {
					echo "Mailer Error: " . $mail->ErrorInfo;
				  }
				$this->emailticketModel->registeredClient($email);
            }
            else 
			{
			date_default_timezone_set('Asia/Kolkata');
			$m = date('h');
			$y = date('i');
     		$d = date('s');
			$tid = $y.$m.$d;    
			$output='<p>Dear Customer,</p>';
			$output.='<p>Your Website to Ticket has been created successfully. Your ticket number is &nbsp;' .$tid. ' </p>' ; 
			$output.='<p>Thanks & Regards,</p>';
			$output.='<p>Futurecalls Helpdesk Team</p>';
			$body = $output; 
			$subject = $tid ."Ticket Id";
			$email_to = $email;
			require 'PHPMailer/PHPMailer/PHPMailerAutoload.php';
			$mail=new PHPMailer;
			  
			  $mail->isSMTP();      
			  $mail->Host='smtp.futurecalls.com';
			  $mail->SMTPAuth=true; 
			  $mail->Username ='helpdesk@futurecalls.com';
			  $mail->Password = 'Pass@123'; 
			  // Enable this option to see deep debug info
	  
			  // $mail->SMTPDebug = 4; 
	  
			  $mail->SMTPSecure = 'tls';
	  
			  $mail->Port ='587';
	  
			  $mail->SetFrom('helpdesk@futurecalls.com'); 
	  
			  $mail-> addAddress($email_to); 
	  
			  $mail->Subject=$subject;
			  $mail->Body = $body;
			  $mail->isHTML(true); 
			  
			  
			  $mail->SMTPOptions = array(
				  'ssl' => array(
					  'verify_peer' => false,
					  'verify_peer_name' => false,
					  'allow_self_signed' => true
					   )
					 );
			  if(!$mail->Send()){
			  echo "Mailer Error: " . $mail->ErrorInfo;
			  }
				$params['campaign_ID']=$campaignID->id;
				$params['clientID']=$clientID->usertype;
				if($response = $this->Product_model->ticket($params))
					{
						json_output(200,array('response' =>$response,'message' => 'We will Get Back you Shortly'));
					}
				else
					{
						echo "somthing went wrong";
					}
				} 
				
			
		}
	}
	
	public function lead()
	{
		$this->load->helper('json_output_helper');
		$this->load->model('Product_model');
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST')
		{
			echo "tst";
			json_output(500,array('status' => 500,'message' => 'Bad request.'));
		}
		else
		{
			header('Content-type: application/json');
			$params = json_decode(file_get_contents('php://input'),true);
			$lead = $params['lead_id'];
			$customername = $params['customer_name'];
			$customernumber = $params['Contact_number'];
			$customeremail = $params['email'];
			if($response = $this->Product_model->lead($params))
					{
						$output='<p>Dear Team,</p>';
						$output.='<p>New Website to Lead is Generated &nbsp;' .$lead. ' </p>' ; 
						$output.='<p>Customer Name :'.$customername.'</p>';
						$output.='<p>Customer Number :'.$customernumber.'</p>';
						$output.='<p>Thanks & Regards,</p>';
						$output.='<p>Futurecalls Helpdesk Team</p>';
						$body = $output; 
						$subject =$lead;
						require 'PHPMailer/PHPMailer/PHPMailerAutoload.php';
						$mail=new PHPMailer;
								$mail->isSMTP();      
								$mail->Host='smtp.futurecalls.com';
								$mail->SMTPAuth=true; 
								$mail->Username ='helpdesk@futurecalls.com';
								$mail->Password = 'Pass@123'; 
								$mail->SMTPSecure = 'tls';
								$mail->Port ='587';
								$mail->SetFrom('helpdesk@futurecalls.com'); 
								$mail-> addAddress('veera@futurecalls.com'); 
								$mail-> addAddress($customeremail); 
								/* $mail-> addAddress('sales@futurecalls.com'); */ 
								$mail->Subject=$subject;
								$mail->Body = $body;
								$mail->isHTML(true); 
								$mail->SMTPOptions = array
								(
								'ssl' => array
								(
									'verify_peer' => false,
									'verify_peer_name' => false,
									'allow_self_signed' => true
								)
								);
								if(!$mail->Send()){
								echo "Mailer Error: " . $mail->ErrorInfo;
								}
									json_output(200,array('response' =>$response,'message' => 'Thanks For Enquiry our Sales We will get back you shortly'));
					}
					else
						{
							echo "somthing went wrong";
						}
		}
	}
	
	
		
}