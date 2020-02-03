<?php
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
                        INNER JOIN campaign_master ON tickets.campaign_ID=campaign_master.campaignID
                        INNER JOIN service_master ON tickets.process=service_master.id
                       

                        WHERE tickets.status !=:status
                        ORDER BY tickets.created_at DESC
                        ');

                   $this->db->bind(':status', $status);
                        $results = $this->db->resultSet();
                        return $results;
     
    }
//-------------------------------------------------------------------------------------------------------------
    public function viewTicket($ticketID){
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
public function createTicket($data,$campainID){        
  date_default_timezone_set('Asia/Kolkata');
  $m = date('h');
  $y = date('i');
  $d = date('s');
  $tid = $y.$m.$d;    
  
  $output='<p>Dear Customer,</p>';
  $output.='<p>Your Ticket has been created successfully. Your ticket number is &nbsp;' .$tid. ' </p>' ; 
  $output.='<p>Thanks & Regards,</p>';
  $output.='<p>Octelnetworks Helpdesk Team</p>';
  $body = $output; 
  $subject = "Ticket Id";
  
  $email_to = $data['email'];
  
  require 'PHPMailer/PHPMailer/PHPMailerAutoload.php';
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
    $this->db->query('INSERT INTO tickets(clientID,email,subject,description,severity,ticketID,status,campaign_ID,process,attachment) VALUES( :client ,:email,:title, :description,:severity, :tid, :status, :campain_id, :process,:file)');
    // Bind values
   
    $this->db->bind(':client', $data['client']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':description', $data['description']);
    $this->db->bind(':severity',$data['severity']);  
    $this->db->bind(':tid',$tid);   
    $this->db->bind(':status',$data['status']); 
    $this->db->bind(':campain_id',$campainID);
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
public function getCampainID($client,$process){
  $this->db->query('SELECT * FROM campaign_client WHERE  clientID=:client AND  process = :process' );
  // Bind value
  $this->db->bind(':client', $client);
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
public function SetAssignee($data){
  $this->db->query('UPDATE tickets SET assigned_to = :assignee  WHERE ticketID = :ticketID');
  // Bind values      
  $this->db->bind(':assignee', $data['assigned_to']);
  $this->db->bind(':ticketID', $data['ticketID']);
  
 

  // Execute
  if($this->db->execute()){
    return true;
  } else {
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
	$this->db->query('SELECT * FROM agent_master WHERE campaign_id = :campaignID ');
  $this->db->bind(':campaignID', $campaignID);
  $results = $this->db->resultSet();
	return $results;
}

//------------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------------------

public function getduration($status){
  $this->db->query('SELECT *,
                    tickets.id as generatedTicketID,
                     tickets.clientID as name,
                    tickets.subject as subject,
                    tickets.description as description,
        tickets.severity as severity,
                   tickets.ticketID as ticketID,
                   tickets.status as status,
                   tickets.time as time,
                   campaign_master.campaignname as campaignname,
                   tickets.process as process,
                  tickets.assigned_to as assigned_to,
                  tickets.attachment as attachment,
                  tickets.created_at as created_at
                    FROM tickets
                    INNER JOIN campaign_master ON tickets.campaign_ID=campaign_master.campaignID
                    WHERE tickets.status !=:status
                    ORDER BY tickets.created_at DESC
                    ');

               $this->db->bind(':status', $status);
                    $results = $this->db->resultSet();
                    return $results;
 
}


//-------------------------------------------------------------------------------------------------------------

public function getsladuration($clientID,$severity,$process)
{
$this->db->query('select l1 from sla_config where client_ID=:clientID and severity=:severity and process=:process');
$this->db->bind(':process',$process);
$this->db->bind(':severity',$severity);
$this->db->bind(':clientID',$clientID);
$row = $this->db->single();
return $row;
 
}	
//--------------------------------------------------------------------------------------------------------------

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

//-------------------------------------------------------------------------------------------------------------
public function slanotification($status)
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
  }