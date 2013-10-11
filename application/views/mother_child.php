<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Nurse</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/style.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery-ui.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/chosen-master/chosen/chosen.css" />
     <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/form.css"/>
     
	 <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css" media="screen"/>
    <script src=""></script>
    <script src=""></script>
    <script src="<?php echo base_url()?>assets/js/modernizr.js"></script>
      <style type="text/css">
    .form-label{
        width:150px !important;
    }
    .form-label-left{
        width:150px !important;
    }
    .form-line{
        padding-top:12px;
        padding-bottom:12px;
    }
    .form-label-right{
        width:150px !important;
    }
    .form-all{
        width:1000px;
        color:#524B3A !important;
        font-family:'Verdana';
        font-size:12px;
    }
    .form-radio-item label, .form-checkbox-item label, .form-grading-label, .form-header{
        color:#524B3A;
    }

</style>
  
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

 </head>
  <body data-spy="scroll" data-target=".hom">
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">

        <a class="brand" href='<?php echo site_url('profile') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/shwari.png" alt="Home"></a>

        <div class="nav-collapse collapse">
          <p class="navbar-text pull-right">
          Logged in as <a href="" class="navbar-link"><?php echo $this->session->userdata('type') ." ". $this->session->userdata('username');?></a>
          <a href='<?php echo site_url('home/do_logout')?>'> <img src="<?php echo base_url()?>assets/img/logout.png" title="Logout"></a>
         <?php if($this->uri->segment(3)){ ?>
          
          <?php }?> 
        </p>


        </div>
        <ul class="nav nav-tabs nav-pills">
           <li><a class="brand" href='<?php echo site_url('profile') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/Home1.png" alt="Home"></a></li>
           <li><a href='<?php echo site_url('nurse/patient_management')?>'><img src="<?php echo base_url()?>assets/img/patient1.png" title="All patients"></a></li>
            
        </ul>
          
          <?php if($this->uri->segment(4)){?>
          <?php echo anchor('profile/todoc/'.$this->uri->segment(3)."/", 'Send to doctor','class="btn btn-primary" type="button"'); ?>
       
          <?php foreach($names as $patientname){
              if(empty($patientname)){
                echo " ";
                }
              else{
              echo "<strong>".$patientname['fname']." ".$patientname['lname']." ".$patientname['sname']."</strong>";
              }
          }?>
          
          <?php }//echo anchor('profile/finish/'.$this->uri->segment(3)."/", 'Deactivate patient','class="btn btn-danger" type="button"'); ?><br/>
          
       </div>
    </div>
    <div class="container-fluid">
      <div class="row-fluid">
         <div class="span15">
            <div class="hero-unit">
          <fieldset>
          <legend>Maternal Profile</legend>
         <?php echo $this->load->view($view);?>
          </fieldset>
		<fieldset>
        <legend>Medical and Surgical History</legend>
        <?php echo $this->load->view($hist);?>
        </fieldset>
       <!--  <fieldset>
       <legend>Previous Pregnancies</legend>
        <?php //echo $this->load->view($previous); //make a tab?>
        </fieldset>!-->
         <fieldset>
        <legend>Physical Exam</legend>
        <?php echo $this->load->view($physical);?>
        </fieldset>
         <fieldset>
        <legend>Antenatal Profile</legend>
        <?php echo $this->load->view($ante);?>
        </fieldset>
           <!-- <fieldset>
       <legend>Present Pregnancy</legend>
        <?php //echo $this->load->view($present); //make a tab?>
        </fieldset>
        <fieldset>-->
      <!--  <legend>Preventive Services</legend>
        <?php //echo //$this->load->view($preventive); //make a tab?>
        </fieldset>!-->
        

</div><!--/span-->
 </div> 
 </div>                
          <footer >
            <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank"><font color=white>HealthStrat 2013</font></a></p>
          </footer>
          </div><!--container fluid-->
          
 <script>
  $(function() {
  $('#maternal_profile').submit(function (event) {
  dataString = $("#maternal_profile").serialize();
    $.ajax({
  type:"POST",
  url:"<?php echo base_url()?>mother_child/maternal_profile",
  data:dataString,
  success:function (data) {
  alert('The maternal profile has been added');
  document.location.reload(true);
  }
  });
  event.preventDefault();
  return false;
  
  });
  });
 
  </script>
   <script>
  $(function() {
  $('#maternal_history').submit(function (event) {
  dataString = $("#maternal_history").serialize();
   $.ajax({
  type:"POST",
  url:"<?php echo base_url()?>mother_child/maternal_history",
  data:dataString,
  success:function (data) {
  alert('The maternal history has been added');
  document.location.reload(true);
  }
  });
  event.preventDefault();
  return false;
  
  });
  });
 
  </script>
 <script>
  $(function() {
  $('#previous').submit(function (event) {
  dataString = $("#previous").serialize();
   $.ajax({
  type:"POST",
  url:"<?php echo base_url()?>mother_child/pregnancy",
  data:dataString,
  success:function (data) {
  alert('The previous pregnancies have been recorded');
  document.location.reload(true);
  }
  });
  event.preventDefault();
  return false;
  
  });
  });
 
  </script>
  <script>
  $(function() {
  $('#physical').submit(function (event) {
  dataString = $("#physical").serialize();
   $.ajax({
  type:"POST",
  url:"<?php echo base_url()?>mother_child/physical",
  data:dataString,
  success:function (data) {
  alert('The physical examination has been been recorded');
  document.location.reload(true);
  }
  });
  event.preventDefault();
  return false;
  
  });
  });
 
  </script>
  <script>
  $(function() {
  $('#antenatal').submit(function (event) {
  dataString = $("#antenatal").serialize();
   $.ajax({
  type:"POST",
  url:"<?php echo base_url()?>mother_child/ante",
  data:dataString,
  success:function (data) {
  alert('The ante natal profile has been saved');
  document.location.reload(true);
  }
  });
  event.preventDefault();
  return false;
  
  });
  });
 
  </script>


           </body>
      </html>
