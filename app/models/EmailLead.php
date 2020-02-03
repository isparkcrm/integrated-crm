<?php
 //require 'PHPMailer/PHPMailer/PHPMailerAutoload.php';
 
  class EmailLead {
    private $db;   
    public function __construct(){
      $this->db = new Database;
    }


//-----------------------------------------------------------------------------------------------------------------
public function createEmailLead($data){
    $status="Open";
    $severity="P2";        
  date_default_timezone_set('Asia/Kolkata');
  $m = date('h');
  $y = date('i');
  $d = date('s');
  $leadid = $y.$m.$d;    
  
  $output='<p>Dear Customer,</p>';
  $output.='<p>Your Lead been created successfully. Your Lead ID is &nbsp;' .$leadid. ' </p>' ; 
  $output.='<p>Thanks & Regards,</p>';
  $output.='<p>Futurecalls Sales Team</p>';
  $body = $output; 
  $subject ="[". $leadid."#]" .$data['subject'];
  $process=10;
  
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
  //----------------------------------------------------------------------------------------------------------
  // *********************************** Helpdesk Message ****************************************************
  
  
  $output="New Ticket raised From";
  $output.=" ".$data['email'].'<p>Your ticket number is &nbsp;' .$tid. ' </p>' ; 
  $output.='<p>Thanks & Regards,</p>';
  $output.='<p>Octelnetworks Helpdesk Team</p>';
  $body = $output; 
  $subject =$tid."[".$data['subject']."]";
  $email_to ='veera@futurecalls.com'; // use sales@futurecalls.com  ID when Go live
  
  
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
              $mail-> addAddress('ravi@octelnetworks.com'); 
              $mail-> addAddress('sridhar@octelnetworks.com');  
  
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
    $this->db->query('INSERT INTO email_leads (lead_id, email, subject, description, campaign_ID) VALUES(:leadid, :email, :title, :description, :campaignID)');
    $this->db->bind(':leadid', $leadid);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':title', $data['subject']);
    $this->db->bind(':description', $data['description']);  
    $this->db->bind(':campaignID', $data['campaign']);   
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
//-------------------------------------------------------------------------------------------------------
/*public function FindClient($from){
  $this->db->query('SELECT usertype  FROM users WHERE email = :username');
  $this->db->bind(':username', $from);
  $row = $this->db->single();
  $clientID = $row->usertype;
  //print_r($camapignID);die;
   return $clientID;
}
//------------------------------------------------------------------------------------------------------
public function  registeredClient($from){
  $output='<p>Dear Customer,</p>';
  $output.='<p>You are not a registered customer please contact system admin to register your account </p>' ; 
  $output.='<p>Thanks & Regards,</p>';
  $output.='<p>Octelnetworks Helpdesk Team</p>';
  $body = $output; 
  $subject = 'Access Denied';
  
  $email_to = $from;
  
 
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
}
//------------------------------------------------------------------------------------------------------
public function AddEmailTicket($data,$tid,$status){

if($status=='Close'){
  $output='<p>Dear Customer,</p>';
  $output.='<p>Your ticket has been closed. Please check with your portal</p>' ; 
  $output.='<p>Thanks & Regards,</p>';
  $output.='<p>Octelnetworks Helpdesk Team</p>';
  $body = $output; 
  $subject =$data['subject'];
  
  $email_to = $data['email'];
  
 
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
}
else{
  $output='<p>Dear Customer,</p>';
  $output.='<p>Your Request has been received. Our support executive will contact you soon. </p>' ; 
  $output.='<p>Thanks & Regards,</p>';
  $output.='<p>Octelnetworks Helpdesk Team</p>';
  $body = $output; 
  $subject =$data['subject'];
  
  $email_to = $data['email'];
  
 
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
}
$this->db->query('INSERT INTO emails(ticketID,email,subject,description) VALUES( :ticketID,:email,:subject, :description)');
    // Bind values
   
    $this->db->bind(':ticketID', $tid);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':subject', $data['subject']);
    $this->db->bind(':description', $data['description']);
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
     
}	*/
//-------------------------------------------------------------------------------------------------------
  }