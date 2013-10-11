
        <table class="table table-bordered">
        <th>Status</th>
        <th>Medicine Name</th>
        <th>Medicine Size</th>
        <th>Medicine Unit</th>
        <th>Dosage</th>
        <th>Duration</th>

     
    
         <?php
			foreach($unpaid as $prescribed){?>
           
       <tr class="success">
      <td><?php echo $prescribed['administeredstatus'];?>

            <!-- Not dispensed<input type="checkbox" name="administered" value="not dispensed" id="admnisteredstatus1">!-->
               
           </td>
       <td><?php echo $prescribed['Medicine_name'];?></td>
       <td><?php echo $prescribed['strength'];?></td>
       <td><?php echo $prescribed['units'];?></td>
       <td><?php echo $prescribed['dosage'];?></td>
       <td><?php echo $prescribed['duration'];?></td>
         </tr>
     <?php }?>
  

              </table>

               <!-- <input name="deactivate" type="submit" id="deactivate" value="not dispensed" />!-->
              
          
 