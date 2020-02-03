<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar1.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT;?>/public/fullcalendar/fullcalendar.min.css" />
<script src="<?php echo URLROOT;?>/public/fullcalendar/lib/jquery.min.js"></script>
<script src="<?php echo URLROOT;?>/public/fullcalendar/lib/moment.min.js"></script>
<script src="<?php echo URLROOT;?>/public/fullcalendar/fullcalendar.min.js"></script>
<script>
$(document).ready(function() {
    var interval = setInterval(function() {
        var momentNow = moment();
        $('#date-part').html(momentNow.format('DD MMMM YYYY') + ' '
                            + momentNow.format('dddd')
                             .substring(0,3).toUpperCase());
        $('#time-part').html(momentNow.format('hh:mm:ss A'));
    }, 100);
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
tr:nth-child( 2n ) 
{
  
  font-weight: bold;
}
tr:nth-child( 2n + 1 ) 
{
  background-color: #b8f1d5;
  font-weight: bold;
}
.stretch-card > .card:hover 
{
	-webkit-box-shadow: -1px 3px 31px -2px rgba(181,190,235,0.84);
	-moz-box-shadow: -1px 3px 31px -2px rgba(181,190,235,0.84);
	box-shadow: -1px 3px 31px -2px rgba(181,190,235,0.84);
	transition: box-shadow .3s;
	border-radius:10px;
}
.switch 
{
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}
.switch input 
{ 
  opacity: 0;
  width: 0;
  height: 0;
}
.slider 
{
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}
.slider:before 
{
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}
input:checked + .slider 
{
  background-color: #2196F3;
}
input:focus + .slider 
{
  box-shadow: 0 0 1px #2196F3;
}
input:checked + .slider:before 
{
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */

.slider.round 
{
  border-radius: 34px;
}

.slider.round:before 
{
  border-radius: 50%;
}
#date-part 
{
    font-size: 0.80em;
}
#time-part 
{
    font-size: 0.80em;
}
tr:nth-child( 2n ) 
{
	background-color:#ded3f6;
	font-weight: bold;
}
tr:nth-child( 2n + 1 ) 
{
  background-color: #b8f1d5;
  font-weight: bold;
}
</style>
<style>
#calendar {
    width: 602px;
    margin: 0 auto;
}

.response {
    height: 60px;
}

.success {
    padding: 10px 60px;
    border: #fff 1px solid;
    display: inline-block;
}
[data-link] {
  cursor: pointer;
}
</style>

<script>
$(document).ready(function() {
  $("[data-link]").click(function() {
    window.location.href = $(this).attr("data-link");
    return false;
  });
});
</script>
      <!-- partial -->
      <div class="main-panel">
	  <div class="row" style="left: 73%; position: relative;">
		<div class="col-sm-2" id='time-part'></div>
		<div class="col-sm-2" id='date-part'></div>
		</div>
        <div class="content-wrapper">

<div id="salesid">
<div class="row">
			   <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div style="background: linear-gradient(135deg, rgb(23, 234, 217) 0%, rgb(96, 120, 234) 100%); color: white;" class="card card-statistics">
                <div class="card-body" data-link="<?php echo URLROOT; ?>/Leads/salesleadlist_new">
                  <div class="clearfix">
                    <div class="float-left">
                      <img  class="img-sm rounded-circle mb-4 mb-md-0" src="<?php echo URLROOT; ?>/images/sales/commit.png" alt="profile image">
                    </div>
                    <div class="float-right">
                      <p style="font-size:18px;" class="mb-0 text-right">Commit</p>
					  
					  <div class="fluid-container">                                              
                          <a href="<?php echo URLROOT; ?>/Leads/salesleadlist_new" style="color: white; text-decoration: none;">
					
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $data['commit'];?></h3> </a>                      
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div style="background: linear-gradient(135deg, rgb(177, 234, 77) 0%, rgb(69, 149, 34) 100%); color: white;" class="card card-statistics">
                <div class="card-body" data-link="<?php echo URLROOT; ?>/Leads/salesleadlist_new" >
                  <div class="clearfix">
                    <div class="float-left">
                      <img class="img-sm rounded-circle mb-4 mb-md-0" src="<?php echo URLROOT; ?>/images/sales/upside.png" alt="profile image">
                    </div>
                    <div class="float-right">
                      <p style="font-size:18px;" class="mb-0 text-right">Upside</p>
					  
					  <div class="fluid-container">                                              
                          <a href="<?php echo URLROOT; ?>/Leads/salesleadlist_new" style="color: white; text-decoration: none;">
					
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $data['upside'];?></h3> </a>                      
                      </div>
                    </div>
                  </div>
                 <!-- <p class="text-muted mt-3 mb-0">
                     Upside
                  </p>-->
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div style="background: linear-gradient(135deg, rgb(91, 36, 122) 0%, rgb(27, 206, 223) 100%); color: white;" class="card card-statistics">
                <div class="card-body" data-link="<?php echo URLROOT; ?>/Leads/salesleadlist_new">
                  <div class="clearfix">
                    <div class="float-left">
                       <img class="img-sm rounded-circle mb-4 mb-md-0" src="<?php echo URLROOT; ?>/images/sales/lead.png" alt="profile image">
                    </div>
                    <div class="float-right">
                      <p style="font-size:18px;" class="mb-0 text-right">Lead</p>
                      <div class="fluid-container">                         
             <a href="<?php echo URLROOT; ?>/Leads/salesleadlist_new" style="color: white; text-decoration: none;">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $data['leadcount'];?></h3> </a>
                      </div>
                    </div>
                  </div>
                 <!-- <p class="text-muted mt-3 mb-0">
                    Lead
                  </p>-->
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div  style="background: linear-gradient(135deg, rgb(245, 81, 95) 0%, rgb(161, 5, 29) 100%); color: white;" class="card card-statistics">
                <div class="card-body" data-link="<?php echo URLROOT; ?>/Leads/salesleadlist_new">
                  <div class="clearfix">
                    <div class="float-left">
                       <img class="img-sm rounded-circle mb-4 mb-md-0" src="<?php echo URLROOT; ?>/images/sales/cold.png" alt="profile image">
                    </div>
                    <div class="float-right">
                      <p style="font-size:18px;" class="mb-0 text-right">Cold</p>
                      <div class="fluid-container">   
                         
                <a href="<?php echo URLROOT; ?>/Leads/salesleadlist_new" style="color: white; text-decoration: none;">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $data['cold'];?></h3> </a>
                      </div>
                    </div>
                  </div>
                  <!--<p class="text-muted mt-3 mb-0">
                    Cold
                  </p>-->
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div style="background: linear-gradient(135deg, rgb(206, 159, 252) 0%, rgb(115, 103, 240) 100%); color: white;" class="card card-statistics">
                <div class="card-body" data-link="<?php echo URLROOT; ?>/Leads/wonlist" style="color: white; text-decoration: none;">
                  <div class="clearfix">
                    <div class="float-left">
                      <i style="font-size: 48px;" class="mdi mdi-thumb-up-outline"></i>
                    </div>
                    <div class="float-right">
                      <p style="font-size:18px;" class="mb-0 text-right">Won</p>
                      <div class="fluid-container"> 
                         
               <a href="<?php echo URLROOT; ?>/Leads/wonlist" style="color: white; text-decoration: none;">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $data['wonlead'];?></h3></a>
                      </div>
                    </div>
                  </div>
                 <!-- <p  style="font-size:18px;" class="text-muted mt-3 mb-0">Won</p>-->
                </div>
              </div>
            </div>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div style="background: linear-gradient(135deg, rgb(255, 87, 185) 0%, rgb(167, 4, 253) 100%); color: white;" class="card card-statistics">
                <div class="card-body" data-link="<?php echo URLROOT; ?>/Leads/postponedlist" style="color: white; text-decoration: none;">
                  <div class="clearfix">
                    <div class="float-left">
                      <i style="font-size: 48px;" class="mdi mdi-calendar-question"></i>
                    </div>
                    <div class="float-right">
                      <p style="font-size:18px;" class="mb-0 text-right">Postponed</p>
                      <div class="fluid-container"> 
                         
             <a href="<?php echo URLROOT; ?>/Leads/postponedlist" style="color: white; text-decoration: none;">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $data['postpondlead'];?></h3></a>
                      </div>
                    </div>
                  </div>
                 <!-- <p class="text-muted mt-3 mb-0">
                Postponed
                  </p>-->
                </div>
              </div>
            </div>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div style="background: linear-gradient(135deg, rgb(252, 223, 138) 0%, rgb(243, 131, 129) 100%); color: white;" class="card card-statistics">
                <div class="card-body" data-link="<?php echo URLROOT; ?>/Leads/droplist" style="color: white; text-decoration: none;">
                  <div class="clearfix">
                    <div class="float-left">
                      <i style="font-size: 48px;" class="mdi mdi-thumb-down-outline"></i>
                    </div>
                    <div class="float-right">
                      <p style="font-size:18px;" class="mb-0 text-right">Dropped</p>
                      <div class="fluid-container"> 
                         
              <a href="<?php echo URLROOT; ?>/Leads/droplist" style="color: white; text-decoration: none;">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $data['droppedlead'];?></h3></a>
                      </div>
                    </div>
                  </div>
                  <!--<p class="text-muted mt-3 mb-0">
                Dropped
                  </p>-->
                </div>
              </div>
            </div>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div style="background: linear-gradient(135deg, rgb(24, 78, 104) 0%, rgb(87, 202, 133) 100%); color:white;" class="card card-statistics">
                <div class="card-body" data-link="<?php echo URLROOT; ?>/Leads/lostlist" style="color: white; text-decoration: none;">
                  <div class="clearfix">
                    <div class="float-left">
                      <i style="font-size: 48px;" class="mdi mdi-alert-outline"></i>
                    </div>
                    <div class="float-right">
                      <p style="font-size:18px;" class="mb-0 text-right">Lost</p>
                      <div class="fluid-container"> 
                         
               <a href="<?php echo URLROOT; ?>/Leads/lostlist" style="color: white; text-decoration: none;">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $data['lostlead'];?></h3></a>
                      </div>
                    </div>
                  </div>
                 <!-- <p class="text-muted mt-3 mb-0">
                Lost
                  </p>-->
                </div>
              </div>
            </div>
		   </div>
		  <!-- <div class="row">
		   <div class="col-md-12">
		   <div class="col-md-6">
		   <div class="response"></div>
		   <div id="calendar"></div>
		   </div>
		   <div class="col-md-4">
		   <div class="card card-statistics">
                <div class="card-body">
                  
                </div>
              </div>
		   </div>
		   </div>
		   </div>-->
		   <div class="row">
		   <div class="col-md-6">
		   <div class="card">
		   <h4 class="todo-title text-warning"><i class="fa fa-warning"></i>Today's Task</h4>
		   <hr class="hr-panel-heading-dashboard">
		   <?php foreach($data['todolist'] as $list):?>
		   <ul>
		   <li><span style="font-weight:700!important">Lead ID</span>:&emsp;<a href="<?php echo URLROOT;?>/leads/leadupdate/<?php echo $list->id;?>"><?php echo $list->lead_id;?></a><br>
		   <span style="font-weight:700!important">Next Action</span>:&emsp;<?php echo $list->nextaction;?><br>
		   <span style="font-weight:700!important">Customer Name</span>:&emsp;<?php echo $list->customername;?><br>
          <span style="font-weight:700!important">Closure Date</span>:&emsp;<?php echo $list->closuredate;?><br>
		   <span style="font-weight:700!important">Order Value</span>:&emsp;<?php echo $list->ordervalue;?>
		   </li>
		   </ul>
		   <?php endforeach;?>
		   </div>
		   </div>
		  
		   </div>
		
	</div>
 </div>                     
	</div>
      </div>
   </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
</div>