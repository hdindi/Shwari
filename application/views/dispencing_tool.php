<?php if($this->session->userdata('id')){
                 
    // redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
  <title>pharmacy</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

<style type='text/css'>
 
      body {
        padding-top: 60px;
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
    

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.min.css" media="screen"/>
<script src="http://192.168.0.109/take/assets/js/bootstrap.min.js"></script>
<script src="htpp://192.168.0.109/take/assets/js/jquery.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />


<script>
 $(function() {
$( "#accordion" ).accordion();
});
</script>  
</head>

<body>
  
	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
   <a class="brand" href="#">CAREtech</a>
    <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link">Username</a>
            </p></div>
    <ul class="nav">
		<!--<li><a href='<?php echo site_url('pharmacy/prescription')?>'>Prescription</a></li>-->
		<li><a href='<?php echo site_url('phamarcy/prescribed')?>'>Dispencing tool</a></li>
		<li><a href='<?php echo site_url('phamarcy/add_medicine')?>'>Medicine Logs</a></li>
		<li><a href='<?php echo site_url('home/do_logout')?>'> Logout</a></li>
		
	</ul>
		</div>	
	</div>
	<div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list" id="load">
              <li class="nav-header">Active patients</li>
             
          
              <?php foreach($patients as $active){?>
                    <p> 
                    <?php echo anchor('dispencing_tool/details/'.$active['id']."/".$active['patientid'],$active['fname']." ".$active['lname']." ".$active['sname'])."</br>"; ?>
                    <?php }
                     ?>  
              
            </ul>
          </div><!--/.well -->
        </div><!--/span-->

         <div class="span8">
          <div class="hero-unit">
             <div id="accordion">

             <h3>Medication dispencation</h3>
            <div>
            </div>

            <h3></h3>
            <div>
            </div>



           </div>
         </div>
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

