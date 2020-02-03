
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

<script>
$(document).ready(function() {
    var interval = setInterval(function() {
        var momentNow = moment();
        $('#date-part').html(momentNow.format('DD MMMM YYYY') + ' '
                            + momentNow.format('dddd')
                             .substring(0,3).toUpperCase());
        $('#time-part').html(momentNow.format('hh:mm:ss A'));
    }, 100);
    });
</script>
<style>
.time-frame {
    background-color: #000000;
    color: #ffffff;
    width: 300px;
    font-family: Arial;
}

.time-frame > div {
    width: 100%;
    text-align: center;
}

#date-part {
    font-size: 0.80em;
}
#time-part {
    font-size: 0.80em;
}
</style>
      <!-- partial -->
      <div class="main-panel">
	  <div class="row">
		<div style="margin-left: 83.7%;" id='time-part'></div>
		<div style="margin-left: 82%;" id='date-part'></div>
	  </div>
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              
            </div>
          </div>         
   <div id='time-part'></div>

           <div class="row">
   <div class="col-lg-12 grid-margin stretch-card">
     <div class="card">
        <div class="card-body">
           <h4 class="card-title"> </h4>   
           <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><strong>Open Tickets Report </strong></h4>
                  <form action="<?php echo URLROOT; ?>/posts/reports" method="post">                 
                              
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
                $groups = $this->campaignModel->getCampaignName();
                ?>
                         <div class="col-sm-9">
                         <select class='form-control' id='campaign' name='campaign' style='border: none !important; border-bottom: 1px solid black !important;'>
                          <option value=""  selected="selected"> Select campaign Name.. </option>
                          <?php foreach($groups as $each){ ?>
        <option value="<?php echo $each->id; ?>"><?php echo $each->campaignname; ?></option>';
    <?php } ?>       
         </select>                                     
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
                  <a href="<?php echo URLROOT; ?>/posts/reports" style="margin-top: 30px;"  class="btn btn-info">  <i class="fa fa-undo" aria-hidden="true"></i></a>                 
                </div>
                 </form>

          
                    </div>     

                    <br>
                    <br>              
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="example" style="width:100%">
                  <thead>
                    <tr>
                     <th>clientName</th>                                  
                     <th>Ticket Id</th>
                     <th>Severity</th>
                     <th>Subject</th>
                     <th> Campaign Name</th>
                     <th> Process</th>                     
                     <th>Created Date</th>
                     <th>Assignee</th>                                 
                   </tr>                       
                 </thead>
                 <tbody id="myTable">
                
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

		
          </div>                     
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->       
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

<style type="text/css">
 .menu-icon {
    margin-right: 1.25rem;
    width: 16px;
    line-height: 1;
    font-size: 18px;
    color: black;
}

tr:nth-child( 2n ) {
  background-color:#ded3f6;
  font-weight: bold;
}
tr:nth-child( 2n + 1 ) {
  background-color: #b8f1d5;
font-weight: bold;
}
</style>
<?php require APPROOT . '/views/inc/footer.php'; ?>
              
               <script>
			   $(document).ready(function() {
    $('#example').DataTable();
} );
</script>			   
         
              </div>