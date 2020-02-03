<?php
  class EmailTicket extends CI_Model
 {
	  public function __construct()
	  {
		$this->load->database('default');
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
  
  $output='<p>Dear Customer,</p>';
  $output.='<p>Your Ticket has been created successfully. Your ticket number is &nbsp;' .$tid. ' </p>' ; 
  $output.='<p>Thanks & Regards,</p>';
  $output.='<p>Futurecalls Helpdesk Team</p>';
  $body = $output; 
  $subject = $tid."[".$data['subject']."]";
  $process=10;
  
  $email_to = $data['email'];
  
 
  $mail=new PHPMailer;
  
          $mail->isSMTP();      
          $mail->Host='smtp.futurecalls.com';
          $mail->SMTPAuth=true; 
          $mail->Username ='helpdesk@futurecalls.com';
          $mail->Password = 'Password@123'; 
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
    $this->db->query('INSERT INTO tickets(clientID,email,subject,description,severity,ticketID,status,campaign_ID,process) VALUES( :clientID,:email,:title, :description,:severity, :tid, :status,:campaignID,:process)');
    // Bind values
   
    $this->db->bind(':clientID', $data['client']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':title', $data['subject']);
    $this->db->bind(':description', $data['description']);
    $this->db->bind(':severity',$severity);  
    $this->db->bind(':tid',$tid);   
    $this->db->bind(':status',$status);    
    $this->db->bind(':campaignID', $data['campaign']);
    $this->db->bind(':process', $process);
   
    // Execute
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
}
//-------------------------------------------------------------------------------------------------------
public function FindCampaign($username){
  $query = $this->db->query('SELECT id FROM campaign_master WHERE email = "'.$username.'"');
  return $query->row();

}
//------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------
public function FindClient($email){
  $query = $this->db->query('SELECT usertype  FROM users WHERE email = "'.$email.'"');
 
  return $query->row();
}
//------------------------------------------------------------------------------------------------------
public function  registeredClient($email){
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
  }