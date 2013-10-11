<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><style>
table.data-table1 {
	border: 1px solid #000033;
	margin: 10px auto;
	border-spacing: 0px;
	}
	
table.data-table1 th {
	border: none;
	color:#036;
	text-align:center;
	font-size: 13.5px;
	border: 1px solid #000033;
	border-top: none;
	max-width: auto;
	}
table.data-table1 td, table th {
	padding: 4px;
	}
table.data-table1 td {
	border: none;
	border-left: 1px solid #000033;
	border-right: 1px solid #000033;
	height: 30px;
	width: auto;
	margin: 0px;
	font-size: 12.5px;
	border-bottom: 1px solid #000033;
	}

.col5{
	background:#C9C299;
	}
.try{
		float: right;
		margin-bottom: 1px auto;
	}
.whole_report{
	      
  position: relative;
  width: 95%;
  background: #FFCCFF;
  -moz-border-radius: 4px;
  border-radius: 4px;
  padding: 2em 1.5em;
  color: rgba(0,0,0, .8);
  
  line-height: 1.5;
  margin: 20px auto;
  -webkit-box-shadow: 0px 0px 10px rgba(0,0,0,.8);
   -moz-box-shadow: 0px 0px 10px rgba(0,0,0,.8);
   box-shadow: 0px 0px 10px rgba(0,0,0,.8);	
	}
input {
        resize: horizontal;
        width: 200px;
    }
</style>
<script>
function ChooseContact(data) {
    var mystr = data.value;
    var myarr = mystr.split("|");
    var myvar = myarr[0] + "|" + myarr[1]+ "|" +myarr[2];
    var n = myarr[0];
    var m = myarr[1];
	var p = myarr[2];

document.getElementById("drug_id").value = n;
document.getElementById("batch_no").value = m;
document.getElementById("opening_bal").value = p;
}

</script>

<div class="whole_report">
	<div class="try">
<button class="awesome rosy">Download PDF</button>
</div>
<div>
	<!--<img src="<?php echo base_url().'Images/coat_of_arms.png'?>" style="position:absolute;  width:90px; width:90px; top:0px; left:0px; margin-bottom:-100px;margin-right:-100px;"></img>!-->
       
       <span style="margin-left:100px;  font-family: arial,helvetica,clean,sans-serif;display: block; font-weight: bold; font-size: 15px;">
     		Shwari Healthcare</span><br>
       <span style=" font-size: 12px;  margin-left:100px;">Drugs Bin Card</span><span style="text-align:center;" ></span>
       	<h2 style="text-align:center; font-size: 20px;">Stock Control Card</h2>
      <!-- <h2 style="text-align:center;"><?php echo $drugname ?>(<?php echo $desc?>)</h2>!-->
       <!--<h2 style="text-align:center;">Between <?php echo $from ?> & <?php echo $to ?> </h2>!-->
       </br>
       	<hr/> 
        
        	
</div>

<table class="data-table1">
		
	<tr>
    	<th>Drug Name</th>
		<th>Date of Issue</th>
		<th>Reference No/S11 No</th>
		<th>Expiry Date</th>
		<th>Receipts/Opening Bal.</th>
		<th>Issues</th>
		<th>Closing Bal.</th>
		<th>Issuing/Receiving Officer</th>
		<th>Service Point</th>
	</tr><tbody>
		
		<?php 
				foreach ($stocks as $user ) { ?>
					
					<?php 
								$thedate1=$user['exp_date'];
								$formatme = new DateTime($thedate1);
								$myvalue= $formatme->format('d M Y');

								if ($thedate1 == '0000-00-00') {
									$myvalue1 = 'N/A';
								} else{
								$formatme1 = new DateTime($thedate1);       							 
       							$myvalue1= $formatme1->format('d M Y');
       							}
								$date=$user['date_of_issue'];
								$formatime = new DateTime($date);
								$myvalue2= $formatime->format('d M Y');
								?>
				
						<tr>
							<?php //if ($user->s11_No == 'Physical Stock Count') {?>


							<td><font color = 'red'><?php echo $user['Medicine_name'];?></font></td>
							<td><font color = 'red'><?php echo $myvalue2;?></font></td>
							<td><font color = 'red'><?php echo $user['reference'];?></font></td>
							<td><font color = 'red'><?php echo $myvalue1;?></font></td>
                            <td><font color = 'red'><?php echo $user['opening_bal'];?></font></td>
							<td><font color = 'red'><?php echo $user['issues'];?></font></td>
							<td><font color = 'red'><?php echo $user['closing_bal'];?></font></td>
							<td><font color = 'red'><?php echo $user['fname']." ".$user['lname']." ".$user['sname'];?></font></td>	
							
							<!--<td><font color = 'red'><?php echo $lname.' '.$fname;?></font></td>!-->
							<td><font color = 'red'> <?php echo $user['service_point'];?></font></td>
						
							<?php } ?>

						</tr>
					
		</tbody>
	
	 
</table>

 
<!--<div id="dialog-form" title="Create new user">
  <p class="validateTips">All form fields are required.</p>
 
  <form>
  <fieldset>
  <table>
  <tr>
  <th>Drug Name</th>
  <th>Batch No</th>
  <th>Opening Balance</th>
  <th>Receipts</th>
  <th>Closing</th>
  </tr>
    <tr>
    <td><select name="drug_id" onChange="ChooseContact(this)"id="drug_id">
    <?php foreach($meds as $drugs){?>
    <option value="<?php echo $drugs['id']."|".$drugs['batch_no']."|".$drugs['stock_in_hand']?>"><?php echo $drugs['Medicine_name']?></option>
    <?php }?>
    </select>
    </td>
    <td><input type="text" name="batch_no" id="batch_no" value="" size="1" /></td>
    <td><input type="text" name="opening_bal" id="opening_bal" value="" size="1" /></td>
    <td><input type="text" name="receipts" id="receipts" value="" size="1" /></td>
    <td><input type="text" name="closing_bal" id="closing_bal" value=""  size="1"/></td></tr>
    <input type="submit" value="Save">
    </table>
  </fieldset>
  </form>
</div>!-->

</div>
