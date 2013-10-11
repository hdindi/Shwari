<?php if($this->session->userdata('id')){
                 
    // redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
  <title>Doctor</title>
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
      <?php echo anchor('pharm_profile/finish/'.$this->uri->segment(3)."/", 'Release patient','class="btn btn-danger" type="button"'); 
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
         		
<p> <?php //echo form_open('doc_profile/add_checkup');
              $patientid = $this->uri->segment(4);
              ?>
              <form id="checkup" class="form" onSubmit="return validateForm()" action="<?php echo base_url()?>doc_profile/edit/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" method="post">
               <table class="table table-bordered">
                  
                  
                  <tr>
                    <td><input type="hidden" value="<?php echo $this->uri->segment(3);?>"  name="visitid"></td>
                    <td><input type="hidden" value="<?php echo $patientid;?>"  name="patientid"></td>
                  </tr>
                  <tr>
                  <?php foreach($check as $edit){?>
                    <td><label for="Complaints">Complaints<span class="form-required">*</span></label></td>
                    <td><textarea name="complaints" style="width:90%" class="required"cols="100" rows="4" ><?php echo $edit['complaints'];?></textarea></td>
                    
                  </tr>
                  <tr>
                    <td><label for="Past Medical History">Past Medical History<span class="form-required">*</span></label></td>
                    <td><textarea rows="4" cols="100" name="med_history" id="med_history" class="required"style="width:90%"><?php echo $edit['med_history'];?></textarea></td>
                  </tr>
                  <tr>
                    <td><label for="Systemic Inquiry">Systemic Inquiry<span class="form-required">*</span></label></td>
                    <td><textarea rows="5" cols="100" name="systemic_inquiry" id="systemic_inquiry" class="required"style="width:90%"><?php echo $edit['systemic_inquiry'];?></textarea></td>
                  </tr>
                  <tr>
                    <td><label for="Examination Findings">Examination Findings<span class="form-required">*</span></label></td>
                    <td><textarea rows="5" cols="40" name="examination_findings" id="examination_findings" class="required" style="width:90%"><?php echo $edit['examination_findings'];?></textarea></td>
                  </tr>
                  <tr>
                    <td><label for="Working Diagnosis">Working Diagnosis<span class="form-required">*</span></label></td>
                    <td><textarea rows="5" cols="40" name="working_diagnosis" id="working_diagnosis" class="required" style="width:90%"><?php echo $edit['working_diagnosis'];?></textarea></td>
                  </tr>
          <?php } ?>
                  
                  <tr>
                    <td><input type="submit" name="save"  value="Post Results"></td>
                  </tr>
                  
                </table>
              </form>
              
              
              </p>
              <button id="order_labs" class="btn btn-large btn-success" >Order Lab Test</button>
              <button id="prescribe" class="btn btn-large btn-success" >Make A Prescription</button>
              <!-- <button id="appointments">Make appointments</button>-->
  
     
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
$( "#accordion" ).accordion({
  collapsible: true,
  heightStyle: "content" 
  });
});
 
 </script> 
 <script src="jquery.js"></script>


</body>

</html>
