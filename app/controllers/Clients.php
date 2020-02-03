<?php
  class Clients extends Controller {
    public function __construct(){
      $this->clientModel = $this->model('client');
      $this->campaignModel = $this->model('campaignModel'); 
    }
//----------------------------------------------------------------------------------------------------------------
public function client_master(){
      
  // Check for POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){
// Process form

// Sanitize POST data
   // Init data
   $currentDir = getcwd();
   $uploadDirectory = "/client_setup/";
   $errors = []; // Store all foreseen and unforseen errors here

   $fileExtensions = ['doc','pdf','png','jpeg','jpg']; // Get all the file extensions

   $fileName = $_FILES['photo']['name'];
   $fileSize = $_FILES['photo']['size'];
   $fileTmpName  = $_FILES['photo']['tmp_name'];
   $fileType = $_FILES['photo']['type'];
   $ext = explode(".", $_FILES['photo']['name']);
 $ext2 = end($ext);

$data =[
 'name' => trim($_POST['name']), 
 'person' => trim($_POST['person']),
 'number' => trim($_POST['number']),
 'date1' => trim($_POST['date1']),
 'date2' => trim($_POST['date2']),
 'service' => implode(",", $_POST['service']), 
 //'support_type' => trim($_POST['supporttype']), 
 'support_time' => trim($_POST['support_time']), 
 //'location' => implode(",", $_POST['location']), 
 //'support_days' => implode(",", $_POST['days']),  
 //'time' => implode(",", $_POST['time']), 
 'file'=> basename($fileName),  
 'name_err' => '',         
 'person_err' => '',
 'number_err' => '',
 'location_err' => '',         
 'support_err' => '',
 'time_err' => '', 
 'date1_err' => '',         
 'date2_err' => '',
 'days_err' => '',
 'service_err' => '',
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


// Validate client name
if(empty($data['name'])){
 $data['name_err'] = 'Please enter Client name';
}
if($this->clientModel->findClientByName($data['name'])){
  $data['name_err'] = 'Client name already exist';
}
// Validate contact person
if(empty($data['person'])){
 $data['person_err'] = 'Please enter Contact Person Name';
}
if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
  flash('file_success', 'file Added Successfully'); 
}
else{
flash('file_failure', 'problem uploading file'); 
}
// Validate number
if(empty($data['number'])){
 $data['number_err'] = 'Please enter Number';
}
else if(strlen($data['number']) < 10){
  $data['number_err'] = 'number must be at  10';
 }
// Validate location
if(empty($data['location'])){
 $data['location_err'] = 'Please enter location';
}

// Validate support type


// Validate time
if(empty($data['time'])){
 $data['time_err'] = 'Please select support time';
}

// Validate address
if(empty($data['support_days'])){
 $data['days_err'] = 'Please Enter address';
}


  // Validate start date
if(empty($data['date1'])){
 $data['date1_err'] = 'Please Enter start date';
}
// Validate End date
if(empty($data['date2'])){
  $data['date2_err'] = 'Please Enter End date';
 }

 // Validate Service type
if(empty($data['service'])){
  $data['service_err'] = 'Please Enter service error';
 }
if(empty($data['name_err']) && empty($data['person_err']) && empty($data['number_err']) && empty($data['service_err'])){
 
 // Register Client

  if($this->clientModel->Onboard($data)){
    if($this->clientModel->Insertservice($data))
    {
     flash('client_success', 'Client Added Successfully');  
   redirect('clients/clientlist');  
    }
     //data added
  
  }   


 } 
else {
 // Load view with errors
 $this->view('clients/client_master', $data);
}       

} else {
// Init data
$data =[
  'name' => '',     
  'person' => '',     
  'number' =>'',     
  'date1' => '',     
  'date2' => '',     
  'service' =>'',     
  'support_type' => '',     
  'location' => '',     
  'support_days' =>'',     
  'time' => '',     
  'name_err' => '',         
  'person_err' => '',
  'number_err' => '',
  'location_err' => '',         
  'support_err' => '',
  'time_err' => '', 
  'date1_err' => '',         
  'date2_err' => '',
  'days_err' => '',
  'service_err' => '',
  'file_err' => ''  
];

// Load view
$this->view('clients/client_master', $data);
}

//Sending Data to Model to get the ticket to show in index

// Get Tickets
}




//---------------------------------------------------------------------------------------------------------------

public function getservice($id)
{
	$data = $this->clientModel->getallservice($id);
	
	echo json_encode($data);
}

public function getallservice($id)
{
	$data = $this->clientModel->getservices($id);
	
	echo json_encode($data);
}


public function getemail($id)
{
	$data = $this->clientModel->getemail($id);
	
	echo json_encode($data);
}

//--------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------
public function clientlist(){
  $clients = $this->clientModel->getClient();
    // $tickets = $this->ticketModel->getTicketByDepartment($department);
           
   $data = [
     'clients' => $clients
   ];

   $this->view('clients/clientlist', $data);
 }
//---------------------------------------------------------------------------------------------------------------
public function edit($id){
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Sanitize POST array
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $data = [
      'id'=>$id,
      'name' =>trim($_POST['name']),
      'person' => trim($_POST['person']),
      'number' => trim($_POST['number']),      
      'date1' => trim($_POST['date1']),
      'date2' => trim($_POST['date2']),
	  'clientID'=>trim($_POST['clientID']),
	  'service' => implode(",", $_POST['service']), 	  
      'name_err' => '',         
      'person_err' => '',
      'number_err' => '',     
      'date1_err' => '',         
      'date2_err' => ''
   
    ];
   
    if(empty($data['name'])){
      $data['name_err'] = 'Please enter Client name';
     }
    
     // Validate contact person
     if(empty($data['person'])){
      $data['person_err'] = 'Please enter Contact Person Name';
     }
     // Validate number
     if(empty($data['number'])){
      $data['number_err'] = 'Please enter Number';
     }
     else if(strlen($data['number']) < 10){
       $data['number_err'] = 'number must be at  10';
      }
     // Validate location
    
     
     // Validate address
     
       // Validate start date
     if(empty($data['date1'])){
      $data['date1_err'] = 'Please Enter start date';
     }
     // Validate End date
     if(empty($data['date2'])){
       $data['date2_err'] = 'Please Enter End date';
      }
     
      // Validate Service type
    

    // Make sure no errors
    if(empty($data['name_err']) &&  empty($data['date1_err']) && empty($data['number_err'])){
      // Validated
	   
      if($this->clientModel->updateClient($data)){
		  $this->clientModel->deleteClientService($data['clientID']);
		  $this->clientModel->updateClientService($data);
        flash('client_message', 'client updated successfully');
		        redirect('clients/clientlist');
      } else {
        die('Something went wrong');
      }
    } else {
      // Load view with errors
      $this->view('clients/edit', $data);
    }

  } else {
    // Get existing post from model
    $client = $this->clientModel->getClientById($id);
    // Check for owner
  $data = [
      'id' => $client->id,
      'clientname' => $client->clientname,
	  'clientID' => $client->client_ID,
      'contact_person' => $client->contact_person,
      'number' => $client->number,
      'start_date' =>$client->start_date,
      'end_date' =>$client->end_date,
	  'service' =>	$client->service
	  
    ];

    $this->view('clients/edit', $data);
  }
}
//--------------------------------------------------------------------------------------------------------------------------
public function delete($id)
{
	if($this->clientModel->clientdelete($id))
	{
		flash('role_delete', 'role Deleted Successfully');  
		redirect('clients/clientlist');
	}
}

//--------------------------------------------------------------------------------------------------------------------
public function role()
	{
    $getrole = $this->clientModel->getRoleMaster();
         
		$data = [
    'role' => $getrole,
    'name_err' => '' 
		];
    
		$this->view('clients/role_master',$data);
  }
  
public function role_master(){
      
  // Check for POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){
// Process form

// Sanitize POST data
   // Init data
$data =[
 'name' => trim($_POST['name']), 
 'name_err' => ''          
];

// Validate client name
if(empty($data['name'])){
 $data['name_err'] = 'Please enter role';
}
if($this->clientModel->findRoleByName($data['name'])){

  $data['name_err'] = 'role  already exist';
}

if(empty($data['name_err']) ){
 
 // Register Client
 if($this->clientModel->roleMaster($data)){
  $getrole = $this->clientModel->getRoleMaster();         
  $data = [
  'role' => $getrole
  ];
  
   flash('register_success', 'Role Added Successfully');  
   redirect('clients/role');
  }         
 } 
else {
 // Load view with errors
 $this->view('clients/role_master', $data);
}       

} else {
// Init data
$data =[
  'name' => '',  
  'name_err' => '' 
];

// Load view
$this->view('clients/role_master', $data);
}

//Sending Data to Model to get the ticket to show in index

// Get Tickets
}
//---------------------------------------------------------------------------------------------------------------------------
public function super_admin(){
      
  // Check for POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){
// Process form

// Sanitize POST data
   // Init data
$data =[
 'client_name' => trim($_POST['client_name']), 
 'total' => trim($_POST['total']), 
 'concurrent' => trim($_POST['concurrent']),
 'inbound' => trim($_POST['inbound']), 
 'outbound' => trim($_POST['outbound']),
 'role' => implode(",", $_POST['role']), 
 'total1' => implode(",", $_POST['role_total']),  
 'client_err' => '' ,       
 'role_err' => '' , 
 'total_err' => '' , 
 'inbound_err' => '' , 
 'outbound_err' => '' , 
 'concurrent_err' => '',
 'total1_err' => '' 
 
];

// Validate client name
if(empty($data['client_name'])){
 $data['client_err'] = 'Please enter client name';
}
/*if($this->clientModel->findClientByID($data['client_ID'])){
  //  valid ID
}
else{
  $data['ID_err'] = 'invalid ID';
} */
if(empty($data['role'])){
  $data['role_err'] = 'Please enter role';
 }
 if(empty($data['total'])){
  $data['total_err'] = 'Please enter total number of users';
 }
 if(empty($data['concurrent'])){
  $data['concurrent_err'] = 'Please enter concurrent users';
 }
 else if(($data['concurrent']) > ($data['total'])){
  $data['concurrent_err'] = 'concurrent users must be  less than total users';
}
if(empty($data['inbound'])){
  $data['inbound_err'] = 'Please enter total inbound campaigns';
 }
 if(empty($data['outbound'])){
  $data['outbound_err'] = 'Please enter total outbound campaigns';
 }
if(empty($data['client_err'])&& empty($data['role_err'])&& empty($data['total_err'])&& empty($data['concurrent_err'])  ){
  // Register Client
    $input =$data['total'];
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $input, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );   
    
    
    $input1 =$data['concurrent'];
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded1     = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $input1, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) ); 

    $input2 =$data['inbound'];
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded2     = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $input2, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );

    $input3 =$data['outbound'];
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded3     = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $input3, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );

if($this->clientModel->superAdmin($data, $qEncoded,$qEncoded1, $qEncoded2,$qEncoded3)){
  if($this->clientModel->RoleBasedUsers($data)){
   flash('register_success', 'Data  Added Successfully');  
   redirect('clients/super_admin');
  }
  }         
 } 
else {
 // Load view with errors
 $this->view('clients/super_admin', $data);
}       

} else {
// Init data
$data =[
  'client_name' => '' ,  
 'role' => '' , 
 'total' => '' , 
 'concurrent' => '' , 
 'inbound' => '' , 
 'outbound' => '' , 
 'client_err' => '' ,       
 'role_err' => '' , 
 'total_err' => '' , 
 'inbound_err' => '' , 
 'outbound_err' => '' , 
 'concurrent_err' => '' ,  
 'total1_err' => ''  
];

// Load view
$this->view('clients/super_admin', $data);
}

//$roles = $this->clientModel->getRole();
    // $tickets = $this->ticketModel->getTicketByDepartment($department);
           
   
   
//Sending Data to Model to get the ticket to show in index

// Get Tickets
}
//---------------------------------------------------------------------------------------------------------------------
public function sla_master(){
      
  // Check for POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){
// Process form

// Sanitize POST data
   // Init data
$data =[
 'client_ID' => trim($_POST['client_ID']), 
 'process' => trim($_POST['service']), 
 'severity' => implode(",", $_POST['severity']), 
 'l1' => implode(",", $_POST['l1']), 
 'l2' => implode(",", $_POST['l2']), 
 'l3' => implode(",", $_POST['l3']), 
 'l4' => implode(",", $_POST['l4']), 
 'ID_err' => '' ,       
 'severity_err' => '' , 
 'processtype_err' => '' , 
 'l1_err' => '' , 
 'l2_err' => '' ,   
 'l3_err' => '' ,  
 'l4_err' => ''   
];

// Validate client name
if(empty($data['client_ID'])){
 $data['ID_err'] = 'Please enter client ID';
}
/*
if($this->clientModel->findClientByID($data['client_ID'])){
  //  valid ID
}
else{
  $data['ID_err'] = 'invalid ID';
}
*/
if(empty($data['process'])){
  $data['processtype_err'] = 'Please enter processtype';
 }

   // Check email
if($this->clientModel->findClientByID($data['client_ID'],$data['process'])){
    $data['processtype_err'] = 'This process already exist for this client';
 }

if(empty($data['severity'])){
  $data['role_err'] = 'Please enter severity';
 }
 if(empty($data['l1'])){
  $data['total_err'] = 'Please enter l1';
 }
 
 if(empty($data['l2'])){
  $data['total_err'] = 'Please enter l1';
 }
 if(empty($data['l3'])){
  $data['total_err'] = 'Please enter l1';
 }
 if(empty($data['l4'])){
  $data['total_err'] = 'Please enter l1';
 }
if(empty($data['ID_err'])&& empty($data['severity_err'])&& empty($data['l1_err']) && empty($data['processtype_err']) ){
  // Register Client
 if($this->clientModel->slaMaster($data)){
   flash('register_success', 'Data  Added Successfully');  
   redirect('clients/sla_master');
  }         
 } 
else {
 // Load view with errors
 $this->view('clients/sla_master', $data);
}       

} else {
// Init data
$data =[
  'client_ID' =>'' , 
  'process'=>'',
  'severity' => '', 
  'l1' =>'' , 
  'l2' =>'' , 
  'l3' => '', 
  'l4' => '', 
  'ID_err' => '' ,       
  'severity_err' => '' , 
  'processtype_err' => '' , 
  'l1_err' => '' , 
  'l2_err' => '' ,   
  'l3_err' => '' ,  
  'l4_err' => ''  
];

// Load view
$this->view('clients/sla_master', $data);
}
}
//---------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------
public function slalist(){
  $clients = $this->clientModel->getSlaList();
    // $tickets = $this->ticketModel->getTicketByDepartment($department);
           
   $data = [
     'clients' => $clients
   ];

   $this->view('clients/slalist', $data);
 }
//---------------------------------------------------------------------------------------------------------------
public function sla_edit($id){
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Sanitize POST array
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $data = [
      'id' => trim($_POST['id']), 
      'client_ID' => trim($_POST['client_ID']), 
      'process' => trim($_POST['service']), 
      'severity' => trim($_POST['severity']), 
      'l1' => trim($_POST['l1']), 
      'l2' => trim($_POST['l2']), 
      'l3' => trim($_POST['l3']), 
      'l4' => trim($_POST['l4']), 
      'ID_err' => '' ,       
      'severity_err' => '' , 
      'processtype_err' => '' , 
      'l1_err' => '' , 
      'l2_err' => '' ,   
      'l3_err' => '' ,  
      'l4_err' => ''     
    ];
   if(empty($data['client_ID'])){
      $data['ID_err'] = 'Please enter client ID';
     }
   
     if(empty($data['severity'])){
       $data['severity_err'] = 'Please enter severity';
      }
      if(empty($data['l1'])){
       $data['l1_err'] = 'Please enter l1';
      }
      
      if(empty($data['l2'])){
       $data['l2_err'] = 'Please enter l2';
      }
      if(empty($data['l3'])){
       $data['l3_err'] = 'Please enter l3';
      }
      if(empty($data['l4'])){
       $data['l4_err'] = 'Please enter l4';
      }
     if(empty($data['ID_err'])&&  empty($data['l1_err']) && empty($data['l2_err']) && empty($data['l3_err'])&& empty($data['l4_err'])){
       // Register Client
      if($this->clientModel->UpdateslaMaster($data)){
        flash('register_success', 'Data  updated Successfully');  
        redirect('clients/slalist');
       }         
      } 
     else {
      // Load view with errors
      $this->view('clients/sla_edit', $data);
     }       

  } else {
    // Get existing post from model
    $sla= $this->clientModel->getSlaconfigById($id);

    // Check for owner
  $data = [
      'id' => $sla->id,
      'client_ID' => $sla->client_ID,
      'process' => $sla->process,
      'severity' =>  $sla->severity,
      'level1' => $sla->l1,
      'level2' => $sla->l2,
      'level3' => $sla->l3,
      'level4' => $sla->l4
      ];

    $this->view('clients/sla_edit', $data);
  }
}
//--------------------------------------------------------------------------------------------------------------------------
public function service()
	{
		$data['getservice'] = $this->clientModel->getService();

		$this->view('clients/service_master',$data);
	}
public function service_master(){
      
  // Check for POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){

$data =[
 'servicename' => trim($_POST['servicename']), 
 'description' => trim($_POST['description']), 
 'servicename_err' => '',
 'description_err' => ''
];

// Validate client name
if(empty($data['servicename'])){
 $data['servicename_err'] = 'Please enter service name';
}
if(empty($data['description'])){
 $data['description_err'] = 'Please enter description';
}
if($this->clientModel->findByServicename($data['servicename'])){

  $data['servicename_err'] = 'servicename is  already exist';
}

if(empty($data['servicename_err']) ){
 
 // Register Client
 if($this->clientModel->ServiceMaster($data)){
	 $data['getservice'] = $this->clientModel->getService();
   flash('register_success', 'Service is Added Successfully');  
   $this->view('clients/service_master',$data);
  }         
 } 
else {
 // Load view with errors
 $this->view('clients/service_master', $data);
}       

}
else {
// Init data
$data =[
  'servicename' => '',  
  'descripton' => '',  
  'name_err' => '' ,
  'description_err' => '' 
];

// Load view
$this->view('clients/service_master', $data);
}

}
//----------------------------------------------------------------------------------------------------------------
 public function servicedisable(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Sanitize POST array
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		$data = [
            'user_id' => trim($_POST['id']),
            'status' => trim($_POST['status'])
          ];
		  
		if($this->clientModel->DeleteService($data)){  
             redirect('clients/service_master');
            } else {
              die('Something went wrong');
            }
         
      }
	  }
//----------------------------------------------------------------------------------------------------------------
public function servicedit($id)
{
  // Check for POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){

$data =[
'id' => $id,
 'servicename' => trim($_POST['servicename']), 
 'description' => trim($_POST['description']), 
 'servicename_err' => '',
 'description_err' => ''
];

// Validate client name
if(empty($data['servicename'])){
 $data['servicename_err'] = 'Please enter service name';
}
if(empty($data['description'])){
 $data['description_err'] = 'Please enter description';
}

if(empty($data['servicename_err']) ){
 
 
 if($this->clientModel->UpdateService($data)){
	$data['getservice'] = $this->clientModel->getService();
   flash('register_success', 'Service is Updated Successfully');  
   redirect('clients/service');
  }         
 } 
else {
 // Load view with errors
 $this->view('clients/servicedit', $data);
}       

}
else 
	{
		$getservice = $this->clientModel->getService();
		if($getservice){
		$serviceedit = $this->clientModel->getServiceById($id);
		
			$data = [
				'id' => $serviceedit->id,
				'servicename' => $serviceedit->servicename,
				'description' => $serviceedit->description			
			];	
	
		}
		$this->view('clients/servicedit', $data);	
	}
	
}
//--------------------------------------------------------------------------------------------------------------------
public function role_edit($id){
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Sanitize POST array
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $data = [
      'id'=>$id,
      'name' =>trim($_POST['role']),       
      'name_err' => '',      
    ];
   
    if(empty($data['name'])){
      $data['name_err'] = 'Please enter Client name';
     }
    
     
    if(empty($data['name_err'])){
      // Validated
      if($this->clientModel->updateRole($data)){
        flash('role_message', 'Role Updated');
        redirect('clients/role');
      } else {
        die('Something went wrong');
      }
    } else {
      // Load view with errors
      $this->view('clients/role_edit', $data);
    }

  } else {
    // Get existing post from model
    $client = $this->clientModel->getRoleById($id);

    // Check for owner
  $data = [
      'id' => $client->id,
     'role' =>$client->role
    ];

    $this->view('clients/role_edit', $data);
  }
}
//--------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------

public function role_delete($id)
{
	if($this->clientModel->roledelete($id))
	{
		flash('role_delete', 'role Deleted Successfully');  
		redirect('clients/role');
	}
}
 //----------------------------------------------------------------------------------------------------------
 public function knowledge_base(){
      
  // Check for POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){
// Process form
// Sanitize POST data
   // Init data
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
 'title' => trim($_POST['title']), 
 'description' => trim($_POST['description']), 
 'keyword' => trim($_POST['keyword']),
 'file'=> basename($fileName),  
 'version'=> trim($_POST['version']),
 'title_err' => '' , 
 'description_err' => '' , 
 'key_err' => '' ,
 'file_err' => '' 
];
//print_r($data);die;
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

if(empty($data['title'])){
 $data['title_err'] = 'Please enter title';
}

if(empty($data['description'])){
  $data['description_err'] = 'Please enter description';
 }
 if(empty($data['keyword'])){
  $data['keyword_err'] = 'Please enter severity';
 }
 
if(empty($data['title_err'])&& empty($data['description_err'])&& empty($data['keyword_err'])){
  
 if($this->clientModel->CreateInfo($data)){
   flash('register_success', 'Information added Successfully');  
   redirect('clients/knowledge_base');
  }
          
 } 
else {
 // Load view with errors
 $this->view('clients/knowledge_base', $data);
}       

} else {
// Init data
$data =[
  'title' => '' , 
 'description' => '' , 
 'keyword' => '' , 
 'file'=> '' , 
 'version'=> '' , 
 'title_err' => '' , 
 'description_err' => '' , 
 'key_err' => '' ,
 'file_err' => '' 
];

// Load view
$this->view('clients/knowledge_base', $data);
}


}

//--------------------------------------------------------------------------------------------------------
public function knowledge_edit($id){
  if($_SERVER['REQUEST_METHOD'] == 'POST'){

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
 
    // Sanitize POST array
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $data = [
      'subject'=>trim($_POST['subject']),
      'description' =>trim($_POST['description']),  
      'keyword' =>trim($_POST['keyword']),       
      'version' =>trim($_POST['version']), 
      'file'=> basename($fileName), 
      'document' =>trim($_POST['document']),             
      'subject_err' => '',     
      'description_err' => '',   
      'keyword_err' => ''     
    ];
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
    if(empty($data['subject'])){
      $data['subject_err'] = 'Please enter Client name';
     }
     if(empty($data['description'])){
      $data['description_err'] = 'Please enter Client name';
     }
     if(empty($data['keyword'])){
      $data['keyword_err'] = 'Please enter Client name';
     }
     if(empty($data['file'])){
      $data['file'] =  $data['document'];
     }   
    if(empty($data['subject_err']) && empty($data['description_err'])&& empty($data['keyword_err'])){
      // Validated
      if($this->clientModel->updateKnowledgeBase($data)){
        flash('role_message', 'Role Updated');
        redirect('clients/casestudy');
      } else {
        die('Something went wrong');
      }
    } else {
      // Load view with errors
     
      $this->view('clients/knowledge_edit', $data);
    }

  } else {
    // Get existing post from model
    $client = $this->clientModel->getknowledgeBase($id);

    // Check for owner
  $data = [
      'id' => $client->id,
     'subject' =>$client->subject,
     'description' =>$client->description,
     'keyword' =>$client->keyword,
     'file' =>$client->file,
     'version' =>$client->version
    ];   
    $this->view('clients/knowledge_edit', $data);
  }
}
//--------------------------------------------------------------------------------------------------------------------
public function casestudy(){
  $case_studies = $this->clientModel->getInfo();
    // $tickets = $this->ticketModel->getTicketByDepartment($department);
           
   $data = [
     'case_studies' => $case_studies
   ];

   $this->view('clients/casestudy', $data);
 }
//---------------------------------------------------------------------------------------------------------------
public function knowledge_delete($id)
{
	if($this->clientModel->knowledgedelete($id))
	{
		flash('role_delete', 'knowledge base Deleted Successfully');  
		redirect('clients/casestudy');
	}
}
//----------------------------------------------------------------------------------------------------------------
public function notification()
	{
		$data['getnotification'] = $this->clientModel->getnotification();

		$this->view('clients/notification_master',$data);
  }
  
public function notification_master(){
      
  // Check for POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
$data =[
 'activity' => trim($_POST['activity']), 
 'cust_notification' => trim($_POST['cust_notification']), 
 'hd_notification' => trim($_POST['hd_notification']), 
 'message1' => trim($_POST['message1']), 
 'message2' => trim($_POST['message2']), 
 'message3' => trim($_POST['message3']), 
 'message4' => trim($_POST['message4']), 

 'activity_err' => '',
 'notification_err' => '',
 'message_err' => ''
];

// Validate client name
if(empty($data['activity'])){
 $data['activity_err'] = 'Please enter activity';
}
if(empty($data['hd_notification'])){
 $data['notification_err'] = 'Please enter notification type';
}
if(empty($data['cust_notification'])){
  $data['notification_err'] = 'Please enter notification type';
 }
 if(empty($data['message1'])){
  $data['message_err'] = 'Please enter message';
 }

/*if($this->clientModel->findBynotification($data['servicename'])){

  $data['servicename_err'] = 'servicename is  already exist';
} */

if(empty($data['activity_err']) && empty($data['notification_err']) && empty($data['message_err'])){
 
 // Register Client
 if($this->clientModel->NotificationMaster($data)){
	 $data['getnotification'] = $this->clientModel->getnotification();
   flash('notification_success', 'Notification Added Successfully');  
   $this->view('clients/notification_master',$data);
  }         
 } 
else {
 // Load view with errors
 $this->view('clients/notification_master', $data);
}       

}
else {
// Init data
$data =[
  'activity' => '', 
 'cust_notification' => '',
 'hd_notification' => '',
 'message1' => '',
 'message2' =>'',
 'message3' => '',
 'message4' => '',
 'activity_err' => '',
 'notification_err' => '',
 'message_err' => ''
  
  
];

// Load view
$this->view('clients/notification_master', $data);
}

}
//----------------------------------------------------------------------------------------------------------------
public function notification_edit($id){
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Sanitize POST array
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $data = [
      'id'=>$id,
      'activity' => trim($_POST['activity']), 
      'cust_notification' => trim($_POST['cust_notification']), 
      'hd_notification' => trim($_POST['hd_notification']), 
      'message1' => trim($_POST['message1']), 
      'message2' => trim($_POST['message2']), 
      'message3' => trim($_POST['message3']), 
      'message4' => trim($_POST['message4']),      
      'activity_err' => '',
      'notification_err' => '',
      'message_err' => ''  
    ];
    if(empty($data['activity'])){
      $data['activity_err'] = 'Please enter activity';
     }
     if(empty($data['hd_notification'])){
      $data['notification_err'] = 'Please enter notification type';
     }
     if(empty($data['cust_notification'])){
       $data['notification_err'] = 'Please enter notification type';
      }
      if(empty($data['message1'])){
       $data['message_err'] = 'Please enter message';
      }
     
     /*if($this->clientModel->findBynotification($data['servicename'])){
     
       $data['servicename_err'] = 'servicename is  already exist';
     } */
     
     if(empty($data['activity_err']) && empty($data['notification_err']) && empty($data['message_err'])){
      
      // Register Client
      if($this->clientModel->UpdateNotificationMaster($data)){
       
        redirect('clients/notification');
       }         
      } 
     else {
      // Load view with errors
      $this->view('clients/notification_edit', $data);
     }  
  }
    else {
    // Get existing post from model
    $client = $this->clientModel->getNotificationById($id);

    // Check for owner
  $data = [
      'id' => $client->id,
     'activity' =>$client->activity,
     'helpdesk'=>$client->helpdesk_notification,
     'customer'=>$client->customer_notification,
     'email'=>$client->email_message,
     'sms'=>$client->sms_message,
     'email1'=>$client->email_message1,
     'sms1'=>$client->sms_message1,
    ];

    $this->view('clients/notification_edit', $data);
  }
}
//------------------------------------------------------------------------------------------------------------
}



  