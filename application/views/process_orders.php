<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><div id="accordion">
               <table class="table table-bordered">
               <th>Item Name</th>
               <th>Available Quantity</th>
               <th>Ordered Quantity</th>
               <th>Department</th>
       <?php foreach($orders as $process){?>
       <tr>
        <td><?php echo $process['name'];?></td>
        <td><?php echo $process['available_quantity'];?></td>
        <td><?php echo $process['ordered'];?></td>
        <td><?php echo $process['department'];?></td>
        </tr>
        <?php }?>
        </table>
        <div id="dialog-form" title="Create new user">
  <p class="validateTips">All form fields are required.</p>
 
  <form action="<?php echo base_url()?>phamarcy/issues" method="post">
  <fieldset>
  <table>
  <tr>
  <th>Drug Name</th>
  <th>Batch No</th>
  <th>Expiry Date</th>
  <th>Opening Balance</th>
  <th>Isuses</th>
  <th>Closing</th>
  </tr>
    <tr>
    <td><select name="item_id" onChange="ChooseContact(this)"id="drug_id">
    <option value=""></option>
    <?php foreach($orders as $drugs){?>    
   <option value="<?php echo $drugs['item_id']."|".$drugs['batch_no']."|".$drugs['exp_date']."|".$drugs['available_quantity']."|".$drugs['id']."|".$drugs['department']."|".$drugs['ordered']?>"><?php echo $drugs['name']?></option>

    <?php }?>
    </select>
    </td>
    <input type="hidden" name="id" id="id" value="" size="1" />
    <input type="hidden" name="item_id" id="item_id" value="" size="1" />
    <input type="hidden" name="opening_bal" id="opening_bal" value="">
    <td><input type="text" name="batch_no" id="batch_no" value="" size="1" disabled="disabled"/></td>
    <td><input type="text" name="exp_date" id="exp_date" value=""  size="1" disabled="disabled"/></td>
    <td><input type="text" name="opening" id="opening" value="" size="1" disabled="disabled" /></td>
    <td><input type="text" name="issues" id="issues" value="" size="1" /></td>
    <td><input type="text" name="closing_bal" id="closing_bal" value=""  size="1"/></td>
    <td><input type="text" name="service" id="service" value="" disabled="disabled">
    <input type="hidden" name="service_point" id="service_point" value=""/>
    </td>
    </tr>
    <tr>
    <td><input type="submit" value="Issue">
    </td>
    </table>
  </fieldset>
  </form>
    
</div>
      <button id="issue">Issue</button> 
        