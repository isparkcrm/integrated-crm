<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/service_head.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT;?>/public/css/summernote/dist/summernote.css">
<style>
.popover-content
{
	display:none;
}
</style>

<div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              
            </div>
          </div>
          <?php foreach($data['tickets'] as $tickets) : ?> 
          <div class="card card-body mb-3" >
       <div class="bg-light p-2 mb-3" style="font-size: 12px; font-weight: bold;">
       Subject: <?php echo $tickets->subject; ?><br>
         From : <?php echo $tickets->from_email; ?> <br> 
           To : <?php echo $tickets->to_email; ?>
        </div>
     
        <textarea  rows="10" cols="50" class="card-text" style="font-size: 12px; border: none;"> <?php echo $tickets->description;?></textarea> 
          
            
     <!-- <a href="show_tickets.php" class="btn btn-dark">More</a> -->
     <p style="font-size: 12px;" class="card-text">Date:<strong> <?php echo $tickets->created_at; ?></strong></p>
      <?php 
      if($tickets->attachment==''){
        ?>
       <p style="font-size: 12px;" class="card-text">Attachment:<strong><?php echo " No attachments"; ?></strong></p>
       <?php
      }
      else{
        ?>
         <p style="font-size: 12px;" class="card-text">Attachment:<strong><?php echo $tickets->attachment; ?> </strong>  <a href="<?php echo URLROOT; ?>/email_campaign/<?php echo $tickets->attachment; ?>" style="padding-left: 10px;" target="_blank">Download</a>   </p>
         <?php
      }
     ?>
    </div>
  
    <?php  
endforeach; ?>    

              
<?php require APPROOT . '/views/inc/footer.php'; ?>
              
 <script src="<?php echo URLROOT;?>/public/css/summernote/dist/summernote.min.js"></script>

   
         
		  <script type="text/javascript">
      (function(jQuery){
           $('input').iCheck({
              checkboxClass: 'icheckbox_flat-red',
              radioClass: 'iradio_flat-red'
            });

              $('.summernote').summernote({
                height: 300
				
              });
        })(jQuery);
     </script>                        
         
        </div>