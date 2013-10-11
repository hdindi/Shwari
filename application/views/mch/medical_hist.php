<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="HandheldFriendly" content="true" />
<title>Form</title>
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/form.css"/>
<link href="<?php echo base_url()?>css/calendarview.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/styles/nova.css" />
<style type="text/css">
    .form-label{
        width:100px !important;
    }
    .form-label-left{
        width:100px !important;
    }
    .form-line{
        padding-top:8px;
        padding-bottom:4px;
    }
    .form-label-right{
        width:100px !important;
    }
    .form-all{
        width:800px;
        color:#555 !important;
        font-family:'Lucida Grande';
        font-size:14px;
    }
    .form-radio-item label, .form-checkbox-item label, .form-grading-label, .form-header{
        color:#555;
    }

</style>

<script src="<?php echo base_url()?>js/prototype.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>js/protoplus.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>js/protoplus-ui.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>js/jotform.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>js/calendarview.js" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.init();
</script>
</head>
<body>
<form class="jotform-form"  method="post" name="form_31362557689567" id="31362557689567" action="<?php echo base_url()?>mother_child/maternal_history">
  <input type="hidden" name="formID" value="31362557689567" />
  <div class="form-all">
    <ul class="form-section">
      <li class="form-line form-line-column" id="id_3">
        <label class="form-label-left" id="label_3" for="input_3">Surgical Operation(Specify)<span class="form-required">*</span> </label>
          <textarea id="input_3" class="form-textarea validate[required]" name="surgical_operation" cols="40" rows="6"></textarea>
      </li>
      <li class="form-line form-line-column form-line-column-clear" id="id_10">
        <label class="form-label-left" id="label_10" for="input_10"> Diabetes<span class="form-required">*</span></label>
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_10_0" name="Diabetes" value="Yes" />
              <label for="input_10_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_10_1" name="Diabetes" value="No" />
              <label for="input_10_1"> No </label></span><span class="clearfix"></span>
        </div>
      </li>
      <li class="form-line form-line-column" id="id_11">
        <label class="form-label-left" id="label_11" for="input_11">
          Hypertension<span class="form-required">*</span>
        </label>
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_11_0" name="Hypertension" value="Yes" />
              <label for="input_11_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_11_1" name="Hypertension" value="No" />
              <label for="input_11_1"> No </label></span><span class="clearfix"></span>
        </div>
      </li>
      <li class="form-line form-line-column form-line-column-clear" id="id_12">
        <label class="form-label-left" id="label_12" for="input_12">
          Blood Transfusion<span class="form-required">*</span>
        </label>
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_12_0" name="Blood_transfusion" value="Yes" />
              <label for="input_12_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_12_1" name="Blood_transfusion" value="No" />
              <label for="input_12_1"> No </label></span><span class="clearfix"></span>
        </div>
      </li>
      <li class="form-line form-line-column" id="id_13">
        <label class="form-label-left" id="label_13" for="input_13">Tuberclosis<span class="form-required">*</span></label>
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_13_0" name="Tuberclosis" value="Yes" />
              <label for="input_13_0"> Yes </label></span><span class="clearfix"></span>
              <span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_13_1" name="Tuberclosis" value="No" />
              <label for="input_13_1"> No </label></span><span class="clearfix"></span>
       
        </div>
      </li>
      <li class="form-line form-line-column" id="id_8">
        <label class="form-label-left" id="label_8" for="input_8">Drug Allergy(Specify)<span class="form-required">*</span></label>
      <textarea id="input_8" class="form-textarea validate[required]" name="Drug_allergy" cols="40" rows="6"></textarea>
        
      </li>
      <li class="form-line form-line-column form-line-column-clear" id="id_9">
        <label class="form-label-left" id="label_9" for="input_9"> Family History<span class="form-required">*</span> </label>
    
          <div class="form-multiple-column"><span class="form-checkbox-item"><input type="checkbox" class="form-checkbox validate[required]" id="input_9_0" name="family_history" value="Twins" />
              <label for="input_9_0"> Twins </label></span><span class="clearfix"></span><span class="form-checkbox-item"><input type="checkbox" class="form-checkbox validate[required]" id="input_9_1" name="family_history" value="Tuberclosis" />
              <label for="input_9_1"> Tuberclosis </label></span><span class="clearfix"></span><span class="form-checkbox-item" style="clear:left;"><input type="checkbox" class="form-checkbox validate[required]" id="input_9_2" name="family_history" value="Diabetes" />
              <label for="input_9_2"> Diabetes </label></span><span class="clearfix"></span><span class="form-checkbox-item"><input type="checkbox" class="form-checkbox validate[required]" id="input_9_3" name="family_history" value="Hypertension" />
              <label for="input_9_3"> Hypertension </label></span><span class="clearfix"></span>
          
        </div>
      </li>
     <li class="form-line form-line-column form-line-column-clear" id="id_2">
      <input type="submit" name="save" value="Update Patient Records"/>
      
      </li>
    </ul>
  </div>
</form>

</body>
</html>