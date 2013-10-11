<?php if($this->session->userdata('id')){
                 
    // redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><div>
  <form class="jotform-form" id="maternal_profile">
   <div class="form-all">
 
    <ul class="form-section">
     <fieldset>
  <legend>Patient Information</legend>
  <input type="hidden" name="patientid" value="<?php echo $this->uri->segment(4);?>">
   
 
      <li class="form-line form-line-column" id="id_1">
        <label class="form-label-left" id="label_1" for="input_1"> Name of Institution<span class="form-required">*</span></label>
    <input type="text" class=" form-textbox validate[required]" id="input_1" name="Institution" size="25" value="Shwari Healthcare" />
      </li>
       <li class="form-line form-line-column" id="id_14">
        <label class="form-label-left" id="label_14" for="input_14"> No of ANC </label>
       <input type="text" class=" form-textbox" id="input_14" name="no_of_anc" size="25" />
      </li>
       <?php foreach($names as $patientname){
              if(empty($patientname)){
                echo " ";
                }
              else{
				  $dob =  $patientname['dob'];
                  $age = date_diff(date_create($dob), date_create('now'))->y;
                  $ids =$this->uri->segment(3);
                  if ($age <= 0){ $bage = date_diff(date_create($dob), date_create('now'))->d; $nage=$bage." Days"; }
                  elseif ($age > 0) { $nage = $age." Years"; }
           ?>
          
      
      <li class="form-line form-line-column" id="id_15">
        <label class="form-label-left" id="label_15" for="input_15"> Name of Client </label>
     <input type="text" class=" form-textbox" id="input_15" name="Client" size="25" value="<?php  echo $patientname['fname']." ".$patientname['lname']." ".$patientname['sname'];?>"/>
       </li>
	   
       <li class="form-line form-line-column" id="id_16">
        <label class="form-label-left" id="label_16" for="input_16"> Age </label>
     <input type="text" class=" form-textbox" id="input_16" name="Age" size="25" value="<?php echo $nage?>" />
      </li>
       <?php  }
          }?>
     </fieldset>
     <fieldset>
     <legend>Medical Information</legend>
      <li class="form-line form-line-column" id="id_3">
        <label class="form-label-left" id="label_3" for="input_3">
          Gravida<span class="form-required">*</span>
        </label>
       <input type="text" class=" form-textbox validate[required]" id="input_3" name="Gravida" size="25" />
     
      </li>
      <li class="form-line form-line-column" id="id_6">
        <label class="form-label-left" id="label_6" for="input_6">
          Height(<font color="red"><i> m </i> </font> )<span class="form-required">*</span>
        </label>
       <input type="text" class=" form-textbox validate[required]" id="input_6" name="Height" size="25" />
    </li>
      <li class="form-line form-line-column form-line-column-clear" id="id_4">
        <label class="form-label-left" id="label_4" for="input_4">
          Parity<span class="form-required">*</span>
        </label>
          <input type="text" class=" form-textbox validate[required]" id="input_4" name="Parity" size="25" />
       
      </li>
      <li class="form-line form-line-column" id="id_7">
        <label class="form-label-left" id="label_7" for="input_7">
          L.M.P<span class="form-required">*</span>
        </label>
      
          <input type="text" class=" form-textbox validate[required]" id="input_7" name="LMP" size="25" />
      
      </li>
      <li class="form-line form-line-column" id="id_8">
        <label class="form-label-left" id="label_8" for="input_8">
          EDD<span class="form-required">*</span>
        </label>
        
          <input type="text" class=" form-textbox validate[required]" id="input_8" name="EDD" size="25" />
       
      </li>
      <li class="form-line form-line-column form-line-column-clear" id="id_9">
        <label class="form-label-left" id="label_9" for="input_9"> Education </label>
        
          <input type="text" class=" form-textbox" id="input_9" name="Education" size="25" />
       
      </li>
      <li class="form-line form-line-column" id="id_10">
        <label class="form-label-left" id="label_10" for="input_10"> Occupation </label>
       
          <input type="text" class=" form-textbox" id="input_10" name="Occupation" size="25" />
      </li>
      </fieldset>
      <fieldset>
      <legend>Next Of  Kin</legend>
      <li class="form-line form-line-column" id="id_11">
        <label class="form-label-left" id="label_11" for="input_11">
          Next of Kin<span class="form-required">*</span>
        </label>
          <input type="text" class=" form-textbox validate[required]" id="input_11" name="Next_of_Kin" size="25" />
        
      </li>
      <li class="form-line form-line-column form-line-column-clear" id="id_12">
        <label class="form-label-left" id="label_12" for="input_12">
          Next of Kin's Contacts<span class="form-required">*</span>
        </label>
          <input type="text" class=" form-textbox validate[required]" id="input_12" name="NOK_contacts" size="25" />
      </li>
      <li class="form-line form-line-column" id="id_13">
        <label class="form-label-left" id="label_13" for="input_13">
          Relationship<span class="form-required">*</span>
        </label>
          <input type="text" class=" form-textbox validate[required]" id="input_13" name="Relationship" size="25" />
   
      </li>
     
      <li class="form-line form-line-column form-line-column-clear" id="id_2">
      <input type="submit" name="save" value="Update Patient Records"/>
       </fieldset>
      </li>
      
      
    </ul>
  </div>
  
</form>   
             
 </div>         
               
       
      