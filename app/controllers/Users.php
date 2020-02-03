<?php
  class Users extends Controller {
    public function __construct(){
      $this->userModel = $this->model('User');
      $this->clientModel = $this->model('client');
    }
    public function index_new(){
      // Check for POST
      $atmp=0;
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
		  
        // Process form
// Sanitize POST data
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

// Init data
$data =[
'email' => trim($_POST['email']),
'password' => trim($_POST['password']),
'email_err' => '',
'password_err' => '',      
];
// Validate Email
if(empty($data['email'])){
$data['email_err'] = 'Please enter email';
}

// Validate Password
if(empty($data['password'])){
$data['password_err'] = 'Please enter password';
}

//Check for user/email


// Make sure errors are empty
if($atmp<4){
if(empty($data['email_err']) && empty($data['password_err'])){
//Validated
//Check and set logged in user
if($this->userModel->findUserByEmail($data['email'])){
  //User found
  
$email = $data['email'];
$password = $data['password'];
$loggedInUser = $this->userModel->login($email, $password);
}
else {
  //User not found
  flash('password_incorrect', 'Invalid Username/Password');
  $data['password'] = '';
  
  }
$created_user=$this->userModel->loginUser();
$concurrent_user=$this->userModel->ConcurrentUser();           
$input=$concurrent_user->concurrent_users;

$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
 $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $input ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");       

 if($created_user->total < $qDecoded){      
        
     
if(!empty($loggedInUser)){
	
	
  //----------------------------------------------------------------------------------------------------
  function getBrowser()
  {
      $u_agent = $_SERVER['HTTP_USER_AGENT'];
      $bname = 'Unknown';
      $platform = 'Unknown';
      $version= "";
  
      //First get the platform?
      if (preg_match('/linux/i', $u_agent)) {
          $platform = 'linux';
      }
      elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
          $platform = 'mac';
      }
      elseif (preg_match('/windows|win32/i', $u_agent)) {
          $platform = 'windows';
      }
  
      // Next get the name of the useragent yes seperately and for good reason
      if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
      {
          $bname = 'Internet Explorer';
          $ub = "MSIE";
      }
      elseif(preg_match('/Firefox/i',$u_agent))
      {
          $bname = 'Mozilla Firefox';
          $ub = "Firefox";
      }
      elseif(preg_match('/Chrome/i',$u_agent))
      {
          $bname = 'Google Chrome';
          $ub = "Chrome";
      }
      elseif(preg_match('/Safari/i',$u_agent))
      {
          $bname = 'Apple Safari';
          $ub = "Safari";
      }
      elseif(preg_match('/Opera/i',$u_agent))
      {
          $bname = 'Opera';
          $ub = "Opera";
      }
      elseif(preg_match('/Netscape/i',$u_agent))
      {
          $bname = 'Netscape';
          $ub = "Netscape";
      }
  
      // finally get the correct version number
      $known = array('Version', $ub, 'other');
      $pattern = '#(?<browser>' . join('|', $known) .
      ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
      if (!preg_match_all($pattern, $u_agent, $matches)) {
          // we have no matching number just continue
      }
  
      // see how many we have
      $i = count($matches['browser']);
      if ($i != 1) {
          //we will have two since we are not using 'other' argument yet
          //see if version is before or after the name
          if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
              $version= $matches['version'][0];
          }
          else {
              $version= $matches['version'][1];
          }
      }
      else {
          $version= $matches['version'][0];
      }
  
      // check if we have a number
      if ($version==null || $version=="") {$version="?";}
  
      return array(
          'userAgent' => $u_agent,
          'name'      => $bname,
          'version'   => $version,
          'platform'  => $platform,
          'pattern'    => $pattern
      );
  }
  
  // now try it
  $ua=getBrowser();
  $browser=  $ua['name'];
  $platform=$ua['platform'];
  $version=$ua['version'];
  
  //------------------------------------------------------------------------------------------------------
  date_default_timezone_set("Asia/Kolkata");
  $machineName = gethostname(); 
  $ipaddr = gethostbyname($machineName);
  $time=date("Y-m-d H:i:s");
  $username=$data['email'];
 if($this->userModel->loginHistory($ipaddr, $time,$username,$browser,$platform,$version)){
   // value update in db
 }

  //Create Session
$this->createUserSession($loggedInUser);
}else {
  $atmp++;
  flash('password_incorrect', 'Invalid Username/Password');
//$data['password_err'] = 'Password Incorrect';
$this->view('users/index_new', $data);

}
      }
      else{
        flash('login_limit', 'concurrent users limit exceed please contact admin');  
        redirect('users/index_new');                     
     
      } 
} else {
// Load view with errors
$this->view('users/index_new', $data);
}


} 
}else {
// Init data
$data =[    
'email' => '',
'password' => '',
'email_err' => '',
'password_err' => '',        
];

// Load view
$this->view('users/index_new', $data);
}
}

//User Session 
public function createUserSession($user){

	
$_SESSION['id'] = $user->id;
$_SESSION['usertype'] = $user->usertype;
$_SESSION['email'] = $user->email;
$_SESSION['username'] = $user->username;
$_SESSION['number'] = $user->number;
$_SESSION['role'] = $user->role;
$_SESSION['image'] = $user->image;
$_SESSION['flag'] = $user->flag;
$_SESSION['status']=$user->status;
$_SESSION['updated_at']=$user->updated_at;

$role=$_SESSION['role'];
$status=$_SESSION['status'];
$updated_at=$_SESSION['updated_at'];
date_default_timezone_set("Asia/Kolkata");
$curdatetime = date("Y-m-d H:i:s");
if($curdatetime > $updated_at){
  $diff = abs(strtotime($curdatetime) - strtotime($updated_at));
}else{
  $diff = abs(strtotime($updated_at) - strtotime($curdatetime));
}
$duration=$diff/3600;
$hours= (int)round($duration);
$days=($hours/24);
$days1=(int)round($days);


	$email = $_SESSION['email'];	
	$flag = 1;	
  $count = $this->userModel->activeuser($email,$flag);
  
if($status=='1'){
redirect('posts/change');
}
else if($status=='2'){
   if($days1 >='60'){ 
    flash('password_change', 'Your password has been expired please reset yor password');  
    redirect('posts/change');
   }
 
   else{
       
     if($role =="Customer"){
        redirect('customer');
       }   
      else if($role =="Service Head"){
        redirect('Tickets');
       } 
	    else if($role =="Team leader"){
        redirect('Departments');
       } 
       else if($role =="Super Admin"){
        redirect('clients/super_admin');
       } 
       else if(($role=='L1 support') || ($role=='L2 support') || ($role=='L3 support')|| ($role=='Specialist') ){
        redirect('Helpdesk');
       }
	      else if($role =="OEM"){
		   redirect('oems'); 
	   } 
	   else if($role =="Account Manager"){
		   redirect('sales'); 
	   }
	   else if($role =="Telecaller"){
		   redirect('telecaller'); 
	   }
    else{
      redirect('posts');      
    } 
   }
}
else if($status=='4'){
  redirect('posts/change');
}
else{
  flash('disable_user', 'Your Account has been disabled please Contact Admin');  
  redirect('users/index_new'); 
}
}
//Logout Session
public function SetFlag(){
  $email = $_SESSION['email'];
  $flag1 = 0;
  $count = $this->userModel->flagupdate($email,$flag1);
  redirect('users/logout');
}
public function logout(){
unset($_SESSION['email']);
unset($_SESSION['username']);
unset($_SESSION['role']);
unset($_SESSION['image']);
unset($_SESSION['flag']);
unset($_SESSION['status']);
unset($_SESSION['updated_at']);
session_destroy();
redirect('users/index_new');
}
public function isLoggedIn(){
if(isset($_SESSION['id'])){
return true;
}else{
return false;
}
}
//-----------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------

public function forget(){

 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
 
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

// Init data
$data =[
'email' => trim($_POST['email']),
'email_err' => '',  
];
// Validate Email
if(empty($data['email'])){
$data['email_err'] = 'Please enter email';
}

if($this->userModel->findUserByEmail($data['email'])){
//User found
date_default_timezone_set("Asia/Kolkata");
$expFormat = mktime(
  date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
  );
  $email=$data['email'];
  $expDate = date("Y-m-d H:i:s",$expFormat);
  $key = md5((2418*2)+$email);
 $addKey = substr(md5(uniqid(rand(),1)),3,10);
 $key = $key . $addKey;
  if($this->userModel->forgetPwd($email,$key,$expDate)){
    // value update in db
  }      
  $output='<p>Dear user,</p>';
  $output.='<p>Please click on the following link to reset your password.</p>';
  $output.='<p>-------------------------------------------------------------</p>';
  $output.='<p><a href="http://isparkcrm.com/integrated-crm/users/resetpassword?
  key='.$key.'&email='.$email.'&action=reset" target="_blank">
  "http://isparkcrm.com/integrated-crm/users/resetpassword?
  key='.$key.'&email='.$email.'&action=reset</a></p>';   
 $output.='<p>-------------------------------------------------------------</p>';
  $output.='<p>Please be sure to copy the entire link into your browser.
  The link will expire after 1 day for security reason.</p>';
  $output.='<p>If you did not request this forgotten password email, no action 
  is needed, your password will not be reset. However, you may want to log into 
  your account and change your security password as someone may have guessed it.</p>';   	
  $output.='<p>Thanks,</p>';
  $output.='<p>Futurecalls Helpdesk Team</p>';
  $body = $output; 
  $subject = "Password Recovery -iSpark ";
  
  $email_to = $email;
  
  require 'PHPMailer/PHPMailer/PHPMailerAutoload.php';
  $mail=new PHPMailer;
  
          $mail->isSMTP();      
          $mail->Host='czismtp.logix.in';
          $mail->SMTPAuth=true; 
          $mail->Username ='helpdesk@futurecalls.com';
          $mail->Password = 'Pass@123'; 
          // Enable this option to see deep debug info
  
          // $mail->SMTPDebug = 4; 
  
          $mail->SMTPSecure = 'tls';
  
          $mail->Port ='587';
  
          $mail->SetFrom('helpdesk@futurecalls.com'); 
  
          $mail-> addAddress($email_to); 
  
          $mail->Subject=$subject;
          $mail->Body = $body;
          $mail->isHTML(true); 
  
  
  $mail->SMTPOptions = array(
      'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
           )
         );
  if(!$mail->Send()){
  echo "Mailer Error: " . $mail->ErrorInfo;
  }else{
    flash('forget_password', 'An email has been sent to you with instructions on how to reset your password.');  
    redirect('users/forget');
    }
}
else {
//User not found
flash('user_Notfound', 'No user is registered with this email address!');
redirect('users/forget');
}
}
  else {
    // Init data
    $data =[    
    'email' => '',    
    'email_err' => ''    
    ];
        // Load view
    $this->view('users/forget', $data);
    }

  }
//--------------------------------------------------------------------------------------------------------

public function changepassword()
{
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Process form
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    // Sanitize POST data
        // Init data
$newpassword = trim($_POST['new_password']);
    $data =[
     
      'new_password' => $newpassword,
      'cnfm_password' => trim($_POST['cnfm_password']),         
      'email' => trim($_POST['email']),      
      'updated_at' => trim($_POST['updated_at']),
      'password_err' => '',
      'confirm_password_err' => '' 
                ];
    

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

       if(  $this->userModel->updateStatusNew($data)){
              $this->userModel->DeleteKey($data);
           flash('password_message', 'password Updated Please login with updated password <a href="http://isparkcrm.com/integrated-crm/users/index_new">
        Click here</a> to Login');
        redirect('users/index_new');
      }  
  } 
  
  else {
    // Load view with errors
    $this->view('users/changepassword', $data);
  }  
}  
  else {
    // Init data
    $data =[
      
      'email' => '',     
      'new_password' => '',
      'cnfm_password' => '',      
      'updated_at' => '',           
      'password_err' => '',
      'confirm_password_err' => '' 
    ];

    // Load view
    $this->view('users/changepassword', $data);
  }
  }   
//--------------------------------------------------------------------------------------------------------
public function resetpassword(){
  
  if($_SERVER['REQUEST_METHOD'] == 'GET'){
      
  $data =[    
    'key' =>  $_GET['key'],    
     'email' => $_GET['email'], 
     ];
     date_default_timezone_set("Asia/Kolkata");
     $curDate = date("Y-m-d H:i:s");
 
  if($this->userModel->resetpwd($data)){
    $result=$this->userModel->Expdate($data);
      if ($result >= $curDate){        
        $this->view('users/changepassword', $data);  
} 
else{
  $data = [
    'title' => '<h2>Link Expired</h2>
    <p>The link is expired. You are trying to use the expired link which 
    as valid only 24 hours (1 days after request).<br /><br /></p>'   
    ];
    $this->view('users/invalid_link', $data);
  }
  }
else{
  $data = [
    'title' => '<h2>Invalid Link</h2>
    <p>The link is invalid/expired. Either you did not copy the correct link
    from the email, or you have already used the key in which case it is 
    deactivated.</p><p><a href="http://isparkcrm.com/integrated-crm/users/forget">
    Click here</a> to reset password.</p>'   
    ];
    $this->view('users/invalid_link', $data);
 
}		
}
}
//function end 

//----------------------------------------------------------------------------------------------------------
public function register(){
      
  // Check for POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){
// Process form

// Sanitize POST data
   // Init data
$data =[
 
 
 'firstname' => trim($_POST['fname']),   
 'lastname' => trim($_POST['lname']),      
 'email' => trim($_POST['email']),
 'number' => trim($_POST['number']),
 'org_type' => trim($_POST['org_type']),
 'org' => trim($_POST['org']), 
 'gst' => trim($_POST['gst']),
 'gst_pan' => trim($_POST['gst_pan']),
 'address' => trim($_POST['address']),
 'package' => trim($_POST['package']),
 'country' => trim($_POST['country'])
 //'firstname_err' => '',         
 //'lastname_err' => '',
 //'email_err' => '',
 //'org_err' => '',
 //'number_err' => '',
 //'gst_err' => '',         
 //'gstpan_err' => '',
 //'package_err' => ''          
];

// Validate Usertype
if(empty($data['firstname'])){
 $data['firstname_err'] = 'Please enter usertype';
}
// Validate location
if(empty($data['lastname'])){
 $data['location_err'] = 'Please enter location';
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
// Validate number
if(empty($data['number'])){
 $data['number_err'] = 'Please Enter your number';
}
else if(strlen($data['number']) < 10){
  $data['number_err'] = 'number must be at  10';
}
// Validate Role
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
// Make sure errors are empty
if(empty($data['firstname_err']) && empty($data['email_err']) && empty($data['org_err']) &&  empty($data['number_err']))
{
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
             return base64_encode($encrypted  . '::' . $iv);
         }
         $data['email'] = my_encrypt( $data['email'], $key);
         */

 // Register User
                
         if($this->userModel->register($data))
         {
           flash('register_success', 'You are registered and can log in');  
           redirect('posts/user_master');
       }                 

  }       
 else {
 // Load view with errors
 $this->view('users/register', $data);
}       

} else {
// Init data
$data =[
  'firstname' => '', 
  'lastname' => '', 
  'email' =>'', 
  'number' =>'', 
  'org_type' => '', 
  'org' => '', 
  'gst' => '', 
  'gst_pan' => '', 
  'address' =>'', 
  'package' =>'', 
  'country' => '', 
  //'firstname_err' => '',         

  //'lastname_err' => '',
  //'email_err' => '',
  //'org_err' => '',
  //'number_err' => '',
  //'gst_err' => '',         
  //'gstpan_err' => '',
  //'package_err' => ''  
];

// Load view
$this->view('users/register', $data);
}

//Sending Data to Model to get the ticket to show in index

// Get Tickets
}



//----------------------------------------------------------------------------------------------------------
  }