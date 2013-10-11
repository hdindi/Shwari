<?php if($this->session->userdata('id')){
                 
     redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Nurse </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">                                       
    <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/style.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery-ui.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/chosen-master/chosen/chosen.css" />
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
    <!--<style>
    body { font-size: 62.5%; }
    label, input { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }
    </style>-->
    <script>
    $(function() {
    var weight = $( "#Weight" ),
    BP = $( "#BP" ),
    temperature = $( "#temperature" ),
    BMI= $( "#BMI" ),
    height = $( "#Height" ),
    ocs= $( "#OCS" ),
    allFields = $( [] ).add( weight ).add( BP ).add( temperature ).add( BMI ).add( height ).add( ocs ),
    tips = $( ".validateTips" );
    function updateTips( t ) {
    tips
    .text( t )
    .addClass( "ui-state-highlight" );
    setTimeout(function() {
    tips.removeClass( "ui-state-highlight", 1500 );
    }, 500 );
    }
    $( "#dialog-form" ).dialog({
    autoOpen: false,
    height: 650,
    width: 700,
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
    padding-top: 150px;
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
    $(".form").validate();
    });
    
    $(function() {
    $('#triage').submit(function (event) {
    dataString = $("#triage").serialize();
    $.ajax({
    type:"POST",
    url:"<?php echo base_url(); ?>profile/add_triage",
    data:dataString,
    success:function (data) {
    alert('The patient triage as been updated');
    $("#dialog-form").dialog('destroy').remove();
    }
    });
    event.preventDefault();
    return false;
    });
    });

    
    
    </script>
  </head>
  <body data-spy="scroll" data-target=".hom">
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <a class="brand" href="#"><img src="<?php echo base_url()?>assets/img/shwari.png"></a>
        <div class="nav-collapse collapse">
          <p class="navbar-text pull-right">
          Logged in as <a href="#" class="navbar-link"><?php echo $this->session->userdata('type') ." ". $this->session->userdata('username');?></a>
        </p><?php if($this->uri->segment(3)){ ?>
			
			<?php }?>
        </div>
        <ul class="nav">
        
        <li> <a href='<?php echo site_url('admin/employee_management')?>' title="css menus">Employee Management</a></li>
        <li> <a href='<?php echo site_url('admin/patient_management')?>' title="css menus">patients</a></li>
        <li> <a href='<?php echo site_url('admin/visit_management')?>' title="css menus">visits</a> </li>
        <li> <a href='<?php echo site_url('admin/triage_management')?>' title="css menus">triage</a> </li>
        <li> <a href='<?php echo site_url('admin/check_up')?>' title="css menus">doctors consultation</a> </li>
        <li> <a href='<?php echo site_url('admin/lab_tests')?>' title="css menus">lab</a> </li>
        <li> <a href='<?php echo site_url('admin/prescribed')?>' title="css menus">pharmacy</a> </li>
        <li> <a href='<?php echo site_url('home/do_logout')?>' title="css menus"> Logout</a> </li>
     
          <?php if($this->uri->segment(4)){?>
          <?php echo anchor('profile/todoc/'.$this->uri->segment(3)."/", 'Send to doctor','class="btn btn-primary" type="button"'); ?>
             <?php }//echo anchor('profile/finish/'.$this->uri->segment(3)."/", 'Deactivate patient','class="btn btn-danger" type="button"'); ?>
        </ul>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3 ">
          <div class="well sidebar-nav affix">
            <ul class="nav nav-list">
              <li class="nav-header">Nurse Patients</li>
        
              
              <?php foreach($patients as $nactive){
				  if(empty($nactive['id'])){
					  echo "<font color=red>You have no Active patients</font>";
				  }else{?>
              <li>
                <?php echo anchor('admin_prof/details/'.$nactive['id']."/".$nactive['patientid'],$nactive['fname']." ".$nactive['lname']." ".$nactive['sname'])."</br>"; ?>
                <?php }
			  }?>
              </li>
              <?php ?>
                <li class="nav-header">Doctor Patients</li>
             
              <?php foreach($doctor as $dctive){
				  if(empty($dctive['id'])){
					  echo "<font color=red>You have no Active patients</font>";
					  }else{?>
              <li>
                <?php echo anchor('admin_prof/details/'.$dctive['id']."/".$dctive['patientid'],$dctive['fname']." ".$dctive['lname']." ".$dctive['sname'])."</br>"; ?>
                <?php 
					  
					  }?>
              </li>
              <?php } ?>
                <li class="nav-header">Lab Patients</li>
           
              <?php foreach($lab as $lactive){
				  if(empty($lactive['id'])){
					   echo "<font color=red>You have no Active patients</font>";
					  }else{?>
              <li>
                <?php echo anchor('admin_prof/details/'.$lactive['id']."/".$lactive['patientid'],$lactive['fname']." ".$lactive['lname']." ".$lactive['sname'])."</br>"; ?>
                <?php }?>
              </li>
              <?php } ?>
                <li class="nav-header">Pharmacy Patients</li>
            
              
              <?php foreach($pharm as $pactive){
				  if(empty($pactive['id'])){
					   echo "<font color=red>You have no Active patients</font>";
					  }
					  else{?>
              
              
              <li>
                <?php echo anchor('admin_prof/details/'.$pactive['id']."/".$pactive['patientid'],$pactive['fname']." ".$pactive['lname']." ".$pactive['sname'])."</br>"; ?>
                <?php }?>
              </li>
              <?php } ?>
            </ul>
            </div><!--/.well -->
            </div><!--span3-->
            <div class="span8">
              <div class="hero-unit">
                <div id="accordion">
                  <h3>Bio Data</h3>
                  <div>
                    <p><b>Bio Data</b></p>
                    <?php
                    if($this->uri->segment(3))
                    {
                    foreach($details as $visit_info){
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
                        <td>National ID:</td><td> <?php echo $visit_info['nationalid'];?></td>
                      </tr>
                      <tr>
                        <td>Phone Number: </td><td><?php echo $visit_info['phone'];?></td>
                      </tr>
                      <tr>
                        <td>Age:</td><td><?php echo $nage;?></td>
                      </tr>
                      <tr>
                        <td>Gender:</td><td><?php echo $visit_info['sex'];?></td>
                      </tr>
                      <tr>
                        <td>City:</td><td><?php echo $visit_info['city'];?></td>
                      </tr>
                    </table>
                    
                    
                    <?php } ?>
                    <?php } ?>
                  </div>
                  
                  <h3>Patient History</h3>
                  <div id="hom">
                    <p >Patient History</p>
                    <?php if($this->uri->segment(4)){?>
                    <?php foreach($visits as $visit_history){?>
                    <?php
                    
                    $vdate = date('l jS \of F Y ',strtotime($visit_history['visitdate']));
                    ?>
                    <table class="table table-striped">
                      <tr>
                        <td>Date:</td><td><u><?php echo $vdate; ?></u></td>
                      </tr>
                      <tr>
                        <td>Nurse Name:</td> <td><?php echo $visit_history['fname']." ".$visit_history['lname'];?></td>
                      </tr>
                      <tr>
                        <td>Nurse ID: </td> <td><?php echo $visit_history['NurseID']; ?></td>
                      </tr>
                      <tr>
                        <td>blood pressure(mmHg):</td> <td><?php echo $visit_history['BP'];?></td>
                      </tr>
                      <tr>
                        <td>Temperature(°C):</td> <td><?php echo $visit_history['Temperature'];?></td>
                      </tr>
                      <tr>
                        <td>Height(m):</td> <td><?php echo $visit_history['Height'];?></td>
                      </tr>
                      <tr>
                        <td>Weight(KGs):</td> <td> <?php echo $visit_history['Weight'];?></td>
                      </tr>
                      <tr>
                        <td>BMI:</td> <td> <?php $weight=$visit_history['Weight'];
                        $height=$visit_history['Height'];
                        $new_height=$height*$height;
                        $BMI=$weight/$new_height;
                        echo round($BMI,2);?>
                      </td>
                    </tr>
                    
                    
                    <?php }
                    }?>
                    
                  </table>
                </div>
                
                
                
                <p>Triage Information</p>
                <div>
                  
                  <button id="create-user">Add Triage</button>
                </div>
                </div><!--accordion-->
              </div>
            </div>
            <div id="dialog-form" title="Create new Triage">
              <p class="validateTips">All form fields are required.</p>
              <?php if($this->uri->segment(3)){
              //$attributes = array('id' => 'triage','class'=>'form');?>
              <?php// echo form_open('',$attributes);?>
              <form id="triage" class="form">
                <input type="hidden" name="visitid" value="<?php echo $active['id'];?>">
                <label for="name">Weight(<font color=red><i>kgs</i></font>)</label>
                <input type="number" max="220" min="1" name="Weight" id="Weight" class="required"/><?php echo form_error('Weight');?>
                <label for="BP">Blood Presure(<font color=red><i></i>mmHg</font>)</label>
                <input type="text" name="BP" id="BP" value="" class="required"/><?php echo form_error('BP');?>
                <label for="temperature">Temperature(<font color=red><i>°C</i></font>)</label>
                <input type="number" max="45" min="30" name="Temperature" id="temperature" class="required"/><?php echo form_error('Temperature');?>
                <label for="height">Height(<font color=red><i>m</i></font>)</label>
                <input type="number" max="2" min="0.5" name="Height" id="Height" class="required"/><?php echo form_error('Height');?>
                <label for="OCS">OCS</label>
                <textarea rows="5" cols="90" name="OCS" id="OCS" ></textarea><?php echo form_error('OCS');?>
                <input type="submit" id="triagesave" value="update patient triage" class="save">
                
                <?php echo validation_errors()?>
              </form>
              <?php// echo form_close();?>
              <?php }?>
            </div>
            
        
        </div><!--/span-->
        
        <footer>
          <p>&copy; CAREtech 2013</p>
        </footer>
        </div><!--container fluid-->
        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/bootstrap-transition.js"></script>
        <script src="../assets/js/bootstrap-alert.js"></script>
        <script src="../assets/js/bootstrap-modal.js"></script>
        <script src="../assets/js/bootstrap-dropdown.js"></script>
        <script src="../assets/js/bootstrap-scrollspy.js"></script>
        <script src="../assets/js/bootstrap-tab.js"></script>
        <script src="../assets/js/bootstrap-tooltip.js"></script>
        <script src="../assets/js/bootstrap-popover.js"></script>
        <script src="../assets/js/bootstrap-button.js"></script>
        <script src="../assets/js/bootstrap-collapse.js"></script>
        <script src="../assets/js/bootstrap-carousel.js"></script>
        <script src="../assets/js/bootstrap-typeahead.js"></script>
        
      </body>
    </html>