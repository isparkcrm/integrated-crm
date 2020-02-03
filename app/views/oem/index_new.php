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
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <img  class="img-sm rounded-circle mb-4 mb-md-0" src="<?php echo URLROOT; ?>/images/sales/commit.png" alt="profile image">
                    </div>
                    <div class="float-right">
                      <p style="font-size:18px;" class="mb-0 text-right">Commit</p>
					  
					  <div class="fluid-container">                                              
                         <a href="" style="color: black; text-decoration: none;">
					
                        <h3 class="font-weight-medium text-right mb-0"></h3> </a>                      
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div style="background: linear-gradient(135deg, rgb(177, 234, 77) 0%, rgb(69, 149, 34) 100%); color: white;" class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <img class="img-sm rounded-circle mb-4 mb-md-0" src="<?php echo URLROOT; ?>/images/sales/upside.png" alt="profile image">
                    </div>
                    <div class="float-right">
                      <p style="font-size:18px;" class="mb-0 text-right">Upside</p>
					  
					  <div class="fluid-container">                                              
                         <a href="" style="color: black; text-decoration: none;">
					
                        <h3 class="font-weight-medium text-right mb-0"></h3> </a>                      
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
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                       <img class="img-sm rounded-circle mb-4 mb-md-0" src="<?php echo URLROOT; ?>/images/sales/lead.png" alt="profile image">
                    </div>
                    <div class="float-right">
                      <p style="font-size:18px;" class="mb-0 text-right">Lead</p>
                      <div class="fluid-container">                         
              <a href="" style="color: black; text-decoration: none;">
                        <h3 class="font-weight-medium text-right mb-0"></h3> </a>
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
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                       <img class="img-sm rounded-circle mb-4 mb-md-0" src="<?php echo URLROOT; ?>/images/sales/cold.png" alt="profile image">
                    </div>
                    <div class="float-right">
                      <p style="font-size:18px;" class="mb-0 text-right">Cold</p>
                      <div class="fluid-container">   
                         
               <a href="low.php" style="color: black; text-decoration: none;">
                        <h3 class="font-weight-medium text-right mb-0"></h3> </a>
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
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i style="font-size: 48px;" class="mdi mdi-thumb-up-outline"></i>
                    </div>
                    <div class="float-right">
                      <p style="font-size:18px;" class="mb-0 text-right">Won</p>
                      <div class="fluid-container"> 
                         
              <a href="customers.php" style="color: black; text-decoration: none;">
                        <h3 class="font-weight-medium text-right mb-0"></h3></a>
                      </div>
                    </div>
                  </div>
                 <!-- <p  style="font-size:18px;" class="text-muted mt-3 mb-0">Won</p>-->
                </div>
              </div>
            </div>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div style="background: linear-gradient(135deg, rgb(255, 87, 185) 0%, rgb(167, 4, 253) 100%); color: white;" class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i style="font-size: 48px;" class="mdi mdi-calendar-question"></i>
                    </div>
                    <div class="float-right">
                      <p style="font-size:18px;" class="mb-0 text-right">Postponed</p>
                      <div class="fluid-container"> 
                         
              <a href="customers.php" style="color: black; text-decoration: none;">
                        <h3 class="font-weight-medium text-right mb-0"></h3></a>
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
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i style="font-size: 48px;" class="mdi mdi-thumb-down-outline"></i>
                    </div>
                    <div class="float-right">
                      <p style="font-size:18px;" class="mb-0 text-right">Dropped</p>
                      <div class="fluid-container"> 
                         
              <a href="customers.php" style="color: black; text-decoration: none;">
                        <h3 class="font-weight-medium text-right mb-0"></h3></a>
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
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i style="font-size: 48px;" class="mdi mdi-alert-outline"></i>
                    </div>
                    <div class="float-right">
                      <p style="font-size:18px;" class="mb-0 text-right">Lost</p>
                      <div class="fluid-container"> 
                         
              <a href="customers.php" style="color: black; text-decoration: none;">
                        <h3 class="font-weight-medium text-right mb-0"></h3></a>
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
		   <div class="row">
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
		   </div>
		   
</div>

  </div>                     
	</div>
      </div>
   </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
</div>