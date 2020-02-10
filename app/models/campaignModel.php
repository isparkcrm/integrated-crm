<?php
use PHPMailer\PHPMailer\PHPMailerAutoload;
use PHPMailer\PHPMailer\Exception;
  class CampaignModel {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

      public function Createcampagin($data){

        $gid = substr($data['campaignname'],0,3);
        date_default_timezone_set('Asia/Kolkata');
        $m = date('h');
         $y = date('i');        
         $campaignID = $gid.$y.$m;

			$this->db->query('INSERT INTO campaign_master (campaigntype,campaignID,campaignname,campaigndescrip,modeofcomm,email) VALUES( :campaigntype, :campaignID,  :campaignname, :campaigndescrip, :modeofcomm,:email)');
      
          $this->db->bind(':campaigntype', $data['campaigntype']);
          $this->db->bind(':campaignID', $campaignID);      
          $this->db->bind(':campaignname', $data['campaignname']);        
          $this->db->bind(':campaigndescrip', $data['campaigndescrip']);        
          $this->db->bind(':modeofcomm', $data['modeofcomm']);        
          $this->db->bind(':email', $data['email']);        
        
		// Execute
          $this->db->execute();
		return true;


    }

    public function findCampaignEmail($email){
  $this->db->query('SELECT * FROM campaign_master WHERE email = :email');
  // Bind value
  $this->db->bind(':email', $email);

  $row = $this->db->single();

  // Check row
  if($this->db->rowCount() > 0){
    return true;
  } else {
    return false;
  }
}

//------------------------------------------------------------------------------------------------------------
    // Find user by email
    public function findClientByName($name){
      $this->db->query('SELECT * FROM client_master WHERE clientname = :name');
      // Bind value
      $this->db->bind(':name', $name);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

//----------------------------------------------------------------------------------------------------------------
    public function getcampaign(){
      $this->db->query('SELECT *,
                        campaign_master.id as id,
                        campaign_master.campaigntype as campaigntype,
                        campaign_master.campaignID as campaignID,  
                        campaign_master.callscript as callscript,                      
                        campaign_master.campaignname as campaignname,
                        campaign_master.campaigndescrip as campaigndescrip,                        
                        campaign_master.modeofcomm as modeofcomm
                       
                        FROM campaign_master
                        ORDER BY campaign_master.created_at ASC
                        ');
                        $results = $this->db->resultSet();
                        return $results;
         }
//---------------------------------------------------------------------------------------------------------------
public function updateCampaign($data)
{
	$this->db->query('UPDATE campaign_master SET campaigntype = :campaigntype,campaignname= :campaignname, campaigndescrip= :campaigndescrip, modeofcomm= :modeofcomm WHERE id = :id');
	
		  $this->db->bind(':campaigntype', $data['campaigntype']);
          $this->db->bind(':campaignname', $data['campaignname']);        
          $this->db->bind(':campaigndescrip', $data['campaigndescrip']);        
          $this->db->bind(':modeofcomm', $data['modeofcomm']);          
          $this->db->bind(':id', $data['id']);       		  

  // Execute
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

public function getCampaignById($id){
  $this->db->query('SELECT * FROM campaign_master WHERE id = :id');
  $this->db->bind(':id', $id);

  $row = $this->db->single();
  return $row;
  if($this->db->rowCount() > 0){
    return true;
  } else {
    return false;
  }
}

//-----------------------------------------------------------------------------------------------------------------

public function insertexcel($data){
	print_r($data);die;
	$this->db->query('INSERT INTO campaign_master(campaigntype,clienttype,clientname,processtype,campaignname,campaigndescrip,modeofcomm) VALUES( :campaigntype, :clienttype,:clientname, :processtype, :campaignname, :campaigndescrip, :modeofcomm)');
		// Execute
        return true;

}

//-----------------------------------------------------------------------------------------------------------------

public function findRoleByName($name){
  $this->db->query('SELECT * FROM role_master WHERE role = :name');
  // Bind value
  $this->db->bind(':name', $name);

  $row = $this->db->single();

  // Check row
  if($this->db->rowCount() > 0){
    return true;
  } else {
    return false;
  }
}

//----------------------------------------------------------------------------------------------------------------

public function roleMaster($data){      
  $this->db->query('INSERT INTO role_master (role) VALUES(:name)');
  // Bind values
  $this->db->bind(':name', $data['name']);
   
  // Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }

}
//----------------------------------------------------------------------------------------------------------------------
public function findClientByID($client_ID){
  $this->db->query('SELECT * FROM client_master WHERE client_ID = :client_ID');
  // Bind value
  $this->db->bind(':client_ID', $client_ID);

  $row = $this->db->single();

  // Check row
  if($this->db->rowCount() > 0){
    return true;
  } else {
    return false;
  }
}
//--------------------------------------------------------------------------------------------------------------------
public function superAdmin($data){    
 $this->db->query('INSERT INTO super_admin (client_ID,role,total_users,concurrent_users) VALUES( :client_ID ,:role,:total,:concurrent)');
  // Bind values
 
  $this->db->bind(':client_ID', $data['client_ID']);
  $this->db->bind(':role', $data['role']);
  $this->db->bind(':total', $data['total']);
  $this->db->bind(':concurrent', $data['concurrent']);
  // Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }

}
//---------------------------------------------------------------------------------------------------------------------
 
public function getRole(){
  $this->db->query('SELECT  role FROM role_master ORDER BY id ASC');
                    $results = $this->db->resultSet();
                    return $results;
     }
 //--------------------------------------------------------------------------------------------------------------
 public function TotalInbound(){
  $this->db->query('SELECT inbound FROM super_admin ');
  // Bind value
 $row = $this->db->single();
  return $row;
}
//--------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------
public function TotalOutbound(){
  $this->db->query('SELECT outbound FROM super_admin ');
  // Bind value
 $row = $this->db->single();
  return $row;
}
//--------------------------------------------------------------------------------------------------------------
public function createdInbound($campaigntype){
  
  $this->db->query('SELECT COUNT(campaigntype) AS total FROM campaign_master Where campaigntype = :campaigntype ');

  // Bind value 
  $this->db->bind(':campaigntype', $campaigntype);
  $result = $this->db->single();

  return $result;
}

//---------------------------------------------------------------------------------------------------------------
public function getUsers($role){
  $this->db->query('SELECT  username,email,role  FROM users WHERE  role!= :role ');
  $this->db->bind(':role', $role);
  $results = $this->db->resultSet();
  return $results;
     }		 

//-------------------------------------------------------------------------------------------------------
public function Createagent($data,$campaign_id)
{
	
	      $username= explode(",",$data['username']);
		  $total = sizeof($username);
		  for($i=0;$i<$total;$i++) 
		  {
			  $username1 = $username[$i];
			 $query = $this->db->query('SELECT role FROM users WHERE email = :username');
			  $this->db->bind(':username', $username1);
			  $row = $this->db->single();
			$userrole1 = $row->role;
			  
			  $this->db->query('INSERT INTO agent_master(campaign_id,username,role) VALUES(:id, :username1,:role)');
			  $this->db->bind(':username1', $username1);
			  $this->db->bind(':id', $campaign_id);
			  $this->db->bind(':role', $userrole1);
			  $this->db->execute();
		  }
		return true;
}


//----------------------------------------------------------------------------------------------------------------

public function getAgent($campaignID)
{
  $this->db->query('SELECT a.agent_id,a.username,b.id,b.username,b.email,b.number from agent_master as a, users as b where a.username=b.email AND a.campaign_id=:campaignID' );
  $this->db->bind(':campaignID', $campaignID);
	$results = $this->db->resultSet();
	return $results;
}

//----------------------------------------------------------------------------------------------------------------

function agentdelete($id)
{
  $this->db->query('DELETE from agent_master WHERE agent_id= :id');
 
      $this->db->bind(':id', $id);
    // Execute
      $this->db->execute();
return true;
}
//-----------------------------------------------------------------------------------------------------------------
public function getclient($campaignID)
{
  $this->db->query('SELECT a.id, a.clientID,b.clientname,b.contact_person,b.number from campaign_client as a, client_master as b where a.clientID=b.client_ID AND a.campaign_id=:campaignID' );
  $this->db->bind(':campaignID', $campaignID);
	$results = $this->db->resultSet();
	return $results;
}
//-----------------------------------------------------------------------------------------------------------------
public function Createclient($data,$campaign_id)
{
	    
			  $this->db->query('INSERT INTO campaign_client(campaign_id,clientID,process) VALUES(:id, :username,:service)');
			  $this->db->bind(':username',$data['username']);
        $this->db->bind(':id', $campaign_id);     
        $this->db->bind(':service', $data['service']);       
			  $this->db->execute();
		
		return true;
}

public function getassignedcall($email,$donotcall,$notinterested,$closed)
{
	 $this->db->query('select a.id,a.assigning, a.name,a.mobile,a.remarks,a.assigning,a.call_status,a.call_date,a.call_time,a.attempt,b.campaignname,b.campaigndescrip from outbound_campaign as a, campaign_master as b where a.campaign_id=b.id and a.assigning = :email and a.call_status !=:donotcall and a.call_status!=:notinterested and a.call_status !=:closed');
	 
	 $this->db->bind(':email', $email);			
	 $this->db->bind(':donotcall', $donotcall);			
	 $this->db->bind(':notinterested', $notinterested);			
	 $this->db->bind(':closed', $closed);	
	 $results = $this->db->resultSet(); 
	 return $results;
}
//-------------------------------------------------------------------------------------------------------------------
function clientRemove($id)
{
  $this->db->query('DELETE from campaign_client WHERE id= :id');
 
      $this->db->bind(':id', $id);
    // Execute
      $this->db->execute();
return true;
}
//------------------------------------------------------------------------------------------------------------------
public function getService(){
  $this->db->query('SELECT  id,servicename FROM service_master ORDER BY id ASC');
                    $results = $this->db->resultSet();
                    return $results;
     }
//------------------------------------------------------------------------------------------------------------------


//-----------------------------------------------------------------------------------------------------------------
public function getProcess($campaignID)
{
  $this->db->query('SELECT *,
  campaign_service.id as id,
   service_master.servicename as service
  from campaign_service 
  
  INNER JOIN service_master ON campaign_service.service =service_master.id
   where campaign_id=:campaignID' );

  $this->db->bind(':campaignID', $campaignID);
	$results = $this->db->resultSet();
	return $results;
}
//-----------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------

public function getoutbound($donotcall=false,$notinterested=false,$closed=false)
{
    $this->db->query('SELECT a.id,a.campaign_id, b.callscript, a.name,a.mobile,a.remarks,a.call_status,a.call_date,a.call_time,a.attempt FROM outbound_campaign as a, campaign_master as b where a.campaign_id=b.id and a.call_status !=:donotcall and a.call_status!=:notinterested and a.call_status !=:closed');
  $this->db->bind(':donotcall', $donotcall);			
  $this->db->bind(':notinterested', $notinterested);			
  $this->db->bind(':closed', $closed);	
  $results = $this->db->resultSet();
  return $results;
 }	
//-------------------------------------------------------------------------------------------------------------- 

public function gethistory()
{
  $this->db->query('SELECT * FROM outbound_history');
  $results = $this->db->resultSet();
  return $results;
}
   
//---------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------

public function getattempt($id){
$this->db->query('select id,attempt from outbound_campaign where id=:id');
$this->db->bind(':id', $id);
$results = $this->db->resultSet(); 
 return $results;
}
//---------------------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------------------

public function insertoutboundhistory($data)
{
$this->db->query('INSERT INTO outbound_history (outboundrow_id,campaign_id,call_status,call_date,call_time,remarks,attempt) VALUES (:id,:campaign_id,:callstatus,:calldate,:calltime,:remarks,:attempt)');
$this->db->bind('id', $data['id']);
$this->db->bind('campaign_id', $data['campaign_id']);
$this->db->bind(':callstatus', $data['callstatus']);
$this->db->bind(':calldate', $data['calldate']);
$this->db->bind(':calltime', $data['calltime']);
$this->db->bind(':remarks', $data['remarks']);
$this->db->bind(':attempt', $data['attempt']);
if($this->db->execute()){
  return true;
} else {
  return false;
}

}

//-----------------------------------------------------------------------------------------------------------------

//----------------------------------------------------------------------------------------------------


public function updatecallstatus($data)
{
 $this->db->query('UPDATE outbound_campaign SET assigning = :email, call_status = :callstatus,call_date = :calldate,call_time = :calltime,remarks = :remarks,attempt = :attempt WHERE id = :id');
$this->db->bind(':id', $data['id']);
$this->db->bind(':email', $data['email']);
$this->db->bind(':callstatus', $data['callstatus']);
$this->db->bind(':calldate', $data['calldate']);
$this->db->bind(':calltime', $data['calltime']);
$this->db->bind(':remarks', $data['remarks']);
$this->db->bind(':attempt', $data['attempt']);
if($this->db->execute()){
  return true;
} else {
  return false;
} 
}

//--------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------
public function getcallduration()
{
  $this->db->query('SELECT *,
  call_distribution.id as id,
  call_distribution.mobile as mobile,
  call_distribution.call_status,
  call_distribution.remark FROM call_distribution');
  $results = $this->db->resultSet();
  return $results;
  
}
//------------------------------------------------------------------------------------------------------------------
public function getcallsById($id)
{
  $this->db->query('SELECT a.id,a.campaign_id,a.name,a.callscript,a.mobile,call_status,a.remarks, b.campaignname FROM outbound_campaign as a, campaign_master as b WHERE a.id = :id and a.campaign_id = b.id');
  $this->db->bind(':id', $id);
  $row = $this->db->single();
  return $row;
}

//------------------------------------------------------------------------------------------------------------------
public function findService($service,$campaign_id)
{
  $this->db->query('SELECT * FROM campaign_service   WHERE service_id = :service and campaign_id != :campaign_id');
  $this->db->bind(':service', $service);
  $this->db->bind(':campaign_id', $campaign_id);
  $row = $this->db->single();

  // Check row
  if($this->db->rowCount() > 0){
    return true;
  } else {
    return false;
  }
}


//------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------
public function CheckService($service,$username)
{
  $this->db->query('SELECT * FROM campaign_client   WHERE process = :service and clientID = :username');
  $this->db->bind(':service', $service);
  $this->db->bind(':username', $username);
  $row = $this->db->single();

  // Check row
  if($this->db->rowCount() > 0){
    return true;
  } else {
    return false;
  }
}


//------------------------------------------------------------------------------------------------------------------
public function getcommunication(){
  $this->db->query('SELECT *,
                   escalation_master.id as id,
                   campaign_master.campaignname as campaign,
                   escalation_master.level as level,
                   escalation_master.name as name,
                   escalation_master.email as email,                
                   escalation_master.number as number
                    FROM  escalation_master
					
					INNER JOIN campaign_master ON  escalation_master.campaign =campaign_master.id
                    ORDER BY  escalation_master.id ASC
                    ');
                    $results = $this->db->resultSet();
                   return $results;
     }
//--------------------------------------------------------------------------------------------------------
public function EscalationMaster($data){  
  
 
  $level = explode(",",$data['Level']);
  $name = explode(",",$data['name']);
  $email= explode(",",$data['email']);
  $number = explode(",",$data['number']);
  
  
  $total = sizeof($level);
  
  for($i=0;$i<$total;$i++) {
  
      $level1 = $level[$i];
      $name1 = $name[$i];
      $email1 = $email[$i];
      $number1 = $number[$i];
       
      $this->db->query('INSERT INTO escalation_master (campaign,level,name,email,number) VALUES(:campaign , :level,:name, :email,:number)');
      // Bind values
     
      $this->db->bind(':campaign', $data['campaign']);
     
      $this->db->bind(':level', $level1);
      $this->db->bind(':name', $name1);
      $this->db->bind(':email', $email1);
      $this->db->bind(':number', $number1);
          
      // Execute
      $this->db->execute();
        
  }
  return true;
  
  
  }
//--------------------------------------------------------------------------------------------------------
public function getCampaignName(){
  $this->db->query('SELECT  id,campaignname FROM campaign_master ORDER BY id ASC');
                    $results = $this->db->resultSet();
                    return $results;
     }
//-----------------------------------------------------------------------------------------------
public function getSlaName(){
  $this->db->query('SELECT  severity,severity_name FROM sla_master ORDER BY id ASC');
                    $results = $this->db->resultSet();
                    return $results;
     }
//-----------------------------------------------------------------------------------------------
public function UpdateEscalation($data){

  $this->db->query('UPDATE escalation_master SET name = :name, email=:email, number=:number  WHERE id = :id');
  // Bind values      
  $this->db->bind(':id', $data['id']);
  $this->db->bind(':name', $data['name']);
  $this->db->bind(':email', $data['email']);
  $this->db->bind(':number', $data['number']); 
 
   // Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}
//-----------------------------------------------------------------------------------------------------------

public function getEscalationById($id){
  $this->db->query('SELECT * FROM escalation_master WHERE id = :id');
  $this->db->bind(':id', $id);

  $row = $this->db->single();

  return $row;
  if($this->db->rowCount() > 0){
    return true;
  } else {
    return false;
  }
}
//-------------------------------------------------------------------------------------------------------

public function clicktoCall($url){
  $ch = curl_init();
									curl_setopt($ch, CURLOPT_HEADER, false);
									curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
									curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
									curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
									curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
									curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
									curl_setopt($ch, CURLOPT_URL, $url);
									$response = curl_exec($ch);
									curl_close($ch);
									$response1 = json_decode($response); 
									print_r($response); 
}
//-------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------
public function ServiceList(){
  $this->db->query('SELECT id,servicename FROM service_master' );  
  $results = $this->db->resultSet();
  return $results;
     }    
//-------------------------------------------------------------------------------------------------------
public function getcampaignService($campaignID)
{
  $this->db->query('SELECT *,
                        campaign_service.id as id,
                        campaign_master.campaignname as name,
                        campaign_service.servicename as service
                       
                        FROM campaign_service
                        INNER JOIN campaign_master ON campaign_service.campaign_id=campaign_master.id                              

                        WHERE campaign_service.campaign_id =:campaignID 
                     
                        ');
    $this->db->bind(':campaignID', $campaignID);
  $results = $this->db->resultSet();
  return $results;
  
  }
//-------------------------------------------------------------------------------------------------------
public function CreatService($data,$campaign_id)
{
       
        $username= explode(",",$data['service']);
      $total = sizeof($username);
      for($i=0;$i<$total;$i++) 
      {
        $username1 = $username[$i];
         $this->db->query('SELECT servicename FROM service_master WHERE id = :id');
        $this->db->bind(':id', $username1);
        $row = $this->db->single();
      $userrole1 = $row->servicename;  
        
        $this->db->query('INSERT INTO campaign_service (campaign_id,service_id,servicename) VALUES(:id, :service_id,:servicename)');
      
        $this->db->bind(':service_id', $username1);
        $this->db->bind(':id', $campaign_id);
        $this->db->bind(':servicename', $userrole1);
        $this->db->execute();
      }
    
    return true;
}

//----------------------------------------------------------------------------------------------------

function servicedelete($id)
{
  $this->db->query('DELETE from campaign_service WHERE  id= :id');
 
      $this->db->bind(':id', $id);
    // Execute
      $this->db->execute();
return true;
}
//-------------------------------------------------------------------------------------------------------
//--------------------------------- User Wise report Functions ------------------------------------------
  
    public function countuser(){
      $this->db->query('SELECT  COUNT(id) AS total FROM users');
      $row = $this->db->single();
      $username= $row->total;
     //print_r($camapignID);die;
      return $username;
      }
//------------------------------------------------------------------------------------------------------
        public function username($i){
      $this->db->query('SELECT username FROM users WHERE id=:id');
        $this->db->bind(':id', $i);
      $row = $this->db->single();
      $camapignID = $row->username;
     //print_r($camapignID);die;
      return $camapignID;
      }
//--------------------------------------------------------------------------------------------------
        public function username1($email){
      $this->db->query('SELECT username FROM users WHERE email=:id');
        $this->db->bind(':id', $email);
      $row = $this->db->single();
      $camapignID = $row->username;
     //print_r($camapignID);die;
      return $camapignID;
      }
//--------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
        public function useremail($i){
      $this->db->query('SELECT email FROM users WHERE id=:id');
        $this->db->bind(':id', $i);
      $row = $this->db->single();
      $camapignID = $row->email;
     //print_r($camapignID);die;
      return $camapignID;
      }
//--------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
        public function userrole($i){
      $this->db->query('SELECT role FROM users WHERE id=:id');
        $this->db->bind(':id', $i);
      $row = $this->db->single();
      $camapignID = $row->role;
     //print_r($camapignID);die;
      return $camapignID;
      }
//--------------------------------------------------------------------------------------------------
       public function useropen($email){
        $status ="close";
      $this->db->query('SELECT COUNT(status) AS total FROM tickets WHERE assigned_to=:email AND status!=:status');
       $this->db->bind(':email', $email);
          $this->db->bind(':status', $status);
      $row = $this->db->single();
      $camapignID = $row->total;
     //print_r($camapignID);die;
      return $camapignID;
      }
//-------------------------------------------------------------------------------------------------------------
       public function userclose($email){
        $status ="close";
      $this->db->query('SELECT COUNT(status) AS total FROM closedtickets WHERE assigned_to=:email AND status=:status');
       $this->db->bind(':email', $email);
          $this->db->bind(':status', $status);
      $row = $this->db->single();
      $camapignID = $row->total;
     //print_r($camapignID);die;
      return $camapignID;
      }
//-------------------------------------------------------------------------------------------------------------
       public function useropentoday($email){
        $status ="close";
      $this->db->query('SELECT COUNT(status) AS total FROM tickets WHERE assigned_to=:email AND status!=:status  AND  DAY(created_at) = DAY(NOW())');
       $this->db->bind(':email', $email);
          $this->db->bind(':status', $status);
      $row = $this->db->single();
      $camapignID = $row->total;
    // print_r($camapignID);die;
      return $camapignID;
      }
//-------------------------------------------------------------------------------------------------------------
       public function userclosetoday($email){
        $status ="close";
      $this->db->query('SELECT COUNT(status) AS total FROM closedtickets WHERE assigned_to=:email AND status=:status  AND  DAY(closed_at) = DAY(NOW())');
       $this->db->bind(':email', $email);
          $this->db->bind(':status', $status);
      $row = $this->db->single();
      $camapignID = $row->total;
    // print_r($camapignID);die;
      return $camapignID;
      }
//-------------------------------------------------------------------------------------------------------------  
       public function usercritical($email){
        $status ="close";
        $severity="P1";
      $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE assigned_to=:email  AND status!=:status AND severity=:severity');
       $this->db->bind(':email', $email);
          $this->db->bind(':status', $status);
         $this->db->bind(':severity', $severity);
         
      $row = $this->db->single();
      $camapignID = $row->total;
    // print_r($camapignID);die;
      return $camapignID;
      }
//------------------------------------------------------------------------------------------------------------- 
       public function userhigh($email){
        $status ="close";
        $severity="P2";
      $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE assigned_to=:email AND status!=:status AND severity=:severity');
      $this->db->bind(':email', $email);
          $this->db->bind(':status', $status);
         $this->db->bind(':severity', $severity);   
      $row = $this->db->single();
      $camapignID = $row->total;
    // print_r($camapignID);die;
      return $camapignID;
      }
//-------------------------------------------------------------------------------------------------------------
     public function usermedium($email){
        $status ="close";
        $severity="P3";
      $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE assigned_to=:email AND status!=:status AND severity=:severity');
       $this->db->bind(':email', $email);
          $this->db->bind(':status', $status);
         $this->db->bind(':severity', $severity);   
      $row = $this->db->single();
      $camapignID = $row->total;
    // print_r($camapignID);die;
      return $camapignID;
      }
//-------------------------------------------------------------------------------------------------------------
       public function userlow($email){
        $status ="close";
        $severity="P4";
      $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE assigned_to=:email AND status!=:status AND severity=:severity');
       $this->db->bind(':email', $email);
          $this->db->bind(':status', $status);
         $this->db->bind(':severity', $severity);   
      $row = $this->db->single();
      $camapignID = $row->total;
    // print_r($camapignID);die;
      return $camapignID;
      }
//------------------------------------------------------------------------------------------------------------- 
         public function usersla($email){
        $status ="Close";
       
        $time="0";
      $this->db->query('SELECT COUNT(l1) AS total FROM tickets WHERE assigned_to=:email  AND status!=:status AND l1!=:time');
       $this->db->bind(':email', $email);;
          $this->db->bind(':status', $status);
         $this->db->bind(':time', $time);   
      $row = $this->db->single();
      $camapignID = $row->total;
    // print_r($camapignID);die;
      return $camapignID;
      }
    
//-------------------------------------------------------------------------------------------------------------
//*********************************************  date wise filter Report ***************************************
//-------------------------------------------------------------------------------------------------------------
  public function useropenDate($email,$from,$to){
        $status ="close";
      $this->db->query('SELECT COUNT(status) AS total FROM tickets WHERE assigned_to=:email AND status!=:status AND created_at >= :from_date AND  created_at <=:to_date
                                 ');

  
   $this->db->bind(':from_date', $from);
   $this->db->bind(':to_date', $to);
       $this->db->bind(':email', $email);
          $this->db->bind(':status', $status);
      $row = $this->db->single();
      $camapignID = $row->total;
     //print_r($camapignID);die;
      return $camapignID;
      }
//-------------------------------------------------------------------------------------------------------------
       public function usercloseDate($email,$from,$to){
        $status ="close";
      $this->db->query('SELECT COUNT(status) AS total FROM closedtickets WHERE assigned_to=:email AND status=:status AND closed_at >= :from_date AND  closed_at <=:to_date');
      $this->db->bind(':from_date', $from);
      $this->db->bind(':to_date', $to);
       $this->db->bind(':email', $email);
          $this->db->bind(':status', $status);
      $row = $this->db->single();
      $camapignID = $row->total;
     //print_r($camapignID);die;
      return $camapignID;
      }
//-------------------------------------------------------------------------------------------------------------
       public function useropentodayDate($email,$from,$to){
        $status ="close";
      $this->db->query('SELECT COUNT(status) AS total FROM tickets WHERE assigned_to=:email AND status!=:status  AND  DAY(created_at) = DAY(NOW())');
       $this->db->bind(':email', $email);
          $this->db->bind(':status', $status);
      $row = $this->db->single();
      $camapignID = $row->total;
    // print_r($camapignID);die;
      return $camapignID;
      }
//-------------------------------------------------------------------------------------------------------------
       public function userclosetodayDate($email,$from,$to){
        $status ="close";
      $this->db->query('SELECT COUNT(status) AS total FROM closedtickets WHERE assigned_to=:email AND status=:status  AND  DAY(closed_at) = DAY(NOW())');
       $this->db->bind(':email', $email);
          $this->db->bind(':status', $status);
      $row = $this->db->single();
      $camapignID = $row->total;
    // print_r($camapignID);die;
      return $camapignID;
      }
//-------------------------------------------------------------------------------------------------------------  
       public function usercriticalDate($email,$from,$to){
        $status ="close";
        $severity="P1";
      $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE assigned_to=:email  AND status!=:status AND severity=:severity AND created_at >= :from_date AND  created_at <=:to_date
                                 ');

  
   $this->db->bind(':from_date', $from);
   $this->db->bind(':to_date', $to);
       $this->db->bind(':email', $email);
          $this->db->bind(':status', $status);
         $this->db->bind(':severity', $severity);
         
      $row = $this->db->single();
      $camapignID = $row->total;
    // print_r($camapignID);die;
      return $camapignID;
      }
//------------------------------------------------------------------------------------------------------------- 
       public function userhighDate($email,$from,$to){
        $status ="close";
        $severity="P2";
      $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE assigned_to=:email AND status!=:status AND severity=:severity AND created_at >= :from_date AND  created_at <=:to_date
                                 ');

  
   $this->db->bind(':from_date', $from);
   $this->db->bind(':to_date', $to);
      $this->db->bind(':email', $email);
          $this->db->bind(':status', $status);
         $this->db->bind(':severity', $severity);   
      $row = $this->db->single();
      $camapignID = $row->total;
    // print_r($camapignID);die;
      return $camapignID;
      }
//-------------------------------------------------------------------------------------------------------------
     public function usermediumDate($email,$from,$to){
        $status ="close";
        $severity="P3";
      $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE assigned_to=:email AND status!=:status AND severity=:severity AND created_at >= :from_date AND  created_at <=:to_date
                                 ');  
   $this->db->bind(':from_date', $from);
   $this->db->bind(':to_date', $to);
       $this->db->bind(':email', $email);
          $this->db->bind(':status', $status);
         $this->db->bind(':severity', $severity);   
      $row = $this->db->single();
      $camapignID = $row->total;
    // print_r($camapignID);die;
      return $camapignID;
      }
//-------------------------------------------------------------------------------------------------------------
       public function userlowDate($email,$from,$to){
        $status ="close";
        $severity="P4";
      $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE assigned_to=:email AND status!=:status AND severity=:severity AND created_at >= :from_date AND  created_at <=:to_date
                                  ');

  
   $this->db->bind(':from_date', $from);
   $this->db->bind(':to_date', $to);
       $this->db->bind(':email', $email);
          $this->db->bind(':status', $status);
         $this->db->bind(':severity', $severity);   
      $row = $this->db->single();
      $camapignID = $row->total;
    // print_r($camapignID);die;
      return $camapignID;
      }
//------------------------------------------------------------------------------------------------------------- 
         public function userslaDate($email,$from,$to){
        $status ="Close";
       
        $time="0";
      $this->db->query('SELECT COUNT(l1) AS total FROM tickets WHERE assigned_to=:email  AND status!=:status AND l1!=:time AND created_at >= :from_date AND  created_at <=:to_date
                                 ');

  
   $this->db->bind(':from_date', $from);
   $this->db->bind(':to_date', $to);;
       $this->db->bind(':email', $email);;
          $this->db->bind(':status', $status);
         $this->db->bind(':time', $time);   
      $row = $this->db->single();
      $camapignID = $row->total;
    // print_r($camapignID);die;
      return $camapignID;
      }
    
//-------------------------------------------------------------------------------------------------------------
public function getuserName(){
  $this->db->query('SELECT  username,email FROM users ORDER BY id ASC');
                    $results = $this->db->resultSet();
                    return $results;
     }
//------------------------------------------------------------------------------------------------------------

}
