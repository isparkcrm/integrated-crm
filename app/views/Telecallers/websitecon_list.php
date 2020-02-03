<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar1.php'; ?>

<div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              
            </div>
          </div>
          <?php foreach($data['leads'] as $leads) : ?> 
          <div class="card card-body mb-3">
       <div class="bg-light p-2 mb-3">
       <strong> <?php echo $leads->subject; ?></strong> <br>
      Lead ID <strong> <?php echo $leads->lead_id; ?></strong>  From <strong> <?php echo $leads->email; ?></strong> 
      </div>
      <p class="card-text">  Message : </p>
	  <textarea rows="8" cols="50" class="form-control"><?php echo $leads->description; ?></textarea>
     <!-- <a href="show_tickets.php" class="btn btn-dark">More</a> -->
     <p class="card-text">Date:<strong> <?php echo $leads->created_at; ?></strong></p>
    </div>
  
    <?php  
endforeach; ?>    

              
<?php require APPROOT . '/views/inc/footer.php'; ?>
              
                         
         
        </div>
