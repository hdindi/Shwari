<form id="dispensed" class="dispensed" name="frmactive" action="<?php echo base_url()?>pharm_profile/dispense_walkin/<?php echo $this->uri->segment(3)?>" method="post">  
        <table class="table table-bordered">
        <th>Dispense</th>
        <th>Status</th>
        <th>Medicine Name</th>
        <th>Medicine Size</th>
        <th>Medicine Unit</th>
        <th>Dosage</th>
        <th>Amount</th>
        <th>Duration</th>

     
    
         <?php
			foreach($unpaid as $prescribed){?>
           
       <tr class="success">
         <td>
           		<input type="hidden" name="id" value="<?php echo $prescribed['id'];?>">
                <input type="hidden" name="patientid" value="<?php echo $this->uri->segment(3)?>">
                <input type="checkbox" name="checkbox[]" value="<?php echo $prescribed['id']?>" id="dis">
               </td><td><?php echo $prescribed['administeredstatus'];?>

            <!-- Not dispensed<input type="checkbox" name="administered" value="not dispensed" id="admnisteredstatus1">!-->
               
           </td>
       <td><?php echo $prescribed['Medicine_name'];?></td>
       <td><?php echo $prescribed['strength'];?></td>
       <td><?php echo $prescribed['units'];?></td>
       <td><?php echo $prescribed['dosage'];?></td>
       <td><?php echo $prescribed['amount'];?></td>
       <td><?php echo $prescribed['duration'];?></td>
         </tr>
     <?php }?>
  

              </table>

                <input name="activate" type="submit" id="activate" value="Dispense" />
               <!-- <input name="deactivate" type="submit" id="deactivate" value="not dispensed" />!-->
                  </form>
              