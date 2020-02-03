<?php  require APPROOT . '/views/inc/header.php'; ?>
<?php //require APPROOT . '/views/inc/navbar_plain.php'; ?> 

<div class="main-panel">
	<div class="content-wrapper" style=" background: #07316f;">   
		<div class="row purchace-popup">
            <div class="col-12">
          
            </div>
		</div>
		<div class="col-12 grid-margin">
			<div class="card" style="background-color: #0a798b;">
				<div class="card-body">
                <?php flash('accept_success'); ?>
                  <h4 class="card-title" style="color: #eaf8b4;margin-bottom: 59px;font-size: 22px;padding-left:270px;">how would you rate your experience with our service?</h4>                     
					<form action="<?php echo URLROOT; ?>/helpdesk/customer_feedback" method="post">   
						<div class="row" style="color: #ffffff;" >
                        <input type="hidden" name="ticketID" value="<?php echo $data['ticketID']; ?>" >
                        <input type="hidden" name="q1" value="how would you rate your experience with our service?">
					<div class="col-md-2">
								
							</div> 						
							<div class="col-md-2">
								<div class="form-radio">
									<label class="form-check-label">
									<input type="radio" class="form-check-input" name="answer" id="Satisfied" value="Satisfied" > Satisfied
									<i class="input-helper"></i></label>
								</div>
							</div>   
							<div class="col-md-2">
								<div class="form-radio">
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="answer" id="Very satisfied" value="Very satisfied" > Very satisfied
										<i class="input-helper"></i></label>
								</div>
							</div>  
							
							<div class="col-md-2">
								<div class="form-radio">
								  <label class="form-check-label">
									<input type="radio" class="form-check-input" name="answer" id="DisSatisfied" value="DisSatisfied" > DisSatisfied
								  <i class="input-helper"></i></label>
								</div>
							</div>  
							<div class="col-md-2">
								<div class="form-radio">
								  <label class="form-check-label">
									<input type="radio" class="form-check-input" name="answer" id="Very Dissatisfied" value="Very Dissatisfied" > Very Dissatisfied
								  <i class="input-helper"></i></label>
								</div>
							</div>  
						</div>
							<br>  <br>
			  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
															 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
															 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
 
                       <input type="submit"  class="btn btn-success mr-2" value="Submit">        
                  </form>            
				</div>
             </div>
        </div> 
              
<?php require APPROOT . '/views/inc/footer.php'; ?>
              
                         
         
        </div>
		</div>