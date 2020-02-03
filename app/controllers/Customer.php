<?php
  class Customer extends Controller {
    public function __construct(){
     

      $this->postModel = $this->model('Post');
      $this->userModel = $this->model('User');
      $this->ticketModel = $this->model('Ticket');
      $this->clientModel = $this->model('client');
      $this->customerModel = $this->model('customers');
      $this->helpdeskModel = $this->model('helpdesks'); 
    }
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
		
	  $department=$_SESSION['usertype'];
//	$data['countTicket']=$this->ticketModel->totalticket($status); 
	  $data['critical']=$this->customerModel->criticalticket($status,$critical,$department); 
	  $data['high']=$this->customerModel->highticket($status,$high,$department);
	  $data['medium']=$this->customerModel->mediumticket($status,$medium,$department);
	  $data['low']=$this->customerModel->lowticket($status,$low,$department);
   
 
  $this->view('customer/index_new', $data);
}
    //----------------------------------------------------------------------------------------
    public function view_tickets(){
        $department=$_SESSION['usertype'];
        $status='Close';
        $tickets = $this->customerModel->getTickets($department,$status);

        // Check for owner
        $data = [
          'tickets' => $tickets
        ];
         
        $this->view('customer/view_tickets', $data);
      }
//-----------------------------------------------------------------------------------------------
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
  
  $this->view('customer/open', $data);

}
//--------------------------------------------------------------------------------------------------------------
public function closedtickets(){
  $department=$_SESSION['usertype'];
  $status='Close';
  $tickets = $this->customerModel->getClosedTickets($department,$status);

  // Check for owner
  $data = [
    'tickets' => $tickets
  ];
  
   
  $this->view('customer/closedtickets', $data);
}
//-----------------------------------------------------------------------------------------------------------------

public function Reopen($ticketID){  
  $status='Open';    
      
  if($this->customerModel->ReopenTicket($ticketID,$status)){
 flash('assignee_message', 'ticket assigned successfully');
  redirect('customer/closedtickets');
        } 
// Get existing post from model
 
  }

//------------------------------------------------------------------------------------------------------------------
public function customer_accept($ticketID){
 $status_new="Close";
 $flag="2";
if($this->helpdeskModel->UpdateClosingStatus($ticketID,$flag)){
//status updated in tickets
} 
if($this->helpdeskModel->UpdateStatus($ticketID,$status_new)){
// flash('accept_success', 'ticket closed Successfully');  
redirect('customer/view_tickets');

}         
// Get existing post from model  
}   
//------------------------------------------------------------------------------------------------------------
public function sla_notification(){
  $department=$_SESSION['usertype'];
  $status='Close';
  $tickets = $this->customerModel->SlaViolations($department,$status);

  // Check for owner
  $data = [
    'tickets' => $tickets
  ];
   
  $this->view('customer/sla_notification', $data);
}
//----------------------------------------------------------------------------------------------------------
}
