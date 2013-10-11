<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
  <title>Add medicine</title>
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

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/grocery_crud\themes\datatables\css\jquery.dataTables.css" media="screen"/>
<script src="?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script src="?php echo base_url()?>assets/js/jquery.min.js"></script>
</head>

<body>
  
	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <a class="brand" href='<?php echo site_url('pharm_profile') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/shwari.png" alt="Home"></a>

    <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link"><?php  echo $this->session->userdata('type') ." ". $this->session->userdata('username');?></a>
              <a href='<?php echo site_url('home/do_logout')?>'> <img src="<?php echo base_url()?>assets/img/logout.png" title="Logout"></a>
            </p></div>
   <ul class="nav">
     <li><a class="brand" href='<?php echo site_url('pharm_profile') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/Home1.png" alt="Home"></a></li>
     <li><a href='<?php echo site_url('phamarcy/add_medicine')?>'><img src="<?php echo base_url()?>assets/img/medical_pot.png" title="Add medicines"></a></li>
     <li><a href='<?php echo site_url('pharm_profile/history')?>'><img src="<?php echo base_url()?>assets/img/presc_hist.png" title="Prescription History"></a></li>
    <li><a href='<?php echo site_url('phamarcy/all_movements')?>'>Inventory Management</a></li>    
    <li><a href='<?php echo site_url('phamarcy/add_nonemed')?>'>Add Stocks</a></li> 
  </ul>
		</div>	
	</div>
	<div class="container-fluid">
      <div class="row-fluid">
      
	  <div class="span15">
          <div class="hero-unit">
		<?php echo $output; ?>
    </div>
</div>

        </div><!--/span-->
         <footer >
            <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank"><font color="white">Enkishia Group Ltd</font></a></p>
          </footer>
    </div><!--container fluid-->

</body>
</html>
