<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><html>
	<head>
		<link rel="stylesheet" href="style.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>css/style.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery-ui.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/chosen-master/chosen/chosen.css" />
		
		<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
		<script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
	</head>
	<body>
		<header>
			<section class="user">
				
			</section>
			<nav class="page-nav">
				<section class="logo">
					
				</section>
			</nav>
		</header>
		    <hr>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span3">
			<div class="well ">
				<ul class="nav nav-tab nav-stacked">
				
				<p><li><a href="<?php echo base_url()?>/index.php/reception">Home</a></li></p><p>	
		    	<p><li><a href="<?php echo base_url()?>/index.php/reception/newpat">Add New Patient</a></li></p><p>
		    	<li><a href="<?php echo base_url()?>/index.php/reception/patients">All Patients</a></li></p><p>
		    	<li><a href="<?php echo base_url()?>/index.php/reception/appointment">Appointments</a></li></p><p>
		    	<li><a href="<?php echo base_url()?>/index.php/reception/visit">Visits For Regular</a></li></p><p>
		    	<li><a href="<?php echo base_url()?>/index.php/reception/payments">Payments</a></li></p>
		    	
			</ul>
			</div>
			<!--/.well -->
		</div>
		<!--/span-->
		<div class="span9 well">
			<div class="row-fluid">
				<!--/span-->
				<!--/span-->
				<!--/span-->
			</div>
			<!--/row-->
			<div class="row-fluid">
				<!--/span-->
				<!--/span-->
				<!--/span-->
			</div>
			<!--/row-->
			<?php $this->load->view($view)?>
		</div>
		<!--/span-->
	</div>
	<!--/row-->
	<hr>
	<footer>
		<p>
			© Company 2013
		</p>
	</footer>
</div>
<!--/.fluid-container
		<footer>
			<nav class="move">
				
			</nav>
		</footer>-->
	</body>
</html>