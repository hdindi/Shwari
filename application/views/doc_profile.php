<?php if($this->session->userdata('id')){
                 
   //  redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><!DOCTYPE html>
<html lang="en"><head>
  <meta charset="utf-8" />
  <title>Doctor</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <style type="text/css">
  body {
  padding-top: 150px;
  padding-bottom: 40px;
  }
  .sidebar-nav {
  padding: 9px 0;
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
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/style.css" />
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery-ui.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/chosen-master/chosen/chosen.css" />
  <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>

  <script src="<?php echo base_url()?>assets/js/modernizr.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/tiny_mce/tiny_mce.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>
  
  <script>
  $(function() {
  $( "#dialog-form" ).dialog({
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
  $( "#order_labs" )
  .button()
  .click(function() {
  $( "#dialog-form" ).dialog( "open" );
  });
  $( "#ordermore" )
  .button()
  .click(function() {
  $( "#dialog-form" ).dialog( "open" );
  });
  });
  </script>
  <script>
  $(function() {
  $( "#accordion" ).accordion({
  collapsible: true,
  heightStyle: "content"
  });
  });
  </script>
  <script> //Prescription Pop Up
  $(function() {
  $( "#dialog" ).dialog({
  autoOpen: false,
  height: 500,
  width: 500,
  modal: true,
  buttons: {
  Done: function() {
  $( this ).dialog( "close" );
   window.location.reload(true);  
   }
  },
  close: function() {
  allFields.val( "" ).removeClass( "ui-state-error" );
  }
  });
  $( "#prescription" )
  .button()
  .click(function() {
  $( "#dialog" ).dialog( "open" );
  });
  $( "#prescribe" )
  .button()
  .click(function() {
  $( "#dialog" ).dialog( "open" );
  });
  });
  //eND OF POP UP </script>
  <script>
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
  $( "#make" )
  .button()
  .click(function() {
  $( "#appointment" ).dialog( "open" );
  });
  });
  </script>
  <script>
  $(function() {
  $( "#refer" ).dialog({
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
  $( "#make1" )
  .button()
  .click(function() {
  $( "#refer" ).dialog( "open" );
  });
  });
  </script>
  <script>
  $(function() {
  $( "#diagnosis_final" ).dialog({
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
  $( "#diagnosis" )
  .button()
  .click(function() {
  $( "#diagnosis_final" ).dialog( "open" );
  });
  });
  </script>
 <script>
  $(function() {
  $( "#datepicker" ).datepicker({ minDate: 0, maxDate: "+1Y"});
  });
  </script>
  <style type="text/css">
  body {
  padding-top: 150px;
  padding-bottom: 40px;
  }
  .sidebar-nav {
  padding: 9px 0;
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
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>
  <style type="text/css">
  label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }
  </style>
 <script>
  
  $(function() {
 // $('#prescribe').hide();
  //$('#order_labs').hide();
  $('#checkup').submit(function (event) {
   dataString = $("#checkup").serialize();
  $.ajax({
  type:"POST",
  url:"<?php echo base_url()?>doc_profile/add_checkup",
  data:dataString,
  success:function (data) {
  alert('The patient check up has been updated');
  
 // $("#checkup").hide();
  //$('#prescribe').show();
  //$('#order_labs').show();
   window.location.reload(true);
  }
 
  });
  event.preventDefault();
  return false;
  
  });
  });
  </script>
  <script>
   
  $(document).ready(function(){
  $(".form").validate();
  });
 
  $(function() {
  $("#prescription").hide();
  $('#final_diagnosis').submit(function (event) {
  dataString = $("#final_diagnosis").serialize();
  var form=$(this);
  if (form.valid()) {
  $.ajax({
  type:"POST",
  url:"<?php echo base_url()?>doc_profile/final_diagnosis",
  data:dataString,
  success:function (data) {
  alert('The final diagnosis has been updated');
 // document.location.reload(true);
  $("#diagnosis_final").dialog('destroy').remove();
  $("#prescription").show();
  $("#diagnosis").hide();
  }
  // window.location.reload(true);
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
    

<script>
  $(document).ready(function(){
  $("#refered").validate();
  });
  $(function() {
  $('#refered').submit(function (event) {
  dataString = $("#refered").serialize();
  var form=$(this);
  if (form.valid()) {
  $.ajax({
  type:"POST",
  url:"<?php echo base_url()?>doc_profile/refer",
  data:dataString,
  success:function (data) {
  alert('The patient has been refered');
  
  // $("#final_diagnosis").hide();
   document.location.reload(true);
  $("#refer").dialog('destroy').remove();
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
  $("#presc").validate();
  });
  $(function() {
  $('#presc').submit(function (event) {
  dataString = $("#presc").serialize();
  var form=$(this);
  if (form.valid()) {
  $.ajax({
  type:"POST",
  url:"<?php echo base_url()?>doc_profile/prescript",
  data:dataString,
  success:function (data) {
  alert('The patient prescription has been updated');
   //$(".form").reset();
  // $('#presc')[0].reset();
  document.prescribed.reset()
  
  }

  });
  event.preventDefault();
  return false;
  }
  });
  });
  
  </script>
  
</head>
<body>
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
             <a class="brand" href="<?php echo site_url('doc_profile') ?>" title="Home" ><img src="<?php echo base_url()?>assets/img/shwari.png" alt="Home"></a>

      <div class="nav-collapse collapse">
        <p class="navbar-text pull-right">
        Logged in as <a href="#" class="navbar-link"><?php  echo $this->session->userdata('type') ." ". $this->session->userdata('username');?></a>
          <a href='<?php echo site_url('home/do_logout')?>'> <img src="<?php echo base_url()?>assets/img/logout.png" title="Logout"></a><br/>
           <?php if($this->uri->segment(4)){?>
        <?php echo anchor('doc_profile/finish/'.$this->uri->segment(3)."/", 'Release patient','class="btn btn-danger" type="button"');?>
        <?php echo anchor('doc_profile/topha/'.$this->uri->segment(3)."/", 'Send To Phamarcy','class="btn btn-warning" type="button"');?>
        <button id="make" class="btn btn-small btn-info">Make An Appointment</button>
        <button id="make1" class="btn btn-small btn-info">Make A Referal</button>
        <?php } ?> 
  </p>
      </div>
      <ul class="nav nav-tabs nav-pills">
      
        <li><a class="brand" href='<?php echo site_url('doc_profile')?>'title="Home"><img src="<?php echo base_url()?>assets/img/Home1.png" alt="Home"></a></li>
        <li><a href='<?php echo site_url('doctor/patient_management')?>'><img src="<?php echo base_url()?>assets/img/patient1.png" title="All patients"></a></li>
        
      </ul>
      <div class="nav-collapse collapse" allign="center" >
      <font color="green"><?php if($this->uri->segment(4)){?>
       
          <?php foreach($names as $patientname){
              if(empty($patientname)){
                echo " ";
                }
              else{
              echo "<strong>".$patientname['fname']." ".$patientname['lname']." ".$patientname['sname']."</strong>";
              }
          }?>
          
          <?php } ?></font><br/>
         
        </div>
          
      
    </div>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span2 ">
        <div class="well sidebar-nav affix">
          <ul class="nav nav-list">
            <li class="nav-header">Active patients</li>
            
            <?php foreach($patients as $active){
            if(empty($active['patientid'])){
            echo $msg;
            }else{ ?>
          <?php if($active['urgency']=="urgent"){
				?>
            <li>
              <?php echo anchor('doc_profile/details/'.$active['id']."/".$active['patientid'],$active['fname']." ".$active['lname']." ".$active['sname']."<font color=red> ".$active['urgency']."</font>")."</br>"; ?></li>
              <?php }
			  else{?>
			<li><?php echo anchor('doc_profile/details/'.$active['id']."/".$active['patientid'],$active['fname']." ".$active['lname']." ".$active['sname'])."</br>"; 

				  }
              
              }
			}
             ?>
            </li>
          </ul>
          <ul class="nav nav-list">
            <li class="nav-header">Patients waiting in Lab</li>
            <?php foreach($lab_patients as $lactive){
            if(empty($lactive['id'])){
            echo $msg;
            }
            else{
            ?>
            <li>
              <?php echo anchor('doc_profile/details/'.$lactive['id']."/".$lactive['patientid'],$lactive['fname']." ".$lactive['lname']." ".$lactive['sname'])."</br>";
              }
              }?>
            </li>
          </ul>
            
            <?php if($this->uri->segment(4)){?>
             <div class="alert">
            <table>
            <?php if($this->uri->segment(4)){?>
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
                      <?php } } }?>
                   
                  </table>
                  </p>
              
           </div>
            <?php } ?>
          </div><!--/.well -->
          </div><!--/span-->
          <!--row_fluid-->


          <div class="span10">
            <div class="hero-unit">
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
                  if ($age <= 0){ $bage = date_diff(date_create($dob), date_create('now'))->d; $nage=$bage." Days Old"; }
                  elseif ($age > 0) { $nage = $age." Years Old"; }
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
                  }  ?>
                  
                </div>
                
                <h3>Patient Triage History</h3>
                <div>
                  <table class="table table-bordered">
                    <tr>
                      <td>Date</td>
                      <td>Nurse Name:</td> 
                      <td><font color=blue>Blood pressure (mmHg)</font></td>
                      <td><font color=blue>Temperature (°C)</font> </td>
                      <td><font color=blue>Height (M)</font> </td>
                      <td><font color=blue>Weight (KGs)</font> </td>
                      <td><font color=blue>BMI</font> </td>
                     


                    </tr>
                  <?php if($this->uri->segment(3)){?>
                  <?php foreach($visits as $visit_history){?>
                  <?php
                  
                  $vdate = date('l jS \of F Y ',strtotime($visit_history['visitdate']));
                  ?>

                    <tr class="success">
                      <td><u><?php echo $vdate; ?></u></td> 
                      <td><?php echo $visit_history['fname']." ".$visit_history['lname'];?></td>
                      <td><?php echo $visit_history['diastle']."/". $visit_history['systle'];?></td> 
                      <td><?php $temp=$visit_history['Temperature'];?>

                        <?php 
                        if($temp <35){?>
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
              <h3>Current Patient Triage</h3>
              <div>
                <?php if($this->uri->segment(4)){
                        foreach($see as $current){
                          if(empty($current['id'])){
                            echo "There is no current triage";
                            }
                            else{
                              $vdate = date('l jS \of F Y ',strtotime($current['visitdate']));
                ?>
                <table class="table table-bordered">
                  <tr>
                    <td><u><?php echo $vdate; ?></u></td>
                  </tr>
                  <tr>
                    <td>Nurse Name:</td> <td><?php echo $current['fname']." ".$current['lname'];?></td>
                  </tr>
                  

                  	<tr class="success"> 
                    <td>Blood pressure (mmHg)</td> 
                    <td>Temperature (°C)</td> 
                    <td>Height (M)</td> 
                    <td>Weight (KGs)</td> 
                    <td>BMI</td> 
                   </tr>

                  <tr> 
                    <td><?php echo $current['diastle']."/".$current['systle'];?></td> 
                	<td><?php $temp=$current['Temperature'];?>

                        <?php 
                        if($temp < 34.9){?>
                           <font color=red><?php echo round($temp)?> </font> 
                       <?php }?>

                       <?php 
                        if($temp > 37.1){?>
                            <font color=blue><?php echo round($temp)?> </font> 
                       <?php }?>

                       <?php 
                        if($temp <= 37 && $temp >= 35){?>
                            <font color=green><?php echo round($temp)?> </font> 
                       <?php }?>
                     </td> 

                    
                    <td><?php echo $current['Height'];?></td> 
                    <td><?php echo $current['Weight'];?></td> 
                    <td><?php $weight=$current['Weight'];
                        $height=$current['Height'];
                        $new_height=$height*$height;
                        $BMI=$weight/$new_height;
                        // echo round($BMI,2); ?>
                       <?php 
                        if($BMI <= 20){?>
                           <font color=orange><?php echo round($BMI,2)?></font> 
                       <?php }?>

                       <?php 
                        if($BMI >= 25){?>
                            <font color=red><?php echo round($BMI,2)?></font> 
                       <?php }?>

                       <?php 
                        if($BMI > 20 && $BMI < 25){?>
                            <font color=green><?php echo round($BMI,2)?></font> 
                       <?php }?>
                     </td> 
                     
                <p>
                
              </table>
              <?php }
              }
              
              } ?>
              
            </div>
            
            
            <h3>History</h3>
            <div>
           <?php 
		   if(!$check){
			   $this->load->view('before_consult');
			   }
			   else{
				   $this->load->view('after_consult');
				   }?>

            </div>
            
            <!--consultation-->
            <h3>History with Results</h3>
            <div>
              <?php if($this->uri->segment(4)){?>
              <?php foreach($consult as $previous_data){?>
              <table class="table table-bordered">
                <tr>
                  <td>Consultation Date:<td>
                    <td><u><?php echo $previous_data['date']; ?></u></td>
                  </tr>
                  <tr>
                    <td>Doctor Name</td>
                    <td><?php echo $previous_data['fname']." ".$previous_data['lname'];?></td>
                    
                  </tr>
                  <tr>
                    <td>complaints:</td>
                    <td><?php echo strip_tags($previous_data['complaints']);?></td>
                    <td>Working Diagnosis:</td>
                    <td><?php echo strip_tags($previous_data['working_diagnosis']); ?></td>
                  </tr>
                  <tr>
                    <?php } ?>
                    
                    
                    
                    <?php foreach($test_data as $data_tests){
                                  if(empty($data_tests['test'])){
                                    echo "You did not order any test";
                                    }
                                    else{
                      ?>
                     <td> Lab tests:</td>
                      <td><?php  echo $data_tests['test'];?></td>
                      
                      <td>Lab Results:</td>
                      <td><?php  echo strip_tags($data_tests['result']);?></td>
                    </tr>
                    
                    <?php }
                    }
                    }?>
                  </table>
              
                  <button id="ordermore">Order More Tests</button>
                  <button id="prescription">Make A Prescription</button>
                  <button id="diagnosis">Make Diagnosis</button>
                
                  
                  
                  
                  
                </div>
                
                
                
                
                </div><!--accordion-->
                </div><!--hero unit-->
                </div><!--span9-->
                <?php if($this->uri->segment(3)){?>
                
                <div id="dialog-form" title="Order Lab">
                  <p class="validateTips">All form fields are required.</p>
                  <table id="visit">
                    
                   <form action="<?php echo base_url()?>doc_profile/tolab/<?php echo $this->uri->segment(3)?>" method="post" autocomplete="off" onSubmit="return validateLabs()" id="labs">
                    
                    <input type="hidden" name="visitid" value="<?php echo $this->uri->segment(3);?>">
                    <input type="hidden" id="tested" name="tested" value="1" />
                        Lab Tests<span class="form-required">*</span>
                    <select data-placeholder="Lab Tests" style="width:350px;" class="chzn-select"multiple tabindex="6" name="test[]" id="test" required >
                      <option value=""></option>
                      <?php foreach ($tests as $lab_tests){?>
                      <option value="<?php echo $lab_tests['name']; ?>"><?php echo $lab_tests['name'] ;?></option>
                      <?php  }?>
                    </select>
                    <input type="submit" name="save" value="Send to Lab" class="btn btn-warning">
                    
                </form>                 
             </table>
                </div>
                
                
                
                <div id="dialog" title="Make a Prescription">
                 <!-- <table>!-->
                    <p class="validateTips">All form fields are required.</p>                    
                    <form id="presc" class="form" name="prescribed" autocomplete="off" onSubmit="return validatePrescription()">
                      
                     <!-- <tr>!-->
                     <input type="hidden" name="visitid" value="<?php echo $this->uri->segment(3); ?>" required>
                        <!--<td>!--><label for="name">Drug Name<span class="form-required">*</span></label><!--</td>!-->
                       <!-- <td>!--><select data-placeholder="Medicine Name" style="width:350px;" class="chzn-select" tabindex="6" name="medname" required>
                          <option></option>
                          <?php foreach($meds as $pack){?>
                          <option  value="<?php echo $pack['code']?>">
                            <?php echo $pack['Medicine_name'] .'( '.$pack['strength'].' , '.$pack['units'].' )'?>
                          </option>
                          <?php //$result = $_POST['packageid'];
                          //$result_explode = explode('|', $result);
                          
                          } ?>
                        </select><!--</td>!-->
                     <!-- </tr>!-->
                      
                    <label for="dosage">Drug Dosage<span class="form-required">*</span></label><!--</td>!-->
                    <input type="text" name="dosage" required style="width:200px;"><!--</td>!-->
                    <label for="duration">Duration<span class="form-required">*</span></label>  <!--</td>!-->
                    <input type="number" style="width:200px;"  name="duration" required >
                    <label for="amount" class="required">Amount<span class="form-required">*</span></label>
                    <input type="number" style="width:200px;" name="amount" required>
                    <label for="remarks">Dosage Remarks<span class="form-required">*</span></label><!--</td>!-->
                    <textarea name="remarks" rows="5" cols="20" required></textarea><!--</td>!-->
                    <input type="submit" name="save" value="Save prescription" class="btn btn-success"/>
                
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
<!--REFER start -->
<div id="refer" title="Make Referal">
<form id="refered" class="form" autocomplete="off">
                  <!-- <table>!-->
                  <!-- <tr>!-->
                  <input type="hidden" name="visitid" value="<?php echo $this->uri->segment(3)?>">
                  <label for="docname">My Name</label>
                  <input type="text" name="docname" required/>
                  
                  <!-- <td>--><label for="email">My email<span class="form-required">*</span></label><!--</td>!-->
                  <!--  <td>!--><input type="email" id="docemail" name="docemail" required/><!--</td>!-->
                  <!-- <td>!--><label for="Time">Referal Doctor Email<span class="form-required">*</span></label><!--</td>!-->
                  <!-- <td>!--><input type="email" id="email" name="email" class="email" required/><!--</td>!-->
                  <!--</tr>!-->
                  <!--<tr>!-->
                  <!--<td>!--><label for="subject">Subject<span class="form-required">*</span></label><!--</td>!-->
                  <!--<td>!--> <input type="text" name="subject" id="subject" required /><!--</td>!-->
                  <!--</tr>!-->
                  <!--<tr>!-->
                  <!-- <td>!--><label for="Message">Message<span class="form-required">*</span></label><!--</td>!-->
                  <!--<td>!--><textarea name="message" id= "message" required /></textarea><!--</td>!-->
                  <!--</tr>!-->
                  <!--<tr>!-->
                  <!-- <td></td>!-->
                  <!-- <td>!--><input type="submit" name="save" value="Send Referal" class="btn-info"/><!--</td>!-->
                  <!--</tr>!--><input type="reset" name="reset" value="Cancel Referal" class="btn-info"/>
                  <!-- </table>!-->
                </form>
              </div>

<!--REFER end -->
              <div id="diagnosis_final" title="Final Diagnosis">
                <p class="validateTips">All form fields are required.</p>
                
                <form class="form" id="final_diagnosis" autocomplete="off" onSubmit="return validateDiagnosis()">
                  <input type="hidden" name="visitid" value="<?php echo $this->uri->segment(3)?>">
                  <label for="lab_results">Final Diagnosis<span class="form-required">*</span></label>
                  <textarea rows="5" cols="70" name="diagnosis" id="diagnosis" required></textarea>
                  <input type="submit" name="save" value="Save" class="save">
                  <input type="reset" name="reset" value="Cancel" class="save">
                </form>
              </div>
              <?php   } ?>
              <!--/span-->
            </div>
            </div>
            <footer >
            <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank"><font color=white>HealthStrat 2013</font></a></p>
          </footer>
            <!--container fluid-->
          </div>
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
var x=document.forms["checkup"]["complaints"].value;
if (x==null || x=="")
  {
  alert("Please fill in all fields before you continue");
  return false;
  }
var y=document.forms["checkup"]["med_history"].value;
if (y==null || y=="")
  {
  alert("Please fill in all fields before you continue");
  return false;
  }
  var z=document.forms["checkup"]["systemic_inquiry"].value;
if (z==null || z=="")
  {
  alert("Please fill in all fields before you continue");
  return false;
  }
  var a=document.forms["checkup"]["examination_findings"].value;//Mpesa
if (a==null || a=="")
  {
  alert("Please fill in all fields before you continue");
  return false;
  }

  var q=document.forms["checkup"]["working_diagnosis"].value;//mPESA code
if (q==null || q=="" )
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
<script>
function validateLabs()
{

  var labtests=document.forms["labs"]["test[]"].value;
 if (labtests==null || labtests=="")
  {
  alert("Please add a lab test");
  return false;
  }
 

}
</script>
<script>
function validateDiagnosis()
{

  var labtests=document.forms["final_diagnosis"]["diagnosis"].value;
 if (labtests==null || labtests=="")
  {
  alert("You have not provided the final diagnosis");
  return false;
  }
 

}
</script>
<script>
function validatePrescription()
{

  var labtests=document.forms["presc"]["medname"].value;
 if (labtests==null || labtests=="")
  {
  alert("Please choose a medicine");
  return false;
  }
 

}
</script>

        </body>
      </html>