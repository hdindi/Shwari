<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><form action="<?php echo base_url()?>doc_profile/save_orders" method="post">
  <fieldset>
  <table>
   <tr>
    <th>Order</th>
    <th>Item</th>
    <th>Available Quantity</th>
    <th>Order Quantity</th>
    </tr>
    <tr>
    <td>
    <select name="items_id"  onChange="ChooseMeds(this)" id="items_id" >
    <option value=""></option>
     <?php foreach($none_meds as $stocks){?>
     <option value="<?php echo $stocks['id']."|".$stocks['available_quantity']."|".$stocks['name']?>"><?php echo $stocks['name'];?></option>
     <?php } ?>
    </select></td>
    <input type="hidden" value="" name="item_id" id="item_id">
    <td><input name="item_name" type="text" id="item_name" value="" disabled></td>
   <td><input name="opening_bal" type="number" id="opening_bal" value="" disabled></td>
   <td><input type="text" name="ordered" id="ordered"></td>
    </tr>
  </table>
     <input type="submit" name="save" value="save">
  </fieldset>
  </form>
  <fieldset>
  <legend>Ordered Items</legend>
 <table class="table table-bordered">
   <tr>
   <th>Item</th>
   <th>Available Quantity</th>
   <th>Order Quantity</th>
   <th>Order Date</th>
   </tr>
    <?php foreach($ordered as $orders){?>
   <tr>
  	<td><?php echo $orders['name'];?></td>
   <td><?php echo $orders['available_quantity'];?></td>
   <td><?php echo $orders['ordered'];?></td>
    <td><?php echo $orders['date_ordered'];?></td>
 	</tr>
    <?php } ?>
   </table>
   </fieldset>

 
 
 
 
