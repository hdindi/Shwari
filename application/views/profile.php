<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Nurse</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css" media="screen"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/style.css" />
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery-ui.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/chosen-master/chosen/chosen.css" />
  <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
  <script src="<?php echo base_url()?>assets/js/modernizr.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/tiny_mce/tiny_mce.js"></script>
    <script>
    $(function() {
    $( "#appointment" ).dialog({
    autoOpen: false,
    height: 600,
    width: 600,
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
    $( "#make" )
    .button()
    .click(function() {
    $( "#appointment" ).dialog( "open" );
    });
    });
    </script>
   
    <script>
    $(function() {
    $( "#datepicker" ).datepicker({ minDate: 0, maxDate: "+1Y"});
    //$("#datepicker").datepicker({ dateFormat: 'yy-mm-dd'});
    });
    </script>
    <script>
    $(function() {
    $( "#dialog-form" ).dialog({
    autoOpen: false,
    height: 430,
    width: 600,
    modal: true,
    buttons: {
    Cancel: function() {
    $( this ).dialog( "close" );
    }
    },
    close: function() {
    allFields.val( "" ).removeClass( "ui-state-error" );
    }
    });
    $( "#create-user" )
    .button()
    .click(function() {
    $( "#dialog-form" ).dialog( "open" );
    });
    });
    </script>
    <style type="text/css">
    body {
    padding-top: 140px;
    padding-bottom: 40px;
    }
    .sidebar-nav {
    padding: 9px 0;
    }
    .dialog-form{
    padding-top: 150px;
    padding-bottom: 40px;
    }
    @media (max-width: 980px) {
    /* Enable use of floated navbar text */
    .navbar-text.pull-right {
    float: none;
    padding-left: 5px;
    padding-right: 5px;
    }
    }
    </style>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css" media="screen"/>
    <script src="?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="?php echo base_url()?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/modernizr.js"></script>
      
    <script>
    $(function() {
    $( "#accordion" ).accordion({
    collapsible: true,
    heightStyle: "content"
    });
    });
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>
    <style type="text/css">
    label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }
    </style>
    <script>
	$(document).ready(function(){
     $(".form").validate()
	  
    });
    $(function() {
    $('#triage').submit(function (event) {
    dataString = $("#triage").serialize();
	var form=$(this);
	if (form.valid()) {
	$.ajax({
    type:"POST",
    url:"<?php echo base_url() ?>profile/add_triage",
    data:dataString,
    success:function (data) {
    alert('The patient triage as been updated');
    document.location.reload(true);
    $("#dialog-form").dialog('destroy').remove();
    }
    });
    event.preventDefault();
	    return false;
	}
    });
    });
    </script>
    <script>
	$(document).ready(function(){
    $(".appointed_form").validate()
	  
    });
    $(function() {
    $('#appointed').submit(function (event) {
    dataString = $("#appointed").serialize();
	var form=$(this);
	if (form.valid()) {
	$.ajax({
    type:"POST",
    url:"<?php echo base_url() ?>doc_profile/appoint",
    data:dataString,
    success:function (data) {
    alert('Appointment has been created');
    document.location.reload(true);
    $("#appointment").dialog('destroy').remove();
    }
    });
    event.preventDefault();
	    return false;
	}
    });
    });
    </script>
    
    
    
    
    
    
    
    
    
    
    
    <script type="text/javascript">
<!--
// Form validation code will come here.
function validate()
{
 
   if( document.Triage.Weight.value == "" )
   {
     alert( "Please provide your Weight!" );
     document.Triage.Weight.focus() ;
     return false;
   }
   if( document.Triage.diastle.value == "" )
   {
     alert( "Please provide your Email!" );
     document.Triage.diastle.focus() ;
     return false;
   }
   if( document.Triage.Temperature.value == "" )
   {
     alert( "Please provide a zip in the format #####." );
     document.Triage.Temperature.focus() ;
     return false;
   }
   if( document.Triage.Height.value == "" )
   {
     alert( "Please provide your Height!" );
     document.Triage.Height.focus();
     return false;
   }
   return( true );
}
//-->
</script>
<script>

function disableElement()
{
document.getElementById("todoc").disabled=true;
}

</script>
    
 

<script>

function enableElement()
{
document.getElementById("todoc").disabled=false;
}

</script>
    
    
    
    
    
    
    
    
  </head>
  <body data-spy="scroll" data-target=".hom">
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">

        <a class="brand" href='<?php echo site_url('profile') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/shwari.png" alt="Home"></a>

        <div class="nav-collapse collapse">
          <p class="navbar-text pull-right">
          Logged in as <a href="" class="navbar-link"><?php echo $this->session->userdata('type') ." ". $this->session->userdata('username');?></a>
          <a href='<?php echo site_url('home/do_logout')?>'><img src="<?php echo base_url()?>assets/img/logout.png" title="Logout"></a>
        
        </p>


        </div>
        <ul class="nav nav-tabs nav-pills">
           <li><a class="brand" href='<?php echo site_url('profile') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/Home1.png" alt="Home"></a></li>

           <li><a href='<?php echo site_url('nurse/patient_management')?>'><img src="<?php echo base_url()?>assets/img/patient1.png" title="All patients"></a></li>
            
        </ul>
          
          
          <?php foreach($names as $patientname){
              if(empty($patientname)){
                echo " ";
                }
              else{
              echo "<strong>".$patientname['fname']." ".$patientname['lname']." ".$patientname['sname']."</strong>";
              }
          }?>
          
         
       </div>
    </div>


    <div class="container-fluid">
      <div class="row-fluid">

        <div class="span2 ">
          <div class="well sidebar-nav affix">
            <ul class="nav nav-list">
              <li class="nav-header">Patients in waiting</li>
              <?php if(!is_null($msg)){
              echo $msg;
              }
              else{
              ?> <?php foreach($patients as $active){
            if(empty($active['patientid'])){
            echo $msg;
            }
           
			  else{?>
			<li><?php echo anchor('profile/details/'.$active['id']."/".$active['patientid'],$active['fname']." ".$active['lname']." ".$active['sname'])."</br>"; 

				  }
              
             
			  }
		}
             ?>
            </li>
          </ul>
         <?php if($this->uri->segment(4)){?>
            <div class="alert">
            <table > 
          <?php foreach($names as $patientname){
              if(empty($patientname)){
                echo " ";
                }
              else{
              echo "<strong>".$patientname['fname']." ".$patientname['lname']." ".$patientname['sname']."</strong>";
              }}?>
          
              <th><p class="alert alert-error">Allergic to</p></th>
                  <?php
                       if($this->uri->segment(3))
                      {
                      foreach($alls as $ally){?>
                       <tr class="alert alert-error"><td><?php echo $ally['allergy'];?><td></tr>
                      <?php } }?>      
             </table>
                  </p>
              
           </div>
            <?php } ?>
        

          </div><!--/.well -->
          </div><!--span2-->
       
          
          <div class="span10">
            <div class="hero-unit">
              <button id="make" class="btn btn-small btn-info">Make An Appointment</button><br/>
              <div id="accordion">
                <h3>Bio Data</h3>
                <div>
                  <p>
               
                  <?php
                  if($this->uri->segment(3))
                  {
                  foreach($details as $visit_info){
                  if(empty($visit_info['fname'])){
                  echo "No Bio Data";
                  }
                  else{
                  
                  ?>
                  <?php
                  $dob =  $visit_info['dob'];
                  $age = date_diff(date_create($dob), date_create('now'))->y;
                  $ids =$this->uri->segment(3);
                  if ($age <= 0){ $bage = date_diff(date_create($dob), date_create('now'))->d; $nage=$bage." Days"; }
                  elseif ($age > 0) { $nage = $age." Years"; }
                  //replace  $visit_info['dob'] with $age
                  ?>
                  <table class="table table-striped">
                    <tr>
                      <td>Patient Name:</td><td><?php echo $visit_info['fname']." ".$visit_info['lname']." ".$visit_info['sname'];?></td>
                    </tr>
                    
                    <tr>
                      <td>Age:</td><td><?php echo $nage;?></td>
                    </tr>
                    
                    <tr>
                      <td>Residence:</td><td><?php echo $visit_info['address'];?></td>
                    </tr>
                  </table>
                  
                  
                  <?php } }
                  }?>
                  
                </div>
                
                <h3>Patient History</h3>
                <div id="hom">
                  <table class="table table-bordered">
                    <tr>
                      <th>Date</th>
                      <th>Nurse Name:</th> 
                      <th><font color=blue>Blood pressure (mmHg)</font></th>
                      <th><font color=blue>Temperature (°C)</font> </th>
                      <th><font color=blue>Height (M)</font> </th>
                      <th><font color=blue>Weight (KGs)</font> </th>
                      <th><font color=blue>BMI</font> </th>
                     


                    </tr>
                  <?php if($this->uri->segment(3)){?>
                  <?php foreach($visits as $visit_history){?>
                  <?php
                  
                  $vdate = date('jS F Y ',strtotime($visit_history['visitdate']));
                  ?>

                    <tr class="success">
                      <td><u><?php echo $vdate; ?></u></td> 
                      <td><?php echo $visit_history['fname']." ".$visit_history['lname'];?></td>
                      <td><?php echo $visit_history['diastle']."/". $visit_history['systle'];?></td> 
                      <td><?php $temp=$visit_history['Temperature'];?>

                        <?php 
                        if($temp < 35){?>
                           <font color=red><?php echo round($temp)?> </font> 
                       <?php }?>

                       <?php 
                        if($temp > 37){?>
                            <font color=red><?php echo round($temp)?> </font> 
                       <?php }?>

                       <?php 
                        if($temp <= 37 && $temp >= 35){?>
                            <font color=green><?php echo round($temp)?> </font> 
                       <?php }?>
                     </td> 
                      <td><?php echo $visit_history['Height'];?></td> 
                      <td><?php echo $visit_history['Weight'];?></td> 
                      <td><?php $weight=$visit_history['Weight'];
                        $height=$visit_history['Height'];
                        $new_height=$height*$height;
                        $BMI=$weight/$new_height;
                        // echo round($BMI,2); ?>
                       <?php 
                        if($BMI <= 20){?>
                           <font color=red><?php echo round($BMI,2)?> </font> 
                       <?php }?>

                       <?php 
                        if($BMI >= 25){?>
                            <font color=red><?php echo round($BMI,2)?> </font> 
                       <?php }?>

                       <?php 
                        if($BMI > 20 && $BMI < 25){?>
                            <font color=green><?php echo round($BMI,2)?> </font> 
                       <?php }?></td> 
                      
                     </tr>

                    
                    
                  <p>
                  <?php }
                  }?>
                </table>
              </div>
              
           </div><!--accordion--><br/>
              <button id="create-user" onclick="disableElement()" class="btn btn-large btn-primary" >Add Triage</button>

            </div>
          </div>

          <?php if($this->uri->segment(3)){?>

          <div id="dialog-form" title="Create new Triage">
            <p class="validateTips">All form fields are required.</p>
                        
            <form id="triage" class="form" name="Triage" autocomplete="off" onSubmit="return validate()" >
              <input type="hidden" name="visitid" value="<?php echo $this->uri->segment(3);?>">
              <input type="hidden" value="<?php echo $this->uri->segment(4);?>"  name="patientid">

              <label for="name">Weight(<font color=red><i>kgs</i></font>)<span class="form-required">*</span></label>
              <input type="number" max="220" min="1" name="Weight" id="Weight" required/>

              <label for="BP">Diastle/Systle(<font color=red><i></i>mmHg</font>)<span class="form-required">*</span></label>
              <input type="number" name="diastle" id="diastle" value="" required/>/<input type="number" name="systle" id="systle" value="" required/>

              <label for="temperature">Temperature(<font color=red><i>°C</i></font>)<span class="form-required">*</span></label>
              <input type="number" max="45" min="30" name="Temperature" id="temperature" required/>

              <label for="height">Height(<font color=red><i>m</i></font>)<span class="form-required">*</span></label>
              <input type="number" max="2.3" min="0.5" name="Height" id="Height" required/>

         

              <label for="OCS">obvious critical symptomps</label>
              <textarea rows="5" cols="90" name="OCS" id="OCS" ></textarea>
              
              
              <label>
                <input type="checkbox" name="urgency" value="urgent" id="Emergency_0">
              Urgent</label>
              
  

              <input type="submit" id="triagesave"  onclick="enableElement()" value="update triage and send to doc" name="save" class="btn btn-large btn-success">
             

 <?php if($this->uri->segment(4)){?>
          <?php echo anchor('profile/todoc/'.$this->uri->segment(3)."/", 'Send to doctor','class="btn btn-primary" type="button" name="todoc"'); ?>
       
              <?php }//echo anchor('profile/finish/'.$this->uri->segment(3)."/", 'Deactivate patient','class="btn btn-danger" type="button"'); ?><br/>
                        

            </form>
         
          </div>
         
           <div id="appointment" title="Make appointment">
                <p class="validateTips">All form fields are required.</p>
                
                <form id="appointed" class="appointed_form" autocomplete="off" onSubmit="return validateAppointment()">
                  <!-- <table>!-->
                  <!-- <tr>!-->
                  <input type="hidden" name="patientid" value="<?php echo $this->uri->segment(4)?>">
                  <input type="hidden" name="visitid" value="<?php echo $this->uri->segment(3)?>">
                  <!-- <td>!--><label for="Date">Date<span class="form-required">*</span></label><!--</td>!-->
                  <!--  <td>!--><input type="date" id="datepicker" name="Date" required/><!--</td>!-->
                  <!-- <td>!--><label for="Time">Time<span class="form-required">*</span></label><!--</td>!-->
                  <!-- <td>!--><input type="time" id="time" name="time" required/><!--</td>!-->
                  <!--</tr>!-->
                  <!--<tr>!-->
                  <!--<td>!--><label for="Title">Title<span class="form-required">*</span></label><!--</td>!-->
                  <!--<td>!--> <input type="text" name="Title" id="title" required/><!--</td>!-->
                  <!--</tr>!-->
                  <!--<tr>!-->
                  <!-- <td>!--><label for="About">About<span class="form-required">*</span></label><!--</td>!-->
                  <!--<td>!--><textarea name="About" id= "About" required/></textarea><!--</td>!-->
                  <!--</tr>!-->
                  <!--<tr>!-->
                  <!-- <td></td>!-->
                  <!-- <td>!--><input type="submit" name="save" value="Save Appointment" class="btn btn-small btn-info"/><!--</td>!-->
                  <!--</tr>!--><input type="reset" name="reset" value="Clear Appointment" class="btn btn-small btn-info"/>
                  <!-- </table>!-->
                </form>
                
                
              </div>
           
          <?php }?>
          
          
          
          </div><!--/span-->
                  
          <footer >
            <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank"><font color=white>HealthStrat 2013</font></a></p>
          </footer>
          </div><!--container fluid-->
           <script src="<?php echo base_url()?>assets/chosen-master/chosen/chosen.jquery.js" type="text/javascript"></script>
          <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/jquery.ui.timepicker.css" />
        <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.ui.timepicker.js"></script>
        <script type="text/javascript">
         $('#time').timepicker({
         showPeriod: true,
         showLeadingZero: true,
         onHourShow:timepickerRestrictHours 
         });
		 function timepickerRestrictHours( hour )
         {
        if ((hour < 8 || hour > 17 ))
        {
            return false;
        }        
        return true;
         }
        </script>
        

          <script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
<script>
function validateForm()
{
var x=document.forms["triage"]["visitid"].value;
if (x==null || x=="")
  {
  alert("Please fill in all fields before you continue");
  return false;
  }
var y=document.forms["triage"]["patientid"].value;
if (y==null || y=="")
  {
  alert("Please fill in all fields before you continue");
  return false;
  }
  var z=document.forms["triage"]["Weight"].value;
if (z==null || z=="")
  {
  alert("Please fill in all fields before you continue");
  return false;
  }
  var a=document.forms["triage"]["Height"].value;//Mpesa
if (a==null || a=="")
  {
  alert("Please fill in all fields before you continue");
  return false;
  }

  var q=document.forms["triage"]["Temperature"].value;//mPESA code
if (q==null || q=="" )
  {
  alert("Please fill in all fields before you continue");
  return false;
  }
  var c=document.forms["triage"]["diastle"].value;
if (c==null || c=="")
  {
  alert("Please fill in all fields before you continue");
  return false;
  }
  var g=document.forms["triage"]["systle"].value;
if (g==null || g=="")
  {
  alert("Please fill in all fields before you continue");
  return false;
  }

}
</script>
<script>
function validateAppointment()
{

  var z=document.forms["appointed"]["Date"].value;
if (z==null || z=="")
  {
  alert("Please fill in all fields before you continue");
  return false;
  }
  var a=document.forms["appointed"]["time"].value;//Mpesa
if (a==null || a=="")
  {
  alert("Please fill in all fields before you continue");
  return false;
  }

  var q=document.forms["appointed"]["About"].value;//mPESA code
if (q==null || q=="" )
  {
  alert("Please fill in all fields before you continue");
  return false;
  }
  var c=document.forms["appointed"]["Title"].value;
if (c==null || c=="")
  {
  alert("Please fill in all fields before you continue");
  return false;
  }

}
</script>

        </body>
      </html>