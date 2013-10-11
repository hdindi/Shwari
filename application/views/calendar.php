<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <title>Patient Appointments</title>

  <link rel='stylesheet' type='text/css' href='<?php echo base_url()?>libs/css/smoothness/jquery-ui-1.8.11.custom.css' />
  <link rel='stylesheet' type='text/css' href='<?php echo base_url()?>css/jquery.weekcalendar.css' />
  <style type='text/css'>
  body {
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    margin: 0;
  }

  h1 {
    margin: 0 0 1em;
    padding: 0.5em 0.5em 0;
  }

  p.description {
    font-size: 0.8em;
    padding: 1em;
    top: 3.2em;
    margin-right: 400px;
  }

  #message {
    font-size: 0.7em;
    position: absolute;
    top: 1em;
    right: 1em;
    width: 350px;
    display: none;
    padding: 1em;
    background: #ffc;
    border: 1px solid #dda;
  }
  </style>

  <script type='text/javascript' src='<?php echo base_url()?>libs/jquery-1.4.4.min.js'></script>
  <script type='text/javascript' src='<?php echo base_url()?>libs/jquery-ui-1.8.11.custom.min.js'></script>

  <script type="text/javascript" src="<?php echo base_url()?>libs/date.js"></script>
  <script type='text/javascript' src='<?php echo base_url()?>js/jquery.weekcalendar.js'></script>

  <script type='text/javascript'>
  var year = new Date().getFullYear();
  var month = new Date().getMonth();
  var day = new Date().getDate();

  var eventData = {
	  <?php foreach ($appoints as $data){ ?>
	  <?php
	  $time=$data['Time'];
	  $hour=explode(':',$time);
	  $minutes=$hour[1];
	  $minutes=explode(" ",$minutes);
	  
	  $end=$data['End'];
	  $end_hour=explode(':',$end);
	  $end_minutes=$end_hour[1];
	  $end_minutes=explode(" ",$end_minutes);
	  ?>
    events : [
       {'id':<?php echo $data['id']?>, 'start': new Date(year, month, day, <?php echo $hour[0]; ?>,<?php echo $minutes[0];?>), 'end': new Date(year, month, day, <?php echo $end_hour[0]?>, <?php echo $end_minutes[0]?>),'title':'<?php echo $data['About']?>'},
      // {'id':2, 'start': new Date(year, month, day, 14), 'end': new Date(year, month, day, 14, 45),'title':'Dev Meeting'},
       //{'id':3, 'start': new Date(year, month, day + 1, 18), 'end': new Date(year, month, day + 1, 18, 45),'title':'Hair cut'},
       //{'id':4, 'start': new Date(year, month, day - 1, 8), 'end': new Date(year, month, day - 1, 9, 30),'title':'Team breakfast'},
       //{'id':5, 'start': new Date(year, month, day + 1, 14), 'end': new Date(year, month, day + 1, 16),'title':'Product showcase'},
      // {'id':5, 'start': new Date(year, month, day + 1, 15), 'end': new Date(year, month, day + 1, 17),'title':'Overlay event'}
    ]
	
	<?php }?>
  };

  $(document).ready(function() {
    $('#calendar').weekCalendar({
      data: eventData,

      timeslotsPerHour: 4,
      allowCalEventOverlap: true,
      overlapEventsSeparate: true,
      totalEventsWidthPercentInOneColumn : 95,

      height: function($calendar) {
        return $(window).height() - $('h1').outerHeight(true);
      },
      eventRender: function(calEvent, $event) {
        if (calEvent.end.getTime() < new Date().getTime()) {
          $event.css('backgroundColor', '#aaa');
          $event.find('.time').css({
            backgroundColor: '#999',
            border:'1px solid #888'
          });
        }
      },
      eventNew: function(calEvent, $event) {
       // displayMessage('<strong>Added event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
       // alert('wat is this');
		//alert('You\'ve added a new event. You would capture this event, add the logic for creating a new event with your own fields, data and whatever backend persistence you require.');
      },
      eventDrop: function(calEvent, $event) {
        displayMessage('<strong>Moved Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
      },
      eventResize: function(calEvent, $event) {
        displayMessage('<strong>Resized Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
      },
      eventClick: function(calEvent, $event) {
        //displayMessage('<strong>Clicked Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
		//alert('genius');
		 $( "#appointment" ).dialog( "open" );
		 document.getElementById("time").value = calEvent.start;
      },
     // eventMouseover: function(calEvent, $event) {
      //  displayMessage('<strong>Mouseover Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
      //},
      eventMouseout: function(calEvent, $event) {
        displayMessage('<strong>Mouseout Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
      },
      noEvents: function() {
        displayMessage('There are no events for this week');
      }
    });

    function displayMessage(message) {
      $('#message').html(message).fadeIn();
    }

    $('<div id="message" class="ui-corner-all"></div>').prependTo($('body'));
 $(function() {
  $( "#appointment" ).dialog({
  autoOpen: false,
  height: 500,
  width: 500,
  modal: true,
  buttons: {
  Done: function() {
  $( this ).dialog( "close" );
  }
  },
  close: function() {
  allFields.val( "" ).removeClass( "ui-state-error" );
  }
  });
  });
  });
  
  </script>
  <!--<script>

    $(function() {
    $('#appointed').submit(function (event) {
    dataString = $("#appointed").serialize();
	
	$.ajax({
    type:"POST",
    url:"<?php echo base_url() ?>index.php/calender/appoint",
    data:dataString,
    success:function (data) {
    alert('Appointment has been created');
    document.location.reload(true);
    $("#appointment").dialog('destroy').remove();
    }
    });
    event.preventDefault();
	    return false;
	
    });
    });
    </script>!-->
</head>
<body>
  <h1>Making Patient Appointments</h1>
  <p class="description">Adding an appointment for a patient</p>
<div id="appointment" title="Make appointment">
                <p class="validateTips">All form fields are required.</p>
                
                <form id="appointed" class="appointed_form" autocomplete="off" method="post" action="<?php echo base_url()?>index.php/calender/appoint">
                  <table>
                  <tr>
                 <input type="hidden" id="date" name="Date">
                 <input type="hidden" id="time" name="Time" value="">
                  <td><label for="Patient Name">Patient Name<span class="form-required">*</span></label></td>
                  <td><input type="text" id="name" name="patientid" required/></td>
                  </tr>
                  <tr>
                  <td><label for="Title">Title<span class="form-required">*</span></label></td>
                  <td><input type="text" name="Title" id="title" required/></td>
                  </tr>
                  <tr>
                  <td><label for="About">About<span class="form-required">*</span></label></td>
                  <td><textarea name="About" id= "About" required/></textarea></td>
                  </tr>
                  <tr>
                  <td></td>
                  <td><input type="submit" name="save" value="Save Appointment" class="btn btn-small btn-info"/></td>
                  </tr>
                   </table>
                </form>
                
                
              </div>
  <div id="calendar"></div>
</body>
</html>
 