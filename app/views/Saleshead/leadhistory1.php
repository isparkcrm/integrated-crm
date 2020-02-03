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
			<div class="card">
				<div class="card-body">
					<div class="panel-heading">
					 Updates
					</div>
					<?php foreach($data['leadhistory'] as $leadhistory):?>
					<div class="panel-body">
						<p class="card-text"> Customer Name: <strong> </strong>               
						 Product :
						Order Value :<strong></strong>
						 Assignee :<strong></strong>
						 <p class="card-text">Action Taken :&nbsp;&nbsp;&nbsp;<strong></strong></p>
						 <p class="card-text">Next Action :&nbsp;&nbsp;&nbsp;<strong></strong></p>
						 <p class="card-text">Next Action By :&nbsp;&nbsp;&nbsp;<strong></strong></p>
						  <p class="card-text">Updated At :&nbsp;&nbsp;&nbsp;<strong></strong></p>
					</div>
					<?php endforeach ?>
				</div>
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