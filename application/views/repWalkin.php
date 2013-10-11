 <form id="dispense" class="dispensed" name="frmactive" action="<?php echo base_url()?>lab_profile/torep" method="post">  
                <table  class="table table-bordered">
               
                <th>To be paid</th>
                <th>Tests Requested</th>
                
                <tr>
                <?php foreach($trial as $test_details){?>
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