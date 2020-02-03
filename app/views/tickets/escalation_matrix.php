
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/service_head.php'; ?>
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
                     <th>Escalation Level</th>
                     
                    
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
                      $campaign = $tickets->campaignname;                         
        $level1 = $this->ticketModel->getsladuration($clientID,$severity,$process);  
        $escalation = $this->ticketModel->getL1Email($campaign); 
        $l1_email=$escalation->email; 
        $l1_number=$escalation->number; 

        $data =
        [
         'email' => $tickets->email,         
         'number' =>  $tickets->number, 
         'title' => $tickets->subject, 
         'l1_email'=>$l1_email,
         'l1_number'=>$l1_number,     
        ];
        $start = $tickets->created_at;
        date_default_timezone_set("Asia/Kolkata"); 
        $end = date("Y-m-d H:i:s");
        if($start > $end){
        $diff = abs(strtotime($end) - strtotime($start));
        }else{
          $diff = abs(strtotime($start) - strtotime($end));
        }
        $duration=$diff/3600;
        $go= (int)round($duration);
        
        if($go > $level1){
            $this->ticketModel->UpdateL1flag($ticketID,$data,$campaign);
            $this->ticketModel->AddL1time($ticketID,$end);
            echo "Level 1 crossed"; 
        } 
        ?>
        
       </td>
       <?php
      }
       else if($tickets->l1=='1'){
        ?>
       <td><?php 
                      $ticketID =$tickets->ticketID;
                      $clientID=$tickets->clientID;
                      $severity =$tickets->severity;
                      $process = $tickets->process;   
                      $campaign = $tickets->campaignname;                           
        $level2 = $this->ticketModel->getlevel2duration($clientID,$severity,$process); 


        $escalation = $this->ticketModel->getL2Email($campaign); 
        $l2_email=$escalation->email; 
        $l2_number=$escalation->number; 

        $data =
        [
         'email' => $tickets->email,         
         'number' =>  $tickets->number, 
         'title' => $tickets->subject, 
         'l2_email'=>$l2_email,
         'l2_number'=>$l2_number,     
        ];

        $start =$this->ticketModel->getlevel1time($ticketID); 
        date_default_timezone_set("Asia/Kolkata"); 
        $end = date("Y-m-d H:i:s");
        if($start > $end){
        $diff = abs(strtotime($end) - strtotime($start));
        }else{
          $diff = abs(strtotime($start) - strtotime($end));
        }
        $duration=$diff/3600;
        $go= (int)round($duration);
        if($go > $level2){
            $this->ticketModel->UpdateL1flagas2($ticketID);
            $this->ticketModel->UpdateL2flag($ticketID,$data,$campaign);
            $this->ticketModel->AddL2time($ticketID,$end); 
            echo "Level 2 crossed"; 
        } 
        else{
          echo "Level 1 crossed"; 
        }
        ?>
     
       </td>
        <?php       
      }else if($tickets->l2=='1'){
        ?>
       <td><?php 
                      $ticketID =$tickets->ticketID;
                      $clientID=$tickets->clientID;
                      $severity =$tickets->severity;
                      $process = $tickets->process; 
                      $campaign = $tickets->campaignname;                            
        $level3 = $this->ticketModel->getlevel3duration($clientID,$severity,$process); 
        $escalation = $this->ticketModel->getL3Email($campaign); 
      
        $l3_email=$escalation->email; 
        $l3_number=$escalation->number; 

        $data =
        [
         'email' => $tickets->email,         
         'number' =>  $tickets->number, 
         'title' => $tickets->subject, 
         'l3_email'=>$l3_email,
         'l3_number'=>$l3_number,     
        ];

        $start =$this->ticketModel->getlevel2time($ticketID); 
        date_default_timezone_set("Asia/Kolkata"); 
        $end = date("Y-m-d H:i:s");
        if($start > $end){
        $diff = abs(strtotime($end) - strtotime($start));
        }else{
          $diff = abs(strtotime($start) - strtotime($end));
        }
        $duration=$diff/3600;
        $go= (int)round($duration);
        if($go > $level3){
          $this->ticketModel->UpdateL2flagas2($ticketID);
            $this->ticketModel->UpdateL3flag($ticketID,$data,$campaign);
            $this->ticketModel->AddL3time($ticketID,$end); 
            echo "Level 3 crossed"; 
        } 
        else{
          echo "Level 2 crossed"; 
        }
        ?>
       
       </td>
        <?php       
      }
      else if($tickets->l3=='1'){
        ?>
       <td><?php 
                      $ticketID =$tickets->ticketID;
                      $clientID=$tickets->clientID;
                      $severity =$tickets->severity;
                      $process = $tickets->process; 
                      $campaign = $tickets->campaignname;                             
        $level4 = $this->ticketModel->getlevel4duration($clientID,$severity,$process); 
        $level3 = $this->ticketModel->getlevel3duration($clientID,$severity,$process); 
        $escalation = $this->ticketModel->getL4Email($campaign); 
        $l4_email=$escalation->email; 
        $l4_number=$escalation->number; 

    $data =
        [
         'email' => $tickets->email,         
         'number' =>  $tickets->number, 
         'title' => $tickets->subject, 
         'l4_email'=>$l4_email,
         'l4_number'=>$l4_number,     
        ];

        
        $start =$this->ticketModel->getlevel3time($ticketID); 
        date_default_timezone_set("Asia/Kolkata"); 
        $end = date("Y-m-d H:i:s");
        if($start > $end){
        $diff = abs(strtotime($end) - strtotime($start));
        }else{
          $diff = abs(strtotime($start) - strtotime($end));
        }
        $duration=$diff/3600;
        $go= (int)round($duration);
        if($go > $level4){
          $this->ticketModel->UpdateL3flagas2($ticketID);
            $this->ticketModel->UpdateL4flag($ticketID,$data,$campaign);
            $this->ticketModel->AddL4time($ticketID,$end); 
            echo "Level 4 crossed"; 
        } 
        else{
          echo "Level 3 crossed"; 
        }
        ?>
     
       </td>
        <?php       
      }
      else{
      ?>      
         <td> Level 4 Crossed</td>        
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