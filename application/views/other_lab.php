<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><fieldset>
<legend>Labs Paid for</legend>
                <table  class="table table-bordered">
                <tr class="success">
                <td>Provisional Diagnosis</td>
                <?php
				foreach($diagnosis as $checkup){?>
					<td><?php echo $checkup['working_diagnosis'];?></td>
					<?php }
                 ?>
                </tr>
                <th>Tests Requested</th>
                <th>Test Results</th>
                
                <tr>
                <?php foreach($paid as $tests){?>
                <td><?php echo $tests['test']?></td>
                <td><?php echo $tests['result']?></td>
               
                </tr>
					<?php }?>
                    
               
                 </table>
</fieldset>
<fieldset>
<legend>Lab Not Yet Tested</legend>
 <form id="dispense" class="dispensed" name="frmactive" action="<?php echo base_url()?>lab_profile/torep" method="post">  
                <table  class="table table-bordered">
                <tr class="success">
                <td>Provisional Diagnosis</td>
                <?php
				foreach($diagnosis as $checkup){?>
					<td><?php echo $checkup['working_diagnosis'];?></td>
					<?php }
                 ?>
                </tr>
                <th>To be paid</th>
                <th>Tests Requested</th>
                
                <tr>
                <?php foreach($new as $test_details){?>
                <input type="hidden" name="id" value="<?php echo $test_details['id'];?>">
                <input type="hidden" name="visitid" value="<?php echo $this->uri->segment(3)?>">
                <td><input name="chk[]" type="checkbox" id="chk" value="<?php echo $test_details['id']."|".$test_details['cost']; ?>" onClick="calculate()"></td>
                <td><?php echo $test_details['test']?></td>
              <!--  <td><?php echo $test_details['result']?></td>!-->
               
                </tr>
					<?php }?>
                     <tr>   
             <td> Cost To Be paid<input type="text" name="total" id="total" disabled value=""/></td>
              <input type="hidden" name="cost" id="cost" value=""/>
               </tr>
               <tr><td><input type="submit" name="save" value="Save"></td></tr>
          
               
                 </table>
                 </form>
            </fieldset>
          <button id="create-user" class="btn btn-large btn-primary" >Update Test Results</button>
                         <button id="ordermore">Add Tests</button>

