<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Delivery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/style.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery-ui.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/chosen-master/chosen/chosen.css" />
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css" media="screen"/>
    <script src="?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="?php echo base_url()?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/modernizr.js"></script>
    <style type="text/css">
    body {
    padding-top: 140px;
    padding-bottom: 40px;
    }
    .sidebar-nav {
    padding: 9px 0;
    }
    .dialog-form{
    padding-top: 150px;
    padding-bottom: 40px;
    }
    @media (max-width: 980px) {
    /* Enable use of floated navbar text */
    .navbar-text.pull-right {
    float: none;
    padding-left: 5px;
    padding-right: 5px;
    }
    }
    </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="HandheldFriendly" content="true" />
<title>Form</title>
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/form.css"/>
<link href="<?php echo base_url()?>css/calendarview.css" rel="stylesheet" type="text/css" />
<style type="text/css">
    .form-label{
        width:150px !important;
    }
    .form-label-left{
        width:150px !important;
    }
    .form-line{
        padding-top:12px;
        padding-bottom:12px;
    }
    .form-label-right{
        width:150px !important;
    }
    .form-all{
        width:800px;
        color:#524B3A !important;
        font-family:'Verdana';
        font-size:12px;
    }
    .form-radio-item label, .form-checkbox-item label, .form-grading-label, .form-header{
        color:#524B3A;
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
  <body data-spy="scroll" data-target=".hom">
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">

        <a class="brand" href='<?php echo site_url('profile') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/shwari.png" alt="Home"></a>

        <div class="nav-collapse collapse">
          <p class="navbar-text pull-right">
          Logged in as <a href="" class="navbar-link"><?php echo $this->session->userdata('type') ." ". $this->session->userdata('username');?></a>
          <a href='<?php echo site_url('home/do_logout')?>'> <img src="<?php echo base_url()?>assets/img/logout.png" title="Logout"></a>
         <?php if($this->uri->segment(3)){ ?>
          
          <?php }?> 
        </p>


        </div>
        <ul class="nav nav-tabs nav-pills">
           <li><a class="brand" href='<?php echo site_url('profile') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/Home1.png" alt="Home"></a></li>
           <li><a href='<?php echo site_url('nurse/patient_management')?>'><img src="<?php echo base_url()?>assets/img/patient1.png" title="All patients"></a></li>
            
        </ul>
          
          <?php if($this->uri->segment(4)){?>
          <?php echo anchor('profile/todoc/'.$this->uri->segment(3)."/", 'Send to doctor','class="btn btn-primary" type="button"'); ?>
       
          <?php foreach($names as $patientname){
              if(empty($patientname)){
                echo " ";
                }
              else{
              echo "<strong>".$patientname['fname']." ".$patientname['lname']." ".$patientname['sname']."</strong>";
              }
          }?>
          
          <?php }//echo anchor('profile/finish/'.$this->uri->segment(3)."/", 'Deactivate patient','class="btn btn-danger" type="button"'); ?><br/>
          
       </div>
    </div>
    <div class="container-fluid">
      <div class="row-fluid">

        
          <div class="span15">
            <div class="hero-unit">

<form class="jotform-form" action="<?php echo base_url()?>mother_child/ante_natal" method="post" name="form_31361068607553" id="31361068607553">
  <div class="form-all">
    <ul class="form-section">
        <div class="form-header-group">
          <h2 id="header_15" class="form-header">
            Antenatal Profile
          </h2>
        </div>
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
          <div class="form-multiple-column"><span class="form-radio-item"><input type="radio" class="form-radio" id="input_17_0" name="q17_infantFeeding" value="Yes" />
              <label for="input_17_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item"><input type="radio" class="form-radio" id="input_17_1" name="q17_infantFeeding" value="No" />
              <label for="input_17_1"> No </label></span><span class="clearfix"></span>
        </div>
      </li>
      <li class="form-line form-line-column" id="id_18">
        <label class="form-label-left" id="label_18" for="input_18"> Counselling on exclusive breast feeding done </label>
          <div class="form-multiple-column"><span class="form-radio-item"><input type="radio" class="form-radio" id="input_18_0" name="q18_counsellingOn18" value="Yes" />
              <label for="input_18_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item"><input type="radio" class="form-radio" id="input_18_1" name="q18_counsellingOn18" value="No" />
              <label for="input_18_1"> No </label></span><span class="clearfix"></span>
        </div>
      </li>
      <li class="form-line form-line-column" id="id_19">
        <label class="form-label-left" id="label_19" for="input_19"> Infant feeding feeding options for HIV infected discused </label>
          <div class="form-multiple-column"><span class="form-radio-item"><input type="radio" class="form-radio" id="input_19_0" name="q19_infantFeeding19" value="Yes" />
              <label for="input_19_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item"><input type="radio" class="form-radio" id="input_19_1" name="q19_infantFeeding19" value="No" />
              <label for="input_19_1"> No </label></span><span class="clearfix"></span>
        </div>
      </li>
      <li class="form-line form-line-column" id="id_20">
        <label class="form-label-left" id="label_20" for="input_20"> If Yes, mother's decision </label>
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_20_0" name="q20_ifYes20" value="Exclusive breastfeeding" />
              <label for="input_20_0"> Exclusive breastfeeding </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_20_1" name="q20_ifYes20" value="Replacement feeding" />
              <label for="input_20_1"> Replacement feeding </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_20_2" name="q20_ifYes20" value="Not decided" />
              <label for="input_20_2"> Not decided </label></span><span class="clearfix"></span>
        </div>
      </li>
      <li class="form-line form-line-column" id="id_21">
        <label class="form-label-left" id="label_21" for="input_21"> If replacement feeding, Counseling and assessment on conditions needed for exclusive replacement feeding done: </label>
          <div class="form-multiple-column"><span class="form-radio-item"><input type="radio" class="form-radio" id="input_21_0" name="q21_ifReplacement" value="Yes" />
              <label for="input_21_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item"><input type="radio" class="form-radio" id="input_21_1" name="q21_ifReplacement" value="No" />
              <label for="input_21_1"> No </label></span><span class="clearfix"></span>
        </div>
      </li>
      <input type="submit" name="save" value="Update Patient Records">
      </ul>
  </div>
 
</form>
</div><!--/span-->
                  
          <footer >
            <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank"><font color=white>HealthStrat 2013</font></a></p>
          </footer>
          </div><!--container fluid-->
           </body>
      </html>
