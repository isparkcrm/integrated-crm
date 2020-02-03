<?php
require 'PHPMailer/PHPMailer/PHPMailerAutoload.php';
require 'PHPMailer/PHPMailer/class.phpmailer.php';
require 'PHPMailer/PHPMailer/class.smtp.php';
  class Meeting extends Controller {
    public function __construct(){
		$this->leadModel = $this->model('lead');
      /* $this->meetingModel = $this->model('meeting'); */
    }
//----------------------------------------------------------------------------------------------------------------

public function meeting_master($id)
{
	
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
		
	$from_name = trim($_POST['from_name']);
	$from_address = trim($_POST['fromemail']);        
	$to_name = trim($_POST['attendedname']);        
	$to_address = implode(",", $_POST['attendedemail']);        
	$startTime = trim($_POST['starttime']);        
	$endTime = trim($_POST['endtime']);        
	$subject = trim($_POST['subject']);        
	$description = trim($_POST['description']);        
	$location = trim($_POST['location']);
	$lead_id = trim($_POST['lead_id']);
	$desc = 'This email is a reminder for you. Please accept!';
    $domain = 'google.com';
    
    if($this->leadModel->insertmeeting($lead_id,$from_name,$from_address,$to_name,$to_address,$startTime,$endTime,$subject,$description,$location)){
	}
	else
	{
		
	}
	$to_add = explode(",", $to_address);
	$total = sizeof($to_add);
	for($i=0;$i<$total;$i++){
	$to_add1 = $to_add[$i];
	//Create Email Headers
    $mime_boundary = "----Meeting Booking----".MD5(TIME());

    $headers = "From: ".$from_name." <".$from_address.">\n";
    $headers .= "Reply-To: ".$from_name." <".$from_address.">\n";
    $headers .= 'MIME-Version: 1.0\n' . PHP_EOL;
    $headers .= "Content-Type: multipart/alternative; boundary=\"$mime_boundary\"\n";
    $headers .= "Content-class: urn:content-classes:calendarmessage\n";

    //Create Email Body (HTML)
    $message = "--$mime_boundary\r\n";
    $message .= "Content-Type: text/html; charset=UTF-8\n";
    $message .= "Content-Transfer-Encoding: 8bit\n\n";
    $message .= "<html>\n";
    $message .= "<body>\n";
    $message .= '<p>Dear '.$to_name.',</p>';
    $message .= '<p>'.$description.'</p>';
    $message .= "</body>\n";
    $message .= "</html>\n";
    $message .= "--$mime_boundary\r\n";

    $ical = 'BEGIN:VCALENDAR' . "\r\n" .
    'PRODID:-//Microsoft Corporation//Outlook 10.0 MIMEDIR//EN' . "\r\n" .
    'VERSION:2.0' . "\r\n" .
    'METHOD:REQUEST' . "\r\n" .
    'BEGIN:VTIMEZONE' . "\r\n" .
    'TZID:Asia/Kolkata' . "\r\n" .
    'BEGIN:STANDARD' . "\r\n" .
    'DTSTART:19451015T000000' . "\r\n" .
    'RRULE:FREQ=YEARLY;INTERVAL=1;BYDAY=1SU;BYMONTH=11' . "\r\n" .
    'TZOFFSETFROM:+0530' . "\r\n" .
    'TZOFFSETTO:+0530' . "\r\n" .
    'TZNAME:IST' . "\r\n" .
    'END:STANDARD' . "\r\n" .
    'BEGIN:VEVENT' . "\r\n" .
    'DTSTART:19451015T000000' . "\r\n" .
    'RRULE:FREQ=YEARLY;INTERVAL=1;BYDAY=2SU;BYMONTH=3' . "\r\n" .
    'TZOFFSETFROM:-0500' . "\r\n" .
    'TZOFFSETTO:-0400' . "\r\n" .
    'TZNAME:IST' . "\r\n" .
    'END:STANDARD' . "\r\n" .
    'END:VTIMEZONE' . "\r\n" .  
    'BEGIN:VEVENT' . "\r\n" .
    'ORGANIZER;CN="'.$from_name.'":MAILTO:'.$from_address. "\r\n" .
    'ATTENDEE;CN="'.$to_name.'";ROLE=REQ-PARTICIPANT;RSVP=TRUE:MAILTO:'.$to_add1. "\r\n" .
    'LAST-MODIFIED:' . date("Ymd\TGis") . "\r\n" .
    'UID:'.date("Ymd\TGis", strtotime($startTime)).rand()."@".$domain."\r\n" .
    'DTSTAMP:'.date("Ymd\TGis"). "\r\n" .
    'DTSTART;TZID="Asia/Kolkata":'.date("Ymd\THis", strtotime($startTime)). "\r\n" .
    'DTEND;TZID="Asia/Kolkata":'.date("Ymd\THis", strtotime($endTime)). "\r\n" .
    'TRANSP:OPAQUE'. "\r\n" .
    'SEQUENCE:1'. "\r\n" .
    'SUMMARY:' . $subject . "\r\n" .
    'LOCATION:' . $location . "\r\n" .
    'CLASS:PUBLIC'. "\r\n" .
    'PRIORITY:5'. "\r\n" .
    'BEGIN:VALARM' . "\r\n" .
    'TRIGGER:-PT15M' . "\r\n" .
    'ACTION:DISPLAY' . "\r\n" .
    'DESCRIPTION:Reminder' . "\r\n" .
    'END:VALARM' . "\r\n" .
    'END:VEVENT'. "\r\n" .
    'END:VCALENDAR'. "\r\n";
    $message .= 'Content-Type: text/calendar;name="meeting.ics";method=REQUEST'."\n";
    $message .= "Content-Transfer-Encoding: 8bit\n\n";
    $message .= $ical;
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
		  $mail->SetFrom($from_address); 
		  $mail-> addAddress($to_add1); 
		  $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
		  $mail->isHTML(true);        
		  $mail->Subject = $subject;
		  $mail->Body = $desc; 
		  $mail->AltBody = $ical; // in your case once more the $text string
		  $mail->Ical = $ical;
		  $mail->SMTPOptions = array
		  (
				'ssl' => array
			(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		  );
   if(!$mail->send()) 
   {
	   echo 'Message could not be sent.';
	   echo 'Mailer Error: ' . $mail->ErrorInfo;
	   exit;
   }
echo 'Message has been sent';
	redirect('Leads/salesleadlist_new');
	
}
}


else
	{
		
	}
}

//----------------------------------------------------------------------------------------------------
public function sendIcalEvent($id){
	  $lead = $this->leadModel->getmeetingLeadById($id);
	  
	  $data = 
	  [
	  'id' => $lead->id,	
	  'lead_id' => $lead->lead_id,
	  'customername' =>$lead->customername,
	  'company' =>$lead->company,
	  'assignee' => $lead->assignee,
	  'customeremail' =>$lead->customeremail,
	  'useremail' =>$lead->useremail
	  ];
	 
	  $data['getmeeting'] = $this->leadModel->getallmeeting($data['lead_id']);
	  $this->view('meeting/meeting_master',$data);
  
}

//----------------------------------------------------------------------------------------------------
public function meetinglist($lead_id)
{
	/* $lead = $this->leadModel->getmeetingLeadById($id);
	  
	  $data = 
	  [
	  'id' => $lead->id,	
	  'lead_id' => $lead->lead_id,
	  'customername' =>$lead->customername,
	  'company' =>$lead->company,
	  'assignee' => $lead->username,
	  'customeremail' =>$lead->customeremail,
	  'useremail' =>$lead->useremail
	  ];
	  $lead_id = $data['lead_id']; */
	  $data['getmeeting'] = $this->leadModel->getallmeeting($lead_id);
	  $this->view('meeting/meetinglist',$data);
} 
// Load view



//Sending Data to Model to get the ticket to show in index

// Get Tickets




//--------------------------------------------------------------------------------------------------------------------
}



  