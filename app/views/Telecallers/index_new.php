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
			   
		   </div>
		</div>
	</div>                     
	</div>
      </div>
   </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
</div>