<?php
  class EmailLeads extends Controller {
    public function __construct()
	{
      $this->postModel = $this->model('Post');
      $this->userModel = $this->model('User');
      $this->ticketModel = $this->model('Ticket');
      $this->campaignModel = $this->model('campaignModel'); 
      $this->emailleadModel = $this->model('EmailLead');
    }
 //-----------------------------------------------------------------------------------------------------------
 //----------------------------------------------------------------------------------------------------------
 public function index_new()
 {
    $hostname = "{czipop.logix.in:993/imap/ssl}INBOX";
    $username = "helpdesk@futurecalls.com";
    $password = "Pass@123";
  // $username = "helpdesk@futurecalls.com";
  // $password = "Password@123";
     $inbox = imap_open($hostname,$username,$password) or die('Cannot connect to mail: ' . imap_last_error());
    //If we get to this point, it means that we have successfully
    //connected to our mailbox via IMAP.     
    //Lets get all emails that were received since a given date.
    $search = 'SINCE "' . date("j F Y", strtotime("-1 days")) . '"';
    //$emails = imap_search($inbox, $search,1,'UNSEEN');
    $emails = imap_search($inbox,'UNSEEN');

    if(!empty($emails)){
        //Loop through the emails.
        foreach($emails as $email){
            //Fetch an overview of the email.
            $header = imap_headerinfo($inbox, $email);
            $from = $header->from[0]->mailbox . "@" . $header->from[0]->host;
            $overview = imap_fetch_overview($inbox, $email);
            $overview = $overview[0];
            $message1=(imap_fetchbody($inbox,$email,1));
            //Print out the subject of the email.     
            //Get the body of the email.
            
            $subject=htmlentities($overview->subject);
            $message = imap_fetchbody($inbox, $email, 1, FT_PEEK);

            $campaignID=$this->emailleadModel->FindCampaign($username);
           // $campaign_email=$this->ticketModel->getCampaignEmail($campaignID);
            //$position1=strpos($subject,'[');
            //$position=strpos($subject,'#');
             
           
            
            //$tid= substr($subject, $position1+1,$position-5);
            //$clientID=$this->emailleadModel->FindClient($from);
            //print_r($clientID);
           

            $data = [
              'subject'=>$subject,
               'description'=>$message,
               'email'=>$from,
               'campaign'=>$campaignID,              
            ];
          //print_r($position);die;  
          //($pos === false)
         
         // print_r($campaignID);die;          
                         
            if($this->emailleadModel->createEmailLead($data)){
                echo "Ticket Created Successfully";
            }
            else{
                echo "somthing went wrong";
            }           
     
     
            }
        } 
}
//--------------------------------------------------------------------------------------------------------
 }
      






    
    
  
