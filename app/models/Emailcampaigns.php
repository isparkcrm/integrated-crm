<?php
 //require 'PHPMailer/PHPMailer/PHPMailerAutoload.php';
 
  class Emailcampaigns {
    private $db;   
    public function __construct(){
      $this->db = new Database;
    }


//-----------------------------------------------------------------------------------------------------------------
public function sendEmail($data,$uploadPath,$fileName){
 
 
  $body = $data['description']; 
  $subject =$data['title'];
 
  $groups = $this->Emailcontacts();           
 foreach($groups as $each){ 

          $process=10;
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
  
          $mail->addAttachment($uploadPath, $fileName);
         
          $mail-> addAddress($each->email); 
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
 $this->db->query('INSERT INTO email_campaign(subject,description,attachment) VALUES( :title, :description,:file)');
 // Bind values

 
 $this->db->bind(':title', $data['title']);
 $this->db->bind(':description', $data['description']);
 $this->db->bind(':file',$data['file']);
 // Execute
 if($this->db->execute()){
   return true;
 } else {
   return false;
 }
} 
//-------------------------------------------------------------------------------------------------------
public function Emailcontacts()
{
	
	$this->db->query('SELECT * FROM campaign_master');
   $results = $this->db->resultSet();
	return $results;
}

//-------------------------------------------------------------------------------------------------------

public function sendMessage($data,$name){
 
 $title="Management Message";

 $this->db->query('INSERT INTO management_info(name,title,description) VALUES( :name,:title, :description)');
 // Bind values

 
 $this->db->bind(':title', $title);
 $this->db->bind(':description', $data['description']);
 $this->db->bind(':name',$name);
 // Execute
 if($this->db->execute()){
   return true;
 } else {
   return false;
 }
} 
//-------------------------------------------------------------------------------------------------------\
 public function getMessage(){
    
      $this->db->query('SELECT *,
                        management_info.id as ID,
                         management_info.name as name,
                        management_info.title as title,
                        management_info.description as description,                     
                      management_info.created_at as created_at
                        FROM management_info
                                                     
                        ORDER BY management_info.created_at DESC
                        ');

                      $results = $this->db->resultSet();
                        return $results;
     
    }
//--------------------------------------------------------------------------------------------------------
  }