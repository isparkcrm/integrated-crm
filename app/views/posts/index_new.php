<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT;?>/public/fullcalendar/fullcalendar.min.css" />
<script src="<?php echo URLROOT;?>/public/fullcalendar/lib/jquery.min.js"></script>
<script src="<?php echo URLROOT;?>/public/fullcalendar/lib/moment.min.js"></script>
<script src="<?php echo URLROOT;?>/public/fullcalendar/fullcalendar.min.js"></script>
<script type="text/javascript">
function noBack(){window.history.forward();}
noBack();
window.onload=noBack;
window.onpageshow=function(evt){if(evt.persisted)noBack();}
window.onunload=function(){void(0);}
</script>
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
<script>

$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: "fetch-event.php",
        displayEventTime: false,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt('Event Title:');

            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                $.ajax({
                    url: 'add-event.php',
                    data: 'title=' + title + '&start=' + start + '&end=' + end,
                    type: "POST",
                    success: function (data) {
                        displayMessage("Added Successfully");
                    }
                });
                calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                true
                        );
            }
            calendar.fullCalendar('unselect');
        },
        
        editable: true,
        eventDrop: function (event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: 'edit-event.php',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                        type: "POST",
                        success: function (response) {
                            displayMessage("Updated Successfully");
                        }
                    });
                },
        eventClick: function (event) {
            var deleteMsg = confirm("Do you really want to delete?");
            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: "delete-event.php",
                    data: "&id=" + event.id,
                    success: function (response) {
                        if(parseInt(response) > 0) {
                            $('#calendar').fullCalendar('removeEvents', event.id);
                            displayMessage("Deleted Successfully");
                        }
                    }
                });
            }
        }

    });
});

function displayMessage(message) {
	    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
}
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
</style>
<script>
 $(document).ready(function(){
	
	 $('#switch').on('change', function() {
		  
      if ( this.value == 'Sales')
      {
		$("#salesid").show();
		$("#serviceid").hide();
      }
	  else 
	  {
		  $("#salesid").hide();
		  $("#serviceid").show();
	  }
    });
	
	
 });
 </script>
 <script>
 $(document).ready(function(){
	
	 $('#switch').on('change', function() {
		  
      if ( this.value == 'Service')
      {
		$("#salesid").hide();
		$("#serviceid").show();
      }
	  else 
	  {
		  $("#salesid").show();
		  $("#serviceid").hide();
	  }
    });
	
	
 });
 </script>
 
 <script>
$(document).ready(function() {
  $("[data-link]").click(function() {
    window.location.href = $(this).attr("data-link");
    return false;
  });
});
</script>
 <style>
 [data-link] {
  cursor: pointer;
}
 </style>
      <!-- partial -->
      <div class="main-panel">
	  <div class="row" style="left: 73%; position: relative;">
		<div class="col-sm-2" id='time-part'></div>
		<div class="col-sm-2" id='date-part'></div>
		</div>
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-3">
			<label>Sales Dashboard</label>
            <select id="switch" class="form-control">
			<option value="Select" selected="selected" disabled="disabled">Select</option>
			<option value="Sales">Sales</option>
			<option value="Service">Service</option>
			</select>
			</div>
          </div>         
<div id="serviceid" style="display:none;">   
   <div class="row">
		
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                     <svg width="40%" height="40%" viewBox="0 0 40 40" class="donut">
							<circle class="donut-segment" cx="20" cy="20" r="16" fill="transparent" stroke-width="6" stroke-dasharray="90 60" stroke-dashoffset="139" style="stroke: #e90000;"></circle>
							<g class="donut-text" transform="translate(20, 22)" >
								<text>
									<tspan  text-anchor="middle" class="donut-label">95%</tspan>   
								</text>
							</g>
						</svg>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Critical</p>
					  
					  <div class="fluid-container">                                              
                          <a href="<?php echo URLROOT; ?>/posts/reports" style="color: black; text-decoration: none;">
					
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $data['critical'];?></h3> </a>                      
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                     Critical
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <svg width="40%" height="40%" viewBox="0 0 40 40" class="donut">
							<circle class="donut-segment" cx="20" cy="20" r="16" fill="transparent" stroke-width="6" stroke-dasharray="90 70" stroke-dashoffset="139" style="stroke: #f18311;"></circle>
							<g class="donut-text" transform="translate(20, 22)">
								<text>
									<tspan  text-anchor="middle" class="donut-label">80%</tspan>   
								</text>
							</g>
						</svg>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">high</p>
                      <div class="fluid-container">                         
            <a href="<?php echo URLROOT; ?>/posts/reports" style="color: black; text-decoration: none;">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $data['high'];?></h3> </a>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    Severity-high
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <svg width="40%" height="40%" viewBox="0 0 40 40" class="donut">
							<circle class="donut-segment" cx="20" cy="20" r="16" fill="transparent" stroke-width="6" stroke-dasharray="69 69" stroke-dashoffset="118" style="stroke: #126a9d;"></circle>
							<g class="donut-text" transform="translate(20, 22)">
								<text>
									<tspan  text-anchor="middle" class="donut-label">60%</tspan>   
								</text>
							</g>
						</svg>        
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Medium</p>
                      <div class="fluid-container">   
                         
                <a href="<?php echo URLROOT; ?>/posts/reports" style="color: black; text-decoration: none;">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $data['medium'];?></h3> </a>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                     Severity-Medium
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                       <svg width="40%" height="40%" viewBox="0 0 40 40" class="donut">
							<circle class="donut-segment" cx="20" cy="20" r="16" fill="transparent" stroke-width="6" stroke-dasharray="60 50" stroke-dashoffset="98" style="stroke: #1da2b0;"></circle>
							<g class="donut-text" transform="translate(20, 22)">
								<text>
									<tspan  text-anchor="middle" class="donut-label">40%</tspan>   
								</text>
							</g>
						</svg>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Low</p>
                      <div class="fluid-container"> 
                         
              <a href="<?php echo URLROOT; ?>/posts/reports" style="color: black; text-decoration: none;">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $data['low'];?> </h3></a>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                Severity-Low
                  </p>
                </div>
              </div>
            </div>
		   </div>
        <div class="row">
            <div class="col-lg-12 grid-margin">
				<div class="card">
					<div class="card-body">
					<h4 class="card-title"><?php echo $data['title']; ?></h4>
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr style="background: linear-gradient(-45deg, #EE7752, #E73C7E, #23A6D5, #23D5AB); font-weight:bold; color: white;">
								  <th rowspan="2" style="border-right: 2px solid #f2f2f2 !important; vertical-align: middle; text-align: center;">
								   Campaign
								  </th>
								  <th rowspan="2" style="border-right: 2px solid #f2f2f2 !important; vertical-align: middle; text-align: center;">
								   Open 
								  </th>
								  <th rowspan="2" style="border-right: 2px solid #f2f2f2 !important; vertical-align: middle; text-align: center;">
									Closed 
								  </th>
								  <th rowspan="2" style="border-right: 2px solid #f2f2f2 !important; vertical-align: middle; text-align: center;">
								   Open <br> Today
								  </th>
								  <th rowspan="2" style="border-right: 2px solid #f2f2f2 !important; vertical-align: middle; text-align: center;">
									Closed <br> Today
								  </th>
								  <th colspan="4" style="text-align: center; border-right: 2px solid #f2f2f2 !important; vertical-align: middle;">
									Tickets Severity                             
								  </th>                         
									 <th rowspan="2" style="border-right: 2px solid #f2f2f2 !important; vertical-align: middle; text-align: center;">
								   SLA Violations                          
								  </th> 
								</tr>
								<tr>  
									  <td style=" background-color: #546E7A; color: white; border-right: 2px solid #f2f2f2 !important; vertical-align: middle; text-align: center;">Critical</td>
									  <td style=" background-color: #546E7A; color: white; border-right: 2px solid #f2f2f2 !important; vertical-align: middle; text-align: center;">High</td>
									  <td style=" background-color: #546E7A; color: white;  border-right: 2px solid #f2f2f2 !important; vertical-align: middle; text-align: center;">Medium</td>
									  <td style="background-color: #546E7A; color: white; border-right: 2px solid #f2f2f2 !important; vertical-align: middle; text-align: center;">Low</td>
								</tr>
							</thead>
							<tbody>
							
                            <tr> 
								<?php
									$number=$this->userModel->countcampaign();
									$Rows = $number; //Dynamic number for Rowss
									for($i=1;$i<=$Rows;$i++){ 
								?>
                         <td><?php $campaignname=$this->userModel->campaignname($i); echo $campaignname; ?></td>
						   <td style="text-align: center;"> <a href="<?php echo URLROOT; ?>/posts/reports" style="color: black; text-decoration: none;"><?php $open=$this->userModel->campaignopen($i); echo $open; ?></a> </td>
						   <td style="text-align: center;"><a href="<?php echo URLROOT; ?>/posts/reports_close" style="color: black; text-decoration: none;"><?php $close=$this->userModel->campaignclose($i);echo $close; ?> </a></td>
						   <td style="text-align: center;"><a href="<?php echo URLROOT; ?>/posts/reports" style="color: black; text-decoration: none;"><?php $opentoday=$this->userModel->campaignopentoday($i); echo $opentoday; ?> </a></td>
						   <td style="text-align: center;"> <a href="<?php echo URLROOT; ?>/posts/reports_close" style="color: black; text-decoration: none;"><?php $closetoday=$this->userModel->campaignclosetoday($i);echo $closetoday; ?></a></td>
						   <td style="text-align: center;"><a href="<?php echo URLROOT; ?>/posts/reports" style="color: black; text-decoration: none;"><?php $critical=$this->userModel->campaigncritical($i); echo $critical; ?> </a></td>
						   <td style="text-align: center;"><a href="<?php echo URLROOT; ?>/posts/reports" style="color: black; text-decoration: none;"><?php $high=$this->userModel->campaignhigh($i); echo $high; ?> </a></td>
						   <td style="text-align: center;"><a href="<?php echo URLROOT; ?>/posts/reports" style="color: black; text-decoration: none;"><?php $medium=$this->userModel->campaignmedium($i); echo $medium; ?></a></td>
						   <td style="text-align: center;"><a href="<?php echo URLROOT; ?>/posts/reports" style="color: black; text-decoration: none;"><?php $low=$this->userModel->campaignlow($i); echo $low; ?></a> </td>    
						   <td style="text-align: center;"><a href="<?php echo URLROOT; ?>/posts/reports" style="color: black; text-decoration: none;"><?php $sla=$this->userModel->campaignsla($i); echo $sla; ?></a> </td> 
						</tr>
						<?php }  ?>
                       
                     
                    </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>      
</div>
<div id="salesid" >
<div class="row">
			   <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div style="background: linear-gradient(135deg, rgb(23, 234, 217) 0%, rgb(96, 120, 234) 100%); color: white;" class="card card-statistics">
                <div class="card-body"  data-link="<?php echo URLROOT; ?>/Leads/adminleadlist" style="color: white; text-decoration: none;">
                  <div class="clearfix">
                    <div class="float-left">
                      <img  class="img-sm rounded-circle mb-4 mb-md-0" src="<?php echo URLROOT; ?>/images/sales/commit.png" alt="profile image">
                    </div>
                    <div class="float-right">
                      <p style="font-size:18px;" class="mb-0 text-right">Commit</p>
					  
					  <div class="fluid-container">                                              
                         <a href="<?php echo URLROOT; ?>/Leads/adminleadlist" style="color: white; text-decoration: none;">
					
                        <h3 class="font-weight-medium text-right mb-0">
						<?php echo $data['commit'];?></h3> </a>                      
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div style="background: linear-gradient(135deg, rgb(177, 234, 77) 0%, rgb(69, 149, 34) 100%); color: white;" class="card card-statistics">
                <div class="card-body"  data-link="<?php echo URLROOT; ?>/Leads/adminleadlist" style="color: white; text-decoration: none;">
                  <div class="clearfix">
                    <div class="float-left">
                      <img class="img-sm rounded-circle mb-4 mb-md-0" src="<?php echo URLROOT; ?>/images/sales/upside.png" alt="profile image">
                    </div>
                    <div class="float-right">
                      <p style="font-size:18px;" class="mb-0 text-right">Upside</p>
					  
					  <div class="fluid-container">                                              
                        <a href="<?php echo URLROOT; ?>/Leads/adminleadlist" style="color: white; text-decoration: none;">
					
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
                <div class="card-body"  data-link="<?php echo URLROOT; ?>/Leads/adminleadlist" style="color: white; text-decoration: none;">
                  <div class="clearfix">
                    <div class="float-left">
                       <img class="img-sm rounded-circle mb-4 mb-md-0" src="<?php echo URLROOT; ?>/images/sales/lead.png" alt="profile image">
                    </div>
                    <div class="float-right">
                      <p style="font-size:18px;" class="mb-0 text-right">Lead</p>
                      <div class="fluid-container">                         
              <a href="<?php echo URLROOT; ?>/Leads/adminleadlist" style="color: white; text-decoration: none;">
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
                <div class="card-body"  data-link="<?php echo URLROOT; ?>/Leads/adminleadlist" style="color: white; text-decoration: none;">
                  <div class="clearfix">
                    <div class="float-left">
                       <img class="img-sm rounded-circle mb-4 mb-md-0" src="<?php echo URLROOT; ?>/images/sales/cold.png" alt="profile image">
                    </div>
                    <div class="float-right">
                      <p style="font-size:18px;" class="mb-0 text-right">Cold</p>
                      <div class="fluid-container">   
                         
             <a href="<?php echo URLROOT; ?>/Leads/adminleadlist" style="color: white; text-decoration: none;">
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
                <div class="card-body"  data-link="<?php echo URLROOT; ?>/Saleshead/wonlist_head" style="color: white; text-decoration: none;">
                  <div class="clearfix">
                    <div class="float-left">
                      <i style="font-size: 48px;" class="mdi mdi-thumb-up-outline"></i>
                    </div>
                    <div class="float-right">
                      <p style="font-size:18px;" class="mb-0 text-right">Won</p>
                      <div class="fluid-container"> 
                         
              <a href="<?php echo URLROOT; ?>/Saleshead/wonlist_head" style="color: white; text-decoration: none;">
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
                <div class="card-body" data-link="<?php echo URLROOT; ?>/Saleshead/postponedlist_head" style="color: white; text-decoration: none;">
                  <div class="clearfix">
                    <div class="float-left">
                      <i style="font-size: 48px;" class="mdi mdi-calendar-question"></i>
                    </div>
                    <div class="float-right">
                      <p style="font-size:18px;" class="mb-0 text-right">Postponed</p>
                      <div class="fluid-container"> 
                         
              <a href="<?php echo URLROOT; ?>/Saleshead/postponedlist_head" style="color: white; text-decoration: none;">
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
                <div class="card-body" data-link="<?php echo URLROOT; ?>/Saleshead/droplist_head" style="color: white; text-decoration: none;">
                  <div class="clearfix">
                    <div class="float-left">
                      <i style="font-size: 48px;" class="mdi mdi-thumb-down-outline"></i>
                    </div>
                    <div class="float-right">
                      <p style="font-size:18px;" class="mb-0 text-right">Dropped</p>
                      <div class="fluid-container"> 
                         
              <a href="<?php echo URLROOT; ?>/Saleshead/droplist_head" style="color: white; text-decoration: none;">
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
                <div class="card-body"  data-link="<?php echo URLROOT; ?>/Saleshead/lostlist_head" style="color: white; text-decoration: none;">
                  <div class="clearfix">
                    <div class="float-left">
                      <i style="font-size: 48px;" class="mdi mdi-alert-outline"></i>
                    </div>
                    <div class="float-right">
                      <p style="font-size:18px;" class="mb-0 text-right">Lost</p>
                      <div class="fluid-container"> 
                         
              <a href="<?php echo URLROOT; ?>/Saleshead/lostlist_head" style="color: white; text-decoration: none;">
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
</div>

  </div>                     
	</div>
      </div>
   </div>
  </div>
  <script src="https://bernii.github.io/gauge.js/dist/gauge.min.js"></script>
<style>
@keyframes donut-chart-fill {
  to { stroke-dasharray: 0 100; }
}

.svg-item {
  width: 60px;
  height: 60px;
  font-size: 16px;
}

.donut-segment {
  animation: donut-chart-fill 1s reverse ease-in;
  transform-origin: center;
  stroke: #FF6200;
}

.donut-label {
  font-size: 0.4em;
  font-weight: bold;
  fill: #FF6200;
  line-height: 1;
  transform: translateY(0.5em);
}
</style>
<style type="text/css">
 .menu-icon {
    margin-right: 1.25rem;
    width: 16px;
    line-height: 1;
    font-size: 18px;
    color: black;
}

tr:nth-child( 2n ) {
  background-color:#ded3f6;
  font-weight: bold;
}
tr:nth-child( 2n + 1 ) {
  background-color: #b8f1d5;
font-weight: bold;
}
</style>
<?php require APPROOT . '/views/inc/footer.php'; ?>
</div>