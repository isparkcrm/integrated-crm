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
        <div class="content-wrapper">
          <div class="row purchace-popup">
          <div class="col-md-8">
            <a href="<?php echo URLROOT; ?>/posts/index_new" class="btn btn-info"><i class="fa fa-backward"></i> Back <<</a>
            </div>
            <div class="col-md-4">
            <a href="<?php echo URLROOT; ?>/leads/lead_master" class="btn btn-success">Add</a>
            </div>
          </div>
   </div>
   <div class="col-12 grid-margin">
		<div class="card">
		<div class="card-body">
			<div class="table-responsive">
			<table class="table table-hover dataTable table-striped" id="example" style="width:100%">
                  <thead>
                    <tr>
                          <th>S.No</th>
                          <th>Customer Name</th>  
						  <th>Customer Number</th>   
                          <th>Company</th>                  
                          <th>Lead Source</th>
						  <th>Lead Status</th>  
						  <th>Assignee</th>						  
                          <th>Order Value</th>   
                          <th>Action</th>						  
						  
                    </tr>
                  </thead>
               <tbody id="myTable">
			   <?php foreach($data['leadlist'] as $leads):?>
			   
				 <tr>
				 <td><div class="wrap"><?php echo $leads->id;?></div></td>
                    <td><div class="wrap"><?php echo $leads->fname;?></div></td> 
                    <td><div class="wrap"><?php echo $leads->mobile;?></div></td>  
                    <td><div class="wrap"><?php echo $leads->company;?></div></td>            
                    <td><div class="wrap"><?php echo $leads->leadsource;?></div></td>        
                    <td><div class="wrap"><?php echo $leads->leadstatus;?></div></td>
                    <td><div class="wrap"><?php echo $leads->assignee;?></div></td>
                    <td><div class="wrap"><?php echo $leads->ordervalue;?></div></td>
                    <td><a href="<?php echo URLROOT;?>/leads/leadclose/<?php echo $leads->id; ?>"><i class=" icon fa fa-check-circle fa-1x" data-toggle="tooltip" title data-original-title="Close"></i></a> 
                    <a href="<?php echo URLROOT;?>/leads/leaddrop/<?php echo $leads->id; ?>"><i class="icon1 fa fa-times-circle fa-1x" data-toggle="tooltip" title data-original-title="Drop"></i></a>     
                     <a href="<?php echo URLROOT;?>/leads/leadlost/<?php echo $leads->id; ?>"><i class=" icon2 fa fa-exclamation-circle fa-1x" data-toggle="tooltip" title data-original-title="Lost"></i></a>
					 <a href="<?php echo URLROOT;?>/leads/leadpostponed/<?php echo $leads->id; ?>"><i class="fa fa-calendar fa-1x" data-toggle="tooltip" title data-original-title="Postponed"></i></a></td>
                 </tr> 
				 <?php endforeach;?>
			  </tbody>
          </table>
        </div>           
	   </div>
		</div>
	</div>
  </div>  
  
<?php require APPROOT . '/views/inc/footer.php'; ?>       