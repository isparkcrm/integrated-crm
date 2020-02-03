<?php
 //require 'PHPMailer/PHPMailer/PHPMailerAutoload.php';
 
  class EmailSMS {
    private $db;   
    public function __construct(){
      $this->db = new Database;
    }

//----------------------------------------------------------------------------------------------------------------

public function createSmsLead($data){
	print_r($data);
    $status="Open";     
  date_default_timezone_set('Asia/Kolkata');
  $m = date('h');
  $y = date('i');
  $d = date('s');
  $leadid = $y.$m.$d;    
  
  // *********************************** Helpdesk Message ****************************************************
  
	   $username="santhiya@futurecalls.com";
	  $hash="54ca836a699bf0a7b0b5d8ceef9aafc6597f17380bd059d0edbe342b0155ccd7";
	  $test="0";
	  $sender="TXTLCL"; 
	  $message = 'your Lead is created successfully your Lead id is'.$leadid ;
	 $numbers = $data['number'];	
	 $message = urlencode($message); 
	// Prepare data for POST request
	$data1 = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);   
	// Process your response here
	echo $response;				 
	$commentstatus = "0";
	$leadsoruce = "SMS";
	$assignee = "Not Assignee";
  //----------------------------------------------------------------------------------------------------------
    $this->db->query('INSERT INTO lead (lead_id,mobile,message,leadsource,assignee,status,comment_status) VALUES( :leadid,:number,:message,:leadsoruce,:assignee,:status,:commentstatus)');
    // Bind values
   
    $this->db->bind(':number', $data['number']);
     $this->db->bind(':message', $data['message']);
	 $this->db->bind(':assignee',$assignee);
	 $this->db->bind(':leadsoruce',$leadsoruce);
    $this->db->bind(':leadid', $leadid);
    $this->db->bind(':status',$status);    
    $this->db->bind(':commentstatus', $commentstatus);
    // Execute
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
				 
}

//-----------------------------------------------------------------------------------------------------------------
public function createEmailTicket($data){
	
    $status="Open";
    $severity="P2";        
  date_default_timezone_set('Asia/Kolkata');
  $m = date('h');
  $y = date('i');
  $d = date('s');
  $tid = $y.$m.$d;    
  
  // *********************************** Helpdesk Message ****************************************************
  
 $username="santhiya@futurecalls.com";
				  $hash="54ca836a699bf0a7b0b5d8ceef9aafc6597f17380bd059d0edbe342b0155ccd7";
				  $test="0";
				  $sender="TXTLCL"; 
				  $message = 'your ticket is created successfully your ticket number is'.$tid ;
				 $numbers = $data['number'];	
				 $message = urlencode($message); 
				// Prepare data for POST request
				$data1 = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
				// Send the POST request with cURL
				$ch = curl_init('https://api.textlocal.in/send/?');
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($ch);
				curl_close($ch);  
				// Process your response here
				echo $response;				
$read_status = "2";
$process ="11";
  //----------------------------------------------------------------------------------------------------------
    $this->db->query('INSERT INTO tickets(clientID,number,subject,email,severity,process,ticketID,status,campaign_ID,read_status) VALUES( :clientID,:number,:title,:email,:severity,:process,:tid, :status,:campaignID,:read_status)');
    // Bind values
   
    $this->db->bind(':clientID', $data['client']);
     $this->db->bind(':number', $data['number']);
    $this->db->bind(':title', $data['subject']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':severity',$severity);
	$this->db->bind('process',$process);
    $this->db->bind(':tid',$tid);   
    $this->db->bind(':status',$status);    
    $this->db->bind(':campaignID', $data['campaign']);
    
    $this->db->bind(':read_status', $read_status);
    // Execute
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
				 
}
//-------------------------------------------------------------------------------------------------------
public function FindCampaign($username){
  $this->db->query('SELECT id FROM campaign_master WHERE email = :username');
  $this->db->bind(':username', $username);
  $row = $this->db->single();
 $camapignID = $row->id;
 //print_r($camapignID);die;
  return $camapignID;

}
//------------------------------------------------------------------------------------------------------
public function unreadmailcount($ticketID)
{
	$read_status = "2";
	$this->db->query('SELECT count(read_status) as total from email where read_status=:read_status and ticketID = :ticketID');
		$this->db->bind(':read_status', $read_status);
		$this->db->bind(':ticketID', $ticketID);
		$row = $this->db->single();
		$total = $row->total;
		return $total;
}
//-------------------------------------------------------------------------------------------------------
public function FindClient($from){
  $this->db->query('SELECT usertype  FROM users WHERE number =:number');
  $this->db->bind(':number', $from);
  $row = $this->db->single();
  $clientID = $row->usertype;
  //print_r($camapignID);die;
   return $clientID;
}

public function FindLeadclient($from){
  $this->db->query('SELECT customername  FROM lead WHERE mobile =:number');
  $this->db->bind(':number', $from);
  $row = $this->db->single();
  $clientID = $row->customername;
  //print_r($camapignID);die;
   return $clientID;
}
//------------------------------------------------------------------------------------------------------
/* public function FindNumber($from){
  $this->db->query('SELECT number  FROM users WHERE number = :username');
  $this->db->bind(':number', $from);
  $row = $this->db->single();
  $clientID = $row->number;
  //print_r($camapignID);die;
   return $clientID;
}  */
//------------------------------------------------------------------------------------------------------
public function FindProcess($clientID){
  $this->db->query('SELECT service_id  FROM client_service WHERE client_ID = :client LIMIT 1');
  $this->db->bind(':client', $clientID);
  $row = $this->db->single();
  $clientID = $row->service_id;
  //print_r($camapignID);die;
   return $clientID;
}
//------------------------------------------------------------------------------------------------------
public function  registeredClient($from){
  $username="santhiya@futurecalls.com";
  $hash="54ca836a699bf0a7b0b5d8ceef9aafc6597f17380bd059d0edbe342b0155ccd7";
  $test="0";
  $sender="TXTLCL"; 
  $message = 'Sorry Your not an Registered Customer by Futurecalls Technology Pvt Ltd';
 $numbers = $from;	
 $message = urlencode($message); 
// Prepare data for POST request
$data1 = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
// Send the POST request with cURL
$ch = curl_init('https://api.textlocal.in/send/?');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);  
// Process your response here
echo $response;
}
//------------------------------------------------------------------------------------------------------
public function AddEmailTicket($data,$tid,$status,$file,$message){

if($status=='Close'){
  $output='<p>Dear Customer,</p>';
  $output.='<p>Your ticket has been closed. Please check with your portal</p>' ; 
  $output.='<p>Thanks & Regards,</p>';
   $output.='<p>Futurecalls Helpdesk Team</p>';
  $body = $output; 
  $subject =$data['subject'];
  
  $email_to = $data['email'];
  
 
  $mail=new PHPMailer;
  
               $mail->isSMTP();      
          $mail->Host='czismtp.logix.in';
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
}
else{
  $output='<p>Dear Customer,</p>';
  $output.='<p>Your Request has been received. Our support executive will contact you soon. </p>' ; 
  $output.='<p>Thanks & Regards,</p>';
  $output.='<p>Futurecalls Helpdesk Team</p>';
  $body = $output; 
  $subject =$data['subject'];
  
  $email_to = $data['email'];
    $fromemail='helpdesk@futurecalls.com';  
 
  $mail=new PHPMailer;
  
             $mail->isSMTP();      
          $mail->Host='czismtp.logix.in';
          $mail->SMTPAuth=true; 
          $mail->Username ='helpdesk@futurecalls.com';
          $mail->Password = 'Pass@123'; 
          // Enable this option to see deep debug info
  
          // $mail->SMTPDebug = 4; 
  
          $mail->SMTPSecure = 'tls';
  
          $mail->Port ='587';
  
          $mail->SetFrom('helpdesk@futurecalls.com'); 
  
  
          $mail-> addAddress($email_to); 
             // $mail-> addAddress('ravi@octelnetworks.com'); 
             // $mail-> addAddress('sridhar@octelnetworks.com'); 
  
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
}
$this->db->query('INSERT INTO emails(ticketID,from_email,to_email,subject,description,attachment) VALUES( :ticketID,:from_email,:to_email,:subject, :description,:file)');
    // Bind values
   
    $this->db->bind(':ticketID', $tid);
    $this->db->bind(':from_email', $data['email'] );
    $this->db->bind(':to_email',$fromemail );
    $this->db->bind(':subject', $data['subject']);
    $this->db->bind(':description', $message);
    $this->db->bind(':file', $file);
    // Execute
    // Execute
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
}
//------------------------------------------------------------------------------------------------------
public function TicketStatus($tid)
{
  $this->db->query('SELECT status from tickets where ticketID=:tid');
   
  
  $this->db->bind(':tid',$tid);
  
  $row = $this->db->single();
  
   $total = $row->status;
   return $total;
     
} 
//-------------------------------------------------------------------------------------------------------
  }