<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><form class="jotform-form" action="<?php echo base_url()?>mother_child/ante" method="post" name="" id="antenatal">
  <div class="form-all">
    <ul class="form-section">
        <div class="form-header-group">
          <h2 id="header_15" class="form-header">
            Antenatal Profile
          </h2>
        </div>
        <input type="hidden" name="patientid" value="<?php echo $this->uri->segment(4)?>">
      <li class="form-line form-line-column" id="id_3">
        <label class="form-label-left" id="label_3" for="input_3"> HB </label>
          <input type="text" class=" form-textbox" id="input_3" name="Hb" size="20" />
         </li>
      <li class="form-line form-line-column" id="id_4">
        <label class="form-label-left" id="label_4" for="input_4"> Blood Group </label>
          <input type="text" class=" form-textbox" id="input_4" name="blood_group" size="20" />
      </li>
      <li class="form-line form-line-column form-line-column-clear" id="id_5">
        <label class="form-label-left" id="label_5" for="input_5"> Rhesus </label>
          <input type="text" class=" form-textbox" id="input_5" name="rhesus" size="20" />
      </li>
      <li class="form-line form-line-column" id="id_6">
        <label class="form-label-left" id="label_6" for="input_6"> Serology(VDRL/RPR) </label>
          <input type="text" class=" form-textbox" id="input_6" name="serology" size="20" />
      </li>
      <li class="form-line form-line-column form-line-column-clear" id="id_8">
        <label class="form-label-left" id="label_8" for="input_8"> HIV </label>
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_8_0" name="hiv" value="reactive" />
              <label for="input_8_0"> Reactive </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_8_1" name="hiv" value="non-reactive" />
              <label for="input_8_1"> Non-Reactive </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_8_2" name="hiv" value="not_tested" />
              <label for="input_8_2"> Not Tested </label></span><span class="clearfix"></span>
        </div>
      </li>
      <li class="form-line form-line-column form-line-column-clear" id="id_11">
        <label class="form-label-left" id="label_11" for="input_11"> Couple HIV counselling and Testing </label>
          <div class="form-multiple-column"><span class="form-radio-item"><input type="radio" class="form-radio" id="input_11_0" name="couple_hiv_testing" value="yes" />
              <label for="input_11_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item"><input type="radio" class="form-radio" id="input_11_1" name="couple_hiv_testing" value="no" />
              <label for="input_11_1"> No </label></span><span class="clearfix"></span>
        </div>
      </li>
      <li class="form-line form-line-column" id="id_13">
          <div id="text_13" class="form-html">
            <p>
              If No, Counsel and Test
            </p>
        </div>
      </li>
      <li class="form-line form-line-column form-line-column-clear" id="id_7">
        <label class="form-label-left" id="label_7" for="input_7"> TB Screening </label>
          <input type="text" class=" form-textbox" id="input_7" name="tb_screening" size="20" />
      </li>
      <li class="form-line form-line-column" id="id_9">
        <label class="form-label-left" id="label_9" for="input_9"> Urinalysis </label>
          <input type="text" class=" form-textbox" id="input_9" name="urinalysis" size="20" />
      </li>
      <li id="cid_14" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_14" class="form-header">
            Infant Feeding
          </h2>
        </div>
      </li>
      <li class="form-line form-line-column" id="id_17">
        <label class="form-label-left" id="label_17" for="input_17"> Infant feeding counselling done </label>
          <div class="form-multiple-column"><span class="form-radio-item"><input type="radio" class="form-radio" id="input_17_0" name="infant_feeding" value="Yes" />
              <label for="input_17_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item"><input type="radio" class="form-radio" id="input_17_1" name="infant_feeding" value="No" />
              <label for="input_17_1"> No </label></span><span class="clearfix"></span>
        </div>
      </li>
      <li class="form-line form-line-column" id="id_18">
        <label class="form-label-left" id="label_18" for="input_18"> Counselling on exclusive breast feeding done </label>
          <div class="form-multiple-column"><span class="form-radio-item"><input type="radio" class="form-radio" id="input_18_0" name="exclusive_breastfeeding" value="Yes" />
              <label for="input_18_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item"><input type="radio" class="form-radio" id="input_18_1" name="exclusive_breastfeeding" value="No" />
              <label for="input_18_1"> No </label></span><span class="clearfix"></span>
        </div>
      </li>
      <li class="form-line form-line-column" id="id_19">
        <label class="form-label-left" id="label_19" for="input_19"> Infant feeding feeding options for HIV infected discused </label>
          <div class="form-multiple-column"><span class="form-radio-item"><input type="radio" class="form-radio" id="input_19_0" name="hiv_feeding" value="Yes" />
              <label for="input_19_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item"><input type="radio" class="form-radio" id="input_19_1" name="hiv_feeding" value="No" />
              <label for="input_19_1"> No </label></span><span class="clearfix"></span>
        </div>
      </li>
      <li class="form-line form-line-column" id="id_20">
        <label class="form-label-left" id="label_20" for="input_20"> If Yes, mother's decision </label>
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_20_0" name="q20_ifYes20" value="Exclusive breastfeeding" />
              <label for="input_20_0"> Exclusive breastfeeding </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_20_1" name="mother's_decision" value="Replacement feeding" />
              <label for="input_20_1"> Replacement feeding </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_20_2" name="mother's_decision" value="Not decided" />
              <label for="input_20_2"> Not decided </label></span><span class="clearfix"></span>
        </div>
      </li>
      <li class="form-line form-line-column" id="id_21">
        <label class="form-label-left" id="label_21" for="input_21"> If replacement feeding, Counseling and assessment on conditions needed for exclusive replacement feeding done: </label>
          <div class="form-multiple-column"><span class="form-radio-item"><input type="radio" class="form-radio" id="input_21_0" name="counselling_assesment" value="Yes" />
              <label for="input_21_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item"><input type="radio" class="form-radio" id="input_21_1" name="counselling_assesment" value="No" />
              <label for="input_21_1"> No </label></span><span class="clearfix"></span>
        </div>
      </li>
      <input type="submit" name="save" value="Update Patient Records">
      </ul>
  </div>
 
</form>