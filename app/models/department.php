<?php
  class department {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

//------------------------------------------------------------------------------------------------------------
    public function departmentTickets($status,$campaign){
      $this->db->query('SELECT *,
                        tickets.id as generatedTicketID,
                        client_master.clientname as name,
                        tickets.number as number,
                        tickets.subject as subject,
                        tickets.description as description,
                       sla_master.severity as severity,
                       tickets.ticketID as ticketID,
                       tickets.status as status,
                       tickets.closing_status as closing_status,
                       campaign_master.campaignname as campaignname,
                       service_master.servicename as process,
                      tickets.assigned_to as assigned_to,
                      tickets.attachment as attachment,
                      tickets.created_at as created_at,
                      tickets.read_status as read_status
                        FROM tickets
                        INNER JOIN client_master ON tickets.clientID=client_master.client_ID
                        INNER JOIN sla_master ON tickets.severity=sla_master.severity_name
                        INNER JOIN campaign_master ON tickets.campaign_ID=campaign_master.id
                        INNER JOIN service_master ON tickets.process=service_master.id
                       

                        WHERE tickets.status !=:status and tickets.campaign_ID = :campaign
                        ORDER BY tickets.created_at DESC
                        ');

                   $this->db->bind(':status', $status);
                   $this->db->bind(':campaign', $campaign);
                        $results = $this->db->resultSet();
                        return $results;
     
    }
//-----------------------------------------------------------------------------------------------------------

public function smsTickets($status,$campaign){
      $this->db->query('SELECT *,
                        tickets.id as generatedTicketID,
                        client_master.clientname as name,
                        tickets.number as number,
                        tickets.subject as subject,
                        tickets.description as description,
                        sla_master.severity as severity,
                        tickets.ticketID as ticketID,
                        tickets.status as status,
                        tickets.closing_status as closing_status,
                        campaign_master.campaignname as campaignname,
                        service_master.servicename as process,
                        tickets.assigned_to as assigned_to,
                        tickets.attachment as attachment,
                        tickets.created_at as created_at,
                        tickets.read_status as read_status
                        FROM tickets
                        INNER JOIN client_master ON tickets.clientID=client_master.client_ID
                        INNER JOIN sla_master ON tickets.severity=sla_master.severity_name
                        INNER JOIN campaign_master ON tickets.campaign_ID=campaign_master.id
                        INNER JOIN service_master ON tickets.process=service_master.id
                       

                        WHERE tickets.status !=:status and tickets.campaign_ID = :campaign
                        ORDER BY tickets.created_at DESC
                        ');

                   $this->db->bind(':status', $status);
                   $this->db->bind(':campaign', $campaign);
                        $results = $this->db->resultSet();
                        return $results;
     
    }
//-----------------------------------------------------------------------------------------------------------

public function getTickets1($status,$data,$campaign){
  $this->db->query('SELECT *,
                    tickets.id as generatedTicketID,
                    tickets.clientID as name,
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
                   
                    INNER JOIN sla_master ON tickets.severity=sla_master.severity_name
                    INNER JOIN campaign_master ON tickets.campaign_ID=campaign_master.id
                    INNER JOIN service_master ON tickets.process=service_master.id
                   

                    WHERE tickets.status =:status AND tickets.campaign_ID=:campaign AND  tickets.created_at >= :from_date AND   tickets.created_at <=:to_date
                               ');

 $this->db->bind(':status', $status);
  $this->db->bind(':campaign', $campaign);
 $this->db->bind(':from_date', $data['from']);
 $this->db->bind(':to_date', $data['to']);
 $results = $this->db->resultSet();
 return $results;
 
}

//-------------------------------------------------------------------------------------------------------------

public function getTickets4($status,$data,$campaign){
$this->db->query('SELECT *,
                  tickets.id as generatedTicketID,
                  tickets.clientID as name,
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
                
                  INNER JOIN sla_master ON tickets.severity=sla_master.severity_name
                  INNER JOIN campaign_master ON tickets.campaign_ID=campaign_master.id
                  INNER JOIN service_master ON tickets.process=service_master.id
                 

                  WHERE tickets.status =:status AND tickets.campaign_ID=:campaign AND tickets.severity=:severity AND tickets.created_at between :from_date AND :to_date
                  ORDER BY tickets.created_at DESC
                  ');

$this->db->bind(':status', $status);
$this->db->bind(':from_date', $data['from']);
$this->db->bind(':to_date', $data['to']);
$this->db->bind(':severity', $data['severity']);
$this->db->bind(':campaign', $campaign);
$results = $this->db->resultSet();
return $results;

}
//-------------------------------------------------------------------------------------------------------------


  public function departmentcloseTickets($status,$campaign){
      $this->db->query('SELECT *,
                        closedtickets.id as generatedTicketID,
                        client_master.clientname as name,
                        closedtickets.number as number,
                        closedtickets.subject as subject,
                        closedtickets.description as description,
                       sla_master.severity as severity,
                       closedtickets.ticketID as ticketID,
                       closedtickets.status as status,
                       closedtickets.closing_status as closing_status,
                       campaign_master.campaignname as campaignname,
                       service_master.servicename as process,
                      closedtickets.assigned_to as assigned_to,
                    
                      closedtickets.closed_at as created_at
                        FROM closedtickets
                        INNER JOIN client_master ON closedtickets.clientID=client_master.client_ID
                        INNER JOIN sla_master ON closedtickets.severity=sla_master.severity_name
                        INNER JOIN campaign_master ON closedtickets.campaign_ID=campaign_master.id
                        INNER JOIN service_master ON closedtickets.process=service_master.id
                       

                        WHERE closedtickets.status =:status and closedtickets.campaign_ID = :campaign
                        ORDER BY closedtickets.closed_at DESC
                        ');

                   $this->db->bind(':status', $status);
                   $this->db->bind(':campaign', $campaign);
                        $results = $this->db->resultSet();
                        return $results;
     
    }

//------------------------------------------------------------------------------------

public function getcloseTickets1($status,$data,$campaign){
  $this->db->query('SELECT *,
                    closedtickets.id as generatedTicketID,
                    closedtickets.clientID as name,
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
                   
                    INNER JOIN sla_master ON closedtickets.severity=sla_master.severity_name
                    INNER JOIN campaign_master ON closedtickets.campaign_ID=campaign_master.id
                    INNER JOIN service_master ON closedtickets.process=service_master.id
                   

                    WHERE closedtickets.status !=:status AND closedtickets.campaign_ID=:campaign AND  closedtickets.closed_at >= :from_date AND   closedtickets.closed_at <=:to_date
                               ');

 $this->db->bind(':status', $status);
  $this->db->bind(':campaign', $campaign);
 $this->db->bind(':from_date', $data['from']);
 $this->db->bind(':to_date', $data['to']);
 $results = $this->db->resultSet();
 return $results;
 
}

//-------------------------------------------------------------------------------------------------------------

public function getcloseTickets4($status,$data,$campaign){
$this->db->query('SELECT *,
                  closedtickets.id as generatedTicketID,
                  closedtickets.clientID as name,
                  closedtickets.subject as subject,
                  closedtickets.description as description,
                  sla_master.severity as severity,
                  closedtickets.ticketID as ticketID,
                  closedtickets.status as status,
                  campaign_master.campaignname as campaignname,
                  service_master.servicename as process,
               
                  closedtickets.attachment as attachment,
                  closedtickets.closed_at as created_at
                  FROM closedtickets
                
                  INNER JOIN sla_master ON closedtickets.severity=sla_master.severity_name
                  INNER JOIN campaign_master ON closedtickets.campaign_ID=campaign_master.id
                  INNER JOIN service_master ON closedtickets.process=service_master.id
                 

                  WHERE closedtickets.status !=:status AND closedtickets.campaign_ID=:campaign AND closedtickets.severity=:severity AND closedtickets.created_at between :from_date AND :to_date
                  ORDER BY closedtickets.closed_at DESC
                  ');

$this->db->bind(':status', $status);
$this->db->bind(':from_date', $data['from']);
$this->db->bind(':to_date', $data['to']);
$this->db->bind(':severity', $data['severity']);
$this->db->bind(':campaign', $campaign);
$results = $this->db->resultSet();
return $results;

}

//---------------------------------------------------------------


//-------------------------------------------------------------------------------------------------------------
public function getuserCampaign1($email){
  $this->db->query('SELECT  campaign_id FROM agent_master WHERE  username= :email ');
  $this->db->bind(':email', $email);
  $row = $this->db->single();
    $total = $row->campaign_id;
     return $total;
 
}
//-------------------------------------------------------------------------------------------------
public function updateemailreadstatus($ticketID)
{
$readstatus='0';
$this->db->query('UPDATE emails SET read_status = :readstatus  WHERE ticketID = :ticketID');

$this->db->bind(':readstatus', $readstatus);
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
//--------------------------------------------------------------------------------------------------
public function getunreadEmails($ticketid)
{
	
	$readstatus = "2";
	$this->db->query('SELECT count(read_status) as total from emails where ticketID =:ticketid and read_status =:readstatus');
	$this->db->bind(':ticketid', $ticketid);
	$this->db->bind(':readstatus', $readstatus);
	$row = $this->db->single();
		$total = $row->total;
		return $total;
}

public function getuserCampaignID($email){
  $this->db->query('SELECT  campaign_id FROM agent_master WHERE  username= :email ');
  $this->db->bind(':email', $email);
  $row = $this->db->single();
  $total = $row->campaign_id;
  return $total;
}

public function updatereadstatus($ticketID)
{
$readstatus='0';
$this->db->query('UPDATE tickets SET read_status = :readstatus  WHERE ticketID = :ticketID');

$this->db->bind(':readstatus', $readstatus);
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
//-----------------------------------------------------------------------------------------------------------
public function getuserCampaign($email){
  $this->db->query('SELECT  * FROM agent_master WHERE  username= :email ');
  $this->db->bind(':email', $email);
  $results = $this->db->resultSet();
  return $results;
}
//----------------------------------------------------------------------------------------------------------
public function campaignList($campaign){
  $this->db->query('SELECT *,
                    campaign_master.id as id,
                    campaign_master.campaigntype as campaigntype,
                    campaign_master.campaignID as campaignID,  
                    campaign_master.callscript as callscript,                      
                    campaign_master.campaignname as campaignname,
                    campaign_master.campaigndescrip as campaigndescrip,                        
                    campaign_master.modeofcomm as modeofcomm
                   
                    FROM campaign_master where campaign_master.id= :campaign
                   
                    ');
                     $this->db->bind(':campaign', $campaign);
                    $results = $this->db->resultSet();
                    return $results;
     }
//----------------------------------------------------------------------------------------------------------------
public function getCampaignduration($status, $campaign)
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
                        WHERE tickets.status !=:status AND tickets.l1!=:l1 and campaign_ID=:campaign
                        ORDER BY tickets.created_at DESC
         ');
         $this->db->bind(':status', $status);
         $this->db->bind(':campaign', $campaign);
         $this->db->bind(':l1', $l1);
                     $results = $this->db->resultSet();
                     return $results;
 }

//----------------------------------------------------------------------------------------------------
public function getAssigneeTickets($status, $email)
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
                        WHERE tickets.status !=:status AND tickets.l1!=:l1 and assigned_to=:email
                        ORDER BY tickets.created_at DESC
					  ');
            $this->db->bind(':status', $status);
            $this->db->bind(':email', $email);
            $this->db->bind(':l1', $l1);
                        $results = $this->db->resultSet();
                        return $results;
  
 }
 //--------------------------------------------------------------------------------------------------
 public function CreateKnowledgebase($data){      
  $this->db->query('INSERT INTO knowledge_base (subject,description,keyword,file,version) VALUES(:title ,:description,:keyword,:file,:version)');
  // Bind values
  $this->db->bind(':title', $data['know_title']);
  $this->db->bind(':description', $data['know_description']);
  $this->db->bind(':keyword', $data['keyword']);
  $this->db->bind(':file', $data['file']);
  $this->db->bind(':version', $data['version']);
   
  // Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }

}
//-----------------------------------------------------------------------------------------------------
public function ClosingTickets($flag)
{
 $this->db->query('SELECT *,
                     closedtickets.id as generatedTicketID,
                     closedtickets.clientID as name,
                     closedtickets.subject as subject,
                     closedtickets.description as description,
                     closedtickets.severity as severity,
                     closedtickets.ticketID as ticketID,
                     closedtickets.status as status,
                     closedtickets.closing_status as closing_status,                        
                     closedtickets.closed_at as closed_at
                     FROM closedtickets
                     
                     WHERE closedtickets.closing_status =:flag 
         ');
         $this->db->bind(':flag', $flag);
        
                     $results = $this->db->resultSet();
                     return $results;
 }
//---------------------------------------------------------------------------------------------------
public function criticalticket($status,$critical,$campaign)
	{
	  $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE severity = :critical and status!=:status and campaign_ID=:campaign');
      $this->db->bind(':critical', $critical);
	  $this->db->bind(':status', $status);
	  $this->db->bind(':campaign', $campaign);
		$row = $this->db->single();
		
		 $total = $row->total;
		 return $total;
	}
	
	//..............................................................................
	
	public function highticket($status,$high,$campaign)
	{
	  $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE severity = :high and status!=:status and campaign_ID=:campaign');
      $this->db->bind(':high', $high);
	  $this->db->bind(':status', $status);
	  $this->db->bind(':campaign', $campaign);
		$row = $this->db->single();
		 $total = $row->total;
		 return $total;
	}
	
	//............................................................................................................
	
	public function mediumticket($status,$medium,$campaign)
	{
	  $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE severity = :medium and status!=:status and campaign_ID=:campaign');
      $this->db->bind(':medium', $medium);
	  $this->db->bind(':status', $status);
	   $this->db->bind(':campaign', $campaign);
		$row = $this->db->single();
				 $total = $row->total;
		 return $total;
	}
	
	//................................................................................................................
	
	public function lowticket($status,$low,$campaign)
	{
	  $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE severity = :low and status!=:status and campaign_ID=:campaign');
      $this->db->bind(':low', $low);
	  $this->db->bind(':status', $status);
	  $this->db->bind(':campaign', $campaign);
		$row = $this->db->single();
		$total = $row->total;
		 return $total;
	}
//-----------------------------------------------------------------------------------------------------------
public function sendEmail($data,$uploadPath,$fileName){  
      $user_email=   $_SESSION['email'];   
    $output=$data['description'];   
    $output.='<p>Thanks & Regards,</p>';
     $output.='<p>'. $user_email. '</p>';
    $output.='<p>Futurecalls Helpdesk Team</p>';
    $output.='<p>Note: Do not change the subject line While replying this message</p>';
    $body = $output; 
    $subject = "[". $data['ticketID']."#]" .$data['title'];  
    
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
            $mail->addAttachment($uploadPath, $fileName);
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

   

    $this->db->query('INSERT INTO emails(ticketID,from_email,to_email,subject,description,attachment) VALUES( :ticketID,:from_email,:to_email, :subject, :description,:file)');
    // Bind values
   
    $this->db->bind(':ticketID', $data['ticketID']);
    $this->db->bind(':from_email', $fromemail);
     $this->db->bind(':to_email', $data['email']);
    $this->db->bind(':subject', $data['title']);
    $this->db->bind(':description', $data['description']);
     $this->db->bind(':file', $data['file']);
    // Execute
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
 //print_r($data);die;   
  }
//-----------------------------------------------------------------------------------------------------------
  }