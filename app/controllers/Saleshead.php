<?php

  class Saleshead extends Controller {
    public function __construct(){
      $this->salesModel = $this->model('salesheads');
	  $this->userModel = $this->model('User');
	  $this->leadModel = $this->model('Lead');
      $this->campaignModel = $this->model('campaignModel'); 
    }
//----------------------------------------------------------------------------------------------------------------
public function lead_master(){
      
  
if($_SERVER['REQUEST_METHOD'] == 'POST'){

$data =[
 'leadowner' => trim($_POST['leadowner']), 
 'salutation' => trim($_POST['salutation']),
 'fname' => trim($_POST['fname']),
 'lname' => trim($_POST['lname']),
 'title' => trim($_POST['title']),
 'company' => trim($_POST['company']), 
 'website' => trim($_POST['website']), 
 'industry' => trim($_POST['industry']),
 'other' => trim($_POST['other']),
 'leadsource'=> trim($_POST['leadsource']),  
 'other1'=> trim($_POST['other1']),  
 'phone' => trim($_POST['phone']),  
 'noofemp' => trim($_POST['noofemp']), 
 'mobile'=> implode(",", $_POST['mobile']),  
 'email' => implode(",", $_POST['email']),
 'vertical' => trim($_POST['vertical']),
 'verticalother' => trim($_POST['verticalother']),
 'oem' => trim($_POST['oem']),
 'oemother' => trim($_POST['oemother']),
 'product' => trim($_POST['product']),  
 'leadstatus' => trim($_POST['leadstatus']),
 'assignee' => trim($_POST['assignee']),
 'ordervalue' => trim($_POST['ordervalue']),
 'closuredate' => trim($_POST['closuredate']),
 'status' => trim($_POST['status']),
 'leadowner_err' => '',         
 'salutation_err' => '',
 'fname_err' => '',
 'lname_err' => '',         
 'title_err' => '',
 'company_err' => '', 
 'website_err' => '',         
 'industy_err' => '',
 'leadsource_err' => '',
 'phone_err' => '',
 'noofemp_err' => '',                   
 'mobile_err' => '',
 'email_err' => '', 
 'vertical_err' => '',
 'oem_err' => '',
 'product_err' => '', 
 'rating_err' => '',                   
 'assign_err' => '',
 'ordervalue_err' => '', 
 'closuredate_err' => '' 
];

if(empty($data['salutation'])){
 $data['salutation_err'] = 'Please Select Salutation';
}
if(empty($data['fname'])){
 $data['fname_err'] = 'Please enter First Name';
}
if(empty($data['lname'])){
 $data['lname_err'] = 'Please enter Last Name';
}
if(empty($data['title'])){
 $data['title_err'] = 'Please enter Title';
}
if(empty($data['company'])){
 $data['company_err'] = 'Please enter Company';
}

if(empty($data['website'])){
 $data['website_err'] = 'Please Enter Website';
}

if(empty($data['industry'])){
 $data['industry_err'] = 'Please Select Industry';
}

if(empty($data['leadsource'])){
  $data['leadsource_err'] = 'Please Select Lead Source';
 }
 
 if(empty($data['phone'])){
  $data['phone_err'] = 'Please Enter Phone Number';
}

if(empty($data['noofemp'])){
  $data['noofemp_err'] = 'Please Enter Number of Employee';
 }
 if(empty($data['mobile'])){
  $data['mobile_err'] = 'Please Enter Mobile Number';
 }
 
if(empty($data['email'])){
 $data['email_err'] = 'Please Enter Email';
}

if(empty($data['vertical'])){
 $data['vertical_err'] = 'Please Select Vertical';
}

if(empty($data['oem'])){
 $data['oem_err'] = 'Please Select OEM';
}

if(empty($data['product'])){
  $data['product_err'] = 'Please Enter Product';
 }
  
 if(empty($data['leadstatus'])){
  $data['leadstatus_err'] = 'Please Select Lead Status';
 } 
 
 if(empty($data['closuredate'])){
  $data['closuredate_err'] = 'Please Enter Closure Date';
 }

if(empty($data['salutation_err']) && empty($data['fname_err']) && empty($data['lname_err']) &&  empty($data['title_err']) && empty($data['company_err']) && empty($data['leadsource_err']) && empty($data['vertical_err']) && empty($data['oem_err']) && empty($data['product_err']) && empty($data['closuredate_err'])){
 
    if($this->salesModel->Insertlead($data))
    {
      
    }
   flash('lead_success', 'Lead Added Successfully');  
   redirect('sales/lead_master');
     

 } 
else {
 // Load view with errors
 $this->view('saleshead/lead_master', $data);
}       

} else {
$data =[
  'leadowner' => '',     
  'salutation' =>'',     
  'fname' => '',     
  'lname' =>'',     
  'title' => '',     
  'company' => '',     
  'website' => '',
  'industry' =>'',     
  'leadsource' => '',     
  'phone' => '',     
  'noofemp' => '',     
  'mobile' => '',     
  'email' => '', 
  'vertical' => '',
  'verticalother' => '',  
  'oem' => '',  
  'oemother' => '',  
  'product' => '',  
  'leadstatus' => '',     
  'assignee' => '',  
  'ordervalue' => '',      
  'closuredate' => '',      
  'leadstatus_err' => '',         
  'leadowner_err' => '',
  'salutation_err' => '',
  'fname_err' => '',         
  'mname_err' => '',         
  'lname_err' => '',         
  'title_err' => '',         
  'company_err' => '',         
  'website_err' => '',         
  'email_err' => '',         
  'vertical_err' => '',         
  'oem_err' => '',         
  'product_err' => '',         
  'industy_err' => '',
  'phone_err' => '', 
  'noofemp_err' => '',         
  'mobile_err' => '',         
  'leadsource_err' => '',
  'leadstatus_err' => '',
  'assign_err' => '',
  'ordervalue_err' => '',
  'closuredate_err' => ''
  
];

$data['assignee'] = $this->leadModel->getallassignee();
$data['oemmaster'] = $this->leadModel->getalloemmaster();
$data['vertical'] = $this->leadModel->getallvertical();
$data['industry'] = $this->leadModel->getallIndustry();
// Load view
$this->view('saleshead/lead_master', $data);
}

}
//----------------------------------------------------------------------------------------
public function assignedto($id)
{
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		$data = [
		'id' => $id,
		'users' => trim($_POST['users'])
		];
		if($this->salesModel->assigneetoagent($data))
		{
        $data['leadlist'] = $this->leadModel->getsalesleadlist();
			$this->view('saleshead/leadenquiry',$data);
		}
    
		
	}
	else {
		$assignstatus = $this->salesModel->getassigne($id);
		$data = [
		'id' => $assignstatus->id,
		'lead_id' => $assignstatus->lead_id
		];
		$data['users'] = $this->salesModel->getalllusers();
		$this->view('saleshead/assigneeto',$data);
	}
}

//--------------------------------------------------------------------------------------------------------
public function allleadlist() 
{
	$data['emailtolead'] = $this->salesModel->getallemailtolead();
	$data['leadlist'] = $this->salesModel->getallleadlist();
	$this->view('saleshead/leadlist', $data);
}

public function customerleadlist(){
	$oem = $_SESSION['id'];
	$data['leadlist'] = $this->salesModel->getleadlist($oem);         
   $this->view('saleshead/leadlist',$data);
	
}

public function quatation()
{
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

$data =[
 'leadowner' => trim($_POST['leadowner']), 
 'salutation' => trim($_POST['salutation']),
 'fname' => trim($_POST['fname']),
 'lname' => trim($_POST['lname']),
 'title' => trim($_POST['title']),
 'company' => trim($_POST['company']), 
 'website' => trim($_POST['website']), 
 'leadowner_err' => '',         
 'salutation_err' => '',
 'fname_err' => '',
 'lname_err' => '',         
 'title_err' => '',
 'company_err' => '',
 'ordervalue_err' => '' 
];

if(empty($data['salutation'])){
 $data['salutation_err'] = 'Please Select Salutation';
}
if(empty($data['fname'])){
 $data['fname_err'] = 'Please enter First Name';
}
if(empty($data['lname'])){
 $data['lname_err'] = 'Please enter Last Name';
}
if(empty($data['title'])){
 $data['title_err'] = 'Please enter Title';
}
if(empty($data['company'])){
 $data['company_err'] = 'Please enter Company';
}

if(empty($data['website'])){
 $data['website_err'] = 'Please Enter Website';
}

if(empty($data['industry'])){
 $data['industry_err'] = 'Please Select Industry';
}

if(empty($data['leadsource'])){
  $data['leadsource_err'] = 'Please Select Lead Source';
 }

if(empty($data['salutation_err']) && empty($data['fname_err']) && empty($data['lname_err']) &&  empty($data['title_err'])){
 
    if($this->leadModel->Insertlead($data))
    {
      
    }
   flash('lead_success', 'Lead Added Successfully');  
   redirect('clients/clientlist');
     

 } 
else {
 // Load view with errors
 $this->view('clients/client_master', $data);
}       

} else {
$data =[
  'leadowner' => '',     
  'salutation' =>'',     
  'fname' => '',     
  'lname' =>'',     
  'title' => '',     
  'company' => '',     
  'website' => '',
  'industry' =>'',     
  'leadsource' => '',     
  'phone' => '',     
  'noofemp' => '',     
  'mobile' => '',
  'leadstatus_err' => '',
  'assign_err' => '',
  'ordervalue_err' => ''
  
];
$data['assignee'] = $this->leadModel->getallassignee();
$data['oemmaster'] = $this->leadModel->getalloemmaster();
$data['vertical'] = $this->leadModel->getallvertical();
$data['industry'] = $this->leadModel->getallIndustry();
// Load view
$this->view('lead/lead_master', $data);
}
}

public function leadlist(){
   $data['leadlist'] = $this->leadModel->getleadlist(); 
   
   $this->view('lead/leadlist',$data);
 }
 public function salesleadlist(){
   $sales = $_SESSION['email'];
   
   $data['leadlist'] = $this->leadModel->getsalesleadlist($sales); 
   
   $this->view('lead/leadlist',$data);
 }

//---------------------------------------------------------------------------------------------------------------
public function leadedit($id){
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $data =[
	'id' => $id,
 'leadowner' => trim($_POST['leadowner']), 
 'salutation' => trim($_POST['salutation']),
 'fname' => trim($_POST['fname']),
 'lname' => trim($_POST['lname']),
 'title' => trim($_POST['title']),
 'company' => trim($_POST['company']), 
 'website' => trim($_POST['website']), 
 'industry' => trim($_POST['industry']),
 'other' => trim($_POST['other']),
 'leadsource'=> trim($_POST['leadsource']),  
 'other1'=> trim($_POST['other1']),  
 'phone' => trim($_POST['phone']),  
 'noofemp' => trim($_POST['noofemp']), 
 'mobile'=> implode(",", $_POST['mobile']),  
 'email' => implode(",", $_POST['email']),
 'vertical' => trim($_POST['vertical']),
 'verticalother' => trim($_POST['verticalother']),
 'oem' => trim($_POST['oem']),
 'oemother' => trim($_POST['oemother']),
 'product' => trim($_POST['product']),  
 'leadstatus' => trim($_POST['leadstatus']),
 'assignee' => trim($_POST['assignee']),
 'ordervalue' => trim($_POST['ordervalue']),
 'closuredate' => trim($_POST['closuredate']),
 'leadowner_err' => '',         
 'salutation_err' => '',
 'fname_err' => '',
 'lname_err' => '',         
 'title_err' => '',
 'company_err' => '', 
 'website_err' => '',         
 'industy_err' => '',
 'leadsource_err' => '',
 'phone_err' => '',
 'noofemp_err' => '',                   
 'mobile_err' => '',
 'email_err' => '', 
 'vertical_err' => '',
 'oem_err' => '',
 'product_err' => '', 
 'rating_err' => '',                   
 'assign_err' => '',
 'ordervalue_err' => '', 
 'closuredate_err' => '' 
];

if(empty($data['salutation'])){
 $data['salutation_err'] = 'Please Select Salutation';
}
if(empty($data['fname'])){
 $data['fname_err'] = 'Please enter First Name';
}
if(empty($data['lname'])){
 $data['lname_err'] = 'Please enter Last Name';
}
if(empty($data['title'])){
 $data['title_err'] = 'Please enter Title';
}
if(empty($data['company'])){
 $data['company_err'] = 'Please enter Company';
}

if(empty($data['website'])){
 $data['website_err'] = 'Please Enter Website';
}

if(empty($data['industry'])){
 $data['industry_err'] = 'Please Select Industry';
}

if(empty($data['leadsource'])){
  $data['leadsource_err'] = 'Please Select Lead Source';
 }
 
 if(empty($data['phone'])){
  $data['phone_err'] = 'Please Enter Phone Number';
}

if(empty($data['noofemp'])){
  $data['noofemp_err'] = 'Please Enter Number of Employee';
 }
 if(empty($data['mobile'])){
  $data['mobile_err'] = 'Please Enter Mobile Number';
 }
 
if(empty($data['email'])){
 $data['email_err'] = 'Please Enter Email';
}

if(empty($data['vertical'])){
 $data['vertical_err'] = 'Please Select Vertical';
}

if(empty($data['oem'])){
 $data['oem_err'] = 'Please Select OEM';
}

if(empty($data['product'])){
  $data['product_err'] = 'Please Enter Product';
 }
  
 if(empty($data['leadstatus'])){
  $data['leadstatus_err'] = 'Please Select Lead Status';
 }
 if(empty($data['closuredate'])){
  $data['closuredate_err'] = 'Please Enter Closure Date';
 }

if(empty($data['salutation_err']) && empty($data['fname_err']) && empty($data['lname_err']) &&  empty($data['title_err']) && empty($data['company_err']) && empty($data['leadsource_err']) && empty($data['vertical_err']) && empty($data['oem_err']) && empty($data['product_err']) && empty($data['closuredate_err'])){
      // Validated
	   
      if($this->leadModel->updateLead($data)){
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
    
    $lead = $this->leadModel->getLeadById($id);
	// Check for owner
  $data = [
	  'id' => $lead->id,
      'leadowner' => $lead->leadowner,
      'salutation' => $lead->salutation,
      'fname' => $lead->fname,
      'lname' => $lead->lname,
      'title' => $lead->title,
      'company' => $lead->company,
	  'website' => $lead->website,
      'industry' => $lead->industry,
      'other' => $lead->other,
      'leadsource' =>$lead->leadsource,
      'other1' =>$lead->other1,
	  'phone' =>$lead->phone,
	  'noofemp' =>$lead->noofemp,
	  'mobile' =>explode("," ,$lead->mobile),
	  'email' =>explode("," ,$lead->email),
	  'vertical' =>$lead->vertical,
	  'verticalother' =>$lead->verticalother,
	  'leadstatus' =>$lead->leadstatus,
	  'oem' =>$lead->oem,
	  'oemother' =>$lead->oemother,
	  'product' =>$lead->product,
	  'assignee' =>$lead->assignee,
	  'ordervalue' =>$lead->ordervalue,
	  'closuredate' =>$lead->closuredate,
	  
    ];
	$data['assignee1'] = $this->leadModel->getallassignee();
    $this->view('lead/leadedit', $data);
  }
}
public function leadupdate($id)
{
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

$data =[
 'lead_id' => trim($_POST['lead_id']),
 'actiontaken' => trim($_POST['actiontaken']), 
 'nextaction' => trim($_POST['nextaction']),
 'nextactiondate' => trim($_POST['nextactiondate']),
 'actiontaken_err' => '',         
 'nextaction_err' => '',
 'nextactiondate_err' => '' 
];
if(empty($data['actiontaken'])){
 $data['actiontaken_err'] = 'Please Select Salutation';
}
if(empty($data['nextaction'])){
 $data['nextaction_err'] = 'Please enter First Name';
}
if(empty($data['nextactiondate'])){
 $data['nextactiondate_err'] = 'Please enter Last Name';
}
if(empty($data['actiontaken_err']) && empty($data['nextaction_err']) && empty($data['nextactiondate_err'])){
 
    if($this->leadModel->Insertstatus($data))
    {
      
    }
   flash('lead_success', 'Lead Status Added Successfully');  
   redirect('leads/leadlist');
     

 } 
else {
 // Load view with errors
 $this->view('clients/client_master', $data);
}       

} else {
$lead = $this->leadModel->getLeadById($id);
	// Check for owner
  $data = [
	  'id' => $lead->id,	
	  'lead_id' => $lead->lead_id
	  
    ];
	$data['updatelist'] = $this->leadModel->getupdatelist($id);
	
$data['actiontaken'] = $this->leadModel->getactiontaken();
$this->view('lead/lead_update', $data);
}
}
//--------------------------------------------------------------------------------------------------------------------
public function alertnext()
{
	
}


public function leadstatus()
{
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

$data =[
 'lead_id' => trim($_POST['lead_id']),
 'actiontaken' => trim($_POST['actiontaken']), 
 'nextaction' => trim($_POST['nextaction']),
 'nextactiondate' => trim($_POST['nextactiondate']),
 'actiontaken_err' => '',         
 'nextaction_err' => '',
 'nextactiondate_err' => '' 
];
if(empty($data['actiontaken'])){
 $data['actiontaken_err'] = 'Please Select Salutation';
}
if(empty($data['nextaction'])){
 $data['nextaction_err'] = 'Please enter First Name';
}
if(empty($data['nextactiondate'])){
 $data['nextactiondate_err'] = 'Please enter Last Name';
}
if(empty($data['actiontaken_err']) && empty($data['nextaction_err']) && empty($data['nextactiondate_err'])){
 
    if($this->leadModel->Insertstatus($data))
    {
      
    }
   flash('lead_success', 'Lead Status Added Successfully');  
   redirect('leads/leadlist');
     

 } 
else {
 // Load view with errors
 $this->view('clients/client_master', $data);
}       

} else {
	$username = $_SESSION['username'];
 $data['leadlist'] = $this->leadModel->getadminleadlist(); 
$this->view('lead/lead_status', $data);
}
}

public function leadclose($id)
{
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

$data =[
'id' => $id,
 'lead_id' => trim($_POST['lead_id']),
 'leadowner' => trim($_POST['leadowner']),
 'lname' => trim($_POST['lname']),
 'company' => trim($_POST['company']),
 'industry' => trim($_POST['industry']),
 'leadsource' => trim($_POST['leadsource']),
 'product' => trim($_POST['product']),
 'ordervalue' => trim($_POST['ordervalue']),
 'closedate' => trim($_POST['closedate']), 
 'closecommit' => trim($_POST['closecommit']), 
 'closereason' => trim($_POST['closereason']),
 'status' => trim($_POST['status']),
 'closedate_err' => '',         
 'closecommit_err' => '',         
 'closereason_err' => ''
];
$status = trim($_POST['status']);
if(empty($data['closedate'])){
 $data['closedate_err'] = 'Please Enter Close Date';
}
if(empty($data['closereason'])){
 $data['closereason_err'] = 'Please enter First Name';
}

if(empty($data['closedate_err']) && empty($data['closecommit_err']) && empty($data['closereason_err'])){
	
	if($this->leadModel->updateleadtable($data))
	  {
		  
	  }
    if($this->leadModel->leadclose($data))
	{
	  
    }
	
   flash('lead_success', 'Lead Status Added Successfully');  
   redirect('leads/leadlist');
     

 } 
else {
 // Load view with errors
 $this->view('clients/client_master', $data);
}       

} else {
 $lead = $this->leadModel->getLeadById($id);
	// Check for owner
  $data = [
	  'id' => $lead->id,
	  'lead_id' => $lead->lead_id,
      'leadowner' => $lead->leadowner,
      'salutation' => $lead->salutation,
      'fname' => $lead->fname,
      'lname' => $lead->lname,
      'title' => $lead->title,
      'company' => $lead->company,
	  'website' => $lead->website,
      'industry' => $lead->industry,
      'other' => $lead->other,
      'leadsource' =>$lead->leadsource,
      'other1' =>$lead->other1,
	  'phone' =>$lead->phone,
	  'noofemp' =>$lead->noofemp,
	  'mobile' =>explode("," ,$lead->mobile),
	  'email' =>explode("," ,$lead->email),
	  'vertical' =>$lead->vertical,
	  'verticalother' =>$lead->verticalother,
	  'leadstatus' =>$lead->leadstatus,
	  'oem' =>$lead->oem,
	  'oemother' =>$lead->oemother,
	  'product' =>$lead->product,
	  'assignee' =>$lead->assignee,
	  'ordervalue' =>$lead->ordervalue,
	  'closedate_err' => '',
	  'closereason_err' => '',
	  'closecommit_err' => ''
	  
    ]; 
	
$this->view('lead/lead_close', $data);
}
}

public function leaddrop($id)
{
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

$data =[
'id' => $id,
 'lead_id' => trim($_POST['lead_id']),
 'leadowner' => trim($_POST['leadowner']),
 'lname' => trim($_POST['lname']),
 'company' => trim($_POST['company']),
 'industry' => trim($_POST['industry']),
 'leadsource' => trim($_POST['leadsource']),
 'product' => trim($_POST['product']),
 'ordervalue' => trim($_POST['ordervalue']),
 'dropdate' => trim($_POST['dropdate']), 
 'dropreason' => trim($_POST['dropreason']),
 'status' => trim($_POST['status']),
 'dropdate_err' => '',         
 'dropreason_err' => ''
];
$status = trim($_POST['status']);
if(empty($data['dropdate'])){
 $data['dropdate_err'] = 'Please Enter Drop Date';
}
if(empty($data['dropreason'])){
 $data['dropreason_err'] = 'Please enter Drop Reason';
}

if(empty($data['dropdate_err']) && empty($data['dropreason_err'])){
	
	if($this->leadModel->updateleadtable($data))
	  {
		  
	  }
    if($this->leadModel->leaddrop($data))
	{
	  
    }
	
   flash('lead_success', 'Lead Status Added Successfully');  
   redirect('Leads/leadstatus');
     

 } 
else {
 // Load view with errors
 $this->view('Leads/leadstatus', $data);
}       

} else {
 $lead = $this->leadModel->getLeadById($id);
	// Check for owner
  $data = [
	  'id' => $lead->id,
	  'lead_id' => $lead->lead_id,
      'leadowner' => $lead->leadowner,
      'salutation' => $lead->salutation,
      'fname' => $lead->fname,
      'lname' => $lead->lname,
      'title' => $lead->title,
      'company' => $lead->company,
	  'website' => $lead->website,
      'industry' => $lead->industry,
      'other' => $lead->other,
      'leadsource' =>$lead->leadsource,
      'other1' =>$lead->other1,
	  'phone' =>$lead->phone,
	  'noofemp' =>$lead->noofemp,
	  'mobile' =>explode("," ,$lead->mobile),
	  'email' =>explode("," ,$lead->email),
	  'vertical' =>$lead->vertical,
	  'verticalother' =>$lead->verticalother,
	  'leadstatus' =>$lead->leadstatus,
	  'oem' =>$lead->oem,
	  'oemother' =>$lead->oemother,
	  'product' =>$lead->product,
	  'assignee' =>$lead->assignee,
	  'ordervalue' =>$lead->ordervalue,
	  'dropdate_err' => '',
	  'dropreason_err' => ''
	  
    ]; 
	
$this->view('lead/lead_drop', $data);
}
}
public function leadlost($id)
{
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

$data =[
'id' => $id,
 'lead_id' => trim($_POST['lead_id']),
 'leadowner' => trim($_POST['leadowner']),
 'lname' => trim($_POST['lname']),
 'company' => trim($_POST['company']),
 'industry' => trim($_POST['industry']),
 'leadsource' => trim($_POST['leadsource']),
 'product' => trim($_POST['product']),
 'ordervalue' => trim($_POST['ordervalue']),
 'lostdate' => trim($_POST['lostdate']), 
 'lostreason' => trim($_POST['lostreason']),
 'losttowhom' => trim($_POST['losttowhom']),
 'status' => trim($_POST['status']),
 'lostdate_err' => '',         
 'lostreason_err' => '',
 'losttowhom_err' => '',
];
$status = trim($_POST['status']);
if(empty($data['lostdate'])){
 $data['lostdate_err'] = 'Please Enter Lost Date';
}
if(empty($data['lostreason'])){
 $data['lostreason_err'] = 'Please enter Lost Reason';
}
if(empty($data['losttowhom'])){
 $data['losttowhom_err'] = 'Please enter Lost To Whom';
}

if(empty($data['lostdate_err']) && empty($data['lostreason_err']) && empty($data['losttowhom_err'])){
	
	if($this->leadModel->updateleadtable($data))
	  {
		  
	  }
    if($this->leadModel->leadlost($data))
	{
	  
    }
	
   flash('lead_success', 'Lead Status Added Successfully');  
   redirect('Leads/leadstatus');
     

 } 
else {
 // Load view with errors
 $this->view('Leads/leadstatus', $data);
}       

} else {
 $lead = $this->leadModel->getLeadById($id);
	// Check for owner
  $data = [
	  'id' => $lead->id,
	  'lead_id' => $lead->lead_id,
      'leadowner' => $lead->leadowner,
      'salutation' => $lead->salutation,
      'fname' => $lead->fname,
      'lname' => $lead->lname,
      'title' => $lead->title,
      'company' => $lead->company,
	  'website' => $lead->website,
      'industry' => $lead->industry,
      'other' => $lead->other,
      'leadsource' =>$lead->leadsource,
      'other1' =>$lead->other1,
	  'phone' =>$lead->phone,
	  'noofemp' =>$lead->noofemp,
	  'mobile' =>explode("," ,$lead->mobile),
	  'email' =>explode("," ,$lead->email),
	  'vertical' =>$lead->vertical,
	  'verticalother' =>$lead->verticalother,
	  'leadstatus' =>$lead->leadstatus,
	  'oem' =>$lead->oem,
	  'oemother' =>$lead->oemother,
	  'product' =>$lead->product,
	  'assignee' =>$lead->assignee,
	  'ordervalue' =>$lead->ordervalue,
	  'dropdate_err' => '',
	  'dropreason_err' => ''
	  
    ]; 
	
$this->view('lead/lead_drop', $data);
}
}

public function leadpostponed($id)
{
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

 $data =[
 'id' => $id,
 'lead_id' => trim($_POST['lead_id']),
 'leadowner' => trim($_POST['leadowner']),
 'lname' => trim($_POST['lname']),
 'company' => trim($_POST['company']),
 'industry' => trim($_POST['industry']),
 'leadsource' => trim($_POST['leadsource']),
 'product' => trim($_POST['product']),
 'ordervalue' => trim($_POST['ordervalue']),
 'postponeddate' => trim($_POST['postponeddate']), 
 'postponedreason' => trim($_POST['postponedreason']),
 'status' => trim($_POST['status']),
 'postponeddate_err' => '',         
 'postponedreason_err' => ''
];
$status = trim($_POST['status']);
if(empty($data['postponeddate'])){
 $data['postponeddate_err'] = 'Please Enter Lost Date';
}
if(empty($data['postponedreason'])){
 $data['lostreason_err'] = 'Please enter Lost Reason';
}
if(empty($data['postponeddate_err']) && empty($data['postponedreason_err'])){
	
	if($this->leadModel->updateleadtable($data))
	  {
		  
	  }
    if($this->leadModel->leadpostponed($data))
	{
	  
    }
	
   flash('lead_success', 'Lead Status Added Successfully');  
   redirect('Leads/leadstatus');
     

 } 
else {
 // Load view with errors
 $this->view('Leads/leadstatus', $data);
}       

} else {
 $lead = $this->leadModel->getLeadById($id);
	// Check for owner
  $data = [
	  'id' => $lead->id,
	  'lead_id' => $lead->lead_id,
      'leadowner' => $lead->leadowner,
      'salutation' => $lead->salutation,
      'fname' => $lead->fname,
      'lname' => $lead->lname,
      'title' => $lead->title,
      'company' => $lead->company,
	  'website' => $lead->website,
      'industry' => $lead->industry,
      'other' => $lead->other,
      'leadsource' =>$lead->leadsource,
      'other1' =>$lead->other1,
	  'phone' =>$lead->phone,
	  'noofemp' =>$lead->noofemp,
	  'mobile' =>explode("," ,$lead->mobile),
	  'email' =>explode("," ,$lead->email),
	  'vertical' =>$lead->vertical,
	  'verticalother' =>$lead->verticalother,
	  'leadstatus' =>$lead->leadstatus,
	  'oem' =>$lead->oem,
	  'oemother' =>$lead->oemother,
	  'product' =>$lead->product,
	  'assignee' =>$lead->assignee,
	  'ordervalue' =>$lead->ordervalue,
	  'postponeddate_err' => '',
	  'postponedreason_err' => ''
	  
    ]; 
	
$this->view('lead/lead_postponed', $data);
}
}
//-------------------------------------------------------------------------------------------------------------------
public function wonlist_head()
{
 
  $data['payment'] = $this->leadModel->getwonlist();
  $this->view('Saleshead/wonlist',$data);
}
//-------------------------------------------------------------------------------------------------------------
public function droplist_head()
{
 $email=$_SESSION['email'];
  $data['payment'] = $this->leadModel->getdroplist();
  $this->view('Saleshead/droplist',$data);
}
//-------------------------------------------------------------------------------------------------------------
public function lostlist_head()
{
 $email=$_SESSION['email'];
  $data['payment'] = $this->leadModel->getlostlist();
  $this->view('Saleshead/lostlist',$data);
}
//-------------------------------------------------------------------------------------------------------------
public function postponedlist_head()
{
 $email=$_SESSION['email'];
  $data['payment'] = $this->leadModel->getpostlist();
  $this->view('Saleshead/postlist',$data);
}
//----------------------------------------------------------------------------------------------------

public function paymentlist()
{
 $email=$_SESSION['email'];
  $data['payment'] = $this->salesModel->getpaymentlist();
  $this->view('Saleshead/paymentlist',$data);
}
//-------------------------------------------------------------------------------------------------------------
public function paymentclose($id)
{
 $email=$_SESSION['email'];
 $flag="1";
  if($this->salesModel->closepaymentlist($id,$flag)){
     flash('lead_closed', 'Payment closed');  
       redirect('Saleshead/paymentlist');
  }
  
}
//-------------------------------------------------------------------------------------------------------------
public function amclist()
{
 $email=$_SESSION['email'];
  $data['payment'] = $this->salesModel->getamclist();
  $this->view('Saleshead/amclist',$data);
}
//-------------------------------------------------------------------------------------------------------------
public function leadenquiry()
{
   $data['leadlist'] = $this->leadModel->getsalesleadlist();
  // print_r($data);die;
  //$data['payment'] = $this->salesModel->getamclist();
  $this->view('Saleshead/leadenquiry',$data);
}
//-------------------------------------------------------------------------------------------------------------
}



  