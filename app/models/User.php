<?php
use PHPMailer\PHPMailer\PHPMailerAutoload;
use PHPMailer\PHPMailer\Exception;
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Regsiter user

    public function register($data){      
      $this->db->query('INSERT INTO users (usertype,resource,location,emp_id,username,email,name,number,role,password,status) VALUES(:usertype,:resource,:location,:emp_id,:username, :email, :name, :number,:role, :password, :status)');
      // Bind values
      $this->db->bind(':usertype', $data['usertype']);
      $this->db->bind(':resource', $data['resource']);
      $this->db->bind(':location', $data['location']);
      $this->db->bind(':emp_id', $data['emp_id']);
      $this->db->bind(':username', $data['username']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':number', $data['number']);
      $this->db->bind(':role', $data['role']);      
      $this->db->bind(':password', $data['password']);
      $this->db->bind(':status', $data['status']);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
   
    }
    public function getUsers(){
      $this->db->query('SELECT *,
                        users.id as userID,
                        users.usertype as usertype,
                        users.resource as resource,
                        users.location as location,
                        users.emp_id as emp_id,
                        users.username as username,
                        users.email as email,
                        users.name as name,
                        users.number as number,
                        users.role as role,
						users.flag as flag,
                        users.password as password,
                         users.status as status
                        FROM users
                        ORDER BY users.created_date DESC
                        ');
                        $results = $this->db->resultSet();
                        return $results;
         }
    // Login User
    public function login($email, $password){
      $this->db->query('SELECT * FROM users WHERE email = :email');
      $this->db->bind(':email', $email); 
      $row = $this->db->single();
      $hashed_password = $row->password;
      if(password_verify($password, $hashed_password)){
        return $row;
      } else {
        return false;
      }
    }

    // Find user by email
    public function findUserByEmail($email){
      $this->db->query('SELECT * FROM users WHERE email = :email');
      // Bind value
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }
//---------------------------------------------------------------------------------------------------------
public function findUserBynumber($number){
  $this->db->query('SELECT * FROM users WHERE number = :number');
  // Bind value
  $this->db->bind(':number', $number);

  $row = $this->db->single();

  // Check row
  if($this->db->rowCount() > 0){
    return true;
  } else {
    return false;
  }
}

//----------------------------------------------------------------------------------------------
 /*   public function updateStatus($data){
      
      $this->db->query('UPDATE users SET password = :new_password , status = :status, updated_at = :updated_at  WHERE email = :email');
      // Bind values    
      $this->db->bind(':email', $data['email']);       
      $this->db->bind(':password', $data['new_password']);     
      $this->db->bind(':status', $data['status']);
      $this->db->bind(':updated_at', $data['updated_at']);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    } */
    public function updateStatus($data){
      $this->db->query('UPDATE users SET password = :new_password, status= :status, updated_at = :updated_at WHERE email = :email');
      // Bind values      
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':new_password', $data['new_password']);
      $this->db->bind(':status', $data['status']);
      $this->db->bind(':updated_at', $data['updated_at']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
//-----------------------------------------------------------------------------------------------------------
	  public function updateStatusNew($data){
      $this->db->query('UPDATE users SET password = :new_password, updated_at = :updated_at WHERE email = :email');
      // Bind values      
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':new_password', $data['new_password']);     
      $this->db->bind(':updated_at', $data['updated_at']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
//----------------------------------------------------------------------------------------------------
    public function DeleteKey($data){
      $this->db->query('DELETE  FROM  password_reset_temp  WHERE email = :email');
      // Bind values      
      $this->db->bind(':email', $data['email']);
          // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
	/* public function updateStatus1($data){
      $this->db->query('UPDATE users SET password = :new_password, status= :status, updated_at = :updated_at');
      // Bind values      
      $this->db->bind(':new_password', $data['new_password']);
      $this->db->bind(':status', $data['status']);
      $this->db->bind(':updated_at', $data['updated_at']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    } */


public function updateUser($data){       
      $this->db->query('UPDATE users SET status= :status WHERE id = :user_id');
      // Bind values      
     $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':status', $data['status']);
      

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

public function selectUser($user_id){
      $this->db->query('SELECT * FROM users WHERE id = :user_id');
      $this->db->bind(':user_id', $user_id);
      $row = $this->db->single();      
        return $row;
     
    }


    public function loginHistory($ipaddr,$time,$username,$browser,$platform,$version){       
      $this->db->query('INSERT INTO loginhistory (username, ipaddress,last_login,browser,platform,version) VALUES(:username,:ipaddr,:time,:browser,:platform,:version)');
      // Bind values
      $this->db->bind(':username', $username);
      $this->db->bind(':ipaddr', $ipaddr);
      $this->db->bind(':time', $time);    
      $this->db->bind(':browser', $browser); 
      $this->db->bind(':platform', $platform);   
      $this->db->bind(':version', $version);   
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

//----------------------------------------------------------------------------------------------------------

    public function forgetPwd($email,$key,$expDate){       
      $this->db->query('INSERT INTO  password_reset_temp(email,token,expDate) VALUES(:email,:token,:expDate)');
      // Bind values
      $this->db->bind(':email', $email);
      $this->db->bind(':token', $key);
      $this->db->bind(':expDate', $expDate);    
           // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
//-------------------------------------------------------------------------------------------------------------

   /* public function resetpwd($data){
      $this->db->query('SELECT * FROM password_reset_temp WHERE token = :token and email= :email');
      // Bind value
      
      $this->db->bind(':token', $data['token']);
      $this->db->bind(':email', $data['email']);
      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }
*/
//---------------------------------------------------------------------------------------------------------

    public function resetpwd($data){
      $this->db->query('SELECT * FROM password_reset_temp WHERE token = :token  and email= :email                  
                        ');
                         $this->db->bind(':token', $data['key']);
                         $this->db->bind(':email', $data['email']);
                       
      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
         }
    // ----------------------------------------------------------------------------------------
    public function Expdate($data){
      $this->db->query('SELECT expDate FROM password_reset_temp WHERE token = :token  and email= :email                  
                        ');
                         $this->db->bind(':token', $data['key']);
                         $this->db->bind(':email', $data['email']);
 
    $row = $this->db->single();    
     $total = $row->expDate;
     return $total;
    }
    //----------------------------------------------------------------------------------------------------
    public function getUserById($userID){
      $this->db->query('SELECT * FROM users WHERE id = :id');
      // Bind value
      $this->db->bind(':id', $userID);

      $row = $this->db->single();

      return $row;
    }

    //--------------------------------------------------------------------------------------------------------------
    public function TotalUser(){
      $this->db->query('SELECT total_users FROM super_admin ');
      // Bind value
     $row = $this->db->single();
      return $row;
    }
    //--------------------------------------------------------------------------------------------------------------
    public function CreatedUser(){
      $this->db->query('SELECT COUNT(username) AS total FROM users');
      // Bind value
      $result = $this->db->single();

      return $result;
    }
    //---------------------------------------------------------------------------------------------------------------
    public function ConcurrentUser(){
      $this->db->query('SELECT concurrent_users FROM super_admin ');
      // Bind value
     $row = $this->db->single();
      return $row;
    }
    //--------------------------------------------------------------------------------------------------------------
    public function loginUser(){
      $this->db->query('SELECT COUNT(flag) AS total FROM users where flag=1');
      // Bind value
      $result = $this->db->single();

      return $result;
    }
    //------------------------------------------------------------------------------------------
    public function EditUser($data){
      
      $query = $this->db->query('UPDATE users SET role = :usertype, emp_id= :emp_id, username= :username, email =:email, name= :name, number= :number  WHERE id = :userID');
      
      // Bind values  
      $this->db->bind(':userID', $data['userID']);        
      $this->db->bind(':usertype', $data['usertype']);    
      $this->db->bind(':emp_id', $data['emp_id']);
      $this->db->bind(':username', $data['username']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':number', $data['number']);      
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    //---------------------------------------------------------------------------------------------------------------
    public function flagupdate($email,$flag1){
		
      $query = $this->db->query('UPDATE users set flag = :flag1 where email = :email');
      $this->db->bind(':email', $email);
       $this->db->bind(':flag1', $flag1);
      if($this->db->execute())
      {
        return true;
      }
      else 
      {
        return false;
      }
    }
    //--------------------------------------------------------------------------------------------------------------

    public function activeuser($email,$flag){
		
      $query = $this->db->query('UPDATE users set flag = :flag  WHERE email=:email ');
      $this->db->bind(':email', $email);
      $this->db->bind(':flag', $flag);
        if($this->db->execute()){
         return true;
       } else {
         return false;
       }
   }

    //-------------------------------------------------------------------------------------------------------------
    public function countcampaign(){
      $this->db->query('SELECT  COUNT(id) AS total FROM campaign_master');
      $row = $this->db->single();
      $camapignID = $row->total;
     //print_r($camapignID);die;
      return $camapignID;
      }
//-------------------------------------------------------------------------------------------------------------
        public function campaignname($i){
      $this->db->query('SELECT campaignname FROM campaign_master WHERE id=:id');
       $this->db->bind(':id', $i);
      $row = $this->db->single();
      $camapignID = $row->campaignname;
     //print_r($camapignID);die;
      return $camapignID;
      }
//-------------------------------------------------------------------------------------------------------------
      public function campaignopen($i){
        $status ="Close";
      $this->db->query('SELECT COUNT(status) AS total FROM tickets WHERE campaign_ID=:id AND status!=:status');
       $this->db->bind(':id', $i);
          $this->db->bind(':status', $status);
      $row = $this->db->single();
      $camapignID = $row->total;
     //print_r($camapignID);die;
      return $camapignID;
      }
//-------------------------------------------------------------------------------------------------------------
       public function campaignclose($i){
        $status ="Close";
      $this->db->query('SELECT COUNT(status) AS total FROM closedtickets WHERE campaign_ID=:id AND status=:status');
       $this->db->bind(':id', $i);
          $this->db->bind(':status', $status);
      $row = $this->db->single();
      $camapignID = $row->total;
     //print_r($camapignID);die;
      return $camapignID;
      }
//-------------------------------------------------------------------------------------------------------------
       public function campaignopentoday($i){
        $status ="Close";
      $this->db->query('SELECT COUNT(status) AS total FROM tickets WHERE campaign_ID=:id AND status!=:status  AND  DAY(created_at) = DAY(NOW())');
       $this->db->bind(':id', $i);
          $this->db->bind(':status', $status);
      $row = $this->db->single();
      $camapignID = $row->total;
    // print_r($camapignID);die;
      return $camapignID;
      }
//-------------------------------------------------------------------------------------------------------------
       public function campaignclosetoday($i){
        $status ="Close";
      $this->db->query('SELECT COUNT(status) AS total FROM closedtickets WHERE campaign_ID=:id AND status=:status  AND  DAY(closed_at) = DAY(NOW())');
       $this->db->bind(':id', $i);
          $this->db->bind(':status', $status);
      $row = $this->db->single();
      $camapignID = $row->total;
    // print_r($camapignID);die;
      return $camapignID;
      }
//-------------------------------------------------------------------------------------------------------------  
       public function campaigncritical($i){
        $status ="Close";
        $severity="P1";
      $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE campaign_ID=:id AND status!=:status AND severity=:severity');
       $this->db->bind(':id', $i);
          $this->db->bind(':status', $status);
         $this->db->bind(':severity', $severity);
         
      $row = $this->db->single();
      $camapignID = $row->total;
    // print_r($camapignID);die;
      return $camapignID;
      }
//------------------------------------------------------------------------------------------------------------- 
       public function campaignhigh($i){
        $status ="Close";
        $severity="P2";
      $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE campaign_ID=:id AND status!=:status AND severity=:severity');
       $this->db->bind(':id', $i);
          $this->db->bind(':status', $status);
         $this->db->bind(':severity', $severity);   
      $row = $this->db->single();
      $camapignID = $row->total;
    // print_r($camapignID);die;
      return $camapignID;
      }
//-------------------------------------------------------------------------------------------------------------
     public function campaignmedium($i){
        $status ="Close";
        $severity="P3";
      $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE campaign_ID=:id AND status!=:status AND severity=:severity');
       $this->db->bind(':id', $i);
          $this->db->bind(':status', $status);
         $this->db->bind(':severity', $severity);   
      $row = $this->db->single();
      $camapignID = $row->total;
    // print_r($camapignID);die;
      return $camapignID;
      }
//-------------------------------------------------------------------------------------------------------------
       public function campaignlow($i){
        $status ="Close";
        $severity="P4";
      $this->db->query('SELECT COUNT(severity) AS total FROM tickets WHERE campaign_ID=:id AND status!=:status AND severity=:severity');
       $this->db->bind(':id', $i);
          $this->db->bind(':status', $status);
         $this->db->bind(':severity', $severity);   
      $row = $this->db->single();
      $camapignID = $row->total;
    // print_r($camapignID);die;
      return $camapignID;
      }
//------------------------------------------------------------------------------------------------------------- 
         public function campaignsla($i){
        $status ="Close";
       
        $time="0";
      $this->db->query('SELECT COUNT(l1) AS total FROM tickets WHERE campaign_ID=:id AND status!=:status AND l1!=:time');
       $this->db->bind(':id', $i);
          $this->db->bind(':status', $status);
         $this->db->bind(':time', $time);   
      $row = $this->db->single();
      $camapignID = $row->total;
    // print_r($camapignID);die;
      return $camapignID;
      }
    
//-------------------------------------------------------------------------------------------------------------
  }