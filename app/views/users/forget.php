<?php require APPROOT . '/views/inc/login_header.php'; ?>
<div class="limiter">
		<div class="container-login100">	
			<div class="wrap-login100">			
				<div class="login100-pic js-tilt" data-tilt>				
					<img src="<?php echo URLROOT; ?>/login/images/forgot.png" alt="IMG"><br><br>
					
				</div>                               
                <form action="<?php echo URLROOT; ?>/users/forget" method="post" class="login100-form validate-form">
			
                <?php flash('forget_password'); ?>
				<?php flash('user_Notfound'); ?>
				<img src="<?php echo URLROOT; ?>/images/logo2.png" alt="logo" />
 <span class="login100-form-title" style="padding-bottom: 15px;">
						Forgot Password? <br>
						<p>Enter the email address associated with your account. </p>
			    </span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input type="email" name="email" class="input100 <?php echo(!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                       <?php echo $data['email_err']; ?>
                        <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
				</div>
                   
             
                <div class="container-login100-form-btn">                      
                  <input type="submit" value="Submit" class="login100-form-btn">                            
                </div>
                

                
                </form>
            </div>
        </div>
    </div>
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
    <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>