<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar1.php'; ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/datatables/dataTables.bootstrap.css"> 
 <style>
 .addhead {
	 background-color:rgb(243, 242, 242);
	 display: flex;
     border: 1px solid transparent;
     border-radius: .25rem;
     font-size: .875rem;
 }
 .card:hover {
	-webkit-box-shadow: -1px 3px 31px -2px rgba(181,190,235,0.84);
	-moz-box-shadow: -1px 3px 31px -2px rgba(181,190,235,0.84);
	box-shadow: -1px 3px 31px -2px rgba(181,190,235,0.84);
	transition: box-shadow .3s;
	border-radius:10px;
}
 </style>

 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
            </div>
          </div>
	<div class="col-12 grid-margin">
		<div class="card">
			<div class="card-body">
			  <h4 class="addhead">Indivual Target</h4> 			  
			   <form action="<?php echo URLROOT;?>/Masters/editverticaltarget/<?php echo $data['id'];?>" method="post"  enctype="multipart/form-data">                                       
				<div class="row">
				
				  <div class="col-md-12">
				  <div class="col-sm-6">   
					  <label class="col-form-label">Select Vertical</label>
                      <select name="verticals" class="form-control effect-8">
					   <option value="<?php echo $data['verticals'];?>" selected="selected" ><?php echo $data['verticalname'];?></option>
					  <?php foreach ($data['department'] as $dept) :?>
					  
					  <option value="<?php echo $dept->id;?>" ><?php echo $dept->verticalname;?></option>
					  <?php endforeach; ?>
					  </select>						  
					   <br>  
					 
				  <label class="col-sm-6">Quarter 1 Target</label>
				  
				  <br> 
					<div class="row">
					 <input type="text" name="q1targetamount" value="<?php echo $data['q1targetamount'];?>" class="form-control"/>
					   
					</div>
				  </div> 
				</div>	
				 </div>
				   <br> 
				<div class="row">
				
				  <div class="col-md-12">
				    <div class="col-sm-6">
				  <label class="col-sm-6">Quarter 2 Target</label>
				  
				  <br> 
					<div class="row">
					  <input type="text" name="q2targetamount" value="<?php echo $data['q2targetamount'];?>" class="form-control"/>
					  
					</div>
				  </div> 
				  </div> 
				</div>
				  <br> 
				<div class="row">
				
				  <div class="col-md-12">
				   <div class="col-sm-6">
				  <label class="col-sm-6">Quarter 3 Target</label>
				  
				  
				  <br> 
					
					  
					  
					  <input type="text" name="q3targetamount" value="<?php echo $data['q3targetamount'];?>" class="form-control"/>
					  
					  
					  
					</div>
					</div>
				  </div> 
				  <br> 
				<div class="row">
				
				  <div class="col-md-12">
				   <div class="col-sm-6">
				  <label class="col-sm-6">Quarter 4 Target</label>
				  
				  
				  <br> 
					  <input type="text" name="q4targetamount" value="<?php echo $data['q4targetamount'];?>" class="form-control"/>
					  
					
				  </div> 
				  </div> 
				</div>
				<div class="row">
				  <div class="col-sm-6">
					<div class="form-group row">
					   <label class="col-sm-3 col-form-label"></label>
					   <div class="col-sm-9">
						   <input type="submit" style="background-color:rgba(27, 82, 151, 1);"  class="btn btn-success mr-2" value="Save">
						   <button type="reset" class="btn btn-light">Cancel</button>
					   </div>
				   </div>
				   </div>
				 </div>
                </form>            
			</div>
		</div>
	</div> 
	</div>
	
<?php require APPROOT . '/views/inc/footer.php'; ?>            
</div>
<script>
 $(document).ready(function() {
 $('#example').DataTable();
});
 </script>
