<?php
require 'PHPMailer/PHPMailer/PHPMailerAutoload.php';
require 'PHPMailer/PHPMailer/class.phpmailer.php';
require 'PHPMailer/PHPMailer/class.smtp.php';
  class Quatations extends Controller {
    public function __construct(){
      $this->leadModel = $this->model('lead');
    }
//----------------------------------------------------------------------------------------------------------------
public function quatation_master($id){
      
  
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	$currentDir = getcwd();
   $uploadDirectory = "/quatation/";
   $errors = []; // Store all foreseen and unforseen errors here

   $fileExtensions = ['doc','xlsx','pdf','png','jpeg','jpg']; // Get all the file extensions

   $fileName = $_FILES['quatationupload']['name'];
   $fileSize = $_FILES['quatationupload']['size'];
   $fileTmpName  = $_FILES['quatationupload']['tmp_name'];
   $fileType = $_FILES['quatationupload']['type'];
   $ext = explode(".", $_FILES['quatationupload']['name']);
 $ext2 = end($ext);

$data =[
 'lead_id' => trim($_POST['lead_id']),
 'customername' => trim($_POST['customername']), 
 'customeremail' => trim($_POST['customeremail']), 
 'quatationupload'=> basename($fileName),
 'description' => trim($_POST['description']),
 'customername_err' => '',         
 'quatationupload_err' => '',
 'description_err' => ''
];

$senderemail = $_SESSION['email'];
$sendername = $_SESSION['username'];

$uploadPath = $currentDir . $uploadDirectory . basename($fileName); 

        if ($fileSize > 2000000) {
          $data['quatationupload_err']= "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        }

        if (empty($errors)) {
			
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

           
        } else {
            foreach ($errors as $error) {
              $data['quatationupload_err']= $error . "These are the errors" . "\n";
            }
        }


if(empty($data['customername'])){
 $data['customername_err'] = 'Please Select Customer Name';
}
if(empty($data['quatationupload'])){
 $data['quatationupload_err'] = 'Please Upload Quatation';
}
if(empty($data['description'])){
 $data['description_err'] = 'Please enter Description';
}


    if($this->leadModel->Insertquatation($data))
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
	 echo "successfully";
 }
    }
   flash('Quation_success', 'Quatation Added Successfully');  
  redirect('Leads/salesleadlist_new');

} else 
{
	$lead = $this->leadModel->getmeetingLeadById($id);
	// Check for owner
  $data = [
	  'id' => $lead->id,
	  'lead_id' => $lead->lead_id,
      'leadowner' => $lead->leadowner,
      'customername' => $lead->customername,
      'customeremail' => $lead->customeremail,
      'username' => $lead->useremail
  ];
  $lead_id = $data['lead_id'];
  $data['getquatationdetails'] = $this->leadModel->getallquatation($lead_id);
$data['customers'] = $this->leadModel->getallcustomers();
// Load view
$this->view('quatation/quatation_master', $data);
}

}
public function quatationlist($lead_id){
	$data['getquatationdetails'] = $this->leadModel->getallquatation($lead_id);
	$this->view('quatation/quatationlist', $data);
}

public function addquatation(){
	$this->view('quatation/addquatation');
}
//--------------------------------------------------------------------------------------------------------------------
}



  