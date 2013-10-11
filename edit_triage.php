<html>

	<head>
 <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/css/form.css"/>
     
    </head>
 
	<body>
		
        <form>
       <fieldset>
          <legend>Bio Data</legend>
                  <?php
                  if($this->uri->segment(3))
                  {
                  foreach($details as $visit_info){
                  if(empty($visit_info['fname'])){
                  echo "No Bio Data";
                  }
                  else{
                  
                  ?>
                  <?php
                  $dob =  $visit_info['dob'];
                  $age = date_diff(date_create($dob), date_create('now'))->y;
                  $ids =$this->uri->segment(3);
                  if ($age <= 0){ $bage = date_diff(date_create($dob), date_create('now'))->d; $nage=$bage." Days"; }
                  elseif ($age > 0) { $nage = $age." Years"; }
                  //replace  $visit_info['dob'] with $age
                  ?>
                  <table class="table table-striped">
                    <tr>
                      <td>Patient Name:</td><td><?php echo $visit_info['fname']." ".$visit_info['lname']." ".$visit_info['sname'];?></td>
                    </tr>
                    <!--<tr>
                      <td>National ID:</td><td> <?php echo $visit_info['nationalid'];?></td>
                    </tr>-->
                    <!--<tr>
                      <td>Phone Number: </td><td><?php echo $visit_info['phone'];?></td>
                    </tr>-->
                    <tr>
                      <td>Age:</td><td><?php echo $nage;?></td>
                    </tr>
                    
                    <tr>
                      <td>Residence:</td><td><?php echo $visit_info['residence'];?></td>
                    </tr>
                  </table>
                  
                  
                  <?php }
				  }?>
                </fieldset>
                </form>

           
            <fieldset>
       
    <div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
	</div>
</div>

		<div id="hom">
                
                  <?php if($this->uri->segment(3)){?>
                       <table class="table table-bordered">
                      <th>Nurse Name</th>
                      <th>Visit Date</th>
                      <th><font color=blue>Blood pressure (mmHg)</font></th>
                      <th><font color=blue>Temperature (°C)</font></th>
                      <th><font color=blue>Height (M)</font></th>
                      <th><font color=blue>Weight (KGs)</font></th>
                      <th><font color=blue>BMI</font></th>
                      

                  <?php foreach($edit as $visit_history){?>
                  <?php
                  
                  $vdate = date('jS F Y ',strtotime($visit_history['visitdate']));
                  ?>
                   
                    <!--  <th><u><?php echo $vdate; ?></u></th>!-->
                   <!--   <th><font color=blue>Allergies </font> <?php// echo $visit_history['allergies'];?></th>!-->
                      
                     
                    <tr>
                     
                    </tr>
                  
                     <tr class="success"> 
                    
                    <td><?php echo $visit_history['fname']." ".$visit_history['lname'];?></td>
                    <td><?php echo $vdate;?></td>
                    <td><?php echo $visit_history['diastle']."/". $visit_history['systle'];?></td> 
                    <td><?php echo $visit_history['Temperature'];?></td> 
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
                        if($BMI >= 21 && $BMI <= 24){?>
                            <font color=green><?php echo round($BMI,2)?></font> 
                       <?php }?></td> 
                      
                     </tr>
                    
                  <p>
                  <?php }
                  }?>
                </table>
              </div>
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

              </fieldset>
          <?php } ?>
 <script src="<?php echo base_url()?>assets/js/prototype.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/js/protoplus.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/js/protoplus-ui.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/js/jotform.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/js/calendarview.js" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.init();
</script>    
                
	</body>
    
</html>