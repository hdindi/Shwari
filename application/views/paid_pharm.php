<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><?php if($this->uri->segment(3)){
			?>
       <form id="dispensed" class="dispensed" name="frmactive" action="<?php echo base_url()?>pharm_profile/status/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" method="post">  
        <table class="table table-bordered">
        <th>Dispense</th>
        <th>Status</th>
        <th>Medicine Name</th>
        <th>Medicine Size</th>
        <th>Medicine Unit</th>
        <th>Dosage</th>
        <th>Amount</th>
        <th>Duration</th>
        <th>Doctor's Name</th>

     
    
         <?php
			foreach($paid as $prescribed){?>
           
       <tr class="success">
         <td>
           		<input type="hidden" name="id" value="<?php echo $prescribed['id'];?>">
                <input type="hidden" name="checkupid" value="<?php echo $this->uri->segment(3)?>">
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
       <td><?php echo  $prescribed['Fname']." ".$prescribed['Sname']." ".$prescribed['Lname'];?></td>
         </tr>
     <?php }?>
  

              </table>

                <input name="activate" type="submit" id="activate" value="Dispense" />
               <!-- <input name="deactivate" type="submit" id="deactivate" value="not dispensed" />!-->
                  </form>
               <?php
		   }
			else{
				echo "<font color=red>Please select a patient to see his prescription</font>";
				}
			?>  
          
 