<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar1.php'; ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/datatables/dataTables.bootstrap.css"> 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="<?php echo URLROOT; ?>/public/datatables/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $("body").tooltip({ selector: '[data-toggle=tooltip]' });
});
</script>
<style>
a {
	    padding: 10%;
}
</style>
<div class="main-panel">
       

   <div id="wrapper">
        
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <h4>Recent Update  </h4>
                        <h5>Recent updates for this lead </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
       <div class="row">
		<div class="col-md-12 grid-margin">
				<div class="panel-body">
					<?php foreach($data['leadhistory'] as $leadhistory):?>
					<div class="card" style="background:linear-gradient(135deg, rgb(255, 255, 255) 0%, rgb(255, 255, 255) 100%)">
					<div style="background: linear-gradient(45deg, #eac2c2, #e4e4e4)!important;">
					 Updates
					</div>
						<div class="card-body">
					
						<p> Customer Name: <strong><?php echo $leadhistory->customername;?> </strong> &nbsp; &nbsp;  &nbsp;  
					Product:<strong><?php echo $leadhistory->productname;?></strong>&nbsp; &nbsp;  &nbsp; 
						Order Value:<strong><?php echo $leadhistory->ordervalue;?></strong></p>
						<p>Assignee:<strong><?php echo $leadhistory->assignee;?></strong></p>
						<p>Action Taken:<strong><?php echo $leadhistory->actiontaken;?></strong></p>
						<p>Next Action:<strong><?php echo $leadhistory->nextaction;?></strong></p>
						<p>Next Action Date:<strong><?php echo $leadhistory->nextactiondate;?></strong></p>
						<p>Updated At:<strong><?php echo $leadhistory->updated_at;?></strong></p>
						  </div>
						  </div>
						  <?php endforeach;?>
					</div>
				</div>
			</div>




                 </div>
                 
            </div>
            <!-- /. PAGE INNER  -->
        </div>
	
  </div>  
  <script>
 $(document).ready(function() {
 $('#example').DataTable();
});
 </script>  
<?php require APPROOT . '/views/inc/footer.php'; ?>       