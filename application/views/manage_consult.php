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
                  <fieldset><legend>Financial Reports</legend>
                <table>  <form action="<?php echo base_url()?>management/consultation" method="post">
                 <!-- Date<input type="date" id="datepicker" name="Date" required/>!-->
               <tr>Sort By Month <select name="month">
               	 <option value=""><?php echo $month?></option>
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
                  </form>
                  </tr>
                 <tr><form action="<?php echo base_url()?>management/bydate" method="post">
                 Sort By Date<input type="date" id="datepicker" name="Date" value="<?php echo $date;?>" required/>
                 <input type="submit" name="search" value="Search">
                 </form>
              
                 </tr>
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
                     <?php foreach($consultation as $payment){?>
                     <tr>
                    <!--<td> <?php echo $payment['VisitDate'];?></td>!-->
                     <td><?php echo $payment['fname']." ".$payment['lname']." ".$payment['sname']?></td>
                     <td><?php echo $payment['package']?></td>
                     <td><?php echo $payment['labs']?></td>
                     <td><?php echo $payment['pharm']?></td>
                     <?php $sum=$payment['package']+$payment['labs']+$payment['pharm'];?>
                     <td><?php echo $sum;?></td>
                     <?php $total=$total+$sum;?> 
                   	 <?php $total_consult=$total_consult+$payment['package'];?> 
                     <?php $total_labs=$total_labs+$payment['labs'];?>
                     <?php $total_pharm=$total_pharm+$payment['pharm'];?> 
                      </tr>
					<?php }?>
                      <tr>
                     <td></td>
                     <td><strong>Total:<?php echo $total_consult;?></strong></td>
                     <td><strong>Total:<?php echo $total_labs;?></strong></td>
                     <td><strong>Total:<?php echo $total_pharm;?></strong></td>
                     <td><strong>Total Costs:<?php echo $total;?></strong></td>
                     </tr>
                    
                    </table>
					<?php echo $links;?>
                  </fieldset>
                    
      