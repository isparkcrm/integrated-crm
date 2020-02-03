<?php
  class helpdesks  {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

//------------------------------------------------------------------------------------------------------------
    public function UserTickets($status,$email){
      $this->db->query('SELECT *,
                        tickets.id as generatedTicketID,
                        client_master.clientname as name,
                        tickets.subject as subject,
                        tickets.description as description,
                       sla_master.severity as severity,
                       tickets.ticketID as ticketID,
                       tickets.status as status,
                       campaign_master.campaignname as campaignname,
                       service_master.servicename as process,
                      tickets.assigned_to as assigned_to,
                      tickets.attachment as attachment,
                      tickets.created_at as created_at
                        FROM tickets
                        INNER JOIN client_master ON tickets.clientID=client_master.client_ID
                        INNER JOIN sla_master ON tickets.severity=sla_master.severity_name
                        INNER JOIN campaign_master ON tickets.campaign_ID=campaign_master.id
                        INNER JOIN service_master ON tickets.process=service_master.id
                       

                        WHERE tickets.status !=:status and tickets.assigned_to = :email
                        ORDER BY tickets.created_at DESC
                        ');

                   $this->db->bind(':status', $status);
                   $this->db->bind(':email', $email);
                        $results = $this->db->resultSet();
                        return $results;
     
    }

//---------------------------------------------------------------------------------------------------
public function getTickets1($status,$data,$email){
  $this->db->query('SELECT *,
                    tickets.id as generatedTicketID,
                    client_master.clientname as name,
                    tickets.subject as subject,
                    tickets.description as description,
                    sla_master.severity as severity,
                    tickets.ticketID as ticketID,
                    tickets.status as status,
                    campaign_master.campaignname as campaignname,
                    service_master.servicename as process,
                    tickets.assigned_to as assigned_to,
                    tickets.attachment as attachment,
                    tickets.created_at as created_at
                    FROM tickets
                    INNER JOIN client_master ON tickets.clientID=client_master.client_ID
                    INNER JOIN sla_master ON tickets.severity=sla_master.severity_name
                    INNER JOIN campaign_master ON tickets.campaign_ID=campaign_master.id
                    INNER JOIN service_master ON tickets.process=service_master.id
                   

                    WHERE tickets.status !=:status AND tickets.assigned_to=:email AND  tickets.created_at >= :from_date AND   tickets.created_at <=:to_date
                               ');

 $this->db->bind(':status', $status);
  $this->db->bind(':email', $email);
 $this->db->bind(':from_date', $data['from']);
 $this->db->bind(':to_date', $data['to']);
 $results = $this->db->resultSet();
 return $results;
 
}

//-------------------------------------------------------------------------------------------------------------

public function getTickets4($status,$data,$email){
$this->db->query('SELECT *,
                  tickets.id as generatedTicketID,
                  client_master.clientname as name,
                  tickets.subject as subject,
                  tickets.description as description,
                  sla_master.severity as severity,
                  tickets.ticketID as ticketID,
                  tickets.status as status,
                  campaign_master.campaignname as campaignname,
                  service_master.servicename as process,
                  tickets.assigned_to as assigned_to,
                  tickets.attachment as attachment,
                  tickets.created_at as created_at
                  FROM tickets
                  INNER JOIN client_master ON tickets.clientID=client_master.client_ID
                  INNER JOIN sla_master ON tickets.severity=sla_master.severity_name
                  INNER JOIN campaign_master ON tickets.campaign_ID=campaign_master.id
                  INNER JOIN service_master ON tickets.process=service_master.id
                  WHERE tickets.status !=:status AND tickets.assigned_to=:email AND tickets.severity=:severity AND tickets.created_at between :from_date AND :to_date
                  ORDER BY tickets.created_at DESC
                  ');

$this->db->bind(':status', $status);
$this->db->bind(':from_date', $data['from']);
$this->db->bind(':to_date', $data['to']);
$this->db->bind(':severity', $data['severity']);
$this->db->bind(':email', $email);
$results = $this->db->resultSet();
return $results;

}
//
//-------------------------------------------------------------------------------------------------------------
  public function UserTickets1($status,$email,$campaign){
    $assignee="Not Assigned";
      $this->db->query('SELECT *,
                        tickets.id as generatedTicketID,
                         client_master.clientname as name,
                        tickets.subject as subject,
                        tickets.description as description,
                       sla_master.severity as severity,
                       tickets.ticketID as ticketID,
                       tickets.status as status,
                       campaign_master.campaignname as campaignname,
                       service_master.servicename as process,
                      tickets.assigned_to as assigned_to,
                      tickets.attachment as attachment,
                      tickets.created_at as created_at
                        FROM tickets
                         INNER JOIN client_master ON tickets.clientID=client_master.client_ID
                        INNER JOIN sla_master ON tickets.severity=sla_master.severity_name
                        INNER JOIN campaign_master ON tickets.campaign_ID=campaign_master.id
                        INNER JOIN service_master ON tickets.process=service_master.id
                       

                        WHERE tickets.status !=:status and tickets.assigned_to = :email  OR tickets.status !=:status and tickets.assigned_to = :assignee and tickets.campaign_ID = :campaign
                        ORDER BY tickets.created_at DESC
                        ');

                   $this->db->bind(':status', $status);
                   $this->db->bind(':email', $email);
           $this->db->bind(':assignee', $assignee);
            $this->db->bind(':campaign', $campaign);
                        $results = $this->db->resultSet();
                        return $results;
     
    }
//----------------------------------------------------------------------------------------------------
public function UpdateClosingStatus($ticketID,$flag){
  
  $this->db->query('UPDATE  closedtickets SET closing_status = :status  WHERE ticketID = :ticketID');
  // Bind values      
  $this->db->bind(':status', $flag); 
  $this->db->bind(':ticketID', $ticketID); 
 

  // Execute
  if($this->db->execute()){
    return true;


  } else {
    return false;

  }
}

//-------------------------------------------------------------------------------------------------------------
public function EngineerClosingStatus($ticketID){
  $flag="1";
  $this->db->query('UPDATE  tickets SET closing_status = :status  WHERE ticketID = :ticketID');
  // Bind values      
  $this->db->bind(':status', $flag); 
  $this->db->bind(':ticketID', $ticketID); 
 

  // Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;

  }
}

   
//-------------------------------------------------------------------------------------------------------------


public function UpdateStatus($ticketID,$status_new){
 $flag1="2";
  $this->db->query('UPDATE tickets SET status = :status, closing_status = :flag  WHERE ticketID = :ticketID');
  // Bind values      
  $this->db->bind(':status', $status_new);  
  $this->db->bind(':flag', $flag1); 
  $this->db->bind(':ticketID', $ticketID); 
  // Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}
//-----------------------------------------------------------------------------------------------------------------------
public function UpdateStatusNew($data){
  $flag1="2";
   $this->db->query('UPDATE tickets SET status = :status WHERE ticketID = :ticketID');
   // Bind values      
   $this->db->bind(':status', $data['status_new']);  
   $this->db->bind(':ticketID', $data['ticketID']); 
   // Execute
   if($this->db->execute()){
     return true;
   } else {
     return false;
   }
 }
 //-----------------------------------------------------------------------------------------------------------------------
public function TicketUpdate($data,$campaign_email,$campaign_number){        
  $activity="Update";
  $customer= $this->CustomerMessage($activity);
   $cust=$customer[0]->customer_notification;
  $email_msg1=$customer[0]->email_message;
  $sms_msg1=$customer[0]->sms_message;
  $hd=$customer[0]->helpdesk_notification;
  $email_msg=$customer[0]->email_message1;
  $sms_msg=$customer[0]->sms_message1; 
  
  date_default_timezone_set('Asia/Kolkata');
  $m = date('h');
  $y = date('i');
  $d = date('s');
  $tid = $y.$m.$d;   
   if($data['notification']=="yes"){
  if($cust=='email'){
    $output=$email_msg1;
    $output.='<p>ticket number is &nbsp;' .$data['ticketID']. ' </p>' ; 
    $output.='<p>Thanks & Regards,</p>';
    $output.='<p>Futurecalls Helpdesk Team</p>';
    $output.='<p>Note: Do not change the subject line While replying this message</p>';
    $body = $output; 
   // $subject = $data['ticketID']."[".$data['title']."]";
     $subject ="[". $data['ticketID']."#]" .$data['title'];
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
                //$mail-> addAddress('ravi@Futurecalls.com'); 
             // $mail-> addAddress('sridhar@Futurecalls.com'); 
    
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
  //------------------------------------------------------------------------------------------------
  //        ************************* SMS - Customer *********************************************
  //------------------------------------------------------------------------------------------------  
  
  
  else if($cust=='sms'){
  
    
    $username="";
    $hash="";
    $test="0";
    $sender="TXTLCL"; 
    $numbers=$data['number'];
    $message=$sms_msg1;
    $message.='Your ticket number is &nbsp;' .$data['ticketID'] ; 
   
            
  // then update the message with the ending
  ;
  // Message details
  
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


         // *************************** whats App Notification  **************************
  else{
    $INSTANCE_ID = '24';  // TODO: Replace it with your gateway instance ID here
$CLIENT_ID = "shahinsha@futurecalls.com";  // TODO: Replace it with your Forever Green client ID here
$CLIENT_SECRET = "66d45ae013534497af5ac7409feb82af";   // TODO: Replace it with your Forever Green client secret here
$postData = array(
  'number' => '917358650128',  // TODO: Specify the recipient's number here. NOT the gateway number
  'message' => $sms_msg1.'Your ticket number is' .$data['ticketID'] 
);
$headers = array(
  'Content-Type: application/json',
  'X-WM-CLIENT-ID: '.$CLIENT_ID,
  'X-WM-CLIENT-SECRET: '.$CLIENT_SECRET
);
$url = 'http://api.whatsmate.net/v3/whatsapp/single/text/message/' . $INSTANCE_ID;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
$response = curl_exec($ch);
echo "Response: ".$response;
curl_close($ch);
  }
//---------------------------------- Help Desk ----------------------------------------------------------
if($hd=='email'){
  if($data['campaignID']=="1"){
    $output=$email_msg;
    $output.=" ".'<p> ticket number is &nbsp;' .$data['ticketID']. ' </p>' ; 
    $output.='<p>Thanks & Regards,</p>';
    $output.='<p>Futurecalls Helpdesk Team</p>';
    $body = $output; 
    //$subject =$data['ticketID']."[".$data['title']."]";
    $subject ="[". $data['ticketID']."#]" .$data['title'];
    $email_to = $campaign_email;
    
    
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
              // $mail-> addAddress('ravi@Futurecalls.com'); 
              //$mail-> addAddress('sridhar@Futurecalls.com'); 
    
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
  $output=$email_msg;
  $output.=" ".'<p> ticket number is &nbsp;' .$data['ticketID']. ' </p>' ; 
  $output.='<p>Thanks & Regards,</p>';
  $output.='<p>Futurecalls Helpdesk Team</p>';
  $body = $output; 
  $subject =$data['ticketID']."[".$data['title']."]";
  
  $email_to = $campaign_email;
  
  
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
          //$mail-> addAddress($email_to); 
            //$mail-> addAddress('ravi@Futurecalls.com'); 
             // $mail-> addAddress('sridhar@Futurecalls.com'); 
  
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
}

//--------------------------------------------------------------------------------------------------------
//        *************************SMS- Helpdesk *********************************************
//---------------------------------------------------------------------------------------------------------
else if($hd=='sms'){
  $username="";
  $hash="";
  $test="0";
  $sender="TXTLCL"; 
  $numbers=$campaign_number;
  $message=$sms_msg;
  $message.=" ".$data['email']." " . 'Your ticket number is' .$tid ; 
 
          
// then update the message with the ending
;
// Message details

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
else{
  $INSTANCE_ID = '24';  // TODO: Replace it with your gateway instance ID here
$CLIENT_ID = "shahinsha@futurecalls.com";  // TODO: Replace it with your Forever Green client ID here
$CLIENT_SECRET = "66d45ae013534497af5ac7409feb82af";   // TODO: Replace it with your Forever Green client secret here
$postData = array(
'number' => $campaign_number,  // TODO: Specify the recipient's number here. NOT the gateway number
'message' => $sms_msg." ".$data['email']." " .'Your ticket number is' .$data['ticketID'] 
);
$headers = array(
'Content-Type: application/json',
'X-WM-CLIENT-ID: '.$CLIENT_ID,
'X-WM-CLIENT-SECRET: '.$CLIENT_SECRET
);
$url = 'http://api.whatsmate.net/v3/whatsapp/single/text/message/' . $INSTANCE_ID;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
$response = curl_exec($ch);
echo "Response: ".$response;
curl_close($ch);
}

}

  //--------------------------------------------------------------------------------------------------------
  //        *************************Email- Helpdesk *********************************************
  //---------------------------------------------------------------------------------------------------------
else{
  if($hd=='email'){
    if($data['campaignID']=="1"){
      $output=$email_msg;
      $output.=" ".'<p> ticket number is &nbsp;' .$data['ticketID']. ' </p>' ; 
      $output.='<p>Thanks & Regards,</p>';
      $output.='<p>futurecalls Helpdesk Team</p>';
      $body = $output; 
    // $subject =$data['ticketID']."[".$data['title']."]";
        $subject ="[". $data['ticketID']."#]" .$data['title'];
      $email_to = $campaign_email;
      
      
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
            // Enable this option to see deep debug info
    
            // $mail->SMTPDebug = 4; 
    
            $mail->SMTPSecure = 'tls';
    
            $mail->Port ='587';
    
            $mail->SetFrom('helpdesk@Futurecalls.net'); 
      
              $mail-> addAddress($email_to); 
                // $mail-> addAddress('ravi@Futurecalls.com'); 
             // $mail-> addAddress('sridhar@Futurecalls.com');  
      
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
    $output=$email_msg;
    $output.=" ".'<p> ticket number is &nbsp;' .$data['ticketID']. ' </p>' ; 
    $output.='<p>Thanks & Regards,</p>';
    $output.='<p>Futurecalls Helpdesk Team</p>';
    $body = $output; 
   // $subject =$data['ticketID']."[".$data['title']."]";
      $subject ="[". $data['ticketID']."#]" .$data['title'];
    $email_to = $campaign_email;
    
    
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
    
            $mail-> addAddress($email_to); 
               //$mail-> addAddress('ravi@Futurecalls.com'); 
              //$mail-> addAddress('sridhar@Futurecalls.com');  
    
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
  }
  
  //--------------------------------------------------------------------------------------------------------
  //        *************************SMS- Helpdesk *********************************************
  //---------------------------------------------------------------------------------------------------------
  else if($hd=='sms'){
    $username="";
    $hash="";
    $test="0";
    $sender="TXTLCL"; 
    $numbers=$campaign_number;
    $message=$sms_msg;
    $message.=" ".$data['email']." " . 'Your ticket number is' .$tid ; 
   
            
  // then update the message with the ending
  ;
  // Message details
  
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
  else{
    $INSTANCE_ID = '24';  // TODO: Replace it with your gateway instance ID here
  $CLIENT_ID = "shahinsha@futurecalls.com";  // TODO: Replace it with your Forever Green client ID here
  $CLIENT_SECRET = "66d45ae013534497af5ac7409feb82af";   // TODO: Replace it with your Forever Green client secret here
  $postData = array(
  'number' => $campaign_number,  // TODO: Specify the recipient's number here. NOT the gateway number
  'message' => $sms_msg." ".$data['email']." " .'Your ticket number is' .$data['ticketID'] 
  );

  //print_r($postData);die;
  $headers = array(
  'Content-Type: application/json',
  'X-WM-CLIENT-ID: '.$CLIENT_ID,
  'X-WM-CLIENT-SECRET: '.$CLIENT_SECRET
  );
  $url = 'http://api.whatsmate.net/v3/whatsapp/single/text/message/' . $INSTANCE_ID;
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
  $response = curl_exec($ch);
  echo "Response: ".$response;
  curl_close($ch);
  }
}

//---------------------------------------------------------------------------------------------------------
    $this->db->query('INSERT INTO update_status(clientID,email,number,subject,description,severity,ticketID,status,campaign_ID,process,assigned_to,action,created_date) VALUES( :client ,:email,:number,:title, :description,:severity, :ticketID, :status_new, :campainID, :process, :assigned_to,:action,:date)');
    // Bind values
   
    $this->db->bind(':client', $data['client']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':number', $data['number']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':description', $data['description']);
    $this->db->bind(':severity',$data['severity']);  
    $this->db->bind(':ticketID',$data['ticketID']);   
    $this->db->bind(':status_new',$data['status_new']); 
    $this->db->bind(':campainID',$data['campaignID']);
    $this->db->bind(':process',$data['process']); 
    $this->db->bind(':assigned_to',$data['assigned_to']);        
    $this->db->bind(':action',$data['action']);  
    $this->db->bind(':date',$data['created_date']);   
   
    // Execute
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }


}
//------------------------------------------------------------------------------------------------------------------------
public function TicketClose($data,$campaign_email,$campaign_number){        
  
  $activity="Close";
  $customer= $this->CustomerMessage($activity);
   $cust=$customer[0]->customer_notification;
  $email_msg1=$customer[0]->email_message;
  $sms_msg1=$customer[0]->sms_message;
  $hd=$customer[0]->helpdesk_notification;
  $email_msg=$customer[0]->email_message1;
  $sms_msg=$customer[0]->sms_message1; 
  
  date_default_timezone_set('Asia/Kolkata');
  $m = date('h');
  $y = date('i');
  $d = date('s');
  $tid = $y.$m.$d;   
   
  if($cust=='email'){
    $output=$email_msg1;
    $output.='<p>ticket number is &nbsp;' .$data['ticketID']. ' Please click the below link for Accept ticket closure </p>' ; 
   $output.='<p><a href="http://isparkcrm.com/integrated-crm/helpdesk/customer_close?ticketID='.$data['ticketID'].'&action=reset" target="_blank">
    http://isparkcrm.com/integrated-crm/helpdesk/customer_close?ticketID='.$data['ticketID'].'&action=reset</a></p>';
    $output.='<p> If you Are not accept the closure  This Ticket will be closed automatically after 48 hours. So kindly reopen the ticket if it is not resolved.</p>';
    $output.='<p>Thanks & Regards,</p>';
    $output.='<p>Futurecalls Helpdesk Team</p>';
    $output.='<p>Note: Do not change the subject line While replying this message</p>';
    $body = $output; 
   // $subject = $data['ticketID']."[".$data['title']."]";
      $subject ="[". $data['ticketID']."#]" .$data['title'];
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
                //$mail-> addAddress('ravi@Futurecalls.com'); 
             // $mail-> addAddress('sridhar@Futurecalls.com'); 
    
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
  //------------------------------------------------------------------------------------------------
  //        ************************* SMS - Customer *********************************************
  //------------------------------------------------------------------------------------------------  
  
  
  else{
    $username="";
    $hash="";
    $test="0";
    $sender="TXTLCL"; 
    $numbers=$data['number'];
    $message=$sms_msg1;
    $message.='Your ticket number is &nbsp;' .$data['ticketID'] ; 
   
            
  // then update the message with the ending
  ;
  // Message details
  
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
  //--------------------------------------------------------------------------------------------------------
  //        *************************Email- Helpdesk *********************************************
  //---------------------------------------------------------------------------------------------------------
  
  if($hd=='email'){
    if($data['campaignID']=="1"){
      $output=$email_msg;
      $output.=" ".'<p> ticket number is &nbsp;' .$data['ticketID']. ' </p>' ; 
      $output.='<p>Thanks & Regards,</p>';
      $output.='<p>Futurecalls Helpdesk Team</p>';
      $body = $output; 
      //$subject =$data['ticketID']."[".$data['title']."]";
        $subject ="[". $data['ticketID']."#]" .$data['title'];
      $email_to = $campaign_email;
      
      
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
                 // $mail-> addAddress('ravi@Futurecalls.com'); 
              //$mail-> addAddress('sridhar@Futurecalls.com');  
      
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
    $output=$email_msg;
    $output.=" ".'<p> ticket number is &nbsp;' .$data['ticketID']. ' </p>' ; 
    $output.='<p>Thanks & Regards,</p>';
    $output.='<p>Futurecalls Helpdesk Team</p>';
    $body = $output; 
    //$subject =$data['ticketID']."[".$data['title']."]";
      $subject ="[". $data['ticketID']."#]" .$data['title'];
    $email_to = $campaign_email;
    
    
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
               //$mail-> addAddress('ravi@Futurecalls.com'); 
              //$mail-> addAddress('sridhar@Futurecalls.com'); 
    
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
  }
  
  //--------------------------------------------------------------------------------------------------------
  //        *************************SMS- Helpdesk *********************************************
  //---------------------------------------------------------------------------------------------------------
  else{
    $username="";
    $hash="";
    $test="0";
    $sender="TXTLCL"; 
    $numbers=$campaign_number;
    $message=$sms_msg;
    $message.=" ".$data['email']." " . 'Your ticket number is' .$tid ; 
   
            
  // then update the message with the ending
  ;
  // Message details
  
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
  //---------------------------------------------------------------------------------------------------------

  $this->db->query('INSERT INTO closedtickets(clientID,email,number,subject,description,severity,ticketID,status,campaign_ID,process,assigned_to,action,created_date) VALUES( :client ,:email,:number,:title, :description,:severity, :ticketID, :status_new, :campainID, :process, :assigned_to,:action,:date)');
  // Bind values
 
  $this->db->bind(':client', $data['client']);
  $this->db->bind(':email', $data['email']);
  $this->db->bind(':number', $data['number']);
  $this->db->bind(':title', $data['title']);
  $this->db->bind(':description', $data['description']);
  $this->db->bind(':severity',$data['severity']);  
  $this->db->bind(':ticketID',$data['ticketID']);   
  $this->db->bind(':status_new',$data['status_new']); 
  $this->db->bind(':campainID',$data['campaignID']);
  $this->db->bind(':process',$data['process']); 
  $this->db->bind(':assigned_to',$data['assigned_to']);        
  $this->db->bind(':action',$data['action']);  
  $this->db->bind(':date',$data['created_date']);   
 
  // Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }


}
//------------------------------------------------------------------------------------------------------
public function TicketStatus($ticketID){
  $this->db->query('SELECT *,
                    update_status.id as generatedTicketID,
                    client_master.clientname as name,
                    update_status.subject as subject,
                    update_status.description as description,
                   sla_master.severity as severity,
                   update_status.ticketID as ticketID,
                   update_status.status as status,
                   campaign_master.campaignname as campaignname,
                   service_master.servicename as process,
                   update_status.assigned_to as assigned_to,     
                   update_status.action as action,               
                   update_status.created_date as created_at,
                   update_status.updated_at as updated_at
                    FROM update_status
                    INNER JOIN client_master ON update_status.clientID=client_master.client_ID
                    INNER JOIN sla_master ON update_status.severity=sla_master.severity_name
                    INNER JOIN campaign_master ON update_status.campaign_ID=campaign_master.id
                    INNER JOIN service_master ON update_status.process=service_master.id
                   

                    WHERE  update_status.ticketID = :ticketID
                    ORDER BY update_status.updated_at DESC 
                    ');

             
               $this->db->bind(':ticketID', $ticketID);
                    $results = $this->db->resultSet();
                    return $results;
 
}
//------------------------------------------------------------------------------------------------------
public function getCustomer(){
  $role="Customer";
  $this->db->query('SELECT  username,email FROM users WHERE  role= :role ');
  $this->db->bind(':role', $role);
  $results = $this->db->resultSet();
  return $results;
     }	
//-------------------------------------------------------------------------------------------------------

public function oncallTicket($data,$campainID,$campaign_email,$campaign_number){   
  $activity="Create";
  $customer= $this->CustomerMessage($activity);
   $cust=$customer[0]->customer_notification;
  $email_msg1=$customer[0]->email_message;
  $sms_msg1=$customer[0]->sms_message;
  $hd=$customer[0]->helpdesk_notification;
  $email_msg=$customer[0]->email_message1;
  $sms_msg=$customer[0]->sms_message1; 
  
  date_default_timezone_set('Asia/Kolkata');
  $m = date('h');
  $y = date('i');
  $d = date('s');
  $tid = $y.$m.$d;   
   
  if($cust=='email'){
    $output=$email_msg1;
    $output.='<p>Your ticket number is &nbsp;' .$tid. ' </p>' ; 
    $output.='<p>Thanks & Regards,</p>';
    $output.='<p>Futurecalls Helpdesk Team</p>';
    $output.='<p>Note: Do not change the subject line While replying this message</p>';
    $body = $output; 
    //$subject = $tid."[".$data['title']."]";
      $subject ="[". $tid."#]" .$data['title'];
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
               // $mail-> addAddress('ravi@Futurecalls.com'); 
              //mail-> addAddress('sridhar@Futurecalls.com'); 
    
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
  //------------------------------------------------------------------------------------------------
  //        ************************* SMS - Customer *********************************************
  //------------------------------------------------------------------------------------------------  
  
  
  else if($cust=='sms'){
     
    $username="";
    $hash="";
    $test="0";
    $sender="TXTLCL"; 
    $numbers=$data['number'];
    $message=$sms_msg1;
    $message.='Your ticket number is &nbsp;' .$tid ; 
   
            
  // then update the message with the ending
  ;
  // Message details
  
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
  //----------------------------------------------------------  Whats App Customer ---------------------------------------------
  else{
	 $INSTANCE_ID = '24';  // TODO: Replace it with your gateway instance ID here
$CLIENT_ID = "shahinsha@futurecalls.com";  // TODO: Replace it with your Forever Green client ID here
$CLIENT_SECRET = "66d45ae013534497af5ac7409feb82af";   // TODO: Replace it with your Forever Green client secret here
$postData = array(
  'number' => $data['number'],  // TODO: Specify the recipient's number here. NOT the gateway number
  'message' => $sms_msg1.'Your ticket number is' .$tid 
);
$headers = array(
  'Content-Type: application/json',
  'X-WM-CLIENT-ID: '.$CLIENT_ID,
  'X-WM-CLIENT-SECRET: '.$CLIENT_SECRET
);
$url = 'http://api.whatsmate.net/v3/whatsapp/single/text/message/' . $INSTANCE_ID;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
$response = curl_exec($ch);
echo "Response: ".$response;
curl_close($ch);
  }
  //--------------------------------------------------------------------------------------------------------
  //        *************************Email- Helpdesk *********************************************
  //---------------------------------------------------------------------------------------------------------
  
  if($hd=='email'){
    if($campainID=="1"){
      $output=$email_msg;
      $output.=" ".$data['email'].'<p>Your ticket number is &nbsp;' .$tid. ' </p>' ; 
      $output.='<p>Thanks & Regards,</p>';
      $output.='<p>Futurecalls Helpdesk Team</p>';
      $body = $output; 
     // $subject =$tid."[".$data['title']."]";
         $subject ="[". $tid."#]" .$data['title'];
      $email_to = $campaign_email;
      
      
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
             //  $mail-> addAddress('ravi@Futurecalls.com'); 
             // $mail-> addAddress('sridhar@Futurecalls.com'); 
      
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
    $output=$email_msg;
    $output.=" ".$data['email'].'<p>Your ticket number is &nbsp;' .$tid. ' </p>' ; 
    $output.='<p>Thanks & Regards,</p>';
    $output.='<p>Futurecalls Helpdesk Team</p>';
    $body = $output; 
   // $subject =$tid."[".$data['title']."]";
       $subject ="[". $tid."#]" .$data['title'];
    $email_to = $campaign_email;
    
    
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
           
               //$mail-> addAddress('ravi@Futurecalls.com'); 
             // $mail-> addAddress('sridhar@Futurecalls.com'); 
    
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
  }
  
  //--------------------------------------------------------------------------------------------------------
  //        *************************SMS- Helpdesk *********************************************
  //---------------------------------------------------------------------------------------------------------
  else if($hd=='sms'){
    $username="";
    $hash="";
    $test="0";
    $sender="TXTLCL"; 
    $numbers=$campaign_number;
    $message=$sms_msg;
    $message.=" ".$data['email']." " . 'Your ticket number is' .$tid ; 
   
            
  // then update the message with the ending
  ;
  // Message details
  
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
  print_r($response);die;
  }
  
  else{
	 $INSTANCE_ID = '24';  // TODO: Replace it with your gateway instance ID here
$CLIENT_ID = "shahinsha@futurecalls.com";  // TODO: Replace it with your Forever Green client ID here
$CLIENT_SECRET = "66d45ae013534497af5ac7409feb82af";   // TODO: Replace it with your Forever Green client secret here
$postData = array(
  'number' =>$campaign_number,  // TODO: Specify the recipient's number here. NOT the gateway number
  'message' => $sms_msg." " .$data['email']." " . 'Your ticket number is' .$tid 
);
$headers = array(
  'Content-Type: application/json',
  'X-WM-CLIENT-ID: '.$CLIENT_ID,
  'X-WM-CLIENT-SECRET: '.$CLIENT_SECRET
);
$url = 'http://api.whatsmate.net/v3/whatsapp/single/text/message/' . $INSTANCE_ID;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
$response = curl_exec($ch);
echo "Response: ".$response;
curl_close($ch);  
  }
  //--------------------------------------------------------------------------------------------------------
  //---------------------------------------------------------------------------------------------------------
   $read_status = "2";
    $this->db->query('INSERT INTO tickets(clientID,email,number,subject,description,severity,ticketID,status,campaign_ID,process,attachment,read_status) VALUES( :client ,:email, :number,:title, :description,:severity, :tid, :status, :campain_id, :process,:file,:read_status)');
    // Bind values
   
    $this->db->bind(':client', $data['client']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':number', $data['number']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':description', $data['description']);
    $this->db->bind(':severity',$data['severity']);  
    $this->db->bind(':tid',$tid);   
    $this->db->bind(':status',$data['status']); 
    $this->db->bind(':campain_id',$campainID);
    $this->db->bind(':process',$data['process']);       
    $this->db->bind(':file',$data['file']);    
    $this->db->bind(':read_status',$read_status);    
   
    // Execute
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }

 }
 //-----------------------------------------------------------------------------------
public function getKeywords(){ 
  $this->db->query('SELECT  keyword FROM knowledge_base'); 
  $results = $this->db->resultSet();

  return $results;
     }	
//-------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
public function CustomerMessage($activity)
{
	
	$this->db->query('SELECT * FROM notification_master WHERE activity = :activity ');
  $this->db->bind(':activity', $activity);
  $results = $this->db->resultSet();
	return $results;
}

//------------------------------------------------------------------------------------------------------
public function NewTicketStatus($ticketID)
{
 
  $this->db->query('SELECT status from tickets where ticketID=:tid');
   
  $this->db->bind(':tid',$ticketID);
 
  $row = $this->db->single();
  
   $total = $row->status;
   return $total;
     
}	
//------------------------------------------------------------------------------------------------

public function criticalticket($status,$critical,$email)
	{
	  $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE severity = :critical and status!=:status and assigned_to=:email');
      $this->db->bind(':critical', $critical);
	  $this->db->bind(':status', $status);
	  $this->db->bind(':email', $email);
		$row = $this->db->single();
		
		 $total = $row->total;
		 return $total;
	}
	
	//..............................................................................
	
	public function highticket($status,$high,$email)
	{
	  $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE severity = :high and status!=:status and assigned_to=:email');
      $this->db->bind(':high', $high);
	  $this->db->bind(':status', $status);
	  $this->db->bind(':email', $email);
		$row = $this->db->single();
		 $total = $row->total;
		 return $total;
	}
	
	//............................................................................................................
	
	public function mediumticket($status,$medium,$email)
	{
	  $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE severity = :medium and status!=:status and assigned_to=:email');
      $this->db->bind(':medium', $medium);
	  $this->db->bind(':status', $status);
	   $this->db->bind(':email', $email);
		$row = $this->db->single();
				 $total = $row->total;
		 return $total;
	}
	
	//................................................................................................................
	
	public function lowticket($status,$low,$email)
	{
	  $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE severity = :low and status!=:status and assigned_to=:email');
      $this->db->bind(':low', $low);
	  $this->db->bind(':status', $status);
	  $this->db->bind(':email', $email);
		$row = $this->db->single();
		$total = $row->total;
		 return $total;
	}

   
//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------	
public function clientname($client)
		 {
			$this->db->query('select username from users where email =:email ');
		   $this->db->bind(':email', $client);
		  $row = $this->db->single();
		  $camapignID = $row->username;
		 return $camapignID;
	}
//-------------------------------------------------------------------------------------------------------------	
 public function clientopen($client){
	  $status ="Close";
  $this->db->query('SELECT COUNT(status) AS total FROM tickets WHERE  status!=:status  and assigned_to=:email');     
	   $this->db->bind(':status', $status);
	      $this->db->bind(':email', $client);
  $row = $this->db->single();
  $camapignID = $row->total;
 //print_r($camapignID);die;
  return $camapignID;
	}
//-------------------------------------------------------------------------------------------------------------	
	 public function clientclose($client){
	  $status ="Close";
  $this->db->query('SELECT COUNT(status) AS total FROM tickets WHERE   status=:status  and assigned_to=:email');
   $this->db->bind(':status', $status);
	      $this->db->bind(':email', $client);
  $row = $this->db->single();
  $camapignID = $row->total;
 //print_r($camapignID);die;
  return $camapignID;
	}
//-------------------------------------------------------------------------------------------------------------	
	 public function campaignopentoday($client){
	  $status ="Close";
 $this->db->query('SELECT COUNT(status) AS total FROM tickets WHERE   status!=:status  and assigned_to=:email AND  DAY(created_at) = DAY(NOW())');
   $this->db->bind(':status', $status);
	      $this->db->bind(':email', $client);
  $row = $this->db->single();
  $camapignID = $row->total;
// print_r($camapignID);die;
  return $camapignID;
	}
//-------------------------------------------------------------------------------------------------------------	
 public function campaignclosetoday($client){
	  $status ="Close";
 $this->db->query('SELECT COUNT(status) AS total FROM closedtickets WHERE   status=:status  and assigned_to=:email and DAY(closed_at) = DAY(NOW())');
   $this->db->bind(':status', $status);
	      $this->db->bind(':email', $client);
  $row = $this->db->single();
  $camapignID = $row->total;
// print_r($camapignID);die;
  return $camapignID;
	}
//-------------------------------------------------------------------------------------------------------------		
public function campaigncritical($client){
	  $status ="Close";
	  $severity="P1";
  $this->db->query('SELECT COUNT(status) AS total FROM tickets WHERE   status!=:status  and assigned_to=:email AND severity=:severity');
   $this->db->bind(':status', $status);
	      $this->db->bind(':email', $client);
	   $this->db->bind(':severity', $severity);
	   
  $row = $this->db->single();
  $camapignID = $row->total;
// print_r($camapignID);die;
  return $camapignID;
	}
//-------------------------------------------------------------------------------------------------------------	
public function campaignhigh($client){
	  $status ="Close";
	  $severity="P2";
  $this->db->query('SELECT COUNT(status) AS total FROM tickets WHERE   status!=:status  and assigned_to=:email AND severity=:severity');
   $this->db->bind(':status', $status);
	      $this->db->bind(':email', $client);
	   $this->db->bind(':severity', $severity); 
  $row = $this->db->single();
  $camapignID = $row->total;
// print_r($camapignID);die;
  return $camapignID;
	}
//-------------------------------------------------------------------------------------------------------------	
 public function campaignmedium($client){
	  $status ="Close";
	  $severity="P3";
 $this->db->query('SELECT COUNT(status) AS total FROM tickets WHERE   status!=:status  and assigned_to=:email AND severity=:severity');
   $this->db->bind(':status', $status);
	      $this->db->bind(':email', $client);
	   $this->db->bind(':severity', $severity);
  $row = $this->db->single();
  $camapignID = $row->total;
// print_r($camapignID);die;
  return $camapignID;
	}
//-------------------------------------------------------------------------------------------------------------		
public function campaignlow($client){
	  $status ="Close";
	  $severity="P4";
 $this->db->query('SELECT COUNT(status) AS total FROM tickets WHERE   status!=:status  and assigned_to=:email AND severity=:severity');
   $this->db->bind(':status', $status);
	      $this->db->bind(':email', $client);
	   $this->db->bind(':severity', $severity);
  $row = $this->db->single();
  $camapignID = $row->total;
// print_r($camapignID);die;
  return $camapignID;
	}
//-------------------------------------------------------------------------------------------------------------	
 public function campaignsla($client){
	  $status ="Close";
	 
	  $time="0";
  $this->db->query('SELECT COUNT(status) AS total FROM tickets WHERE   status!=:status  and assigned_to=:email AND l1!=:time');
   $this->db->bind(':status', $status);
	      $this->db->bind(':email', $client);
	   $this->db->bind(':time', $time);   
  $row = $this->db->single();
  $camapignID = $row->total;
// print_r($camapignID);die;
  return $camapignID;
	}
//------------------------------------------------------------------------------------------------------
  public function selfassignTicket($ticketID,$email){
  $this->db->query('UPDATE tickets SET assigned_to = :status  WHERE ticketID = :ticketID');
  // Bind values      
  $this->db->bind(':status', $email); 
  $this->db->bind(':ticketID', $ticketID); 
 

  // Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}
//-------------------------------------------------------------------------------------------------------
public function searchResult($keyword){
  $this->db->query('SELECT *,
                   knowledge_base.id as generatedTicketID,
                   knowledge_base.subject as subject,
                   knowledge_base.description as description,
                   knowledge_base.keyword as keyword,
                   knowledge_base.file as attachment,                               
                   knowledge_base.version as version,    
                    knowledge_base.created_at as created_at          
                    FROM  knowledge_base              

                    WHERE  keyword LIKE :keyword 
                    ORDER BY knowledge_base.created_at DESC 
                    ');

             
               $this->db->bind(':keyword', $keyword);
                    $results = $this->db->resultSet();
                    return $results;
 
}
//--------------------------------------------------------------------------------------------------------
public function CustomerFeedback($data){        
 
  $this->db->query('INSERT INTO customer_feedback(ticketID,q1,answer) VALUES( :ticketID,:q1,:answer)');
  // Bind values
 
  $this->db->bind(':ticketID', $data['ticketID']);
  $this->db->bind(':q1', $data['question1']);
  $this->db->bind(':answer', $data['Answer']);
  
  // Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
//print_r($data);die;   
}
//----------------------------------------------------------------------------------------------------------
  }