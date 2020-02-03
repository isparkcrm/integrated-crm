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
			   <form action="<?php echo URLROOT;?>/Masters/individualtarget" method="post"  enctype="multipart/form-data">                                       
				<div class="row">
				
				  <div class="col-md-12">
				  <div class="col-sm-6">   
					  <label class="col-form-label">Sales Agent</label>
                      <select name="outboundcaller" class="form-control effect-8">
					   <option disabled="disabled" value="--Select--" selected="selected" >--Select--</option>
					  <?php foreach ($data['users'] as $name) :?>
					  
					  <option value="<?php echo $name->id;?>" ><?php echo $name->username;?></option>
					  <?php endforeach; ?>
					  </select>						  
					  <span class="alert-danger"><?php echo $data['outboundcaller_err']; ?>  </span>
					 
				  <label class="col-sm-3 col-form-label"></label>
				  <input type="text" name="q1" class="col-sm-6 form-control" readonly value="Quarter 1 Target"/>
				  <br> 
					<div class="row">
					 <input type="text" name="q1amount" class="form-control"/>
					   <span class="alert-danger"><?php echo $data['q1amount_err']; ?>  </span>
					</div>
				  </div> 
				</div>	
				 </div>
				<div class="row">
				
				  <div class="col-md-12">
				    <div class="col-sm-6">
				  <label class="col-sm-3 col-form-label"></label>
				  <input type="text" name="q2" class="col-sm-6 form-control" readonly value="Quarter 2 Target"/>
				  <br> 
					<div class="row">
					  <input type="text" name="q2amount" class="form-control"/>
					  <span class="alert-danger"><?php echo $data['q2amount_err']; ?>  </span>
					</div>
				  </div> 
				  </div> 
				</div>
				<div class="row">
				
				  <div class="col-md-12">
				   <div class="col-sm-6">
				  <label class="col-sm-3 col-form-label"></label>
				  <input type="text" name="q3" class="col-sm-6 form-control" readonly value="Quarter 3 Target"/>
				  
				  <br> 
					
					  
					  
					  <input type="text" name="q3amount" class="form-control"/>
					  <span class="alert-danger"><?php echo $data['q3amount_err']; ?></span>
					  
					  
					</div>
					</div>
				  </div> 
				
				<div class="row">
				
				  <div class="col-md-12">
				   <div class="col-sm-6">
				  <label class="col-sm-3 col-form-label"></label>
				  <input type="text" name="q4" class="col-sm-6 form-control" readonly value="Quarter 4 Target"/>
				  
				  <br> 
					  <input type="text" name="q4amount" class="form-control"/>
					  <span class="alert-danger"><?php echo $data['q4amount_err']; ?></span>
					
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
	<div class="col-12 grid-margin">
		<div class="card">
		<div class="card-body">
			<div class="table-responsive">
			<table class="table table-hover dataTable table-striped" id="example" style="width:100%">
                  <thead>
                    <tr>
                          <th>S.No</th>
                          <th>Name</th>                           
                          <th>Q1 Target</th>   
                          <th>Q2 Target</th>   
                          <th>Q3 Target</th>						  
                          <th>Q4 Target</th>   
                          <th>Action</th>						  
						  <th style="display:none;"></th>						  
                    </tr>
                  </thead>
               <tbody id="myTable">
			   <?php foreach($data['getindividuallist'] as $outboundcall):?>
				 <tr>
				 <td><div class="wrap"></div></td>
                    <td><div class="wrap"><?php echo $outboundcall->username; ?></div></td> 
                    <td><div class="wrap"><?php echo $outboundcall->q1amount; ?></div></td>  
                    <td><div class="wrap"><?php echo $outboundcall->q2amount; ?></div></td>            
                    <td><div class="wrap"><?php echo $outboundcall->q3amount; ?></div></td>         
                    <td><div class="wrap"><?php echo $outboundcall->q4amount; ?></div></td>
                   <td><div class="wrap"> <a href="<?php echo URLROOT;?>/Masters/editindividualtarget/<?php echo $outboundcall->id;?>" class="btn btn-primary">Edit</a>  </div></td>         
                    <td><div class="wrap"> <a href="" class="btn btn-danger">Delete</a>  </div></td>
                 </tr> 
				 <?php endforeach;?>
			  </tbody>
          </table>
        </div>           
	   </div>
		</div>
	</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>            

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
