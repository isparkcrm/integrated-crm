<?php
	class Report extends Controller {
    public function __construct(){
      $this->reportModel = $this->model('reports');
     
    }
  
  public function index_new()
  {
	   $data['clientreport'] =$this->reportModel->getclientreport();
	 //  $data['newclient'] = $this->reportModel->getnewclientreport();
	   //$data['existingclient'] = $this->reportModel->getexistingclientreport();
	   $data['closurereport'] =$this->reportModel->getclosurereport();
	   $data['productreport'] =$this->reportModel->getproductreport();
	   $this->view('reports/overall_reports',$data);
  }
}



  