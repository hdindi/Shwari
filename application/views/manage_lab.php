<?php if($this->session->userdata('id')){
                 
    // redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><?php 
                 
                  if($month==1){
                  	$month= "January";
                  	
                  }
				  elseif($month==2){
				  	$month= "February";
				  	
				  }
				  elseif($month==3){
				  	$month=  "March";
				  	
				  }
				  elseif($month==4){
				  	$month=  "April";
				  }
				  elseif($month==5){
				  	$month=  "May";
				  	
				  }
				  elseif($month==6){
				  	$month=  "June";
				  	
				  }
				  elseif($month==7){
				  	$month= "July";
				  	
				  }
				  elseif ($month==8) {
					$month=  "August";  
				  }
				  elseif ($month==9) {
					 $month= "September";
				  }
				  elseif($month==10){
				  	$month= "October";
				  	
				  }
				  elseif($month==11){
				  	$month=  "November";
				  }
				  elseif($month==12){
				  $month= "December";
				  	
				  }
                  ?>
                  <fieldset><legend>Lab Payments</legend>
                  <table>
                   <form action="<?php echo base_url()?>management/labbymonth" method="post">
                   <tr>Sort By Month <select name="month">
                 <option value="<?php echo $month?>"><?php echo $month?></option>
                 <option value="1">January</option>
                 <option value="2">February</option>
                 <option value="3">March</option>
                 <option value="4">April</option>
                 <option value="5">May</option>
                 <option value="6">June</option>
                 <option value="7">July</option>
                 <option value="8">August</option>
                 <option value="9">September</option>
                 <option value="10">October</option>
                 <option value="11">November</option>
                 <option value="12">December</option>
                 </select>
                  <input type="submit" name="search" value="Search">
                  </tr>
                  </form>
                   <form action="<?php echo base_url()?>management/labbydate" method="post">
                  <tr>Date<input type="date" id="datepicker" name="Date" required/>
                  <input type="submit" name="search" value="Search"></tr>
                  </form>
                 
                  </table>
         	      <?php 
         	      if($month==""){
         	      	echo "";
         	      }
				  else{
         	      ?>
                 <font color="red"><?php echo "Showing Results for the month of ".$month;?></font>
                 <?php } 
              if($date==""){
              	echo "";
              }else{
              	?> 
                
                 <font color="red"><?php echo "Showing results for ".$date;?></font>
                 <?php } ?>
                    <table class="table table-striped">
                    
                     <th>Patient Name</th>
					 <th>Costs</th>
                    <?php $total=0;?>
                   
                     <?php foreach($payments as $payment){?>
                      <tr>
                     <td><?php echo $payment['fname']." ".$payment['lname']." ".$payment['sname']?></td>
                     <td><?php echo $payment['cost']?></td>
                     <?php $total=$total+$payment['cost'];?>
                     </tr>
					<?php }?>
                     <tr>
                     	<td></td>
                     	<strong><td>Total Costs:<?php echo $total;?></td></strong>
                     </tr>
                    </table>

                  </fieldset>
                    
