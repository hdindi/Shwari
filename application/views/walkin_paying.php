
       <form id="dispensed" class="dispensed" name="frmactive" action="<?php echo base_url()?>pharm_profile/status/<?php echo $this->uri->segment(3)?>" method="post">  
        <table class="table table-bordered">
        <th>To be paid</th>
        <th>Medicine Name</th>
        <th>Medicine Size</th>
        <th>Medicine Unit</th>
        <th>Dosage</th>
        <th>Amount</th>
        <th>Duration</th>

     
    
         <?php
			foreach($walkin as $prescribed){?>
           
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
         </tr>
     <?php }?>
  

              </table>

                  </form>
           