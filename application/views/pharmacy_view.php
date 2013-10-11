<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><!DOCTYPE html>
<html lang="en">
  <head>
    <title>pharmacy</title>
	  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css" media="screen"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/style.css" />
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery-ui.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/chosen-master/chosen/chosen.css" />
  <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
  <script src="<?php echo base_url()?>assets/js/modernizr.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/tiny_mce/tiny_mce.js"></script>
  
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
      <?php echo anchor('pharm_profile/finish/'.$this->uri->segment(3)."/", 'Release patient','class="btn btn-danger" type="button"'); 
       echo anchor('pharm_profile/tonur/'.$this->uri->segment(3)."/", 'Send to nurse','class="btn btn-warning" type="button"'); ?>
      
 
			<?php	}?> 
   
            </p>
          </div>

  <ul class="nav">
     <li><a class="brand" href='<?php echo site_url('pharm_profile') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/Home1.png" alt="Home"></a></li>
     <li><a href='<?php echo site_url('phamarcy/add_medicine')?>'><img src="<?php echo base_url()?>assets/img/medical_pot.png" title="Add medicines"></a></li>
     <li><a href='<?php echo site_url('pharm_profile/history')?>'><img src="<?php echo base_url()?>assets/img/presc_hist.png" title="Prescription History"></a></li>  
     <li><a href='<?php echo site_url('pharm_profile/reorders')?>'><img src="<?php echo base_url()?>assets/img/Drugreorder.png" title="Drug reorder"></a></li>   
     <li><a href='<?php echo site_url('pharmacy/add_nonemed')?>'>Add New</a></li>  
 
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
             <div id="accordion">

              <h3>Bio Data</h3>
        <div>
               
               <?php

                 if($this->uri->segment(3))
                    {
                 foreach($details as $visit_info){
                  $dob =  $visit_info['dob'];
            $age = date_diff(date_create($dob), date_create('now'))->y;  
            $ids =$this->uri->segment(3);
            if ($age <= 0){ $bage = date_diff(date_create($dob), date_create('now'))->d; $nage=$bage." Days Old"; }
                    elseif ($age > 0) { $nage = $age." Years Old"; }
               ?>
            <table class="table table-striped">
            
            <tr>
            <td>Patient Name:</td>
            <td><?php echo $visit_info['fname']." ".$visit_info['lname']." ".$visit_info['sname'];?></td>
            </tr>
           
            <tr>
            <td>Age:</td>
            <td><?php echo $nage;?></td>
            </tr>
            
            <tr>
            <td>Residence:</td>
            <td><?php echo $visit_info['address'];?></td>
            </tr>
            
            </table>
            <?php } }?>
            
                  

        </div>

        
      
     <h3>Patient Triage information</h3>
     <div>
       
       <table class="table table-bordered">
        <tr>            <td>Date</td>
                       <td><font color=blue>Nurse Name</font></td>
                       <td><font color=blue>Blood pressure (mmHg)</font></td>
                       <td><font color=blue>Temperature (°C)</font></td>
                       <td><font color=blue>Height (M)</font></td>
                       <td><font color=blue>Weight (KGs)</font></td>
                       <td><font color=blue>BMI</font></td>
                       
                  </tr> 
          <?php if($this->uri->segment(4)){?>
            <?php foreach($visits as $visit_history){?>
            <?php
            
            $vdate = date('jS F Y ',strtotime($visit_history['visitdate']));

            ?>
          
                                        
                      <tr class="success">
                      <td><?php echo $vdate;?></td>
                      <td><?php echo $visit_history['fname']." ".$visit_history['lname'];?></td>  
                      <td> <?php echo $visit_history['diastle']."/". $visit_history['systle'];?></td> 
                      <td>
                        <?php $temp=$visit_history['Temperature'];?>

                        <?php 
                        if($temp < 34.9){?>
                           <font color=red><?php echo round($temp)?> </font> 
                       <?php }?>

                       <?php 
                        if($temp > 37.1){?>
                            <font color=red><?php echo round($temp)?> </font> 
                       <?php }?>

                       <?php 
                        if($temp < 37 && $temp > 35){?>
                            <font color=green><?php echo round($temp)?> </font> 
                       <?php }?> 

                      </td> 
                      <td><?php echo $visit_history['Height'];?></td> 
                      <td><?php echo $visit_history['Weight'];?></td> 
                      <td><?php $weight=$visit_history['Weight'];
                        $height=$visit_history['Height'];
                        $new_height=$height*$height;
                        $BMI=$weight/$new_height;
                        // echo round($BMI,2); ?>
                       <?php 
                        if($BMI <= 20){?>
                           <font color=orange><?php echo round($BMI,2)?> </font> 
                       <?php }?>

                       <?php 
                        if($BMI >= 25){?>
                            <font color=red><?php echo round($BMI,2)?></font> 
                       <?php }?>

                       <?php 
                        if($BMI > 20 && $BMI < 25){?>
                            <font color=green><?php echo round($BMI,2)?></font> 
                       <?php }?></td> 
                       
                     </tr>
                    
                  <p>
                  <?php }
                  }?>
                           
                </table>

   </div>
        <h3>Patient Consultation</h3>
     <div>
     <?php if($this->uri->segment(3)){?>
      <table class="table table-bordered">
       <th>Doctor's Name</th>
       <th>Complaints</th>
       <th>Past Medical History</th>
       <th>Systemic Inquiry</th>
       <th>Exmination Findings</th>
       <th>Diagnosis</th>
      <tr>
       
     <?php foreach($consultation as $current){?>
     <?php if(empty($current)){
		 echo "No data";
		 }else{?>

		  <tr class="success">
       <td><?php echo $current['Fname']." ".$current['Sname']." ".$current['Lname'];?></td>
       <td><?php echo $current['complaints'];?></td>
       <td><?php echo $current['med_history'];?></td>
       <td><?php echo $current['systemic_inquiry'];?></td>
       <td><?php echo $current['examination_findings'];?></td>
       <td><?php echo $current['diagnosis'];?></td>
    </tr>
       </table>
		<?php }
	 }
	}?>
   </div>

        <h3>Current Prescription</h3>
        <div>
           <?php echo $this->load->view($view);?>

        
           
       </div>

   

     </div>
   </div>
 </div>
        </div>

        
        <footer >
   <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank"><font color=white>HealthStrat 2013</font></a></p>
          </footer>

    </div><!--container fluid-->

<script src="<?php echo base_url()?>assets/chosen-master/chosen/chosen.jquery.js" type="text/javascript"></script>
 <script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
     
  

 <script>
 $(function() {
$( "#accordion" ).accordion({
  collapsible: true,
  heightStyle: "content" 
  });
});
 
 </script> 
 <script src="jquery.js"></script>
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
		document.getElementById("total").value = total;
		document.getElementById("cost").value = total;
		
		//div.innerHTML = "Total : " +total ;
		}
</script>
  <!-- <script>
  
  $(function() {
 $('#dispensed').submit(function (event) {
  dataString = $("#dispensed").serialize();
  $.ajax({
  type:"POST",
  url:"<?php echo base_url()?>pharm_profile/status",
  data:dataString,
  success:function (data) {
  alert('The patient prescription has been dispensed');
  window.location.reload(true);
 }
 });
 event.preventDefault();
 return false;
 });
 });
  </script>-->
  <script>
 $(function() {
 $('#presc').submit(function (event) {
  dataString = $("#presc").serialize();
  $.ajax({
  type:"POST",
  url:"<?php echo base_url()?>pharm_profile/add_prescription",
  data:dataString,
  success:function (data) {
  alert('New prescription has been added');
   document.prescribed.reset()
	}
 });
  event.preventDefault();
  return false;
  });
  });
  </script>
  
     <script> //Prescription Pop Up
  $(function() {
  $( "#dialog" ).dialog({
  autoOpen: false,
  height: 500,
  width: 500,
  modal: true,
  buttons: {
  Done: function() {
  $( this ).dialog( "close" );
  }
  },
  close: function() {
  allFields.val( "" ).removeClass( "ui-state-error" );
  }
  });
  $( "#prescribe" )
  .button()
  .click(function() {
  $( "#dialog" ).dialog( "open" );
  });
  });
  </script> 
  <style type="text/css">
    body {
    padding-top: 140px;
    padding-bottom: 40px;
    }
    .sidebar-nav {
    padding: 9px 0;
    }
    .dialog-form{
    padding-top: 150px;
    padding-bottom: 40px;
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
</body>

</html>
