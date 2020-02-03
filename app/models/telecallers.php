<?php 
require 'PHPMailer/PHPMailer/PHPMailerAutoload.php';
require 'PHPMailer/PHPMailer/class.phpmailer.php';
require 'PHPMailer/PHPMailer/class.smtp.php';

  class Telecallers {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

public function getallassignedleads($username)
{
	$this->db->query('SELECT * FROM email_leads where assignee =:username');
	$this->db->bind(':username',$username);
	$results = $this->db->resultSet();
	return $results;
}

public function getallemailtolead($sessionuser)
{
	$this->db->query('SELECT * FROM email_leads where assignee=:sessionuser OR assignee="Not Assign"');
	$this->db->bind(':sessionuser', $sessionuser);
	$results = $this->db->resultSet();
	return $results;
}

public function getoutboundlead()
{
	$username = $_SESSION['username'];
	$this->db->query('SELECT * FROM outbound_lead where assignee =:username || assignee ="Not Assign"');
	$this->db->bind(':username',$username);
	$results = $this->db->resultSet();
	return $results;
}
public function getsmslead()
{
	$username = $_SESSION['username'];
	$this->db->query('SELECT * FROM lead where leadsource="SMS" and assignee =:username || assignee="Not Assignee"');
	$this->db->bind(':username',$username);
	$results = $this->db->resultSet();
	return $results;
}
public function getwebsitelead()
{
	$username = $_SESSION['email'];
	$this->db->query('SELECT * FROM website_lead where flag="0" and assignee =:username || assignee ="Not Assignee"');
	$this->db->bind(':username',$username);
	$results = $this->db->resultSet();
	return $results;
}

public function Insertlead($data)
{
	$flag="2";
	$this->db->query('INSERT INTO lead (lead_id, customername, company,leadsource, phone, mobile, email, status, flag) VALUES (:lead_id, :customername, :company,:leadsource, :phone, :mobile, :email, :status, :flag)');
	$this->db->bind(':lead_id', $data['lead_id']);
	$this->db->bind(':customername', $data['customername']);
	$this->db->bind(':company', $data['company']);
	$this->db->bind(':leadsouce', $data['leadsource']);
	$this->db->bind(':phone', $data['phone']);
	$this->db->bind(':mobile', $data['mobile']);
	$this->db->bind(':email', $data['email']);
	$this->db->bind(':status', $data['status']);
	$this->db->bind(':flag', $flag);
	 if($this->db->execute())
	 {
		return true;
	 }
	 else 
	 {
		return false;
     }
}

public function Websitelead($data)
{
	$flag="2";
	$this->db->query('INSERT INTO lead (lead_id, customername, company, phone, mobile, email, status, flag) VALUES (:lead_id, :customername, :company, :phone, :mobile, :email, :status, :flag)');
	$this->db->bind(':lead_id', $data['lead_id']);
	$this->db->bind(':customername', $data['customername']);
	$this->db->bind(':company', $data['company']);
	$this->db->bind(':phone', $data['phone']);
	$this->db->bind(':mobile', $data['mobile']);
	$this->db->bind(':email', $data['email']);
	$this->db->bind(':status', $data['status']);
	$this->db->bind(':flag', $flag);
	if($this->db->execute())
	{
		return true;
	}
	else 
	{
		return false;
    }
}

public function updateemaillead($data)
{

	$this->db->query("UPDATE email_leads SET customername = :customername where id=:id");
	$this->db->bind(':id', $data['id']);
	$this->db->bind(':customername', $data['customername']);
	if($this->db->execute())
	{
		return true;
	} 
	else 
	{
		return false;
	}
	
}

public function updatewebsitelead($flag)
{
	$this->db->query("UPDATE website_lead SET flag = :flag where id=:id");
	$this->db->bind(':id', $data['id']);
	$this->db->bind(':flag', $data['flag']);
	if($this->db->execute())
	{
		return true;
	} 
	else 
	{
		return false;
	}
}

public function getemailleads($id)
{
	$this->db->query("SELECT * FROM email_leads where id=:id");
	$this->db->bind(':id', $id);
	 $row = $this->db->single();
	return $row;
  if($this->db->rowCount() > 0){
    return true;
  } else {
    return false;
  }
}
public function getwebsiteleads($id)
{
	$this->db->query("SELECT * FROM website_lead where id=:id and flag='0'");
	$this->db->bind(':id', $id);
	$row = $this->db->single();
	return $row;
  if($this->db->rowCount() > 0){
    return true;
  } else {
    return false;
  }
}
public function getoutboundleads($id)
{
	$this->db->query("SELECT * FROM outbound_lead where id=:id");
	$this->db->bind(':id', $id);
	 $row = $this->db->single();
	 return $row;
	 if($this->db->rowCount() > 0)
	 {
		return true;
	 } else {
		return false;
	  }
	
}
public function addsentmail($data)
{
    $output.='<p>Your Lead id is &nbsp;' .$data['lead_id']. ' </p>' ;
	$output.='<p>'.$data['description'].'</p>';
    $output.='<p>Thanks & Regards,</p>';
    $output.='<p>Futurecalls Helpdesk Team</p>';
    $body = $output; 
    $subject ="[". $data['lead_id']."#]" .$data['subject'];
    
    $email_to = 'veera@futurecalls.com';
    
    
    $mail=new PHPMailer;
    
            $mail->isSMTP();      
            $mail->Host='smtp.futurecalls.com';
            $mail->SMTPAuth=true; 
            $mail->Username ='helpdesk@futurecalls.com';
            $mail->Password = 'Pass@123'; 
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
	$this->db->query('INSERT INTO update_emaillead (email ,subject, description, lead_id) VALUES (:email, :subject, :description, :lead_id)');
	$this->db->bind(':email', $data['email']);
	$this->db->bind(':subject', $data['subject']);
	$this->db->bind(':description', $data['description']);
	$this->db->bind(':lead_id', $data['lead_id']);
	if($this->db->execute())
	{
		return true;
	} 
	else 
	{
		return false;
	}
	}
	
public function addwebsitemail($data)
{
    $output.='<p>Your Lead id is &nbsp;' .$data['lead_id']. ' </p>' ;
	$output.='<p>'.$data['description'].'</p>';
    $output.='<p>Thanks & Regards,</p>';
    $output.='<p>Futurecalls Helpdesk Team</p>';
    $body = $output; 
    $subject ="[". $data['lead_id']."#]" .$data['subject'];
    $email_to = $data['email'];
    $mail=new PHPMailer;
            $mail->isSMTP();      
            $mail->Host='smtp.futurecalls.com';
            $mail->SMTPAuth=true; 
            $mail->Username ='helpdesk@futurecalls.com';
            $mail->Password = 'Pass@123'; 
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
    if(!$mail->Send())
	{
		echo "Mailer Error: " . $mail->ErrorInfo;
    }
		$this->db->query('INSERT INTO update_websitelead (email ,subject, description, lead_id) VALUES (:email, :subject, :description, :lead_id)');
		$this->db->bind(':email', $data['email']);
		$this->db->bind(':subject', $data['subject']);
		$this->db->bind(':description', $data['description']);
		$this->db->bind(':lead_id', $data['lead_id']);
		if($this->db->execute())
		{
			return true;
		} 
		else 
		{
			return false;
		}
}	
public function updatestatus($data){
	$this->db->query('UPDATE email_leads SET assignee = :assignee where id=:id');
	$this->db->bind(':assignee', $data['assignee']);
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
public function updateoutboundcallstatus($data){
	$this->db->query('UPDATE outbound_lead SET assignee =:assignee where id=:id');
	$this->db->bind(':assignee', $data['assignee']);
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
public function updatesmslead($data)
{
	$this->db->query('UPDATE lead SET assignee =:assignee where id=:id');
	$this->db->bind(':assignee', $data['assignee']);
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

public function updatewebsitestatus($data)
{
	$this->db->query('UPDATE website_lead SET assignee =:assignee where id=:id');
	$this->db->bind(':assignee', $data['assignee']);
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

public function EmailStatus($id)
{
	  $this->db->query('SELECT *,
                    update_emaillead.id as generatedlead,
                    update_emaillead.lead_id as lead_id,
                    update_emaillead.email as email,
                    update_emaillead.subject as subject,
                    update_emaillead.description as description,                               
                    update_emaillead.created_at as created_at                
                    FROM update_emaillead        

                    WHERE  update_emaillead.id = :id
                    ORDER BY update_emaillead.created_at DESC 
                    ');
					$this->db->bind(':id', $id);
                    $results = $this->db->resultSet();
                    return $results;

}
public function WebsiteStatus($id)
{
	  $this->db->query('SELECT *,
                   update_websitelead.id as generatedlead,
                   update_websitelead.lead_id as lead_id,
                   update_websitelead.email as email,
                   update_websitelead.subject as subject,
                   update_websitelead.description as description,                               
                   update_websitelead.created_at as created_at                
                    FROM update_websitelead        

                    WHERE  update_websitelead.id = :id
                    ORDER BY update_websitelead.created_at DESC 
                    ');

             		$this->db->bind(':id', $id);
                    $results = $this->db->resultSet();
                    return $results;

}

public function EmailwebsiteLeads($id)
{
	  $this->db->query('SELECT * from website_lead where id=:id');
	  $this->db->bind(':id', $id);
	  $row = $this->db->single();
	return $row;
  if($this->db->rowCount() > 0){
    return true;
  } else {
    return false;
  }
	  }


public function getemail($id)
{
	 $this->db->query('SELECT * FROM users WHERE usertype = :email');
	 $this->db->bind(':id', $id);
	 $results = $this->db->resultSet();
	 return $results;
}
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
}