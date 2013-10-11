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
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/nova.css" />
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
        width:900px;
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
<script src="j<?php echo base_url()?>s/calendarview.js" type="text/javascript"></script>
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
<form class="jotform-form" action="<?php echo base_url()?>mother_child/present" method="post" name="form_31372816066555" id="31372816066555" >
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
 </div><!--/span-->
                  
          <footer >
            <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank"><font color=white>HealthStrat 2013</font></a></p>
          </footer>
          </div><!--container fluid-->
           </body>
      </html>
