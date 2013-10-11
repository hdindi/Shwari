
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
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery-ui.css" />
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
              <br/>
                <?php if($this->uri->segment(4)){?>
      <?php echo anchor('pharm_profile/finish_walkin/'.$this->uri->segment(3)."/", 'Release patient','class="btn btn-danger" type="button"'); 
       echo anchor('pharm_profile/tonur/'.$this->uri->segment(3)."/", 'Send to nurse','class="btn btn-warning" type="button"'); ?>
      
 
			<?php	}?> 
   
            </p></div>
   <ul class="nav">
     <li><a class="brand" href='<?php echo site_url('pharm_profile') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/Home1.png" alt="Home"></a></li>
     <li><a href='<?php echo site_url('phamarcy/add_medicine')?>'><img src="<?php echo base_url()?>assets/img/medical_pot.png" title="Add medicines"></a></li>
    <li><a href='<?php echo site_url('pharm_profile/history')?>'><img src="<?php echo base_url()?>assets/img/presc_hist.png" title="Prescription History"></a></li>  
    <li><a href='<?php echo site_url('pharm_profile/reorders')?>'><img src="<?php echo base_url()?>assets/img/Drugreorder.png" title="Drug reorder"></a></li>   
 
  </ul>

   <div class="nav-collapse collapse" >
    <?php if($this->uri->segment(4)){?>
     <?php foreach($names as $patientname){
    if(empty($patientname)){
      echo " ";
      }
    else{
    echo "<strong>".$patientname['fname']." ".$patientname['lname']." ".$patientname['sname']."</strong>";
    }
    }
    }?>

   </div>
    </div>	
	</div>
	<div class="container-fluid">
      <div class="row-fluid ">

        <div class="span2 ">
          <div class="well sidebar-nav affix">
            <ul class="nav nav-list" id="load">
              <li class="nav-header">Patients in waiting</li>
             
            <?php if(!is_null($msg)){
				   echo $msg;
			   }
			   else{
				   ?>
              <?php foreach($patients as $active){?>
                    <li> 
                    <?php echo anchor('pharm_profile/details/'.$active['id']."/".$active['patientid'],$active['fname']." ".$active['lname']." ".$active['sname'])."</br>"; ?>
                  </li>
                    <?php }}?>
                       </ul>

                <?php if($this->uri->segment(4)){?>
               <div class="alert">
            <table > 
          <?php foreach($names as $patientname){
              if(empty($patientname)){
                echo " ";
                }
              else{


              echo "<strong>".$patientname['fname']." ".$patientname['lname']." ".$patientname['sname']."</strong>";
              }}?>
          
              <th><p class="alert alert-error">Allergic to</p></th>
                  <?php
                       if($this->uri->segment(3))
                      {
                      foreach($alls as $ally){?>
                       <tr class="alert alert-error"><td><?php echo $ally['allergy'];?><td></tr>
                      <?php } }?>      
             </table>
                  </p>
              
           </div>
           <?php } ?> 
           
          </div><!--/.well -->
        </div><!--/span-->
 <div class="span10">
          <div class="hero-unit">       
         	
                 <fieldset>
   <legend>Prescriptions</legend>
         <?php echo $this->load->view($view);?>
   </fieldset>
     
   </div>
   
 </div>
        </div>

        
        <footer >
   <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank"><font color=white>HealthStrat 2013</font></a></p>
          </footer>

    </div><!--container fluid-->

<script src="<?php echo base_url()?>assets/chosen-master/chosen/chosen.jquery.js" type="text/javascript"></script>
  <script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
      <!-- Le javascript
    ================================================== -->
   <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
<script>


  $(function() {
  $('#presc').submit(function (event) {
  dataString = $("#presc").serialize();
 
  $.ajax({
  type:"POST",
  url:"<?php echo base_url()?>pharm_profile/add_med",
  data:dataString,
  success:function (data) {
  alert('The patient prescription has been updated');
  // $("#presc").reset();
  // $('#presc')[0].reset();
  //document.prescription.reset()
     document.location.reload(true);

  
  }

  });
  event.preventDefault();
  return false;
  
  });
  });
  
  </script>
   <script type="text/javascript">
        <!--
        function un_check(){
     for (var i = 0; i < document.frmactive.elements.length; i++) {
      var e = document.frmactive.elements[i];
         if ((e.name != 'allbox') && (e.type == 'checkbox')) {
        e.checked = document.frmactive.allbox.checked;
        }}}
        //-->
        </script>
  <script type="text/javascript">

function calculate() {
        var el, i = 0;
		var total = 0;
		while(el = document.getElementsByName("chk[]")[i++]) {
			  var mystr = el.value;
    		  var myarr = mystr.split("|");
              var myvar = myarr[0] + "|" + myarr[1];
              var n = myarr[0];
              var m = myarr[1];
			 // 
		if(el.checked) { total= total + Number(m);
		}
		}
		//alert(total);
		document.getElementById("cost").value = total;
		document.getElementById("total").value = total;
		
		//div.innerHTML = "Total : " +total ;
		}
</script>
</body>

</html>
