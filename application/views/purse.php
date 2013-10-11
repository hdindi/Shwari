<!DOCTYPE html>
<html lang="en">
<head>
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
<script src="?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script src="?php echo base_url()?>assets/js/jquery.min.js"></script>
</head>
<body>

	 <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <a class="brand" href='<?php echo site_url('profile') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/shwari.png" alt="Home"></a>
        <div class="nav-collapse collapse">
          <p class="navbar-text pull-right">
          Logged in as <a href="#" class="navbar-link"><?php echo $this->session->userdata('type') ." ". $this->session->userdata('username');?></a>
          <a href='<?php echo site_url('home/do_logout')?>'> <img src="<?php echo base_url()?>assets/img/logout.png" title="Logout"></a><br/>
        </p>
        <!--<?php if($this->uri->segment(3)){ ?>
      <?php echo anchor('profile/todoc/'.$this->uri->segment(3)."/", 'Send to doctor','class="btn btn-primary" type="button"'); ?>
             <?php echo anchor('profile/finish/'.$this->uri->segment(3)."/", 'Deactivate patient','class="btn btn-danger" type="button"'); ?>
      <?php }?>-->
        </div>

    <ul class="nav nav-tabs nav-pills">
		<li><a class="brand" href='<?php echo site_url('reception') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/Home1.png" alt="Home"></a></li>
        <li><a href="<?php echo base_url('pats/patient_management')?>"><img src="<?php echo base_url()?>assets/img/patient1.png" title="All patients"></a></li> <li><a href="<?php echo base_url()?>index.php/reception/viewpat"><img src="<?php echo base_url()?>assets/img/newpatients.png" title="add new patient"></a></li>
        <li><a href="<?php echo base_url()?>index.php/reception/appointment"><img src="<?php echo base_url()?>assets/img/appointment-new.png" title="Appointments"></a></li>
        <li><a href="<?php echo base_url()?>index.php/reception/visit"><img src="<?php echo base_url()?>assets/img/visits.png" title="visit for regular patients"></a></li>
			
	  </ul>
     
		</div>	
	</div>

	
        <div class="span15">
          <div class="hero-unit">
		            <?php echo $output; ?>
          </div>
        </div>

        </div>
           <footer >
            <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank">HealthStrat 2013</p>
          </footer>
    </div><!--container fluid-->
	
</body>
</html>
