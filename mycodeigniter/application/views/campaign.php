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
<?php echo form_open('product/campaign') ?><br>
<h2 style="text-align:center">Create Campaign</h2>
<br>

<div class="container background">
<br>
<div class="form-group">
		<div class="row">
				<label class="col-sm-4 col-form-label">Campaign Type</label>
			<div class="col-md-6">
				<select class="form-control" name="campaigntype">
				<option selected>Select Type</option>
				<option value="Inbound">Inbound</option>
				<option value="Outbound">Outbound</option>
				</select>
			</div>
		</div>
	</div>
<div class="form-group">
		<div class="row">
				<label class="col-sm-4 col-form-label">Campaign Name</label>
			<div class="col-md-6">
				<?php echo form_input('name','',array('class'=>'form-control','placeholder'=>'Campaign Name')) ?>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
				<label class="col-sm-4 col-form-label">Campaign Description</label>
			<div class="col-md-6">
				<textarea class="form-control" placeholder="Description" name="description"><?php echo set_value('description'); ?></textarea>
			</div>
		</div>
	</div>
	<div class="pos">
	<?php echo form_submit('submit', 'Create Campaign!',"class='btn btn-primary'"); ?></div>
	<?php echo form_close(); ?>
	</div>