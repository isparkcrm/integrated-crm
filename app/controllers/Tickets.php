<?php
  class Tickets extends Controller {
    public function __construct()
	{
      $this->postModel = $this->model('Post');
      $this->userModel = $this->model('User');
      $this->ticketModel = $this->model('Ticket');
      $this->campaignModel = $this->model('campaignModel'); 
    }
 //-----------------------------------------------------------------------------------------------------------
 //----------------------------------------------------------------------------------------------------------
 public function index_new()
 {
  
    $status='Close';
    $critical='P1';
    $high='P2';
    $medium='P3';
    $low='P4';
    $data = [
    'title' => 'Dashboard',    
    ];
     $data['countTicket']=$this->ticketModel->totalticket($status);
    
    $data['critical']=$this->ticketModel->criticalticket($status,$critical); 
    $data['high']=$this->ticketModel->highticket($status,$high);
    $data['medium']=$this->ticketModel->mediumticket($status,$medium);
    $data['low']=$this->ticketModel->lowticket($status,$low);
    $this->view('tickets/index_new', $data);
  }
//---------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------
	public function view_tickets()
	{        
	  $status='Close';
	  $tickets = $this->ticketModel->getTickets($status);
	  // Check for owner
	  $data = [
		'tickets' => $tickets
	  ];
	  $this->view('tickets/view_tickets', $data);
	}
	
//--------------------------------------------------------------------------------------------------------------

public function web_tickets()
	{        
	  $status='Close';
	  $tickets = $this->ticketModel->getTickets($status);
	  // Check for owner
	  $data = [
		'tickets' => $tickets
	  ];
	  $this->view('tickets/webticket', $data);
	}	
//--------------------------------------------------------------------------------------------------------------	
	public function sla_notification()
	{
		 $status='Close';
		 $tickets = $this->ticketModel->getduration($status);
		 $data = 
		 [
			'tickets' => $tickets
		 ];
		$this->view('tickets/sla_notification', $data);
	}
//---------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------	
public function escalation_matrix()
{
   $status='Close';
   $tickets = $this->ticketModel->EscalationMatrix($status);
   $data = 
   [
    'tickets' => $tickets
   ];
  $this->view('tickets/escalation_matrix', $data);
}
//--------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------

public function create_ticket(){
      
  
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
   $currentDir = getcwd();
   $uploadDirectory = "/uploads/";
   $errors = []; 
   $fileExtensions = ['doc','pdf','png','jpeg']; // Get all the file extensions
   $fileName = $_FILES['photo']['name'];
   $fileSize = $_FILES['photo']['size'];
   $fileTmpName  = $_FILES['photo']['tmp_name'];
   $fileType = $_FILES['photo']['type'];
   $ext = explode(".", $_FILES['photo']['name']);
   $ext2 = end($ext);


$data =
[
 'client' => trim($_POST['client']), 
 'email' => trim($_POST['email']), 
 'number' => trim($_POST['number']), 
 'title' => trim($_POST['title']), 
 'description' => trim($_POST['description']), 
 'severity' => trim($_POST['severity']),
 'file'=> basename($fileName), 
 'status' => trim($_POST['status']),  
 'process' => trim($_POST['processtype']),  
 'title_err' => '' , 
 'description_err' => '' , 
 'severity_err' => '' ,
 'file_err' => '' ,
 'processtype_err' => '' , 
];

	$uploadPath = $currentDir . $uploadDirectory . basename($fileName); 
	   if (in_array($ext2,$fileExtensions)) 
	   {
            $data['file_err']  = "This file extension is not allowed. Please upload a JPEG or PNG file";
       }
	   if ($fileSize > 2000000) 
	   {
          $data['file_err']= "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
       }
	   if (empty($errors)) 
	   {
		     $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
	   }
	   else 
	    {
            foreach ($errors as $error) 
			{
              $data['file_err']= $error . "These are the errors" . "\n";
            }
        }
//get campaign ID 
$campaign = $this->ticketModel->getCampainID($data['client'],$data['process']);
$campaignID=$campaign->campaign_id;

$campaign_email=$this->ticketModel->getCampaignEmail($campaignID);
$campaign_number=$this->ticketModel->getCampaignNumber($campaignID);


if(empty($campaignID))
 {
  $data['processtype_err'] = 'This service is not included Please contact admin';
 }
if(empty($data['title']))
{
 $data['title_err'] = 'Please enter title';
}
if(empty($data['description'])){
  $data['description_err'] = 'Please enter description';
 }
 if(empty($data['severity'])){
  $data['severity_err'] = 'Please enter severity';
 }
 if(empty($data['process'])){
  $data['processtype_err'] = 'Please enter process Type';
 }
if(empty($data['title_err'])&& empty($data['description_err'])&& empty($data['severity_err'])&& empty($data['processtype_err'])){
  
  // $cust=$customer->customer_notification;
  // $email_msg1=$customer->email_message1;
   //$sms_msg1=$customer->sms_message1;
   //$hd=$customer->helpdesk_notification;
   //$email_msg=$customer->email_message;
   //$sms_msg=$customer->sms_message;

 if($this->ticketModel->createTicket($data,$campaignID,$campaign_email,$campaign_number)){
   flash('register_success', 'ticket created Successfully');  
   redirect('tickets/create_ticket');
  }
          
 } 
else {
 // Load view with errors
 $this->view('tickets/create_ticket', $data);
}       

} else {
// Init data
$data =[
  'title' => '' , 
 'description' => '' , 
 'severity' => '' , 
 'file' => '' , 
 'status' => '' , 
 'process' => '' , 
  'title_err' => '' , 
 'description_err' => '' , 
 'severity_err' => '',
 'file_err' => '' ,
 'processtype_err' => '' 
];

// Load view
$this->view('tickets/create_ticket', $data);
}


}

//--------------------------------------------------------------------------------------------------------------

public function create_webticket(){
      
  
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
$data =
[
 'title' => trim($_POST['title']), 
 'description' => trim($_POST['description']), 
 'severity' => trim($_POST['severity']),
 'status' => trim($_POST['status']),  
 'title_err' => '' , 
 'description_err' => '' , 
 'severity_err' => '' ,
 'processtype_err' => '' , 
];
//get campaign ID 



if(empty($data['title']))
{
 $data['title_err'] = 'Please enter title';
}
if(empty($data['description'])){
  $data['description_err'] = 'Please enter description';
 }
 if(empty($data['severity'])){
  $data['severity_err'] = 'Please enter severity';
 }

if(empty($data['title_err'])&& empty($data['description_err'])&& empty($data['severity_err'])){
  
 if($this->ticketModel->createWebTicket($data)){
   flash('register_success', 'ticket created Successfully');  
   redirect('tickets/create_webticket');
  }
          
 } 
else {
 // Load view with errors
 $this->view('tickets/create_webticket', $data);
}       

} else {
// Init data
$data =[
  'title' => '' , 
 'description' => '' , 
 'severity' => '' , 
 'status' => '' , 
 'process' => '' , 
  'title_err' => '' , 
 'description_err' => '' , 
 'severity_err' => '',
 'file_err' => '' ,
 'processtype_err' => '' 
];

// Load view
$this->view('tickets/webticket', $data);
}


}
//---------------------------------------------------------------------------------------------------------------
public function open($ticketID){

    // Get existing post from model
    $ticketlist = $this->ticketModel->viewTicket($ticketID);

    // Check for owner
    $data = [
      'id' => $ticketlist->id,
     'subject' => $ticketlist->subject,
     'description' => $ticketlist->description,
     'ticketID' => $ticketlist->ticketID,
     'clientID' => $ticketlist->clientID,
     'status' => $ticketlist->status,
     'severity' => $ticketlist->severity,
     'assigned_to' => $ticketlist->assigned_to,
     'attachment' => $ticketlist->attachment,
     'created_at' => $ticketlist->created_at
    
    ];
    
    $this->view('tickets/open', $data);
  
    
}
    
//-------------------------------------------------------------------------------------------------------------  
public function assign($ticketID){
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Sanitize POST array
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $data = [
      'id'=>$id,
      'subject' =>trim($_POST['subject']),
      'ticketID' => trim($_POST['ticketID']),
      'assigned_to' => trim($_POST['assigned_to']),  
      'role' => trim($_POST['role']),  
      'campaign' => trim($_POST['campaign'])        
    ];
   
    $assignee_number=$this->ticketModel->getAssigneeEmail($data['assigned_to']);
      // Validated
      if($this->ticketModel->SetAssignee($data,$assignee_number)){
        flash('assignee_message', 'ticket assigned successfully');
        redirect('tickets/view_tickets');
      } else {
        die('Something went wrong');
      }
   
    }
    else {
      
      $ticketlist = $this->ticketModel->assignTicket($ticketID);

  // Check for owner
  $data = [
    'id' => $ticketlist->id,
   'subject' => $ticketlist->subject,
   'description' => $ticketlist->description,
   'ticketID' => $ticketlist->ticketID,
   'clientID' => $ticketlist->clientID,
   'status' => $ticketlist->status,
   'campaign' => $ticketlist->campaign_ID,
   'severity' => $ticketlist->severity,
   'assigned_to' => $ticketlist->assigned_to,
   'attachment' => $ticketlist->attachment,
   'created_at' => $ticketlist->created_at
  
  ];
  
  $this->view('tickets/assign', $data);

    }

  // Get existing post from model
 
  
}
  
//-------------------------------------------------------------------------------------------------------------   
public function email_comm($ticketID){        
         
   $this->departmentModel->updateemailreadstatus($ticketID);           
  $tickets = $this->ticketModel->EmailStatus($ticketID);

  // Check for owner
  $data = [
    'tickets' => $tickets
  ];
   
  $this->view('tickets/email_comm', $data);
}
//-------------------------------------------------------------------------------------
public function reports(){

  // Check for owner
    
  
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Sanitize POST array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
      $data =[
          'from' => trim($_POST['from_date']), 
          'to' => trim($_POST['to_date']),          
         'severity' => trim($_POST['severity']),     
         'campaign'=> trim($_POST['campaign']),     
        ];
         
  if(empty($data['severity']) && empty($data['campaign']) ){
          $status='Close';
	  $tickets = $this->ticketModel->getTickets1($status,$data);
	  // Check for owner
	  $data = [
		'tickets' => $tickets
	  ];
    
    $this->view('tickets/reports', $data);
  }

else if(empty($data['severity'])){
          $status='Close';
	  $tickets = $this->ticketModel->getTickets2($status,$data);
	  // Check for owner
	  $data = [
		'tickets' => $tickets
	  ];
    
    $this->view('tickets/reports', $data);
}
else  if(empty($data['campaign']) ){
          $status='Close';
	  $tickets = $this->ticketModel->getTickets3($status,$data);
	  // Check for owner
	  $data = [
		'tickets' => $tickets
	  ];
    
    $this->view('tickets/reports', $data);
  }
        
        else {
          $status='Close';
          $tickets = $this->ticketModel->getTickets4($status,$data);
          // Check for owner
          $data = [
          'tickets' => $tickets
          ];
          
          $this->view('tickets/reports', $data);
        }
     
      }
      else {
        $status='Close';
	  $tickets = $this->ticketModel->getTickets($status);
	  // Check for owner
	  $data = [
		'tickets' => $tickets
	  ];
    
    $this->view('tickets/reports', $data);
  
      }
  
    // Get existing post from model
   
    
  }
  
  //-------------------------------------------------------------------
  
  public function reports_close(){

  // Check for owner
    
  
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Sanitize POST array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
      $data =[
          'from' => trim($_POST['from_date']), 
          'to' => trim($_POST['to_date']),          
         'severity' => trim($_POST['severity']),     
         'campaign'=> trim($_POST['campaign']),     
        ];
         
  if(empty($data['severity']) && empty($data['campaign']) ){
          $status='Close';
	  $tickets = $this->ticketModel->getcloseTickets1($status,$data);
	  // Check for owner
	  $data = [
		'tickets' => $tickets
	  ];
    
    $this->view('tickets/reports_close', $data);
  }

else if(empty($data['severity'])){
          $status='Close';
	  $tickets = $this->ticketModel->getcloseTickets2($status,$data);
	  // Check for owner
	  $data = [
		'tickets' => $tickets
	  ];
    
    $this->view('tickets/reports_close', $data);
}
else  if(empty($data['campaign']) ){
          $status='Close';
	  $tickets = $this->ticketModel->getcloseTickets3($status,$data);
	  // Check for owner
	  $data = [
		'tickets' => $tickets
	  ];
    
    $this->view('tickets/reports_close', $data);
  }
        
        else {
          $status='Close';
          $tickets = $this->ticketModel->getcloseTickets4($status,$data);
          // Check for owner
          $data = [
          'tickets' => $tickets
          ];
          
          $this->view('tickets/reports_close', $data);
        }
     
      }
      else {
        $status='Close';
	  $tickets = $this->ticketModel->getcloseTickets($status);
	  // Check for owner
	  $data = [
		'tickets' => $tickets
	  ];
    
    $this->view('tickets/reports_close', $data);
  
      }
  
    // Get existing post from model
   
    
  }
  //-----------------------------------------------------------------------------------------------------
  public function userwise_report(){

  // Check for owner
    
  
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Sanitize POST array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
      $data =[
          'from' => trim($_POST['from_date']), 
          'to' => trim($_POST['to_date']),    
         'username'=> trim($_POST['username']),     
        ];
         
  if(empty($data['username']) ){
            
    $this->view('tickets/userwise_report1', $data);
  }

else {
          
    
    $this->view('tickets/userwise_report2', $data);
}

     
      }
      else {
        $status='Close';
    $tickets = $this->ticketModel->getcloseTickets($status);
    // Check for owner
    $data = [
    'tickets' => $tickets
    ];
    
    $this->view('tickets/userwise_report', $data);
  
      }
  
    // Get existing post from model
   
    
  }
  
  
  //------------------------------------------------------------------------------------------------------

      }
      






    
    
  
