
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
  <title>pharmacy</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

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
 <link rel="stylesheet" href="<?php echo base_url() ?>assets/chosen-master/chosen/chosen.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css" media="screen"/>
<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/jquery-ui.css" />
<link rel="stylesheet" href="<?php echo base_url()?>/assets/chosen-master/chosen/chosen.css" />
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
<script src="<?php echo base_url()?>assets/js/modernizr.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />

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
	</ul>
		</div>	
	</div>
	<div class="container-fluid">
      <div class="row-fluid">
        <div class="span2">
          <div class="well sidebar-nav">
            <ul class="nav nav-list" id="load">
              <li class="nav-header">Active patients</li>
             
            <?php if(!is_null($msg)){
				   echo $msg;
			   }
			   else{
				   ?>
              <?php foreach($patients as $pactive){?>
                    <li> 
                    <?php echo anchor('pharm_profile/history/'.$pactive['id']."/".$pactive['patientid'],$pactive['fname']." ".$pactive['lname']." ".$pactive['sname'])."</br>"; ?>
                  </li>
                    <?php }?>
                       </ul>
                       <?php }?>
          </div><!--/.well -->
        </div><!--/span-->

         <div class="span10">
          <div class="hero-unit">
             <div class="accordion">


         <h3>Drugs to be Reorderd</h3>

        <table class="table table-bordered">

      <tr class="success">
        <td>Medicine Code </td>
        <td>Medicine Name</td>
        <td>Medicine Strength</td>
        <td>Medicine Units</td>
        <td>Stock in Hand </td>
        <td>Minimum Amount</td>

       </tr>
<?php if(!is_null($msg1)){
				   echo $msg1;
			   }
			   else{ ?>
        <?php foreach($order as $stocks){
			?>
			
        <tr>
        <td><?php echo $stocks['code'];?></td>
        <td><?php echo $stocks['Medicine_name'];?></td>
        <td><?php echo $stocks['strength'];?></td>
        <td><?php echo $stocks['units']?></td>
        <td><?php echo $stocks['stock_in_hand'];?></td>
        <td><?php echo $stocks['min_amount'];?></td>

       </tr>

      
          <?php 
		}
		}?>
        </table>
          
       
           


        </div>
     </div>
</div>

        </div><!--/span-->

         <footer >
            <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank">HealthStrat 2013</a></p>
          </footer>

    </div><!--container fluid-->
</body>
</html>
