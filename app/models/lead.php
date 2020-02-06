<?php 
use PHPMailer\PHPMailer\PHPMailerAutoload;
use PHPMailer\PHPMailer\Exception;
  class Lead {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }
 //---------------------------------------------------------------------------------------------------
public function getallIndustry()
{
	$this->db->query('SELECT * FROM industry');
	$results = $this->db->resultSet();
	return $results;
	
}
 //---------------------------------------------------------------------------------------------------
public function getallquatation($lead_id)
{
	 $this->db->query('SELECT * from quatation_master where lead_id=:lead_id');
					  $this->db->bind(':lead_id',$lead_id);
					  $results = $this->db->resultSet();
					  return $results;
}
 //---------------------------------------------------------------------------------------------------
public function overduelead()
{
	
}
 //---------------------------------------------------------------------------------------------------
public function Insertquatation($data)
{
	  $this->db->query('INSERT INTO quatation_master (lead_id,customername, quatationupload, description) VALUES (:lead_id, :customername, :quatationupload, :description)');
	  $this->db->bind(':lead_id', $data['lead_id']);
	  $this->db->bind(':customername', $data['customername']);
	  $this->db->bind(':quatationupload', $data['quatationupload']);
	  $this->db->bind(':description', $data['description']);
	  
	  if($this->db->execute())
	 {
		return true;
	 }
	 else 
	 {
		return false;
     }
}
 //---------------------------------------------------------------------------------------------------
public function commitlead($assignee)
{
	$status1='Open';
	$status2='Postponed';
	$this->db->query('SELECT COUNT(leadstatus) AS total FROM lead WHERE leadstatus = "Commit" and assignee=:assignee and status=:status1 OR leadstatus = "Commit" and assignee=:assignee and status=:status2');
	  $this->db->bind(':status1', $status1);
	  $this->db->bind(':status2', $status2);
	   $this->db->bind(':assignee', $assignee);
	$row = $this->db->single();
	$total = $row->total;
	return $total;
}
 //---------------------------------------------------------------------------------------------------
public function upsidelead($assignee)
{

	$status1='Open';
	$status2='Postponed';
	$this->db->query('SELECT COUNT(leadstatus) AS total FROM lead WHERE leadstatus = "Upside" and assignee=:assignee and status=:status1 OR leadstatus = "Upside"  and assignee=:assignee and status=:status2');
	 $this->db->bind(':status1', $status1);
	  $this->db->bind(':status2', $status2);
	    $this->db->bind(':assignee', $assignee);
	$row = $this->db->single();
	$total = $row->total;
	return $total;
}
 //---------------------------------------------------------------------------------------------------
public function leadcount($assignee)
{
	$status1='Open';
	$status2='Postponed';
	$this->db->query('SELECT COUNT(leadstatus) AS total FROM lead WHERE leadstatus = "Lead" and assignee=:assignee  and status=:status1 OR leadstatus = "Lead" and assignee=:assignee and status=:status2 ');
	$this->db->bind(':status1', $status1);
	  $this->db->bind(':status2', $status2);
	    $this->db->bind(':assignee', $assignee);
	$row = $this->db->single();
	$total = $row->total;
	return $total;
}
 //---------------------------------------------------------------------------------------------------
public function coldcount($assignee)
{
	$status1='Open';
	$status2='Postponed';

	$this->db->query('SELECT COUNT(leadstatus) AS total FROM lead WHERE leadstatus = "Cold" and assignee=:assignee  and status=:status1 OR leadstatus = "Cold" and assignee=:assignee  and status=:status2 ');
	$this->db->bind(':status1', $status1);
	  $this->db->bind(':status2', $status2);
	  $this->db->bind(':assignee', $assignee);
	$row = $this->db->single();
	$total = $row->total;
	return $total;
}
 //---------------------------------------------------------------------------------------------------
public function wonlead($assignee)
{

	$this->db->query('SELECT COUNT(status) AS total FROM closed_lead WHERE YEAR(closed_at) = YEAR(NOW()) AND MONTH(closed_at)=MONTH(NOW()) AND assignee=:assignee');
	  $this->db->bind(':assignee', $assignee);
	$row = $this->db->single();
	$total = $row->total;
	return $total;
}
 //---------------------------------------------------------------------------------------------------
public function postponedlead($assignee)
{
	$this->db->query('SELECT COUNT(status) AS total FROM postponed_lead WHERE YEAR(created_at) = YEAR(NOW()) AND MONTH(created_at)=MONTH(NOW()) AND assignee=:assignee');
	  $this->db->bind(':assignee', $assignee);
	$row = $this->db->single();
	$total = $row->total;
	return $total;
}
 //---------------------------------------------------------------------------------------------------
public function droppedlead($assignee)
{
	$this->db->query('SELECT COUNT(status) AS total FROM drop_lead WHERE YEAR(dropped_at) = YEAR(NOW()) AND MONTH(dropped_at)=MONTH(NOW()) AND assignee=:assignee');
	  $this->db->bind(':assignee', $assignee);
	$row = $this->db->single();
	$total = $row->total;
	return $total;
}
 //---------------------------------------------------------------------------------------------------
public function lostlead($assignee)
{
	$this->db->query('SELECT COUNT(status) AS total FROM lost_lead WHERE YEAR(lost_at) = YEAR(NOW()) AND MONTH(lost_at)=MONTH(NOW()) AND assignee=:assignee');
	  $this->db->bind(':assignee', $assignee);
	$row = $this->db->single();
	$total = $row->total;
	return $total;
}
 //---------------------------------------------------------------------------------------------------
public function getmeetinginfo($lead_id)
{
	$this->db->query('SELECT * from meetinginfo where lead_id=:lead_id');
	$this->db->bind(':lead_id', $lead_id);
    $results = $this->db->resultSet();
	return $results;
}
 //---------------------------------------------------------------------------------------------------
public function getmomdetails($lead_id)
{
	$this->db->query('SELECT * from mom_master where lead_id=:lead_id');
	$this->db->bind(':lead_id', $lead_id);
	$results = $this->db->resultSet();
	return $results;
}
 //---------------------------------------------------------------------------------------------------
public function getalltodolist($assignee)
{
	 $today = date('Y-m-d');
	 $this->db->query('SELECT *,
	 lead_update.id as id,
	 lead_update.lead_id as lead_id,
	 lead_update.nextaction as nextaction,
	 lead_update.nextactiondate as nextactiondate,
	 lead_update.customername as customername,
	 lead_update.ordervalue as ordervalue,
	 lead_update.closuredate as closuredate,
	 actiontaken.actiontaken as actiontaken
	 FROM lead_update
	 INNER JOIN actiontaken ON lead_update.actiontaken=actiontaken.id 
	
	 where lead_update.nextactiondate = :today AND lead_update.assignee=:assignee');
	 $this->db->bind(':assignee', $assignee);
	 $this->db->bind(':today', $today);
	 $results = $this->db->resultSet();
	 return $results;
}
 //---------------------------------------------------------------------------------------------------
//********************************  SERVICE HEAD DASH BOARD *********************************************
//---------------------------------------------------------------------------------------------------
public function commitlead1()
{
	$status1='Open';
	$status2='Postponed';
	$this->db->query('SELECT COUNT(leadstatus) AS total FROM lead WHERE leadstatus = "Commit" and status=:status1 OR leadstatus = "Commit"  and status=:status2');
	  $this->db->bind(':status1', $status1);
	  $this->db->bind(':status2', $status2);
	  
	$row = $this->db->single();
	$total = $row->total;
	return $total;
}
 //---------------------------------------------------------------------------------------------------
public function upsidelead1()
{

	$status1='Open';
	$status2='Postponed';
	$this->db->query('SELECT COUNT(leadstatus) AS total FROM lead WHERE leadstatus = "Upside" and status=:status1 OR leadstatus = "Upside" and status=:status2');
	 $this->db->bind(':status1', $status1);
	  $this->db->bind(':status2', $status2);
	    
	$row = $this->db->single();
	$total = $row->total;
	return $total;
}
 //---------------------------------------------------------------------------------------------------
public function leadcount1()
{
	$status1='Open';
	$status2='Postponed';
	$this->db->query('SELECT COUNT(leadstatus) AS total FROM lead WHERE leadstatus = "Lead" and status=:status1 OR leadstatus = "Lead"  and status=:status2 ');
	$this->db->bind(':status1', $status1);
	  $this->db->bind(':status2', $status2);
	    
	$row = $this->db->single();
	$total = $row->total;
	return $total;
}
 //---------------------------------------------------------------------------------------------------
public function coldcount1()
{
	$status1='Open';
	$status2='Postponed';

	$this->db->query('SELECT COUNT(leadstatus) AS total FROM lead WHERE leadstatus = "Cold"  and status=:status1 OR leadstatus = "Cold"  and status=:status2 ');
	$this->db->bind(':status1', $status1);
	  $this->db->bind(':status2', $status2);
	 
	$row = $this->db->single();
	$total = $row->total;
	return $total;
}
 //---------------------------------------------------------------------------------------------------
public function wonlead1()
{

	$this->db->query('SELECT COUNT(status) AS total FROM closed_lead WHERE YEAR(closed_at) = YEAR(NOW()) AND MONTH(closed_at)=MONTH(NOW()) ');
	  //$this->db->bind(':assignee', $assignee);
	$row = $this->db->single();
	$total = $row->total;
	return $total;
}
 //---------------------------------------------------------------------------------------------------
public function postponedlead1()
{
	$this->db->query('SELECT COUNT(status) AS total FROM postponed_lead WHERE YEAR(created_at) = YEAR(NOW()) AND MONTH(created_at)=MONTH(NOW())');
	  //$this->db->bind(':assignee', $assignee);
	$row = $this->db->single();
	$total = $row->total;
	return $total;
}
 //---------------------------------------------------------------------------------------------------
public function droppedlead1()
{
	$this->db->query('SELECT COUNT(status) AS total FROM drop_lead WHERE YEAR(dropped_at) = YEAR(NOW()) AND MONTH(dropped_at)=MONTH(NOW())');
	 
	$row = $this->db->single();
	$total = $row->total;
	return $total;
}
 //---------------------------------------------------------------------------------------------------
public function lostlead1()
{
	$this->db->query('SELECT COUNT(status) AS total FROM lost_lead WHERE YEAR(lost_at) = YEAR(NOW()) AND MONTH(lost_at)=MONTH(NOW())');
	 
	$row = $this->db->single();
	$total = $row->total;
	return $total;
}
 //---------------------------------------------------------------------------------------------------
public function getalltodolist1()
{
	 $today = date('Y-m-d');
	 $this->db->query('SELECT *,
	 lead_update.id as id,
	 lead_update.lead_id as lead_id,
	 lead_update.nextaction as nextaction,
	 lead_update.nextactiondate as nextactiondate,
	 lead_update.customername as customername,
	 lead_update.ordervalue as ordervalue,
	 lead_update.closuredate as closuredate,
	 actiontaken.actiontaken as actiontaken
	 FROM lead_update
	 INNER JOIN actiontaken ON lead_update.actiontaken=actiontaken.id 
	
	 where lead_update.nextactiondate = :today');
	
	 $this->db->bind(':today', $today);
	 $results = $this->db->resultSet();
	 return $results;
}
//********************************************************************************************************
//--------------------------------------------------------------------------------------------------------------
public function allnotification()
{
	$this->db->query('SELECT *,
					 lead.id,
					 lead.lead_id,
					 lead.customername as customername,
					 lead.ordervalue as ordervalue,
					 lead.closuredate as closuredate,
					 product_master.productname as productname,
					  lead.assignee as username
					 from lead 
					 
					 INNER JOIN product_master ON lead.product = product_master.id
					 WHERE lead.closuredate  < Date(NOW()) AND lead.leadstatus= "Commit"  AND lead.status="Open"');
					 $results = $this->db->resultSet();
					return $results;	
}
 //---------------------------------------------------------------------------------------------------
public function getoverallsalesleadlist()
{
	
	$this->db->query('SELECT *,
					lead.id as id,
					lead.lead_id as lead_id,
					lead.customername as customername,
					lead.mobile as mobile,
					lead.company as company,
					lead.leadsource as leadsource,
					lead.leadstatus as leadstatus,
					lead.assignee as assignee,
					lead.ordervalue as ordervalue,
					users.username as username
					 FROM lead INNER JOIN users ON lead.assignee = users.id where lead.status="Open"');
					 
	$results = $this->db->resultSet();
	return $results;
}
 //---------------------------------------------------------------------------------------------------
public function getallclosedorder()
{
	$this->db->query('SELECT *,
					 closed_lead.id,
					 closed_lead.lead_id,
					 closed_lead.product as product,
					 closed_lead.customername as customername,
					 closed_lead.ordervalue as ordervalue,
					 closed_lead.closed_at as created_at,
					 
					 closed_lead.assignee as username
					 
					 from closed_lead 
					
					 WHERE YEARWEEK(created_at) = YEARWEEK(NOW()) OR YEARWEEK(created_at) = YEARWEEK(NOW())-1');
					 $results = $this->db->resultSet();
					return $results;	
}
 //---------------------------------------------------------------------------------------------------
public function Insertmom($data)
{
	  $this->db->query('INSERT INTO mom_master (lead_id, customername, meetingname, momupload, description) VALUES (:lead_id, :customername, :meetingname, :momupload, :description)');
	  $this->db->bind(':lead_id', $data['lead_id']);
	  $this->db->bind(':customername', $data['customername']);
	  $this->db->bind(':meetingname', $data['meetingname']);
	  $this->db->bind(':momupload', $data['momupload']);
	  $this->db->bind(':description', $data['description']);
	  
	  if($this->db->execute())
	 {
		return true;
	 }
	 else 
	 {
		return false;
     }
}
 //---------------------------------------------------------------------------------------------------
public function Insertlead($data)
{
//print_r($data);die;	
	  date_default_timezone_set('Asia/Kolkata');
	  $m = date('h');
	  $y = date('i');
	  $d = date('s');	
	  $tid = $y.$m.$d; 
     $comment_status = "1";
	$this->db->query('INSERT INTO lead (lead_id, leadowner, customertype, customername, company, industry,leadsource, phone, mobile, email, vertical,oem,product, leadstatus, assignee, ordervalue, closuredate, status,paymentperiod, comment_status) VALUES (:tid, :leadowner, :customertype, :customername, :company, :industry,  :leadsource, :phone, :mobile, :email, :vertical, :oem,:product, :leadstatus, :assignee, :ordervalue, :closuredate, :status, :paymentperiod, :comment_status)');
	$this->db->bind(':tid', $tid);
	$this->db->bind(':leadowner', $data['leadowner']);
	$this->db->bind(':customertype', $data['customertype']);
	$this->db->bind(':customername', $data['customername']);
	$this->db->bind(':company', $data['company']);
	$this->db->bind(':industry', $data['industry']);
	$this->db->bind(':leadsource', $data['leadsource']);	
	$this->db->bind(':phone', $data['phone']);
	$this->db->bind(':mobile', $data['mobile']);
	$this->db->bind(':email', $data['email']);
	$this->db->bind(':vertical', $data['vertical']);	
	$this->db->bind(':leadstatus', $data['leadstatus']);
	$this->db->bind(':oem', $data['oem']);	
	$this->db->bind(':product', $data['product']);
	$this->db->bind(':assignee', $data['assignee']);
	$this->db->bind(':ordervalue', $data['ordervalue']);
	$this->db->bind(':closuredate', $data['closuredate']);
	$this->db->bind(':status', $data['status']);
	$this->db->bind(':paymentperiod', $data['paymentperiod']);
	$this->db->bind(':comment_status', $comment_status);
	
	 if($this->db->execute())
	 {
		return true;
	 }
	 else 
	 {
		return false;
     }
}

public function Insertstatus($data)
{
	$this->db->query('INSERT INTO lead_update (lead_id,customername,company,industry,leadsource,phone,mobile,email,vertical,oem,product,leadstatus,assignee,ordervalue,closuredate,status,created_at, actiontaken, nextaction, nextactiondate) VALUES (:lead_id,:customername,:company,:industry,:leadsource,:phone,:mobile,:email,:vertical,:oem,:product,:leadstatus,:assignee,:ordervalue,:closuredate,:status,:created_at, :actiontaken, :nextaction, :nextactiondate)');
	$this->db->bind(':lead_id', $data['lead_id']);
	$this->db->bind(':customername', $data['customername']);
	$this->db->bind(':company', $data['company']);
	$this->db->bind(':industry', $data['industry']);
	$this->db->bind(':leadsource', $data['leadsource']);	
	$this->db->bind(':phone', $data['phone']);
	$this->db->bind(':mobile', $data['mobile']);
	$this->db->bind(':email', $data['email']);
	$this->db->bind(':vertical', $data['vertical']);		
	$this->db->bind(':oem', $data['oem']);	
	$this->db->bind(':product', $data['product']);
	$this->db->bind(':leadstatus', $data['leadstatus']);
	$this->db->bind(':assignee', $data['assignee']);
	$this->db->bind(':ordervalue', $data['ordervalue']);
	$this->db->bind(':closuredate', $data['closuredate']);
	$this->db->bind(':status', $data['status']);
	$this->db->bind(':created_at', $data['created_at']);
	$this->db->bind(':actiontaken', $data['actiontaken']);
	$this->db->bind(':nextaction', $data['nextaction']);
	$this->db->bind(':nextactiondate', $data['nextactiondate']);
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
 public function leadclose($data)
{
	
	
	$this->db->query('INSERT INTO closed_lead (lead_id,  customername, company, industry,leadsource,number,email ,vertical,oem, product, ordervalue, created_at,  closed_reason, status, assignee,closure_value,payment_mode,service_customer) VALUES (:lead_id,  :customername, :company, :industry, :leadsource,:number,:email,:vertical,:oem, :product, :ordervalue, :created_at, :closed_reason,  :status, :assignee,:closure_value,:payment_mode,:service_customer)');
	$this->db->bind(':lead_id', $data['lead_id']);
	
	$this->db->bind(':customername', $data['customername']);
	$this->db->bind(':company', $data['company']);
	$this->db->bind(':industry', $data['industry']);
	$this->db->bind(':leadsource', $data['leadsource']);
	$this->db->bind(':number', $data['mobile']);
	$this->db->bind(':email', $data['email']);
	$this->db->bind(':vertical', $data['vertical']);
	$this->db->bind(':oem', $data['oem']);
	$this->db->bind(':product', $data['product']);
	$this->db->bind(':ordervalue', $data['ordervalue']);
	$this->db->bind(':created_at', $data['created_at']);
	$this->db->bind(':closed_reason', $data['confirmation']);
	$this->db->bind(':status', $data['status']);
	$this->db->bind(':assignee', $data['assignee']);
	$this->db->bind('closure_value', $data['closure_value']);
	$this->db->bind(':payment_mode', $data['payment']);
	$this->db->bind(':service_customer', $data['info']);
	
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
public function AmcMaster($data)
{
	
	 $gid = substr($data['company'],0,3);
      date_default_timezone_set('Asia/Kolkata');
      $m = date('h');
       $y = date('i');      
       $client_ID = $gid.$y.$m;
	$this->db->query('INSERT INTO amc_master (clientname,client_ID,contact_person,number,email,vertical,oem,product,ordervalue,start_date,end_date,accountmanager) VALUES ( :company,:client_ID, :customername,:mobile,:email, :vertical,:oem, :product, :ordervalue,:date1,:date2,:assignee)');
	
	
	
	$this->db->bind(':company', $data['company']);
	$this->db->bind(':client_ID', $client_ID);
    $this->db->bind(':customername', $data['customername']);
    $this->db->bind(':mobile', $data['mobile']);
    $this->db->bind(':email', $data['email']);
	$this->db->bind(':vertical', $data['vertical']);
	$this->db->bind(':oem', $data['oem']);
	$this->db->bind(':product', $data['product']);
	$this->db->bind(':ordervalue', $data['closure_value']);
	$this->db->bind(':date1', $data['date1']);
	$this->db->bind(':date2', $data['date2']);	
	$this->db->bind(':assignee', $data['assignee']);
	
	
	 if($this->db->execute())
	 {
		return true;
	 }
	 else 
	 {
		return false;
     }
}
//------------------------------------------------------------------------------------------------------
public function leaddrop($data)
{
	
	
	$this->db->query('INSERT INTO drop_lead (lead_id,customername, company,product, ordervalue,assignee, dropreason, status) VALUES (:lead_id,  :customername, :company, :product, :ordervalue,:assignee, :dropreason, :status)');
	$this->db->bind(':lead_id', $data['lead_id']);
	
	$this->db->bind(':customername', $data['customername']);
	$this->db->bind(':company', $data['company']);
	
	$this->db->bind(':product', $data['product']);
	$this->db->bind(':ordervalue', $data['ordervalue']);
	$this->db->bind(':assignee', $data['assignee']);
	$this->db->bind(':dropreason', $data['dropreason']);
	$this->db->bind(':status', $data['status']);
	
	 if($this->db->execute())
	 {
		return true;
	 }
	 else 
	 {
		return false;
     }
}

public function leaddelete($data)
{
	
	
	$this->db->query('INSERT INTO delete_lead (lead_id,customername, company,product, ordervalue,assignee, deletereason, status) VALUES (:lead_id,  :customername, :company, :product, :ordervalue,:assignee, :deletereason, :status)');
	$this->db->bind(':lead_id', $data['lead_id']);
	
	$this->db->bind(':customername', $data['customername']);
	$this->db->bind(':company', $data['company']);
	
	$this->db->bind(':product', $data['product']);
	$this->db->bind(':ordervalue', $data['ordervalue']);
	$this->db->bind(':assignee', $data['assignee']);
	$this->db->bind(':deletereason', $data['deletereason']);
	$this->db->bind(':status', $data['status']);
	
	 if($this->db->execute())
	 {
		return true;
	 }
	 else 
	 {
		return false;
     }
}



public function leadlost($data)
{
	
	
	$this->db->query('INSERT INTO lost_lead (lead_id,customername, company, product, ordervalue,assignee, lostreason, losttowhom, status) VALUES (:lead_id,  :customername, :company,  :product, :ordervalue,:assignee, :lostreason, :losttowhom, :status)');
	$this->db->bind(':lead_id', $data['lead_id']);
	
	$this->db->bind(':customername', $data['customername']);
	$this->db->bind(':company', $data['company']);	
	$this->db->bind(':product', $data['product']);
	$this->db->bind(':ordervalue', $data['ordervalue']);
	$this->db->bind(':assignee', $data['assignee']);
	$this->db->bind(':lostreason', $data['lostreason']);
	$this->db->bind(':losttowhom', $data['losttowhom']);
	$this->db->bind(':status', $data['status']);

	 if($this->db->execute())
	 {
		return true;
	 }
	 else 
	 {
		return false;
     }
}
//---------------------------------------------------------------------------------------------------------------------------
public function leadpostponed($data)
{
	/*$leadcloseid = ($_SESSION['username']);
          date_default_timezone_set('Asia/Kolkata');
          $m = date('h');
          $y = date('i');
          $d = date('s');
          $updated_by = $leadcloseid.$y.$m.$d;  */
	
	$this->db->query('INSERT INTO postponed_lead (lead_id, customername, company, product, ordervalue,assignee, postponeddate, postponedreason, status) VALUES (:lead_id,:customername,:company,:product, :ordervalue, :assignee,:postponeddate, :postponedreason,:status)');
	$this->db->bind(':lead_id', $data['lead_id']);	
	$this->db->bind(':customername', $data['customername']);
	$this->db->bind(':company', $data['company']);	
	$this->db->bind(':product', $data['product']);
	$this->db->bind(':ordervalue', $data['ordervalue']);
	$this->db->bind(':assignee', $data['assignee']);
	$this->db->bind(':postponeddate', $data['postponeddate']);
	$this->db->bind(':postponedreason', $data['postponedreason']);
	$this->db->bind(':status', $data['status']);	
	 if($this->db->execute())
	 {
		return true;
	 }
	 else 
	 {
		return false;
     }
}
//-----------------------------------------------------------------------------------------------------------------
public function updateLead($data)
{
	$this->db->query('UPDATE Lead SET leadowner=:leadowner, customertype=:customertype, customername=:customername, company=:company, industry=:industry, leadsource=:leadsource,phone=:phone, mobile=:mobile, email=:email, vertical=:vertical, leadstatus=:leadstatus, oem=:oem,product=:product, assignee=:assignee, ordervalue=:ordervalue, closuredate=:closuredate where id=:id');
	$this->db->bind(':id', $data['id']);
	$this->db->bind(':leadowner', $data['leadowner']);
	$this->db->bind(':customertype', $data['customertype']);
	$this->db->bind(':customername', $data['customername']);
	$this->db->bind(':company', $data['company']);
	$this->db->bind(':industry', $data['industry']);	
	$this->db->bind(':leadsource', $data['leadsource']);
	$this->db->bind(':phone', $data['phone']);
	$this->db->bind(':mobile', $data['mobile']);
	$this->db->bind(':email', $data['email']);
	$this->db->bind(':vertical', $data['vertical']);	
	$this->db->bind(':leadstatus', $data['leadstatus']);
	$this->db->bind(':oem', $data['oem']);	
	$this->db->bind(':product', $data['product']);
	$this->db->bind(':assignee', $data['assignee']);
	$this->db->bind(':ordervalue', $data['ordervalue']);
	$this->db->bind(':closuredate', $data['closuredate']);
	
    if($this->db->execute())
	{
		return true;
	} 
	else 
	{
		return false;
	}
}

public function getallassignee()
{
	$role='Account Manager';
	$role1='Team Leader';
	$this->db->query('SELECT * FROM users WHERE role=:role OR role=:role1');
	 //$this->db->query('select * from users where role=:role');
	 $this->db->bind(':role', $role);
	  $this->db->bind(':role1', $role1);
	 $results = $this->db->resultSet();
	 return $results;
}


//----------------------------------------------------------------------------------------------------------------
public function updateleadtable($data)
{
	$this->db->query('UPDATE lead SET status = :status, closure_value=:value where id=:id');
	$this->db->bind(':value', $data['closure_value']);
	$this->db->bind(':status', $data['status']);
	$this->db->bind(':id', $data['id']);
	
    if($this->db->execute())
	{
		return true;
	} 
	else 
	{
		return false;
	}
}
//---------------------------------------------------------------------------------------------------------------

public function deleteleadtable($data)
{
	//$leadstatus="Upside";
	$this->db->query('delete from	lead  where id=:id');
	
	$this->db->bind(':id', $data['id']);
	
    if($this->db->execute())
	{
		return true;
	} 
	else 
	{
		return false;
	}
}

//----------------------------------------------------------------------------------------------------------------
public function updateleadtable1($data,$status_new)
{
	//$leadstatus="Upside";
	$this->db->query('UPDATE lead SET  leadstatus=:leadstatus, status = :status where id=:id');
	$this->db->bind(':leadstatus', $status_new);
	$this->db->bind(':status', $data['status']);
	$this->db->bind(':id', $data['id']);
	
    if($this->db->execute())
	{
		return true;
	} 
	else 
	{
		return false;
	}
}
//---------------------------------------------------------------------------------------------------------------
public function getupdatelist($lead_id)
{
	$this->db->query('SELECT *,
                    lead_update.id as id,
                    lead_update.lead_id as lead_id,
                    lead_update.actiontaken as actiontaken,
                    lead_update.nextaction as nextaction,
                    lead_update.nextactiondate as nextactiondate,
					actiontaken.actiontaken as actiontaken
					
                    FROM lead_update

                    INNER JOIN actiontaken ON lead_update.actiontaken=actiontaken.id where lead_update.lead_id = :lead_id');
					 $this->db->bind(':lead_id', $lead_id);
					$results = $this->db->resultSet();
                    return $results; 
}

public function getallmeeting($lead_id)
{
	$this->db->query('SELECT * from meetinginfo where lead_id =:id');
	$this->db->bind(':id', $lead_id);
	$results = $this->db->resultSet();
	return $results; 
}

public function getoveralllead()
{
	$this->db->query('SELECT * from lead');
	$results = $this->db->resultSet();
	return $results; 
}

public function getactiontaken()
{
	$this->db->query('SELECT * FROM actiontaken');
	$results = $this->db->resultSet();
	return $results;
}
public function getallemailtolead()
{
	$this->db->query('SELECT * FROM email_leads');
	$results = $this->db->resultSet();
	return $results;
}
public function getservices($id)
{
	$this->db->query('SELECT * FROM client_service WHERE client_id = :id ');
  $this->db->bind(':id', $id);
  $results = $this->db->resultSet();
	return $results;
}

public function getallleadlist()
{
	$this->db->query('SELECT *,
					lead.id as id,
					lead.lead_id as lead_id,
					lead.customername as customername,
					lead.mobile as mobile,
					lead.company as company,
					lead.leadsource as leadsource,
					lead.leadstatus as leadstatus,
					lead.assignee as assignee,
					lead.ordervalue as ordervalue
				

					FROM lead ');
	$results = $this->db->resultSet();
	 
	return $results;
}

public function getleadlist()
{
	$this->db->query('SELECT * FROM lead');
	$results = $this->db->resultSet();
	return $results;
}

public function accountmanagerleadlist($accountmanager)
{
	$this->db->query('SELECT *,
					lead.id as id,
					lead.lead_id as lead_id,
					lead.customername as fname,
					lead.mobile as mobile,
					lead.company as company,
					lead.leadsource as leadsource,
					lead.leadstatus as leadstatus,
					lead.assignee as assignee,
					lead.ordervalue as ordervalue
					
					FROM lead where lead.assignee=:accountmanager and lead.status="Open"');
	$this->db->bind(':accountmanager', $accountmanager);
	$results = $this->db->resultSet();
	return $results;
}

public function accountmanagerassigneedleadlist($accountmanager)
{
	$status="";
	$this->db->query('SELECT * from lead where  leadsource="Website" AND leadstatus=:status and assignee=:accountmanager OR leadsource="Email" AND leadstatus=:status and assignee=:accountmanager OR leadsource="SMS" AND leadstatus=:status and assignee=:accountmanager');
	$this->db->bind(':status', $status);
	$this->db->bind(':accountmanager', $accountmanager);
	$results = $this->db->resultSet();
	return $results;
}
public function getsalesleadlist()
{
	$status="";
	$this->db->query('SELECT * FROM lead where status="Open" AND leadsource="Website" AND leadstatus=:status OR status="Open" AND leadsource="Email" AND leadstatus=:status OR status="Open" AND leadsource="SMS" AND leadstatus=:status');
	$this->db->bind(':status', $status);
	$results = $this->db->resultSet();
	return $results;
}
//-------------------------------------------------------------------------------------------------------------------
public function usercommitlead($accountmanager)
{
	$leadstatus="Commit";
	$status1='Open';
	$status2='Postponed';
	$this->db->query('SELECT *,
					lead.id as id,
					lead.lead_id as lead_id,
					lead.customername as fname,
					lead.product as product,
					lead.company as company,
					lead.leadsource as leadsource,
					lead.closuredate as closuredate,
					lead.assignee as assignee,
					lead.ordervalue as ordervalue
					
					 FROM lead where leadstatus=:leadstatus AND assignee=:email and status=:status1  OR  leadstatus=:leadstatus AND assignee=:email and status=:status2');
	 $this->db->bind(':status1', $status1);
	  $this->db->bind(':status2', $status2);
	 $this->db->bind(':leadstatus', $leadstatus);
	  $this->db->bind(':email',$accountmanager );
	$results = $this->db->resultSet();
	return $results;
}
//----------------------------------------------------------------------------------------------------------
public function userupsidelead($accountmanager)
{
	$leadstatus="Upside";
	$status1='Open';
	$status2='Postponed';
	$this->db->query('SELECT *,
					lead.id as id,
					lead.lead_id as lead_id,
					lead.customername as fname,
					lead.product as product,
					lead.company as company,
					lead.leadsource as leadsource,
					lead.closuredate as closuredate,
					lead.assignee as assignee,
					lead.ordervalue as ordervalue
					
					 FROM lead where leadstatus=:leadstatus AND assignee=:email and status=:status1  OR  leadstatus=:leadstatus AND assignee=:email and status=:status2');
	 $this->db->bind(':status1', $status1);
	  $this->db->bind(':status2', $status2);
	 $this->db->bind(':leadstatus', $leadstatus);
	  $this->db->bind(':email',$accountmanager );
	$results = $this->db->resultSet();
	return $results;
}
//--------------------------------------------------------------------------------------------------------------
/*public function usercoldandlead($accountmanager)
{
	$leadstatus="Cold";
	$leadstatus1="Lead";
	$status1='Close';
	$status2='Lost';
	$status3='Drop';
	$this->db->query('SELECT *,
					lead.id as id,
					lead.lead_id as lead_id,
					lead.customername as fname,
					lead.product as product,
					lead.company as company,
					lead.leadsource as leadsource,
					lead.closuredate as closuredate,
					lead.assignee as assignee,
					lead.ordervalue as ordervalue
					
					
					 FROM lead where leadstatus=:leadstatus AND assignee=:email and status!=:status1 and status!=:status2 and status!=:status3 OR leadstatus=:leadstatus1 AND assignee=:email and status!=:status1 and status!=:status2 and status!=:status3');
	 $this->db->bind(':status1', $status1);
	  $this->db->bind(':status2', $status2);
	   $this->db->bind(':status3', $status3);
	 $this->db->bind(':leadstatus', $leadstatus);
	 $this->db->bind(':leadstatus1', $leadstatus1);
	  $this->db->bind(':email',$accountmanager );
	$results = $this->db->resultSet();
	return $results;
} */
//---------------------------------------------------------------------------------------
public function usercoldandlead($accountmanager)
{
	$leadstatus="Cold";

	$status1='Close';
	$status2='Lost';
	$status3='Drop';
	$this->db->query('SELECT *,
					lead.id as id,
					lead.lead_id as lead_id,
					lead.customername as fname,
					lead.product as product,
					lead.company as company,
					lead.leadsource as leadsource,
					lead.closuredate as closuredate,
					lead.assignee as assignee,
					lead.ordervalue as ordervalue
					
					
					 FROM lead where leadstatus=:leadstatus AND assignee=:email and status!=:status1 and status!=:status2 and status!=:status3  AND assignee=:email and status!=:status1 and status!=:status2 and status!=:status3');
	 $this->db->bind(':status1', $status1);
	  $this->db->bind(':status2', $status2);
	   $this->db->bind(':status3', $status3);
	 $this->db->bind(':leadstatus', $leadstatus);
	// $this->db->bind(':leadstatus1', $leadstatus1);
	  $this->db->bind(':email',$accountmanager );
	$results = $this->db->resultSet();
	return $results;
}
//--------------------------------------------------------------------------------------------------------------
public function userlead($accountmanager)
{
	$leadstatus1="Lead";

	$status1='Close';
	$status2='Lost';
	$status3='Drop';
	$this->db->query('SELECT *,
					lead.id as id,
					lead.lead_id as lead_id,
					lead.customername as fname,
					lead.product as product,
					lead.company as company,
					lead.leadsource as leadsource,
					lead.closuredate as closuredate,
					lead.assignee as assignee,
					lead.ordervalue as ordervalue
					
					
					 FROM lead where leadstatus=:leadstatus1 AND assignee=:email and status!=:status1 and status!=:status2 and status!=:status3  AND assignee=:email and status!=:status1 and status!=:status2 and status!=:status3');
	 $this->db->bind(':status1', $status1);
	  $this->db->bind(':status2', $status2);
	   $this->db->bind(':status3', $status3);
	// $this->db->bind(':leadstatus', $leadstatus);
	 $this->db->bind(':leadstatus1', $leadstatus1);
	  $this->db->bind(':email',$accountmanager );
	$results = $this->db->resultSet();
	return $results;
}

//--------------------------------------------------------------------------------------------------------------
public function getcommitlead()
{
		$status1='Open';
	$status2='Postponed';
	$this->db->query('SELECT *,
					lead.id as id,
					lead.lead_id as lead_id,
					lead.customername as fname,
					lead.product as product,
					lead.company as company, 
					lead.leadsource as leadsource,
					lead.closuredate as closuredate,
					lead.assignee as assignee,
					lead.ordervalue as ordervalue
					
					 FROM lead where leadstatus="Commit" and status=:status1 OR leadstatus="Commit" and status=:status2 ');
	$this->db->bind(':status1', $status1);
	  $this->db->bind(':status2', $status2);
	$results = $this->db->resultSet();
	return $results;
}
//--------------------------------------------------------------------------------------------------------------
public function getcommittotal($accountmanager)
{
	$status1='Open';
	$status2='Postponed';
	

	$this->db->query('SELECT sum(ordervalue) as total from lead where assignee=:user and leadstatus="Commit" and status=:status1  OR assignee=:user and leadstatus="Commit" and status=:status2');
	$this->db->bind(':user', $accountmanager);
	$this->db->bind(':status1', $status1);
	  $this->db->bind(':status2', $status2);
	$row = $this->db->single();
	$total = $row->total;
	return $total;
}
//--------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------
public function getcommittotal1()
{
		$status1='Open';
	$status2='Postponed';
	

	$this->db->query('SELECT sum(ordervalue) as total from lead where leadstatus="Commit" and status=:status1  OR  leadstatus="Commit" and status=:status2');
	$this->db->bind(':status1', $status1);
	  $this->db->bind(':status2', $status2);
	$row = $this->db->single();
	$total = $row->total;
	return $total;
}
//--------------------------------------------------------------------------------------------------------------
public function getupsidetotal()
{
	$status1='Open';
	$status2='Postponed';
	$user = $_SESSION['email'];

	$this->db->query('SELECT sum(ordervalue) as total from lead where assignee="$user" and leadstatus="Upside" and status=:status1  OR assignee="$user" and leadstatus="Upside" and status=:status2');
	$this->db->bind(':status1', $status1);
	  $this->db->bind(':status2', $status2);
	$row = $this->db->single();
	$total = $row->total;
	return $total;
	
}
//--------------------------------------------------------------------------------------------------------------
public function getcoldandleadtotal()
{
	$status1='Open';
	$status2='Postponed';
	$user = $_SESSION['email'];
	$this->db->query('SELECT sum(ordervalue) as total from lead where assignee="$user" and leadstatus="Lead"  and status=:status1 or assignee="$user" and leadstatus="Cold"  and status=:status1');
	$this->db->bind(':status1', $status1);
	$row = $this->db->single();
	$total = $row->total;
	return $total;
}
//--------------------------------------------------------------------------------------------------------------
public function getupsidelead()
{
	$status1='Open';
	$status2='Postponed';

	$this->db->query('SELECT *,
					lead.id as id,
					lead.lead_id as lead_id,
					lead.customername as fname,
					lead.product as product,
					lead.company as company,
					lead.leadsource as leadsource,
					lead.closuredate as closuredate,
					lead.assignee as assignee,
					lead.ordervalue as ordervalue
					
					 FROM lead where leadstatus="Upside" and status=:status1 OR leadstatus="Upside" and status=:status2');
	$this->db->bind(':status1', $status1);
	$this->db->bind(':status2', $status2);
	$results = $this->db->resultSet();
	return $results;
}
//--------------------------------------------------------------------------------------------------------------
public function getcoldandlead()
{
	$status1='Close';
	$status2='Lost';
	$status3='Drop';
	$this->db->query('SELECT *,
					lead.id as id,
					lead.lead_id as lead_id,
					lead.customername as fname,
					lead.product as product,
					lead.company as company,
					lead.leadsource as leadsource,
					lead.closuredate as closuredate,
					lead.assignee as assignee,
					lead.ordervalue as ordervalue
					
					 FROM lead where leadstatus="Cold"  and status!=:status1 and status!=:status2 and status!=:status3 or leadstatus="Lead" and status!=:status1 and status!=:status2 and status!=:status3 ');
 $this->db->bind(':status1', $status1);
	  $this->db->bind(':status2', $status2);
	   $this->db->bind(':status3', $status3);
	$results = $this->db->resultSet();
	return $results;
}
//--------------------------------------------------------------------------------------------------------------
public function getcommitleadlist($user)
{
	$status1='Open';
	$status2='Postponed';

	$this->db->query('SELECT *,
					lead.id as id,
					lead.lead_id as lead_id,
					lead.customername as customername,
					lead.mobile as mobile,
					lead.company as company,
					lead.leadsource as leadsource,
					lead.leadstatus as leadstatus,
					lead.assignee as assignee,
					lead.ordervalue as ordervalue,
					lead.status as status
					
					 FROM lead where lead.status=:status1 and lead.leadstatus="Commit" and assignee=:user OR lead.status=:status2 and lead.leadstatus="Commit" and assignee=:user');
	$this->db->bind(':status1', $status1);
	$this->db->bind(':status2', $status2);
					 $this->db->bind(':user',$user);
	$results = $this->db->resultSet();
	return $results;
	
}
//--------------------------------------------------------------------------------------------------------------
public function getupsideleadlist($user)
{
	$status1='Open';
	$status2='Postponed';

	$this->db->query('SELECT *,
					lead.id as id,
					lead.lead_id as lead_id,
					lead.customername as customername,
					lead.mobile as mobile,
					lead.company as company,
					lead.leadsource as leadsource,
					lead.leadstatus as leadstatus,
					lead.assignee as assignee,
					lead.ordervalue as ordervalue,
					lead.status as status
					
					 FROM lead where lead.status=:status1 and lead.leadstatus="Upside" and assignee=:user OR lead.status=:status2 and lead.leadstatus="Upside" and assignee=:user');
	                 	$this->db->bind(':status1', $status1);
	$this->db->bind(':status2', $status2);
					 $this->db->bind(':user',$user);
	$results = $this->db->resultSet();
	return $results;
	
}
//--------------------------------------------------------------------------------------------------------------
public function getcoldleadlist($user)
{

	$this->db->query('SELECT *,
					lead.id as id,
					lead.lead_id as lead_id,
					lead.customername as customername,
					lead.mobile as mobile,
					lead.company as company,
					lead.leadsource as leadsource,
					lead.leadstatus as leadstatus,
					lead.assignee as assignee,
					lead.ordervalue as ordervalue,
					lead.status as status
					
					FROM lead where lead.status="Open" and lead.assignee=:user and lead.leadstatus="Cold" or lead.leadstatus="Lead"');
					 $this->db->bind(':user',$user);
					$results = $this->db->resultSet();
					return $results;
	
}
//--------------------------------------------------------------------------------------------------------------

public function getleadhistory($lead_id)
{
	$this->db->query('SELECT *,
					 lead_update.lead_id as lead_id,
					 lead_update.nextaction as nextaction,
					 lead_update.nextactiondate as nextactiondate,
					 actiontaken.actiontaken as actiontaken,
					 lead_update.customername as customername,
					 lead_update.product as product,
					lead_update.ordervalue as ordervalue,
					lead_update.product as productname,
					 lead_update.assignee as assignee
					 
					 
	from lead_update
	 INNER JOIN actiontaken ON lead_update.actiontaken = actiontaken.id 
	 where lead_update.lead_id =:lead_id ORDER BY updated_at DESC
	');
	$this->db->bind(':lead_id',$lead_id);
	$results = $this->db->resultSet();
	return $results;
}
public function getallcustomers()
{
	$this->db->query('SELECT * FROM lead');
	$results = $this->db->resultSet();
	return $results;
}
public function getcustomerleadlist($user)
{
	$this->db->query('SELECT * FROM lead where assignee = :id and status="Open"');
	  $this->db->bind(':id', $user);
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

public function getallvertical()
{
	 $this->db->query('SELECT * from vertical_master');
	 $results = $this->db->resultSet();
	 return $results;
}
public function getalloemmaster()
{
	$this->db->query('SELECT * from oem_master');
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
public function getchecklead($id){
	$this->db->query("SELECT *,
					  lead.id as id,
					  lead.lead_id as lead_id,
					  lead.customername as customername,
					  lead.phone as phone,
					  lead.mobile as mobile,
					  lead.email as email,
					  lead.assignee as assignee
					  from lead where lead.id = :id");
	 $this->db->bind(':id', $id);
    $row = $this->db->single();
	return $row;
	  if($this->db->rowCount() > 0){
		return true;
	  } else {
		return false;
	  }
}
public function getCloseLeadById($id){
	$this->db->query("SELECT *, 
                    lead.id as id,
					lead.lead_id as lead_id,
					lead.leadowner as leadowner,
					lead.customertype as customertype,
					lead.customername as customername,
					lead.company as company,
					lead.industry as leadindustry,				
					lead.leadsource as leadsource,				
					lead.phone as phone,
					lead.mobile as mobile,
					lead.vertical as leadvertical,				
					lead.leadstatus as leadstatus,
					lead.oem as leadoem,				
					lead.product as product,
					lead.assignee as assignee,
					lead.ordervalue as ordervalue,
					lead.closuredate as closuredate,
					lead.created_at as created_date
					from lead where lead.id= :id");
					 $this->db->bind(':id', $id);
    $row = $this->db->single();
	return $row;
	  if($this->db->rowCount() > 0){
		return true;
	  } else {
		return false;
	  }
}
public function getLeadById($id){
    $this->db->query("SELECT *, 
                    lead.id as id,
					lead.lead_id as lead_id,
					lead.leadowner as leadowner,
					lead.customertype as customertype,
					lead.customername as customername,
					lead.company as company,
					lead.industry as leadindustry,					
					lead.leadsource as leadsource,					
					lead.phone as phone,
					lead.mobile as mobile,
					lead.mobile as email,
					lead.vertical as leadvertical,					
					lead.leadstatus as leadstatus,
					lead.oem as leadoem,					
					lead.product as product,
					lead.assignee as assignee,
					lead.ordervalue as ordervalue,
					lead.closuredate as closuredate,
					lead.status as status,
					lead.created_at as created_at
					
  from lead     where lead.id= :id");
    $this->db->bind(':id', $id);
    $row = $this->db->single();
	return $row;
	  if($this->db->rowCount() > 0){
		return true;
	  } else {
		return false;
	  }
}

public function getonlineLeadById($id){
    $this->db->query("SELECT *, 
                    lead.id as id,
					lead.lead_id as lead_id,
					lead.leadowner as leadowner,
					lead.customertype as customertype,
					lead.customername as customername,
					lead.company as company,
					lead.industry as leadindustry,					
					lead.leadsource as leadsource,					
					lead.phone as phone,
					lead.mobile as mobile,
					lead.vertical as leadvertical,					
					lead.leadstatus as leadstatus,
					lead.oem as leadoem,					
					lead.product as product,
					lead.assignee as assignee,
					lead.ordervalue as ordervalue,
					lead.closuredate as closuredate
	from lead 
	where lead.id= :id");
    $this->db->bind(':id', $id);
    $row = $this->db->single();
	return $row;
	  if($this->db->rowCount() > 0){
		return true;
	  } else {
		return false;
	  }
}

public function getMeetingLeadById($id){
    $this->db->query("SELECT *, 
                    lead.id as id,
					lead.lead_id as lead_id,
					lead.customername as customername,
					lead.company as company,
					lead.email as customeremail,
					lead.created_at as created_date,
					lead.assignee as useremail
	from lead 
    where lead.id= :id");
    $this->db->bind(':id', $id);
    $row = $this->db->single();
	return $row;
	  if($this->db->rowCount() > 0){
		return true;
	  } else {
		return false;
	  }
}

public function getMomLeadById($id){
    $this->db->query("SELECT *, 
                    lead.id as id,
					lead.lead_id as lead_id,
					lead.customername as customername,
					lead.company as company,
					lead.email as customeremail,
					lead.created_at as created_date,
					lead.assignee as useremail
					
	
	from lead 
    where lead.id= :id");
    $this->db->bind(':id', $id);
    $row = $this->db->single();
	return $row;
	  if($this->db->rowCount() > 0){
		return true;
	  } else {
		return false;
	  }
}

public function insertmeeting($lead_id,$from_name,$from_address,$to_name,$to_address,$startTime,$endTime,$subject,$description,$location)
{
	$this->db->query('INSERT INTO meetinginfo (lead_id, from_name, from_address, to_name, to_address, startTime, endTime, subject, description, location) VALUES(:lead_id, :from_name, :from_address,:to_name, :to_address, :startTime, :endTime, :subject, :description, :location)');
	$this->db->bind(':lead_id', $lead_id);
	$this->db->bind(':from_name', $from_name);
	$this->db->bind(':from_address', $from_address);
	$this->db->bind(':to_name', $to_name);
	$this->db->bind(':to_address', $to_address);
	$this->db->bind(':startTime', $startTime);
	$this->db->bind(':endTime', $endTime);
	$this->db->bind(':subject', $subject);
	$this->db->bind(':description', $description);
	$this->db->bind(':location', $location);
	 if($this->db->execute())
	 {
		return true;
	 }
	 else 
	 {
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
public function getpaymentlist($email)
{
	$status1='0';
	//$status2='Postponed';
	$this->db->query('SELECT *,
					closed_lead.id as id,
					closed_lead.lead_id as lead_id,
					closed_lead.customername as fname,
					closed_lead.product as product,
					closed_lead.company as company,
					closed_lead.number as number,
					closed_lead.email as email,
					closed_lead.assignee as assignee,
					closed_lead.closure_value as value,
					closed_lead.payment_mode as payment,
					closed_lead.closed_at as closed_at,
					closed_lead.payment_status as payment_status
					
					 FROM closed_lead where payment_status =:status1 AND assignee=:email ORDER BY closed_lead.closed_at ASC');
	$this->db->bind(':email', $email);
	$this->db->bind(':status1', $status1);
	$results = $this->db->resultSet();
	return $results;
}

//-------------------------------------------------------------------------------------------------------
public function closepaymentlist($id,$flag){
  $this->db->query('UPDATE closed_lead SET payment_status = :flag  WHERE id = :id');
  // Bind values      
  $this->db->bind(':id', $id);
  $this->db->bind(':flag', $flag);
   // Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}

//------------------------------------------------------------------------------------------------------------
public function getamclist($email)
{
	//$status1='0';
	//$status2='Postponed';
	$this->db->query('SELECT *,
					amc_master.id as id,
					amc_master.clientname as name,
					amc_master.contact_person as contact_person,				
					amc_master.number as number,
					amc_master.email as email,
					amc_master.product as product,									
					amc_master.ordervalue as value,
					amc_master.start_date as date1,
					amc_master.end_date as date2,					
					amc_master.accountmanager as assignee
					
					 FROM amc_master where accountmanager=:email ORDER BY end_date  DESC');
	$this->db->bind(':email', $email);
	$results = $this->db->resultSet();
	return $results;
}

//-------------------------------------------------------------------------------------------------------
public function getwonlist1($email)
{
	//$status1='0';
	//$status2='Postponed';
	$this->db->query('SELECT *,
					closed_lead.id as id,
					closed_lead.lead_id as lead_id,
					closed_lead.customername as name,
					closed_lead.product as product,
					closed_lead.company as company,
					closed_lead.number as number,
					closed_lead.email as email,
					closed_lead.assignee as assignee,
					closed_lead.closure_value as value,
					closed_lead.payment_mode as payment,
					closed_lead.closed_at as closed_at,
					closed_lead.payment_status as payment_status
					
					 FROM closed_lead where assignee=:email AND YEAR(closed_at) = YEAR(NOW()) AND MONTH(closed_at)=MONTH(NOW()) ORDER BY Closed_at DESC');
	$this->db->bind(':email', $email);
	$results = $this->db->resultSet();
	return $results;
}

//-------------------------------------------------------------------------------------------------------
public function getdroplist1($email)
{
	//$status1='0';
	//$status2='Postponed';
	$this->db->query('SELECT *,
					drop_lead.id as id,
					drop_lead.lead_id as lead_id,
					drop_lead.customername as name,					
					drop_lead.company as company,
					drop_lead.product as product,				
					drop_lead.ordervalue as value,
					drop_lead.assignee as assignee,
					drop_lead.dropreason as reason,
					drop_lead.dropped_at as closed_at
					
					
					 FROM drop_lead where assignee=:email AND YEAR(dropped_at) = YEAR(NOW()) AND MONTH(dropped_at)=MONTH(NOW()) ORDER BY dropped_at DESC');
	$this->db->bind(':email', $email);
	$results = $this->db->resultSet();
	return $results;
}

//-------------------------------------------------------------------------------------------------------
public function getlostlist1($email)
{
	//$status1='0';
	//$status2='Postponed';
	$this->db->query('SELECT *,
					lost_lead.id as id,
					lost_lead.lead_id as lead_id,
					lost_lead.customername as name,					
					lost_lead.company as company,
					lost_lead.product as product,				
					lost_lead.ordervalue as value,
					lost_lead.assignee as assignee,
					lost_lead.lostreason as reason,
					lost_lead.losttowhom as whom,
					lost_lead.lost_at as closed_at
					
					
					 FROM lost_lead where assignee=:email AND YEAR(lost_at) = YEAR(NOW()) AND MONTH(lost_at)=MONTH(NOW()) ORDER BY lost_at DESC');
	$this->db->bind(':email', $email);
	$results = $this->db->resultSet();
	return $results;
}

//-------------------------------------------------------------------------------------------------------
public function getpostlist1($email)
{
	//$status1='0';
	//$status2='Postponed';
	$this->db->query('SELECT *,
					postponed_lead.id as id,
					postponed_lead.lead_id as lead_id,
					postponed_lead.customername as name,					
					postponed_lead.company as company,
					postponed_lead.product as product,				
					postponed_lead.ordervalue as value,
					postponed_lead.assignee as assignee,					
					postponed_lead.postponeddate as whom,
					postponed_lead.postponedreason as reason,
					postponed_lead.created_at as closed_at
					
					
					 FROM postponed_lead where assignee=:email AND YEAR(created_at) = YEAR(NOW()) AND MONTH(created_at)=MONTH(NOW()) ORDER BY created_at DESC');
	$this->db->bind(':email', $email);
	$results = $this->db->resultSet();
	return $results;
}

//-------------------------------------------------------------------------------------------------------
public function getwonlist()
{
	//$status1='0';
	//$status2='Postponed';
	$this->db->query('SELECT *,
					closed_lead.id as id,
					closed_lead.lead_id as lead_id,
					closed_lead.customername as name,
					closed_lead.product as product,
					closed_lead.company as company,
					closed_lead.number as number,
					closed_lead.email as email,
					closed_lead.assignee as assignee,
					closed_lead.closure_value as value,
					closed_lead.payment_mode as payment,
					closed_lead.closed_at as closed_at,
					closed_lead.payment_status as payment_status
					
					 FROM closed_lead where  YEAR(closed_at) = YEAR(NOW()) AND MONTH(closed_at)=MONTH(NOW()) ORDER BY Closed_at DESC');
	
	$results = $this->db->resultSet();
	return $results;
}

//-------------------------------------------------------------------------------------------------------
public function getdroplist()
{
	//$status1='0';
	//$status2='Postponed';
	$this->db->query('SELECT *,
					drop_lead.id as id,
					drop_lead.lead_id as lead_id,
					drop_lead.customername as name,					
					drop_lead.company as company,
					drop_lead.product as product,				
					drop_lead.ordervalue as value,
					drop_lead.assignee as assignee,
					drop_lead.dropreason as reason,
					drop_lead.dropped_at as closed_at
					
					
					 FROM drop_lead where  YEAR(dropped_at) = YEAR(NOW()) AND MONTH(dropped_at)=MONTH(NOW()) ORDER BY dropped_at DESC');
	
	$results = $this->db->resultSet();
	return $results;
}

//-------------------------------------------------------------------------------------------------------
public function getlostlist()
{
	//$status1='0';
	//$status2='Postponed';
	$this->db->query('SELECT *,
					lost_lead.id as id,
					lost_lead.lead_id as lead_id,
					lost_lead.customername as name,					
					lost_lead.company as company,
					lost_lead.product as product,				
					lost_lead.ordervalue as value,
					lost_lead.assignee as assignee,
					lost_lead.lostreason as reason,
					lost_lead.losttowhom as whom,
					lost_lead.lost_at as closed_at
					
					
					 FROM lost_lead where  YEAR(lost_at) = YEAR(NOW()) AND MONTH(lost_at)=MONTH(NOW()) ORDER BY lost_at DESC');
	
	$results = $this->db->resultSet();
	return $results;
}

//-------------------------------------------------------------------------------------------------------
public function getpostlist()
{
	//$status1='0';
	//$status2='Postponed';
	$this->db->query('SELECT *,
					postponed_lead.id as id,
					postponed_lead.lead_id as lead_id,
					postponed_lead.customername as name,					
					postponed_lead.company as company,
					postponed_lead.product as product,				
					postponed_lead.ordervalue as value,
					postponed_lead.assignee as assignee,					
					postponed_lead.postponeddate as whom,
					postponed_lead.postponedreason as reason,
					postponed_lead.created_at as closed_at
					
					
					 FROM postponed_lead where YEAR(created_at) = YEAR(NOW()) AND MONTH(created_at)=MONTH(NOW()) ORDER BY created_at DESC');
	
	$results = $this->db->resultSet();
	return $results;
}

//-------------------------------------------------------------------------------------------------------
}