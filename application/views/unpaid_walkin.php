	<form id="presc" class="form" name="prescription">

                 <table>
                 <tr>
                 <input type="hidden" name="patientid" value="<?php echo $this->uri->segment(3)?>">
				 <td><label for="name">Medicine Name:</label></td> 
                 <td><select data-placeholder="Medicine Name" style="width:350px;" class="chzn-select" tabindex="6" name="medname">
                 <option value=""></option>
                  <?php foreach($medicine as $med_types){?>
                  
                  <option value="<?php echo $med_types['code']?>" ><?php echo $med_types['Medicine_name'].'( '.$med_types['strength'].' , '.$med_types['units'].' )'?>
                  </option>
                   <?php } ?>
                  </select></td>
                 </tr>
                 <tr>
                 <td><label for="dosage">Drug Dosage</label></td>
                 <td><input type="text" name="dosage" class="required" style="width:350px;" required ></td>                                                  </tr>
                 </tr>
                 <tr>
                 <td><label for="duration">Duration</label>  </td>
                 <td><input type="text"style="width:350px;" name="duration"required ></td>
                 </tr>
                 <tr>
                 <td><label for="duration">Amount</label></td>
                <td> <input type="number"style="width:350px;" name="amount" required ></td>
                 </tr>
                 <tr>
                 <td><label for="remarks">Dosage Remarks:</label></td>
                 <td><textarea name="remarks" rows="5" cols="20" required ></textarea></td>
                 </tr>
                 <tr>
                 <td><input type="submit" name="Save" value="Save and Add Another" class="btn btn-primary"/></td>
                 <td><input type="reset" name="reset" value="Cancel"></td>
                 </tr>
                 </table>
                 
                 </form>

 <form id="dispensing" class="dispensing" name="frmactive" action="<?php echo base_url()?>pharm_profile/walkinpayments" method="post">  

        <table class="table table-bordered">

        <th>To be paid</th>
        <th>Status</th>
        <th>Medicine Name</th>
        <th>Medicine Size</th>
        <th>Medicine Unit</th>
        <th>Dosage</th>
        <th>Amount</th>
        <th>Duration</th>
        <th>Actions</th>

     
    
         <?php
			foreach($walkin as $prescribed){
				if(empty($prescribed)){
					echo "Please add a prescription";
					}else{?>
           
       <tr class="success">
         <td>
           		<input type="hidden" name="id" value="<?php echo $prescribed['id'];?>">
                <input type="hidden" name="patientid" value="<?php echo $prescribed['patientid'] ;?>">
                <input name="chk[]" type="checkbox" id="chk" value="<?php echo $prescribed['id']."|".$prescribed['price']; ?>" onClick="calculate()">
                <!--<input type="checkbox" name="checkbox[]" value="<?php echo $prescribed['id']?>" id="admnisteredstatus_0">!-->
               </td><td><?php echo $prescribed['administeredstatus'];?>

               
           </td>
       <td><?php echo $prescribed['Medicine_name'];?></td>
       <td><?php echo $prescribed['strength'];?></td>
       <td><?php echo $prescribed['units'];?></td>
       <td><?php echo $prescribed['dosage'];?></td>
       <td><?php echo $prescribed['amount'];?></td>
       <td><?php echo $prescribed['duration'];?></td>
       <td><?php echo anchor('pharm_profile/edit/'.$this->uri->segment(3)."/".$this->uri->segment(4)."/".$prescribed['id'],'Change Prescription')?></td>
        </tr> 
    <?php }
			}?>

           <tr>   
             <td> Cost To Be paid<input type="text" name="cost" id="cost" disabled value=""/></td>
              <input type="hidden" name="total" id="total" value=""/>
               </tr>
               <tr><td><input type="submit" name="save" value="Save"></td></tr>
          
         
               </table>
               </form>
 