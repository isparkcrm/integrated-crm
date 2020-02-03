<?php
   include('config.php');
  
     
    /* connect to gmail */
    
    $hostname = "{czipop.logix.in:993/imap/ssl}INBOX";
    $username = "helpdesk@futurecalls.com";
    $password = "Pass@123";
  // $username = "helpdesk@futurecalls.com";
  // $password = "Password@123";
     $inbox = imap_open($hostname,$username,$password) or die('Cannot connect to mail:' . imap_last_error());
    //If we get to this point, it means that we have successfully
    //connected to our mailbox via IMAP.     
    //Lets get all emails that were received since a given date.
    $search = 'SINCE "' . date("j F Y", strtotime("-1 days")) . '"';
    //$emails = imap_search($inbox, $search,1,'UNSEEN');
    $emails = imap_search($inbox,'UNSEEN');

    if(!empty($emails)){
        //Loop through the emails.
        
        foreach($emails as $email){
            //Fetch an overview of the email.
            $header = imap_headerinfo($inbox, $email);
            $from = $header->from[0]->mailbox . "@" . $header->from[0]->host;
            $overview = imap_fetch_overview($inbox, $email);
            $overview = $overview[0];
            $message=(imap_fetchbody($inbox,$email,1));
            //Print out the subject of the email.     
            //Get the body of the email.
           $structure = imap_fetchstructure($inbox, $email);
               //$body1=imap_body($inbox, $email);
            $subject=htmlentities($overview->subject);
           // $message = imap_fetchbody($inbox, $email, 1, FT_PEEK);

              //print_r($message);
              //print_r($message1);die;
          
            $attachments = array();
    
            /* if any attachments found... */
            if(isset($structure->parts) && count($structure->parts)) 
            {
                for($i = 0; $i < count($structure->parts); $i++) 
                {
                    $attachments[$i] = array(
                        'is_attachment' => false,
                        'filename' => '',
                        'name' => '',                        
                        'attachment' => '',
                        'Content-Type'=> 'text/html',
                        'charset'=>'UTF-8'
                    );
    
                    if($structure->parts[$i]->ifdparameters) 
                    {
                        foreach($structure->parts[$i]->dparameters as $object) 
                        {
                            if(strtolower($object->attribute) == 'filename') 
                            {
                                $attachments[$i]['is_attachment'] = true;
                                $attachments[$i]['filename'] = $object->value;
                            }
                        }
                    }
    
                    if($structure->parts[$i]->ifparameters) 
                    {
                        foreach($structure->parts[$i]->parameters as $object) 
                        {
                            if(strtolower($object->attribute) == 'name') 
                            {
                                $attachments[$i]['is_attachment'] = true;
                                $attachments[$i]['name'] = $object->value;
                            }
                        }
                    }
    
                    if($attachments[$i]['is_attachment']) 
                    {
                        $attachments[$i]['attachment'] = imap_fetchbody($inbox, $email, $i+1);
    
                        /* 3 = BASE64 encoding */
                        if($structure->parts[$i]->encoding == 3) 
                        { 
                            $attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);
                        }
                        /* 4 = QUOTED-PRINTABLE encoding */
                        elseif($structure->parts[$i]->encoding == 4) 
                        { 
                            $attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']);
                        }
                    }
                }
                
            }
            
    
            /* iterate through each attachment and save it */
            foreach($attachments as $attachment)
            {
                if($attachment['is_attachment'] == 1)
                {
                    $filename = $attachment['name'];
                    if(empty($filename)) $filename = $attachment['filename'];
    
                    if(empty($filename)) $filename = time() . ".DAT";
                    $currentDir = getcwd();
                    $uploadDirectory = "/uploads";
                    $folder = $currentDir . $uploadDirectory ;
                   
                    if(!is_dir($folder))
                    {
                         mkdir($folder);
                    }
                    $fp = fopen($folder
                     ."/" . $filename, "w+");
                    fwrite($fp, $attachment['attachment']);
                    fclose($fp);
                }
            }
            $file=$filename;
           // print_r($data['description']);die;
          //print_r($position);die;  
          //($pos === false)

           $campaignID=$this->FindCampaign($username);
            $campaign_email=$this->getCampaignEmail($campaignID);
            $position1=strpos($subject,'[');
            $position=strpos($subject,'#');
                
            $tid= substr($subject, $position1+1,$position-5);
            $clientID=$this->FindClient($from);
            //print_r($clientID);
           $process=$this->FindProcess($clientID);
            //print_r($clientID);
           

            $data = [
              'subject'=>$subject,
               'email'=>$from,
               'campaign'=>$campaignID,
               'client'=>$clientID,   
               'campaign_email'=>$campaign_email,
               'process'=>$process,
                ];

          if(empty($position)){
         // print_r($campaignID);die;          
        
           if(empty($clientID)){
            $this->registeredClient($from);
            echo " not a register Customer";
           }
          
          else{
                     
            if($this->createEmailTicket($data,$file,$message)){
                echo "Ticket Created Successfully";
            }
            else{
                echo "somthing went wrong";
            }           
        }
      }
      else{
        $status=$this->TicketStatus($tid);
        if($this->AddEmailTicket($data,$tid,$status,$file,$message)){
          echo "Ticket added Successfully";
      }
      }
   
            }
        } 

//--------------------------------------------------------------------------------------------------------

 function createEmailTicket($data,$file,$message){
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
  //----------------------------------------------------------------------------------------------------------
    $this->db->query('INSERT INTO tickets(clientID,email,subject,description,severity,ticketID,status,campaign_ID,process,attachment) VALUES( :clientID,:email,:title, :description,:severity, :tid, :status,:campaignID,:process,:file)');
    // Bind values
   
    $this->db->bind(':clientID', $data['client']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':title', $data['subject']);
    $this->db->bind(':description', $message);
    $this->db->bind(':severity',$severity);  
    $this->db->bind(':tid',$tid);   
    $this->db->bind(':status',$status);    
    $this->db->bind(':campaignID', $data['campaign']);
    $this->db->bind(':process', $data['process']);
    $this->db->bind(':file', $file);
    // Execute
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
}
//-------------------------------------------------------------------------------------------------------
 function FindCampaign($username){
  $this->db->query('SELECT id FROM campaign_master WHERE email = :username');
  $this->db->bind(':username', $username);
  $row = $this->db->single();
 $camapignID = $row->id;
 //print_r($camapignID);die;
  return $camapignID;

}
//------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------
 function FindClient($from){
  $this->db->query('SELECT usertype  FROM users WHERE email = :username');
  $this->db->bind(':username', $from);
  $row = $this->db->single();
  $clientID = $row->usertype;
  //print_r($camapignID);die;
   return $clientID;
}
//------------------------------------------------------------------------------------------------------
 function FindProcess($clientID){
  $this->db->query('SELECT service_id  FROM client_service WHERE client_ID = :client LIMIT 1');
  $this->db->bind(':client', $clientID);
  $row = $this->db->single();
  $clientID = $row->service_id;
  //print_r($camapignID);die;
   return $clientID;
}
//------------------------------------------------------------------------------------------------------
 function  registeredClient($from){
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
 function AddEmailTicket($data,$tid,$status,$file,$message){

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
 function TicketStatus($tid)
{
  $this->db->query('SELECT status from tickets where ticketID=:tid');
   
  
  $this->db->bind(':tid',$tid);
  
  $row = $this->db->single();
  
   $total = $row->status;
   return $total;
     
} 
 
      
function getCampaignEmail($campaignID)
{
  $level="L1";
    $this->db->query('SELECT email FROM escalation_master WHERE campaign = :campaign and level=:level');
      $this->db->bind(':campaign', $campaignID);
    $this->db->bind(':level', $level);
    
    $row = $this->db->single();
    
     $total = $row->email;
     return $total;
  }



?>

    
    
  
