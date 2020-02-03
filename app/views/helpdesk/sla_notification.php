
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/helpdesk.php'; ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/datatables/dataTables.bootstrap.css"> 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="<?php echo URLROOT; ?>/public/datatables/jquery.dataTables.min.js"></script>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              
            </div>
          </div>         
          <div class="row">
   <div class="col-lg-12 grid-margin stretch-card">
     <div class="card">
        <div class="card-body">
           <h4 class="card-title"> SLA Notification</h4>                 
              <div class="table-responsive">
                <table class="table table-hover dataTable table-striped" id="example" style="width:100%">
                  <thead>
                    <tr>
                     <th>Client ID</th>                     
                     <th>Ticket Id</th>              
                     <th> Assigned to</th>
                     <th>Created Date</th>
                     <th>Severity</th>
                     <th>L1</th>
                     <th>L2</th>
                     <th>L3</th>
                     <th>L4</th>
                    
                   </tr>                     
                            
                 </thead>
                 <tbody id="myTable">
                 <?php foreach($data['tickets'] as $tickets) : ?> 
                     
                   <tr>                     
                    <td><?php echo $tickets->clientID; ?></td>                 
                    <td><?php echo $tickets->ticketID; ?></td>             
                    <td><?php echo $tickets->assigned_to;?></td>                   
                    <td><?php echo $tickets->created_at;?></td>   
                    <td><?php echo $tickets->severity; ?></td>
                   <?php  if($tickets->l1=='0'){ ?>
                    <td><?php 
                      $ticketID =$tickets->ticketID;
                      $clientID=$tickets->clientID;
                      $severity =$tickets->severity;
                      $process = $tickets->process;                    
        $level1 = $this->ticketModel->getsladuration($clientID,$severity,$process);  
       
      echo $level1; 
      ?>hours
       </td>
       <?php
      }
       else{
        ?>
      <td style=" background-color: red; color: white;">
        <?php 
         $ticketID =$tickets->ticketID;
         $clientID=$tickets->clientID;
         $severity =$tickets->severity;
         $process = $tickets->process;                    
$level1 = $this->ticketModel->getsladuration($clientID,$severity,$process);  
        echo $level1; ?> hours
        </td>
        <?php       
      }
      ?>      
                
      
                <?php  if($tickets->l2=='0'){ ?>
                    <td><?php 
                     
                     
      $level2 = $this->ticketModel->getlevel2duration($clientID,$severity,$process); 
         echo $level2;
      ?>hours
       </td>
       <?php
      }
       else{
        ?>
      <td style=" background-color: red; color: white;">
        <?php 
          $level2 = $this->ticketModel->getlevel2duration($clientID,$severity,$process); 
        echo   $level2; ?>hours
        </td>
        <?php       
      }
      ?>      
       <?php  if($tickets->l3=='0'){ ?>
                    <td><?php 
                    
     $level3 = $this->ticketModel->getlevel3duration($clientID,$severity,$process);
     echo $level3;
      ?>hours
       </td>
       <?php
      }
       else{
        ?>
      <td style=" background-color: red; color: white;">
        <?php 
         $level3 = $this->ticketModel->getlevel3duration($clientID,$severity,$process);
        echo $level3; ?> hours
        </td>
        <?php       
      }
      ?>      
       <?php  if($tickets->l4=='0'){ ?>
                    <td><?php 
                     
     $level4 = $this->ticketModel->getlevel4duration($clientID,$severity,$process);
       echo $level4;
      ?>hours
       </td>
       <?php
      }
       else{
        ?>
      <td style=" background-color: red; color: white;">
        <?php
         $level4 = $this->ticketModel->getlevel4duration($clientID,$severity,$process);
         echo $level4; ?>hours
        </td>
        <?php       
      }
      ?> 		
       </tr>                  
					<?php endforeach; ?>  
				  </tbody>
				</table>
			  </div>
			</div>
		  </div>
		</div>
	  </div> 
    <!--------------------------------------------------------------------------------------------------------- -->  
    <!--------------------------------------------------------------------------------------------------------- -->              
        </div>
      </div>
<script>
 $(document).ready(function() 
 {
	$('#example').DataTable();
 });
 </script>
<style type="text/css">
.menu-icon 
{
    margin-right: 1.25rem;
    width: 16px;
    line-height: 1;
    font-size: 18px;
    color: black;
}
</style>
<?php require APPROOT . '/views/inc/footer.php'; ?>
              
                         
         
              </div>