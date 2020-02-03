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
<?php echo form_open('product/createservice') ?>
<h2 style="text-align:center">Service Master</h2>
<div class="container background">
<br>
<div class="form-group">
		<div class="row">
				<label class="col-sm-4 col-form-label">Service Name</label>
			<div class="col-md-6">
				<?php echo form_input('servicename','',array('class'=>'form-control','placeholder'=>'Name')) ?>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
				<label class="col-sm-4 col-form-label">Description</label>
			<div class="col-md-6">
				<?php echo form_input('description','',array('class'=>'form-control','placeholder'=>'Description')) ?>
			</div>
		</div>
	</div>
	<div class="pos">
	<?php echo form_submit('submit', 'Add Service!',"class='btn btn-primary'"); ?></div>
	<?php echo form_close(); ?>
	</div>