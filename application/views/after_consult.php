<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><table  class="table table-bordered">
<th>Complaints</th>
<th>Medical History</th>
<th>Systemic Inquiry</th>
<th>Examination Findings</th>
<th>Provisional Diagnosis</th>
<th>Actions</th>
<tr class="success">
<?php foreach($check as $checkup){?>
<td><?php echo $checkup['complaints'];?></td>
<td><?php echo $checkup['med_history'];?></td>
<td><?php echo $checkup['systemic_inquiry'];?></td>
<td><?php echo $checkup['examination_findings'];?></td>
<td><?php echo $checkup['working_diagnosis'];?></td>
<?php }?>
<td><?php echo anchor('doc_profile/edit_consult/'.$this->uri->segment(3)."/".$this->uri->segment(4),'Edit Consultation');?></td>
</tr>
</table>


 <table class="table table-bordered">
        <!--<th>Dispense</th>
        <th>Status</th>!-->
        <th>Medicine Name</th>
        <th>Medicine Size</th>
        <th>Medicine Unit</th>
        <th>Dosage</th>
        <th>Amount</th>
        <th>Duration</th>
        <th>Doctor's Name</th>

     
    
         <?php
			foreach($presc as $prescribed){?>
           
       <tr class="success">
         <!--<td>
           		<input type="hidden" name="id" value="<?php echo $prescribed['id'];?>">
                <input type="hidden" name="checkupid" value="<?php echo $this->uri->segment(3)?>">
                <input type="checkbox" name="checkbox[]" value="<?php echo $prescribed['id']?>" id="dis">
               </td><td><?php echo $prescribed['administeredstatus'];?>

             Not dispensed<input type="checkbox" name="administered" value="not dispensed" id="admnisteredstatus1">
               
           </td>!-->
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

 <button id="order_labs" class="btn btn-large btn-success" >Order Lab Test</button>
 <button id="prescribe" class="btn btn-large btn-success" >Make A Prescription</button>