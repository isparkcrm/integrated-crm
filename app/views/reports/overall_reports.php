<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar1.php'; ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/datatables/dataTables.bootstrap.css"> 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="<?php echo URLROOT; ?>/public/datatables/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    var t = $('#example').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
</script>

<div class="main-panel">
        <div class="content-wrapper">
          
		  <div class="col-12 grid-margin">
              
  <div class="row">
   <div class="col-lg-12 grid-margin stretch-card">
     <div class="card">
        <div class="card-body">
         
           <h4 class="card-title"> Overall Report</h4>                 
              <div class="table-responsive">
               <div class="col-md-12">            
                    <ul class="nav nav-tabs">
						<li id="client" style="padding-right: 70px;">
								<a data-toggle="tab">
								<img src="<?php echo URLROOT;?>/images/sales/client.png">
								<p><span>Client Report</span></p>
								</a>
							</li>
						<li id="closure" style="padding-right: 70px;">
							<a  data-toggle="tab">
							<img src="<?php echo URLROOT;?>/images/sales/close.png">
							<p><span>Closure Report</span></p>
							</a>
						</li>
						<!--<li id="product" style="padding-right: 70px;">
							<a  data-toggle="tab"> 
							<img src="</?php echo URLROOT;?>/images/sales/product.png">
							<p><span>Product Report</span></p>
							</a>
						</li>-->
						<li id="performance" style="padding-right: 70px;">
							<a  data-toggle="tab"> 
							<img src="<?php echo URLROOT;?>/images/sales/performance.png">
							<p><span>Performance Report</span></p>
							</a>
						</li>
						<!--<li id="graphic" style="padding-right: 70px;">
							<a  data-toggle="tab"> 
							<img src="</?php echo URLROOT;?>/images/sales/graphic.png">
							<p><span>Graphical Report</span></p>
							</a>
						</li>-->
						
					</ul>    
            </div>
        </div>
       </div>
     </div>
   </div>
  </div>
  
  
  <!-- client report-->
  
  
  <div class="tab-pane" id="clientinfo" style="display:none;">

 <div class="card">
  <div class="row">
    <div class="col-md-12"> 
      <table class="table table-striped table-bordered table-hover" id="example">
				<thead>
					<tr>
						<td colspan="3" style="text-align: center; background-color: #546E7A; color: white;"><h4> Active Clients Report </h4>
						</td>
					</tr>
					<tr style="background-color: #546E7A; color: white;">
					   <th rowspan="2" style="border-right: 2px solid #f2f2f2 !important; vertical-align: middle; text-align: center;">Assignee</th>
						<th rowspan="2" style="border-right: 2px solid #f2f2f2 !important; vertical-align: middle; text-align: center;">Active Client</th>
						<th rowspan="2" style="border-right: 2px solid #f2f2f2 !important; vertical-align: middle; text-align: center;">New Client</th>
					</tr>
				</thead>
				<tbody id="myTable">
				   <?php
						$number=$this->reportModel->getclientreport();
						$Rows = $number; //Dynamic number for Rowss
						for($i=1;$i<=$Rows;$i++){ 
					 ?>
				 <tr>
				 
					<td style="text-align: center;"><div class="wrap"><?php $assigneename=$this->reportModel->getclientlist($i); echo $assigneename; ?></div></td>
					
					<td style="text-align: center;"><div class="wrap"><?php $activeclient=$this->reportModel->getexistingclientreport($i); echo $activeclient; ?></div></td>
					<td style="text-align: center;"><div class="wrap"><?php $newclient=$this->reportModel->getnewclientreport($i); echo $newclient; ?></div></td>        
				 </tr>
					<?php } ?>
				 </tbody>
	  </table>
   </div>
  </div>
  </div>
</div>
  
  <!--closure Report---->
  
  
  <div class="tab-pane" id="closureinfo" style="display:none;">

 <div class="card">
  <div class="row">
    <div class="col-md-12"> 
      <table class="table table-striped table-bordered table-hover" id="example1">
				<thead>
					<tr>
						<td colspan="4" style="text-align: center; background-color: #546E7A; color: white;"><h4> Closure Lead Report </h4>
						</td>
					</tr>
					<tr class="success">
						   <th style="text-align: center;">Assignee</th>
						<th style="text-align: center;">Cust-name</th>
						<th style="text-align: center;">Product</th>
						<th style="text-align: center;">Value</th>                               
					</tr>
				</thead>
				<?php foreach($data['closurereport'] as $closure):?>
					
				  <tbody id="myTable">
				
						<tr>
							<td style="text-align: center;"><div class="wrap"><?php echo $closure->username;?></div></td>     
							<td style="text-align: center;"><div class="wrap"><?php echo $closure->customername;?></div></td> 
							<td style="text-align: center;"><div class="wrap"><?php echo $closure->product;?></div></td>
							<td style="text-align: center;"><div class="wrap"><?php echo $closure->ordervalue;?></div></td>
						</tr>
					
					</tbody>
				<?php endforeach;?>
		</table>
   </div>
  </div>
  </div>
</div>
<div class="tab-pane" id="productinfo" style="display:none;">

 <div class="card">
  <div class="row">
    <div class="col-md-12"> 
    <!--  <table class="table table-striped table-bordered table-hover" id="example2">
                                <thead>
										<tr>
											<td colspan="6" style="text-align: center; background-color: #546E7A; color: white;"><h4> Vertical wise Report </h4>
										</td>
									</tr>
                                    <tr style="background-color: #546E7A; color: white;">
									       <th style="text-align: center;">Verticals</th>
                                        <th style="text-align: center;">2018-19 Target</th>
                                        <th style="text-align: center;">Achieved</th>
                                        <th style="text-align: center;">Percentage(%)</th>
										   <th style="text-align: center;">Pending</th>                     
										   <th style="text-align: center;">Commits</th>                     
                                    </tr>
                                </thead>	
                                  <tbody id="myTable">
								  </?php
										$number=$this->reportModel->verticalcount();
										$Rows = $number; //Dynamic number for Rowss
										for($i=1;$i<=$Rows;$i++){ 
									 ?>
								  <tr>
									 
											<td style="text-align: center;"><div class="wrap"></?php $verticalname=$this->reportModel->verticalname($i); echo $verticalname; ?></div></td>     
											<td style="text-align: center;"><div class="wrap"></?php $targetamout=$this->reportModel->getverticaltargetreport($i); echo $targetamout; ?></div></td>        
											<td style="text-align: center;"><div class="wrap"></?php $achieveamount=$this->reportModel->achievedvalue($i); echo $achieveamount;?></div></td>        
											<td style="text-align: center;"><div class="wrap"></?php $verticalwisepercentage=$this->reportModel->verticalwisepercentage($i,$targetamout); echo $verticalwisepercentage;?></div></td>         
											<td style="text-align: center;"><div class="wrap"></?php $verticalwisepending=$this->reportModel->verticalwisepending($i,$targetamout); echo $verticalwisepending;?></div></td>         
											<td style="text-align: center;"><div class="wrap"></?php $verticalwisecommit=$this->reportModel->verticalwisecommit($i); echo $verticalwisecommit;?></div></td>         
										                                  
								   </tr>
									</?php }  ?> 
									
								 </tbody>
				</table>-->
   </div>
  </div>
  </div>
</div>
   </div>

   <div class="tab-pane" id="performanceinfo" style="display:none;">

 <div class="card">
  <div class="row">
    <div class="col-md-12"> 
      <table class="table table-striped table-bordered table-hover" id="example2">
                                <thead>
										<tr>
											<td colspan="6" style="text-align: center; background-color: #546E7A; color: white;"><h4> Target Report </h4>
										</td>
									</tr>
                                    <tr style="background-color: #546E7A; color: white;">
									       <th style="text-align: center;">Name</th>
                                        <th style="text-align: center;">2018-19 Target</th>
                                        <th style="text-align: center;">Achieved</th>
                                        <th style="text-align: center;">Percentage(%)</th>
										   <th style="text-align: center;">Pending</th>                     
										   <th style="text-align: center;">Commits</th>                     
                                    </tr>
                                </thead>	
                                  <tbody id="myTable">
								    <?php
										$number=$this->reportModel->getclientreport();
										$Rows = $number; //Dynamic number for Rowss
										for($i=1;$i<=$Rows;$i++){ 
									 ?>
								  <tr>
									 
											<td style="text-align: center;"><div class="wrap"><?php $assigneename=$this->reportModel->getclientlist($i); echo $assigneename; ?></div></td>     
											<td style="text-align: center;"><div class="wrap"><?php $usertargetamout=$this->reportModel->gettargetmaster($i); echo $usertargetamout; ?></div></td>        
											<td style="text-align: center;"><div class="wrap"><?php $individualachieveamount=$this->reportModel->getindividualacheive($i); echo $individualachieveamount;?></div></td>        
											<td style="text-align: center;"><div class="wrap"><?php $performancewisepercentage=$this->reportModel->performancewisepercentage($i,$usertargetamout); echo $performancewisepercentage;?></div></td>         
											<td style="text-align: center;"><div class="wrap"><?php $performancewisepending=$this->reportModel->performancewisepending($i,$usertargetamout); echo $performancewisepending;?></div></td>         
											<td style="text-align: center;"><div class="wrap"><?php $verticalwisecommit=$this->reportModel->verticalwisecommit($i); echo $verticalwisecommit;?></div></td>         
										                                  
								   </tr>
									<?php }  ?> 
									
								 </tbody>
				</table>
   </div>
  </div>
  </div>
</div>
   </div>
   </div>
  </div>  
<?php require APPROOT . '/views/inc/footer.php'; ?>
<script>
$(document).ready(
    function() {
        $("#client").click(function() {
            $("#clientinfo").toggle();
			 $("#closureinfo").hide();
			  $("#productinfo").hide();
			  $("#performanceinfo").hide();
        });
    });
</script>
<script>
$(document).ready(
    function() {
		$("#closure").click(function() {
            $("#closureinfo").toggle();
			$("#clientinfo").hide();
			 $("#productinfo").hide();
			 $("#performanceinfo").hide();
        });
		
    });
</script>
<script>
$(document).ready(
    function() {
    $("#product").click(function() {
            $("#productinfo").toggle();
			$("#clientinfo").hide();
			$("#closureinfo").hide();
			$("#performanceinfo").hide();
        });
    });
</script>
<script>
$(document).ready(
    function() {
    $("#performance").click(function() {
            $("#performanceinfo").toggle();
			$("#clientinfo").hide();
			$("#closureinfo").hide();
			$("#productinfo").hide();
        });
    });
</script>
 <script>
 $(document).ready(function() {
 $('#example').DataTable();
});
 </script>    
 <script>
 $(document).ready(function() {
 $('#example1').DataTable();
});
 </script>  
 <script>
 $(document).ready(function() {
 $('#example2').DataTable();
});
 </script> 
                         
         
        </div>