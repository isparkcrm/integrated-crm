<?php
	class Leads extends Controller {
    public function __construct(){
      $this->leadModel = $this->model('lead');
	  $this->userModel = $this->model('User');
      $this->campaignModel = $this->model('campaignModel'); 
    }
//----------------------------------------------------------------------------------------------------------------
public function lead_master(){
      
  
if($_SERVER['REQUEST_METHOD'] == 'POST'){

$data =[
 'leadowner' => trim($_POST['leadowner']), 
 'customertype' => trim($_POST['customertype']), 
 'customername' => trim($_POST['customername']),
 'company' => trim($_POST['company']),  
 'industry' => trim($_POST['industry']), 
 'leadsource'=> trim($_POST['leadsource']),  
 'phone' => trim($_POST['phone']),  
 'mobile'=> implode(",", $_POST['mobile']),  
 'email' => implode(",", $_POST['email']),
 'vertical' => trim($_POST['vertical']),
 'oem' => trim($_POST['oem']), 
 'product' => trim($_POST['product']),  
 'leadstatus' => trim($_POST['leadstatus']),
 'assignee' => trim($_POST['assignee']),
 'ordervalue' => trim($_POST['ordervalue']),
 'closuredate' => trim($_POST['closuredate']),
 'paymentperiod' => trim($_POST['paymentperiod']),
 'status' => trim($_POST['status']),
 'leadowner_err' => '',         
  'customertype_err' => '',
 'customername_err' => '',
 'company_err' => '', 
 'industy_err' => '',
 'leadsource_err' => '',
 'phone_err' => '',           
 'mobile_err' => '',
 'email_err' => '', 
 'vertical_err' => '',
 'oem_err' => '',
 'product_err' => '',                 
 'assign_err' => '',
 'ordervalue_err' => '', 
 'closuredate_err' => '' 
];

	
if(empty($data['customername'])){
 $data['customername_err'] = 'Please enter Customer Name';
}
if(empty($data['customertype'])){
 $data['customername_err'] = 'Please enter Customer Type';
}

if(empty($data['company'])){
 $data['company_err'] = 'Please enter Company';
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

if(empty($data['customername_err']) && empty($data['customertype_err']) && empty($data['company_err']) && empty($data['leadsource_err']) && empty($data['vertical_err']) && empty($data['oem_err']) && empty($data['product_err']) && empty($data['closuredate_err'])){
 
    if($this->leadModel->Insertlead($data))
    {
     flash('lead_success', 'Lead Added Successfully');  
   redirect('leads/lead_master'); 
    }
   
     

 } 
else {
 // Load view with errors
 $this->view('lead/lead_master', $data);
}       

} else {
$data =[
  'leadowner' => '',        
  'customername' => '',     
  'company' => '',     
  'industry' =>'',     
  'leadsource' => '',     
  'phone' => '',     
  'mobile' => '',     
  'email' => '', 
  'vertical' => '', 
  'oem' => '',  
  'product' => '',  
  'leadstatus' => '',     
  'assignee' => '',  
  'ordervalue' => '',      
  'closuredate' => '',      
  'leadstatus_err' => '',         
  'customertype_err' => '',             
  'leadowner_err' => '',
  'customername_err' => '',         
  'company_err' => '',         
  'email_err' => '',         
  'vertical_err' => '',         
  'oem_err' => '',         
  'product_err' => '',         
  'industy_err' => '',
  'phone_err' => '', 
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
$this->view('lead/lead_master', $data);
}

}
//---------------------------------------------------------------------------------------------------
public function allleadlist() 
{
	$data['leadlist'] = $this->leadModel->getallleadlist();
	$this->view('lead/leadlist', $data);
}
//---------------------------------------------------------------------------------------------------
public function leadupdatelist($id)
{
	$data['leadhistory'] = $this->leadModel->getleadhistory($id);
	//print_r($data['leadhistory']);die;
	$this->view('saleshead/leadhistory',$data);
}
//---------------------------------------------------------------------------------------------------
public function customerleadlist(){
	$oem = $_SESSION['id'];
	$data['leadlist'] = $this->leadModel->getleadlist($oem);         
   $this->view('lead/leadlist',$data);
	
}
//---------------------------------------------------------------------------------------------------
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
//---------------------------------------------------------------------------------------------------
public function leadlist(){
   $oem = $_SESSION['email'];
   
   $data['leadlist'] = $this->leadModel->getallleadlist(); 
   
   $this->view('lead/leadlist',$data);
 }
 //---------------------------------------------------------------------------------------------------
 public function salesleadlist()
 {
	 $accountmanager = $_SESSION['email'];
	 
	$data['leadlist'] = $this->leadModel->accountmanagerleadlist($accountmanager);
	$data['assigedleads'] = $this->leadModel->accountmanagerassigneedleadlist($accountmanager);
     $this->view('lead/leadlist',$data);
 }
 //---------------------------------------------------------------------------------------------------
 public function salesleadlist_new()
 {
   $accountmanager = $_SESSION['email'];

    $data['commitleadlist'] = $this->leadModel->usercommitlead($accountmanager); 
 $data['upsideleadlist'] = $this->leadModel->userupsidelead($accountmanager); 
 $data['coldleadlist'] = $this->leadModel->usercoldandlead($accountmanager);
  $data['leadleadlist'] = $this->leadModel->userlead($accountmanager);
$data['committotal'] = $this->leadModel->getcommittotal($accountmanager); 
 
     $this->view('lead/leadlist_new',$data);
 }
 //---------------------------------------------------------------------------------------------------
 public function adminleadlist(){
	  $data['commitleadlist'] = $this->leadModel->getcommitlead(); 
 $data['upsideleadlist'] = $this->leadModel->getupsidelead(); 
 $data['coldleadlist'] = $this->leadModel->getcoldandlead();
$data['committotal'] = $this->leadModel->getcommittotal1();     
   $this->view('saleshead/leadlist',$data);
 }
//---------------------------------------------------------------------------------------------------------------
public function onlineleads($id)
{
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	$data = [
	 'id' => $id,
	 'leadowner' => trim($_POST['leadowner']),
	 'customertype' => trim($_POST['customertype']),
	 'customername' => trim($_POST['customername']),
	 'company' => trim($_POST['company']),  
	 'industry' => trim($_POST['industry']),	
	 'leadsource'=> trim($_POST['leadsource']), 	
	 'phone' => trim($_POST['phone']),  
	 'mobile'=> implode(",", $_POST['mobile']),  
	 'email' => implode(",", $_POST['email']),
	 'vertical' => trim($_POST['vertical']),	
	 'oem' => trim($_POST['oem']),
	 'product' => trim($_POST['product']),  
	 'leadstatus' => trim($_POST['leadstatus']),
	 'assignee' => trim($_POST['assignee']),
	 'ordervalue' => trim($_POST['ordervalue']),
	 'closuredate' => trim($_POST['closuredate']),
	 'status' => trim($_POST['status']),
	 'leadowner_err' => '',         
	  'customertype_err' => '',
	 'customername_err' => '',
	 'company_err' => '', 
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
	if(empty($data['customertype'])){
 $data['customertype_err'] = 'Please Select Customer Type';
}
if(empty($data['customername'])){
 $data['customername_err'] = 'Please enter Customer Name';
}
if(empty($data['company'])){
 $data['company_err'] = 'Please enter Company';
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

if(empty($data['customertype_err']) && empty($data['customername_err']) && empty($data['company_err']) && empty($data['leadsource_err']) && empty($data['vertical_err']) && empty($data['oem_err']) && empty($data['product_err']) && empty($data['closuredate_err'])){
      // Validated
	   
      if($this->leadModel->updateLead($data)){
		flash('lead_message', 'Lead updated successfully');
		        redirect('leads/salesleadlist');
      } else {
        die('Something went wrong');
      }
    } else {
      // Load view with errors
      $this->view('lead/leadedit', $data);
    }
	}
	else {
		 $lead = $this->leadModel->getLeadById($id);
 $data = [
	  'id' => $lead->id,
      'leadowner' => $lead->leadowner,
      'customertype' => $lead->customertype,
      'customername' => $lead->customername,
      'company' => $lead->company,
      'leadindustry' => $lead->leadindustry,
      'industryname' => $lead->industryname,
      'leadsource' =>$lead->leadsource,   
	  'phone' =>$lead->phone,
	  'mobile' =>explode("," ,$lead->mobile),
	  'email' =>explode("," ,$lead->email),
	  'verticalname' =>$lead->verticalname,
	  'leadvertical' =>$lead->leadvertical,
	
	  'leadstatus' =>$lead->leadstatus,
	  'oemname' =>$lead->oemname,
	  'leadoem' =>$lead->leadoem,
	  'assignee' =>$lead->assignee,
	 
	  'product' =>$lead->product,
	  'ordervalue' =>$lead->ordervalue,
	  'closuredate' =>$lead->closuredate,
	  'leadowner_err' => '',
	   'customertype_err' => '',
	   'customername_err' => '',
	   'company_err' => '',
	   'industy_err' => '',
	   'leadsource_err' =>'',	 
	   'phone_err' =>'',
	   'mobile_err' =>'',
	   'email_err' =>'',
	   'vertical_err' => '',
	   'oem_err' => '',
	   'product_err' => '',
	   'leadstatus_err' => '',
	   'assign_err' =>'',
	   'ordervalue_err' => '',
	   'closuredate_err' => ''	  
    ];
	$data['assignee']  = $this->leadModel->getallassignee();
	$data['oemmaster'] = $this->leadModel->getalloemmaster();
	$data['vertical']  = $this->leadModel->getallvertical();
	$data['industry']  = $this->leadModel->getallIndustry();
	$this->view('lead/leadedit', $data);
	}
}

//---------------------------------------------------------------------------------------------------

public function leadedit($id){
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $data =[
	'id' => $id,
 'leadowner' => trim($_POST['leadowner']), 
 'customertype' => trim($_POST['customertype']), 
 'customername' => trim($_POST['customername']),
 'company' => trim($_POST['company']),  
 'industry' => trim($_POST['industry']),
 'industryother' => trim($_POST['industryother']),
 'leadsource'=> trim($_POST['leadsource']),  
 'leadsourceother'=> trim($_POST['leadsourceother']),  
 'phone' => trim($_POST['phone']),  
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
  'customertype_err' => '',
 'customername_err' => '',
 'company_err' => '', 
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

if(empty($data['customertype'])){
 $data['customertype_err'] = 'Please Select Customer Type';
}
if(empty($data['customername'])){
 $data['customername_err'] = 'Please enter Customer Name';
}
if(empty($data['company'])){
 $data['company_err'] = 'Please enter Company';
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

if(empty($data['customertype_err']) && empty($data['customername_err']) && empty($data['company_err']) && empty($data['leadsource_err']) && empty($data['vertical_err']) && empty($data['oem_err']) && empty($data['product_err']) && empty($data['closuredate_err'])){
      // Validated
	   
      if($this->leadModel->updateLead($data)){
		flash('lead_message', 'Lead updated successfully');
		        redirect('leads/salesleadlist');
      } else {
        die('Something went wrong');
      }
    } else {
      // Load view with errors
      $this->view('lead/leadedit', $data);
    }

  } else {
    
 $lead = $this->leadModel->getLeadById($id);
 $data = [
	  'id' => $lead->id,
      'leadowner' => $lead->leadowner,
      'customertype' => $lead->customertype,
      'customername' => $lead->customername,
      'company' => $lead->company,
      'leadindustry' => $lead->leadindustry,
      'industryname' => $lead->industryname,
      'industryother' => $lead->industryother,
      'leadsource' =>$lead->leadsource,
      'leadsourceother' =>$lead->leadsourceother,
	  'phone' =>$lead->phone,
	  'mobile' =>explode("," ,$lead->mobile),
	  'email' =>explode("," ,$lead->email),
	  'leadvertical' =>$lead->leadvertical,
	  'verticalother' =>$lead->verticalother,
	  'leadstatus' =>$lead->leadstatus,
	  'leadoem' =>$lead->leadoem,
	  'assignee' =>$lead->assignee,
	  'oemother' =>$lead->oemother,
	  'product' =>$lead->product,
	  'ordervalue' =>$lead->ordervalue,
	  'closuredate' =>$lead->closuredate,
	  'leadowner_err' => '',
	   'customertype_err' => '',
	   'customername_err' => '',
	   'company_err' => '',
	   'industy_err' => '',
	   'leadsource_err' =>'',
	   'indusryother' =>'',
	   'phone_err' =>'',
	   'mobile_err' =>'',
	   'email_err' =>'',
	   'vertical_err' => '',
	   'oem_err' => '',
	   'product_err' => '',
	   'leadstatus_err' => '',
	   'assign_err' =>'',
	   'ordervalue_err' => '',
	   'closuredate_err' => ''	  
    ];
	$data['assignee']  = $this->leadModel->getallassignee();
	$data['oemmaster'] = $this->leadModel->getalloemmaster();
	$data['vertical']  = $this->leadModel->getallvertical();
	$data['industry']  = $this->leadModel->getallIndustry();
	$this->view('lead/leadedit', $data);
  }
}
//---------------------------------------------------------------------------------------------------
public function onlineleadedit($id)
{
	
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $data =[
	'id' => $id,
 'leadowner' => trim($_POST['leadowner']), 
 'customertype' => trim($_POST['customertype']), 
 'customername' => trim($_POST['customername']),
 'company' => trim($_POST['company']),  
 'industry' => trim($_POST['industry']), 
 'leadsource'=> trim($_POST['leadsource']),  
 'phone' => trim($_POST['phone']),  
 'mobile'=> implode(",", $_POST['mobile']),  
 'email' => implode(",", $_POST['email']),
 'vertical' => trim($_POST['vertical']), 
 'oem' => trim($_POST['oem']), 
 'product' => trim($_POST['product']),  
 'leadstatus' => trim($_POST['leadstatus']),
 'assignee' => trim($_POST['assignee']),
 'ordervalue' => trim($_POST['ordervalue']),
 'closuredate' => trim($_POST['closuredate']),
 'status' => trim($_POST['status']),
 'leadowner_err' => '',         
  'customertype_err' => '',
 'customername_err' => '',
 'company_err' => '', 
 'industy_err' => '',
 'leadsource_err' => '',
 'phone_err' => '',
 'noofemp_err' => '',                   
 'mobile_err' => '',
 'email_err' => '', 
 'vertical_err' => '',
 'oem_err' => '',
 'product_err' => '', 
 'leadstatus_err' => '',                
 'assign_err' => '',
 'ordervalue_err' => '', 
 'closuredate_err' => ''  
];

if(empty($data['customertype'])){
 $data['customertype_err'] = 'Please Select Customer Type';
}
if(empty($data['customername'])){
 $data['customername_err'] = 'Please enter Customer Name';
}
if(empty($data['company'])){
 $data['company_err'] = 'Please enter Company';
}



if(empty($data['leadsource'])){
  $data['leadsource_err'] = 'Please Select Lead Source';
 }
 
 if(empty($data['phone'])){
  $data['phone_err'] = 'Please Enter Phone Number';
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

if(empty($data['customertype_err']) && empty($data['customername_err']) && empty($data['company_err']) && empty($data['leadsource_err']) && empty($data['vertical_err']) && empty($data['oem_err']) && empty($data['product_err'])){
      // Validated
	   
      if($this->leadModel->updateLead($data)){
		flash('lead_message', 'Lead updated successfully');
		        redirect('leads/salesleadlist_new');
      } else {
        die('Something went wrong');
      }
    } else {
      // Load view with errors
      $this->view('lead/leadedit', $data);
    }

  } else {
    
 $lead = $this->leadModel->getonlineLeadById($id);
 $data = [
	  'id' => $lead->id,
      'customertype' => $lead->customertype,
      'customername' => $lead->customername,
      'leadowner' => $lead->leadowner,
      'company' => $lead->company,
      'leadindustry' => $lead->leadindustry,
      'leadsource' =>$lead->leadsource,    
	  'phone' =>$lead->phone,
	  'mobile' =>explode("," ,$lead->mobile),
	  'email' =>explode("," ,$lead->email),
	  'leadstatus' =>$lead->leadstatus,
     'oem' =>$lead->leadoem,
      'leadvertical' =>$lead->leadvertical,
	  'assignees' =>$lead->assignee,
	  'product' =>$lead->product,
	  'ordervalue' =>$lead->ordervalue,
	  'closuredate' =>$lead->closuredate,
	  'leadowner_err' => '',
	   'customertype_err' => '',
	   'customername_err' => '',
	   'company_err' => '',
	   'industy_err' => '',
	   'leadsource_err' =>'',	 
	   'phone_err' =>'',
	   'mobile_err' =>'',
	   'email_err' =>'',
	   'vertical_err' => '',
	   'oem_err' => '',
	   'product_err' => '',
	   'leadstatus_err' => '',
	   'assign_err' =>'',
	   'ordervalue_err' => '',
	   'closuredate_err' => ''	  
    ];

    //print_r($data['vertical']);die;
	$data['assignee']  = $this->leadModel->getallassignee();
	$data['oemmaster'] = $this->leadModel->getalloemmaster();
	$data['vertical']  = $this->leadModel->getallvertical();
	$data['industry']  = $this->leadModel->getallIndustry();
	$this->view('lead/onlineleadedit', $data);
  }
}
//---------------------------------------------------------------------------------------------------
public function leadupdate($id)
{
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

$data =[

  'id' => $id,
  'customername' => trim($_POST['customername']),
 'company' => trim($_POST['company']),  
 'industry' => trim($_POST['industry']), 
 'leadsource'=> trim($_POST['source']),  
 'phone' => trim($_POST['phone']),  
 'mobile'=> implode(",", $_POST['mobile']),  
 'email' => implode(",", $_POST['email']),
 'vertical' => trim($_POST['vertical']), 
 'oem' => trim($_POST['oem']), 
 'product' => trim($_POST['product']),  
 'leadstatus' => trim($_POST['leadstatus']),
 'assignee' => trim($_POST['assignee']),
 'ordervalue' => trim($_POST['ordervalue']),
 'closuredate' => trim($_POST['closuredate']),
 'status' => trim($_POST['status']),
  'created_at' => trim($_POST['created_at']),
 'lead_id' => trim($_POST['lead_id']),
 'actiontaken' => trim($_POST['actiontaken']), 
 'nextaction' => trim($_POST['nextaction']),
 'nextactiondate' => trim($_POST['nextactiondate'])
];

   if($this->leadModel->Insertstatus($data))
    {
    flash('lead_success', 'Lead Status Added Successfully');  
  redirect('leads/salesleadlist_new');
    }
	
}

else {
$lead = $this->leadModel->getLeadById($id);
	 
  $data = [
	  'id' => $lead->id,
    'lead_id' => $lead->lead_id,
      'customertype' => $lead->customertype,
      'customername' => $lead->customername,
      'leadowner' => $lead->leadowner,
      'company' => $lead->company,
      'leadindustry' => $lead->leadindustry,
      'leadsource' =>$lead->leadsource,    
    'phone' =>$lead->phone,
    'mobile' =>explode("," ,$lead->mobile),
    'email' =>explode("," ,$lead->email),
    'leadstatus' =>$lead->leadstatus,
     'oem' =>$lead->leadoem,
      'leadvertical' =>$lead->leadvertical,
    'assignee' =>$lead->assignee,
    'product' =>$lead->product,
    'ordervalue' =>$lead->ordervalue,
    'closuredate' =>$lead->closuredate,  
    'status' =>$lead->status, 
     'created_at' =>$lead->created_at
	]; 
	
  $data['updatelist'] = $this->leadModel->getupdatelist($data['lead_id']);
	
$data['actiontaken'] = $this->leadModel->getactiontaken();
$this->view('lead/lead_update', $data);
}
}
//--------------------------------------------------------------------------------------------------------------------
public function notification()
{
	$allnotification = $this->leadModel->allnotification();
	
	$data = [
		'allnotification' => $allnotification
	  ];
	  $data['getallclosedorder'] = $this->leadModel->getallclosedorder();
	  
	$this->view('lead/notification',$data);
}
//---------------------------------------------------------------------------------------------------
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
 $this->view('lead/lead_status', $data);
}       

} else {
	$username = $_SESSION['id'];
	$role = $_SESSION['role'];
	if($role == 'Sales Head') 
	{
		$data['commitleadlist'] = $this->leadModel->getcommitleadlist(); 
		$this->view('saleshead/lead_status', $data);
	}
	else {
	$accountmanager = $_SESSION['email'];
		
 $data['commitleadlist'] = $this->leadModel->usercommitlead($accountmanager); 
 $data['upsideleadlist'] = $this->leadModel->userupsidelead($accountmanager); 
 $data['coldleadlist'] = $this->leadModel->usercoldandlead($accountmanager);
  $data['leadleadlist'] = $this->leadModel->userlead($accountmanager);
$this->view('lead/lead_status', $data);
}
}
}
//---------------------------------------------------------------------------------------------------
public function overallleadlist()
{
	$data['commitlead'] = $this->leadModel->getcommitlead();
	$data['upsidelead'] = $this->leadModel->getupsidelead();
	$data['coldandlead'] = $this->leadModel->getcoldandlead();
	$this->view('Saleshead/overallleadlist',$data);
}
//---------------------------------------------------------------------------------------------------
public function leadclose($id)
{
  if($_SERVER['REQUEST_METHOD'] == 'POST'){

$data =[
'id' => $id,
 'lead_id' => trim($_POST['lead_id']), 
 'customername' => trim($_POST['customername']),
 'company' => trim($_POST['company']),
 'industry' => trim($_POST['industry']),
 'leadsource' => trim($_POST['source']),
  'mobile'=> implode(",", $_POST['mobile']),  
 'email' => implode(",", $_POST['email']),
  'vertical' => trim($_POST['vertical']),
  'oem' => trim($_POST['oem']),
 'product' => trim($_POST['product']),
 'ordervalue' => trim($_POST['ordervalue']),
 'created_at' => trim($_POST['created_at']), 
 'assignee' => trim($_POST['assignee']), 
 'confirmation' => trim($_POST['confirmation']), 
 'closure_value' => trim($_POST['closure_value']),
 'payment' => trim($_POST['payment']),
 'status' => trim($_POST['status']),
 'info' => trim($_POST['info']),
 'date1' => trim($_POST['date1']),
 'date2' => trim($_POST['date2']),
 'closedvalue_err' => '',         
 'confirmation_err' => '',         
 'payment_err' => ''
];
$status = trim($_POST['status']);
if(empty($data['closedate'])){
 $data['closedate_err'] = 'Please Enter Close Date';
}
if(empty($data['closereason'])){
 $data['closereason_err'] = 'Please enter First Name';
}

if(empty($data['closedvalue_err']) && empty($data['confirmation_err']) && empty($data['payment
  _err'])){
  if($data['info']=="no"){
  
  if($this->leadModel->updateleadtable($data))
    {
      if($this->leadModel->leadclose($data))
  
  
   flash('lead_success', 'Lead Status Added Successfully');  
   redirect('leads/salesleadlist_new'); 
    }
   }
   else{

    if($this->leadModel->updateleadtable($data))
    {
      if($this->leadModel->leadclose($data))
        $this->leadModel->AmcMaster($data)  ;
   flash('lead_success', 'Lead closed Successfully');  
   redirect('leads/salesleadlist_new'); 
    }
   }
     

 } 
  
else {
 // Load view with errors
 $this->view('lead/lead_close', $data);
}       

} else {
 $lead = $this->leadModel->getCloseLeadById($id);
  // Check for owner
  $data = [
    'id' => $lead->id,
    'lead_id' => $lead->lead_id,     
      'customername' => $lead->customername,
      'company' => $lead->company,
      'industry' => $lead->industry,     
      'leadsource' =>$lead->leadsource, 
    'mobile' =>explode("," ,$lead->mobile),
    'email' =>explode("," ,$lead->email),
    'vertical' =>$lead->vertical, 
    'oem' =>$lead->oem,   
    'product' =>$lead->product,
    'assignee' =>$lead->assignee,
    'ordervalue' =>$lead->ordervalue,
    'created_at' =>$lead->created_at,
    'closedvalue_err' => '',         
 'confirmation_err' => '',         
 'payment_err' => ''
    
    ]; 
  
$this->view('lead/lead_close', $data);
}
}
//---------------------------------------------------------------------------------------------------
public function leaddrop($id)
{
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

$data =[
'id' => $id,
 'lead_id' => trim($_POST['lead_id']), 
 'customername' => trim($_POST['customername']),
 'company' => trim($_POST['company']),
 'product' => trim($_POST['product']),
 'ordervalue' => trim($_POST['ordervalue']), 
  'assignee' => trim($_POST['assignee']), 
 'dropreason' => trim($_POST['dropreason']),
 'status' => trim($_POST['status']),
         
 'dropreason_err' => ''
];
$status = trim($_POST['status']);

if(empty($data['dropreason'])){
 $data['dropreason_err'] = 'Please enter Drop Reason';
}

if(empty($data['dropreason_err'])){
	
	if($this->leadModel->updateleadtable($data))
	  {
		$this->leadModel->leaddrop($data);
    flash('lead_success', 'Lead Status Added Successfully');  
   redirect('Leads/leadstatus'); 
	  }   

 } 
else {
 // Load view with errors
 $this->view('Leads/leadstatus', $data);
}       

} else {
 $lead = $this->leadModel->getCloseLeadById($id);
	// Check for owner
  $data = [
	  'id' => $lead->id,
	  'lead_id' => $lead->lead_id,
      'leadowner' => $lead->leadowner,
      'customertype' => $lead->customertype,
      'customername' => $lead->customername,
      'company' => $lead->company,
	  'industry' => $lead->industry,     
      'leadsource' =>$lead->leadsource,     
	  'phone' =>$lead->phone,
	  'mobile' =>explode("," ,$lead->mobile),
	  'email' =>explode("," ,$lead->email),
	  'vertical' =>$lead->vertical,	  
	  'leadstatus' =>$lead->leadstatus,
	  'oem' =>$lead->oem,	 
	  'product' =>$lead->product,
	  'assignee' =>$lead->assignee,
	  'ordervalue' =>$lead->ordervalue,
	  'dropdate_err' => '',
	  'dropreason_err' => ''
	  
    ]; 
	
$this->view('lead/lead_drop', $data);
}
}

//-----------------------------------------------------

public function leaddelete($id)
{
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

$data =[
'id' => $id,
 'lead_id' => trim($_POST['lead_id']), 
 'customername' => trim($_POST['customername']),
 'company' => trim($_POST['company']),
 'product' => trim($_POST['product']),
 'ordervalue' => trim($_POST['ordervalue']), 
  'assignee' => trim($_POST['assignee']), 
 'deletereason' => trim($_POST['deletereason']),
 'status' => trim($_POST['status']),
         
 'deletereason_err' => ''
];
$status = trim($_POST['status']);

if(empty($data['deletereason'])){
 $data['deletereason_err'] = 'Please enter Drop Reason';
}

if(empty($data['deletereason_err'])){
	
	if($this->leadModel->deleteleadtable($data))
	  {
		$this->leadModel->leaddelete($data);
    flash('lead_success', 'Lead Status Added Successfully');  
   redirect('Leads/salesleadlist_new'); 
	  }   

 } 
else {
 // Load view with errors
 $this->view('Leads/lead_delete', $data);
}       

} else {
 $lead = $this->leadModel->getCloseLeadById($id);
	// Check for owner
  $data = [
	  'id' => $lead->id,
	  'lead_id' => $lead->lead_id,
      'leadowner' => $lead->leadowner,
      'customertype' => $lead->customertype,
      'customername' => $lead->customername,
      'company' => $lead->company,
	  'industry' => $lead->industry,     
      'leadsource' =>$lead->leadsource,     
	  'phone' =>$lead->phone,
	  'mobile' =>explode("," ,$lead->mobile),
	  'email' =>explode("," ,$lead->email),
	  'vertical' =>$lead->vertical,	  
	  'leadstatus' =>$lead->leadstatus,
	  'oem' =>$lead->oem,	 
	  'product' =>$lead->product,
	  'assignee' =>$lead->assignee,
	  'ordervalue' =>$lead->ordervalue,
	  'dropdate_err' => '',
	  'deletereason_err' => ''
	  
    ]; 
	
$this->view('lead/lead_delete', $data);
}
}

//---------------------------------------------------------------------------------------------------
public function leadlost($id)
{
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

$data =[
'id' => $id,
 'lead_id' => trim($_POST['lead_id']), 
 'customername' => trim($_POST['customername']),
 'company' => trim($_POST['company']), 
 'product' => trim($_POST['product']),
 'ordervalue' => trim($_POST['ordervalue']),
 'assignee' => trim($_POST['assignee']), 
 'lostreason' => trim($_POST['lostreason']),
 'losttowhom' => trim($_POST['losttowhom']),
 'status' => trim($_POST['status']),
       
 'lostreason_err' => '',
 'losttowhom_err' => ''
];


if(empty($data['lostreason'])){
 $data['lostreason_err'] = 'Please enter Lost Reason';
}
if(empty($data['losttowhom'])){
 $data['losttowhom_err'] = 'Please enter Lost To Whom';
}

if(empty($data['lostreason_err']) && empty($data['losttowhom_err'])){
	
	if($this->leadModel->updateleadtable($data))
	  {
		 $this->leadModel->leadlost($data) ;
      flash('lead_success', 'Lead Status Added Successfully');  
   redirect('Leads/leadstatus');
	  }
  
 } 
else {
 // Load view with errors
 $this->view('Leads/lead_lost', $data);
}       

} else {
 $lead = $this->leadModel->getCloseLeadById($id);
	// Check for owner
  $data = [
	  'id' => $lead->id,
	  'lead_id' => $lead->lead_id,     
    'customername' => $lead->customername,
	  'company' => $lead->company,	  
	  'vertical' =>$lead->vertical,	 
	  'leadstatus' =>$lead->leadstatus,
	  'oem' =>$lead->oem,	
	  'product' =>$lead->product,
	  'assignee' =>$lead->assignee,
	  'ordervalue' =>$lead->ordervalue,
	  'lostreason_err' => '',
 'losttowhom_err' => ''
	  
    ]; 
	
$this->view('lead/lead_lost', $data);
}
}
//---------------------------------------------------------------------------------------------------
public function commit_lead()
{
	
	$committotal = $this->leadModel->getcommittotal();
	$data = [
	'committotal' => $committotal
	];
	
	$data['commitlead'] = $this->leadModel->getcommitlead();
	
	$this->view('sales/commitlead',$data);
}
//---------------------------------------------------------------------------------------------------
public function upside_lead()
{
	$data['upsidelead'] = $this->leadModel->getupsidelead();
	$data['upsidetotal'] = $this->leadModel->getupsidetotal();
	$this->view('sales/upsidelead',$data);
}
//---------------------------------------------------------------------------------------------------
public function cold_lead()
{
	
	$data['coldandleadtotal'] = $this->leadModel->getcoldandleadtotal();
	$data['coldlead'] = $this->leadModel->getcoldandlead();
	$this->view('sales/coldlead',$data);
}
//---------------------------------------------------------------------------------------------------
public function leadpostponed($id)
{
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

 $data =[
 'id' => $id,
 'lead_id' => trim($_POST['lead_id']), 
 'customername' => trim($_POST['customername']),
 'company' => trim($_POST['company']),
 'product' => trim($_POST['product']),
 'ordervalue' => trim($_POST['ordervalue']),
 'assignee' => trim($_POST['assignee']),
 'postponeddate' => trim($_POST['postponeddate']), 
 'postponedreason' => trim($_POST['postponedreason']),
 'status' => trim($_POST['status']),
  'leadstatus' => trim($_POST['leadstatus']),
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
	if($data['leadstatus']=="Commit"){
    $status_new="Upside";
	if($this->leadModel->updateleadtable1($data,$status_new))
	  {
		  $this->leadModel->leadpostponed($data);    
        flash('lead_success', 'Lead Status Added Successfully');  
       redirect('Leads/leadstatus');
   
	  }
   } 
	
  else{
     $status_new="Lead";
  if($this->leadModel->updateleadtable1($data,$status_new))
    {
      $this->leadModel->leadpostponed($data) ;   
        flash('lead_success', 'Lead Status Added Successfully');  
       redirect('Leads/leadstatus');
   
    }
   }  
     

 } 
else {
 // Load view with errors
 $this->view('lead/lead_postponed', $data);
}       

} else {
 $lead = $this->leadModel->getCloseLeadById($id);
	// Check for owner
  $data = [
	  'id' => $lead->id,
	  'lead_id' => $lead->lead_id,
      'leadowner' => $lead->leadowner,
      'customertype' => $lead->customertype,
      'customername' => $lead->customername,
      'company' => $lead->company,
      'industry' => $lead->industry,    
      'leadsource' =>$lead->leadsource,     
	  'phone' =>$lead->phone,
	  'mobile' =>explode("," ,$lead->mobile),
	  'email' =>explode("," ,$lead->email),
	  'vertical' =>$lead->vertical,	  
	  'leadstatus' =>$lead->leadstatus,
	  'oem' =>$lead->oem,	  
	  'product' =>$lead->product,
	  'assignee' =>$lead->assignee,
	  'ordervalue' =>$lead->ordervalue,
	  'postponeddate_err' => '',
	  'postponedreason_err' => ''
	  
    ]; 
	
$this->view('lead/lead_postponed', $data);
}
}
//------------------------------------------------------------------------------------------------------------

public function paymentlist()
{
 $email=$_SESSION['email'];
  $data['payment'] = $this->leadModel->getpaymentlist($email);
  $this->view('lead/paymentlist',$data);
}
//-------------------------------------------------------------------------------------------------------------
public function paymentclose($id)
{
 $email=$_SESSION['email'];
 $flag="1";
  if($this->leadModel->closepaymentlist($id,$flag)){
     flash('lead_closed', 'Payment closed');  
       redirect('Leads/paymentlist');
  }
  
}
//-------------------------------------------------------------------------------------------------------------
public function amclist()
{
 $email=$_SESSION['email'];
  $data['payment'] = $this->leadModel->getamclist($email);
  $this->view('lead/amclist',$data);
}
//-------------------------------------------------------------------------------------------------------------
public function wonlist()
{
 $email=$_SESSION['email'];
  $data['payment'] = $this->leadModel->getwonlist1($email);
  $this->view('lead/wonlist',$data);
}
//-------------------------------------------------------------------------------------------------------------
public function droplist()
{
 $email=$_SESSION['email'];
  $data['payment'] = $this->leadModel->getdroplist1($email);
  $this->view('lead/droplist',$data);
}
//-------------------------------------------------------------------------------------------------------------
public function lostlist()
{
 $email=$_SESSION['email'];
  $data['payment'] = $this->leadModel->getlostlist1($email);
  $this->view('lead/lostlist',$data);
}
//-------------------------------------------------------------------------------------------------------------
public function postponedlist()
{
 $email=$_SESSION['email'];
  $data['payment'] = $this->leadModel->getpostlist1($email);
  $this->view('lead/postlist',$data);
}
//-------------------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------------------
}



  