<?php
  class customers {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }
    public function getTickets($department,$status){
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
                      tickets.assigned_to as asassigned_to,
                      tickets.attachment as attachment,
                      tickets.created_at as created_at
      FROM tickets 
      INNER JOIN client_master ON tickets.clientID=client_master.client_ID
                        INNER JOIN sla_master ON tickets.severity=sla_master.severity_name
                        INNER JOIN campaign_master ON tickets.campaign_ID=campaign_master.id
                        INNER JOIN service_master ON tickets.process=service_master.id
      
      WHERE clientID= :department and status != :status
      ORDER BY tickets.created_at DESC
      ');
       $this->db->bind(':department', $department);
       $this->db->bind(':status', $status);
      $results = $this->db->resultSet();
      return $results;

    }

//----------------------------------------------------------------------------------------------
public function getClosedTickets($department,$status){
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
                  tickets.assigned_to as asassigned_to,
                  tickets.attachment as attachment,
                  tickets.created_at as created_at
  FROM tickets 
  INNER JOIN client_master ON tickets.clientID=client_master.client_ID
                    INNER JOIN sla_master ON tickets.severity=sla_master.severity_name
                    INNER JOIN campaign_master ON tickets.campaign_ID=campaign_master.id
                    INNER JOIN service_master ON tickets.process=service_master.id
  
  WHERE clientID= :department and status = :status
  ORDER BY tickets.created_at DESC
  ');
   $this->db->bind(':department', $department);
   $this->db->bind(':status', $status);
  $results = $this->db->resultSet();
  return $results;

}


   



//----------------------------------------------------------------------------------------------------

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
// Login User
public function login($email, $password){
  $this->db->query('SELECT * FROM users WHERE email = :email');
  $this->db->bind(':email', $email);      

  $row = $this->db->single();

  $hashed_password = $row->password;
  if(password_verify($password, $hashed_password)){
    return $row;
  } else {
    return false;
  }
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
  

    $this->db->query('INSERT INTO tickets(clientID,subject,description,severity,ticketID,status,campaign_ID,attachment) VALUES( :client ,:title, :description,:severity, :tid, :status, :campain_id,:file)');
    // Bind values
   
    $this->db->bind(':client', $data['client']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':description', $data['description']);
    $this->db->bind(':severity',$data['severity']);  
    $this->db->bind(':tid',$tid);   
    $this->db->bind(':status',$data['status']); 
    $this->db->bind(':campain_id',$campainID);   
    $this->db->bind(':file',$data['file']);    
   
    // Execute
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }


}
//-------------------------------------------------------------------------------------------------------
public function getCampainID($client){
  $this->db->query('SELECT * FROM campaign_client WHERE clientID = :client');
  // Bind value
  $this->db->bind(':client', $client);

  $row = $this->db->single();

  return $row;
}
//----------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------

public function ReopenTicket($ticketID,$status){
  $this->db->query('UPDATE tickets SET status = :status  WHERE ticketID = :ticketID');
  // Bind values      
  $this->db->bind(':status', $status); 
  $this->db->bind(':ticketID', $ticketID); 
 

  // Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}
//-----------------------------------------------------------------------------------------------------------------------


public function criticalticket($status,$critical,$department)
	{
	  $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE severity = :critical and status!=:status and clientID=:department');
      $this->db->bind(':critical', $critical);
	  $this->db->bind(':status', $status);
	  $this->db->bind(':department', $department);
		$row = $this->db->single();
		
		 $total = $row->total;
		 return $total;
	}
	
	//..............................................................................
	
	public function highticket($status,$high,$department)
	{
	  $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE severity = :high and status!=:status and  clientID=:department');
      $this->db->bind(':high', $high);
	  $this->db->bind(':status', $status);
	  $this->db->bind(':department', $department);
		$row = $this->db->single();
		 $total = $row->total;
		 return $total;
	}
	
	//............................................................................................................
	
	public function mediumticket($status,$medium,$department)
	{
	  $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE severity = :medium and status!=:status and  clientID=:department');
      $this->db->bind(':medium', $medium);
	  $this->db->bind(':status', $status);
	   $this->db->bind(':department', $department);
		$row = $this->db->single();
				 $total = $row->total;
		 return $total;
	}
	
	//................................................................................................................
	
	public function lowticket($status,$low,$department)
	{
	  $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE severity = :low and status!=:status and  clientID=:department');
      $this->db->bind(':low', $low);
	  $this->db->bind(':status', $status);
	  $this->db->bind(':department', $department);
		$row = $this->db->single();
		$total = $row->total;
		 return $total;
	}
//-----------------------------------------------------------------------------------------------------------------------
public function SlaViolations($department,$status)
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
                        WHERE tickets.status !=:status AND tickets.l1!=:l1 and clientID=:client
                        ORDER BY tickets.created_at DESC
         ');
         $this->db->bind(':status', $status);
         $this->db->bind(':client', $department);
         $this->db->bind(':l1', $l1);
                     $results = $this->db->resultSet();
                     return $results;
 }
//-------------------------------------------------------------------------------------------------------
public function clientname($client){
	  
  $this->db->query('SELECT clientname FROM client_master WHERE client_ID=:campaign');
   $this->db->bind(':campaign', $client);
  $row = $this->db->single();
  $camapignID = $row->clientname;
 //print_r($camapignID);die;
  return $camapignID;
	}
	//------------------------------------------------------------------------------------------------------------------
  public function clientopen($client){
	  $status ="close";
  $this->db->query('SELECT COUNT(status) AS total FROM tickets WHERE clientID=:id AND status!=:status');
      $this->db->bind(':id', $client);
	   $this->db->bind(':status', $status);
  $row = $this->db->single();
  $camapignID = $row->total;
 //print_r($camapignID);die;
  return $camapignID;
	}
	//------------------------------------------------------------------------------------------------------------------
	 public function clientclose($client){
	  $status ="close";
  $this->db->query('SELECT COUNT(status) AS total FROM tickets WHERE clientID=:id AND status=:status');
   $this->db->bind(':id', $client);
      $this->db->bind(':status', $status);
  $row = $this->db->single();
  $camapignID = $row->total;
 //print_r($camapignID);die;
  return $camapignID;
	}
	//------------------------------------------------------------------------------------------------------------------
	 public function campaignopentoday($client){
	  $status ="close";
  $this->db->query('SELECT COUNT(status) AS total FROM tickets WHERE clientID=:id AND status!=:status  AND  DAY(created_at) = DAY(NOW())');
   $this->db->bind(':id', $client);
      $this->db->bind(':status', $status);
  $row = $this->db->single();
  $camapignID = $row->total;
// print_r($camapignID);die;
  return $camapignID;
	}
	//------------------------------------------------------------------------------------------------------------------
	 public function campaignclosetoday($client){
	  $status ="close";
  $this->db->query('SELECT COUNT(status) AS total FROM closedtickets WHERE clientID=:id AND status=:status  AND  DAY(closed_at) = DAY(NOW())');
   $this->db->bind(':id', $client);
      $this->db->bind(':status', $status);
  $row = $this->db->single();
  $camapignID = $row->total;
// print_r($camapignID);die;
  return $camapignID;
	}
	//------------------------------------------------------------------------------------------------------------------
	 public function campaigncritical($client){
	  $status ="close";
	  $severity="P1";
  $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE clientID=:id AND status!=:status AND severity=:severity');
   $this->db->bind(':id', $client);
      $this->db->bind(':status', $status);
	   $this->db->bind(':severity', $severity);
	   
  $row = $this->db->single();
  $camapignID = $row->total;
// print_r($camapignID);die;
  return $camapignID;
	}
	//------------------------------------------------------------------------------------------------------------------
	 public function campaignhigh($client){
	  $status ="close";
	  $severity="P2";
  $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE clientID=:id AND status!=:status AND severity=:severity');
   $this->db->bind(':id', $client);
      $this->db->bind(':status', $status);
	   $this->db->bind(':severity', $severity);   
  $row = $this->db->single();
  $camapignID = $row->total;
// print_r($camapignID);die;
  return $camapignID;
	}
//------------------------------------------------------------------------------------------------------------------
 public function campaignmedium($client){
	  $status ="close";
	  $severity="P3";
  $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE clientID=:id AND status!=:status AND severity=:severity');
   $this->db->bind(':id', $client);
      $this->db->bind(':status', $status);
	   $this->db->bind(':severity', $severity);   
  $row = $this->db->single();
  $camapignID = $row->total;
// print_r($camapignID);die;
  return $camapignID;
	}
	//------------------------------------------------------------------------------------------------------------------
	 public function campaignlow($client){
	  $status ="close";
	  $severity="P4";
  $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE clientID=:id AND status!=:status AND severity=:severity');
   $this->db->bind(':id', $client);
      $this->db->bind(':status', $status);
	   $this->db->bind(':severity', $severity);   
  $row = $this->db->single();
  $camapignID = $row->total;
// print_r($camapignID);die;
  return $camapignID;
	}
	//------------------------------------------------------------------------------------------------------------------
		 public function campaignsla($client){
	  $status ="Close";
	 
	  $time="0";
  $this->db->query('SELECT COUNT(l1) AS total FROM tickets WHERE clientID=:id AND status!=:status AND l1!=:time');
   $this->db->bind(':id', $client);
      $this->db->bind(':status', $status);
	   $this->db->bind(':time', $time);   
  $row = $this->db->single();
  $camapignID = $row->total;
// print_r($camapignID);die;
  return $camapignID;
	}
  //------------------------------------------------------------------------------------------------------------------
  }