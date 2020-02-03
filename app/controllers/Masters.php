<?php
	class Masters extends Controller {
    public function __construct(){
      $this->masterModel = $this->model('master');
     
    }
  
public function vertical_master()
{
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
$data =[
 'verticalname' => trim($_POST['verticalname']), 
 'verticalname_err' => ''          
];
if(empty($data['verticalname'])){
 $data['verticalname_err'] = 'Please enter Vertical Name';
}
if($this->masterModel->findVerticalByName($data['verticalname'])){

  $data['verticalname_err'] = 'Vertical Name is already exist';
}

if(empty($data['verticalname_err']))
	{
		if($this->masterModel->verticalMaster($data))
		 {
			  $getvertical = $this->masterModel->getVerticalMaster($id);         
			  $data = [
			  'vertial' => $getvertical
			  ];
			   flash('register_success', 'Vertical Added Successfully');  
			   redirect('Masters/vertical_master',$data);
		  }         
	 } 
else 
	{
	  $this->view('master/vertical_master', $data);
	}       
} 
else 
	{
		$data =[
		  'verticalname' => '',  
		  'verticalname_err' => '' 
		];
		$data['verticals'] = $this->masterModel->getVertical();
		$this->view('master/vertical_master', $data);
	}
}
//------------------------------------------------------------------------------------------------------
public function vertical_edit($id){
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Sanitize POST array
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $data = [
      'id'=>$id,
      'verticalname' =>trim($_POST['verticalname']),       
      'verticalname_err' => '',      
    ];
   
    if(empty($data['verticalname'])){
      $data['verticalname_err'] = 'Please enter Vertical name';
     }
    
     
    if(empty($data['verticalname_err'])){
      // Validated
      if($this->masterModel->updateVertical($data)){
        flash('vertical_message', 'Vertical Updated');
        redirect('masters/vertical_master');
      } else {
        die('Something went wrong');
      }
    } else {
      // Load view with errors
      $this->view('master/vertical_edit', $data);
    }

  } else {
    // Get existing post from model
    $vertical = $this->masterModel->getVerticalById($id);
    // Check for owner
  $data = [
      'id' => $vertical->id,
     'verticalname' =>$vertical->verticalname
    ];

    $this->view('master/vertical_edit', $data);
  }
}
//--------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------
public function target()
{
	$data = [
	'outboundcaller' => '',
	'q1amount' => '',
	'q2amount' => '',
	'q3amount' => '',
	'q4amount' => '',
	'outboundcaller_err' => '',
	'q1amount_err' => '',
	'q2amount_err' => '',
	'q3amount_err' => '',
	'q4amount_err' => ''
	
	];
	$data['getindividuallist'] = $this->masterModel->getindividuallist();
		
	$this->view('targets/target_master',$data);
}
//------------------------------------------------------------------------------------------------------
public function vertarget()
{
	$data = [
	'verticals' => '',
	'q1targetamount' => '',
	'q2targetamount' => '',
	'q3targetamount' => '',
	'q4targetamount' => '',
	'verticals_err' => '',
	'q1targetamount_err' => '',
	'q2targetamount_err' => '',
	'q3targetamount_err' => '',
	'q4targetamount_err' => ''
	
	];
	$data['department'] = $this->masterModel->getalldepartment();
		  $data['getallverticaltargetlist'] = $this->masterModel->getallverticaltargetlist();
	
		
	$this->view('targets/vertical_master',$data);
}
//------------------------------------------------------------------------------------------------------
public function vertical_delete($id)
{
	if($this->masterModel->verticaldelete($id))
	{
		flash('vertical_delete', 'Vertical Deleted Successfully');  
		redirect('masters/vertical_master');
	}
}
//------------------------------------------------------------------------------------------------------
public function individualtarget()
{
	 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Sanitize POST array
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	$data =[
 'outboundcaller' => trim($_POST['outboundcaller']), 
 'q1amount' => trim($_POST['q1amount']),
 'q2amount' => trim($_POST['q2amount']),
 'q3amount' => trim($_POST['q3amount']),
 'q4amount' => trim($_POST['q4amount']),
 'outboundcaller_err' => '',         
 'q1amount_err' => '',
 'q2amount_err' => '',
 'q3amount_err' => '',         
 'q4amount_err' => ''                  
];
if(empty($data['outboundcaller'])){
 $data['outboundcaller_err'] = 'Please Select Username';
}
if(empty($data['q1amount'])){
 $data['q1amount_err'] = 'Please Enter Q1 Amount';
}
if(empty($data['q2amount'])){
 $data['q2amount_err'] = 'Please Enter Q2 Amount';
}
if(empty($data['q3amount'])){
 $data['q3amount_err'] = 'Please Enter Q3 Amount';
}
if(empty($data['q4amount'])){
 $data['q4amount_err'] = 'Please Enter Q4 Amount';
}
if(empty($data['outboundcaller_err']) && empty($data['q1amount_err']) && empty($data['q2amount_err']) &&  empty($data['q3amount_err']) && empty($data['q4amount_err'])){
 
  if($this->masterModel->Insertindividualtarget($data))
    {
      
    }
  flash('client_success', 'Target for Individual is Added Successfully');  
   redirect('Masters/target');
  }   
else {
 // Load view with errors
 $this->view('targets/target_master', $data);
}       

	 }
	 else{
		
$data = [
  'outboundcaller' => '',     
  'q1amount' => '',     
  'q2amount' =>'',     
  'q3amount' => '',     
  'q4amount' => '',     
  'outboundcaller_err' =>'',     
  'q1amount_err' => '', 
  'q2amount_err' => '',     
  'q3amount_err' => '',     
  'q4amount_err' => ''
		 ];
		  $data['users'] = $this->masterModel->getallusers();
		  $data['getindividuallist'] = $this->masterModel->getindividuallist();
	$this->view('targets/target_master',$data);
	 }
}
//------------------------------------------------------------------------------------------------------
public function verticaltarget()
{
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Sanitize POST array
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	$data =[
 'verticals' => trim($_POST['verticals']), 
 'q1targetamount' => trim($_POST['q1targetamount']),
 'q2targetamount' => trim($_POST['q2targetamount']),
 'q3targetamount' => trim($_POST['q3targetamount']),
 'q4targetamount' => trim($_POST['q4targetamount']),
 'verticals_err' => '',         
 'q1targetamount_err' => '',
 'q2targetamount_err' => '',
 'q3targetamount_err' => '',         
 'q4targetamount_err' => ''                  
];
if(empty($data['verticals'])){
 $data['verticals_err'] = 'Please Select Vertical';
}
if(empty($data['q1targetamount'])){
 $data['q1targetamount_err'] = 'Please Enter Q1 Target Amount';
}
if(empty($data['q2targetamount'])){
 $data['q2targetamount_err_err'] = 'Please Enter Q2 Target Amount';
}
if(empty($data['q3targetamount'])){
 $data['q3targetamount_err'] = 'Please Enter Q3 Target Amount';
}
if(empty($data['q4targetamount'])){
 $data['q4targetamount_err'] = 'Please Enter Q4 Target Amount';
}
if(empty($data['verticals_err']) && empty($data['q1targetamount_err']) && empty($data['q2targetamount_err_err']) &&  empty($data['q3targetamount_err']) && empty($data['q4targetamount_err'])){
 
  if($this->masterModel->Insertverticaltarget($data))
    {
      
    }
  flash('vertical_success', 'Target for Vertical is Added Successfully');  
   redirect('Masters/vertarget');
  }   
else {
 // Load view with errors
 $this->view('targets/target_master', $data);
}       

	 }
	 else{
		
$data = [
  'verticals' => '',     
  'q1targetamount' => '',     
  'q2targetamount' =>'',     
  'q3targetamount' => '',     
  'q4targetamount' => '',     
  'verticals_err' =>'',     
  'q1targetamount_err' => '', 
  'q2targetamount_err' => '',     
  'q3targetamount_err' => '',     
  'q4targetamount_err' => ''
		 ];
		  $data['department'] = $this->masterModel->getalldepartment();
		  $data['getallverticaltargetlist'] = $this->masterModel->getallverticaltargetlist();
		  
	$this->view('targets/vertical_master',$data);
	 }
}
//------------------------------------------------------------------------------------------------------
public function editverticaltarget($id)
{
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Sanitize POST array
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	$data =[
 'verticals'      => trim($_POST['verticals']),
 'q1targetamount' => trim($_POST['q1targetamount']),
 'q2targetamount' => trim($_POST['q2targetamount']),
 'q3targetamount' => trim($_POST['q3targetamount']),
 'q4targetamount' => trim($_POST['q4targetamount'])       
];

 
  if($this->masterModel->Updateverticaltarget($data))
    {
      
    }
  flash('vertical_success', 'Target for Vertical is Updated Successfully');  
   redirect('Masters/vertarget');
  }         

	 
	 else{
		
$getverticaltarget = $this->masterModel->getverticaltargetbyId($id);
		 
		 $data = [
		 'id' =>$getverticaltarget->id,
		 'verticals' =>$getverticaltarget->verticals,
		 'verticalname' =>$getverticaltarget->verticalname,
		 'q1targetamount'=>$getverticaltarget->q1targetamount,
		 'q2targetamount'=>$getverticaltarget->q2targetamount,
		 'q3targetamount'=>$getverticaltarget->q3targetamount,
		 'q4targetamount'=>$getverticaltarget->q4targetamount
		 ];
		  $data['department'] = $this->masterModel->getalldepartment();
	$this->view('targets/vertical_edit',$data);
	 }
}
//------------------------------------------------------------------------------------------------------
public function editindividualtarget($id)
{
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Sanitize POST array
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	$data =[
	'id' => trim($_POST['id']),
 'outboundcaller' => trim($_POST['outboundcaller']), 
 'q1amount' => trim($_POST['q1amount']),
 'q2amount' => trim($_POST['q2amount']),
 'q3amount' => trim($_POST['q3amount']),
 'q4amount' => trim($_POST['q4amount'])                 
];

 
  if($this->masterModel->Updateindividualtarget($data))
    {
      
    }
  flash('target_success', 'Target for Individual is Added Successfully');  
   redirect('Masters/target');
  }        
	 else
	 {
		 $getindividual = $this->masterModel->getindividualbyId($id);
		 
		 $data = [
		 'id' =>$getindividual->id,
		 'outboundcaller' =>$getindividual->outboundcaller,
		 'username' =>$getindividual->username,
		 'q1amount'=>$getindividual->q1amount,
		 'q2amount'=>$getindividual->q2amount,
		 'q3amount'=>$getindividual->q3amount,
		 'q4amount'=>$getindividual->q4amount
		 ];
		  $data['users'] = $this->masterModel->getallusers();
		   
		 $this->view('targets/target_edit',$data);
	 }
}
 //----------------------------------------------------------------------------------------------------------
 public function oem_delete($id)
{
	if($this->masterModel->oemdelete($id))
	{
		flash('oem_delete', 'OEM Deleted Successfully');  
		redirect('masters/oem_master');
	}
}

//------------------------------------------------------------------------------------------------------
public function product_delete($id)
{
	if($this->masterModel->productdelete($id))
	{
		flash('product_delete', 'Product Deleted Successfully');  
		redirect('masters/product_master');
	}
}

 //------------------------------------------------------------------------------------------------------
 public function oem_master()
{
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
$data =[
 'oemname' => trim($_POST['oemname']), 
 'oemname_err' => ''          
];

if(empty($data['oemname'])){
 $data['oemname_err'] = 'Please enter OEM Name';
}
if($this->masterModel->findOemByName($data['oemname'])){

  $data['oemname_err'] = 'OEM Name is already exist';
}
if(empty($data['oemname_err']))
	{
		if($this->masterModel->oemMaster($data))
		 {
			  //$getoem = $this->masterModel->getOemMaster($id);         
			 // $data = [
			  //'oem' => $getoem
			  //];
		 	$data['oems'] = $this->masterModel->getoem();
			   flash('register_success', 'Oem Added Successfully');  
			   redirect('masters/oem_master',$data);
		  }         
	 } 
else 
	{
	  $this->view('master/oem_master', $data);
	}       
} 
else 
	{
		$data =[
		  'oemname' => '', 
          'oemname_err' => '' 
		];
		$data['oems'] = $this->masterModel->getoem();
		$this->view('master/oem_master', $data);
	}
}
//------------------------------------------------------------------------------------------------
 public function product_master()
{
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
$data =[
 'productname' => trim($_POST['productname']), 
 'productname_err' => ''          
];

if(empty($data['productname'])){
 $data['productname_err'] = 'Please enter Product Name';
}
if($this->masterModel->findProductByName($data['productname'])){

  $data['productname_err'] = 'Product Name is already exist';
}
if(empty($data['productname_err']))
	{
		if($this->masterModel->productMaster($data))
		 {
			 $data['product'] = $this->masterModel->getProduct();
			   flash('register_success', 'Product Added Successfully');  
			   redirect('masters/product_master',$data);
		  }         
	 } 
else 
	{
	  $this->view('master/product_master', $data);
	}       
} 
else 
	{
		$data =[
		  'productname' => '', 
          'productname_err' => ''
		];
		$data['products'] = $this->masterModel->getProduct();
		$this->view('master/product_master', $data);
	}
}
//------------------------------------------------------------------------------------------------------
public function getalloem($id)
{
	$data = $this->masterModel->getoemMaster($id);
	
	echo json_encode($data);
}
//------------------------------------------------------------------------------------------------------ 
public function oem_edit($id){
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Sanitize POST array
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $data = [
      'id'=>$id,
      'oemname' =>trim($_POST['oemname']),       
      'oemname_err' => ''     
     
    ];
   
   
    if(empty($data['oemname'])){
      $data['oemname_err'] = 'Please enter OEM name';
     }
      
     
    if(empty($data['oemname_err'])){
      // Validated
      if($this->masterModel->updateOem($data)){
        flash('oem_message', 'OEM Updated');
        redirect('masters/oem_master');
      } else {
        die('Something went wrong');
      }
    } else {
      // Load view with errors
      $this->view('masters/oem_edit', $data);
    }

  } else {
    // Get existing post from model
    $oem = $this->masterModel->getoemById($id);
	
    // Check for owner
  $data = [
      'id' => $oem->id,
     'oemname' =>$oem->oemname
    ];
	

    $this->view('master/oem_edit', $data);
  }
}
//------------------------------------------------------------------------------------------------------
public function product_edit($id){
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Sanitize POST array
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $data = [
      'id'=>$id,       
      'productname' =>trim($_POST['productname']),       
      'productname_err' => ''   
    ];
   
   if(empty($data['productname'])){
      $data['productname_err'] = 'Please enter Product name';
     }
    
     
    if(empty($data['productname_err'])){
      // Validated
      if($this->masterModel->updateProduct($data)){
        flash('oem_message', 'Product Updated');
        redirect('masters/product_master');
      } else {
        die('Something went wrong');
      }
    } else {
      // Load view with errors
      $this->view('master/product_edit', $data);
    }

  } else {
    // Get existing post from model
    $oem = $this->masterModel->getproductById($id);
	
    // Check for owner
  $data = [
      'id' => $oem->id,
     'productname' =>$oem->productname
    ];
	

    $this->view('master/product_edit', $data);
  }
}
}



  