<?php if($this->session->userdata('id')){
                 
    // redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
  <title>Management</title>
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

<style type='text/css'>
 
      body {
        padding-top: 135px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 90px 0;
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
       

<style type='text/css'>
 body {
        padding-top: 135px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 90px 0;
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
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/grocery_crud\themes\datatables\css\jquery.dataTables.css" media="screen"/>
 <link rel="stylesheet" href="<?php echo base_url() ?>assets/chosen-master/chosen/chosen.css" />
<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/jquery-ui.css" />
<link rel="stylesheet" href="/resources/demos/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css" media="screen"/>
<script src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
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
  $( "#datepicker" ).datepicker({ minDate: "-1Y", maxDate: 0});
  });
  </script>

  <style>table.data-table {border: 1px solid #DDD;margin: 10px auto;border-spacing: 0px;}
table.data-table th {border: none;color: #036;text-align: center;background-color: 	#FFF380;border: 1px solid #DDD;border-top: none;max-width: 450px;}
table.data-table td, table th {padding: 4px;}
table.data-table td {border: none;border-left: 1px solid #DDD;border-right: 1px solid #DDD;height: 30px;margin: 0px;border-bottom: 1px solid #DDD;}
</style>
</head>

<body>
  
	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
      <a class="brand" href='<?php echo site_url('management') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/shwari.png" alt="Home"></a>

    <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link"><?php  echo $this->session->userdata('type') ." ". $this->session->userdata('username');?></a>
              <a href='<?php echo site_url('home/do_logout')?>'> <img src="<?php echo base_url()?>assets/img/logout.png" title="Logout"></a>
            </p></div>
    <ul class="nav">
		<!-- <li><a class="brand" href='<?php echo site_url('pharm_profile') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/Home1.png" alt="Home"></a></li>
     <li><a href='<?php echo site_url('phamarcy/add_medicine')?>'><img src="<?php echo base_url()?>assets/img/medical_pot.png" title="Add medicines"></a></li>
		 <li><a href='<?php echo site_url('pharm_profile/history')?>'><img src="<?php echo base_url()?>assets/img/presc_hist.png" title="Prescription History"></a></li>!--> 
	</ul>
		</div>	
	</div>
	<div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list" id="load">
              <li class="nav-header">Quick Menu</li>
              <div id="accordion">
              <h3>Patient Reports</h3>
              <div>
              	<h4>Visits</h4>
              </div>
              <h3>Employee Reports</h3>
              <div>
             <ul>
             	<li><a href="<?php echo base_url()?>management/employees">All Employees</a></li>
             	<li><a href="<?php echo base_url()?>management/logs">Employees</a></li>
			 </ul>
              </div>
              <h3>Income Reports</h3>
              <div>
              	<ul>
              		<li><a href="<?php echo base_url()?>management/lab">Lab Incomes</a></li>
              		<li><a href="<?php echo base_url()?>management/pharm">Pharmacy Incomes</a></li>
              		<li><a href="<?php echo base_url()?>management/reports">All Incomes</a></li>
              	</ul>
              </div>
              </li>
                 </ul>
                      
          </div><!--/.well -->
        </div><!--/span-->

         <div class="span9">
          <div class="hero-unit">
          
         <?php echo $output; ?>
     </div>
</div>

        </div><!--/span-->

         <footer >
            <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank">HealthStrat 2013</a></p>
          </footer>
	
    </div><!--container fluid-->
    <script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
    <script src="<?php echo base_url()?>assets/chosen-master/chosen/chosen.jquery.js" type="text/javascript"></script>
</body>
</html>
