
             <div class="row-fluid">
                <div class="span3">
                    
                         <fieldset><legend><h4>Patients in Waiting</h4></legend>
                    
                    <ul class="nav nav-list nav-stacked">
                          <li class="nav-header"><h4>Nurse Queue</h4></li>

                         <?php foreach($patients as $active){
               if(empty($active)){
                  echo "<font color=red>You have no Active patients</font><br />";
                  }else{?>
              <li>
                <?php echo $active['fname']." ".$active['lname']." ".$active['sname']; ?>
                <?php }?>
              </li>
              <?php } ?>
            </ul>
            <ul class="nav nav-list nav-stacked">
            <li class="nav-header"><h4>Doctor Queue</h4></li>
                <?php foreach($doc_patients as $active){
          if(empty($active)){
                  echo "<font color=red>You have no Active patients</font><br />";
            }else{?>
              <li>
                <?php echo $active['fname']." ".$active['lname']." ".$active['sname']; ?>
                <?php }?>
              </li>
              <?php } ?>
            </ul>
            <ul class="nav nav-list nav-stacked">
            <li class="nav-header"><h4>Lab Queue</h4></li>
                 <?php foreach($lab_patients as $active){
           if(empty($active)){
             echo "<font color=red>You have no Active patients</font><br />";
             }else{?>
              <li>
                <?php echo $active['fname']." ".$active['lname']." ".$active['sname']; ?>
                <?php }
         }?>
              </li>
            </ul>
            <ul class="nav nav-list nav-stacked">
            <li class="nav-header"><h4>Pharmacy Queue</h4></li>
                <?php foreach($pharm_patients as $active){
          if(empty($active)){
                       echo "<font color=red>You have no Active patients</font><br />";
             }else{?>
              <li>
                <?php echo $active['fname']." ".$active['lname']." ".$active['sname']; ?>
                <?php }?>
              </li>
              <?php } ?>
            </ul>
            
                   
                    </fieldset>
                </div>
                <!--/span-->
                <div class="span3">
                    
                        <fieldset><legend><h4>Patient Payments</h4></legend>
                   
                    <ul class="nav nav-list nav-stacked">
                
                    <?php if(!is_null($msg)){
                    echo $msg;
                            }
                        else{ ?>
              
                   <?php foreach($topay as $payers){?>
              <li>
                   <?php echo anchor('reception/payments/'.$payers['visitid']."/".$payers['id'],$payers['fname']." ".$payers['lname']." ".$payers['sname']); ?>
                   <?php }?>
              </li>
                   <?php } ?>
            </ul>
                   
                    </fieldset>
                </div>
                <!--<div class="span3">
                    
                        <fieldset><legend><h4>Pharmacy Payments </h4></legend>
                   
            <ul class="nav nav-list nav-stacked">
                
                     <?php if(!is_null($msg)){
                         echo $msg;
                           }
                       else{?>
              
                     <?php foreach($topha as $payers){?>
              <li>
                  <?php echo anchor('reception/pharm_payments/'.$payers['visitid']."/".$payers['patientid'],$payers['fname']." ".$payers['lname']." ".$payers['sname']); ?>
                  <?php }?>
              </li>
                  <?php } ?>
                  
            </ul>
                </fieldset>
                </div>!-->
                <div class="span3">
                    
                        <fieldset><legend><h4>Walk In Payments </h4></legend>
                   
                <ul class="nav nav-list nav-stacked">
                
                   <?php if(!is_null($msg)){
                         echo $msg;
                           }
                       else{?>
              
                     <?php foreach($walkin as $payers){?>
              <li>
                  <?php echo anchor('reception/walkin/'.$payers['patientid'],$payers['patientname']); ?>
                  <?php }?>
              </li>
                  <?php } ?>
                  </ul>
                  </fieldset>
                    </div>

                  
                
                <!--/span-->
            </div>