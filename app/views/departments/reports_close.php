
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/helpdesk.php'; ?>
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
                  <h4 class="card-title"><strong>Closed Tickets Report </strong></h4>
                  <form action="<?php echo URLROOT; ?>/departments/reports_close" method="post">                 
                              
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
                $groups = $this->campaignModel->getSlaName();
                ?>
                          <div class="col-sm-9">
                          <select class='form-control' id='severity' name='severity' style='border: none !important; border-bottom: 1px solid black !important;'>
                          <option value=""  selected="selected"> Select Severity.. </option>
                          <?php foreach($groups as $each){ ?>
        <option value="<?php echo $each->severity_name; ?>"><?php echo $each->severity; ?></option>';
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
                  <a href="<?php echo URLROOT; ?>/departments/reports" style="margin-top: 30px;"  class="btn btn-info">  <i class="fa fa-undo" aria-hidden="true"></i></a>                 
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
                     <th>clientName</th>                                  
                     <th>Ticket Id</th>
                     <th>Severity</th>
                     <th>Subject</th>                   
                     <th> Process</th>                     
                     <th>Created Date</th>
                     <th>Assignee</th>                                 
                   </tr>                       
                 </thead>
                 <tbody id="myTable">
                 <?php foreach($data['tickets'] as $tickets) :
                      
                  ?> 
                     
                   <tr>                     
                    <td><?php echo $tickets->name; ?></td>                   
                    <td><?php echo $tickets->ticketID; ?></td>                                          
                    <td><?php echo $tickets->severity; ?></td>
                    <td> <?php echo $tickets->subject;?></td>            
                    <td><?php echo $tickets->process;?></td>     
                    <td><?php echo $tickets->created_at; ?></td>
                    <td><?php echo $tickets->assigned_to; ?></td> 
                           
                   </tr> 
                   <?php endforeach; ?>  
                        
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