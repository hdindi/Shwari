<?php if($this->session->userdata('id')){
                 
     ///redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><form id="dispense" class="dispensed" name="frmactive" action="<?php echo base_url()?>lab_profile/torep" method="post">  
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
                <?php foreach($unpaid as $test_details){?>
                <input type="hidden" name="id" value="<?php echo $test_details['id'];?>">
                <input type="hidden" name="visitid" value="<?php echo $this->uri->segment(3)?>">
                <td><?php echo $test_details['paid']?></td>
                <td><?php echo $test_details['test']?></td>
               
                </tr>
					<?php }?>
                     <tr>   
               </tr>
          
               
                 </table>
                 </form>