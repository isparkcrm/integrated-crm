<?php
require 'PHPMailer/PHPMailer/PHPMailerAutoload.php';
require 'PHPMailer/PHPMailer/class.phpmailer.php';
require 'PHPMailer/PHPMailer/class.smtp.php';
  class Mom extends Controller {
    public function __construct(){
      $this->leadModel = $this->model('lead');
    }
//----------------------------------------------------------------------------------------------------------------
public function mom_master($id){
      
  
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
   $currentDir = getcwd();
   $uploadDirectory = "/mom/";
   $errors = [];
   $fileExtensions = ['doc','xlsx','pdf','png','jpeg','jpg']; // Get all the file extensions

   $fileName = $_FILES['momupload']['name'];
   $fileSize = $_FILES['momupload']['size'];
   $fileTmpName  = $_FILES['momupload']['tmp_name'];
   $fileType = $_FILES['momupload']['type'];
   $ext = explode(".", $_FILES['momupload']['name']);
 $ext2 = end($ext);

$data =[
 'lead_id' => trim($_POST['lead_id']),
 'username' => trim($_POST['username']),
 'customername' => trim($_POST['customername']),
 'customeremail' => trim($_POST['customeremail']),
 'meetingname' => trim($_POST['meetingname']), 
 'momupload'=> basename($fileName),
 'description' => trim($_POST['description']),
];

		$uploadPath = $currentDir . $uploadDirectory . basename($fileName); 

        if ($fileSize > 2000000) 
		{
          $data['momupload_err']= "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        }
		if (empty($errors)) 
		{
		    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
		}
		else
		{
              foreach ($errors as $error) 
		     {
              $data['momupload_err']= $error . "These are the errors" . "\n";
             }
        }
	if($this->leadModel->Insertmom($data))
    {
		
    	$mail=new PHPMailer;
		  $mail->isSMTP();      
          $mail->Host='smtp.futurecalls.com';
          $mail->SMTPAuth=true; 
          $mail->Username ='helpdesk@futurecalls.com';
          $mail->Password = 'Pass@123'; 
		  $mail->addAttachment($uploadPath, $fileName);
          $mail->SMTPSecure = 'tls';
		  $mail->Port ='587';
		  $mail->SetFrom('helpdesk@futurecalls.com'); 
		  $mail-> addAddress($data['customeremail']); 
		  $mail->Body = $data['description'];
		  $mail->AltBody = $data['description'];
          $mail->isHTML(true); 
		  $mail->SMTPOptions = array
		  (
				'ssl' => array
				(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				)
          );
 if(!$mail->Send())
 {
	echo "Mailer Error: " . $mail->ErrorInfo;
 }
 else {
	redirect('Leads/salesleadlist_new');
 }
}
}
 else 
	 {
		  $lead = $this->leadModel->getmeetingLeadById($id);
		  
		  $data = [
			  'id' => $lead->id,
			  'lead_id' => $lead->lead_id,
			  'leadowner' => $lead->leadowner,
			  'customername' => $lead->customername,
			  'customeremail' => $lead->customeremail,
			  'username' => $lead->useremail
		  ];
		  $lead_id = $data['lead_id'];
		  
		  $data['getmomdetails'] = $this->leadModel->getmomdetails($lead_id);
		  $data['getmeetinginfo'] = $this->leadModel->getmeetinginfo($lead_id);
		  $this->view('mom/mom_master', $data);
	 }
}
public function momdownload($lead_id)
{
	$data['getmomdetails']= $this->leadModel->getmomuploadname($lead_id);	

	 $file = $data['getmomdetails']->momupload;
	 $currentDir = getcwd();
	 $uploadDirectory = "/mom/";
	//$filepath = "/mom/" . $file;
	$uploadPath = $currentDir . $uploadDirectory . basename($file);
	if(file_exists($uploadPath)) {
		$pdf = file_get_contents($PDFfilename);
		header('Content-type: application/pdf');
		header('Content-Transfer-Encoding: binary');
   		 header('Content-Length: ' . filesize($file));
		header("Content-Disposition: attachment; filename=\"$file\"");
		header('Content-Length: ' . filesize($uploadPath));
		ob_clean(); 
        flush(); 
        echo $pdf; 
		die();
	} else {
		http_response_code(404);
		die();
	}
}

//--------------------------------------------------------------------------------------------------------------
public function momlist($lead_id)
{
	/* $lead = $this->leadModel->getMomLeadById($lead_id);	
	 $data = [
			  'id' => $lead->id,
			  'lead_id' => $lead->lead_id,
			  'leadowner' => $lead->leadowner,
			  'customername' => $lead->customername,
			  'customeremail' => $lead->customeremail,
			  'username' => $lead->useremail
		  ];
		  $lead_id = $data['lead_id']; */
	 $data['getmomdetails'] = $this->leadModel->getmomdetails($lead_id);
	 $this->view('mom/momlist', $data);
}
//--------------------------------------------------------------------------------------------------------------------
}



  