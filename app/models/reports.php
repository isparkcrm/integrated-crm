<?php
use PHPMailer\PHPMailer\PHPMailerAutoload;
use PHPMailer\PHPMailer\Exception;
  class Reports {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Regsiter user
 public function getclientreport()
 {
	 $this->db->query('SELECT COUNT(id) AS total FROM target_master');
	  $row = $this->db->single();
		$total = $row->total;
		return $total;
 }

 public function getclientlist($i)
 {
 	$this->db->query('SELECT name from target_master where id=:id');
 	$this->db->bind(':id',$i);
 	$row = $this->db->single();
  $clientID = $row->name;
  return $clientID;
 }
public function getindividualacheive($i){
	$this->db->query('SELECT SUM(ordervalue) AS total FROM lead WHERE status="Close"');
	$this->db->bind(':id',$i);
	 $row = $this->db->single();
	$total = $row->total;
	return $total;
}

public function performancewisepercentage($i,$usertargetamout){
	$this->db->query('SELECT SUM(ordervalue) AS total FROM lead WHERE status="Close"');
	$this->db->bind(':id',$i);
	 $row = $this->db->single();
	 $number = $row->total;
	 $per= ($number/$usertargetamout)*100; 
	   $percentage= (int)round($per);
	  echo $percentage."%";
}
 
 public function getnewclientreport($i)
 {
	 $this->db->query('SELECT COUNT(customertype) AS total FROM lead WHERE customertype ="New" and id=:id');
	 $this->db->bind(':id',$i);
	 $row = $this->db->single();
	$total = $row->total;
	return $total;
 }
  public function getexistingclientreport($i)
 {
	 $this->db->query('SELECT COUNT(customertype) AS total FROM lead WHERE customertype ="Existing" and id=:id');
	 $this->db->bind(':id',$i);
	 $row = $this->db->single();
	$total = $row->total;
	return $total;
 }  
   
   
   public function getclosurereport(){
	   $this->db->query('SELECT *,
						 closed_lead.id as id,
						 closed_lead.product as product,
						 closed_lead.customername as customername,
						 closed_lead.ordervalue as ordervalue,
						 closed_lead.closed_at as closedate,
						 closed_lead.created_at as created_at,								
						 closed_lead.assignee as username
						 from closed_lead 
						 where YEAR(closed_lead.closed_at) = YEAR(NOW()) ORDER BY closed_lead.closed_at DESC');
	   $results = $this->db->resultSet();
		return $results;
   }
    public function getproductreport(){
	    $this->db->query('SELECT * from vertical_master');
	   $results = $this->db->resultSet();
		return $results;
	   
   }
public function verticalcount(){
	$this->db->query('SELECT  COUNT(id) AS total FROM vertical_master');
  $row = $this->db->single();
  $verticalID = $row->total;
  return $verticalID;
}   
public function verticalname($i){
  $this->db->query('SELECT verticalname FROM vertical_master WHERE id=:id');
   $this->db->bind(':id', $i);
  $row = $this->db->single();
  $verticalID = $row->verticalname;
  return $verticalID;
	}
	public function achievedvalue($i)
	{
		$this->db->query('SELECT SUM(ordervalue) AS total FROM lead WHERE status="Close" and vertical=:i');
		$this->db->bind(':i', $i);
		$row = $this->db->single();
		$achieveID = $row->total;
		return $achieveID;
		
	}
		public function verticalwisepercentage($i,$targetamout)
	{
		$this->db->query('SELECT SUM(ordervalue) AS total FROM lead WHERE status="Close" and vertical=:i');
		$this->db->bind(':i', $i);
		$row = $this->db->single();
		$achieveID = $row->total;
		$per= ($achieveID/$targetamout)*100;
		$percentage= (int)round($per);
		return $percentage . "%";
	}

	public function performancewisepending($i,$usertargetamout)
	{
		$this->db->query('SELECT SUM(ordervalue) AS total FROM lead WHERE status="Close" and vertical=:i');
		$this->db->bind(':i', $i);
			$row = $this->db->single();
			$total = $row->total;
			$per= $usertargetamout-$total;
			return $per;
	}
		public function verticalwisepending($i,$targetamout)
		{
			$this->db->query('SELECT SUM(ordervalue) AS total FROM lead WHERE status="Close" and vertical=:i');
			$this->db->bind(':i', $i);
			$row = $this->db->single();
			$total = $row->total;
			$per= $targetamout-$total;
			return $per;
		}
		public function verticalwisecommit($i)
		{
			$this->db->query('SELECT SUM(ordervalue) AS total FROM lead WHERE status="Open" and vertical=:i and leadstatus="Commit"');
			$this->db->bind(':i', $i);
			$row = $this->db->single();
			$commit = $row->total;
			return $commit;
		}

		public function gettargetmaster($i)
		{
				 $this->db->query('SELECT * from target_master WHERE id=:id');
				   $this->db->bind(':id', $i);
				   $row = $this->db->single();
				$q1 = $row->q1;
				$q2 = $row->q2;
				$q3 = $row->q3;
				$q4 = $row->q4;
				$total = $q1+$q2+$q3+$q4;
				return $total;
		}
   public function getverticaltargetreport($i)
   {
	   
	   $this->db->query('SELECT * from vertical_target WHERE id=:id');
	   $this->db->bind(':id', $i);
	   $row = $this->db->single();
	$q1 = $row->q1targetamount;
	$q2 = $row->q2targetamount;
	$q3 = $row->q3targetamount;
	$q4 = $row->q4targetamount;
	$total = $q1+$q2+$q3+$q4;
	return $total;
   }
//-------------------------------------------------------------------------------------------------------
}