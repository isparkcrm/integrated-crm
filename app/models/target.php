<?php
use PHPMailer\PHPMailer\PHPMailerAutoload;
use PHPMailer\PHPMailer\Exception;
  class Target  {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }
public function getallIndustry()
{
	$query = $this->db->query('SELECT * FROM industry');
	$results = $this->db->resultSet();
	return $results;
	
}
public function getallUsers()
{
	$query = $this->db->query('select * from users where usertype="Internal User"');
	$results = $this->db->resultSet();
	return $results;
}
public function getallCampaign()
{
	$query = $this->db->query('select * from campaign_master');
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

public function getalloutboundcaller(){
  $this->db->query("SELECT * from outboundtelecaller ");
  $results = $this->db->resultSet();
return $results;  
 
}

public function getallvertical(){
	$this->db->query("SELECT * from vertical_master");
	$resutls = $this->db->resultSet();
	return $resutls;
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

public function Insertoutboundtelecaller($data)
{
	
	$this->db->query('INSERT INTO outboundtelecaller (outboundcaller,q1,leadgencount1,salesamount1,q2,leadgencount2,salesamount2, q3,leadgencount3,salesamount3,q4,leadgencount4,salesamount4) VALUES (:outboundcaller,:q1,:leadgencount1,:salesamount1,:q2,:leadgencount2,:salesamount2,:q3,:leadgencount3,:salesamount3,:q4,:leadgencount4,:salesamount4)');
	$this->db->bind(':outboundcaller', $data['outboundcaller']);
	$this->db->bind(':q1', $data['q1']);
	$this->db->bind(':leadgencount1', $data['leadgencount1']);
	$this->db->bind(':salesamount1', $data['salesamount1']);
	$this->db->bind(':q2', $data['q2']);
	$this->db->bind(':leadgencount2', $data['leadgencount2']);
	$this->db->bind(':salesamount2', $data['salesamount2']);
	$this->db->bind(':q3', $data['q3']);
	$this->db->bind(':leadgencount3', $data['leadgencount3']);
	$this->db->bind(':salesamount3', $data['salesamount3']);
	$this->db->bind(':q4', $data['q4']);
	$this->db->bind(':leadgencount4', $data['leadgencount4']);
	$this->db->bind(':salesamount4', $data['salesamount4']);
	
	
   if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}

public function verticalmaster($data)
{
	$q1vertical = explode(",",$data['q1vertical']);
	$renewaltarget = explode(",",$data['renewaltarget']);
	$newsaletarget = explode(",",$data['newsaletarget']);
	$q2vertical = explode(",",$data['q2vertical']);
	$q2renewaltarget = explode(",",$data['q2renewaltarget']);
	$q2newsaletarget = explode(",",$data['q2newsaletarget']);
	$q3vertical = explode(",",$data['q3vertical']);
	$q3renewaltarget = explode(",",$data['q3renewaltarget']);
	$q3newsaletarget = explode(",",$data['q3newsaletarget']);
	$q4vertical = explode(",",$data['q4vertical']);
	$q4renewaltarget = explode(",",$data['q4renewaltarget']);
	$q4newsaletarget = explode(",",$data['q4newsaletarget']);
	
	 $total = sizeof($q1vertical);
      
      for($i=0;$i<$total;$i++) {
		  
		  $q1vertical1 = $q1vertical[$i];
          $renewaltarget1 = $renewaltarget[$i];
          $newsaletarget1 = $newsaletarget[$i];
          $q2vertical1 = $q2vertical[$i];
          $q2renewaltarget1 = $q2renewaltarget[$i];
          $q2newsaletarget1 = $q2newsaletarget[$i];
          $q3vertical1 = $q3vertical[$i];
          $q3renewaltarget1 = $q3renewaltarget[$i];
          $q3newsaletarget1 = $q3newsaletarget[$i];
          $q4vertical1 = $q4vertical[$i];
          $q4renewaltarget1 = $q4renewaltarget[$i];
          $q4newsaletarget1 = $q4newsaletarget[$i];
	
	$this->db->query('INSERT INTO vertical_target (name, q1, q1vertical, renewaltarget, newsaletarget, q2, q2vertical, q2renewaltarget, q2newsaletarget, q3, q3vertical, q3renewaltarget, q3newsaletarget, q4, q4vertical, q4renewaltarget, q4newsaletarget) VALUES (:name, :q1, :q1vertical, :renewaltarget, :newsaletarget, :q2, :q2vertical, :q2renewaltarget, :q2newsaletarget, :q3, :q3vertical, :q3renewaltarget, :q3newsaletarget, :q4, :q4vertical, :q4renewaltarget, :q4newsaletarget)');
	$this->db->bind(':name',$data['name']);
	$this->db->bind(':q1',$data['q1']);
	$this->db->bind(':q1vertical',$q1vertical1);
	$this->db->bind(':renewaltarget',  $renewaltarget1);
	$this->db->bind(':newsaletarget', $newsaletarget1);
	$this->db->bind(':q2',$data['q2']);
	$this->db->bind(':q2vertical',$q2vertical1);
	$this->db->bind(':q2renewaltarget',$q2renewaltarget1);
	$this->db->bind(':q2newsaletarget', $q2newsaletarget1);
	$this->db->bind(':q3',$data['q3']);
	$this->db->bind(':q3vertical',$q3vertical1);
	$this->db->bind(':q3renewaltarget',$q3renewaltarget1);
	$this->db->bind(':q3newsaletarget', $q3newsaletarget1);
	$this->db->bind(':q4',$data['q4']);
	$this->db->bind(':q4vertical',$q4vertical1);
	$this->db->bind(':q4renewaltarget', $q4renewaltarget1);
	$this->db->bind(':q4newsaletarget',$q4newsaletarget1);
	 
	 $this->db->execute();
            
      }
      return true;

}

public function updateverticalmaster($data)
{

	$q1vertical = explode(",",$data['q1vertical']);
	$renewaltarget = explode(",",$data['renewaltarget']);
	$newsaletarget = explode(",",$data['newsaletarget']);
	$q2vertical = explode(",",$data['q2vertical']);
	$q2renewaltarget = explode(",",$data['q2renewaltarget']);
	$q2newsaletarget = explode(",",$data['q2newsaletarget']);
	$q3vertical = explode(",",$data['q3vertical']);
	$q3renewaltarget = explode(",",$data['q3renewaltarget']);
	$q3newsaletarget = explode(",",$data['q3newsaletarget']);
	$q4vertical = explode(",",$data['q4vertical']);
	$q4renewaltarget = explode(",",$data['q4renewaltarget']);
	$q4newsaletarget = explode(",",$data['q4newsaletarget']);
	
	 $total = sizeof($q1vertical);
      
      for($i=0;$i<$total;$i++) {
		  
		  $q1vertical1 = $q1vertical[$i];
          $renewaltarget1 = $renewaltarget[$i];
          $newsaletarget1 = $newsaletarget[$i];
          $q2vertical1 = $q2vertical[$i];
          $q2renewaltarget1 = $q2renewaltarget[$i];
          $q2newsaletarget1 = $q2newsaletarget[$i];
          $q3vertical1 = $q3vertical[$i];
          $q3renewaltarget1 = $q3renewaltarget[$i];
          $q3newsaletarget1 = $q3newsaletarget[$i];
          $q4vertical1 = $q4vertical[$i];
          $q4renewaltarget1 = $q4renewaltarget[$i];
          $q4newsaletarget1 = $q4newsaletarget[$i];
	
	$this->db->query('UPDATE vertical_target SET name = :name, q1= :q1, q1vertical = :q1vertical, renewaltarget = :renewaltarget, newsaletarget = :newsaletarget, q2 = :q2, q2vertical = :q2vertical, q2renewaltarget = :q2renewaltarget, q2newsaletarget = :q2newsaletarget, q3 = :q3, q3vertical = :q3vertical, q3renewaltarget = :q3renewaltarget, q3newsaletarget = :q3newsaletarget, q4 = :q4, q4vertical = :q4vertical, q4renewaltarget = :q4renewaltarget, q4newsaletarget = :q4newsaletarget where id= :id');
	$this->db->bind(':id',$data['id']);
	$this->db->bind(':name',$data['name']);
	$this->db->bind(':q1',$data['q1']);
	$this->db->bind(':q1vertical',$q1vertical1);
	$this->db->bind(':renewaltarget',  $renewaltarget1);
	$this->db->bind(':newsaletarget', $newsaletarget1);
	$this->db->bind(':q2',$data['q2']);
	$this->db->bind(':q2vertical',$q2vertical1);
	$this->db->bind(':q2renewaltarget',$q2renewaltarget1);
	$this->db->bind(':q2newsaletarget', $q2newsaletarget1);
	$this->db->bind(':q3',$data['q3']);
	$this->db->bind(':q3vertical',$q3vertical1);
	$this->db->bind(':q3renewaltarget',$q3renewaltarget1);
	$this->db->bind(':q3newsaletarget', $q3newsaletarget1);
	$this->db->bind(':q4',$data['q4']);
	$this->db->bind(':q4vertical',$q4vertical1);
	$this->db->bind(':q4renewaltarget', $q4renewaltarget1);
	$this->db->bind(':q4newsaletarget',$q4newsaletarget1);
	 
	 $this->db->execute();
            
      }
      return true;

}

public function getverticaltargetbyid($id)
{
	$this->db->query("SELECT a.id,a.name,a.q1,a.q1vertical, a.renewaltarget, a.newsaletarget, a.q2, a.q2vertical, a.q2renewaltarget, a.q2newsaletarget, a.q3, a.q3vertical, a.q3renewaltarget, a.q3newsaletarget, a.q4, a.q4vertical, a.q4renewaltarget, a.q4newsaletarget, b.username, c.verticalname, d.verticalname as q2verticalname, e.verticalname as q3verticalname, f.verticalname as q4verticalname from vertical_target as a, users as b, vertical_master as c, vertical_master as d, vertical_master as e, vertical_master as f where a.name = b.id and a.q1vertical = c.id and a.q2vertical = d.id and a.q3vertical = e.id and a.q4vertical = f.id ");
	$this->db->bind(':id', $id);
	$row = $this->db->single();

	  return $row;
	  if($this->db->rowCount() > 0){
		return true;
	  } else {
		return false;
	  }
}

public function getallverticaltarget()
{
	$this->db->query("SELECT *,
                    	vertical_target.id as id,
                        users.username as name
                       
						FROM vertical_target
                        INNER JOIN users ON vertical_target.name=users.id
                        
                       

	
	");
  $results = $this->db->resultSet();
return $results;
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


//-----------------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------------
}