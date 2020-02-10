
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/service_head.php'; ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/datatables/dataTables.bootstrap.css"> 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="<?php echo URLROOT; ?>/public/datatables/jquery.dataTables.min.js"></script>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              
            </div>
          </div>         
          <div class="row">


          
   <div class="col-lg-12 grid-margin stretch-card">
     <div class="card">
        <div class="card-body">
           <h4 class="card-title"> </h4>   
           <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><strong>Userwise Report </strong></h4>
                  <form action="<?php echo URLROOT; ?>/tickets/userwise_report" method="post">                 
                              
                    <div class="row">
                     <div class="col-md-3">
                        <div class="form-group row">
                         <div class="col-sm-9">
                         <input type="date" class="form-control "  name="from_date"  required="required" placeholder="from"  style="  border: none !important; border-bottom: 1px solid black !important;" required/>
                          </div>
                        </div>
                      </div>
                       <div class="col-md-3">
                        <div class="form-group row">
                         <div class="col-sm-9">
                         <input type="date" class="form-control"  name="to_date"  required="required" placeholder="to"   style="  border: none !important; border-bottom: 1px solid black !important;" required/>
                          </div>
                        </div>
                      </div>    
                      <div class="col-md-3">
                        <div class="form-group row">
                        <?php 
                $groups = $this->campaignModel->getuserName();
                ?>
                         <div class="col-sm-9">
                         <select class='form-control' id='username' name='username' style='border: none !important; border-bottom: 1px solid black !important;'>
                          <option value=""  selected="selected"> Select user Name.. </option>
                          <?php foreach($groups as $each){ ?>
        <option value="<?php echo $each->email; ?>"><?php echo $each->username; ?></option>';
    <?php } ?>       
         </select>                                     
                          </div>
                        </div>
                      </div>
                   
                      </div>
                        <div class="col-md-3">  
                  <button type="submit" class="btn btn-info" style="margin-top: 30px;" name="submit">
                    <i class="fa fa-search" aria-hidden="true"></i>
                  </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="<?php echo URLROOT; ?>/tickets/userwise_report" style="margin-top: 30px;"  class="btn btn-info">  <i class="fa fa-undo" aria-hidden="true"></i></a>                 
                </div>
                 </form>

                 <!--   <div class="col-md-3">                
                  <form method="post" action="">
                    <button type="submit" class="btn btn-info" style="margin-top: 30px;" name="export">
                    <i class="fa fa-download" aria-hidden="true"></i>
                  </button>
                  </form>
                </div>  -->
                    </div>     

                    <br>
                    <br>              
              <div class="table-responsive">
                <table class="table table-hover dataTable table-striped" id="example" style="width:100%">
              <thead>
                <tr>
                  <th>
                  username
                  </th>
                  <th>
                   Open 
                  </th>
                  <th>
                  Closed 
                  </th>
                  <th>
                   Open <br> Today
                  </th>
                  <th>
                  Closed <br> Today
                  </th>
                                         
                 
              
                    <th> Critical</th>
                    <th>High</th>
                    <th>Medium</th>
                    <th>Low</th>
                      <th>
                   SLA Violations                          
                  </th> 
                </tr>
              </thead>
              <tbody>
              <style>
              trrr:nth-child( 2n ) {
              background-color:#ded3f6;
              font-weight: bold;
              }
              trrr:nth-child( 2n + 1 ) {
                background-color: #b8f1d5;
              font-weight: bold;
              }
              </style>
                            <tr> 
                <?php
                 // $number=$this->campaignModel->countuser();
                  $Rows = 1; //Dynamic number for Rowss
                  for($i=1;$i<=$Rows;$i++){ 
                    $email=$data['username'];
                     //role=$this->campaignModel->userrole($i);

                ?>
                         
                <td>
                  <?php
                    $username=$this->campaignModel->username1($email);
                    echo $username;   
                          
                  ?>                          
                </td>

                <td style="text-align: center;">
                  <?php
                  $from=$data['from'];
                  $to=$data['to'];
                    $open=$this->campaignModel->useropenDate($email,$from,$to);
                    echo $open;            
                  ?>             
                </td>

                <td style="text-align: center;"> 
                  <?php
                    $close=$this->campaignModel->usercloseDate($email,$from,$to);
                    echo $close;                      
                  ?> 
                </td>
                <td style="text-align: center;">
                  <?php 
                    $opentoday=$this->campaignModel->useropentodayDate($email,$from,$to);
                    echo $opentoday;              
                  ?> 
              </td>

                          <td style="text-align: center;">
              
                           <?php 
                 $closetoday=$this->campaignModel->userclosetodayDate($email,$from,$to);
                      
              echo $closetoday;
              
                    
              ?>
                          </td>


                          <td  style="text-align: center;">
                              <?php 
                    $critical=$this->campaignModel->usercriticalDate($email,$from,$to);
                      
              echo $critical;
          
              ?> 
                          </td>
               <td  style="text-align: center;">
                              <?php 
                    $high=$this->campaignModel->userhighDate($email,$from,$to);
                      
              echo $high;
            
              ?> 
                          </td>

                          <td style="text-align: center;">
                           <?php 
                    $medium=$this->campaignModel->usermediumDate($email,$from,$to);
                      
              echo $medium;
               
          
             
                         
              ?>
                          </td>

                          <td style="text-align: center;">
                        <?php 
                $low=$this->campaignModel->userlowDate($email,$from,$to);
                      
              echo $low;
                   
              ?> 
                         </td>    
                <td style="text-align: center;">
                        <?php
              $sla=$this->campaignModel->userslaDate($email,$from,$to);
                      
              echo $sla;
                   
              ?> 
                         </td> 

                         
                              </tr>
                       <?php 

                         }  ?>
                       
                     
                    </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div> 
         </div>  

    <!--------------------------------------------------------------------------------------------------------- -->  
    <!--------------------------------------------------------------------------------------------------------- -->              
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->       
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
      <script>
 $(document).ready(function() {
 $('#example').DataTable();
});
 </script>

<style type="text/css"> .menu-icon {
    margin-right: 1.25rem;
    width: 16px;
    line-height: 1;
    font-size: 18px;
    color: black;
}
</style>

<?php require APPROOT . '/views/inc/footer.php'; ?>
              
                         
         
              </div>