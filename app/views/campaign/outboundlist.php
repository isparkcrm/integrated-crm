<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/datatables/dataTables.bootstrap.css"> 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="<?php echo URLROOT; ?>/public/datatables/jquery.dataTables.min.js"></script>
<!--<script type="text/javascript">
 function getcallstatus(id){
$.ajax({ 
    type: 'GET', 
    url: '</?php echo URLROOT ;?>/Campaign/getcallstatusid/'+id, 
	
    data: { get_param: 'value' }, 
    dataType: 'json',
    success: function (data) { 
	console.log('datas',data);
	var setUrl="</?php echo URLROOT.'/Campaign/callstatus/';?>"+data.id;
         $('#app').attr('action', setUrl);
		 $('#exampleModal').modal('show');
		 $('#id').val(data.id);
		 $('#campaign').val(data.campaign_id);
		}
        });
    }

</script>-->

<style>
.control {
	width: 39%;
    height: 110%;
    margin-left: -12px;
}
</style>
<div class="main-panel">
	<div class="content-wrapper">
	<div class="col-lg-12 grid-margin stretch-card">
	<div class="card">
	<div class="card-body">
		<h2 style="margin-left:35%;">Outbound Call List</h2>
		     <form  id="app" method="POST" action="<?php echo URLROOT;?>/Campaign/callstatus/">
			 <input style="display:none;" type="text" id="id" name="id"  value="<?php echo $data['id'];?>"/>
			<input style="display:none;" type="text" id="campaign"  name="campaign_id"/>
			<input style="display:none;" type="text" id="email" name="email"/>
			<div class="form-group row">
			<label class="col-sm-3 col-form-label">Campaign Name<sup>*</sup></label>
			<input class="control" disabled type="text" name="name" value="<?php echo $data['campaignname'];?>" id="name"/>
			</div>
			<div class="form-group row">
			<label class="col-sm-3 col-form-label">Name<sup>*</sup></label>
			<input class="control" disabled type="text" name="username" value="<?php echo $data['name'];?>" id="name"/>
			</div>
				<div class="form-group row">
			<label class="col-sm-3 col-form-label">Mobile<sup>*</sup></label>
			<input class="control" disabled type="text" name="mobile" value="<?php echo $data['mobile'];?>" id="mobile"/>
			</div>
			<div class="form-group row">
			<label class="col-sm-3 col-form-label">Script<sup>*</sup></label>
			<textarea rows="3" cols="40" disabled type="text" name="callscript" id="callscript"><?php echo $data['callscript'];?></textarea>
			</div>
				<div class="form-group row">
				  <label class="col-sm-3 col-form-label">Call Status<sup>*</sup></label>
					  <div class="col-sm-9">
						  <select style="width:28%;" name="callstatus" id="callstatus">
							   <option selected disabled value="Select">Select</option>
							   <option name="Closed" value="Closed">Closed</option>
							   <option name="donotcall" value="Do Not Call">Do Not Call</option>
							   <option name="calllater" value="Call Later">Call Later</option>
							   <option name="notreachable" value="Not Reachable">Not Reachable</option>
							   <option name="notresponding" value="Not Responding">Not Responding</option>
							   <option name="notinterested" value="Not Interested">Not Interested</option>
						  </select>
								<span class="invalid-feedback"><?php echo $data['user_err']; ?></span>
					  </div>
				</div>
				<div class="row" style="display:none;" id="timesh">
										  <div class="col-md-6">
											  <div class="form-group row">
											  <label class="col-sm-6 col-form-label">Date & Time<sup>*</sup></label>
											  <div class="col-sm-6">
											  <input type="date" name="calldate" class="control"/>
											  </div>
											  </div>
										  </div>
										  <div class="col-md-6">
											  <div class="form-group row">
												  <div class="col-sm-6">
													<input type="time" name="calltime" class="control"/>
												  </div>
											  </div>
										  </div>
									  </div>
							<div class="form-group row">
							 <label class="col-sm-3 col-form-label">Description<sup>*</sup></label>
							  <div class="col-sm-9">
								<textarea class="control" type="text" name="remarks"></textarea>
							    <span class="invalid-feedback"><?php echo $data['user_err']; ?></span></div>
						    </div>
						<div class="form-group row" style="margin-left:26%;">
						<input   class="btn btn-primary" type="submit" name="update" value="Update Status"/> &nbsp;&nbsp;&nbsp;&nbsp;
						<?php
						 $email = $_SESSION['email'];
						 $number= $data['mobile'];	 						
						 $url="http://10.10.10.151:4575/CrmDial?exeUserName={$email}&phoneNumber={$number}&uniqueId={$number}&skill=OUTBOUND&dialCode=888&listId=1";
						?>
						<a class="btn btn-success" id="first"  href="<?php echo $url; ?>" target="_blank"> Call	</a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="http://10.10.10.151:4575/CrmHangup?exeUserName=santhiya@futurecalls.com&disposition=DEFAULT:HANGUP" class="btn btn-danger">Hangup</a>
						</div>
						</form>
        </div>
       </div>
	 </div>
	 </div>
<div class="main-panel" style="width:100%">
  <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card" >
  <div class="card">
  <h2 style="margin-left:30%">Overall Outbound Call List</h2>
       <div class="card-body">
	    <div class="table-responsive">
		
		<table class="table table-hover dataTable table-striped" id="example" style="width:100%">
				  <thead>
					<tr>
						  <th>Campaign ID</th>
					      <th>Name</th>
						  <th>Mobile</th>
						  <th>Call Status</th>
						  <th>call Date</th>
						  <th>call Time</th>
						 <th>Last Update Status</th>
						  <th>Assigned Status</th>
					 </tr>
                  </thead>
				<tbody>
				<?php foreach($data['outbound'] as $call) : ?>      
                 <tr>
					<td><?php echo $call->campaign_id;?></td>
					<td><?php echo $call->name;?></td>
				    <td><?php echo $call->mobile;?></td> 
				    <td><?php echo $call->call_status;?></td> 
				    <td><?php echo $call->call_date;?></td> 
				    <td><?php echo $call->call_time;?></td> 
				    <td><?php echo $call->remarks;?></td>
					
				<!--	<form method="POST" action="<?php echo URLROOT;?>/Campaign/getcallstatusid/">
				<input style="display:none;" type="text" name="id" value="<?php echo $call->id; ?>">	
				<input class="btn btn-info" type="submit" name="update" value="Assign To Me"/> 
					</form>-->
						  <td>		 			   
							
							<a href="<?php echo URLROOT; ?>/Campaign/getcallstatusid/<?php echo $call->id; ?>" class="btn btn-primary">Assign To Me</a>  </td>
							
						</td>
				
			 </tr> 
                <?php endforeach; ?>                               
            </tbody>
		
          </table>
		  </div>
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
 <script>
$(document).ready(function(){
	$(document).on('change','#callstatus',function(){
		var status = $(this).val();
		if(status=="Call Later"){
			$('#timesh').show();
		}
		else{
			$('#timesh').hide();
		}
	});
});
</script>
<script>
$('a.redirect').click(function (event) {
  event.preventDefault();
  var href = $(this).attr('href')
  window.location='http://localhost:8080/fcticketingsystemV1.01/Campaign/getcallstatusid/1';
});
</script>
 
  `