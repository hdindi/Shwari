<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><form>
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
				  }
				  }?>
                </fieldset>
                </form>
               
       <form id="appointed" class="form">
       <fieldset>
       <legend>Make Appointment</legend>
                 <table class="table">
					<tbody>
						<tr>
							<td>
                  <input type="hidden" name="patientid" value="<?php echo $this->uri->segment(3);?>">
                  <input type="hidden" name="visitid" value="<?php echo $this->uri->segment(4)?>" >
                  <div class="control-group"><label class="control-label">Date</label>
									<div class="controls">
										<input type="text" name="Date" id="datepicker" class="date" required/>
									</div>
								</div>
							</td>
                            <td>
							<div class="control-group">
									<label class="control-label">Time</label>
										<div class="controls">
                  				<input type="text" id="time" name="time" class="time" required/>
									</div>
								</div>
							</td>
                            </tr>
                            <tr>
                            <td>
								<div class="control-group">
									<label class="control-label">Title</label>
										<div class="controls">
                 					 <input type="text" name="Title" id="title" class="" required/>
									</div>
								</div>
							</td>
                            <td>
								<div class="control-group">
									<label class="control-label">About</label>
										<div class="controls">
                  <textarea name="About" id= "About" class="required" /></textarea>
									</div>
								</div>
							</td>
                            
                 <td><input type="submit" name="save" value="Save Appointment" class="btn btn-small btn-info"/></td>
                  </tr>
                  </tbody>
                  </table>
                </fieldset>
                </form>
	