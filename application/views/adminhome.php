<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Administrator</title>
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css" media="screen"/>
    <script src="?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="?php echo base_url()?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/modernizr.js"></script>

     <style type="text/css">
      body {
        padding-top:140px;
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
</head>
<body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">

        <div class="container-fluid">
         
          <a class="brand" href='<?php echo site_url('admin') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/shwari.png" alt="Home"></a>
          <div class="nav-collapse collapse">

            <p class="navbar-text pull-right">
              Logged in as <a href="" class="navbar-link"><?php echo $this->session->userdata('type') ." ". $this->session->userdata('username');?></a>
          <a href='<?php echo site_url('home/do_logout')?>'><img src="<?php echo base_url()?>assets/img/logout.png" title="Logout"></a>
         <?php if($this->uri->segment(3)){ ?>
          
          <?php }?> 
        </p>
     <ul class="nav">
        <li><a class="brand" href='<?php echo site_url('admin') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/Home1.png" alt="Home"></a></li>

        <li><a href='<?php echo site_url('admin/loadnewEmp')?>'><img src="<?php echo base_url()?>assets/img/addemp.png"  title="Add Employee"></a></li>
        <li><a href='<?php echo site_url('admin/employee_management')?>'><img src="<?php echo base_url()?>assets/img/employees.png"  title="Employee management"></a></li>
        <li> <a href='<?php echo site_url('admin/patient_management')?>' title="css menus"><img src="<?php echo base_url()?>assets/img/patient1.png" title="All patients"></a></li>
        <li> <a href='<?php echo site_url('admin/visit_management')?>' title="css menus"><img src="<?php echo base_url()?>assets/img/visits.png" title="visit patients"></a> </li>
        <li> <a href='<?php echo site_url('admin/packages')?>' title="css menus"><img src="<?php echo base_url()?>assets/img/package.png" title="Package Management"></a> </li>
        <li> <a href='<?php echo site_url('admin/reports')?>' title="css menus">Reports</a> </li>

     </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>


   <div class="container-fluid" style="background-color: white">
    <div class="row-fluid">
        <!--/span-->
        <div class="span13">
            <div class="row-fluid">
                <div class="span3">
                    
                        <fieldset><legend><h4>Patients in Waiting</h4></legend>
                    
                    <ul class="nav nav-list nav-stacked">
                          <li class="nav-header"><h4>Nurse Queue</h4></li>

                         <?php foreach($patients as $active){
							 if(empty($active)){
								  echo "<font color=red>You have no Active patients</font><br />";
								  }else{?>
              <li>
                <?php echo $active['fname']." ".$active['lname']." ".$active['sname']; ?>
                <?php }?>
              </li>
              <?php } ?>
            </ul>
            <ul class="nav nav-list nav-stacked">
            <li class="nav-header"><h4>Doctor Queue</h4></li>
                <?php foreach($doc_patients as $active){
					if(empty($active)){
			            echo "<font color=red>You have no Active patients</font><br />";
						}else{?>
              <li>
                <?php echo $active['fname']." ".$active['lname']." ".$active['sname']; ?>
                <?php }?>
              </li>
              <?php } ?>
            </ul>
            <ul class="nav nav-list nav-stacked">
            <li class="nav-header"><h4>Lab Queue</h4></li>
                 <?php foreach($lab_patients as $active){
					 if(empty($active)){
						 echo "<font color=red>You have no Active patients</font><br />";
						 }else{?>
              <li>
                <?php echo $active['fname']." ".$active['lname']." ".$active['sname']; ?>
                <?php }
				 }?>
              </li>
            </ul>
            <ul class="nav nav-list nav-stacked">
            <li class="nav-header"><h4>Pharmacy Queue</h4></li>
                <?php foreach($pharm_patients as $active){
					if(empty($active)){
                       echo "<font color=red>You have no Active patients</font><br />";
					   }else{?>
              <li>
                <?php echo $active['fname']." ".$active['lname']." ".$active['sname']; ?>
                <?php }?>
              </li>
              <?php } ?>
            </ul>
            
                   
                    </fieldset>
                </div>
                <!--/span-->
                <div class="span3">
                    
                        <fieldset><legend><h4>Appointments</h4></legend>
                    
                    <ul class="nav nav-list nav-stacked">
                
                            <?php if(!is_null($msg)){
                                  echo $msg;
                                       }
                                   else{?>
              
                        <?php foreach($home as $active){?>
            <li>
                <?php echo anchor('reception/appointment',$active['fname']." ".$active['lname']." ".$active['sname']); ?>
                <?php }?>

            </li>
                 <?php } ?>
             </ul>
           
                    
                    </fieldset>
                </div>
                <!--/span-->
                <div class="span3">
                    
                        <fieldset><legend><h4>Lab Payments </h4></legend>
                   
                    <ul class="nav nav-list nav-stacked">
                
                    <?php if(!is_null($msg)){
                    echo $msg;
                            }
                        else{ ?>
              
                   <?php foreach($topay as $payers){?>
              <li>
                   <?php echo $payers['fname']." ".$payers['lname']." ".$payers['sname']; ?>
                   <?php }?>
              </li>
                   <?php } ?>
            </ul>
                   
                    </fieldset>
                </div>
                <div class="span3">
                    
                        <fieldset><legend><h4>Pharmacy Payments </h4></legend>
                   
            <ul class="nav nav-list nav-stacked">
                
                     <?php if(!is_null($msg)){
                         echo $msg;
                           }
                       else{?>
              
                     <?php foreach($topha as $payers){?>
              <li>
                  <?php echo $payers['fname']." ".$payers['lname']." ".$payers['sname']; ?>
                  <?php }?>
              </li>
                  <?php } ?>
            </ul>
                   
                       </fieldset>
                </div>
                <!--/span-->
            </div>
            <!--/row-->
            <div class="row-fluid">
                <!--/span-->
                <!--/span-->
                <!--/span-->
            </div>
            <!--/row-->
        </div>
        <!--/span-->
    </div>
    <!--/row-->
    <hr>
   
</div>
<!--/.fluid-container-->
</body>
<footer >
            <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank"><font color=white>HealthStrat 2013</font></a></p>
   </footer>
</html>