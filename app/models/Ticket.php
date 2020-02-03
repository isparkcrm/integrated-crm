<?php
require 'PHPMailer/PHPMailer/PHPMailerAutoload.php';
require 'PHPMailer/PHPMailer/class.phpmailer.php';
require 'PHPMailer/PHPMailer/class.smtp.php';
  class Ticket {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

//------------------------------------------------------------------------------------------------------------
    public function getTickets($status){
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
                       

                        WHERE tickets.status !=:status
                        ORDER BY tickets.created_at DESC
                        ');

	   $this->db->bind(':status', $status);
	   $results = $this->db->resultSet();
	   return $results;
     
    }
	
	public function ticketcount($campaignID)
	{
		$read_status="2";
		$status = "Open";
		$this->db->query('SELECT count(read_status) as total from tickets where read_status=:read_status and campaign_ID = :campaignID and status=:status');
		$this->db->bind(':campaignID', $campaignID);
		$this->db->bind(':read_status', $read_status);
		$this->db->bind(':status', $status);
		$row = $this->db->single();
		$total = $row->total;
		return $total;
	}
	
  //-------------------------------------------------------------------------------------------------------------
  public function getTickets1($status,$data){
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
                     

                      WHERE tickets.status !=:status AND tickets.created_at >= :from_date AND   tickets.created_at <=:to_date
                                 ');

   $this->db->bind(':status', $status);
   $this->db->bind(':from_date', $data['from']);
   $this->db->bind(':to_date', $data['to']);
   $results = $this->db->resultSet();
   return $results;
   
  }

//-------------------------------------------------------------------------------------------------------------
public function getTickets2($status,$data){
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
                   

                    WHERE tickets.status !=:status AND tickets.campaign_ID=:campaign AND tickets.created_at between :from_date AND :to_date
                    ORDER BY tickets.created_at DESC
                    ');

 $this->db->bind(':status', $status);
 $this->db->bind(':from_date', $data['from']);
 $this->db->bind(':to_date', $data['to']);
 $this->db->bind(':campaign', $data['campaign']);
 $results = $this->db->resultSet();
 return $results;
 
}

//-------------------------------------------------------------------------------------------------------------
public function getTickets3($status,$data){
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
                   

                    WHERE tickets.status !=:status AND tickets.severity=:severity AND tickets.created_at between :from_date AND :to_date
                    ORDER BY tickets.created_at DESC
                    ');

 $this->db->bind(':status', $status);
 $this->db->bind(':from_date', $data['from']);
 $this->db->bind(':to_date', $data['to']);
 $this->db->bind(':severity', $data['severity']);
 $results = $this->db->resultSet();
 return $results;
 
}

//-------------------------------------------------------------------------------------------------------------
  
public function getTickets4($status,$data){
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
                   

                    WHERE tickets.status !=:status AND tickets.campaign_ID=:campaign AND tickets.severity=:severity AND tickets.created_at between :from_date AND :to_date
                    ORDER BY tickets.created_at DESC
                    ');

 $this->db->bind(':status', $status);
 $this->db->bind(':from_date', $data['from']);
 $this->db->bind(':to_date', $data['to']);
 $this->db->bind(':severity', $data['severity']);
 $this->db->bind(':campaign', $data['campaign']);
 $results = $this->db->resultSet();
 return $results;
 
}

//---------------- CLosed Tickets----------------------------------------------------------

	public function getcloseTickets($status){
      $this->db->query('SELECT *,
                        closedtickets.id as generatedTicketID,
                        client_master.clientname as name,
                        closedtickets.subject as subject,
                        closedtickets.description as description,
                        sla_master.severity as severity,
                        closedtickets.ticketID as ticketID,
                        closedtickets.status as status,
                        campaign_master.campaignname as campaignname,
                        service_master.servicename as process,
                        closedtickets.assigned_to as assigned_to,
                      
                        closedtickets.closed_at as created_at
                        FROM closedtickets
                        INNER JOIN client_master ON closedtickets.clientID=client_master.client_ID
                        INNER JOIN sla_master ON closedtickets.severity=sla_master.severity_name
                        INNER JOIN campaign_master ON closedtickets.campaign_ID=campaign_master.id
                        INNER JOIN service_master ON closedtickets.process=service_master.id
                       

                        WHERE closedtickets.status =:status
                        ORDER BY closedtickets.closed_at DESC
                        ');

	   $this->db->bind(':status', $status);
	   $results = $this->db->resultSet();
	   return $results;
     
    }
	//---------------------------------------
	 public function getcloseTickets1($status,$data){
    $this->db->query('SELECT *,
                      closedtickets.id as generatedTicketID,
                      client_master.clientname as name,
                      closedtickets.subject as subject,
                      closedtickets.description as description,
                      sla_master.severity as severity,
                      closedtickets.ticketID as ticketID,
                      closedtickets.status as status,
                      campaign_master.campaignname as campaignname,
                      service_master.servicename as process,
                      closedtickets.assigned_to as assigned_to,
                   
                      closedtickets.closed_at as created_at
                      FROM closedtickets
                      INNER JOIN client_master ON closedtickets.clientID=client_master.client_ID
                      INNER JOIN sla_master ON closedtickets.severity=sla_master.severity_name
                      INNER JOIN campaign_master ON closedtickets.campaign_ID=campaign_master.id
                      INNER JOIN service_master ON closedtickets.process=service_master.id
                     

                      WHERE closedtickets.status =:status AND closedtickets.closed_at >= :from_date AND   closedtickets.closed_at <=:to_date
                                 ');

   $this->db->bind(':status', $status);
   $this->db->bind(':from_date', $data['from']);
   $this->db->bind(':to_date', $data['to']);
   $results = $this->db->resultSet();
   return $results;
   
  }

//-------------------------------------------------------------------------------------------------------------
public function getcloseTickets2($status,$data){
  $this->db->query('SELECT *,
                    closedtickets.id as generatedTicketID,
                    client_master.clientname as name,
                    closedtickets.subject as subject,
                    closedtickets.description as description,
                    sla_master.severity as severity,
                    closedtickets.ticketID as ticketID,
                    closedtickets.status as status,
                    campaign_master.campaignname as campaignname,
                    service_master.servicename as process,
                    closedtickets.assigned_to as assigned_to,
                 
                    closedtickets.closed_at as created_at
                    FROM closedtickets
                    INNER JOIN client_master ON closedtickets.clientID=client_master.client_ID
                    INNER JOIN sla_master ON closedtickets.severity=sla_master.severity_name
                    INNER JOIN campaign_master ON closedtickets.campaign_ID=campaign_master.id
                    INNER JOIN service_master ON closedtickets.process=service_master.id
                   

                    WHERE closedtickets.status =:status AND closedtickets.campaign_ID=:campaign AND closedtickets.closed_at between :from_date AND :to_date
                    ORDER BY closedtickets.closed_at DESC
                    ');

 $this->db->bind(':status', $status);
 $this->db->bind(':from_date', $data['from']);
 $this->db->bind(':to_date', $data['to']);
 $this->db->bind(':campaign', $data['campaign']);
 $results = $this->db->resultSet();
 return $results;
 
}

//-------------------------------------------------------------------------------------------------------------
public function getcloseTickets3($status,$data){
  $this->db->query('SELECT *,
                    closedtickets.id as generatedTicketID,
                    client_master.clientname as name,
                    closedtickets.subject as subject,
                    closedtickets.description as description,
                    sla_master.severity as severity,
                    closedtickets.ticketID as ticketID,
                    closedtickets.status as status,
                    campaign_master.campaignname as campaignname,
                    service_master.servicename as process,
                    closedtickets.assigned_to as assigned_to,
                
                    closedtickets.closed_at as created_at
                    FROM closedtickets
                    INNER JOIN client_master ON closedtickets.clientID=client_master.client_ID
                    INNER JOIN sla_master ON closedtickets.severity=sla_master.severity_name
                    INNER JOIN campaign_master ON closedtickets.campaign_ID=campaign_master.id
                    INNER JOIN service_master ON closedtickets.process=service_master.id
                   

                    WHERE closedtickets.status =:status AND closedtickets.severity=:severity AND closedtickets.closed_at between :from_date AND :to_date
                    ORDER BY closedtickets.closed_at DESC
                    ');

 $this->db->bind(':status', $status);
 $this->db->bind(':from_date', $data['from']);
 $this->db->bind(':to_date', $data['to']);
 $this->db->bind(':severity', $data['severity']);
 $results = $this->db->resultSet();
 return $results;
 
}

//-------------------------------------------------------------------------------------------------------------
  
public function getcloseTickets4($status,$data){
  $this->db->query('SELECT *,
                    closedtickets.id as generatedTicketID,
                    client_master.clientname as name,
                    closedtickets.subject as subject,
                    closedtickets.description as description,
                    sla_master.severity as severity,
                    closedtickets.ticketID as ticketID,
                    closedtickets.status as status,
                    campaign_master.campaignname as campaignname,
                    service_master.servicename as process,
                    closedtickets.assigned_to as assigned_to,
                
                    closedtickets.closed_at as created_at
                    FROM closedtickets
                    INNER JOIN client_master ON closedtickets.clientID=client_master.client_ID
                    INNER JOIN sla_master ON closedtickets.severity=sla_master.severity_name
                    INNER JOIN campaign_master ON closedtickets.campaign_ID=campaign_master.id
                    INNER JOIN service_master ON closedtickets.process=service_master.id
                   

                    WHERE closedtickets.status =:status AND closedtickets.campaign_ID=:campaign AND closedtickets.severity=:severity AND tickets.closed_at between :from_date AND :to_date
                    ORDER BY closedtickets.closed_at DESC
                    ');

 $this->db->bind(':status', $status);
 $this->db->bind(':from_date', $data['from']);
 $this->db->bind(':to_date', $data['to']);
 $this->db->bind(':severity', $data['severity']);
 $this->db->bind(':campaign', $data['campaign']);
 $results = $this->db->resultSet();
 return $results;
 
}




//--------------------------End-------------------------


//-------------------------------------------------------------------------------------------------------------
	public function totalticket($status)
	{
		$this->db->query('SELECT count(*) as count,
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
                        INNER JOIN campaign_master ON tickets.campaign_ID=campaign_master.campaignID
                        INNER JOIN service_master ON tickets.process=service_master.id
                       

                        WHERE tickets.status !=:status
                        ORDER BY tickets.created_at DESC');
		$this->db->bind(':status', $status);
		$row = $this->db->single();
	return $row;
	}
//-------------------------------------------------------------------------------------------------------------

	 
public function updatesladuration($ticketID,$go)
	{
		 $this->db->query('UPDATE tickets SET time = :go  WHERE ticketID = :ticketID');
		 $this->db->bind(':go',$go);
		$this->db->bind(':ticketID',$ticketID);
		if($this->db->execute())
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
//-------------------------------------------------------------------------------------------------------------
    public function viewTicket($ticketID)
	{
      $this->db->query('SELECT * FROM tickets WHERE ticketID = :ticketID');
      $this->db->bind(':ticketID', $ticketID);
	  $row = $this->db->single();
	  return $row;
      if($this->db->rowCount() > 0)
	  {
        return true;
      } else 
	  {
        return false;
      }
    }
//-------------------------------------------------------------------------------------------------------------
   public function slanotification($status)
   {
	  $this->db->query('SELECT * FROM tickets WHERE ticketID = :ticketID');
      $this->db->bind(':ticketID', $ticketID);
	  $row = $this->db->single();
	 
      if($this->db->rowCount() > 0)
	  {
        return true;
      } else 
	  {
        return false;
      }
   }
 //-------------------------------------------------------------------------------------------------------------
 
//-------------------------------------------------------------------------------------------------------------
 /*   
  
    public function getTicketByName($name){
      $this->db->query('SELECT * FROM generated_ticket WHERE name = :userCreated');
      $this->db->bind(':name', $name);

      $row = $this->db->single();

      return $row;
    }

    public function getTicketByDepartment($department){
      $this->db->query('SELECT * FROM generated_ticket WHERE name = :department');
      $this->db->bind(':department', $department);
            
      $row = $this->db->single();

      return $row;
    } *

public function getDepartment5($department,$status){
  $this->db->query('SELECT *,
  generated_ticket.id as generatedID,
  generated_ticket.user_name as name,
  generated_ticket.status as status,
  generated_ticket.severity as severity,
  generated_ticket.ticket_id as ticketNumber,
  generated_ticket.created_at as Created_at,
  generated_ticket.assigned_to as assigned_to
  FROM generated_ticket WHERE department= :department  and status != :status
  ORDER BY generated_ticket.created_at DESC
  ');
   $this->db->bind(':department', $department);
   $this->db->bind(':status', $status);
  $results = $this->db->resultSet();
  return $results;

}*/

//-----------------------------------------------------------------------------------------------
public function getclients(){
  $this->db->query('SELECT *,
                    clients_master.id as clientID,
                    clients_master.name as name,
                    clients_master.service as service,
                   
                    FROM clients_master
                    ORDER BY clients_master.id DESC
                    ');
                    $results = $this->db->resultSet();
                    return $results;
     }
//-------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------
public function getSeverity(){
  $this->db->query('SELECT  severity,severity_name FROM sla_master ORDER BY id ASC');
                    $results = $this->db->resultSet();
                    return $results;
     }


//-----------------------------------------------------------------------------------------------------------------
public function createTicket($data,$campaignID,$campaign_email,$campaign_number){

  
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
//----------------------------------------------------- whats App Customer ------------------------------------------------------
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
  if($campaignID=="1"){
    $output=$email_msg;
    $output.=" ".$data['email'].'<p>Your ticket number is &nbsp;' .$tid. ' </p>' ; 
    $output.='<p>Thanks & Regards,</p>';
    $output.='<p>Futurecalls Helpdesk Team</p>';
    $body = $output; 
   // $subject =$tid."[".$data['title']."]";
  
       $subject ="[". $tid."#]" .$data['title'];
    $email_to = $campaign_email;;
    
    
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
             // $mail-> addAddress('ravi@Futurecalls.com'); 
            //  $mail-> addAddress('sridhar@Futurecalls.com'); 
  
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
//----------------------------------------------------------- Helpdesk- Whatsapp------------------------------------------------------
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

    $this->db->query('INSERT INTO tickets(clientID,email,subject,description,severity,ticketID,status,campaign_ID,process,attachment) VALUES(:client , :email, :title, :description,:severity, :tid, :status, :campaign_id, :process, :file)');
    // Bind values
   
    $this->db->bind(':client', $data['client']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':description', $data['description']);
    $this->db->bind(':severity',$data['severity']);  
    $this->db->bind(':tid',$tid);   
    $this->db->bind(':status',$data['status']); 
    $this->db->bind(':campaign_id',$campaignID);
    $this->db->bind(':process',$data['process']);       
    $this->db->bind(':file',$data['file']); 
    
   
    // Execute
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }


}
//-------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------
public function getCampainID($client,$process){
  $this->db->query('SELECT * FROM campaign_service WHERE service_id = :process' );
  // Bind value
 // $this->db->bind(':client', $client);
   $this->db->bind(':process', $process);

  $row = $this->db->single();

  return $row;
}
//----------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------
public function clientStatus($campaignID,$client){
  $this->db->query('SELECT * FROM campaign_client WHERE clientID= :client AND campaign_id= :campaignID' );
  // Bind value
  $this->db->bind(':campaignID', $campaignID);
   $this->db->bind(':client', $client);

  $row = $this->db->single();

    return $row;
 
}
//----------------------------------------------------------------------------------------------
public function SetAssignee($data,$assignee_number){
  $activity="Re-Assign";
  $customer= $this->CustomerMessage($activity);
   $cust=$customer[0]->customer_notification;
  $email_msg1=$customer[0]->email_message;
  $sms_msg1=$customer[0]->sms_message;
  $hd=$customer[0]->helpdesk_notification;
  $email_msg=$customer[0]->email_message1;
  $sms_msg=$customer[0]->sms_message1; 

  
  if($hd=='email'){
    $output=$email_msg;
    $output.='<p>Ticket number is &nbsp;' .$data['ticketID']. ' </p>' ; 
    $output.='<p>Thanks & Regards,</p>';
    $output.='<p>Futurecalls Helpdesk Team</p>';
    $body = $output; 
    //$subject = "Ticket Id";
       $subject ="[". $data['ticketID']."#]";
    $email_to = $data['assigned_to'];
    
    
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
  
  //--------------------------------------------------------------------------------------------------------
  //        *************************SMS- Helpdesk *********************************************
  //---------------------------------------------------------------------------------------------------------
  else{
    $username="";
    $hash="";
    $test="0";
    $sender="TXTLCL"; 
    $numbers=$assignee_number;
    $message=$sms_msg;
    $message.='ticket number is' .$tid ; 
   
            
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
  $this->db->query('UPDATE tickets SET assigned_to = :assignee, role = :role  WHERE ticketID = :ticketID');
  $this->db->bind(':assignee', $data['assigned_to']);
  $this->db->bind(':role', $data['role']);
  $this->db->bind(':ticketID', $data['ticketID']);
  
  if($this->db->execute())
  {
    return true;
  }
  else 
  {
	return false;
  }
}
//----------------------------------------------------------------------------------------------
public function ServicenameByid($usertype)
{
	$this->db->query('SELECT * FROM client_service WHERE client_id = :id ');
  $this->db->bind(':id', $usertype);
  $results = $this->db->resultSet();
	return $results;
}

//------------------------------------------------------------------------------------------------------

public function assignTicket($ticketID){
  $this->db->query('SELECT * FROM tickets WHERE ticketID = :ticketID');
  $this->db->bind(':ticketID', $ticketID);
  $row = $this->db->single();
  return $row;
  if($this->db->rowCount() > 0){
    return true;
  } else {
    return false;
  }
}
//------------------------------------------------------------------------------------------------------
public function getCampaignAgent($campaignID)
{
	print_r($campaignID);
	$this->db->query('SELECT * FROM agent_master WHERE campaign_id = :campaignID ');
  $this->db->bind(':campaignID', $campaignID);
  $results = $this->db->resultSet();
	return $results;
}

//------------------------------------------------------------------------------------------------------
public function CustomerMessage($activity)
{
	
	$this->db->query('SELECT * FROM notification_master WHERE activity = :activity ');
  $this->db->bind(':activity', $activity);
  $results = $this->db->resultSet();
	return $results;
}

//------------------------------------------------------------------------------------------------------
public function getCampaignEmail($campaignID)
{
  $level="L1";
	  $this->db->query('SELECT email FROM escalation_master WHERE campaign = :campaign and level=:level');
      $this->db->bind(':campaign', $campaignID);
	  $this->db->bind(':level', $level);
	  
		$row = $this->db->single();
		
		 $total = $row->email;
		 return $total;
	}
	

//------------------------------------------------------------------------------------------------------
public function getCampaignNumber($campaignID)
{
  $level="L1";
	  $this->db->query('SELECT number FROM escalation_master WHERE campaign = :campaign and level=:level');
      $this->db->bind(':campaign', $campaignID);
	  $this->db->bind(':level', $level);
	  
		$row = $this->db->single();
		
		 $total = $row->number;
		 return $total;
  }
  //-----------------------------------------------------------------------------------------------
  public function getAssigneeEmail($assigned_to)
{
  $level="L1";
	  $this->db->query('SELECT number FROM users WHERE email = :email');
      $this->db->bind(':email', $assigned_to);
	 
	  
		$row = $this->db->single();
		
		 $total = $row->number;
		 return $total;
  }
//---------------------------------------------------------------------------------------------------
public function getLevel2duration($clientID,$severity,$process)
{
 
  $this->db->query('SELECT l2 from sla_config where client_ID=:clientID and severity=:severity and process=:process');
   
  $this->db->bind(':process',$process);
  $this->db->bind(':severity',$severity);
  $this->db->bind(':clientID',$clientID);
  
  $row = $this->db->single();
  
   $total = $row->l2;
   return $total;
     
}	
//-------------------------------------------------------------------------------------------------
public function getLevel3duration($clientID,$severity,$process)
{
 
  $this->db->query('SELECT l3 from sla_config where client_ID=:clientID and severity=:severity and process=:process');
   
  $this->db->bind(':process',$process);
  $this->db->bind(':severity',$severity);
  $this->db->bind(':clientID',$clientID);
  
  $row = $this->db->single();
  
   $total = $row->l3;
   return $total;
     
}	
//-------------------------------------------------------------------------------------------------
public function getLevel4duration($clientID,$severity,$process)
{
 
  $this->db->query('SELECT l4 from sla_config where client_ID=:clientID and severity=:severity and process=:process');
   
  $this->db->bind(':process',$process);
  $this->db->bind(':severity',$severity);
  $this->db->bind(':clientID',$clientID);
  
  $row = $this->db->single();
  
   $total = $row->l4;
   return $total;
     
}	
//-------------------------------------------------------------------------------------------------
public function EscalationMatrix($status)
	 {
    
		$this->db->query('SELECT *,
                        tickets.id as generatedTicketID,
                        tickets.clientID as name,
                        tickets.subject as subject,
                        tickets.description as description,
						tickets.severity as severity,
                        tickets.ticketID as ticketID,
                        tickets.status as status,
                        tickets.time as time,
                        tickets.campaign_ID as campaignname,
                        tickets.process as process,
                        tickets.assigned_to as assigned_to,
                        tickets.attachment as attachment,
                        tickets.created_at as created_at
                        FROM tickets                        
                        WHERE tickets.status !=:status
                        ORDER BY tickets.created_at DESC
					  ');
            $this->db->bind(':status', $status);
            
                        $results = $this->db->resultSet();
                        return $results;
    }
//------------------------------------------------------------------------------------------------


public function UpdateL1flagas2($ticketID)
{
$l1='2';
$this->db->query('UPDATE tickets SET l1 = :l1   WHERE ticketID = :ticketID');

$this->db->bind(':l1', $l1);
$this->db->bind(':ticketID', $ticketID);

if($this->db->execute())
{
  return true;
}
else 
{
return false;
}
}
//----------------------------------------------------------------------------------------------------------
public function UpdateL2flagas2($ticketID)
{
$l2='2';
$this->db->query('UPDATE tickets SET l2 = :l2   WHERE ticketID = :ticketID');

$this->db->bind(':l2', $l2);
$this->db->bind(':ticketID', $ticketID);

if($this->db->execute())
{
  return true;
}
else 
{
return false;
}
}
//----------------------------------------------------------------------------------------------------------
public function UpdateL3flagas2($ticketID)
{
$l3='2';
$this->db->query('UPDATE tickets SET l3 = :l3   WHERE ticketID = :ticketID');

$this->db->bind(':l3', $l3);
$this->db->bind(':ticketID', $ticketID);

if($this->db->execute())
{
  return true;
}
else 
{
return false;
}
}
//----------------------------------------------------------------------------------------------------------
public function UpdateL1flag($ticketID,$data,$campaign)
{


  $activity="SLA Violations";
  $customer= $this->CustomerMessage($activity);
   $cust=$customer[0]->customer_notification;
  $email_msg1=$customer[0]->email_message;
  $sms_msg1=$customer[0]->sms_message;
  $hd=$customer[0]->helpdesk_notification;
  $email_msg=$customer[0]->email_message1;
  $sms_msg=$customer[0]->sms_message1; 

  if($cust=='email'){
    $output=$email_msg1;
    $output.='<p> Level 1 violation . Please allow us some time shall soon update you on this. Ticket number is &nbsp;' .$ticketID. ' </p>' ; 
    $output.='<p>Thanks & Regards,</p>';
    $output.='<p>Futurecalls Helpdesk Team</p>';
    $output.='<p>Note: Do not change the subject line While replying this message</p>';
    $body = $output; 
    //$subject = $ticketID."[".$data['title']."]";
    $subject ="[". $ticketID."#]" .$data['title'];
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
            //  $mail-> addAddress('sridhar@Futurecalls.com'); 
    
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
    $message.='level 1 violation. Please allow us some time shall soon update you on this. Ticket number is &nbsp;' .$ticketID ; 
   
            
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
    if($campaign=="1"){
      $output=$email_msg;
      $output.='<p>level 1 violation. Ticket number is &nbsp;' .$ticketID. ' </p>' ; 
      $output.='<p>Thanks & Regards,</p>';
      $output.='<p>Futurecalls Helpdesk Team</p>';
      $body = $output; 
     // $subject =$ticketID."[".$data['title']."]";
    $subject ="[". $ticketID."#]" .$data['title'];
      
      $email_to = $data['l1_email'];
      
      
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
      $output.='<p>level 1 violation. Ticket number is &nbsp;' .$ticketID. ' </p>' ; 
      $output.='<p>Thanks & Regards,</p>';
      $output.='<p>Futurecalls Helpdesk Team</p>';
      $body = $output; 
     // $subject =$ticketID."[".$data['title']."]"; 
      $subject ="[". $ticketID."#]" .$data['title'];
      $email_to = $data['l1_email'];
    
    
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
else{
  $username="";
  $hash="";
  $test="0";
  $sender="TXTLCL"; 
  $numbers=$data['l1_number'];
  $message=$sms_msg;
  $message.='level 1 violation. Ticket number is' .$tticketID ; 
 
          
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

 //************************************* Notification Part End **************************************** 
$l1='1';
$this->db->query('UPDATE tickets SET l1 = :l1   WHERE ticketID = :ticketID');

$this->db->bind(':l1', $l1);
$this->db->bind(':ticketID', $ticketID);

if($this->db->execute())
{
  return true;
}
else 
{
return false;
}
}
//----------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------
public function UpdateL2flag($ticketID,$data,$campaign)
{
  $activity="SLA Violations";
  $customer= $this->CustomerMessage($activity);
   $cust=$customer[0]->customer_notification;
  $email_msg1=$customer[0]->email_message;
  $sms_msg1=$customer[0]->sms_message;
  $hd=$customer[0]->helpdesk_notification;
  $email_msg=$customer[0]->email_message1;
  $sms_msg=$customer[0]->sms_message1; 

  if($cust=='email'){
    $output=$email_msg1;
    $output.='<p> Level 2 violation .Please allow us some time shall soon update you on this. Ticket number is &nbsp;' .$ticketID. ' </p>' ; 
    $output.='<p>Thanks & Regards,</p>';
    $output.='<p>Futurecalls Helpdesk Team</p>';
    $output.='<p>Note: Do not change the subject line While replying this message</p>';
    $body = $output; 
   // $subject = $ticketID."[".$data['title']."]";
    $subject ="[". $ticketID."#]" .$data['title'];
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
            //  $mail-> addAddress('sridhar@Futurecalls.com'); 
    
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
    $message.='level 2 violation.Please allow us some time shall soon update you on this.  Ticket number is &nbsp;' .$ticketID ; 
   
            
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
    if($campaign=="1"){
      $output=$email_msg;
      $output.='<p>level 2 violation. Ticket number is &nbsp;' .$ticketID. ' </p>' ; 
      $output.='<p>Thanks & Regards,</p>';
      $output.='<p>Futurecalls Helpdesk Team</p>';
      $body = $output; 
     // $subject =$ticketID."[".$data['title']."]";
    
      $subject ="[". $ticketID."#]" .$data['title'];
      $email_to = $data['l2_email'];
      
      
      $mail=new PHPMailer;
      

           // $mail->isSMTP();      
         
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
            //  $mail-> addAddress('sridhar@Futurecalls.com'); 
            
            
      
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
      $output.='<p>level 2 violation. Ticket number is &nbsp;' .$ticketID. ' </p>' ; 
      $output.='<p>Thanks & Regards,</p>';
      $output.='<p>Futurecalls Helpdesk Team</p>';
      $body = $output; 
     // $subject =$ticketID."[".$data['title']."]"; 
      $subject ="[". $ticketID."#]" .$data['title'];
      $email_to = $data['l2_email'];
    
    
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
  }

//--------------------------------------------------------------------------------------------------------
//        *************************SMS- Helpdesk *********************************************
//---------------------------------------------------------------------------------------------------------
else{
  $username="";
  $hash="";
  $test="0";
  $sender="TXTLCL"; 
  $numbers=$data['l2_number'];
  $message=$sms_msg;
  $message.='level 2 violation. Ticket number is' .$tticketID ; 
 
          
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

 //************************************* Notification Part End **************************************** 
$l2='1';
$this->db->query('UPDATE tickets SET l2 = :l2   WHERE ticketID = :ticketID');

$this->db->bind(':l2', $l2);
$this->db->bind(':ticketID', $ticketID);

if($this->db->execute())
{
  return true;
}
else 
{
return false;
}
}
//----------------------------------------------------------------------------------------------------------
public function UpdateL3flag($ticketID,$data,$campaign)
{
  $activity="SLA Violations";
  $customer= $this->CustomerMessage($activity);
   $cust=$customer[0]->customer_notification;
  $email_msg1=$customer[0]->email_message;
  $sms_msg1=$customer[0]->sms_message;
  $hd=$customer[0]->helpdesk_notification;
  $email_msg=$customer[0]->email_message1;
  $sms_msg=$customer[0]->sms_message1; 

  if($cust=='email'){
    $output=$email_msg1;
    $output.='<p> Level 3 violation . Please allow us some time shall soon update you on this. Ticket number is &nbsp;' .$ticketID. ' </p>' ; 
    $output.='<p>Thanks & Regards,</p>';
    $output.='<p>Futurecalls Helpdesk Team</p>';
    $output.='<p>Note: Do not change the subject line While replying this message</p>';
    $body = $output; 
   // $subject = $ticketID."[".$data['title']."]";
    $subject ="[". $ticketID."#]" .$data['title'];
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
    $message.='level 3 violation. Please allow us some time shall soon update you on this. Ticket number is &nbsp;' .$ticketID ; 
   
            
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
    if($campaign=="1"){
      $output=$email_msg;
      $output.='<p>level 3 violation. Ticket number is &nbsp;' .$ticketID. ' </p>' ; 
      $output.='<p>Thanks & Regards,</p>';
      $output.='<p>Futurecalls Helpdesk Team</p>';
      $body = $output; 
     // $subject =$ticketID."[".$data['title']."]";
    $subject ="[". $ticketID."#]" .$data['title'];
      
      $email_to = $data['l3_email'];
      
      
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
           //   $mail-> addAddress('sridhar@Futurecalls.com'); 
      
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
      $output.='<p>level 3 violation. Ticket number is &nbsp;' .$ticketID. ' </p>' ; 
      $output.='<p>Thanks & Regards,</p>';
      $output.='<p>Futurecalls Helpdesk Team</p>';
      $body = $output; 
      //$subject =$ticketID."[".$data['title']."]"; 
      $subject ="[". $ticketID."#]" .$data['title'];
      $email_to = $data['l3_email'];
    
    
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
            //  $mail-> addAddress('sridhar@Futurecalls.com'); 
    
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
  $numbers=$data['l3_number'];
  $message=$sms_msg;
  $message.='level 3 violation. Ticket number is' .$tticketID ; 
 
          
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

 //************************************* Notification Part End **************************************** 
$l3='1';
$this->db->query('UPDATE tickets SET l3 = :l3   WHERE ticketID = :ticketID');

$this->db->bind(':l3', $l3);
$this->db->bind(':ticketID', $ticketID);

if($this->db->execute())
{
  return true;
}
else 
{
return false;
}
}
//----------------------------------------------------------------------------------------------------------
public function UpdateL4flag($ticketID,$data,$campaign)
{
  $activity="SLA Violations";
  $customer= $this->CustomerMessage($activity);
   $cust=$customer[0]->customer_notification;
  $email_msg1=$customer[0]->email_message;
  $sms_msg1=$customer[0]->sms_message;
  $hd=$customer[0]->helpdesk_notification;
  $email_msg=$customer[0]->email_message1;
  $sms_msg=$customer[0]->sms_message1; 

  if($cust=='email'){
    $output=$email_msg1;
    $output.='<p> Level 4 violation . Please allow us some time shall soon update you on this.  Ticket number is &nbsp;' .$ticketID. ' </p>' ; 
    $output.='<p>Thanks & Regards,</p>';
    $output.='<p>Futurecalls Helpdesk Team</p>';
    $output.='<p>Note: Do not change the subject line While replying this message</p>';
    $body = $output; 
    //$subject = $ticketID."[".$data['title']."]";
    $subject ="[". $ticketID."#]" .$data['title'];
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
    $message.='level 4 violation. Please allow us some time shall soon update you on this.  Ticket number is &nbsp;' .$ticketID ; 
   
            
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
    if($campaign=="1"){
      $output=$email_msg;
      $output.='<p>level 4 violation. Ticket number is &nbsp;' .$ticketID. ' </p>' ; 
      $output.='<p>Thanks & Regards,</p>';
      $output.='<p>Futurecalls Helpdesk Team</p>';
      $body = $output; 
      //$subject =$ticketID."[".$data['title']."]";
    
        $subject ="[". $ticketID."#]" .$data['title'];
      $email_to = $data['l4_email'];
      
      
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
    else{
      $output=$email_msg;
      $output.='<p>level 4 violation. Ticket number is &nbsp;' .$ticketID. ' </p>' ; 
      $output.='<p>Thanks & Regards,</p>';
      $output.='<p>Futurecalls Helpdesk Team</p>';
      $body = $output; 
      //$subject =$ticketID."[".$data['title']."]"; 
        $subject ="[". $ticketID."#]" .$data['title'];
      $email_to = $data['l4_email'];
    
    
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
  }

//--------------------------------------------------------------------------------------------------------
//        *************************SMS- Helpdesk *********************************************
//---------------------------------------------------------------------------------------------------------
else{
  $username="";
  $hash="";
  $test="0";
  $sender="TXTLCL"; 
  $numbers=$data['l4_number'];
  $message=$sms_msg;
  $message.='level 4 violation. Ticket number is' .$tticketID ; 
 
          
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

 //************************************* Notification Part End **************************************** 
$l4='1';
$this->db->query('UPDATE tickets SET l4 = :l4   WHERE ticketID = :ticketID');

$this->db->bind(':l4', $l4);
$this->db->bind(':ticketID', $ticketID);

if($this->db->execute())
{
  return true;
}
else 
{
return false;
}
}
//----------------------------------------------------------------------------------------------------------
public function AddL1time($ticketID,$end)
{

$this->db->query('INSERT INTO violations(ticketID,l1_time) VALUES( :tid,:l1_time)');


$this->db->bind(':tid', $ticketID);
$this->db->bind(':l1_time', $end);

if($this->db->execute())
{
  return true;
}
else 
{
return false;
}
}
//----------------------------------------------------------------------------------------------------------
public function AddL2time($ticketID,$end)
{

$this->db->query('UPDATE violations SET l2_time = :l2_time   WHERE ticketID = :tid');


$this->db->bind(':tid', $ticketID);
$this->db->bind(':l2_time', $end);

if($this->db->execute())
{
  return true;
}
else 
{
return false;
}
}
//----------------------------------------------------------------------------------------------------------
public function AddL3time($ticketID,$end)
{

  $this->db->query('UPDATE violations SET l3_time = :l3_time   WHERE ticketID = :tid');


$this->db->bind(':tid', $ticketID);
$this->db->bind(':l3_time', $end);

if($this->db->execute())
{
  return true;
}
else 
{
return false;
}
}
//----------------------------------------------------------------------------------------------------------
public function AddL4time($ticketID,$end)
{

  $this->db->query('UPDATE violations SET l4_time = :l4_time   WHERE ticketID = :tid');


$this->db->bind(':tid', $ticketID);
$this->db->bind(':l4_time', $end);

if($this->db->execute())
{
  return true;
}
else 
{
return false;
}
}
//----------------------------------------------------------------------------------------------------------
public function getlevel1time($ticketID)
{
 
  $this->db->query('SELECT l1_time from violations where ticketID=:tid');
   
  $this->db->bind(':tid',$ticketID);
 
  $row = $this->db->single();
  
   $total = $row->l1_time;
   return $total;
     
}	
//------------------------------------------------------------------------------------------------------------
public function getlevel2time($ticketID)
{
 
  $this->db->query('SELECT l2_time from violations where ticketID=:tid');
   
  $this->db->bind(':tid',$ticketID);
 
  $row = $this->db->single();
  
   $total = $row->l2_time;
   return $total;
     
}	
//------------------------------------------------------------------------------------------------------------
public function getlevel3time($ticketID)
{
 
  $this->db->query('SELECT l3_time from violations where ticketID=:tid');
   
  $this->db->bind(':tid',$ticketID);
 
  $row = $this->db->single();
  
   $total = $row->l3_time;
   return $total;
     
}	
//------------------------------------------------------------------------------------------------------------
public function getlevel4time($ticketID)
{
 
  $this->db->query('SELECT l4_time from violations where ticketID=:tid');
   
  $this->db->bind(':tid',$ticketID);
 
  $row = $this->db->single();
  
   $total = $row->l4_time;
   return $total;
     
}	
//------------------------------------------------------------------------------------------------------------
Public function getduration($status)
	 {
     $l1='0';
		$this->db->query('SELECT *,
                        tickets.id as generatedTicketID,
                        tickets.clientID as name,
                        tickets.email as email,
                        tickets.number as number,
                        tickets.subject as subject,
                        tickets.description as description,
					             	tickets.severity as severity,
                        tickets.ticketID as ticketID,
                        tickets.status as status,
                        tickets.time as time,
                       tickets.campaign_ID as campaignname,
                        tickets.process as process,
                        tickets.assigned_to as assigned_to,
                        tickets.attachment as attachment,
                        tickets.created_at as created_at
                        FROM tickets                       
                        WHERE tickets.status !=:status AND tickets.l1!=:l1
                        ORDER BY tickets.created_at DESC
					  ');
            $this->db->bind(':status', $status);
            $this->db->bind(':l1', $l1);
                        $results = $this->db->resultSet();
                        return $results;
    }

	
//-------------------------------------------------------------------------------------------------------------

public function getsladuration($clientID,$severity,$process)
{
  $this->db->query('SELECT l1 from sla_config where client_ID=:clientID and severity=:severity and process=:process');
   
  $this->db->bind(':process',$process);
  $this->db->bind(':severity',$severity);
  $this->db->bind(':clientID',$clientID);
  
  $row = $this->db->single();
  
   $total = $row->l1;
   return $total;
     
}	
//--------------------------------------------------------------------------------------------------------------
public function getL1Email($campaign)
{
 
 $level='L1';
  $this->db->query('SELECT email,number from escalation_master where level=:l1 AND campaign=:campaign');
   
  $this->db->bind(':campaign',$campaign);
  $this->db->bind(':l1',$level); 
  $row = $this->db->single();  
  return $row;
    
     
}	
//-------------------------------------------------------------------------------------------------------------
public function getL2Email($campaign)
{
 $level='L2';
  $this->db->query('SELECT email,number from escalation_master where level=:l2 AND campaign=:campaign');
   
  $this->db->bind(':campaign',$campaign);
  $this->db->bind(':l2',$level); 
  $row = $this->db->single();  
   return $row;  
}	
//-------------------------------------------------------------------------------------------------------------
public function getL3Email($campaign)
{
  
 $level='L3';
  $this->db->query('SELECT email,number from escalation_master where level=:l3 AND campaign=:campaign');
   
  $this->db->bind(':campaign',$campaign);
  $this->db->bind(':l3',$level);
  
  $row = $this->db->single();  
   return $row;
   }	
//-------------------------------------------------------------------------------------------------------------
public function getL4Email($campaign)
{
 $level='L4';
  $this->db->query('SELECT email,number from escalation_master where level=:l4 AND campaign=:campaign');
   
  $this->db->bind(':campaign',$campaign);
  $this->db->bind(':l4',$level);
 
  $row = $this->db->single();  
   return $row;
     
}	
//-------------------------------------------------------------------------------------------------------------
public function EmailStatus($ticketID){
  $this->db->query('SELECT *,
                   emails.id as generatedTicketID,
                   emails.ticketID as ticketID,
                   emails.from_email as from_email,
                    emails.to_email as to_email,
                   emails.subject as subject,
                   emails.description as description,                               
                   emails.created_at as created_at                
                    FROM emails              

                    WHERE  emails.ticketID = :ticketID
                    ORDER BY emails.created_at DESC 
                    ');

             
               $this->db->bind(':ticketID', $ticketID);
                    $results = $this->db->resultSet();
                    return $results;
 
}
//-----------------------------------------------------------------------------------------------------------
public function criticalticket($status,$critical)
	{
	  $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE severity = :critical and status!=:status');
      $this->db->bind(':critical', $critical);
	  $this->db->bind(':status', $status);
		$row = $this->db->single();
		
		 $total = $row->total;
		 return $total;
	}
	
	//..............................................................................
	
	public function highticket($status,$high)
	{
	  $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE severity = :high and status!=:status');
      $this->db->bind(':high', $high);
	  $this->db->bind(':status', $status);
		$row = $this->db->single();
		 $total = $row->total;
		 return $total;
	}
	
	//............................................................................................................
	
	public function mediumticket($status,$medium)
	{
	  $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE severity = :medium and status!=:status');
      $this->db->bind(':medium', $medium);
	  $this->db->bind(':status', $status);
		$row = $this->db->single();
				 $total = $row->total;
		 return $total;
	}
	
	//................................................................................................................
	
	public function lowticket($status,$low)
	{
	  $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE severity = :low and status!=:status');
      $this->db->bind(':low', $low);
	  $this->db->bind(':status', $status);
		$row = $this->db->single();
		$total = $row->total;
		 return $total;
	}
//-------------------------------------------------------------------------------------------------------------
  public function getclientID($number)
{
  $this->db->query('SELECT client_ID from client_master where number=:number');
   
  $this->db->bind(':number',$number);

  
  $row = $this->db->single();
  
   $total = $row->client_ID;
   return $total;
     
} 
//-----------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------
  public function getclientName($number)
{
  $this->db->query('SELECT clientname from client_master where number=:number');
   
  $this->db->bind(':number',$number);

  
  $row = $this->db->single();
  
   $total = $row->clientname;
   return $total;
     
} 
//-----------------------------------------------------------------------------------------------------------
  }