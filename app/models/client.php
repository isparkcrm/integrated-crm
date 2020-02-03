<?php
use PHPMailer\PHPMailer\PHPMailerAutoload;
use PHPMailer\PHPMailer\Exception;
  class Client {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Regsiter user

   
    public function Onboard($data){    
       $gid = substr($data['name'],0,3);
      date_default_timezone_set('Asia/Kolkata');
      $m = date('h');
       $y = date('i');      
       $client_ID = $gid.$y.$m;

      $this->db->query('INSERT INTO client_master (clientname,client_ID,contact_person,number,start_date,end_date,support_time,documents) VALUES(:name, :client_ID ,:person,:number,:date1,:date2,:support_time,:file)');
      // Bind values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':client_ID', $client_ID);
      $this->db->bind(':person', $data['person']);
      $this->db->bind(':number', $data['number']);
      $this->db->bind(':date1', $data['date1']);
      $this->db->bind(':date2', $data['date2']);  
      $this->db->bind(':support_time', $data['support_time']);          
      $this->db->bind(':file', $data['file']);  
     
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    
      
      }
      //---------------------------------------------------------------------------------------------
      public function Insertservice($data){    
        $gid = substr($data['name'],0,3);
       date_default_timezone_set('Asia/Kolkata');
       $m = date('h');
        $y = date('i');      
        $client_ID = $gid.$y.$m;
        $service = explode(",",$data['service']);
        $total = sizeof($service);
      
        for($i=0;$i<$total;$i++) {
        
            $service1 = $service[$i];   
   $this->db->query('SELECT id FROM service_master WHERE servicename = :service1 ');
   $this->db->bind(':service1', $service1);  
   $row = $this->db->single();
    $id=$row->id;
     $this->db->query('INSERT INTO client_service (client_ID,service,service_id) VALUES(:client_ID ,:service1, :service_id)');
       $this->db->bind(':client_ID', $client_ID);
       $this->db->bind(':service1', $service1);  
       $this->db->bind(':service_id', $id);  
      $this->db->execute();
       
       }
       return true;
       
       }	  

//----------------------------------------------------------------------------------------------
      public function ClientLocation($data){    
      
      
        $gid = substr($data['name'],0,3);
        date_default_timezone_set('Asia/Kolkata');
        $m = date('h');
         $y = date('i');        
         $client_ID = $gid.$y.$m;
      
      $location = explode(",",$data['location']);
      $time = explode(",",$data['time']);
      $days= $data['support_days'];
      
      $total = sizeof($location);
      
      for($i=0;$i<$total;$i++) {
      
          $location1 = $location[$i];
          $time1 = $time[$i];
        
      
          $this->db->query('INSERT INTO client_location (client_ID,location,support_time,support_days) VALUES( :client_ID ,:location1, :time1,:days)');
          // Bind values
         
          $this->db->bind(':client_ID', $client_ID);
          $this->db->bind(':location1', $location1);
          $this->db->bind(':time1', $time1);
          $this->db->bind(':days', $days);        
         
          // Execute
          $this->db->execute();
            
      }
      return true;


    }
//--------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------
public function getallservice($id)
{
	$query = $this->db->query('SELECT * FROM client_service WHERE client_ID = :id ');
	$this->db->bind(':id', $id);
	$data['service'] = $this->db->resultSet();
	$query1 = $this->db->query('SELECT * FROM users  WHERE usertype = :id ');
	$this->db->bind(':id', $id);
	$data['email'] = $this->db->resultSet();
	return $data;
	
}
public function getservices($id)
{
	$this->db->query('SELECT * FROM client_service WHERE client_id = :id ');
  $this->db->bind(':id', $id);
  $results = $this->db->resultSet();
	return $results;
}

public function getemail($id)
{
	 $this->db->query('SELECT * FROM users WHERE usertype = :email');
	 $this->db->bind(':id', $id);
	 $results = $this->db->resultSet();
	 return $results;
}

//-----------------------------------------------------------------------------------------------
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
    public function getClient(){
      $this->db->query('SELECT *,
                        client_master.id as id,
                        client_master.clientname as name,
                        client_master.contact_person as person,
                        client_master.number as number,
                        client_master.start_date as date1,
                        client_master.end_date as date2,
                        client_master.support_time as service,                        
                        client_master.support_type as support_type
                        FROM client_master
                        ORDER BY client_master.created_at DESC
                        ');
                        $results = $this->db->resultSet();
                        return $results;
         }
//---------------------------------------------------------------------------------------------------------------
public function updateClient($data){
  $this->db->query('UPDATE client_master SET clientname = :name, contact_person= :person, number = :number ,start_date=:date1,end_date=:date2  WHERE id = :id');
  // Bind values      
  $this->db->bind(':id', $data['id']);
  $this->db->bind(':name', $data['name']);
  $this->db->bind(':person', $data['person']);
  $this->db->bind(':number', $data['number']);  
  $this->db->bind(':date1', $data['date1']);
  $this->db->bind(':date2', $data['date2']);     
 

  // Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}
//-----------------------------------------------------------------------------------------------------------
 public function updateClientService($data){    
        $clientID=$data['clientID'];
        $service = explode(",",$data['service']);
        $total = sizeof($service);
      
        for($i=0;$i<$total;$i++) {
        
            $service1 = $service[$i];   
   $this->db->query('SELECT id FROM service_master WHERE servicename = :service1 ');
   $this->db->bind(':service1', $service1);  
   $row = $this->db->single();
    $id=$row->id;
     $this->db->query('INSERT INTO client_service (client_ID,service,service_id) VALUES(:client_ID ,:service1, :service_id)');
       $this->db->bind(':client_ID', $clientID);
       $this->db->bind(':service1', $service1);  
       $this->db->bind(':service_id', $id);  
      $this->db->execute();
       
       }
       return true;
       
       }	  
//----------------------------------------------------------------------------------------------------------------

function clientdelete($id)
{
  $this->db->query('DELETE from client_master WHERE id= :id');
 
      $this->db->bind(':id', $id);
    // Execute
      $this->db->execute();
return true;
}
//-----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------

function deleteClientService($clientID)
{
  $this->db->query('DELETE from client_service WHERE client_ID= :clientID');
 
      $this->db->bind(':clientID', $clientID);
    // Execute
      $this->db->execute();
return true;
}
//-----------------------------------------------------------------------------------------------------------------

public function getClientById($id){
  $this->db->query("SELECT a.id,a.clientname,a.contact_person,a.number,a.documents,a.client_ID,a.start_date,a.end_date,a.support_time,a.support_type,(select GROUP_CONCAT(b.service SEPARATOR ',')) as service FROM client_master as a, client_service as b WHERE a.id = :id and a.client_ID=b.client_ID group by a.client_ID");
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
public function findClientByID($client_ID,$process){
  $this->db->query('SELECT * FROM sla_config WHERE client_ID = :client_ID AND process= :process' );
  // Bind value
  $this->db->bind(':client_ID', $client_ID);
  $this->db->bind(':process', $process);

  $row = $this->db->single();

  // Check row
  if($this->db->rowCount() > 0){
    return true;
  } else {
    return false;
  }
}
//--------------------------------------------------------------------------------------------------------------------
public function superAdmin($data, $qEncoded,$qEncoded1, $qEncoded2,$qEncoded3){    
 $this->db->query('INSERT INTO super_admin (client_name,total_users,concurrent_users,inbound,outbound) VALUES( :client_name ,:total,:concurrent, :inbound,:outbound)');
  // Bind values
 
  $this->db->bind(':client_name', $data['client_name']);  
  $this->db->bind(':total', $qEncoded);
  $this->db->bind(':concurrent', $qEncoded1);
  $this->db->bind(':inbound', $qEncoded2);
  $this->db->bind(':outbound', $qEncoded3);
  // Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }

}
//----------------------------------------------------------------------------------------------------------------
public function RoleBasedUsers($data){    
  
$role = explode(",",$data['role']);
$total_users = explode(",",$data['total1']);
$concurrent_users= explode(",",$data['concurrent1']);

$total = sizeof($role);

for($i=0;$i<$total;$i++) {

    $role1 = $role[$i];
    $total_users1 = $total_users[$i];
    $concurrent1= $concurrent_users[$i];

    $this->db->query('INSERT INTO rolebased_user(client_name,role,total_user) VALUES( :client_name ,:role1, :total_users1)');
    // Bind values
   
    $this->db->bind(':client_name',$data['client_name']);
    $this->db->bind(':role1', $role1);
    $this->db->bind(':total_users1', $total_users1);
         
   
    // Execute
    $this->db->execute();
      
}
return true;


}

//---------------------------------------------------------------------------------------------------------------------
 
public function getRole(){
  $this->db->query('SELECT  role FROM role_master ORDER BY id ASC');
                    $results = $this->db->resultSet();
                    return $results;
     }



//-----------------------------------------------------------------------------------------------------------------
public function getClientID(){
  $this->db->query('SELECT  client_ID FROM client_master ORDER BY id ASC');
                    $results = $this->db->resultSet();
                    return $results;
     }


//-----------------------------------------------------------------------------------------------------------------
public function getClientName(){
  $this->db->query('SELECT  clientname,client_ID  FROM client_master ORDER BY id ASC');
                    $results = $this->db->resultSet();
                    return $results;
     }

//---------------------------------------------------------------------------------------------------------------
public function slaMaster($data){    
 
$severity = explode(",",$data['severity']);
$l1 = explode(",",$data['l1']);
$l2 = explode(",",$data['l2']);
$l3 = explode(",",$data['l3']);
$l4 = explode(",",$data['l4']);

$total = sizeof($severity);

for($i=0;$i<$total;$i++) {

    $severity1 = $severity[$i];
    $level1 = $l1[$i];
    $level2 = $l2[$i];
    $level3 = $l3[$i];
    $level4 = $l4[$i];
    

    $this->db->query('INSERT INTO sla_config (client_ID,process,severity,l1,l2,l3,l4) VALUES( :client_ID , :process,:severity1, :level1,:level2, :level3, :level4)');
    // Bind values
   
    $this->db->bind(':client_ID', $data['client_ID']);
    $this->db->bind(':process', $data['process']);
    $this->db->bind(':severity1', $severity1);
    $this->db->bind(':level1', $level1);
    $this->db->bind(':level2', $level2);
    $this->db->bind(':level3', $level3);
    $this->db->bind(':level4', $level4);
  
   
    // Execute
    $this->db->execute();
      
}
return true;


}
//-----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
public function getSlaList(){
  $this->db->query('SELECT *,
                   sla_config.id as id,
                    client_master.clientname as name,
                    service_master.servicename as service,
                    sla_master.severity as severity,
                    sla_config.l1 as level1,
                    sla_config.l2 as level2,
                    sla_config.l3 as level3,
                    sla_config.l4 as level4
                    FROM sla_config

                   INNER JOIN client_master ON sla_config.client_ID=client_master.client_ID
                   INNER JOIN sla_master ON sla_config.severity=sla_master.severity_name                  
                   INNER JOIN service_master ON sla_config.process=service_master.id
                        
                    ');
                    $results = $this->db->resultSet();
                    return $results;  
     }
//---------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------

public function getSlaconfigById($id){
  $this->db->query('SELECT * FROM sla_config
   WHERE id = :id');
  $this->db->bind(':id', $id);

  $row = $this->db->single();

  return $row;
  if($this->db->rowCount() > 0){
    return true;
  } else {
    return false;
  }
}
//----------------------------------------------------------------------------------------------------------------
public function UpdateslaMaster($data){

  //Print_r($data);die;
  $this->db->query('UPDATE sla_config SET l1 = :l1, l2=:l2, l3=:l3, l4=:l4  WHERE id = :id');
  // Bind values      
  $this->db->bind(':id', $data['id']);
  $this->db->bind(':l1', $data['l1']);
  $this->db->bind(':l2', $data['l2']);
  $this->db->bind(':l3', $data['l3']); 
  $this->db->bind(':l4', $data['l4']); 
 
   // Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}
//-----------------------------------------------------------------------------------------------------------------
public function ClientName($client_ID)
{
  
	  $this->db->query('SELECT clientname FROM client_master WHERE client_ID = :client_ID');
      $this->db->bind(':client_ID', $client_ID);
	 
	  
		$row = $this->db->single();
		
		 $total = $row->clientname;
		 return $total;
	}
	
//-----------------------------------------------------------------------------------------------------------------
public function ServicetName($service_id)
{
 
	  $this->db->query('SELECT servicename FROM service_master WHERE id = :service_id');
      $this->db->bind(':service_id', $service_id);
	 
	  
		$row = $this->db->single();
		
		 $total = $row->servicename;
		 return $total;
	}
	
//-----------------------------------------------------------------------------------------------------------------

public function UpdateService($data){
  $this->db->query('UPDATE service_master SET servicename = :servicename, description= :description WHERE id = :id');
  // Bind values      
  $this->db->bind(':id', $data['id']);
  $this->db->bind(':servicename', $data['servicename']);
  $this->db->bind(':description', $data['description']);
  
  // Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}

//-------------------------------------------------------------------------------------------------------------

public function getServiceById($id)
{
  $this->db->query('SELECT * FROM service_master WHERE id = :id');
  $this->db->bind(':id', $id);
  $row = $this->db->single();
  return $row;
  if($this->db->rowCount() > 0){
    return true;
  } else {
    return false;
  }
}

//-------------------------------------------------------------------------------------------------------------
public function ServiceMaster($data){      
  $this->db->query('INSERT INTO service_master (servicename,description) VALUES(:servicename ,:description)');
  // Bind values
  $this->db->bind(':servicename', $data['servicename']);
  $this->db->bind(':description', $data['description']);
   
  // Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }

}

//----------------------------------------------------------------------------------------------------------------
public function DeleteService($data){       
      $this->db->query('UPDATE users SET status= :status WHERE id = :id');
      // Bind values      
     $this->db->bind(':id', $data['id']);
      $this->db->bind(':status', $data['status']);
      

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

//----------------------------------------------------------------------------------------------------------------
public function getService(){
  $this->db->query('SELECT *,
                    service_master.id as id,
                    service_master.servicename as servicename,
                    service_master.description as description
                    FROM service_master
                    ORDER BY service_master.id ASC
                    ');
                    $results = $this->db->resultSet();
                   return $results;
     }
 
//-----------------------------------------------------------------------------------------------------------------

public function findByServicename($servicename){
  $this->db->query('SELECT * FROM service_master WHERE servicename = :servicename');
  $this->db->bind(':servicename', $servicename);
$row = $this->db->single();
// Check row
  if($this->db->rowCount() > 0){
    return true;
  } else {
    return false;
  }
}
//-----------------------------------------------------------------------------------------------------------------
public function getRoleMaster(){
  $this->db->query('SELECT *,
                    role_master.id as id,
                    role_master.role as role                   
                    FROM role_master
                    ORDER BY role_master.created DESC
                    ');
                    $results = $this->db->resultSet();
                   return $results;
     }
 
//-------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------
public function updateRole($data){
  $this->db->query('UPDATE role_master SET role = :name  WHERE id = :id');
  // Bind values      
  $this->db->bind(':id', $data['id']);
  $this->db->bind(':name', $data['name']);
   // Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}
//-----------------------------------------------------------------------------------------------------------

public function getRoleById($id){
  $this->db->query('SELECT * FROM role_master WHERE id = :id');
  $this->db->bind(':id', $id);

  $row = $this->db->single();

  return $row;
  if($this->db->rowCount() > 0){
    return true;
  } else {
    return false;
  }
}
//----------------------------------------------------------------------------------------------------------------

function roledelete($id)
{
  $this->db->query('DELETE from role_master WHERE id= :id');
 
      $this->db->bind(':id', $id);
    // Execute
      $this->db->execute();
return true;
}
//-----------------------------------------------------------------------------------------------------------------
public function CreateInfo($data){      
  $this->db->query('INSERT INTO knowledge_base (subject,description,keyword,file,version) VALUES(:title ,:description,:keyword,:file,:version)');
  // Bind values
  $this->db->bind(':title', $data['title']);
  $this->db->bind(':description', $data['description']);
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
//--------------------------------------------------------------------------------------------------------------

public function getInfo(){
  $this->db->query('SELECT *,
                    knowledge_base.id as id,
                    knowledge_base.subject as subject,
                    knowledge_base.description as description,
                    knowledge_base.keyword as keyword,
                    knowledge_base.version as version,
                    knowledge_base.created_at as date
                  
                    FROM knowledge_base
                    ORDER BY knowledge_base.created_at DESC
                    ');
                    $results = $this->db->resultSet();
                    return $results;
     }
//-------------------------------------------------------------------------------------------------------------
public function getknowledgeBase($id)
{
	$this->db->query('SELECT * FROM knowledge_base WHERE id = :id ');
  $this->db->bind(':id', $id);
  $row = $this->db->single();

  return $row;
  if($this->db->rowCount() > 0){
    return true;
  } else {
    return false;
  }
}

//---------------------------------------------------------------------------------------------------------------
public function updateKnowledgeBase($data){      
  $this->db->query('INSERT INTO knowledge_base (subject,description,keyword,file,version) VALUES(:title ,:description,:keyword,:file,:version)');
  // Bind values
  $this->db->bind(':title', $data['subject']);
  $this->db->bind(':description', $data['description']);
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
//--------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------

function knowledgedelete($id)
{
  $this->db->query('DELETE from knowledge_base WHERE id= :id');
 
      $this->db->bind(':id', $id);
    // Execute
      $this->db->execute();
return true;
}
//-----------------------------------------------------------------------------------------------------------------
public function NotificationMaster($data){      
  $this->db->query('INSERT INTO notification_master (activity,helpdesk_notification,customer_notification,email_message,sms_message,email_message1,sms_message1) VALUES(:activity ,:hd,:cust,:email,:sms,:email1,:sms1)');
  // Bind values
  $this->db->bind(':activity', $data['activity']);
  $this->db->bind(':hd', $data['hd_notification']);
  $this->db->bind(':cust', $data['cust_notification']);
  $this->db->bind(':email', $data['message1']);
  $this->db->bind(':sms', $data['message2']);
  $this->db->bind(':email1', $data['message3']);
  $this->db->bind(':sms1', $data['message4']);
   
  // Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }

}
//-----------------------------------------------------------------------------------------------------------
public function getnotification(){
  $this->db->query('SELECT *,
                   notification_master.id as id,
                   notification_master.activity as activity,
                   notification_master.helpdesk_notification as hd_notification,
                   notification_master.customer_notification as cust_notification,
                   notification_master.email_message as email,
                   notification_master.sms_message as sms,
                   notification_master.email_message1 as email1,
                   notification_master.sms_message1 as sms1
                    FROM  notification_master
                    ORDER BY  notification_master.id ASC
                    ');
                    $results = $this->db->resultSet();
                   return $results;
     }
//-------------------------------------------------------------------------------------------------------------
public function UpdateNotificationMaster($data){

  $this->db->query('UPDATE notification_master SET activity = :activity, helpdesk_notification=:hd_notification, customer_notification=:cust_notification, email_message=:message1, sms_message=:message2 , email_message1= :message3, sms_message1=:message4 WHERE id = :id');
  // Bind values      
  $this->db->bind(':id', $data['id']);
  $this->db->bind(':activity', $data['activity']);
  $this->db->bind(':hd_notification', $data['hd_notification']);
  $this->db->bind(':cust_notification', $data['cust_notification']); 
  $this->db->bind(':message1', $data['message1']); 
  $this->db->bind(':message2', $data['message2']); 
  $this->db->bind(':message3', $data['message3']); 
  $this->db->bind(':message4', $data['message4']); 
 
   // Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}
//-----------------------------------------------------------------------------------------------------------

public function getNotificationById($id){
  $this->db->query('SELECT * FROM notification_master WHERE id = :id');
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
}