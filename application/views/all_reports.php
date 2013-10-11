<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><fieldset><legend>Financial Reports</legend>
                  
                    <table class="table table-striped">
                     <tr>
                     <th>Patient Name</th>
                     <th>Consultation Costs</th>
                     <th>Lab Costs</th>
                     <th>Pharmacy Costs</th>
					 <th>Total Costs</th>
                     </tr>
                     <?php $total=0;?>
                     <?php $total_consult=0;?>
                     <?php $total_labs=0;?>
                     <?php $total_pharm=0;?>
                     <?php foreach($all as $payment){?>
                     <tr>
                     <td><?php echo $payment['fname']." ".$payment['lname']." ".$payment['sname']?></td>
                     <td><?php echo $payment['package']?></td>
                     <td><?php echo $payment['labs']?></td>
                     <td><?php echo $payment['pharm']?></td>
                     <?php $sum=$payment['package']+$payment['labs']+$payment['pharm'];?>
                     <td><?php echo $sum;?></td>  
                     <?php $total=$total+$sum;?> 
                   	 <?php $total_consult=$total_consult+$payment['package'];?> 
                     <?php $total_pharm=$total_pharm+$payment['pharm'];?> 
					 <?php }?>
                     <tr>
                     <td></td>
                     <td>Total:<?php echo $total_consult;?></td>
                     <td>Total:<?php echo $total_labs;?></td>
                     <td>Total:<?php echo $total_pharm;?></td>
                     <td>Total Costs:<?php echo $total;?></td>
                     </tr>
                     </table>

                  </fieldset>
                    
      