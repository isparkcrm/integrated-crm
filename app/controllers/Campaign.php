<?php
	class Campaign extends Controller {
	public function __construct(){
	
	 $this->campaignModel = $this->model('campaignModel'); 
	 $this->clientModel = $this->model('client');
	}
	public function campaign_master(){
		
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$data =[
			'campaigntype' =>trim($_POST['campaigntype']),		
		//	'processtype'=>trim($_POST['processtype']),
			'campaignname'=>trim($_POST['campaignname']),
			'campaigndescrip'=>trim($_POST['campaigndescrip']),
			'modeofcomm'=>implode(",",$_POST['modeofcomm']),
			'email'=>trim($_POST['email']),
			'campaigntype_err' =>'',	
		//	'processtype_err' =>'',	
		'email_err' =>'',	
			'campaignname_err' =>'',
			'campaigndescrip_err' =>'',		
			'modeofcomm_err' =>''
			];
		
			if(empty($data['campaigntype']))
			{
				$data['campaigntype_err'] = 'Please Select Campaign Type';
			}
			
		
			/*	if(empty($data['processtype']))
				{
					$data['processtype_err'] = 'Please Select Process Type';
				}
		*/
			if(empty($data['campaignname']))
			{
				$data['campaignname_err'] = 'Please Enter Campaign Name';
			}
			if(empty($data['campaigndescrip']))
			{
				$data['campaigndescrip_err'] = 'Please Enter Campaign Description';
			}
			if(empty($data['modeofcomm']))
			{
				$data['modeofcomm_err'] = 'Please Select Mode of Communication';
			}
			if($this->campaignModel->findCampaignEmail($data['email'])){
				$data['email_err'] = 'Email is already taken';
		 }
			if(empty($data['campaigntype_err']) &&  empty($data['campaignname_err']) && empty($data['campaigndescrip_err']) && empty($data['modeofcomm_err'])&& empty($data['email_err']))
			{
          $inbound_campaign=$this->campaignModel->TotalInbound();
					$outbound_campaign=$this->campaignModel->TotalOutbound(); 
					$created_inbound=$this->campaignModel->createdInbound($data['campaigntype']); 
				//	$created_outbound=$this->campaignModel->createdOutbound(); 
					
          $input1=$inbound_campaign->inbound;
         $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
         $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $input1 ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");       
							
				 
				 $input2=$outbound_campaign->outbound;
         $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
         $qDecoded1      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $input2 ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");      
				 
				
				 if($data['campaigntype']=='inbound'){
				 if($created_inbound->total < $qDecoded){

				if($this->campaignModel->Createcampagin($data))
				{
					flash('register_success', 'Campaign Added Successfully');  
					redirect('campaign/campaignlist');
				}	
			}
			else{
				flash('inbound_limit', 'Total inbound limit exceed please contact admin');  
				redirect('campaign/campaign_master');
			}
		}
		else{
			if($created_inbound->total < $qDecoded1){

		 if($this->campaignModel->Createcampagin($data))
		 {
			 flash('register_success', 'Campaign Added Successfully');  
			 redirect('campaign/campaignlist');
		 }	
	 }
	 else{
		 flash('outbound_limit', 'Total outbound limit exceed please contact admin');  
		 redirect('campaign/campaign_master');
	 }
 }
			}
			else {
				// Load view with errors
			
				$this->view('campaign/campaign_master', $data);
			 }     
		}
		else{
			$data = [
			'campaigntype' => '',
			'clienttype' => '',
			'clientname' => '',
			//'processtype' => '',
			'campaignname' => '',
			'campaigndescrip' => '',
			'modeofcomm' => '',
			'email' => '',
			'campaigntype_err' =>'',
			'clienttype_err' =>'',
			'clientname_err' =>'',
		//'processtype_err'=>'',
			'campaignname_err' =>'',
			'email_err' =>'',
			'campaigndescrip_err' =>'',
			'modeofcomm_err' =>''
			];
		$this->view('campaign/campaign_master', $data);
		}
	}
	//---------------------------------------------------------------------------------------------------------
	public function edit($id){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			// Sanitize POST array
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		
	$data =[
						 'id' =>$id,
				'campaigntype' =>trim($_POST['campaigntype']),
				'campaignname'=>trim($_POST['campaignname']),
				'campaigndescrip'=>trim($_POST['campaigndescrip']),
				'modeofcomm'=>implode(",",$_POST['modeofcomm']),			
				'campaigntype_err' =>'',
				'campaignname_err' =>'',
				'campaigndescrip_err' =>'',
				'modeofcomm_err' =>''
				];
		
	if(empty($data['campaigntype']))
				{
					$data['campaigntype_err'] = 'Please Select Campaign Type';
				}
				if(empty($data['campaignname']))
				{
					$data['campaignname_err'] = 'Please Enter Campaign Name';
				}
				if(empty($data['campaigndescrip']))
				{
					$data['campaigndescrip_err'] = 'Please Enter Campaign Description';
				}
				if(empty($data['modeofcomm']))
				{
					$data['modeofcomm_err'] = 'Please Select Mode of Communication';
				}
					
				if(empty($data['campaigntype_err']) && empty($data['campaignname_err']) && empty($data['campaigndescrip_err']) && empty($data['modeofcomm_err']))
				{
					
			// Validated
				if($this->campaignModel->updateCampaign($data)){
				
					flash('post_message', 'Campaign Updated');
					redirect('campaign/campaignlist');
				} else {
					die('Something went wrong');
				}
			} else {
				// Load view with errors
				$this->view('campaign/campaignlist', $data);
			}
	
		} else {
			
			$campaign = $this->campaignModel->getCampaignById($id);
		$data = [
				'id' => $campaign->id,
				'campaigntype' => $campaign->campaigntype,
				'campaignname' => $campaign->campaignname,
				'campaigndescrip' => $campaign->campaigndescrip,
				'modeofcomm' => $campaign->modeofcomm,
				'email'=>$campaign->email
			];
	
			$this->view('campaign/edit', $data);
		}
	}
//-------------------------------------------------------------------------------------------------------------	
//------------------------------------------------------------------------------------------------------------
 
public function outboundlist()
{
	$email = $_SESSION['email'];
	$donotcall = "Do Not Call";
	$notinterested = "Not Interested";
	$closed = "Closed";
	$attempt = "4";
	$data['id'] = "";
	$data['campaign_id']="";
	$data['name'] = "";
	$data['campaignname'] = "";
	$data['mobile'] = "";
	$data['callscript'] = "";
	$data['outbound'] = $this->campaignModel->getoutbound($donotcall,$notinterested,$closed);
	$data['gethistory'] = $this->campaignModel->gethistory();
	$this->view('campaign/outboundlist', $data);	
}

//------------------------------------------------------------------------------------------------------------

public function callstatus()
 {
	 if($_SERVER['REQUEST_METHOD'] == 'POST')
	 {
		 $attempts = $this->campaignModel->getattempt($_POST['id']);
		 if($attempts[0]->attempt=="")
	 {
		$data = [
		   'id' => trim($_POST['id']),
		   'email' => $_SESSION['email'],
		  'campaign_id' => trim($_POST['campaign_id']),
		  'callstatus' => trim($_POST['callstatus']),
		  'calldate'   => trim($_POST['calldate']),
		  'calltime'   => trim($_POST['calltime']),
		  'remarks'    => trim($_POST['remarks']),
		  'attempt'    => "1"
		 ];
		 if($this->campaignModel->insertoutboundhistory($data))
		 {
			if($this->campaignModel->updatecallstatus($data))
			{
				flash('register_success', 'Assigning Successfully');  
				redirect('campaign/outboundlist');	 
			}
				
		 }
	 }
		 else if($attempts[0]->attempt=="1")
		 {
			 	$data = 
				[
				  'id'         => trim($_POST['id']),
				  'email'      => $_SESSION['email'],
				  'campaign_id' => trim($_POST['campaign_id']),
				  'callstatus' => trim($_POST['callstatus']),
				  'calldate'   => trim($_POST['calldate']),
				  'calltime'   => trim($_POST['calltime']),
				  'remarks'    => trim($_POST['remarks']),
				  'attempt'    => "2"
				 ];
		 
				if($this->campaignModel->insertoutboundhistory($data))
				{
						if($this->campaignModel->updatecallstatus($data))
					{
						flash('register_success', 'Assigning Successfully');  
						redirect('campaign/outboundlist');	 
				    }
				}	 
		 }
		  else if($attempts[0]->attempt=="2")                                                                                                  
		  {
		    $data = 
			[
			  'id'         => trim($_POST['id']),
			  'email'      => $_SESSION['email'],
			  'campaign_id' => trim($_POST['campaign_id']),
			  'callstatus' => trim($_POST['callstatus']),
			  'calldate'   => trim($_POST['calldate']),
			  'calltime'   => trim($_POST['calltime']),
			  'remarks'    => trim($_POST['remarks']),
			  'attempt'    => "3"
		    ]; 
			if($this->campaignModel->insertoutboundhistory($data))
				{
					$campaignlist = $this->campaignModel->getcampaign();
					$data = [
					 'campaign' => $campaignlist
					];
					if($this->campaignModel->updatecallstatus($data))
					{
						flash('register_success', 'Assigning Successfully');  
						redirect('campaign/outboundlist');	 
					}
				} 
		  }
		 else if($attempts[0]->attempt=="3")
		 {
			 $data = [
			  'id'         => $id,
			  'email'      => $_SESSION['email'],
			  'campaign_id' => trim($_POST['campaign_id']),
			  'callstatus' => trim($_POST['callstatus']),
			  'calldate'   => trim($_POST['calldate']),
			  'calltime'   => trim($_POST['calltime']),
			  'remarks'    => trim($_POST['remarks']),
			  'attempt'    => "4"
			 ]; 
			 
		 if($this->campaignModel->insertoutboundhistory($data))
			{
			if($this->campaignModel->updatecallstatus($data))
			{
			flash('register_success', 'Assigning Successfully');  
			redirect('campaign/outboundlist');	 
			}
		} 
		 }
	 }
	 else{
		 
		 $callstatusedit = $this->campaignModel->getcallsById($id);
		 $data['id'] = $callstatusedit->id;
		 
		$data['getassigned'] = $this->campaignModel->getassignedcall();
			
			$this->view('campaign/outboundlist', $data);	
	 }
 }

//------------------------------------------------------------------------------------------------------------
public function assignedcall()
 {
	 $email = $_SESSION['email'];
	$donotcall = "Do Not Call";
	$notinterested = "Not Interested";
	$closed = "Closed";
	 $attempt = "4";
	 $getassignedcall = $this->campaignModel->getassignedcall($email,$donotcall,$notinterested,$closed,$attempt);
	 $data = ['getassigned' => $getassignedcall];
	 $this->view('campaign/outboundlist', $data);
 }
 
 //-----------------------------------------------------------------------------------------------------------

 public function call($mobile)
 {

	 $email = 'test@futurecall';
	 $number="$mobile";	 
	 $url="http://10.10.10.151:4575/CrmDial?exeUserName={$email}&phoneNumber={$number}&uniqueId={$number}&skill=OUTBOUND&dialCode=888&listId=1";	 

	 //print_r($url);die;
	 $this->campaignModel->clicktoCall($url);	
 }


 //--------------------------------------------------------------------------------------------------------
public function getcallstatusid($id)
{
	//$data['callstatus'] = $this->campaignModel->getcallsById($id);
 
 $data['callstatus'] = $this->campaignModel->getcallsById($id);

 
 $email = $_SESSION['email'];
	$donotcall = "Do Not Call";
	$notinterested = "Not Interested";
	$closed = "Closed";
	$attempt = "4";
	$data['id'] = "";
	$data['campaign_id']="";
	$data['name'] = "";
	$data['campaignname'] = "";
	$data['mobile'] = "";
	$data['callscript'] = "";
	$data['outbound'] = $this->campaignModel->getoutbound($donotcall,$notinterested,$closed);
	$data['gethistory'] = $this->campaignModel->gethistory();
 $data['id'] = $data['callstatus']->id;
 $data['campaign_id'] = $data['callstatus']->campaign_id;
 $data['name'] = $data['callstatus']->name;
 $data['campaignname'] = $data['callstatus']->campaignname;
 $data['mobile'] = $data['callstatus']->mobile;
 $data['callscript'] = $data['callstatus']->callscript;
 
 $this->view('campaign/outboundlist', $data);
}
 //------------------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------------------	
 public function importexcel()
 {
	 if($_SERVER['REQUEST_METHOD'] == 'POST')
	 {
	 $campaign_id = trim($_POST['id']);
	 $callscript = trim($_POST['callscript']);
	 }
	 $conn = mysqli_connect("localhost","root","","futureca_futurecalls");
		 $file = $_FILES['file']['tmp_name'];
				 $handle = fopen($file, "r");
				 $c = 0;
				 while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
	 {
				 $id = $filesop[0];
		 $name = $filesop[1];
		 $email = $filesop[2];
		 $mobile = $filesop[3];
				 $age = $filesop[4];
				 $gender = $filesop[5];
				 $city = $filesop[6];
				 $remarks = $filesop[7];
				 $sql = "insert into outbound_campaign(id,campaign_id,callscript,name,email,mobile,age,gender,city,remarks) values ('$id','$campaign_id','$callscript','$name','$email','$mobile','$age','$gender','$city','$remarks')";
		 $stmt = mysqli_prepare($conn,$sql);
				 mysqli_stmt_execute($stmt);
		 $c = $c + 1;
	 }
		 if($sql)
		 {
				echo "sucess";
				//redirect('campaign/campaignlist');
		 } 
		 else
		 {
			 echo "Sorry! Unable to impo.";
		 }
 }   
 public function campaignlist(){
 $campaignlist = $this->campaignModel->getcampaign();
 $data = [
		'campaign' => $campaignlist
 ];
	$this->view('campaign/campaignlist', $data);
}

//------------------------------------------------------------------------------------------------------------
 //------------------------------------------------------------------------------------------------------------
 public function agent()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
		
			$data = [
			 'campaignID' => trim($_POST['id'])
			];
		}
		$role="customer";
		$data['campaign'] = $this->campaignModel->getcampaign();
		$data['agent'] = $this->campaignModel->getAgent($data['campaignID']);
		$data['userlist'] = $this->campaignModel->getUsers($role);
		$this->view('campaign/agent',$data);
	}
	
	public function agentinsert()
	{
		
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$campaignlist = $this->campaignModel->getcampaign();
			$data = [
			 'campaign' => $campaignlist
			];
			
			$data =[
			'username' =>implode(",",$_POST['username']),
			'username_err' =>''
			];
		
		if(empty($data['username_err']))
			{
				$campaign_id = trim($_POST['id']);				
				if($this->campaignModel->Createagent($data,$campaign_id))
				{
					flash('register_success', 'Agent Added Successfully');  
					redirect('campaign/campaignlist');
				}	
			}
		}
		else {
    // Get existing post from model
    $campaign = $this->campaignModel->getCampaignById($id);
	
    // Check for owner
  $data = [
			
			'id' => $campaign->id,
			'username' => $campaign->username
    ];

    $this->view('campaign/agent', $data);
  }
	}
//------------------------------------------------------------------------

public function agentdelete($id)
{
	if($this->campaignModel->agentdelete($id))
	{
		flash('register_success', 'Agent Deleted Successfully');  
		redirect('campaign/campaignlist');
	}
}
 //----------------------------------------------------------------------------------------------------------
 public function addclient()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
		
			$data = [
			 'campaignID' => trim($_POST['id']),			
			 'username_err' =>'',
			 'service_err' =>''
			];
		}
		$data['campaign'] = $this->campaignModel->getcampaign();
		$data['client'] = $this->campaignModel->getClient($data['campaignID']);
		$data['clientlist'] = $this->clientModel->getClientName();
		$this->view('campaign/addclient',$data);
	}
	
	public function clientinsert()
	{
		
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$campaignlist = $this->campaignModel->getcampaign();
			$data = [
			 'campaign' => $campaignlist
			];
			
			$data =[
			'username' =>trim($_POST['username']),
			'service' =>trim($_POST['service']),
			'campaign_id' =>trim($_POST['id']),
			'username_err' =>'',
			'service_err' =>''
			];
     
			if(empty($data['username']))
			{
				$data['username_err'] = 'Please enter username';
			}
			if($this->campaignModel->findService($data['service'],$data['campaign_id'])){
				$data['service_err'] = 'This service already inculded in another campaign';
		 }
		 if($this->campaignModel->CheckService($data['service'],$data['username'])){
			$data['service_err'] = 'This service already inculded in another campaign';
	 }
		if(empty($data['username_err']) && empty($data['service_err']))
			{
				$campaign_id = $data['campaign_id'];		
				//$process_id = trim($_POST['process']);			
				if($this->campaignModel->Createclient($data,$campaign_id))
				{
					$data['client'] = $this->campaignModel->getClient($data['campaignID']);
					flash('register_success', 'Client Added Successfully');  
					redirect('campaign/campaignlist');
				}	
			}
			else {
				// Load view with errors
				$data['client'] = $this->campaignModel->getClient($data['campaignID']);
				$this->view('campaign/addclient', $data);
			 }     
		}
		else {
    // Get existing post from model
    $campaign = $this->campaignModel->getCampaignById($id);
		
    // Check for owner
  $data = [
			
			'id' => $campaign->id,
			'username' => $campaign->username
    ];
		
    $this->view('campaign/addclient', $data);
  }
	}
	
//------------------------------------------------------------------------

public function clientdelete($id)
{
	if($this->campaignModel->clientRemove($id))
	{
		flash('register_success', 'client Deleted Successfully');  
		redirect('campaign/addclient');
	}
}
//----------------------------------------------------------------------------------------------------------
 
//----------------------------------------------------------------------------------------------------------

public function escalation()
	{
		$data['getcommunication'] = $this->campaignModel->getcommunication();		

		$this->view('campaign/escalation_master',$data);

  }
  
public function escalation_master(){
      
  // Check for POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
$data =[
 'campaign' => trim($_POST['campaign']),  
 'Level' => implode(",", $_POST['level']), 
 'name' => implode(",", $_POST['name']), 
 'email' => implode(",", $_POST['email']), 
 'number' => implode(",", $_POST['number']),  
 'campaign_err' => '' ,       
 'level_err' => '' ,  
 'name_err' => '' , 
 'email_err' => '' ,   
 'number_err' => ''   
];

// Validate client name
if(empty($data['campaign'])){
 $data['campaign_err'] = 'Please enter campaign name';
}
if(empty($data['Level'])){
 $data['level_err'] = 'Please enter level';
}
if(empty($data['name'])){
  $data['name_err'] = 'Please enter name';
 }
 if(empty($data['email'])){
  $data['email_err'] = 'Please enter email';
 }
 if(empty($data['number'])){
  $data['number_err'] = 'Please enter number';
 }
/*if($this->clientModel->findBynotification($data['servicename'])){

  $data['servicename_err'] = 'servicename is  already exist';
} */

if(empty($data['campaign_err'])){
	// Register Client
	
 if($this->campaignModel->EscalationMaster($data)){
	$data['getcommunication'] = $this->campaignModel->getcommunication();
	 flash('esclation_success', 'Escalation Communication Added Successfully');  	
   $this->view('campaign/escalation_master',$data);
  }         
 } 
else {
 // Load view with errors
 $this->view('campaign/escalation_master', $data);
}       

}
else {
// Init data
$data =[
 'campaign' => '' ,  
 'Level' => '' ,  
 'email' =>'' ,  
 'number' => '' ,  
 'campaign_err' => '' ,       
 'level_err' => '' ,  
 'name_err' => '' , 
 'email_err' => '' ,   
 'number_err' => ''     
];
// Load view
$this->view('campaign/escalation_master', $data);
}

}
//----------------------------------------------------------------------------------------------------------
public function escalation_edit($id){
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Sanitize POST array
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $data = [
      'id'=>trim($_POST['id']),
      'campaign' => trim($_POST['campaign']), 
      'level' => trim($_POST['level']), 
      'name' => trim($_POST['name']), 
      'email' => trim($_POST['email']), 
      'number' => trim($_POST['number']), 
      'name_err' => '',
      'number_err' => '',
      'email_err' => ''  
    ];
    if(empty($data['name'])){
      $data['name_err'] = 'Please enter Name';
     }
     if(empty($data['email'])){
      $data['email_err'] = 'Please enter Email ID';
     }
     if(empty($data['number'])){
       $data['number_err'] = 'Please enter Valid Number';
      }
		/*	if(strlen($data['number']) < 10){
				$data['number_err'] = 'number must be at  10';
			}
     */
     /*if($this->clientModel->findBynotification($data['servicename'])){
     
       $data['servicename_err'] = 'servicename is  already exist';
     } */
     
     if(empty($data['name_err']) && empty($data['email_err']) && empty($data['number_err'])){
      
      // Register Client
      if($this->campaignModel->UpdateEscalation($data)){
       
        redirect('campaign/escalation');
       }         
      } 
     else {
      // Load view with errors
      $this->view('campaign/escalation_edit', $data);
     }  
  }
    else {
    // Get existing post from model
    $client = $this->campaignModel->getEscalationById($id);

    // Check for owner
  $data = [
      'id' => $client->id,
     'campaign' =>$client->campaign,
		 'level'=>$client->level,    
		 'name'=>$client->name, 
     'email'=>$client->email,    
     'number'=>$client->number    
    ];

    $this->view('campaign/escalation_edit', $data);
  }
}
//--------------------------------------------------------------------------------------------
public function service()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		
		{
		
			$data = [
			 'campaignID' => trim($_POST['id']),
			 'username_err' =>''
			];
		}
		$role="customer";
		$data['campaign'] = $this->campaignModel->getcampaign();
		$data['agent'] = $this->campaignModel->getcampaignService($data['campaignID']);
		$data['servicelist'] = $this->campaignModel->ServiceList();
		//print_r($data['servicelist']);die;
		$this->view('campaign/service',$data);
	}
//--------------------------------------------------------------------------------------------------
	public function serviceinsert()
	{
		
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$campaignlist = $this->campaignModel->getcampaign();
			$data = [
			 'campaign' => $campaignlist
			];
			
			$data =[
			'service' =>implode(",",$_POST['username']),
			'campaign_id' =>trim($_POST['id']),
			'username_err' =>''
			];
			   if($this->campaignModel->findService($data['service'],$data['campaign_id'])){
				$data['username_err'] = 'This service already inculded in another campaign';
		 }				
		if(empty($data['username_err']))
			{
				$campaign_id = trim($_POST['id']);	
    //  print_r($data);die;
				if($this->campaignModel->CreatService($data,$campaign_id))
				{
					flash('service_success', 'service Added Successfully');  
					redirect('campaign/campaignlist');
				}	
			}
			else {
				// Load view with errors
			$campaignID=$data['campaign_id'];
  $data['agent'] = $this->campaignModel->getcampaignService($campaignID);
				$this->view('campaign/service', $data);
			 }     
		}
		else {
    // Get existing post from model
$campaignID=$data['campaign_id'];

  $data['agent'] = $this->campaignModel->getcampaignService($campaignID);
	
    // Check for owner
  
    $this->view('campaign/service', $data);
  }
	}

//---------------------------------------------------------------------------------------------
	public function servicedelete($id)
{
	if($this->campaignModel->servicedelete($id))
	{
		flash('service_delete', 'service Deleted Successfully');  
		redirect('campaign/campaignlist');
	}
}
 //----------------------------------------------------------------------------------------------------------
}
?> 