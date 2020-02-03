<?php
  class helpdesk extends Controller {
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
  $data = [
  'title' => 'Dashboard',    
]; 
    $email=$_SESSION['email'];
  
//  $data['countTicket']=$this->ticketModel->totalticket($status); 
    $data['critical']=$this->helpdeskModel->criticalticket($status,$critical,$email); 
    $data['high']=$this->helpdeskModel->highticket($status,$high,$email);
    $data['medium']=$this->helpdeskModel->mediumticket($status,$medium,$email);
    $data['low']=$this->helpdeskModel->lowticket($status,$low,$email);
  
$this->view('helpdesk/index_new', $data);
}

//---------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------
    

        public function ticketlist(){        
          $status='Close';
          $email=$_SESSION['email'];
      $campaign = $this->departmentModel->getuserCampaign1($email);        
           // $campaign=$campaignID[0]->campaign_id;
          // Check for owner
        if($campaign==''){
            flash('campaign_message', 'you dont have rights to access any campaign please contact Admin');
             redirect('users/index_new');
          } 
     
          else{  
          
          $tickets = $this->helpdeskModel->UserTickets1($status,$email,$campaign);
  
          // Check for owner
          $data = [
            'tickets' => $tickets
          ];
           
         //  print_r($data);die;
          $this->view('helpdesk/ticketlist', $data);
      }
        }
//---------------------------------------------------------------------------------------------------------------
public function selfassign($ticketID){  
  $email=$_SESSION['email'];
      
  if($this->helpdeskModel->selfassignTicket($ticketID,$email)){
// flash('assignee_message', 'ticket assigned successfully');
  redirect('helpdesk/ticketlist');
        } 

  
    // Get existing post from model
   
    
  }
//----------------------------------------------------------------------------------------------------

public function openUser($ticketID){

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
    
    $this->view('helpdesk/openUser', $data);
  
    
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
    
      // Validated
      if($this->ticketModel->SetAssignee($data,$assignee_number)){
        flash('assignee_message', 'ticket assigned successfully');
        redirect('helpdesk/ticketlist');
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
  
  $this->view('helpdesk/Reassign', $data);

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

        if($this->helpdeskModel->TicketUpdate($data, $campaign_email,$campaign_number)){
          flash('assignee_message', 'ticket assigned successfully');
          redirect('helpdesk/ticketlist');
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
    
    $this->view('helpdesk/update', $data);
  
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
       // print_r($data['assigned_to']);die;
       
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
              redirect('helpdesk/ticketlist');
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
              redirect('helpdesk/ticketlist');
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
        if($data['assigned_to']!="Not Assigned"){  
        $this->view('helpdesk/close', $data);
      
          }
      else {
        flash('assignee_message', 'Ticket not assigned');
         redirect('helpdesk/ticketlist');
            }
        // Get existing post from model
       
        }
      }
        //-------------------------------------------------------------------------------------------------------------   
        public function status($ticketID){        
         
         
          $tickets = $this->helpdeskModel->TicketStatus($ticketID);
  
          // Check for owner
          $data = [
            'tickets' => $tickets
          ];
           
          $this->view('helpdesk/status', $data);
        }

      //----------------------------------------------------------------------------------------------------------------
      public function oncall_ticket(){
      
        // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Process form
      // Sanitize POST data
         // Init data
         $currentDir = getcwd();
         $uploadDirectory = "/uploads/";
         $errors = []; // Store all foreseen and unforseen errors here
      
         $fileExtensions = ['doc','pdf','png','jpeg']; // Get all the file extensions
      
         $fileName = $_FILES['photo']['name'];
         $fileSize = $_FILES['photo']['size'];
         $fileTmpName  = $_FILES['photo']['tmp_name'];
         $fileType = $_FILES['photo']['type'];
         $ext = explode(".", $_FILES['photo']['name']);
       $ext2 = end($ext);
      
      
      $data =[
       'email' => trim($_POST['email']), 
      'number' => trim($_POST['number']), 
      'client' => trim($_POST['client']), 
       'title' => trim($_POST['title']), 
       'description' => trim($_POST['description']), 
       'severity' => trim($_POST['severity']),
       'file'=> basename($fileName), 
       'status' => trim($_POST['status']),  
       'process' => trim($_POST['service']),  
       'email_err' => '' ,
       'number_err' => '' ,
       'title_err' => '' , 
       'description_err' => '' , 
       'client_err' => '' ,
       'severity_err' => '' ,
       'file_err' => '' ,
       'processtype_err' => '' , 
      ];
      //print_r($data);die;
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
      

      
      
      //get campaign ID 
      $campaign = $this->ticketModel->getCampainID($data['client'],$data['process']);
      $campaignID=$campaign->campaign_id;
      
      $campaign_email=$this->ticketModel->getCampaignEmail($campaignID);
      $campaign_number=$this->ticketModel->getCampaignNumber($campaignID);

      if(empty($campaignID)){
        $data['processtype_err'] = 'This service is not included Please contact admin';
       }
      
      
      
      if(empty($data['title'])){
       $data['title_err'] = 'Please enter title';
      }
      if(empty($data['client'])){
        $data['client_err'] = 'Please enter title';
       }
      /*if($this->clientModel->findClientByID($data['client_ID'])){
        //  valid ID
      }
      else{
        $data['ID_err'] = 'invalid ID';
      } */
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
        
       if($this->helpdeskModel->oncallTicket($data,$campaignID,$campaign_email,$campaign_number)){
         flash('register_success', 'ticket created Successfully');  
         redirect('helpdesk/oncall_ticket');
        }
                
       } 
      else {
       // Load view with errors
       $this->view('helpdesk/oncall_ticket', $data);
      }       
      
      } else {

    
      // Init data
      $data =[
        'email' => '' , 
        'number' =>'', 
        'title' => '' , 
       'description' => '' , 
       'severity' => '' , 
       'file' => '' , 
       'status' => '' , 
       'process' => '' , 
       'email_err' => '' , 
       'number_err' => '' , 
        'title_err' => '' , 
       'description_err' => '' , 
       'severity_err' => '',
       'client_err' => '' ,
       'file_err' => '' ,
       'processtype_err' => '' 
      ];
      
      // Load view
      $this->view('helpdesk/oncall_ticket', $data);
      }
      
      
      }

        //---------------------------------------------------------------------------------------------------------------
        public function Popup(){        
         $number = $_GET["phoneNumber"];  
           $client_ID = $this->ticketModel->getclientID($number);
           $clientname= $this->ticketModel->getclientName($number);

         $data=[
          'email' => '' , 
          'number' =>$number,
          'clientID'=>$client_ID,
          'clientname'=>$clientname,
          'title' => '' , 
         'description' => '' , 
         'severity' => '' , 
         'file' => '' , 
         'status' => '' , 
         'process' => '' , 
         'email_err' => '' , 
         'number_err' => '' , 
          'title_err' => '' , 
         'description_err' => '' , 
         'severity_err' => '',
         'client_err' => '' ,
         'file_err' => '' ,
         'processtype_err' => '' 
        
         ];   
        // Check for owner
        $this->view('helpdesk/oncall_ticket', $data);
        }
        //------------------------------------------------------------------------------------------------------
      //---------------------------------------------------------------------------------------------------------------
      public function search(){        
         
         
        $keywords = $this->helpdeskModel->getKeywords();

        // Check for owner
        $data = [
          'keywords' => $keywords
        ];
         
        $this->view('helpdesk/search', $data);
      }
      //------------------------------------------------------------------------------------------------------
      public function search_result(){    

         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
     // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
      
          $keyword = trim($_POST['keyword']) ;                 
         
        
          
       $tickets = $this->helpdeskModel->searchResult($keyword);

  // Check for owner
   $data = [
    'tickets' => $tickets
     ];
   //print_r($data);die;
  $this->view('helpdesk/search_result', $data);
      
       
      }
      else {
      
    // Check for owner
    $data = [
      'keyword' => '' 
    ];
    
    $this->view('helpdesk/search', $data);
  
      }
  
    // Get existing post from model
   
    
  }

           
      //------------------------------------------------------------------------------------------------------
    public function sla_notification()
      {
         $status='Close';
         $email=$_SESSION['email'];       
         
         $tickets = $this->departmentModel->getAssigneeTickets($status, $email);
         $data = 
         [
          'tickets' => $tickets
         ];
        $this->view('helpdesk/sla_notification', $data);
         
      }
    //----------------------------------------------------------------------------------------------------
    public function customer_close(){

      // Check for owner
    
      
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
          // Sanitize POST array
          $ticketID = $_GET["ticketID"];     
          //print_r($ticketID);die;    
         // print_r($ticketID);  
          $ticket_status = $this->helpdeskModel->NewTicketStatus($ticketID);
          if($ticket_status=="Close"){
            echo "Invalid Link Your ticket has been Closed <p>  <a href=http://isparkcrm.com/integrated-crm/users/index_new?
            >Click Here to Login </a>" ; 
          }
          else{
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
          
          $this->view('helpdesk/customer_close', $data);

        }
         /* if($this->helpdeskModel->UpdateStatus($ticketID,$status_new)){
            $status_new="close";
            //status updated in tickets
          }  */

          }
      
        // Get existing post from model
        
        
      }
      //--------------------------------------------------------------------------------------------------------
      public function customer_accept($ticketID){
                // Check for owner
          
           $status_new="Close";
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
            $data = [
              'subject' =>trim($_POST['subject']),
              'ticketID' => trim($_POST['ticketID']),             
            ];
             //get campaign ID 
          $flag="2";
          if($this->helpdeskModel->UpdateClosingStatus($data['ticketID'],$flag)){
              //status updated in tickets
            } 
            if($this->helpdeskModel->UpdateStatus($ticketID,$status_new)){
            // flash('accept_success', 'ticket closed Successfully');  
            //redirect('helpdesk/customer_feedback');
                 $this->view('helpdesk/customer_feedback', $data);
             
              
            }         
          // Get existing post from model   
          
        }
      
      }   
  //-----------------------------------------------------------------------------------------------------
  public function customer_feedback(){
    // Check for owner

$status_new="close";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
// Sanitize POST array
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

$data = [
  'question1' =>trim($_POST['q1']),
  'Answer' =>trim($_POST['answer']),
  'ticketID' => trim($_POST['ticketID'])
];

//print_r($data);die;
if($this->helpdeskModel->CustomerFeedback($data)){
  $this->view('helpdesk/customer_accept', $data);
            
} 

}
else {
  // Init data
  $data =[
    'question1' => '' , 
    'answer' => '' , 
    'ticketID' => '' 
    ];
  
  // Load view
  $this->view('helpdesk/customer_feedback', $data);
  }
}  
//-----------------------------------------------------------------------------------------------------
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
          $tickets = $this->helpdeskModel->UserTickets($status,$email);
      
  if(empty($data['severity'])){
          $status='Close';
       $tickets = $this->helpdeskModel->getTickets1($status,$data,$email);
    // Check for owner
    $data = [
    'tickets' => $tickets
    ];
    
    $this->view('helpdesk/reports', $data);
  }


        else {
          $status='Close';
          $tickets = $this->helpdeskModel->getTickets4($status,$data,$email);
          // Check for owner
          $data = [
          'tickets' => $tickets
          ];
          
          $this->view('helpdesk/reports', $data);
        }
     
      }
      else {
        $status='Close';
        $email=$_SESSION['email'];      
        $tickets = $this->helpdeskModel->UserTickets($status,$email);
    // Check for owner
    $data = [
    'tickets' => $tickets
    ];
    
    $this->view('helpdesk/reports', $data);
  
      }
  
    // Get existing post from model 
    
  }
//---------------------------------------------------------------------------------------------------------
  public function sendmail($ticketID){

  // Check for owner
    
  
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $currentDir = getcwd();
    $uploadDirectory = "/email_campaign/";
       $uploadDirectory = "/email_campaign/";
    $errors = []; // Store all foreseen and unforseen errors here
 
    $fileExtensions = ['doc','pdf','png','jpeg','jpg']; // Get all the file extensions
 
    $fileName = $_FILES['photo']['name'];
    $fileSize = $_FILES['photo']['size'];
    $fileTmpName  = $_FILES['photo']['tmp_name'];
    $fileType = $_FILES['photo']['type'];
    $ext = explode(".", $_FILES['photo']['name']);
    $ext2 = end($ext);
      // Sanitize POST array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
      $data =[
        
         'email' => trim($_POST['email']), 
         'ticketID' => trim($_POST['ticketID']), 
         'title' => trim($_POST['title']), 
          'file'=> basename($fileName),         
         'description' => trim($_POST['description']),          
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
          redirect('helpdesk/ticketlist');
      }
      else{
        flash('email_message', 'Something went wrong');
        redirect('helpdesk/ticketlist');
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
    
    $this->view('helpdesk/sendmail', $data);
  
      }
  
    // Get existing post from model
   
    
  }
//---------------------------------------------------------------------------------------------------------
      }
      






    
    
  
