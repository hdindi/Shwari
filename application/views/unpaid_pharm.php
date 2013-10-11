<?php if($this->uri->segment(3)){
			?>
          <form id="dispensing" class="dispensing" name="frmactive" action="<?php echo base_url()?>pharm_profile/payments/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" method="post">  

        <table class="table table-bordered">

        <th>To be paid</th>
        <th>Status</th>
        <th>Medicine Name</th>
        <th>Medicine Size</th>
        <th>Medicine Unit</th>
        <th>Dosage</th>
        <th>Amount</th>
        <th>Duration</th>
        <th>Doctor's Name</th>
        <th>Actions</th>

     
    
         <?php
			foreach($prescription as $prescribed){?>
           
       <tr class="success">
         <td>
           		<input type="hidden" name="id" value="<?php echo $prescribed['id'];?>">
                <input type="hidden" name="visitid" value="<?php echo $this->uri->segment(3)?>">
                <input name="chk[]" type="checkbox" id="chk" value="<?php echo $prescribed['id']."|".$prescribed['price']*$prescribed['amount']; ?>" onClick="calculate()">
                <!--<input type="checkbox" name="checkbox[]" value="<?php echo $prescribed['id']?>" id="admnisteredstatus_0">!-->
               </td><td><?php echo $prescribed['administeredstatus'];?>

               
           </td>
       <td><?php echo $prescribed['Medicine_name'];?></td>
       <td><?php echo $prescribed['strength'];?></td>
       <td><?php echo $prescribed['units'];?></td>
       <td><?php echo $prescribed['dosage'];?></td>
       <td><?php echo $prescribed['amount'];?></td>
       <td><?php echo $prescribed['duration'];?></td>
       <td><?php echo  $prescribed['Fname']." ".$prescribed['Sname']." ".$prescribed['Lname'];?></td>
       <td><?php echo anchor('pharm_profile/edit/'.$this->uri->segment(3)."/".$this->uri->segment(4)."/".$prescribed['id'],'Change Prescription')?></td>
        </tr> 
    <?php }?>

           <tr>   
             <td> Cost To Be paid<input type="text" name="total" id="total" disabled value=""/></td>
              <input type="hidden" name="cost" id="cost" value=""/>
               </tr>
               <tr><td><input type="submit" name="save" value="Save"></td></tr>
          
               
               </table>
               </form>
                  
               <?php
            }
			else{
				echo "<font color=red>Please select a patient to see his prescription</font>";
			}
			?> 
      <button id="prescribe" class="btn btn-large btn-success" >Add Medicine</button>

  <div id="dialog" title="Make a Prescription">
                 <!-- <table>!-->
                    <p class="validateTips">All form fields are required.</p>
                    <!-- <?php// $attributes = array('id' => 'presc');?>
                    
                    <?php //echo form_open('doc_profile/topha/'.$this->uri->segment(3), $attributes);?>-->
                    <form id="presc" class="form" name="prescribed">
                      
                     <!-- <tr>!-->
                        <input type="hidden" name="visitid" value="<?php echo $this->uri->segment(3); ?>" class="required">
                        <!--<td>!--><label for="name">Drug Name:</label><!--</td>!-->
                       <!-- <td>!--><select data-placeholder="Medicine Name" style="width:350px;" class="chzn-select" tabindex="6" name="medname">
                          <option></option>
                          <?php foreach($meds as $pack){?>
                          <option  value="<?php echo $pack['code']?>">
                            <?php echo $pack['Medicine_name'] .'( '.$pack['strength'].' , '.$pack['units'].' )'?>
                          </option>
                          <?php //$result = $_POST['packageid'];
                          //$result_explode = explode('|', $result);
                          
                          } ?>
                        </select><!--</td>!-->
                     <!-- </tr>!-->
                      
                     <label for="dosage">Drug Dosage</label><!--</td>!-->
                        <input type="text" name="dosage" class="required" style="width:200px;"><!--</td>!-->
                    <label for="duration"  class="required">Duration</label>  <!--</td>!-->
                    <input type="text" style="width:200px;"  name="duration">
                    <label for="amount" class="required">Amount</label>
                    <input type="text" style="width:200px;"  name="amount">
                    <label for="remarks">Dosage Remarks:</label><!--</td>!-->
                    <textarea name="remarks" rows="5" cols="20"></textarea><!--</td>!-->
                    <input type="submit" name="save" value="Save prescription" class="btn btn-success"/>
                
                  </form>
               
              </div> 