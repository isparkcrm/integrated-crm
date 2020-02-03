<?php
  class EmailTickets extends Controller {
    public function __construct()
  {
      $this->postModel = $this->model('Post');
      $this->userModel = $this->model('User');
      $this->ticketModel = $this->model('Ticket');
      $this->campaignModel = $this->model('campaignModel'); 
      $this->emailticketModel = $this->model('EmailTicket');
    }
 //-----------------------------------------------------------------------------------------------------------
 //----------------------------------------------------------------------------------------------------------
 public function index_new()
 {
     
    /* connect to gmail */
    
    $hostname = "{czipop.logix.in:993/imap/ssl}INBOX";
    $username = "helpdesk@futurecalls.com";
    $password = "Pass@123";
  // $username = "helpdesk@futurecalls.com";
  // $password = "Password@123";
     $inbox = imap_open($hostname,$username,$password) or die('Cannot connect to mail:' . imap_last_error());
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
            $message=(imap_fetchbody($inbox,$email,1));
            //Print out the subject of the email.     
            //Get the body of the email.
           $structure = imap_fetchstructure($inbox, $email);
               //$body1=imap_body($inbox, $email);
            $subject=htmlentities($overview->subject);
           // $message = imap_fetchbody($inbox, $email, 1, FT_PEEK);

              //print_r($message);
              //print_r($message1);die;
          
            $attachments = array();
    
            /* if any attachments found... */
            if(isset($structure->parts) && count($structure->parts)) 
            {
                for($i = 0; $i < count($structure->parts); $i++) 
                {
                    $attachments[$i] = array(
                        'is_attachment' => false,
                        'filename' => '',
                        'name' => '',                        
                        'attachment' => '',
                        'Content-Type'=> 'text/html',
                        'charset'=>'UTF-8'
                    );
    
                    if($structure->parts[$i]->ifdparameters) 
                    {
                        foreach($structure->parts[$i]->dparameters as $object) 
                        {
                            if(strtolower($object->attribute) == 'filename') 
                            {
                                $attachments[$i]['is_attachment'] = true;
                                $attachments[$i]['filename'] = $object->value;
                            }
                        }
                    }
    
                    if($structure->parts[$i]->ifparameters) 
                    {
                        foreach($structure->parts[$i]->parameters as $object) 
                        {
                            if(strtolower($object->attribute) == 'name') 
                            {
                                $attachments[$i]['is_attachment'] = true;
                                $attachments[$i]['name'] = $object->value;
                            }
                        }
                    }
    
                    if($attachments[$i]['is_attachment']) 
                    {
                        $attachments[$i]['attachment'] = imap_fetchbody($inbox, $email, $i+1);
    
                        /* 3 = BASE64 encoding */
                        if($structure->parts[$i]->encoding == 3) 
                        { 
                            $attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);
                        }
                        /* 4 = QUOTED-PRINTABLE encoding */
                        elseif($structure->parts[$i]->encoding == 4) 
                        { 
                            $attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']);
                        }
                    }
                }
                
            }
            
    
            /* iterate through each attachment and save it */
            foreach($attachments as $attachment)
            {
                if($attachment['is_attachment'] == 1)
                {
                    $filename = $attachment['name'];
                    if(empty($filename)) $filename = $attachment['filename'];
    
                    if(empty($filename)) $filename = time() . ".DAT";
                    $currentDir = getcwd();
                    $uploadDirectory = "/uploads";
                    $folder = $currentDir . $uploadDirectory ;
                   
                    if(!is_dir($folder))
                    {
                         mkdir($folder);
                    }
                    $fp = fopen($folder
                     ."/" . $filename, "w+");
                    fwrite($fp, $attachment['attachment']);
                    fclose($fp);
                }
            }
            $file=$filename;
           // print_r($data['description']);die;
          //print_r($position);die;  
          //($pos === false)

           $campaignID=$this->emailticketModel->FindCampaign($username);
            $campaign_email=$this->ticketModel->getCampaignEmail($campaignID);
            $position1=strpos($subject,'[');
            $position=strpos($subject,'#');
                
            $tid= substr($subject, $position1+1,$position-5);
            $clientID=$this->emailticketModel->FindClient($from);
            //print_r($clientID);
           $process=$this->emailticketModel->FindProcess($clientID);
            $number=$this->emailticketModel->FindNumber($from);
            //print_r($clientID);
           

            $data = [
              'subject'=>$subject,
               'email'=>$from,
               'campaign'=>$campaignID,
               'client'=>$clientID,   
               'campaign_email'=>$campaign_email,
               'process'=>$process,
               'number'=>$number,
                ];

          if(empty($position)){
         // print_r($campaignID);die;          
        
           if(empty($clientID)){
            $this->emailticketModel->registeredClient($from);
            echo " not a register Customer";
           }
          
          else{
                     
            if($this->emailticketModel->createEmailTicket($data,$file,$message)){
                echo "Ticket Created Successfully";
            }
            else{
                echo "somthing went wrong";
            }           
        }
      }
      else{
        $status=$this->emailticketModel->TicketStatus($tid);
        if($this->emailticketModel->AddEmailTicket($data,$tid,$status,$file,$message)){
          echo "Ticket added Successfully";
      }
      }
   
            }
        } 
}
//--------------------------------------------------------------------------------------------------------
 }
      






    
    
  
