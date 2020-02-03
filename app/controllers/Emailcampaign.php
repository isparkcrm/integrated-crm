
<?php
  class Emailcampaign extends Controller {
    public function __construct()
  {
      $this->postModel = $this->model('Post');
      $this->userModel = $this->model('User');
      $this->ticketModel = $this->model('Ticket');
      $this->campaignModel = $this->model('campaignModel'); 
      $this->emailticketModel = $this->model('EmailTicket');
      $this->emailcampaignModel = $this->model('Emailcampaigns');
    }
public function index_new(){

// Check for owner
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Sanitize POST array

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
       'title' => trim($_POST['title']), 
       'description' => trim($_POST['description']),   
       'file'=> basename($fileName),         
       'title_err' => '' ,
       'description_err' => '' ,
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
        if(empty($data['title_err']) && empty($data['description_err'])){
      if($this->emailcampaignModel->sendEmail($data,$uploadPath,$fileName)){
        flash('email_message', 'email sent successfully');
        redirect('Emailcampaign');
    }
    else{
      flash('email_message', 'Something went wrong');
      redirect('Emailcampaign');
    } 
}
    else {
        // Load view with errors
        $this->view('Emailcampaign', $data);
       }          
     }
     else {
        // Init data
        $data =[
          'title' => '',     
          'description' => '',     
           'file' => '' ,
           'title_err' => '' ,
           'description_err' => '' ,
           'file_err' => ''  
        ];
        
        // Load view
        $this->view('Emailcampaign/index_new', $data);
        }

  // Get existing post from model
 
  
}
//------------------------------------------------------------------------------------
public function management_info(){

// Check for owner
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Sanitize POST array

  

    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

         $name=$_SESSION['username'];

    $data =[
       
       'description' => trim($_POST['editor1'])     
      ];

       
      if($this->emailcampaignModel->sendMessage($data,$name)){
        flash('management_message', 'Message sent successfully');
        redirect('Emailcampaign');
    }
    else{
      flash('email_message', 'Something went wrong');
      redirect('Emailcampaign');
    } 

        
     }
     else {
        // Init data
        $data =[
          'title' => '',     
          'description' => '',           
        ];
        
        // Load view
        $this->view('Emailcampaign/management_info', $data);
        }

  // Get existing post from model
 
  
}


//-------------------------------------------------------------------------------------
  }