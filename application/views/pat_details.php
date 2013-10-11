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
                              if(empty($visit_info)){
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
                      <th><font color=blue>Blood pressure (mmHg)</font></th>
                      <th><font color=blue>Temperature (°C)</font></th>
                      <th><font color=blue>Height (M)</font></th>
                      <th><font color=blue>Weight (KGs)</font></th>
                      <th><font color=blue>BMI</font> </th>
						</tr>

                  <?php foreach($see as $current){?>
                  <?php
                          ?>
                    <tr class="success"> 
                   	 <td><?php echo $current['fname']." ".$current['lname'];?></td>
                      <td> <?php echo $current['diastle']."/". $current['systle'];?></td> 
                      <td> <?php echo $current['Temperature'];?></td> 
                      <td> <?php echo $current['Height'];?></td> 
                      <td> <?php echo $current['Weight'];?></td> 
                      <td><?php $weight=$current['Weight'];
                        $height=$current['Height'];
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
                  <form id="checkup" class="form">
                 <fieldset>
                 <legend>Patient Consultation</legend>
           
               <table class="table table-bordered">
                  <tr>
                    <td><input type="hidden" value="<?php echo $this->uri->segment(3);?>"  name="visitid"></td>
                    <!--<td><input type="hidden" value="<?php //echo $patientid;?>"  name="patientid"></td>!-->
                  </tr>
                  <tr>
                    <td><label for="Complaints">Complaints</label></td>
                    <td><textarea name="complaints" style="width:90%" class="required"cols="100" rows="4" ></textarea></td>
                    
                  </tr>
                  <tr>
                    <td><label for="Past Medical History">Past Medical History</label></td>
                    <td><textarea rows="4" cols="100" name="med_history" id="med_history" class="required"style="width:90%"></textarea></td>
                  </tr>
                  <tr>
                    <td><label for="Systemic Inquiry">Systemic Inquiry</label></td>
                    <td><textarea rows="5" cols="100" name="systemic_inquiry" id="systemic_inquiry" class="required"style="width:90%"></textarea></td>
                  </tr>
                  <tr>
                    <td><label for="Examination Findings">Examination Findings</label></td>
                    <td><textarea rows="5" cols="40" name="examination_findings" id="examination_findings" class="required" style="width:90%"></textarea></td>
                  </tr>
                  <tr>
                    <td><label for="Working Diagnosis">Working Diagnosis</label></td>
                    <td><textarea rows="5" cols="40" name="working_diagnosis" id="working_diagnosis" class="required" style="width:90%"></textarea></td>
                  </tr>
                  <tr>
                    <td><label for="Package">Package</label></td>
                    
                    <td><select data-placeholder="package" style="width:350px;" class="chzn-select" tabindex="6" name="packageid" id="packageid" class="required">
                      
                      <?php foreach($pack as $pack_types){?>
                      <option  value="<?php echo $pack_types['id']?>" id="<?php echo $pack_types['id'] ?>" ><?php echo $pack_types['name']?></option>
                      <?php
                      } ?>
                    </select></td>
                  </tr>
                  <tr>
                    <td><label for="Allergy">Allergy</label></td>
                    <td><input type="text" name="allergy" id="allergy" style="width:350px;"/></td>
                    
                  </tr>
                  <tr>
                    <td><input type="submit" name="save"  value="Post Results"></td>
                  </tr>
                  
                </table>
             
              </fieldset>
               </form>
             <form id="labs" method="post" action="<?php echo base_url()?>doc_profile/tolab/<?php echo $this->uri->segment(3)?>">

            <fieldset>
            <legend >Order Labs</legend>
              <table id="visit">
                    <input type="hidden" name="visitid" value="<?php echo $this->uri->segment(3);?>">
                    <input type="hidden" id="tested" name="tested" value="1" />
                    
                    <?php foreach($lab_results as $working){
                            if(empty($working['working_diagnosis'])){
                              //echo "You did not make a working diagnosis";
                              }
                    else{?>
                    
                    <?php //echo $working['working_diagnosis'];
                    }
                    
                    }?>
                    
                    <select data-placeholder="Lab Tests" style="width:350px;" class="chzn-select"multiple tabindex="6" name="test[]" id="test" >
                      <option value=""></option>
                      <?php foreach ($tests as $lab_tests){?>
                      <option value="<?php echo $lab_tests['name']; ?>"><?php echo $lab_tests['name'] ;?></option>
                      <?php  }?>
                    </select>
                    <input type="submit" name="save" value="Send to Lab" class="btn btn-warning">
                    
                     </table>
                  
            </fieldset>
            </form>
             <form id="presc" class="form" name="prescribed">
            <fieldset>
            <legend>Make Prescription</legend>
               
                      
                     <!-- <tr>!-->
                        <input type="hidden" name="visitid" value="<?php echo $this->uri->segment(3); ?>" class="required">
                        <!--<td>!--><label for="name">Drug Name:</label><!--</td>!-->
                       <!-- <td>!--><select data-placeholder="Medicine Name" style="width:350px;" class="chzn-select" tabindex="6" name="medname">
                          <option></option>
                          <?php foreach($meds as $pack){?>
                          <option  value="<?php echo $pack['code']?>">
                            <?php echo $pack['name'] .'( '.$pack['sizes'].' , '.$pack['unit'].' )'?>
                          </option>
                          <?php //$result = $_POST['packageid'];
                          //$result_explode = explode('|', $result);
                          
                          } ?>
                        </select><!--</td>!-->
                     <!-- </tr>!-->
                      
                     <!-- <tr>!-->
                       <!-- <td>!--><label for="dosage">Drug Dosage</label><!--</td>!-->
                        <!--<td>!--><select data-placeholder="Dosage" style="width:350px;" class="chzn-select" tabindex="6" name="dosage" class="required">
                          <option value=""></option>
                          <option value="1*1">1*1</option>
                          <option value="1*2">1*2</option>
                          <option value="1*3">1*3</option>
                          <option value="2*1">2*1</option>
                          <option value="2*2">2*2</option>
                          <option value="2*3">2*3</option>
                        </select><!--</td>!-->
                    <!--  </tr>!-->
                     <!-- <tr>!-->
                       <!-- <td>!--><label for="duration"  class="required">Duration</label>  <!--</td>!-->
                       <!-- <td>!--><input type="text" style="width:200px;"  name="duration">
                        
                     <!-- </td>!-->
                    <!--</tr>!-->
                   <!-- <tr>!-->
                     <!-- <td>!--><label for="remarks">Dosage Remarks:</label><!--</td>!-->
                    <!--  <td>!--> <textarea name="remarks" rows="5" cols="20"></textarea><!--</td>!-->
                   <!-- </tr>!-->
                   <!-- <tr>!-->
                     <!-- <td></td>!-->
                     <!-- <td>!--><input type="submit" name="save" value="Save and Add another" class="btn btn-success"/>
                    			<!-- <button id="close" class="btn btn-small btn-info">Finished Making Prescription</button>!--><!--</td>!-->
                   <!-- </tr>!-->
                    <?php //echo form_close();?>
                    </fieldset>
                  </form>
                
          <script src="<?php echo base_url()?>assets/chosen-master/chosen/chosen.jquery.js" type="text/javascript"></script>
  <script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
  
	</body>
</html>