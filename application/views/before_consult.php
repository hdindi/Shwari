<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><p>
              <form id="checkup" class="form" onSubmit="return ValidateForm()">
               <table class="table table-bordered">
                  <tr>
                    <td><input type="hidden" value="<?php echo $this->uri->segment(3);?>"  name="visitid"></td>
                    <td><input type="hidden" value="<?php echo $this->uri->segment(4);?>"  name="patientid"></td>
                  </tr>
                  <tr>
                    <td><label for="Complaints">Complaints<span class="form-required">*</span></label></td>
                    <td><textarea name="complaints" style="width:90%" class="required"cols="100" rows="4" ></textarea></td>
                    
                  </tr>
                  <tr>
                    <td><label for="Past Medical History">Past Medical History<span class="form-required">*</span></label></td>
                    <td><textarea rows="4" cols="100" name="med_history" id="med_history" class="required"style="width:90%"></textarea></td>
                  </tr>
                  <tr>
                    <td><label for="Systemic Inquiry">Systemic Inquiry<span class="form-required">*</span></label></td>
                    <td><textarea rows="5" cols="100" name="systemic_inquiry" id="systemic_inquiry" class="required"style="width:90%"></textarea></td>
                  </tr>
                  <tr>
                    <td><label for="Examination Findings">Examination Findings<span class="form-required">*</span></label></td>
                    <td><textarea rows="5" cols="40" name="examination_findings" id="examination_findings" class="required" style="width:90%"></textarea></td>
                  </tr>
                  <tr>
                    <td><label for="Working Diagnosis">Working Diagnosis<span class="form-required">*</span></label></td>
                    <td><textarea rows="5" cols="40" name="working_diagnosis" id="working_diagnosis" class="required" style="width:90%"></textarea></td>
                  </tr>
          
                  <tr>
                    <td><label for="Allergy">Allergy</label></td>
                    <td><input type="text" name="allergy" id="allergy" style="width:350px;"/></td>
                    
                  </tr>
                  <tr>
                    <td><input type="submit" name="save"  value="Post Results"></td>
                  </tr>
                  
                </table>
              </form>
              
              
              </p>
             
              <!-- <button id="appointments">Make appointments</button>-->
              
              
              