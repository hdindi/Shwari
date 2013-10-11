 <div class="row-fluid">
                <div class="span3">
                    
                        <fieldset><legend><h4>Patients in waiting</h4></legend>
                    
                    <ul class="nav nav-list">
           <li class="nav-header"></li>
            
            <?php foreach($patients as $active){
            if(empty($active['patientid'])){
            echo $msg;
            }else{ ?>
          <?php if($active['urgency']=="urgent"){
				?>
            <li>
              <?php echo anchor('doc_profile/details/'.$active['id']."/".$active['patientid'],$active['fname']." ".$active['lname']." ".$active['sname']."<font color=red> ".$active['urgency']." ".$active['results']."</font>")."</br>"; ?></li>
              <?php }
			  else{?>
			<li><?php echo anchor('doc_profile/details/'.$active['id']."/".$active['patientid'],$active['fname']." ".$active['lname']." ".$active['sname']." <font color=red>".$active['results']."</font>")."</br>"; 

				  }
              
              }
			}
             ?>
            </li>
          </ul>
                   
                    </fieldset>
                </div>
                <!--/span-->
                <div class="span3">
                    
                        <fieldset><legend><h4>Appointments</h4></legend>
                    
                    <ul class="nav nav-list nav-stacked">
                
                            <?php if(!is_null($msg)){
                                  echo $msg;
                                       }
                                   else{?>
              
                        <?php foreach($home as $active){?>
            <li> 
                <?php echo anchor('doc_profile/appointment',$active['fname']." ".$active['lname']." ".$active['sname'])."</br>"; ?>
                <?php }?>

            </li>
                 <?php } ?>
             </ul>
                    
                    </fieldset>
                </div>
                <!--/span-->
                <div class="span3">
                    
                        <fieldset><legend><h4>Lab Payments </h4></legend>
                   
                    <ul class="nav nav-list nav-stacked">
                
                    <?php if(!is_null($msg)){
                    echo $msg;
                            }
                        else{ ?>
              
                   <?php foreach($topay as $payers){?>
              <li>
                   <?php echo anchor('doc_profile/payments/'.$payers['visitid']."/".$payers['id'],$payers['fname']." ".$payers['lname']." ".$payers['sname']); ?>
                   <?php }?>
              </li>
                   <?php } ?>
            </ul>
                   
                    </fieldset>
                </div>
                <div class="span3">
                    
                        <fieldset><legend><h4>Pharmacy Payments </h4></legend>
                   
            <ul class="nav nav-list nav-stacked">
                
                     <?php if(!is_null($msg)){
                         echo $msg;
                           }
                       else{?>
              
                     <?php foreach($topha as $payers){?>
              <li>
                  <?php echo anchor('doc_profile/pharm_payments/'.$payers['checkupid']."/".$payers['id'],$payers['fname']." ".$payers['lname']." ".$payers['sname']); ?>
                  <?php }?>
              </li>
                  <?php } ?>
            </ul>
                   
                    </fieldset>
                </div>
                <!--/span-->
            </div>