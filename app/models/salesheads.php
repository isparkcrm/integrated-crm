<?php 
use PHPMailer\PHPMailer\PHPMailerAutoload;
use PHPMailer\PHPMailer\Exception;
  class Salesheads {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }


public function getalllusers()
{
	$this->db->query('SELECT * FROM users where role="Account Manager"');
	$results = $this->db->resultSet();
	return $results;
}

public function Insertlead($data)
{
	
	$gid = substr($data['lname'],0,3);
          date_default_timezone_set('Asia/Kolkata');
          $m = date('h');
          $y = date('i');
          $d = date('s');
          $tid = $gid.$y.$m.$d;  
    
	$this->db->query('INSERT INTO lead (lead_id, leadowner, salutation, fname, lname, title, company, website, industry, other, other1, leadsource, phone, noofemp, mobile, email, vertical, verticalother, oem, oemother, product, leadstatus, assignee, ordervalue, closuredate, status) VALUES (:tid, :leadowner, :salutation, :fname, :lname, :title, :company, :website, :industry, :other, :other1, :leadsource, :phone, :noofemp, :mobile, :email, :vertical, :verticalother, :oem, :oemother, :product, :leadstatus, :assignee, :ordervalue, :closuredate, :status)');
	$this->db->bind(':tid', $tid);
	$this->db->bind(':leadowner', $data['leadowner']);
	$this->db->bind(':salutation', $data['salutation']);
	$this->db->bind(':fname', $data['fname']);
	$this->db->bind(':lname', $data['lname']);
	$this->db->bind(':title', $data['title']);
	$this->db->bind(':company', $data['company']);
	$this->db->bind(':website', $data['website']);
	$this->db->bind(':industry', $data['industry']);
	$this->db->bind(':other', $data['other']);
	$this->db->bind(':leadsource', $data['leadsource']);
	$this->db->bind(':other1', $data['other1']);
	$this->db->bind(':phone', $data['phone']);
	$this->db->bind(':noofemp', $data['noofemp']);
	$this->db->bind(':mobile', $data['mobile']);
	$this->db->bind(':email', $data['email']);
	$this->db->bind(':vertical', $data['vertical']);
	$this->db->bind(':verticalother', $data['verticalother']);
	$this->db->bind(':leadstatus', $data['leadstatus']);
	$this->db->bind(':oem', $data['oem']);
	$this->db->bind(':oemother', $data['oemother']);
	$this->db->bind(':product', $data['product']);
	$this->db->bind(':assignee', $data['assignee']);
	$this->db->bind(':ordervalue', $data['ordervalue']);
	$this->db->bind(':closuredate', $data['closuredate']);
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

public function getassigne($id)
{
	$this->db->query('SELECT * FROM lead where id=:id');
	$this->db->bind(':id', $id);
	$row = $this->db->single();
  return $row;
  if($this->db->rowCount() > 0){
    return true;
  } else {
    return false;
  }
    
}

public function Insertstatus($data)
{
	$this->db->query('INSERT INTO lead_update (lead_id, actiontaken, nextaction, nextactiondate) VALUES (:lead_id, :actiontaken, :nextaction, :nextactiondate)');
	$this->db->bind(':lead_id', $data['lead_id']);
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
 public function leadclose($data)
{
	$leadcloseid = substr($_SESSION['username'],0,5);
          date_default_timezone_set('Asia/Kolkata');
          $m = date('h');
          $y = date('i');
          $d = date('s');
          $updated_by = $leadcloseid.$y.$m.$d;  
	
	$this->db->query('INSERT INTO closed_lead (lead_id, leadowner, lname, company, industry, leadsource, product, ordervalue, closedate, closecommit, closereason, status, updated_by) VALUES (:lead_id, :leadowner, :lname, :company, :industry, :leadsource, :product, :ordervalue, :closedate, :closecommit, :closereason, :status, :updated_by)');
	$this->db->bind(':lead_id', $data['lead_id']);
	$this->db->bind(':leadowner', $data['leadowner']);
	$this->db->bind(':lname', $data['lname']);
	$this->db->bind(':company', $data['company']);
	$this->db->bind(':industry', $data['industry']);
	$this->db->bind(':leadsource', $data['leadsource']);
	$this->db->bind(':product', $data['product']);
	$this->db->bind(':ordervalue', $data['ordervalue']);
	$this->db->bind(':closedate', $data['closedate']);
	$this->db->bind(':closecommit', $data['closecommit']);
	$this->db->bind(':closereason', $data['closereason']);
	$this->db->bind(':status', $data['status']);
	$this->db->bind(':updated_by', $updated_by);
	 if($this->db->execute())
	 {
		return true;
	 }
	 else 
	 {
		return false;
     }
}

public function leaddrop($data)
{
	$leadcloseid = ($_SESSION['username']);
          date_default_timezone_set('Asia/Kolkata');
          $m = date('h');
          $y = date('i');
          $d = date('s');
          $updated_by = $leadcloseid.$y.$m.$d;  
	
	$this->db->query('INSERT INTO drop_lead (lead_id, leadowner, lname, company, industry, leadsource, product, ordervalue, dropdate, dropreason, status, updated_by) VALUES (:lead_id, :leadowner, :lname, :company, :industry, :leadsource, :product, :ordervalue, :dropdate, :dropreason, :status, :updated_by)');
	$this->db->bind(':lead_id', $data['lead_id']);
	$this->db->bind(':leadowner', $data['leadowner']);
	$this->db->bind(':lname', $data['lname']);
	$this->db->bind(':company', $data['company']);
	$this->db->bind(':industry', $data['industry']);
	$this->db->bind(':leadsource', $data['leadsource']);
	$this->db->bind(':product', $data['product']);
	$this->db->bind(':ordervalue', $data['ordervalue']);
	$this->db->bind(':dropdate', $data['dropdate']);
	$this->db->bind(':dropreason', $data['dropreason']);
	$this->db->bind(':status', $data['status']);
	$this->db->bind(':updated_by', $updated_by);
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
	$leadcloseid = ($_SESSION['username']);
          date_default_timezone_set('Asia/Kolkata');
          $m = date('h');
          $y = date('i');
          $d = date('s');
          $updated_by = $leadcloseid.$y.$m.$d;  
	
	$this->db->query('INSERT INTO lost_lead (lead_id, leadowner, lname, company, industry, leadsource, product, ordervalue, lostdate, lostreason, losttowhom, status, updated_by) VALUES (:lead_id, :leadowner, :lname, :company, :industry, :leadsource, :product, :ordervalue, :lostdate, :lostreason, :losttowhom, :status, :updated_by)');
	$this->db->bind(':lead_id', $data['lead_id']);
	$this->db->bind(':leadowner', $data['leadowner']);
	$this->db->bind(':lname', $data['lname']);
	$this->db->bind(':company', $data['company']);
	$this->db->bind(':industry', $data['industry']);
	$this->db->bind(':leadsource', $data['leadsource']);
	$this->db->bind(':product', $data['product']);
	$this->db->bind(':ordervalue', $data['ordervalue']);
	$this->db->bind(':lostdate', $data['lostdate']);
	$this->db->bind(':lostreason', $data['lostreason']);
	$this->db->bind(':losttowhom', $data['losttowhom']);
	$this->db->bind(':status', $data['status']);
	$this->db->bind(':updated_by', $updated_by);
	 if($this->db->execute())
	 {
		return true;
	 }
	 else 
	 {
		return false;
     }
}

public function leadpostponed($data)
{
	$leadcloseid = ($_SESSION['username']);
          date_default_timezone_set('Asia/Kolkata');
          $m = date('h');
          $y = date('i');
          $d = date('s');
          $updated_by = $leadcloseid.$y.$m.$d;  
	
	$this->db->query('INSERT INTO postponed_lead (lead_id, leadowner, lname, company, industry, leadsource, product, ordervalue, postponeddate, postponedreason, status, updated_by) VALUES (:lead_id, :leadowner, :lname, :company, :industry, :leadsource, :product, :ordervalue, :postponeddate, :postponedreason, :status, :updated_by)');
	$this->db->bind(':lead_id', $data['lead_id']);
	$this->db->bind(':leadowner', $data['leadowner']);
	$this->db->bind(':lname', $data['lname']);
	$this->db->bind(':company', $data['company']);
	$this->db->bind(':industry', $data['industry']);
	$this->db->bind(':leadsource', $data['leadsource']);
	$this->db->bind(':product', $data['product']);
	$this->db->bind(':ordervalue', $data['ordervalue']);
	$this->db->bind(':postponeddate', $data['postponeddate']);
	$this->db->bind(':postponedreason', $data['postponedreason']);
	$this->db->bind(':status', $data['status']);
	$this->db->bind(':updated_by', $updated_by);
	 if($this->db->execute())
	 {
		return true;
	 }
	 else 
	 {
		return false;
     }
}

public function assigneetoagent($data)
{
	
	$this->db->query('UPDATE Lead SET assignee =:users where id=:id');
	$this->db->bind(':id', $data['id']);
	$this->db->bind(':users', $data['users']);
	if($this->db->execute())
	{
		return true;
	} 
	else 
	{
		return false;
	}
}

public function updateLead($data)
{
	$this->db->query('UPDATE Lead SET leadowner=:leadowner, salutation=:salutation, fname=:fname, lname=:lname, title=:title, company=:company, website=:website, industry=:industry, other=:other, leadsource=:leadsource, other1=:other1, phone=:phone, noofemp=:noofemp, mobile=:mobile, email=:email, vertical=:vertical, verticalother=:verticalother, leadstatus=:leadstatus, oem=:oem, oemother=:oemother, product=:product, assignee=:assignee, ordervalue=:ordervalue, closuredate=:closuredate where id=:id');
	$this->db->bind(':id', $data['id']);
	$this->db->bind(':leadowner', $data['leadowner']);
	$this->db->bind(':salutation', $data['salutation']);
	$this->db->bind(':fname', $data['fname']);
	$this->db->bind(':lname', $data['lname']);
	$this->db->bind(':title', $data['title']);
	$this->db->bind(':company', $data['company']);
	$this->db->bind(':website', $data['website']);
	$this->db->bind(':industry', $data['industry']);
	$this->db->bind(':other', $data['other']);
	$this->db->bind(':leadsource', $data['leadsource']);
	$this->db->bind(':other1', $data['other1']);
	$this->db->bind(':phone', $data['phone']);
	$this->db->bind(':noofemp', $data['noofemp']);
	$this->db->bind(':mobile', $data['mobile']);
	$this->db->bind(':email', $data['email']);
	$this->db->bind(':vertical', $data['vertical']);
	$this->db->bind(':verticalother', $data['verticalother']);
	$this->db->bind(':leadstatus', $data['leadstatus']);
	$this->db->bind(':oem', $data['oem']);
	$this->db->bind(':oemother', $data['oemother']);
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

public function updateleadtable($data)
{
	$this->db->query('UPDATE lead SET status = :status where id=:id');
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
public function getupdatelist($id)
{
	$this->db->query('SELECT *,
                    lead_update.id as id,
                    lead_update.lead_id as lead_id,
                    lead_update.actiontaken as actiontaken,
                    lead_update.nextaction as nextaction,
                    lead_update.nextactiondate as nextactiondate,
					actiontaken.actiontaken as actiontaken
					
                    FROM lead_update

                    INNER JOIN actiontaken ON lead_update.actiontaken=actiontaken.id where lead_update.id = :id');
					 $this->db->bind(':id', $id);
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


public function getallleadlist()
{
	$this->db->query('SELECT *,
					lead.id as id,
					lead.lead_id as lead_id,
					lead.fname as fname,
					lead.mobile as mobile,
					lead.company as company,
					lead.leadsource as leadsource,
					lead.leadstatus as leadstatus,
					lead.assignee as assignee,
					lead.ordervalue as ordervalue,
					users.username as username

					FROM lead INNER JOIN users ON lead.assignee = users.id ');
	$results = $this->db->resultSet();
	 
	return $results;
}

public function getleadlist($oem)
{
	$this->db->query('SELECT * FROM lead where oem = :oem');
	 $this->db->bind(':oem', $oem);
	$results = $this->db->resultSet();
	return $results;
}
public function getsalesleadlist($sales)
{
	$this->db->query('SELECT * FROM lead where leadowner = :sales');
	 $this->db->bind(':sales', $sales);
	$results = $this->db->resultSet();
	return $results;
}
public function getadminleadlist()
{
	$this->db->query('SELECT *,
					lead.id as id,
					lead.lead_id as lead_id,
					lead.fname as fname,
					lead.mobile as mobile,
					lead.company as company,
					lead.leadsource as leadsource,
					lead.leadstatus as leadstatus,
					lead.assignee as assignee,
					lead.ordervalue as ordervalue,
					users.username as username

					FROM lead INNER JOIN users ON lead.assignee = users.id ');
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

//-----------------------------------------------------------------------------------------------------------------

public function getLeadById($id){
  $this->db->query("SELECT * from lead where id=:id");
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

public function getpaymentlist()
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
					
					 FROM closed_lead where payment_status =:status1  ORDER BY closed_lead.closed_at ASC');
	
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
public function getamclist()
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
					
					 FROM amc_master  ORDER BY end_date  DESC');
	
	$results = $this->db->resultSet();
	return $results;
}

//-------------------------------------------------------------------------------------------------------


//-------------------------------------------------------------------------------------------------------
}