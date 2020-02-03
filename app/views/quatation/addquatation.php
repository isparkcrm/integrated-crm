<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar1.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT;?>/public/css/summernote/dist/summernote.css">
<style>
.popover-content
{
	display:none;
}
</style>
<div class="main-panel">
<div class="content-wrapper">
	<div class="col-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Quation Master</h4>
				<form action="<?php echo URLROOT;?>/Quatations/addquatation" method="post" enctype="multipart/form-data">	
				<div class="row">
					<div class="col-sm-6">
					 <label class="col-sm-12 col-form-label">Search Customer<sup>*</sup></label>
					<div class="form-group row">
					 
						<div class="col-sm-9">
						 <input type="text" class="form-control" name="customername" value="">   
						</div>
					</div>
					</div>
					<div class="col-sm-3">
					<label class="col-sm-12 col-form-label">Quote Number<sup>*</sup></label>
					<div class="form-group row">
					  <div class="col-sm-9">
						 <input type="text" class="form-control" name="quotenumber" value="">   
						</div>
					</div>
					</div>
					<div class="col-sm-3">
					<label class="col-sm-12 col-form-label">Reference<sup>*</sup></label>
					<div class="form-group row">
					  <div class="col-sm-9">
						 <input type="text" class="form-control" placeholder="Reference #" name="reference" value="">   
						</div>
					</div>
					</div>
				</div>
					<div class="row">
					<div class="col-sm-6">
					 <label class="col-sm-12 col-form-label">Client Details</label>
					 <hr>
					<div class="form-group row">
					</div>
					</div>
					<div class="col-sm-3">
					<label class="col-sm-12 col-form-label">Quote Date<sup>*</sup></label>
					<div class="form-group row">
					  <div class="col-sm-9">
						 <input type="date" class="form-control" name="quotedate" value="">   
						</div>
					</div>
					</div>
					<div class="col-sm-3">
					<label class="col-sm-12 col-form-label">Quote Validity<sup>*</sup></label>
					<div class="form-group row">
					  <div class="col-sm-9">
						 <input type="date" class="form-control" name="quotevalidity" value="">   
						</div>
					</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
					 
					</div>
					<div class="col-sm-3">
					<label class="col-sm-12 col-form-label">Tax<sup>*</sup></label>
					<div class="form-group row">
					  <div class="col-sm-9">
						<select class="form-control" style="border-radius:14px">
						<option selected="selected">--Select--</option>
						</select>
						</div>
					</div>
					</div>
					<div class="col-sm-3">
					<label class="col-sm-12 col-form-label">Discount<sup>*</sup></label>
					<div class="form-group row">
					  <div class="col-sm-9">
						 <select class="form-control">
						<option selected="selected">--Select--</option>
						</select>  
						</div>
					</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
					 
					</div>
					<div class="col-sm-6">
					<label class="col-sm-12 col-form-label">Quote Note<sup>*</sup></label>
					<div class="form-group row">
					  <div class="col-sm-11">
						<textarea class="form-control" rows="2" cols="60"></textarea>
						</div>
					</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-sm-12">
					<label class="col-sm-12 col-form-label">Proposal Message<sup>*</sup></label>
					<div class="form-group row">
					  <div class="col-sm-11">
						<textarea name="proposalmgs" rows="4" cols="5" class="form-control summernote"></textarea>
						</div>
					</div>
					</div>
					
				</div>
			    </form>
			</div>
		</div>
	</div>
	<script src="<?php echo URLROOT;?>/public/css/summernote/dist/summernote.min.js"></script>
	<script>
         $('.summernote').summernote({
                height: 300
				
              });
    </script>
	<?php require APPROOT . '/views/inc/footer.php'; ?>
	</div>
	