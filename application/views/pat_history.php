<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><html>
	<head>
	</head>
     <body>
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
                  if ($age <= 0){ $bage = date_diff(date_create($dob), date_create('now'))->d; $nage=$bage." Days Old"; }
                  elseif ($age > 0) { $nage = $age." Years Old"; }
                  //replace  $visit_info['dob'] with $age
                  ?>
                  <table class="table table-striped">
                    <tr>
                      <td>Patient Name:</td><td><?php echo $visit_info['fname']." ".$visit_info['lname']." ".$visit_info['sname'];?></td>
                    </tr>
                    <!--<tr>
                      <td>National ID:</td><td> <?php echo $visit_info['nationalid'];?></td>
                    </tr>
                    <tr>
                      <td>Phone Number: </td><td><?php echo $visit_info['phone'];?></td>
                    </tr>-->
                    <tr>
                      <td>Age:</td><td><?php echo $nage;?></td>
                    </tr>
                    <!--<tr>
                      <td>Gender:</td><td><?php echo $visit_info['sex'];?></td>
                    </tr>-->
                    <tr>
                      <td>Residence:</td><td><?php echo $visit_info['residence'];?></td>
                    </tr>
                  </table>
                  
                  
                  <?php }
                  }?>
                   <div>
                      <table class="table table-bordered">
                      <tr>
                      <th>Nurse Name</th>
                      <th>Date<th>
                      <th><font color=blue>Blood pressure (mmHg)</font><th>
                      <th><font color=blue>Temperature (°C)</font><th>
                      <th><font color=blue>Height (M)</font><th>
                      <th><font color=blue>Weight (KGs)</font><th>
                      <th><font color=blue>BMI</font> <th>
                      </tr>
						<?php foreach($visits as $visit_history){?>
                  <?php
                  $vdate = date('jS F Y',strtotime($visit_history['visitdate']));
                  ?>
                 <tr class="success"> 
                   	 <td><?php echo $visit_history['fname']." ".$visit_history['lname'];?></td>
                     <td><?php echo $vdate;?></td>
                      <td> <?php echo $visit_history['diastle']."/". $visit_history['systle'];?></td> 
                      <td> <?php echo $visit_history['Temperature'];?></td> 
                      <td> <?php echo $visit_history['Height'];?></td> 
                      <td> <?php echo $visit_history['Weight'];?></td> 
                      <td><?php $weight=$visit_history['Weight'];
                        $height=$visit_history['Height'];
                        $new_height=$height*$height;
                        $BMI=$weight/$new_height;
                        // echo round($BMI,2); ?>
                       <?php 
                        if($BMI <= 20){?>
                           <font color=orange><?php echo round($BMI,2)?> - <i> Low</i></font> 
                       <?php }?>

                       <?php 
                        if($BMI >= 25){?>
                            <font color=red><?php echo round($BMI,2)?> - <i>High</i></font> 
                       <?php }?>

                       <?php 
                        if($BMI >= 21 && $BMI <= 24){?>
                            <font color=green><?php echo round($BMI,2)?> - <i>Safe</i></font> 
                       <?php }?></td> 
                      <td><font color=blue>Allergies </font> <?php //echo $visit_history['allergies'];?></td>
                     </tr>

                    
                    
                  <p>
                  <?php }
                  ?>
                </table>
              </div>
				 <?php }?>
	</body>
</html>