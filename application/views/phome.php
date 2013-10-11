<?php if($this->session->userdata('id')){
                 
    // redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Pharmacy</title>
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
         
          <a class="brand" href='<?php echo site_url('pharm_profile') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/shwari.png" alt="Home"></a>
          <div class="nav-collapse collapse">

            <p class="navbar-text pull-right">
              Logged in as <a href="" class="navbar-link"><?php echo $this->session->userdata('type') ." ". $this->session->userdata('username');?></a>
          <a href='<?php echo site_url('home/do_logout')?>'><img src="<?php echo base_url()?>assets/img/logout.png" title="Logout"></a>
         <?php if($this->uri->segment(3)){ ?>
          
          <?php }?> 
        </p>
         <ul class="nav nav-tabs nav-pills">
        <li><a class="brand" href='<?php echo site_url('pharm_profile') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/Home1.png" alt="Home"></a></li>
        <li><a href='<?php echo site_url('phamarcy/add_medicine')?>'><img src="<?php echo base_url()?>assets/img/medical_pot.png" title="Add medicines"></a></li>
    <li><a href='<?php echo site_url('pharm_profile/history')?>'><img src="<?php echo base_url()?>assets/img/presc_hist.png" title="Prescription History"></a></li>  
    <li><a href='<?php echo site_url('pharm_profile/reorders')?>'><img src="<?php echo base_url()?>assets/img/Drugreorder.png" title="Drug reorder"></a></li>  
    <li><a href='<?php echo site_url('phamarcy/all_movements')?>'>Inventory Management</a></li>  
    <li><a href='<?php echo site_url('phamarcy/add_nonemed')?>'>Add Stocks</a></li>

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
                    
                        <fieldset><legend><h4>Patients in waiting</h4></legend>
                    
                   <ul class="nav nav-list" id="load">
              <li class="nav-header"></li>
             
            <?php if(!is_null($msg)){
           echo $msg;
         }
         else{
           ?>
              <?php foreach($patients as $active){?>
                    <li> 
                    <?php echo anchor('pharm_profile/details/'.$active['id']."/".$active['patientid'],$active['fname']." ".$active['lname']." ".$active['sname']); ?>
                  </li>
                    <?php }}?>
                       </ul>
                   
                    </fieldset>
                </div>
                <!--/span-->
                <div class="span3">
                    <fieldset><legend><h4>Walk In Patients</h4></legend>
                    
               <ul class="nav nav-list" id="load">
              <li class="nav-header"></li>
             
           
              <?php foreach($walkin as $active){
				  if(empty($active)){
					  echo "You have no walkin patients";
					  }else{?>
                    <li> 
                    <?php echo anchor('pharm_profile/walk_in/'.$active['id'],$active['patientname']); ?>
                  </li>
                    <?php }
			  }?>
                       </ul>
                   
                    </fieldset>
                     
                <div class="span3">
                    
                        
                <div class="span3">
                    
                        
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
            <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank"><font = white>HealthStrat 2013</font></a></p>
   </footer>
</html>