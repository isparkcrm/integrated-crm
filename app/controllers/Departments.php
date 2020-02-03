<?php
  class Departments extends Controller {
    public function __construct(){
     

      $this->postModel = $this->model('Post');
      $this->userModel = $this->model('User');
      $this->ticketModel = $this->model('Ticket');
      $this->campaignModel = $this->model('campaignModel'); 
      $this->clientModel = $this->model('client'); 
      $this->helpdeskModel = $this->model('helpdesks'); 
      $this->departmentModel = $this->model('department'); 
       $this->emailcampaignModel = $this->model('Emailcampaigns');
    }
 //-----------------------------------------------------------------------------------------------------------
 //----------------------------------------------------------------------------------------------------------
 public function index_new(){
 
  $status='Close';
  $critical='P1';
  $high='P2';
  $medium='P3';
  $low='P4';
  $email=$_SESSION['email'];
		$campaignID = $this->departmentModel->getuserCampaign($email);        
            $campaign=$campaignID[0]->campaign_id;
  $data = [
 
  'title' => 'Dashboard', 
'campaign' => $campaign   
]; 
		$email=$_SESSION['email'];
		$campaignID = $this->departmentModel->getuserCampaign($email);        
            $campaign=$campaignID[0]->campaign_id;
//	$data['countTicket']=$this->ticketModel->totalticket($status); 
	  $data['critical']=$this->departmentModel->criticalticket($status,$critical,$campaign); 
	  $data['high']=$this->departmentModel->highticket($status,$high,$campaign);
	  $data['medium']=$this->departmentModel->mediumticket($status,$medium,$campaign);
	  $data['low']=$this->departmentModel->lowticket($status,$low,$campaign);
  

$this->view('departments/index_new', $data);
}


//---------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------
    

        public function campaign_tickets(){        
          $status='Close';
          $email=$_SESSION['email'];
          $campaignID = $this->departmentModel->getuserCampaign($email);        
            $campaign=$campaignID[0]->campaign_id;
           //print_r($campaign);die;
          if($campaign==''){
            flash('campaign_message', 'you dont have rights to access this campaign please contact Admin');
            redirect('departments/campaign_tickets');
          } 
          else{  
          $tickets = $this->departmentModel->departmentTickets($status,$campaign);
  
          // Check for owner
          $data = [
            'tickets' => $tickets
          ];
           
          $this->view('departments/campaign_tickets', $data);
        }
        }
//---------------------------------------------------------------------------------------------------------------

public function sms_tickets(){        
          $status='Close';
          $email=$_SESSION['email'];
          $campaign="6";
           //print_r($campaign);die;
          if($campaign==''){
            flash('campaign_message', 'you dont have rights to access this campaign please contact Admin');
            redirect('departments/campaign_tickets');
          } 
          else{  
          $tickets = $this->departmentModel->smsTickets($status,$campaign);
		  // Check for owner
          $data = [
            'tickets' => $tickets
          ];
           
          $this->view('departments/sms_tickets', $data);
        }
        }
//--------------------------------------------------------------------------------------------------------------
public function openUser($ticketID){
		$this->departmentModel->updatereadstatus($ticketID);
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
    $this->view('departments/openUser', $data);
  
    
}
    
//-------------------------------------------------------------------------------------------------------------  
public function Reassign($ticketID){

// Check for owner
  

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
        redirect('departments/campaign_tickets');
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
  
  $this->view('departments/Reassign', $data);

    }

  // Get existing post from model
 
  
}
  
//-------------------------------------------------------------------------------------------------------------   

public function update($ticketID){

  // Check for owner
    
  
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Sanitize POST array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
      $data =[
          'client' => trim($_POST['client']), 
          'email' => trim($_POST['email']), 
          'number' => trim($_POST['number']), 
         'title' => trim($_POST['title']), 
         'description' => trim($_POST['description']), 
         'severity' => trim($_POST['severity']),
         'ticketID' => trim($_POST['ticketID']),
         'campaignID'=> trim($_POST['campaignID']),
         'status_new' => trim($_POST['status_new']),           
         'process' => trim($_POST['process']),  
         'assigned_to' => trim($_POST['assigned_to']),  
         'created_date' => trim($_POST['date']),  
         'action' => trim($_POST['action']),    
         'notification' => trim($_POST['notification']),           
         'action_err' => '' 
        ];
   
        $campaignID=$data['campaignID'];
        $campaign_email=$this->ticketModel->getCampaignEmail($campaignID);
   $campaign_number=$this->ticketModel->getCampaignNumber($campaignID);
        // Validated
        if($this->helpdeskModel->UpdateStatusNew($data)){
          //status updated in tickets
        } 

        if($this->helpdeskModel->TicketUpdate($data,$campaign_email,$campaign_number)){
          flash('assignee_message', 'ticket assigned successfully');
          redirect('departments/campaign_tickets');
        }
        else {
          die('Something went wrong');
        }
     
      }
      else {
        $ticketlist = $this->ticketModel->assignTicket($ticketID);
  
    // Check for owner
    $data = [
      'id' => $ticketlist->id,
      'email' => $ticketlist->email,
      'number' => $ticketlist->number,
     'subject' => $ticketlist->subject,
     'description' => $ticketlist->description,
     'ticketID' => $ticketlist->ticketID,
     'clientID' => $ticketlist->clientID,
     'status' => $ticketlist->status,
     'campaign' => $ticketlist->campaign_ID,
     'severity' => $ticketlist->severity,
     'process' => $ticketlist->process,
     'assigned_to' => $ticketlist->assigned_to,
     'attachment' => $ticketlist->attachment,
     'created_at' => $ticketlist->created_at
    
    ];
    
    $this->view('departments/update', $data);
  
      }
  
    // Get existing post from model
   
    
  }
    //-------------------------------------------------------------------------------------------------------------   
    public function close($ticketID){

      // Check for owner
        
      
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Sanitize POST array
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

          $currentDir = getcwd();
   $uploadDirectory = "/casestudy/";
   $errors = []; // Store all foreseen and unforseen errors here

   $fileExtensions = ['pdf','png','jpeg','jpg']; // Get all the file extensions

   $fileName = $_FILES['photo']['name'];
   $fileSize = $_FILES['photo']['size'];
   $fileTmpName  = $_FILES['photo']['tmp_name'];
   $fileType = $_FILES['photo']['type'];
   $ext = explode(".", $_FILES['photo']['name']);
 $ext2 = end($ext);
      
          $data =[
              'client' => trim($_POST['client']), 
              'email' => trim($_POST['email']), 
              'number' => trim($_POST['number']), 
             'title' => trim($_POST['title']), 
             'description' => trim($_POST['description']), 
             'severity' => trim($_POST['severity']),
             'ticketID' => trim($_POST['ticketID']),
             'campaignID'=> trim($_POST['campaignID']),
             'status_new' => trim($_POST['status_new']),           
             'process' => trim($_POST['process']),  
             'assigned_to' => trim($_POST['assigned_to']),  
             'created_date' => trim($_POST['date']),  
             'action' => trim($_POST['action']),  
              'info' => trim($_POST['info']),     
             'know_title' => trim($_POST['title1']), 
 'know_description' => trim($_POST['description1']), 
 'keyword' => trim($_POST['keyword']),
 'file'=> basename($fileName),  
 'version'=> trim($_POST['version']),
 'title_err' => '' , 
 'description_err' => '' , 
 'key_err' => '' ,
 'file_err' => '' ,
'action_err' => '' 
            ];
       
            $campaignID=$data['campaignID'];
            $campaign_email=$this->ticketModel->getCampaignEmail($campaignID);
       $campaign_number=$this->ticketModel->getCampaignNumber($campaignID);
            // Validated

            $uploadPath = $currentDir . $uploadDirectory . basename($fileName); 
            if (in_array($ext2,$fileExtensions)) {
                   $data['file_err']  = "This file extension is not allowed. Please upload a pdf or image file";
                  
               }
       
               if ($fileSize > 2000000) {
                 $data['file_err']= "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
               }
       
               if (empty($errors)) {
             
                   $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
       
                  
               } else {
                   foreach ($errors as $error) {
                     $data['file_err']= $error . "These are the errors" . "\n";
                   }
               }
             
            //get campaign ID 

         if($this->helpdeskModel->EngineerClosingStatus($data['ticketID'])){
              //status updated in tickets
            } 
          if($data['info']=="yes"){ 
            if($this->helpdeskModel->TicketClose($data,$campaign_email,$campaign_number)){
              $this->departmentModel->CreateKnowledgebase($data);
              $flag="1";
              if($this->helpdeskModel->UpdateClosingStatus($data['ticketID'],$flag)){
                  //status updated in tickets
                } 
              flash('assignee_message', 'ticket closed successfully');
              redirect('departments/campaign_tickets');
            }
            else {
              die('Something went wrong');
            }
         }
         else{
          if($this->helpdeskModel->TicketClose($data,$campaign_email,$campaign_number)){
            
              $flag="1";
              if($this->helpdeskModel->UpdateClosingStatus($data['ticketID'],$flag)){
                  //status updated in tickets
                } 
              flash('assignee_message', 'ticket closed successfully');
              redirect('departments/campaign_tickets');
            }
            else {
              die('Something went wrong');
            }
         }
          }
          else {
            $ticketlist = $this->ticketModel->assignTicket($ticketID);
      
        // Check for owner
        $data = [
          'id' => $ticketlist->id,
          'email' => $ticketlist->email,
          'number' => $ticketlist->number,
         'subject' => $ticketlist->subject,
         'description' => $ticketlist->description,
         'ticketID' => $ticketlist->ticketID,
         'clientID' => $ticketlist->clientID,
         'status' => $ticketlist->status,
         'campaign' => $ticketlist->campaign_ID,
         'severity' => $ticketlist->severity,
         'process' => $ticketlist->process,
         'assigned_to' => $ticketlist->assigned_to,
         'attachment' => $ticketlist->attachment,
         'created_at' => $ticketlist->created_at,        
         'title_err' => '' , 
         'description_err' => '' , 
         'key_err' => '' ,
         'file_err' => '' ,
        'action_err' => '' 
        ];
        
        $this->view('departments/close', $data);
      
          }
      
        // Get existing post from model
       
        
      }
        //-------------------------------------------------------------------------------------------------------------   
        public function status($ticketID){        
         
         
          $tickets = $this->helpdeskModel->TicketStatus($ticketID);
  
          // Check for owner
          $data = [
            'tickets' => $tickets
          ];
           
          $this->view('departments/status', $data);
        }

      //-------------------------------------------------------------------------------------------------------
      public function campaignlist(){
        $email=$_SESSION['email'];
          $campaignID = $this->departmentModel->getuserCampaign($email);        
            $campaign=$campaignID[0]->campaign_id;
           //print_r($campaign);die;
          if($campaign==''){
            flash('campaign_message', 'you dont have rights to access this campaign please contact Admin');
            redirect('departments/campaign_tickets');
          } 
          else{  
        $campaignlist = $this->departmentModel->campaignList($campaign);
        $data = [
           'campaign' => $campaignlist
        ];
         $this->view('departments/campaignlist', $data);
      }
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
           $this->view('departments/agent',$data);
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
             'role' => trim($_POST['role']),
             'username_err' =>'',
             'role_err' =>''
             ];
           if(empty($data['username_err']) && empty($data['role_err']))
             {
               $campaign_id = trim($_POST['id']);				
               if($this->campaignModel->Createagent($data,$campaign_id))
               {
                 flash('register_success', 'Agent Added Successfully');  
                 redirect('departments/campaignlist');
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
       
           $this->view('departments/agent', $data);
         }
         }
       //------------------------------------------------------------------------
       
       public function agentdelete($id)
       {
         if($this->campaignModel->agentdelete($id))
         {
           flash('register_success', 'Agent Deleted Successfully');  
           redirect('departments/campaignlist');
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
           $this->view('departments/addclient',$data);
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
                 redirect('departments/campaignlist');
               }	
             }
             else {
               // Load view with errors
               $data['client'] = $this->campaignModel->getClient($data['campaignID']);
               $this->view('departments/addclient', $data);
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
           
           $this->view('departments/addclient', $data);
         }
         }
         
       //------------------------------------------------------------------------
       
       public function clientdelete($id)
       {
         if($this->campaignModel->clientRemove($id))
         {
           flash('register_success', 'client Deleted Successfully');  
           redirect('departments/addclient');
         }
       }
  //----------------------------------------------------------------------------------------------------------
       public function service()
  {
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    
    {
    
      $data = [
       'campaignID' => trim($_POST['id'])
      ];
    }
    $role="customer";
    $data['campaign'] = $this->campaignModel->getcampaign();
    $data['agent'] = $this->campaignModel->getcampaignService($data['campaignID']);
    $data['servicelist'] = $this->campaignModel->ServiceList();
    //print_r($data['servicelist']);die;
    $this->view('departments/service',$data);
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
          redirect('departments/campaignlist');
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

    $this->view('departments/service', $data);
  }
  }


//---------------------------------------------------------------------------------------------
  public function servicedelete($id)
{
  if($this->campaignModel->servicedelete($id))
  {
    flash('service_delete', 'service Deleted Successfully');  
    redirect('departments/campaignlist');
  }
}
 //----------------------------------------------------------------------------------------------------------
  public function sla_notification()
	{
     $status='Close';
     $email=$_SESSION['email'];
     $campaignID = $this->departmentModel->getuserCampaign($email);        
       $campaign=$campaignID[0]->campaign_id;
      //print_r($campaign);die;
     if($campaign==''){
       flash('campaign_message', 'you dont have rights to access this campaign please contact Admin');
       redirect('departments/campaign_tickets');
     } 
     else{  
		 $tickets = $this->departmentModel->getCampaignduration($status, $campaign);
		 $data = 
		 [
			'tickets' => $tickets
		 ];
    $this->view('departments/sla_notification', $data);
     }
	}
 //----------------------------------------------------------------------------------------------------------
 public function auto_close()
 {
    $flag="1";
   
  $tickets = $this->departmentModel->ClosingTickets($flag);
		 $data = 
		 [
			'tickets' => $tickets
     ];
     
foreach($data['tickets'] as $tickets) :  
date_default_timezone_set('Asia/Kolkata');
$date_expire = $tickets->closed_at;    
$date = new DateTime($date_expire);
$now = new DateTime();
$interval = $now->diff($date);
$diff= ($interval->days * 24) + $interval->h;  

echo $diff."Hours"; 
$ticketID= $tickets->ticketID;
$status_new="Close";
if($diff >= '48'){
  $flag="2";
  if($this->helpdeskModel->UpdateClosingStatus($ticketID,$flag)){
      //status updated in tickets
    } 
    if($this->helpdeskModel->UpdateStatus($ticketID,$status_new)){
    // flash('accept_success', 'ticket closed Successfully');  
    echo "Ticket Updated Successfully";
    }        
}

endforeach;
 }
//----------------------------------------------------------------------------------------------------------    
public function sendmail($ticketID){

  // Check for owner
    
   

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      // Sanitize POST array $currentDir = getcwd();
        $currentDir = getcwd();
    $uploadDirectory = "/email_campaign/";
    $errors = []; // Store all foreseen and unforseen errors here
 
    $fileExtensions = ['doc','pdf','png','jpeg','jpg']; // Get all the file extensions
 
    $fileName = $_FILES['photo']['name'];
    $fileSize = $_FILES['photo']['size'];
    $fileTmpName  = $_FILES['photo']['tmp_name'];
    $fileType = $_FILES['photo']['type'];
    $ext = explode(".", $_FILES['photo']['name']);
    $ext2 = end($ext);

      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
      $data =[
        
         'email' => trim($_POST['email']), 
         'ticketID' => trim($_POST['ticketID']), 
         'title' => trim($_POST['title']), 
         'description' => trim($_POST['description']),   
          'file'=> basename($fileName),            
         'action_err' => '' ,
          'file_err' => ''  
        ];

 $uploadPath = $currentDir . $uploadDirectory . basename($fileName); 
     if (in_array($ext2,$fileExtensions)) {
            $data['file_err']  = "This file extension is not allowed. Please upload a JPEG or PNG file";
           
        }

        if ($fileSize > 2000000) {
          $data['file_err']= "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        }

        if (empty($errors)) {
      
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

           
        } else {
            foreach ($errors as $error) {
              $data['file_err']= $error . "These are the errors" . "\n";
            }
        }


        if($this->departmentModel->sendEmail($data,$uploadPath,$fileName)){
          flash('email_message', 'email sent successfully');
          redirect('departments/campaign_tickets');
      }
      else{
        flash('email_message', 'Something went wrong');
        redirect('departments/campaign_tickets');
      }       
       }
      else {
        $ticketlist = $this->ticketModel->assignTicket($ticketID);
  
    // Check for owner
    $data = [
      'id' => $ticketlist->id,
      'email' => $ticketlist->email,
      'number' => $ticketlist->number,
     'subject' => $ticketlist->subject,
     'description' => $ticketlist->description,
     'ticketID' => $ticketlist->ticketID,
     'clientID' => $ticketlist->clientID,
     'status' => $ticketlist->status,
     'campaign' => $ticketlist->campaign_ID,
     'severity' => $ticketlist->severity,
     'process' => $ticketlist->process,
     'assigned_to' => $ticketlist->assigned_to,
     'attachment' => $ticketlist->attachment,
     'created_at' => $ticketlist->created_at,
    'file_err' => ''  
    ];
    
    $this->view('departments/sendmail', $data);
  
      }
  
    // Get existing post from model
   
    
  }
//-----------------------------------------------------------------------------------------------------------
public function reports(){

  // Check for owner
    
  
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Sanitize POST array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
      $data =[
          'from' => trim($_POST['from_date']), 
          'to' => trim($_POST['to_date']),          
         'severity' => trim($_POST['severity'])  
        
        ];
    $status='Close';
          $email=$_SESSION['email'];
          $campaignID = $this->departmentModel->getuserCampaign($email);        
            $campaign=$campaignID[0]->campaign_id;
			
  if(empty($data['severity'])){
          $status='Close';
	  $tickets = $this->departmentModel->getTickets1($status,$data,$campaign);
	  // Check for owner
	  $data = [
		'tickets' => $tickets
	  ];
    
    $this->view('departments/reports', $data);
  }


        else {
          $status='Close';
          $tickets = $this->departmentModel->getTickets4($status,$data,$campaign);
          // Check for owner
          $data = [
          'tickets' => $tickets
          ];
          
          $this->view('departments/reports', $data);
        }
     
      }
      else {
		   $status='Close';
          $email=$_SESSION['email'];
          $campaignID = $this->departmentModel->getuserCampaign($email);        
            $campaign=$campaignID[0]->campaign_id;
			
      
	 $tickets = $this->departmentModel->departmentTickets($status,$campaign);
	  // Check for owner
	  $data = [
		'tickets' => $tickets
	  ];
    
    $this->view('departments/reports', $data);
  
      }
  
    // Get existing post from model
   
    
  }
  ///-------------------------Reports Close------------------------
  public function reports_close(){

  // Check for owner
    
  
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Sanitize POST array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
      $data =[
          'from' => trim($_POST['from_date']), 
          'to' => trim($_POST['to_date']),          
         'severity' => trim($_POST['severity'])  
        
        ];
    $status='Close';
          $email=$_SESSION['email'];
          $campaignID = $this->departmentModel->getuserCampaign($email);        
            $campaign=$campaignID[0]->campaign_id;
			
  if(empty($data['severity'])){
          $status='Close';
	  $tickets = $this->departmentModel->getcloseTickets1($status,$data,$campaign);
	  // Check for owner
	  $data = [
		'tickets' => $tickets
	  ];
    
    $this->view('departments/reports_close', $data);
  }


        else {
          $status='Close';
          $tickets = $this->departmentModel->getcloseTickets4($status,$data,$campaign);
          // Check for owner
          $data = [
          'tickets' => $tickets
          ];
          
          $this->view('departments/reports_close', $data);
        }
     
      }
      else {
		   $status='Close';
          $email=$_SESSION['email'];
          $campaignID = $this->departmentModel->getuserCampaign($email);        
            $campaign=$campaignID[0]->campaign_id;
			
      
	 $tickets = $this->departmentModel->departmentcloseTickets($status,$campaign);
	  // Check for owner
	  $data = [
		'tickets' => $tickets
	  ];
    
    $this->view('departments/reports_close', $data);
  
      }
  
    // Get existing post from model
   
    
  }

//------------------------------------------------------------------------------------------------------------
  }
      






    
    
  

