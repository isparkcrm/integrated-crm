<?php
 //require 'PHPMailer/PHPMailer/PHPMailerAutoload.php';
 
  class EmailTicket {
    private $db;   
    public function __construct(){
      $this->db = new Database;
    }


//-----------------------------------------------------------------------------------------------------------------
public function createEmailTicket($data,$file,$message){
    $status="Open";
    $severity="P2";        
  date_default_timezone_set('Asia/Kolkata');
  $m = date('h');
  $y = date('i');
  $d = date('s');
  $tid = $y.$m.$d;    
  
 // Print_r($message);die;
  $output='<p>Dear Customer,</p>';
  $output.='<p>Your Ticket has been created successfully. Your ticket number is &nbsp;' .$tid. ' </p>' ; 
  $output.='<p>Thanks & Regards,</p>';
   $output.='<p>Futurecalls Helpdesk Team</p>';
  $body = $output; 
  $subject ="[". $tid."#]" .$data['subject'];
 // $process=10;
  
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
              //$mail-> addAddress('ravi@octelnetworks.com'); 
              //$mail-> addAddress('sridhar@octelnetworks.com'); 
  
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
  //----------------------------------------------------------------------------------------------------------
  // *********************************** Helpdesk Message ****************************************************
  if($data['campaign']=="1"){
    $output="New Ticket raised From";
    $output.=" ".$data['email'].'<p>Your ticket number is &nbsp;' .$tid. ' </p>' ; 
    $output.='<p>Thanks & Regards,</p>';
    $output.='<p>Futurecalls Helpdesk Team</p>';
    $body = $output; 
    $subject =$tid."[".$data['subject']."]";
  
    
    $email_to = $data['campaign_email'];
    
    
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
             //$mail-> addAddress('ravi@octelnetworks.com'); 
              //$mail-> addAddress('sridhar@octelnetworks.com'); 
    
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
  $output="New Ticket raised From";
  $output.=" ".$data['email'].'<p>Your ticket number is &nbsp;' .$tid. ' </p>' ; 
  $output.='<p>Thanks & Regards,</p>';
  $output.='<p>Futurecalls Helpdesk Team</p>';
  $body = $output; 
  $subject =$tid."[".$data['subject']."]";
  $email_to = $data['campaign_email'];
  
  
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
             //$mail-> addAddress('ravi@octelnetworks.com'); 
              //$mail-> addAddress('sridhar@octelnetworks.com'); 
  
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
$read_status = "2";
  //----------------------------------------------------------------------------------------------------------
    $this->db->query('INSERT INTO tickets(clientID,email,number,subject,description,severity,ticketID,status,campaign_ID,process,attachment,read_status) VALUES( :clientID,:email,:number,:title, :description,:severity, :tid, :status,:campaignID,:process,:file,:read_status)');
    // Bind values
   
    $this->db->bind(':clientID', $data['client']);
    $this->db->bind(':email', $data['email']);
     $this->db->bind(':number', $data['number']);
    $this->db->bind(':title', $data['subject']);
    $this->db->bind(':description', $message);
    $this->db->bind(':severity',$severity);  
    $this->db->bind(':tid',$tid);   
    $this->db->bind(':status',$status);    
    $this->db->bind(':campaignID', $data['campaign']);
    $this->db->bind(':process', $data['process']);
    $this->db->bind(':file', $file);
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
  $this->db->query('SELECT usertype  FROM users WHERE email = :username OR number =:number');
  $this->db->bind(':username', $from);
  $this->db->bind(':number', $from);
  $row = $this->db->single();
  $clientID = $row->usertype;
  //print_r($camapignID);die;
   return $clientID;
}
//------------------------------------------------------------------------------------------------------
public function FindNumber($from){
  $this->db->query('SELECT number  FROM users WHERE email = :username');
  $this->db->bind(':username', $from);
  $row = $this->db->single();
  $clientID = $row->number;
  //print_r($camapignID);die;
   return $clientID;
}
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
  $output='<p>Dear Customer,</p>';
  $output.='<p>You are not a registered customer please contact system admin to register your account </p>' ; 
  $output.='<p>Thanks & Regards,</p>';
 $output.='<p>Futurecalls Helpdesk Team</p>';
  $body = $output; 
  $subject = 'Access Denied';
  
  $email_to = $from;
  
 
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
              //$mail-> addAddress('ravi@octelnetworks.com'); 
              //$mail-> addAddress('sridhar@octelnetworks.com'); 
  
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