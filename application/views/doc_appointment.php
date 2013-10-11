<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Doctor Appointments</title>
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

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">

        <div class="container-fluid">
         
          <a class="brand" href='<?php echo site_url('doc_profile') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/shwari.png" alt="Home"></a>
          <div class="nav-collapse collapse">

            <p class="navbar-text pull-right">
              Logged in as <a href="" class="navbar-link"><?php echo $this->session->userdata('type') ." ". $this->session->userdata('username');?></a>
          <a href='<?php echo site_url('home/do_logout')?>'><img src="<?php echo base_url()?>assets/img/logout.png" title="Logout"></a>
         <?php if($this->uri->segment(3)){ ?>
          
          <?php }?> 
        </p>
         <ul class="nav nav-tabs nav-pills">
        <li><a class="brand" href='<?php echo site_url('doc_profile') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/Home1.png" alt="Home"></a></li>
        <li><a href='<?php echo site_url('doctor/patient_management')?>'><img src="<?php echo base_url()?>assets/img/patient1.png" title="All patients"></a></li>
       
         </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="well" style="margin-top: 200px; margin-left:100px; margin-right:30px;">
<legend>Today's Appoinments</legend>
<table class="table">
<tr>
<th>Patient Name</th>
<th>Appointmment Time</th>
<th>Reason for Appoinment</th>
<th>Phone Number</th>
</tr>
<tr>
<?php foreach($home as $appointment){?>
<?php if(empty($appointment)){
	echo "You have no appointments";
}else{?>
<td><?php echo $appointment['fname']." ".$appointment['lname']." ".$appointment['sname']?></td>
<td><?php echo $appointment['Time']?></td>
<td><?php echo $appointment['About']?></td>
<td><?php echo $appointment['phone']?></td>
</tr>
<?php } 
}?>

</table>
</div>

        </div>
    </div>
    </div>
		</section>
	<hr>
	<footer >
            <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank"><font color=white>HealthStrat 2013</font></a></p>
   </footer>

	
</body>
</html>