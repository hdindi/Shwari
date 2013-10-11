 <form id="dispense" class="dispensed" name="frmactive" action="<?php echo base_url()?>lab_profile/walkin_pay" method="post">  
                <table  class="table table-bordered">
          
                <th>To be paid</th>
                <th>Tests Requested</th>
                <th>Test Results</th>
                
                <tr>
                <?php foreach($trial as $test_details){?>
                <input type="hidden" name="id" value="<?php echo $test_details['id'];?>">
                <input type="hidden" name="patientid" value="<?php echo $this->uri->segment(3)?>">
                <td><input name="chk[]" type="checkbox" id="chk" value="<?php echo $test_details['id']."|".$test_details['cost']; ?>" onClick="calculate()"></td>
                <td><?php echo $test_details['test']?></td>
                <td><?php echo $test_details['results']?></td>
               
                </tr>
					<?php }?>
                     <tr>   
             <td> Cost To Be paid<input type="text" name="cost" id="cost" disabled value=""/></td>
              <input type="hidden" name="total" id="total" value=""/>
               </tr>
               <tr><td><input type="submit" name="save" value="Save"></td></tr>
          
               
                 </table>
                 </form>
                             <button id="ordermore">Add Tests</button>
