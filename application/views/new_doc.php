<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><html>
	<head>
		<link rel="stylesheet" href="<?php echo base_url()?>css/style.css" />
        <title>Doctor</title>
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery-ui.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css" media="screen"/>
  <link rel="stylesheet" href="<?php echo base_url()?>assets/chosen-master/chosen/chosen.css" />
  <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
  <script src="<?php echo base_url()?>assets/js/modernizr.js"></script>
<!--- <script>
  $(function() {
 
  });
 </script>!-->
 
   <script>
  $(function() {
$( "#presc" ).hide();
  $( "#labs" ).hide();
  $('#checkup').submit(function (event) {
  dataString = $("#checkup").serialize();
  $.ajax({
  type:"POST",
  url:"<?php echo base_url()?>doc_profile/add_checkup",
  data:dataString,
  success:function (data) {
  alert('The patient Check Up has been updated');
  
  $("#checkup").hide();
  $('#presc').show();
  $('#labs').show();
  }
  // window.location.reload(true);
  });
  event.preventDefault();
  return false;
  });
  });

  </script>

	</head>
     <body>
		<header>
			<section class="user">
	 Welcome <?php  echo $this->session->userdata('type') ." ". $this->session->userdata('username');?>
			</section>
			<nav class="page-nav">
				<section class="logo">
					<img src="<?php echo base_url()?>assets/img/shwari.png" alt="Home">
				</section>
			</nav>
		</header>
		<section class="content">
			<section class="sidebar">
				
      <div class="span2 ">
        <div class="well sidebar-nav">
          <ul class="nav nav-list">
            <li class="nav-header">Active patients</li>
            
            <?php foreach($patients as $active){
            if(empty($active)){
            echo $msg;
            }
			else{ 
			if($active['urgency']=='urgent'){?>
            <li>
        <font color=red><?php echo anchor('doc_profile/details/'.$active['id']."/".$active['patientid'],$active['fname']." ".$active['lname']." ".$active['sname']); ?></font>
              <?php }
			  else{?>
	 <?php echo anchor('doc_profile/details/'.$active['id']."/".$active['patientid'],$active['fname']." ".$active['lname']." ".$active['sname'])."</br>"?>
				  <?php }
              
			}
			}
              
              ?>
            </li>
          </ul>
          <ul class="nav nav-list">
            <li class="nav-header">Patients waiting in Lab</li>
            <?php foreach($lab_patients as $lactive){
            if(empty($lactive['id'])){
            echo $msg;
            }
            else{
            ?>
            <li>
              <?php echo anchor('doc_profile/details/'.$lactive['id']."/".$lactive['patientid'],$lactive['fname']." ".$lactive['lname']." ".$lactive['sname'])."</br>";
              }
              }?>
            </li>
          </ul>
          </div><!--/.well -->
          </div>
          
			</section>
			<section class="tables">
				<?php  $this->load->view($view)?>
			</section>
		</section>
		<footer>
			<nav class="move">
				
			</nav>
		</footer>
	</body>
</html>