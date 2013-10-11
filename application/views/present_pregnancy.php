<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><form class="jotform-form" action="<?php echo base_url()?>mother_child/present" method="post" name="form_31372816066555" id="31372816066555" >
  <input type="hidden" name="formID" value="31372816066555" />
  <div class="form-all">
    <ul class="form-section">
      <li id="cid_1" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_1" class="form-header">
            Present Pregnancy
          </h2>
        </div>
      </li>
      <li class="form-line form-line-column" id="id_3">
        <label class="form-label-left" id="label_3" for="input_3"> No.of Visit </label>
          <input type="text" class=" form-textbox" id="input_3" name="no_of_visit" size="25" />
      </li>
      <li class="form-line form-line-column" id="id_5">
        <label class="form-label-left" id="label_5" for="input_5"> Urine </label>
          <input type="text" class=" form-textbox" id="input_5" name="urine" size="25" />
      </li>
      <li class="form-line form-line-column form-line-column-clear" id="id_6">
        <label class="form-label-left" id="label_6" for="input_6"> Weight </label>
          <input type="text" class=" form-textbox" id="input_6" name="weight" size="25" />
      </li>
      <li class="form-line form-line-column" id="id_7">
        <label class="form-label-left" id="label_7" for="input_7"> Hb </label>
          <input type="text" class=" form-textbox" id="input_7" name="hb" size="25" />
      </li>
      <li class="form-line form-line-column" id="id_8">
        <label class="form-label-left" id="label_8" for="input_8"> Pallor </label>
          <input type="text" class=" form-textbox" id="input_8" name="pallor" size="25" />
      </li>
      <li class="form-line form-line-column" id="id_9">
        <label class="form-label-left" id="label_9" for="input_9"> Maturity </label>
          <input type="text" class=" form-textbox" id="input_9" name="aturity" size="25" />
      </li>
      <li class="form-line form-line-column" id="id_10">
        <label class="form-label-left" id="label_10" for="input_10"> Fundal Height </label>
          <input type="text" class=" form-textbox" id="input_10" name="fundal_height" size="25" />
      </li>
      <li class="form-line form-line-column" id="id_11">
        <label class="form-label-left" id="label_11" for="input_11"> Presentation </label>
          <input type="text" class=" form-textbox" id="input_11" name="presentation" size="25" />
      </li>
      <li class="form-line form-line-column" id="id_12">
        <label class="form-label-left" id="label_12" for="input_12"> Lie </label>
          <input type="text" class=" form-textbox" id="input_12" name="lie" size="25" />
      </li>
      <li class="form-line form-line-column" id="id_13">
        <label class="form-label-left" id="label_13" for="input_13"> Foetal Heart </label>
          <input type="text" class=" form-textbox" id="input_13" name="foetal_heart" size="25" />
      </li>
      <li class="form-line form-line-column" id="id_14">
        <label class="form-label-left" id="label_14" for="input_14"> Foetal Movement </label>
          <input type="text" class=" form-textbox" id="input_14" name="foetal_movmt" size="25" />
      </li>
      <li class="form-line form-line-column" id="id_15">
        <label class="form-label-left" id="label_15" for="input_15"> Next Visit </label>
        <div id="cid_15" class="form-input">
          <input type="text" class=" form-textbox" id="input_15" name="next_visit" size="25" />
        </div>
      </li>
      <input type="submit" name="save" value="Update Patient Records">
    </ul>
  </div>
</form>
 