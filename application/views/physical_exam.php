<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><form class="jotform-form" name="form_31361068607553" id="physical" accept-charset="utf-8">
  <input type="hidden" name="formID" value="31361068607553" />
  <div class="form-all">
    <ul class="form-section">
      <li class="form-line form-line-column" id="id_4">
        <label class="form-label-left" id="label_4" for="input_4"> General </label>
          <textarea id="input_4" class="form-textarea" name="general" cols="30" rows="6"></textarea>
      </li>
      <li class="form-line form-line-column" id="id_13">
        <label class="form-label-left" id="label_13" for="input_13"> Abdomen </label>
          <textarea id="input_13" class="form-textarea" name="abdomen" cols="30" rows="6"></textarea>
      </li>
      <li class="form-line form-line-column" id="id_15">
        <label class="form-label-left" id="label_15" for="input_15"> Discharge/Genital Ulcer </label>
          <textarea id="input_15" class="form-textarea" name="discharge" cols="30" rows="6"></textarea>
      </li>
      <li class="form-line form-line-column" id="id_14">
        <label class="form-label-left" id="label_14" for="input_14"> Vaginal Examination </label>
          <textarea id="input_14" class="form-textarea" name="vaginal_examination" cols="30" rows="6"></textarea>
      </li>
      <li class="form-line form-line-column" id="id_12">
        <label class="form-label-left" id="label_12" for="input_12"> Breasts </label>
          <textarea id="input_12" class="form-textarea" name="breasts" cols="30" rows="6"></textarea>
      </li>
      <li class="form-line form-line-column" id="id_11">
        <label class="form-label-left" id="label_11" for="input_11"> Respiratory </label>
          <textarea id="input_11" class="form-textarea" name="respiratory" cols="30" rows="6"></textarea>
      </li>
      <li class="form-line form-line-column" id="id_10">
        <label class="form-label-left" id="label_10" for="input_10"> CVS </label>
          <textarea id="input_10" class="form-textarea" name="cvs" cols="30" rows="6"></textarea>
      </li>
      <li class="form-line form-line-column" id="id_5">
        <label class="form-label-left" id="label_5" for="input_5"> Blood Pressure </label>
          <input type="text" class=" form-textbox" id="input_5" name="blood_pressure" size="20" />
      </li>
      <li class="form-line form-line-column" id="id_6">
        <label class="form-label-left" id="label_6" for="input_6"> Height </label>
          <input type="text" class=" form-textbox validate[Numeric]" id="input_6" name="height" size="20" />
      </li>
     <input type="submit" name="save" value="Update Patient Records">
    </ul>
  </div>
 
</form>
 