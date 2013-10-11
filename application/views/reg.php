<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="HandheldFriendly" content="true" />
<title>Form</title>
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/css/styles/form.css?v3.1.473"/>
<link href="<?php echo base_url()?>assets/css/calendarview.css?v3.1.473" rel="stylesheet" type="text/css" />
<link type="text/css" media="print" rel="stylesheet" href="http://cdn.jotfor.ms/css/printForm.css?3.1.473" />
<style type="text/css">
    .form-label{
        width:160px !important;
    }
    .form-label-left{
        width:160px !important;
    }
    .form-line{
        padding-top:12px;
        padding-bottom:12px;
    }
    .form-label-right{
        width:160px !important;
    }
    .form-all{
        width:1000px;
        background:#FFFFFF;
        color:#555555 !important;
        font-family:'Verdana';
        font-size:12px;
    }
    .form-radio-item label, .form-checkbox-item label, .form-grading-label, .form-header{
        color:#555555;
    }

</style>

<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/css/styles/buttons/form-submit-button-simple_carolina_blue.css?3.1.473"/>
<script src="<?php echo base_url()?>assets/js/prototype.js?v=3.1.473" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/js/protoplus.js?v=3.1.473" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/js/protoplus-ui.js?v=3.1.473" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/js/jotform.js?v=3.1.473" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/js/calendarview.js?v=3.1.473" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.init(function(){
      $('sname').hint('Family Name');
      $('fname').hint('First Name');
      $('lname').hint('second Name');
      $('phone').hint('07********');
      $('email').hint('myname@example.com');
      $('kinphone').hint('07********');
   });
</script>
 <script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
 <script src="?php echo base_url()?>assets/js/jquery.min.js"></script>
<script>
$(document).ready(function()
{
  var changeYear = $( ".dob" ).datepicker( "option", "changeYear" );
  $( ".dob" ).datepicker( "option", "yearRange", "-100:+0" );
  $( ".dob" ).datepicker( "option", "maxDate", '+0m +0w' );
});</script>
</head>
<body>
<!--<form class="jotform-form" action="<?php echo base_url()?>reg/newpatient" method="post" name="newpatient" id="newpatient" accept-charset="utf-8">
  <input type="hidden" name="formID" value="31363593518559" />-->
  <?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('reg', $attributes); ?>
  <div class="form-all">
    <ul class="form-section">
      <li id="cid_1" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_1" class="form-header">
            Register New Patient
          </h2>
        </div>
      </li>
      <li id="cid_30" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_30" class="form-header">
            Bio Data
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_5">
        <label class="form-label-top" id="label_5" for="nationalid">
          National ID / Passport<span class="form-required">*</span>
        </label>
        <div id="cid_5" class="form-input-wide">
          <input type="number" class="form-number-input  form-textbox validate[required, Numeric]" id="nationalid" name="nationalid" style="width:204px" size="23" maxlength="8" data-type="input-number" />
        </div>
      </li>
      <li class="form-line form-line-column" id="id_6">
        <label class="form-label-top" id="label_6" for="sname">
          Surname<span class="form-required">*</span>
        </label>
        <div id="cid_6" class="form-input-wide">
          <input type="text" class=" form-textbox validate[required]" id="sname" name="sname" size="30" />
        </div>
      </li>
      <li class="form-line form-line-column" id="id_36">
        <label class="form-label-top" id="label_36" for="fname">
          First Name<span class="form-required">*</span>
        </label>
        <div id="cid_36" class="form-input-wide">
          <input type="text" class=" form-textbox validate[required]" id="fname" name="fname" size="30" />
        </div>
      </li>
      <li class="form-line form-line-column" id="id_35">
        <label class="form-label-top" id="label_35" for="lname">
          Second Name<span class="form-required">*</span>
        </label>
        <div id="cid_35" class="form-input-wide">
          <input type="text" class=" form-textbox validate[required]" id="lname" name="lname" size="30" />
        </div>
      </li>
      <li class="form-line" id="id_10">
        <label class="form-label-top" id="label_10" for="dob">
          Date Of Birth<span class="form-required">*</span>
        </label>
        <div id="cid_10" class="form-input-wide">
          <input type="text" class=" form-textbox validate[required]" id="dob" name="dob" size="20" />
        </div>
      </li>
      <li class="form-line" id="id_29">
        <label class="form-label-left" id="label_29" for="gender">
          Gender<span class="form-required">*</span>
        </label>
        <div id="cid_29" class="form-input">
          <div class="form-multiple-column">
              <span class="form-radio-item"><label for="input_29_0"> Male </label><input type="radio" class="form-radio validate[required]" id="sex" name="sex" value="Male" />
              </span>
              <span class="form-radio-item"><label for="input_29_1"> Female </label><input type="radio" class="form-radio validate[required]" id="sex" name="sex" value="Female" />
              </span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_37">
        <label class="form-label-left" id="label_37" for="input_37"> Marital Status </label>
        <div id="cid_37" class="form-input">
          <div class="form-multiple-column"><span class="form-radio-item"><input type="radio" class="form-radio" id="input_37_0" name="maritalstatus" value="Single" />
              <label for="input_37_0"> Single </label></span><span class="clearfix"></span><span class="form-radio-item"><input type="radio" class="form-radio" id="input_37_1" name="maritalstatus" value="Married" />
              <label for="input_37_1"> Married </label></span><span class="clearfix"></span><span class="form-radio-item"><input type="radio" class="form-radio" id="input_37_2" name="maritalstatus" value="Divorced" />
              <label for="input_37_2"> Divorced </label></span><span class="clearfix"></span><span class="form-radio-item"><input type="radio" class="form-radio" id="input_37_3" name="maritalstatus" value="Widowed" />
              <label for="input_37_3"> Widowed </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li id="cid_31" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_31" class="form-header">
            Contact Information
          </h2>
        </div>
      </li>
      <li class="form-line form-line-column form-line-column-clear" id="id_11">
        <label class="form-label-top" id="label_11" for="phone"> Phone Number </label>
        <div id="cid_11" class="form-input-wide">
          <input type="text" class=" form-textbox" id="phone" name="phone" size="30" />
        </div>
      </li>
      <li class="form-line form-line-column" id="id_12">
        <label class="form-label-top" id="label_12" for="email"> E-mail </label>
        <div id="cid_12" class="form-input-wide">
          <input type="email" class=" form-textbox validate[Email]" id="email" name="email" size="30" />
        </div>
      </li>
      <li class="form-line form-line-column" id="address">
        <label class="form-label-top" id="label_13" for="address"> Residence </label>
        <div id="cid_13" class="form-input-wide">
          <input type="text" class=" form-textbox" id="address" name="address" size="30" />
        </div>
      </li>
      <li class="form-line" id="id_38">
        <label class="form-label-left" id="label_38" for="input_38"> Employment Status </label>
        <div id="cid_38" class="form-input">
          <div class="form-multiple-column"><span class="form-radio-item"><input type="radio" class="form-radio" id="employmentstatus" name="employmentstatus" value="Not Employed" />
              <label for="employmentstatus"> Not Employed </label></span><span class="clearfix"></span><span class="form-radio-item"><input type="radio" class="form-radio" id="employmentstatus" name="employmentstatus" value="Employed" />
              <label for="employmentstatus"> Employed </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li id="cid_32" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_32" class="form-header">
            Next Of Kin
          </h2>
        </div>
      </li>
      <li class="form-line form-line-column" id="id_34">
        <label class="form-label-top" id="label_34" for="input_34"> Kin's Full Name </label>
        <div id="cid_34" class="form-input-wide">
          <input type="text" class=" form-textbox" id="kinname" name="kinname" size="30" />
        </div>
      </li>
      <li class="form-line form-line-column" id="id_21">
        <label class="form-label-top" id="label_21" for="input_21"> Kin's Relation </label>
        <div id="cid_21" class="form-input-wide">
          <input type="text" class=" form-textbox" id="kinrelation" name="kinrelation" size="30" />
        </div>
      </li>
      <li class="form-line form-line-column" id="id_22">
        <label class="form-label-top" id="label_22" for="input_22"> Kin's Phone Number </label>
        <div id="cid_22" class="form-input-wide">
          <input type="text" class=" form-textbox" id="kinphone" name="kinphone" size="30" />
        </div>
      </li>
      <li id="cid_39" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_39" class="form-header">
            Visit Information
          </h2>
        </div>
      </li>
      <li class="form-line form-line-column" id="id_40">
        <label class="form-label-top" id="label_40" for="package">
          Package<span class="form-required">*</span>
        </label>
        <div id="cid_40" class="form-input-wide">
          <select class="form-dropdown validate[required]" style="width:210px" id="package" name="package">
            <option value="">  </option>
            <option value="Option 1"> Option 1 </option>
            <option value="Option 2"> Option 2 </option>
            <option value="Option 3"> Option 3 </option>
          </select>
        </div>
      </li>
      <li class="form-line form-line-column" id="id_41">
        <label class="form-label-top" id="label_41" for="cost">
          Cost<span class="form-required">*</span>
        </label>
        <div id="cid_41" class="form-input-wide">
          <input type="text" class=" form-textbox validate[required]" id="cost" name="cost" size="30" />
        </div>
      </li>
      <li class="form-line form-line-column" id="id_42">
        <label class="form-label-top" id="label_42" for="mpesaCode">
          Mpesa Code<span class="form-required">*</span>
        </label>
        <div id="cid_42" class="form-input-wide">
          <input type="text" class=" form-textbox validate[required]" id="mpesaCode" name="mpesaCode" size="30" />
        </div>
      </li>
      <li class="form-line" id="id_27">
        <div id="cid_27" class="form-input-wide">
          <div style="text-align:left" class="form-buttons-wrapper">
            <button id="input_27" type="submit" class="form-submit-button form-submit-button-simple_carolina_blue">
              Add New Patient Info
            </button>
          </div>
        </div>
      </li>
      <li style="display:none">
        Should be Empty:
        <input type="text" name="website" value="" />
      </li>
    </ul>
  </div>
  <input type="hidden" id="simple_spc" name="simple_spc" value="31363593518559" />
  <script type="text/javascript">
  document.getElementById("si" + "mple" + "_spc").value = "31363593518559-31363593518559";
  </script>
<!--</form>-->
<?php echo form_close(); ?>

</body>
</html>