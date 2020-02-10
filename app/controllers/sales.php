<?php
	class Sales extends Controller {
    public function __construct(){
     

      $this->postModel = $this->model('Post');
      $this->userModel = $this->model('User');
      $this->masterModel = $this->model('master');
      $this->ticketModel = $this->model('Ticket');
      $this->clientModel = $this->model('client');
      $this->leadModel = $this->model('lead');
    }
     //-----------------------------------------------------------------------------------------------------------
 //----------------------------------------------------------------------------------------------------------
	 
 public function index_new()
 {
	$assignee= $_SESSION['email'];
   
	 $data['commit']=$this->leadModel->commitlead($assignee); 
	 $data['upside']=$this->leadModel->upsidelead($assignee); 
	 $data['leadcount']=$this->leadModel->leadcount($assignee); 
	 $data['cold']=$this->leadModel->coldcount($assignee);
	 $data['wonlead']=$this->leadModel->wonlead($assignee);
	 $data['postpondlead']=$this->leadModel->postponedlead($assignee);
	 $data['droppedlead']=$this->leadModel->droppedlead($assignee);
	 $data['lostlead']=$this->leadModel->lostlead($assignee);
	 $data['todolist'] = $this->leadModel->getalltodolist($assignee);
	 $this->view('sales/index_new',$data);
	}
 //---------------------------------------------------------------------------------------------------------- 
 public function addcustomer()
 {
	 if($_SERVER['REQUEST_METHOD'] == 'POST'){
		 
	 }
	 else 
	 {
		 $this->view('sales/addcustomer');
	 }
 }
    //----------------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------------------
    public function user_master(){
      
           // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // Sanitize POST data
            // Init data
        $data =[
          'usertype' => trim($_POST['usertype']),
          'oemname' => trim($_POST['oemname']),
          'resource' => trim($_POST['resource']),
          'location' => trim($_POST['location']),
          'emp_id' => trim($_POST['emp_id']),
          'username' => trim($_POST['username']),         
          'email' => trim($_POST['email']),
          'name' => trim($_POST['name']),
          'number' => trim($_POST['number']),
          'role' => trim($_POST['role']),
          'password' => trim($_POST['password']),
          'confirm_password' => trim($_POST['confirm_password']),
          'status' => trim($_POST['status']),
          'usertype_err' => '',         
          'location_err' => '',
          'emp_id_err' => '',
          'username_err' => '',         
          'email_err' => '',
          'name_err' => '',
          'number_err' => '',
          'role_err' => '',         
          'password_err' => '',
          'confirm_password_err' => ''          
        ];
         
        // Validate Usertype
        if(empty($data['usertype'])){
          $data['usertype_err'] = 'Please enter usertype';
        }
		         // Validate location
         if(empty($data['location'])){
          $data['location_err'] = 'Please enter location';
        }
         // Validate Employee ID
         if(empty($data['emp_id'])){
          $data['emp_id_err'] = 'Please enter Employee Id';
        }
         // Validate location
         if(empty($data['username'])){
          $data['username_err'] = 'Please enter username';
        }

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Please enter email';
        }
         // Check email
         if($this->userModel->findUserByEmail($data['email'])){
            $data['email_err'] = 'Email is already taken';
         }
        
        if(filter_var($data['email'], FILTER_VALIDATE_EMAIL)===false){
          $data['email_err']='Please Enter Valid Email Id';         
        }
        // Validate Name
        if(empty($data['name'])){
          $data['name_err'] = 'Please enter name';
        }

        // Validate number
        if(empty($data['number'])){
          $data['number_err'] = 'Please Enter your number';
        }
        else if(strlen($data['number']) < 10){
          $data['number_err'] = 'number must be at  10';
        }

           // Validate Role
        if(empty($data['role'])){
          $data['role_err'] = 'Please Enter your Role';
        }

        // Validate Password
        if(empty($data['password'])){
          $errors = 'Please enter password';
        } else if(strlen($data['password']) < 6){
          $data['password_err'] = 'Password must be at least 6 characters';
        } if(!preg_match("/\d/",$data['password'])){
          $data['password_err'] = 'Passwords should contain at least one digit';
        }
        if(!preg_match("/[A-Z]/",$data['password'])){
          $data['password_err'] = 'Passwords should contain at least one capital letter';
        }
        if(!preg_match("/[a-z]/",$data['password'])){
          $data['password_err'] = 'Passwords should contain at least one small letter';
        }
        if(!preg_match("/\W/",$data['password'])){
          $data['password_err'] = 'Passwords should contain at least one special character';
        }
            
        // Validate Confirm Password
        if(empty($data['confirm_password'])){
          $data['confirm_password_err'] = 'Please confirm password';
        } else {
          if($data['password'] != $data['confirm_password']){
            $data['confirm_password_err'] = 'Passwords do not match';
          }
        }
       
        
        
        // Make sure errors are empty
        if(empty($data['name_err']) && empty($data['email_err']) && empty($data['role_err']) &&  empty($data['password_err']) && empty($data['confirm_password_err'])){
          // Validated
          
          // Hash Password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
          /* Hash Email AES 256
            $encryption_key_256bit = base64_encode(openssl_random_pseudo_bytes(32));
            $key = $encryption_key_256bit;
 
                  function my_encrypt($data, $key) {
                      // Remove the base64 encoding from our key
                      $encryption_key = base64_decode($key);
                      // Generate an initialization vector
                      $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
                      // Encrypt the data using AES 256 encryption in CBC mode using our encryption key and initialization vector.
                      $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
                      // The $iv is just as important as the key for decrypting, so save it with our encrypted data using a unique separator (::)
                      return base64_encode($encrypted . '::' . $iv);
                  }
                  $data['email'] = my_encrypt( $data['email'], $key);
                  */

          // Register User
          $created_user=$this->userModel->CreatedUser();
          $total_user=$this->userModel->TotalUser();           
         $input=$total_user->total_users;

         /* $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
         $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $input ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");       
                if($created_user->total < $qDecoded){ */                  
                  if($this->userModel->register($data))
                  {
                    flash('register_success', 'You are registered and can log in');  
                    redirect('posts/user_master');
                }                 
                 /* }
                 
            else{
             flash('register_failure', 'total number of user limit exceed please contact admin');
             redirect('posts/user_master');
            } */
            }       
          
         else {
          // Load view with errors
          $this->view('posts/user_master', $data);
        }       

      } else {
        // Init data
        $data =[
          'usertype' =>'',
          'oemname' =>'',
          'resource' => '',
          'location' => '',
          'emp_id' => '',
          'username' =>  '',      
          'email' => '',
          'name' => '',
          'number' => '',
          'role' => '',
          'password' => '',
          'confirm_password' => '',
          'usertype_err' => '',         
          'location_err' => '',
          'emp_id_err' => '',
          'username_err' => '',         
          'email_err' => '',
          'name_err' => '',
          'number_err' => '',
          'role_err' => '',         
          'password_err' => '',
          'confirm_password_err' => '' 
        ];

        // Load view
        $this->view('posts/user_master', $data);
      }
 
    //Sending Data to Model to get the ticket to show in index
 
      // Get Tickets
       }



//----------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------
       public function showusers(){
        $users = $this->userModel->getUsers();
          // $tickets = $this->ticketModel->getTicketByDepartment($department);
                 
         $data = [
           'users' => $users
         ];
   
         $this->view('posts/showusers', $data);
       }
//----------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------
       public function edit($userID){
       // print_r($userID);die;
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          
          // Sanitize POST array
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
          $data =[
            'userID'=>$userID,
            'usertype' => trim($_POST['usertype']),           
            'emp_id' => trim($_POST['emp_id']),
            'username' => trim($_POST['username']),         
            'email' => trim($_POST['email']),
            'name' => trim($_POST['name']),
            'number' => trim($_POST['number']),           
            'usertype_err' => '',          
            'emp_id_err' => '',
            'username_err' => '',         
            'email_err' => '',
            'name_err' => '',
            'number_err' => ''        
          ];
          // Validate Usertype
          if(empty($data['usertype'])){
            $data['usertype_err'] = 'Please enter usertype';
          }
           // Validate location
           
           // Validate Employee ID
           if(empty($data['emp_id'])){
            $data['emp_id_err'] = 'Please enter Employee Id';
          }
           // Validate location
           if(empty($data['username'])){
            $data['username_err'] = 'Please enter username';
          }
  
          // Validate Email
          if(empty($data['email'])){
            $data['email_err'] = 'Please enter email';
          }
           // Check email
          
          
          if(filter_var($data['email'], FILTER_VALIDATE_EMAIL)===false){
            $data['email_err']='Please Enter Valid Email Id';         
          }
          // Validate Name
          if(empty($data['name'])){
            $data['name_err'] = 'Please enter name';
          }
  
          // Validate number
          if(empty($data['number'])){
            $data['number_err'] = 'Please Enter your number';
          }
          else if(strlen($data['number']) < 10){
            $data['number_err'] = 'number must be at  10';
          }
  
             // Validate Role
         
  
          // Make sure no errors
          if(empty($data['name_err']) && empty($data['email_err']) &&   empty($data['number_err']) && empty($data['usertype_err'])){
            // Validated
            $result = $this->userModel->EditUser($data); 
            
            if(!empty($result)){
              flash('post_message', 'user profile Updated');
              //$this->view('posts/showusers');
              redirect('posts/showusers');
            } else {
              flash('post_message1', 'somthing went wrong');
            }
          } else {
            // Load view with errors
            $this->view('posts/edit', $data);
          }
  
        } else {
          // Get existing post from model
          $ticket = $this->userModel->getUserById($userID);
  
          // Check for owner
        $data = [
          'userID'=>$ticket->id,
          'usertype' => $ticket->usertype,
          'resource' => $ticket->resource,
          'location' => $ticket->location,
          'emp_id' => $ticket->emp_id,
          'username' => $ticket->username,
          'email' => $ticket->email,
          'name' => $ticket->name,
          'number' => $ticket->number,
          'role' => $ticket->role,
          ];
    
          $this->view('posts/edit', $data);
        }
      }

//---------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------
    public function change(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        // Sanitize POST data
            // Init data
		$newpassword = trim($_POST['new_password']);
        $data =[
          'password' => trim($_POST['old_password']),
          'new_password' => $newpassword,
          'cnfm_password' => trim($_POST['cnfm_password']),         
          'email' => trim($_POST['email']),
          'status' => trim($_POST['status']),
          'updated_at' => trim($_POST['updated_at']),
          'old_password_err' => '',
          'password_err' => '',
          'confirm_password_err' => '' 
                    ];
        if(empty($data['password'])){
          $data['old_password_err'] = 'Please enter old password';
          }
        if(empty($data['old_password_err']))
		{
			$loggedInUser = $this->userModel->login($data['email'], $data['password']);
			if($loggedInUser)
			{  //Create Session
			
			}
			else 
			{
				$data['old_password_err'] = 'Password Incorrect';
				$this->view('posts/change', $data);
			}
        }
		if($data['password'] == $data['new_password'])
		{
			$data['password_err'] = 'New password should not be same to Old password';
			$this->view('posts/change', $data);			
		}
        if(empty($data['new_password']))
		{
          $errors = 'Please enter password';
        }
			else if(strlen($data['new_password']) < 6)
		{
          $data['password_err'] = 'Password must be at least 6 characters';
        }
			if(!preg_match("/\d/",$data['new_password']))
		{
          $data['password_err'] = 'Passwords should contain at least one digit';
        }
        if(!preg_match("/[A-Z]/",$data['new_password'])){
          $data['password_err'] = 'Passwords should contain at least one capital letter';
        }
        if(!preg_match("/[a-z]/",$data['new_password']))
		{
          $data['password_err'] = 'Passwords should contain at least one small letter';
        }
        if(!preg_match("/\W/",$data['new_password'])){
          $data['password_err'] = 'Passwords should contain at least one special character';
        }
            
        // Validate Confirm Password
        if(empty($data['cnfm_password'])){
          $data['confirm_password_err'] = 'Please confirm password';
        } else {
          if($data['new_password'] != $data['cnfm_password']){
            $data['confirm_password_err'] = 'Passwords do not match';
          }
        }

        if(empty($data['password_err']) && empty($data['confirm_password_err'])){
          // Validated
          
          // Hash Password
          $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);

           if(  $this->userModel->updateStatus($data)){
            flash('post_message', 'password Updated Please relogin with updated password');
            redirect('posts/change');
          }  
      } 
      
      else {
        // Load view with errors
        $this->view('posts/change', $data);
      }  
    }  
      else {
        // Init data
        $data =[
          
          'email' => '',         
          'old_password' => '',
          'new_password' => '',
          'cnfm_password' => '',   
          'status' => '', 
          'updated_at' => '',           
          'password_err' => '',
          'confirm_password_err' => '' 
        ];

        // Load view
        $this->view('posts/change', $data);
      }
      }       
//--------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------
 public function disable(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Sanitize POST array
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
          $data = [
            
            'user_id' => trim($_POST['id']),
            'status' => trim($_POST['status'])
           
          ];
  
          // Validate data
         
          // Make sure no errors
          print_r($data);
            // Validated
            if($this->userModel->updateUser($data)){  
             redirect('posts/showusers');
            } else {
              die('Something went wrong');
            }
         
      }

}



}  
    
    /*
    Sending Data to Model to get the ticket details
    public function showtickets($id){
      $ticket = $this->ticketModel->getTicketById($id);
      $user = $this->userModel->getUserById($ticket->user_id);
      $data = [
        'ticket' => $ticket,
        'user' => $user,
        'department' => $department
      ];

      $this->view('posts/showtickets', $data);
    }
    */
    

  
