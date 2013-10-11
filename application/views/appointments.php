<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><!DOCTYPE html>
<html lang="en"><head>
  <meta charset="utf-8" />
  <title>Patient infomation</title>
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
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery-ui.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/chosen-master/chosen/chosen.css" />
  <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
  <script src="<?php echo base_url()?>assets/js/modernizr.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/tiny_mce/tiny_mce.js"></script>
  
<script>
tinymce.init({
    mode : "textareas",
    theme : "advanced",
    plugins: "lists" 
    //toolbar1: " bullist numlist",
   
   /* templates: [
        
        {title: 'Test template 2', content: 'Test 2'}
    ],*/
});

</script>
	
  <script>
  $(function() {
  var weight = $( "#Weight" ),
  BP = $( "#BP" ),
  temperature = $( "#Temperature" ),
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
  height: 600,
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
  $( "#order_labs" )
  .button()
  .click(function() {
  $( "#dialog-form" ).dialog( "open" );
  });
  });
  $(function() {
  $( "#tabs" ).tabs({
  collapsible: true
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
  <script>
  $(function() {
  $( "#dialog" ).dialog({
  autoOpen: false,
  height: 600,
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
  $( "#prescription" )
  .button()
  .click(function() {
  $( "#dialog" ).dialog( "open" );
  });
  });

  /*$( "#appointments" )
  .button()
  .click(function() {
  $( "#dialog" ).dialog( "open" );
  });
  });*/
  </script>
  <script>
  $(function() {
  $( "#diagnosis_final" ).dialog({
  autoOpen: false,
  height: 600,
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
  $( "#diagnosis" )
  .button()
  .click(function() {
  $( "#diagnosis_final" ).dialog( "open" );
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
	
</head>
<body>

  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <a class="brand" href=""><img src="<?php echo base_url()?>assets/img/shwari.png"></a>

      <div class="nav-collapse collapse">
        <p class="navbar-text pull-right">
        Logged in as <a href="#" class="navbar-link"><?php  echo $this->session->userdata('type') ." ". $this->session->userdata('username');?></a>
      <?php if($this->uri->segment(3)){?>
      <?php echo anchor('doc_profile/finish/'.$this->uri->segment(3)."/", 'Deactivate patient','class="btn btn-danger" type="button"'); 
	  }?>

     <button id="make" class="btn btn-small btn-info">Make An Appointment</button>

  </p>
      </div>
      <ul class="nav">
        <li><a href='<?php echo site_url('doctor/patient_management')?>'>All Patients</a></li>
        
        <li><a href='<?php echo site_url('home/do_logout')?>'> Logout</a></li>
      </ul>
      
    </div>
  </div>

 <div class="container-fluid">
    <div class="row-fluid">

      <!-- <div class="span3 ">

        <div class="well sidebar-nav">
          <ul class="nav nav-list">
            <li class="nav-header">Active patients</li>
            <?php if(!is_null($msg)){
                    echo $msg;
                  }
                  else{
                    
            ?>
            <?php foreach($patients as $active){?>
            <li>
              <?php echo anchor('doc_profile/details/'.$active['id']."/".$active['patientid'],$active['fname']." ".$active['lname']." ".$active['sname'])."</br>"; ?>
              <?php }
                        }
              ?>
            </li>
          </ul>
          
          <div><!--lab active-->

         <!-- <ul class="nav nav-list">
            <li class="nav-header">Patients waiting in Lab</li>
            <?php if(!is_null($msg)){
            echo $msg;
            }
            
            else{
                        // echo $msg1;
            ?>
            <?php foreach($lab_patients as $lactive){?>
            <li>
              <?php //echo anchor('doc_profile/details/'.$lactive['id']."/".$lactive['patientid'],$lactive['fname']." ".$lactive['lname']." ".$lactive['sname'])."</br>";
              }  ?>
            </li>
          </ul>
        </div>
          
          </div><!--/.well -->

          <?php } ?>

       

           

          </div><!--/span-->
         

          
          <div class="span9">
            <div class="hero-unit">
              <div id="accordion">



                      <h3>Appointments</h3>
                <div>
            
                     
                </div>

                      <h3>Patient Triage History</h3>
                          
                <div>
                  
              </div>

         

                      <h3>Patient Consultation</h3>
              <div>
                   
                
                </div>
                       
            </div><!--accordion-->
                </div><!--hero unit-->
                </div><!--span9-->
                  
               
             <div id="appointment" title="Make appointment">
              
                     
                  <table>
                    <p class="validateTips">All form fields are required.</p>
                   
                   <form id="appoints" class="form_data">
                      <tr>
                   
                      <input type="hidden" name="patientid" value="<?php echo $active['patientid']?>">
                       <input type="hidden" name="visitid" value="<?php echo $active['id']?>">
                      <td><label for="Date">Date:</label></td>
                      <td><input type="text" id="datepicker" name="Date" class="required"></td>
                      <td><label for="Time">Time:</label></td>
                      <td><input type="text" id="time" name="Time" class="required"></td>
                      </tr>
                      <tr>
                        <td><label for="Title">Title:</label></td>
                        <td> <input type="text" name="Title" id="title" class="required" /></td>
                      </tr>
                      <tr>
                        <td><label for="About">About:</label></td>
                        <td><textarea name="About" id= "About" class="required" /></textarea></td>
                      </tr>
                     <tr>
                    <td></td>
                    <td><input type="submit" name="save" value="Save Appointment" class="btn btn-small btn-info"/></td>
                   </tr>
                   </form>
                  </table>
                   
                </div>

                
                
               
              
                <!--/span-->
               <footer >
            <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank"><font = white>HealthStrat 2013</font></a></p>
   </footer>
                <!--container fluid-->
                
                <script src="<?php echo base_url()?>assets/chosen-master/chosen/chosen.jquery.js" type="text/javascript"></script>
                <script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
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