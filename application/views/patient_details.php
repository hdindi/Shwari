<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><div id="accordion">
  <h3>Bio Data</h3>
                <div>
             <?php
                      if($this->uri->segment(3))
                      {
                      foreach($patient_info as $bio_data){
						  if(empty($bio_data['fname'])){
							  echo "No Bio Data";
							  }
					else{
                        
                  ?>
                  <?php
                  $dob =  $bio_data['dob'];
                  $age = date_diff(date_create($dob), date_create('now'))->y;
                  $ids =$this->uri->segment(3);
                  if ($age <= 0){ $bage = date_diff(date_create($dob), date_create('now'))->d; $nage=$bage." Days Old"; }
                    elseif ($age > 0) { $nage = $age." Years Old"; }
                  //replace  $visit_info['dob'] with $age
                  ?>
                  <table class="table table-striped" >
                    <tr>
                      <td>Patient Name:</td><td><?php echo $bio_data['fname']." ".$bio_data['lname']." ".$bio_data['sname'];?></td>
                    </tr>
                    <tr>
                      <td>Age:</td><td><?php echo $nage;?></td>
                    </tr>
                    <tr>
                      <td>Gender:</td><td><?php echo $bio_data['sex'];?></td>
                    </tr>
                    <tr>
                     <td>Residence:</td><td><?php echo $bio_data['residence'];?></td>
                    </tr>
                  </table>
                  
                 
                  <?php }
					  }
					  }?>
                </div>

                      <h3>Patient Triage History</h3>
                          
                <div>
                  <table class="table table-bordered">
        <tr>           
                        <td>Nurse Name</td>
                       <td><font color=blue>Blood pressure (mmHg)</font></td>
                       <td><font color=blue>Temperature (°C)</font></td>
                       <td><font color=blue>Height (M)</font></td>
                       <td><font color=blue>Weight (KGs)</font></td>
                       <td><font color=blue>BMI</font></td>
                       <td><font color=blue>Allergies </font>
                  </tr>
                      <?php if($this->uri->segment(3)){?>
                  
                      <?php foreach ($triage_history as $history){
						  if(empty($history['id'])){
							  echo "This patient has no previous history";
							  }
							 else{
							 $vdate = date('l jS \of F Y ',strtotime($history['visitdate']));
								 ?>
                     <tr class="success">
                      <td><?php echo $history['fname']." ".$history['lname'];?></td>  
                      <td> <?php echo $history['diastle']."/". $history['systle'];?></td> 
                      <td><?php echo $history['Temperature'];?></td> 
                      <td><?php echo $history['Height'];?></td> 
                      <td><?php echo $history['Weight'];?></td> 
                      <td><?php $weight=$history['Weight'];
                        $height=$history['Height'];
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
                       <?php// echo $visit_history['allergies'];?></td>
                     </tr>
                    
                  <p>
                  <?php }?>
                  <?php }?>
                <?php }?>
                           
                </table>
              </div>

         

                      <h3>Patient Consultation</h3>
              <div>
                <table class="table table-bordered">

                   <tr >
                      <th>Consultation Date</th>

                      <th>Doctors name</th>
                      <th>complaints</th>
                      <th>Working Diagnosis</th>
                      <th>Lab tests</th> 
                      <th>Lab Results</th>

                   </tr>

                <?php foreach($consults as $previous_data){?>
                
                    <tr class="success">
                      <td><?php echo $previous_data['date']; ?></td>
                      <td><?php echo $previous_data['fname']." ".$previous_data['lname'];?></td>
                      <td><?php echo $previous_data['complaints'];?></td>
                      <td><?php echo $previous_data['working_diagnosis']; ?></td>
                   
                      
                        <?php foreach($test_details as $tests){
              if(empty($tests['test'])){
                echo "You did not order any tests";
                }
               else{?>
                      <td><?php  echo $tests['test'];?></td>
                      <td><?php  echo $tests['result'];?></td>
                                 
                <?php } } ?>
                   <?php }?>
                   </tr>
                  </table>
                </div>
                
                <h3>Patient Prescription History</h3>
              <div>
                <table class="table table-bordered">

        <th>Status</th>
        <th>Medicine Name</th>
        <th>Medicine Size</th>
        <th>Medicine Unit</th>
        <th>Dosage</th>
        <th>Amount</th>
        <th>Duration</th>
        <th>Doctor's Name</th>

         <?php
			foreach($prescription as $prescribed){?>
           
       <tr class="success">
       <td><?php echo $prescribed['administeredstatus'];?></td>
       <td><?php echo $prescribed['Medicine_name'];?></td>
       <td><?php echo $prescribed['strength'];?></td>
       <td><?php echo $prescribed['units'];?></td>
       <td><?php echo $prescribed['dosage'];?></td>
       <td><?php echo $prescribed['amount'];?></td>
       <td><?php echo $prescribed['duration'];?></td>
       <td><?php echo  $prescribed['Fname']." ".$prescribed['Sname']." ".$prescribed['Lname'];?></td>
        </tr> 
    <?php }?>
       </table>
                </div>
                    <h3>Patient Labs History</h3>
              <div>
                <table class="table table-bordered">

        <th>Test</th>
        <th>Results</th>
        <th>Doctor Name</th>

         <?php
			foreach($labs as $history){?>
           
       <tr class="success">
       <td><?php echo $history['test'];?></td>
       <td><?php echo $history['result'];?></td>
       <td><?php echo $history['fname']." ".$history['sname']." ".$history['lname'];?></td>
        </tr> 
    <?php }?>
       </table>
                
              </div>
                <!--/span-->

                </div>
                
             