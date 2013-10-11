<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><?php if($this->uri->segment(3)){
			?>
       <form id="dispensed" class="dispensed" name="frmactive" action="<?php echo base_url()?>pharm_profile/status/<?php echo $this->uri->segment(3)?>" method="post">  
        <table class="table table-bordered">
        <th>To be paid</th>
        <th>Medicine Name</th>
        <th>Medicine Size</th>
        <th>Medicine Unit</th>
        <th>Dosage</th>
        <th>Amount</th>
        <th>Duration</th>
        <th>Doctor's Name</th>

     
    
         <?php
			foreach($unpaid as $prescribed){?>
           
       <tr class="success">
         <td><?php echo $prescribed['paid'];?>

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

                  </form>
               <?php
		   }
			else{
				echo "<font color=red>Please select a patient to see his prescription</font>";
				}
			?>  
          
 