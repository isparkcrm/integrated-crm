<?php require APPROOT . '/views/inc/login_header.php'; ?>
<div class="limiter">

		<div class="container-login100">	
			<div class="wrap-login100">			
				<div class="login100-pic js-tilt" data-tilt>				
					<img src="<?php echo URLROOT; ?>/login/images/img-01.gif" alt="IMG"><br><br>
					<h2 style="text-align:center;">HELP DESK</h2>
				</div> 
                                               
                <form action="<?php echo URLROOT; ?>/users/index_new" method="post" class="login100-form validate-form">
				<?php flash('login_limit'); ?>
                <?php flash('disable_user'); ?>
                <?php flash('password_incorrect'); ?>
                <?php flash('campaign_message'); ?>
				<img src="<?php echo URLROOT; ?>/images/logo2.png" alt="logo" />
                            
                
               
                <span class="login100-form-title">
						Helpdesk Login
                       
			    </span> 

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input type="email" name="email" class="input100 <?php echo(!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                       <?php echo $data['email_err']; ?>
                        <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
				</div>
                   
                <div class="wrap-input100 validate-input" data-validate = "Password is required">                       
                        <input type="password" name="password" class="input100 <?php echo(!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                        <?php echo $data['password_err']; ?>
                        <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
				</div>
                <div class="container-login100-form-btn">                      
                  <input type="submit" value="Login" class="login100-form-btn">                            
                </div>
                <div class="form-group d-flex justify-content-between">
                 
                  <a href="<?php echo URLROOT; ?>/users/forget" class="text-small forgot-password text-black">Forgot Password</a> 
                 
                </div>
              <!--  <div class="form-group d-flex justify-content-between">        
                  <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-info">Sign UP</a> 
                </div> -->
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