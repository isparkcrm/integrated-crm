<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
  .background {
	  background-color: aliceblue;
  }
  .pos{
	  margin-left: 34%;
  }
  </style>
</head>
<?php echo form_open('product/save') ?>
<h2 style="text-align:center">Web Ticket</h2>
<div class="container background">
<br>
<div class="form-group">
		<div class="row">
				<label class="col-sm-4 col-form-label">Name</label>
			<div class="col-md-6">
				<?php echo form_input('name','',array('class'=>'form-control','placeholder'=>'Name')) ?>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
				<label class="col-sm-4 col-form-label">Subject</label>
			<div class="col-md-6">
				<?php echo form_input('subject','',array('class'=>'form-control','placeholder'=>'subject')) ?>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<label class="col-sm-4 col-form-label">Process</label>
		<div class="col-md-6">
		<?php echo form_input('service','',array('class'=>'form-control','placeholder'=>'Process')) ?>
		</div>
		</div>
	</div>
	<div class="form-group">
	<div class="row">
		<label class="col-sm-4 col-form-label">Email</label>
		<div class="col-md-6"><?php echo form_input('email','',array('class'=>'form-control','placeholder'=>'Email')) ?>
		</div></div></div>
		<div class="form-group">
	<div class="row">
		<label class="col-sm-4 col-form-label">Contact Number</label>
		<div class="col-md-6"><?php echo form_input('number','',array('class'=>'form-control','placeholder'=>'Number')) ?>
		</div>
		</div>
		</div>
	<div class="pos">
	<?php echo form_submit('submit', 'Create Ticket!',"class='btn btn-primary'"); ?></div>
	<?php echo form_close(); ?>
	</div>