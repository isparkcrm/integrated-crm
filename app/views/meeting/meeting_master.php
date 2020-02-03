<!DOCTYPE html>
<html>
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar1.php'; ?>
<head>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/jquery.datetimepicker.css"> 
<script>
$(function(){
		
			$(document.body).on('click', '.changeType' ,function(){
				$(this).closest('.phone-input').find('.type-text').text($(this).text());
				$(this).closest('.phone-input').find('.type-input').val($(this).data('type-value'));
			});
			
			$(document.body).on('click', '.btn-remove-phone' ,function(){
				$(this).closest('.phone-input').remove();
			});
			
		$('.btn-add-phone').click(function(){
			
			var index = $('.phone-input').length + 1;
				$('.phone-list').append(''+
				        '<div class="input-group mb-4 phone-input">'+
						    ' <label style="font-size:13px;" class="col-sm-2 col-form-label">Email</label>'+
							 '<div class="col-sm-4">'+
							'<input type="email" name="attendedemail[]" class="form-control" placeholder="email" />'+
							'</div>'+
							'<span class="input-group-btn">'+
							'<button class="btn btn-danger btn-remove-phone" type="button"><span class="menu-icon mdi mdi-minus-circle-outline"></span></button>'+
							'</span>'+
						'</div>'
				);
				
			});
		});
</script>
</head>
<body>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              
            </div>
          </div>
		  
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
              
                  <h4 class="card-title">Meeting Master</h4>                     
               <form action="<?php echo URLROOT; ?>/meeting/meeting_master/<?php echo $data['id'];?>" method="post">   
						<input type="hidden" name="id" value="<?php $data['id'];?>" class="form-control" >
						<input type="hidden" readonly name="lead_id" value="<?php echo $data['lead_id'];?>" class="form-control">                    
					  <div class="row">
					<div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Organizer Name<sup>*</sup></label>
						    <div class="col-sm-9">
                          <input type="text" readonly name="from_name" value="<?php echo $data['assignee'];?>" class="form-control">                    
                          </div>
                        </div>
                      </div>
					  </div>
					  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Organizer Email<sup>*</sup></label>
                          <div class="col-sm-9">
                              <input type="email" readonly name="fromemail" value="<?php echo $data['useremail'];?>" class="form-control" />                                              
                          </div>
                        </div>
                      </div>   
                     </div>
					 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Attended Name<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text" readonly  class='form-control' name="attendedname" id="attendedname" value="<?php echo $data['customername'];?>">                     
                                                                            
                          </div>
                        </div>
                      </div>   
                     </div>
					  <div class="row phone-list">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Attended Email<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text" class='form-control' value="<?php echo $data['customeremail'];?>" name='attendedemail[]' id="attendedemail">                     
                          </div>
                        </div>
						
                      </div>
					<button style="height: 31px!important;" type="button" class="btn btn-success btn-sm btn-add-phone"><span class="glyphicon glyphicon-plus"></span> + Add More</button>		  
                     </div>
					 
					 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Start Time<sup>*</sup></label>
                          <div class="col-sm-9">
							<input name="starttime" placeholder="Select Start Date Time" id="filter-date" type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" />
							</div>
						  <input type="hidden" id="dtp_input1" value="" /><br/>
                        </div>
                      </div>   
                     </div>
					  
					  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">End Time<sup>*</sup></label>
                          <div class="col-sm-9">
							<input type="text" placeholder="Select End Date Time" class='form-control' name="endtime" id="filter-date1" required="required" />  </div>
                        </div>
                      </div>   
                     </div>
					 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Subject<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text"  class='form-control' name="subject" id="subject" required="required">                     
                          </div>
                        </div>
                      </div>   
                     </div>
					 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Description<sup>*</sup></label>
                          <div class="col-sm-9">
                          <textarea rows="3" name="description" class='form-control' cols="50" placeholder="Meeting Notes"></textarea>    
                          </div>
                        </div>
                      </div>   
                     </div>
					 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Location<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text" name="location" class="form-control" id="location" />
                          </div>
                        </div>
                      </div>   
                     </div>
					 <label class="col-sm-2 col-form-label"></label>
                        <input type="submit"  class="btn btn-success mr-2" value="Send Invitation">
                        <button type="reset" class="btn btn-light">Cancel</button>
                  </form>            
            </div>
        </div>
    </div> 
	<div class="row">
	<div class="col-md-12">
		<div class="card">
		<div class="card-body">
			<div class="table-responsive">
			<table class="table table-hover dataTable table-striped" id="example" style="width:100%">
              <thead>
					<tr>
						  <th>S.No</th>
						  <th>Lead ID</th>  
              <th>Attendees</th>  
						  <th>From Date & Time</th> 						                   
						  <th>Subject</th>				  
						  <th>Description</th>				  
						  <th>Location</th>				  
					</tr>
              </thead`````>
              <tbody id="myTable">
			   <?php foreach($data['getmeeting'] as $meeting):?>
				 <tr>
					  <td><div class="wrap"><?php echo $meeting->id;?></div></td>
                    <td><div class="wrap"><?php echo $meeting->lead_id;?></div></td> 
                    <td><div class="wrap"><?php echo $meeting->to_address;?></div></td> 
                    <td><div class="wrap"><?php echo $meeting->startTime;?></div></td>                              
                    <td><div class="wrap"><?php echo $meeting->subject;?></div></td>        
                    <td><div class="wrap"><?php echo $meeting->description;?></div></td>        
                    <td><div class="wrap"><?php echo $meeting->location;?></div></td>        
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
   </div>  
</body>   
<script src="<?php echo URLROOT; ?>/public/js/jquery.js"></script>   
<script src="<?php echo URLROOT; ?>/public/js/jquery.datetimepicker.full.js"></script>   
<script>
            jQuery(document).ready(function () {
                'use strict';

                jQuery('#filter-date').datetimepicker();
            });
</script>
<script>
            jQuery(document).ready(function () {
                'use strict';

                jQuery('#filter-date1').datetimepicker();
            });
</script>


<script>
 $(document).ready(function() {
 $('#example').DataTable();
});
 </script>     
</html>