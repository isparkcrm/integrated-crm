<?php
use PHPMailer\PHPMailer\PHPMailerAutoload;
use PHPMailer\PHPMailer\Exception;
  class Master {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Regsiter user

   
    public function verticalMaster($data)
	{    
		$this->db->query('INSERT INTO vertical_master (verticalname) VALUES(:verticalname)');
		$this->db->bind(':verticalname', $data['verticalname']);
		if($this->db->execute())
		{
			return true;
	    } else 
		{
			return false;
		}
    }
	public function Insertindividualtarget($data)
{
	
	$this->db->query('INSERT INTO individualtarget (outboundcaller,q1amount,q2amount,q3amount,q4amount) VALUES (:outboundcaller,:q1amount,:q2amount,:q3amount,:q4amount)');
	$this->db->bind(':outboundcaller', $data['outboundcaller']);
	$this->db->bind(':q1amount', $data['q1amount']);
	$this->db->bind(':q2amount', $data['q2amount']);
	$this->db->bind(':q3amount', $data['q3amount']);
	$this->db->bind(':q4amount', $data['q4amount']);	
   if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}

	public function Updateindividualtarget($data)
	{
		$this->db->query('UPDATE individualtarget SET outboundcaller =:outboundcaller, q1amount=:q1amount, q2amount=:q2amount, q3amount=:q3amount, q4amount=:q4amount WHERE id=:id ');
		$this->db->bind(':id', $data['id']);
		$this->db->bind(':outboundcaller', $data['outboundcaller']);
		$this->db->bind(':q1amount', $data['q1amount']);
		$this->db->bind(':q2amount', $data['q2amount']);
		$this->db->bind(':q3amount', $data['q3amount']);
		$this->db->bind(':q4amount', $data['q4amount']);	
	   if($this->db->execute()){
		return true;
		} else {
		return false;
		}
	}

	public function Insertverticaltarget($data)
{
	
	$this->db->query('INSERT INTO vertical_target (verticals,q1targetamount,q2targetamount,q3targetamount,q4targetamount) VALUES (:verticals,:q1targetamount,:q2targetamount,:q3targetamount,:q4targetamount)');
	$this->db->bind(':verticals', $data['verticals']);
	$this->db->bind(':q1targetamount', $data['q1targetamount']);
	$this->db->bind(':q2targetamount', $data['q2targetamount']);
	$this->db->bind(':q3targetamount', $data['q3targetamount']);
	$this->db->bind(':q4targetamount', $data['q4targetamount']);	
   if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}

public function Updateverticaltarget($data)
{
	
	$this->db->query('UPDATE vertical_target SET verticals =:verticals, q1targetamount=:q1targetamount, q2targetamount=:q2targetamount, q3targetamount=:q3targetamount, q4targetamount=:q4targetamount  WHERE id=:id');
	
	$this->db->bind(':id', $data['id']);
	$this->db->bind(':verticals', $data['verticals']);
	$this->db->bind(':q1targetamount', $data['q1targetamount']);
	$this->db->bind(':q2targetamount', $data['q2targetamount']);
	$this->db->bind(':q3targetamount', $data['q3targetamount']);
	$this->db->bind(':q4targetamount', $data['q4targetamount']);	
	if($this->db->execute()){
    return true;
	} else {
    return false;
	}
}

public function getverticaltargetlist()
{
	$this->db->query('select * from vertical_target');
		$results = $this->db->resultSet();
		return $results;
}

public function getindividuallist()
{
	$this->db->query('select *,
					individualtarget.id as id,
					individualtarget.q1amount as q1amount,
					individualtarget.q2amount as q2amount,
					individualtarget.q3amount as q3amount,
					individualtarget.q4amount as q4amount,
					users.username as username
					from individualtarget INNER JOIN users ON individualtarget.outboundcaller = users.id');
					$results = $this->db->resultSet();
		return $results;
}

public function getallverticaltargetlist()
{
	$this->db->query('select *,
					  vertical_target.id as id,
					  vertical_target.q1targetamount as q1targetamount,
					  vertical_target.q2targetamount as q2targetamount,
					  vertical_target.q3targetamount as q3targetamount,
					  vertical_target.q4targetamount as q4targetamount,
					  vertical_master.verticalname as verticalname
					 from vertical_target INNER JOIN vertical_master ON vertical_target.verticals = vertical_master.id');
		$results = $this->db->resultSet();
		return $results;
}

public function getalldepartment()
{
	$this->db->query('select * from vertical_master');
		$results = $this->db->resultSet();
		return $results;
}
	
	public function getallusers()
	{
		$this->db->query('SELECT * from users where role ="Account Manager"');
		 $results = $this->db->resultSet();
		return $results;
	}
	
	public function oemMaster($data)
	{    
		$this->db->query('INSERT INTO oem_master (oemname) VALUES(:oemname)');
		$this->db->bind(':oemname', $data['oemname']);
		if($this->db->execute())
		{
			return true;
	    } else 
		{
			return false;
		}
    }
	
	public function productMaster($data)
	{    
		$this->db->query('INSERT INTO product_master (productname) VALUES(:productname)');
		
		$this->db->bind(':productname', $data['productname']);
		if($this->db->execute())
		{
			return true;
	    } else 
		{
			return false;
		}
    }
	public function updateVertical($data){
  $this->db->query('UPDATE vertical_master SET verticalname = :verticalname  WHERE id = :id');
  // Bind values      
  $this->db->bind(':id', $data['id']);
  $this->db->bind(':verticalname', $data['verticalname']);

  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}

public function updateOem($data){
  $this->db->query('UPDATE oem_master SET oemname = :oemname  WHERE id = :id');
  // Bind values      
  $this->db->bind(':id', $data['id']);
  $this->db->bind(':oemname', $data['oemname']);

  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}
//--------------------------------------------------------------------------------------------------------
public function updateProduct($data){
  $this->db->query('UPDATE product_master SET productname = :productname  WHERE id = :id');
  // Bind values      
  $this->db->bind(':id', $data['id']);
  $this->db->bind(':productname', $data['productname']);

  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}

//----------------------------------------------------------------------------------------------------------	
public function getVerticalById($id){
  $this->db->query("SELECT * from vertical_master WHERE id = :id");
  $this->db->bind(':id', $id);
  $row = $this->db->single();
  return $row;
  if($this->db->rowCount() > 0){
    return true;
  } else {
    return false;
  }
}

public function getindividualbyId($id)
{
	$this->db->query('SELECT *,
					 individualtarget.id as id,
					 individualtarget.q1amount as q1amount,
					 individualtarget.q2amount as q2amount,
					 individualtarget.q3amount as q3amount,
					 individualtarget.q4amount as q4amount,
					 users.username as username
					 from individualtarget INNER JOIN users ON individualtarget.outboundcaller = users.id WHERE individualtarget.id =:id');
	$this->db->bind(':id', $id);
  $row = $this->db->single();
  return $row;
  if($this->db->rowCount() > 0){
    return true;
  } else {
    return false;
  }
}


public function getverticaltargetbyId($id)
{
	$this->db->query('SELECT *,
					 vertical_target.id as id,
					 vertical_target.verticals as verticals,
					 vertical_target.q1targetamount as q1targetamount,
					 vertical_target.q2targetamount as q2targetamount,
					 vertical_target.q3targetamount as q3targetamount,
					 vertical_target.q4targetamount as q4targetamount,
					 vertical_master.verticalname as verticalname
					 from vertical_target INNER JOIN vertical_master ON vertical_target.verticals = vertical_master.id WHERE vertical_target.id =:id');
	$this->db->bind(':id', $id);
  $row = $this->db->single();
  return $row;
  if($this->db->rowCount() > 0){
    return true;
  } else {
    return false;
  }
}
public function getproductById($id){
	$this->db->query("SELECT * from product_master WHERE id = :id");
  $this->db->bind(':id', $id);
  $row = $this->db->single();
  return $row;
  if($this->db->rowCount() > 0){
    return true;
  } else {
    return false;
  }
}

public function getOemById($id){
  $this->db->query("SELECT * from oem_master WHERE id = :id");
  $this->db->bind(':id', $id);
  $row = $this->db->single();
  return $row;
  if($this->db->rowCount() > 0){
    return true;
  } else {
    return false;
  }
}

     
public function getVerticalMaster($id)
{
	$this->db->query('SELECT * FROM vertical_master WHERE id = :id ');
  $this->db->bind(':id', $id);
  $results = $this->db->resultSet();
	return $results;
}

public function getoemMaster($id)
{
  $this->db->query('SELECT * FROM oem_master WHERE oemname= :id ');
  $this->db->bind(':id', $id);
  $results = $this->db->resultSet();
  return $results;
}

public function getproductMaster($id)
{
  $this->db->query('SELECT * FROM product_master WHERE productname = :id ');
  $this->db->bind(':id', $id);
  $results = $this->db->resultSet();
  return $results;
}


//-----------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------
    // Find user by email
    public function findVerticalByName($name){
      $this->db->query('SELECT * FROM vertical_master WHERE verticalname = :name');
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
	
	public function findOemByName($name){
      $this->db->query('SELECT * FROM oem_master WHERE oemname = :oemname');
      // Bind value
      $this->db->bind(':oemname', $name);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

  public function findProductByName($name){
      $this->db->query('SELECT * FROM product_master WHERE productname = :name');
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
    public function getVertical()
	{
      $this->db->query('select * from vertical_master');
	  $results = $this->db->resultSet();
	  return $results;
	}
	
//---------------------------------------------------------------------------------------------------------------
  public function getOem()
  {
	  $this->db->query('select * from oem_master');
	  $results = $this->db->resultSet();
	  return $results;
  }
 
  public function getProduct()
  {
	  $this->db->query('select * from product_master');
	  $results = $this->db->resultSet();
	  return $results;
  }
 
 
//-----------------------------------------------------------------------------------------------------------
  
//----------------------------------------------------------------------------------------------------------------

function verticaldelete($id)
{
  $this->db->query('DELETE from vertical_master WHERE id= :id');
 
      $this->db->bind(':id', $id);
    // Execute
      $this->db->execute();
return true;
}
//-----------------------------------------------------------------------------------------------------------------

function oemdelete($id)
{
  $this->db->query('DELETE from oem_master WHERE id= :id');
 
      $this->db->bind(':id', $id);
    // Execute
      $this->db->execute();
return true;
}
//----------------------------------------------------------------------------------------------------------------
function productdelete($id)
{
  $this->db->query('DELETE from product_master WHERE id= :id');
 
      $this->db->bind(':id', $id);
    // Execute
      $this->db->execute();
return true;
}

//-------------------------------------------------------------------------------------------------------
}