<!DOCTYPE html>
<html lang="en">
<head>
  <title>Reception</title>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<link type="text/css" rel="stylesheet" href="temp.css" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
 <style type="text/css">

      body {
        padding-top: 135px;
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
<script src="?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script src="?php echo base_url()?>assets/js/jquery.min.js"></script>


</head>
<body>

	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
         <a class="brand" href="#"><img src="<?php echo base_url()?>assets/img/shwari.png" border="0"></a>
           <div class="nav-collapse collapse">
                 <p class="navbar-text pull-right">
                      Logged in as <a href="#" class="navbar-link"><?php  echo $this->session->userdata('type') ." ". $this->session->userdata('username');?></a>
                 </p>
            </div>
                 <ul class="nav nav-tabs nav-pills">
		               <li><a href='<?php echo site_url('reception/patient_management')?>'>Patients</a></li>
		               <li><a href='<?php echo site_url('reception/visit_management')?>'>Visits</a></li>
		               <li><a href='<?php echo site_url('home/do_logout')?>'> Logout</a></li>
	             	</ul>
		  </div>	
	</div>
   <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">

           <!-- <ul class="nav nav-list">
              <li class="nav-header">Active patients</li>
              <?php// foreach($patients as $active){?>
          
            <p>
             <?php// echo anchor('profile/details/'.$active['id']."/".$active['patientid'],$active['fname']." ".$active['lname']." ".$active['sname'])."</br>"; ?>
     <?php //}?>

</p> 

            </ul>-->

          </div><!--/.well -->
        </div><!--/span-->


        <div class="span9">
          <div class="hero-unit">
             <div id="accordion">
                  <h3>All Patients</h3>
        <div>
            <?php echo $output; ?>
        </div>
		
        </div>
      </div>

        </div><!--/span-->
         <footer >
            <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank"><font = white>HealthStrat 2013</font></a></p>
   </footer>
    </div><!--container fluid-->
	
</body>
 
    <script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap-carousel.js"></script>
     <script>
  $(function() {
  $( "#accordion" ).accordion({
  collapsible: true,
  heightStyle: "content"
  });
  });
  </script>
<!--<script>
$(document).ready(function()
{
  var changeYear = $( ".datepicker-input" ).datepicker( "option", "changeYear" );
  $( ".datepicker-input" ).datepicker( "option", "yearRange", "-100:+0" );
  $( ".datepicker-input" ).datepicker( "option", "maxDate", '+10m +10w' );
});</script>!-->
<script type="text/javascript">
    $(document).ready(function(){
      
      $("#crudForm").validate({
        rules:{
         // lname:"required",
          fname:"required",
          lname:"required",
          Gender:"required",
          dob:"required",
          nationalid:
          {
            required:true,
            number: true,
            minlength: 7,
            maxlength: 8
          },
          email:{
              
              email: true
            },
          
        },
        messages:{
          //sname:"Enter your last name",
          fname:"Enter your first name",
          lname:"Enter your surname name",
          dob:"Date of Birth is needed",

          
          nationalid:{
            required:"Enter your national id",
            number:"Enter valid Phone Number",
            minlength:"Enter atleast 7 digits",
            maxlength:"Enter atmost 9 digits"
            
          },

          email:{
            
            email:"Enter valid email address"
          },
          
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight:function(element, errorClass, validClass) {
          $(element).parents('.control-group').addClass('error');
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).parents('.control-group').removeClass('error');
          $(element).parents('.control-group').addClass('success');
        }
      });
    });
    </script>
</html>


