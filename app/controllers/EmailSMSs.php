<?php
  class EmailSMSs extends Controller {
    public function __construct()
  {
      $this->postModel = $this->model('Post');
      $this->userModel = $this->model('User');
      $this->ticketModel = $this->model('Ticket');
      $this->campaignModel = $this->model('campaignModel'); 
      $this->emailticketModel = $this->model('EmailSMS');
    }
 //-----------------------------------------------------------------------------------------------------------
 //----------------------------------------------------------------------------------------------------------
 public function index_new()
 {
      $apiKey = urlencode('3TdEH0wkPpI-kh4AsiCntiNTqYAwKVbLJFfup56THp');
	// Inbox details
	$inbox_id = '10';
	// Prepare data for POST request
	$data = 'apikey=' . $apiKey . '&inbox_id=' . $inbox_id;
	// Send the GET request with cURL
	$ch = curl_init('https://api.textlocal.in/get_messages/?' . $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	// Process your response here
    $rest =json_decode($response, true);
	if(is_array($rest["messages"]))
	{
	foreach($rest["messages"] as $events)
		{
			 $id=$events["id"];
			 $number=$events["number"];
			 $from = substr($number, 2, 13);
		     $message=$events["message"];
			 $messagedate=$events["date"];
			 $username = "veera@futurecalls.com";
			 /* $sql = "INSERT INTO tempsms (number, message, messagedate) VALUES ('$num', '$message', '$messagedate')"; */
			 $campaignID=$this->emailticketModel->FindCampaign($username);
			 $campaign_email=$this->ticketModel->getCampaignEmail($campaignID);
			 $clientID=$this->emailticketModel->FindClient($from);
			 //$process=$this->emailticketModel->FindProcess($clientID);
            // $number=$this->emailticketModel->FindNumber($from);
			  
			  $data = [
				'subject'=>$message,
				'email' =>$username,
				'number'=>$from,
				'campaign'=>$campaignID,
				'client'=>$clientID,   
               'campaign_email'=>$campaign_email
               ];
			if(empty($clientID)){
            $this->emailticketModel->registeredClient($from);
            echo " not a register Customer";
           }
          else{
                     
            if($this->emailticketModel->createEmailTicket($data)){
                echo "Ticket Created Successfully";
            }
            else{
                echo "somthing went wrong";
            }
		}
		

		
	}
    /* connect to gmail */
   /*  
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
 */
    /* if(!empty($emails)){
        //Loop through the emails.
        
        foreach($emails as $email){
            //Fetch an overview of the email.
            $header = imap_headerinfo($inbox, $email);
            $from1 = $header->from[0]->mailbox . "@" . $header->from[0]->host;
				function SplitStringInWeirdWay($string, $num) {
		for ($i = 0; $i < strlen($string)-$num+1; $i++) {
			$result[] = substr($string, $i, $num);
		}
		return $result;
	}

	$string = $header->from[0]->mailbox . "@" . $header->from[0]->host;;
	
	$array = SplitStringInWeirdWay($string, 10);
	$from = $array[2];
	
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
          
           /*  */
           // print_r($data['description']);die;
          //print_r($position);die;  
          //($pos === false)
 
          /*  $campaignID=$this->emailticketModel->FindCampaign($username);
            $campaign_email=$this->ticketModel->getCampaignEmail($campaignID);
            
            $clientID=$this->emailticketModel->FindClient($from);
            //print_r($clientID);
           $process=$this->emailticketModel->FindProcess($clientID);
            //$number=$this->emailticketModel->FindNumber($from);
            //print_r($clientID);
           

            $data = [
              'subject'=>$subject,
               'number'=>$from,
               'campaign'=>$campaignID,
               'client'=>$clientID,   
               'campaign_email'=>$campaign_email,
               'process'=>$process
               
                ]; */

         /*  if(empty($position)){
         // print_r($campaignID);die;          
        
           if(empty($clientID)){
            $this->emailticketModel->registeredClient($from);
            echo " not a register Customer";
           }
          
          else{
                     
            if($this->emailticketModel->createEmailTicket($data,$message)){
                echo "Ticket Created Successfully";
            }
            else{
                echo "somthing went wrong";
            }           
        } */
    /*   }
      else{
        $status=$this->emailticketModel->TicketStatus($tid);
        if($this->emailticketModel->AddEmailTicket($data,$tid,$status,$file,$message)){
          echo "Ticket added Successfully";
      }
      }
   
            }
        } 
} */
//--------------------------------------------------------------------------------------------------------
 }
  }
  }
  
