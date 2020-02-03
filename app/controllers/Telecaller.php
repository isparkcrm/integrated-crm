<?php

  class Telecaller extends Controller {
    public function __construct(){
      $this->telecallerModel = $this->model('telecallers');
	  $this->userModel = $this->model('User');
      $this->campaignModel = $this->model('campaignModel'); 
    }
//----------------------------------------------------------------------------------------------------------------

 public function index_new()
 {
  $username = $_SESSION['email'];
  $data['getassigneeleads'] = $this->telecallerModel->getallassignedleads($username);
  $this->view('telecallers/index_new', $data);
}

public function lead(){
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

$data =[
 'id' => trim($_POST['id']),
 'lead_id' => trim($_POST['lead_id']),
 'customername' => trim($_POST['customername']),
 'company' => trim($_POST['company']),  
 'phone' => trim($_POST['phone']),  
 'mobile'=> implode(",", $_POST['mobile']),  
 'email' => implode(",", $_POST['email']),
 'status' => trim($_POST['status'])
];
 
    if($this->telecallerModel->Insertlead($data))
    {
      
    }
   flash('lead_success', 'Lead Added Successfully');  
   redirect('telecallers/lead');
     
}
else 
	{
		$data =[
		'id' => "",
		'lead_id' =>"",
		'email' => ""
		];
		$this->view('telecallers/lead',$data);
	}
}

public function lead_master($id){
      
if($_SERVER['REQUEST_METHOD'] == 'POST'){

$data =[
 'id' => trim($_POST['id']),
 'lead_id' => trim($_POST['lead_id']),
 'customername' => trim($_POST['customername']),
 'company' => trim($_POST['company']), 
 'leadsource' => trim($_POST['leadsource']),
 'phone' => trim($_POST['phone']),  
 'mobile'=> implode(",", $_POST['mobile']),  
 'email' => implode(",", $_POST['email']),
 'status' => trim($_POST['status'])
];
    if($this->telecallerModel->updateemaillead($data))
	{
		
	}
    if($this->telecallerModel->Insertlead($data))
    {
      
    }
   flash('lead_success', 'Lead Added Successfully');  
   redirect('telecaller/lead_master');
     
}
else 
	{
		$getlead = $this->telecallerModel->getemailleads($id);
		$data =[
		'id' => $getlead->id,
		'lead_id' =>$getlead->lead_id,
		'email' => $getlead->email
		];
		$this->view('telecallers/lead_master', $data);
	}

} 

public function websitelead_master($id){
      
if($_SERVER['REQUEST_METHOD'] == 'POST'){

$data =[
 'id' => trim($_POST['id']),
 'lead_id' => trim($_POST['lead_id']),
 'customername' => trim($_POST['customername']),
 'company' => trim($_POST['company']), 
 'phone' => trim($_POST['phone']),  
 'mobile'=> trim($_POST['mobile']),  
 'email' => trim($_POST['email']),
 'status' => trim($_POST['status'])
];
	$flag="2";
     if($this->telecallerModel->updatewebsitelead($flag))
	{
		
	}
	if($this->telecallerModel->Websitelead($data))
    {
      
    }
   flash('lead_success', 'Lead Added Successfully');  
   redirect('telecallers/websitelead_master');
     
}
else 
	{
		$getlead = $this->telecallerModel->getwebsiteleads($id);
		$data =[
		'id' => $getlead->id,
		'lead_id' =>$getlead->lead_id,
		'customername' =>$getlead->customername,
		'mobile' =>$getlead->mobile,
		'email' => $getlead->email
		];
		
		$this->view('telecallers/websitelead_master', $data);
	}

} 
public function allleadlist() 
{
	$sessionuser = $_SESSION['username'];
	$data['emailtolead'] = $this->telecallerModel->getallemailtolead($sessionuser);
	$this->view('telecallers/email_lead', $data);
}

public function outboundcall()
{
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	 {
		 $assignee = trim($_POST['assignee']);
		 
		 $conn = mysqli_connect("localhost","root","","grt_crm");
		 $file = $_FILES['file']['tmp_name'];
				 $handle = fopen($file, "r");
				 $c = 0;
				 while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
	 {
				 $name = $filesop[0];
				 $mobile = $filesop[1];
				 $email = $filesop[2];
				 
				 
				 $sql = "insert into outbound_lead(name,mobile,email,assignee) values ('$name','$mobile','$email','$assignee')";
		 $stmt = mysqli_prepare($conn,$sql);
				 mysqli_stmt_execute($stmt);
		 $c = $c + 1;
	 }
		 if($sql)
		 {
				echo "sucess";
				redirect('telecaller/outboundcall');
		 } 
		 else
		 {
			 echo "Sorry! Unable to impo.";
		 }
	 }
	 else {
		 $data['outboundlead'] = $this->telecallerModel->getoutboundlead();
		 $this->view('telecallers/outboundcalllead',$data);
	 }
	 
}

public function website_lead()
{
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	 {
		 $assignee = trim($_POST['assignee']);
		 
		 
	 }
	 else {
		 $data['websitelead'] = $this->telecallerModel->getwebsitelead();
		 $this->view('telecallers/websitelead',$data);
	 }
	 
}
public function smsleads()
{
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	 {
		 $assignee = trim($_POST['assignee']);
		 
		 
	 }
	 else {
		 $data['smslead'] = $this->telecallerModel->getsmslead();
		 
		 $this->view('telecallers/smslead',$data);
	 }
}
public function updateoutboundcall($id)
{
	 $data=[
	   'id' => $id,
	   ];
	    $data['assignee'] = $_SESSION['username'];
		if($this->telecallerModel->updateoutboundcallstatus($data)){
		flash('Lead_message', 'Lead updated successfully');
		        redirect('telecaller/outboundcall');
      } else {
        die('Something went wrong');
      }
}

public function updatewebsitelead($id)
{
	
	 $data=[
	   'id' => $id,
	   ];
	    $data['assignee'] = $_SESSION['email'];
		if($this->telecallerModel->updatewebsitestatus($data)){
		flash('Lead_message', 'Lead updated successfully');
		        redirect('telecaller/website_lead');
      } else {
        die('Something went wrong');
      }
}

public function updatestatus($id)
{
	   $data=[
	   'id' => $id,
	   ];
	   
	   $data['assignee'] = $_SESSION['username'];
	 
	   if($this->telecallerModel->updatestatus($data)){
		flash('Lead_message', 'Lead updated successfully');
		        redirect('telecaller/index_new');
      } else {
        die('Something went wrong');
      }
	
}
public function updatesmslead($id)
{
	$data=[
	   'id' => $id,
	   ];
	   
	   $data['assignee'] = $_SESSION['username'];
	 
	   if($this->telecallerModel->updatesmslead($data)){
		flash('Lead_message', 'Lead updated successfully');
		        redirect('telecaller/index_new');
      } else {
        die('Something went wrong');
      }
	
}

public function sendemail($id)
{
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$data = [
		'id' => $id,
		'email' => trim($_POST['email']),
		'subject' => trim($_POST['subject']),
		 'description' => trim($_POST['description']),
		 'lead_id' => trim($_POST['lead_id'])
		];
		if($this->telecallerModel->addsentmail($data))
		{
		}
		flash('lead_success', 'Lead Status Added Successfully');  
			redirect('telecaller/allleadlist');
		
	}
	else{
	
	$getemailleads = $this->telecallerModel->getemailleads($id);
	
	$data=[
	'id' => $getemailleads->id,
	 'email' => $getemailleads->email,
	'subject' => $getemailleads->subject,
	'description' =>$getemailleads->description,
	'lead_id' =>$getemailleads->lead_id,
	'campaign_ID' =>$getemailleads->campaign_ID,
	'assignee' => $getemailleads->assignee
	];

	$this->view('telecallers/sendemail',$data);
	}
}

public function outboundsendemail($id)
{
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$data = [
		'id' => $id,
		'email' => trim($_POST['email']),
		'subject' => trim($_POST['subject']),
		 'description' => trim($_POST['description'])
		];
		if($this->telecallerModel->addoutboundsentmail($data))
		{
		}
		flash('lead_success', 'Lead Status Added Successfully');  
			redirect('telecaller/allleadlist');
		
	}
	else{
		$getoutboundleads = $this->telecallerModel->getoutboundleads($id);
	
		$data=[
		'id' => $getoutboundleads->id,
		'name' => $getoutboundleads->name,
		'mobile' => $getoutboundleads->mobile,
		 'email' => $getoutboundleads->email,
		 'assignee' => $getoutboundleads->assignee
		];
		
		$this->view('telecallers/outboundsendemail',$data);
	}
}

/* public function websitesendemail($id)
{
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$data = [
		'id' => $id,
		'email' => trim($_POST['email']),
		'subject' => trim($_POST['subject']),
		 'description' => trim($_POST['description'])
		];
		if($this->telecallerModel->addoutboundsentmail($data))
		{
		}
		flash('lead_success', 'Lead Status Added Successfully');  
			redirect('telecaller/allleadlist');
		
	}
	else{
		$getoutboundleads = $this->telecallerModel->getoutboundleads($id);
	
		$data=[
		'id' => $getoutboundleads->id,
		'name' => $getoutboundleads->name,
		'mobile' => $getoutboundleads->mobile,
		 'email' => $getoutboundleads->email,
		 'assignee' => $getoutboundleads->assignee
		];
		
		$this->view('telecallers/outboundsendemail',$data);
	}
} */
public function email_comm($id)
{        
  $leads = $this->telecallerModel->EmailStatus($id);
  $data = [
    'leads' => $leads
  ];
  $this->view('telecallers/email_comm', $data);
}

public function websiteemailsend($id)
{        
  $leads = $this->telecallerModel->WebsiteStatus($id);
  $data = [
    'leads' => $leads
  ];
  $this->view('telecallers/websitecon_list', $data);
}

public function websitesendemail($id)
{
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$data = [
		'id' => $id,
		'email' => trim($_POST['email']),
		'subject' => trim($_POST['subject']),
		 'description' => trim($_POST['description']),
		 'lead_id' => trim($_POST['lead_id'])
		];
		if($this->telecallerModel->addwebsitemail($data))
		{
		}
		flash('lead_success', 'Lead Status Added Successfully');  
			redirect('telecaller/allleadlist');
		
	}
	else
	{
		$leads = $this->telecallerModel->EmailwebsiteLeads($id);
		$data = [
		'id' => $leads->id,
		'lead_id' => $leads->lead_id,
		'number' =>$leads->mobile,
		'email' =>$leads->email,
		'customername' => $leads->customername,
		'customeraddress' =>$leads->customeraddress
		];
		$this->view('telecallers/websitesendemail', $data);
	}
}

  public function outboundcall_lead()
  {
	  $this->view('telecallers/outboundcalllead');
  }

public function leadlist(){
   $oem = $_SESSION['username'];
   
   $data['leadlist'] = $this->telecallerModel->getleadlist($oem); 
   
   $this->view('telecaller/leadlist',$data);
 }
}



  