<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><div ALIGN=CENTER><!--<img src="'<?php echo base_url()?>assets/img/shwari.jpg'" height='70' width='70'style='vertical-align: top;' > </img>!-->
<img src="<?php echo base_url()?>assets/img/shwari.jpg" height="70" width="70" style="vertical-align:top;"></div>
 <div style='text-align:center; font-size: 14px;display: block;font-weight: bold;'>Order Report</div>
 <div style='text-align:center; font-family: arial,helvetica,clean,sans-serif;display: block; font-weight: bold; font-size: 14px;'>
  CareTech</div>
  <div style='text-align:center; font-family: arial,helvetica,clean,sans-serif;display: block; font-weight: bold;display: block; font-size: 13px;'></div><hr />
  
<table class='data-table'>
<th><b>DRUG Code</b></th>
<th><b>Description</b></th>
<th><b>Strength</b></th>
<th><b>Order Unit Size</b></th>
<th><b>Order Unit Cost</b></th>
<th><b>Order Quantity</b></th>
<th><b>Order cost(Ksh)</b></th>
<tr>
<?php $order_total=0;?>
<?php foreach($order as $row){?>
<?php $total_units=$row['stock_in_hand']*3;


$units_to_compute=$total_units/$row['units'];
$total_cost=$units_to_compute*$row['buying_price'];
?>
 <tr>
<td><?php echo $row['code'];?></td>
<td><?php echo $row['Medicine_name']?></td>
<td><?php echo $row['strength']?></td>
<td><?php echo $row['units']?></td>
<td><?php echo $row['buying_price']?></td>
<td><?php echo $total_units?></td>
<td><?php echo  $total_cost ?></td>
<?php $order_total=$order_total+$total_cost;?>
</tr>
<?php } ?>
<tr><td colspan='6'></td><td>TOTAL: <?php echo number_format($order_total, 2, '.', ',')?></td></tr>


	

</table>