<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Nurse </title>
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
        width:1000px;
        color:#524B3A !important;
        font-family:'Verdana';
        font-size:12px;
    }
    .form-radio-item label, .form-checkbox-item label, .form-grading-label, .form-header{
        color:#524B3A;
    }

</style>
  
    <style type="text/css">
    body {
    padding-top: 150px;
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css" media="screen"/>
  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css" media="screen"/>
  	<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/form.css"/>
	<link href="<?php echo base_url()?>css/pastel.css rel="stylesheet" type="text/css" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/calendarview.css"/>


    <script src="?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="?php echo base_url()?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/modernizr.js"></script>
    <script>
    
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>
    <style type="text/css">
    label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }
    </style>

  </head>
  <body data-spy="scroll" data-target=".hom">
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <a class="brand" href="#"><img src="<?php echo base_url()?>assets/img/shwari.png"></a>
        <div class="nav-collapse collapse">
          <p class="navbar-text pull-right">
          Logged in as <a href="#" class="navbar-link"><?php echo $this->session->userdata('type') ." ". $this->session->userdata('username');?></a>
        </p><?php if($this->uri->segment(3)){ ?>
			
			<?php }?>
        </div>
        <ul class="nav nav-tabs nav-pills">
          <li><a href='<?php echo site_url('nurse/patient_management')?>'>All Patients</a></li>
          <!--<li><a href='<?php echo site_url('nurse/triage_management')?>'>Triage</a> </li>
          <li><a href='<?php echo site_url('nurse/patient_allergy')?>'>Patient Allergy</a></li>
          <li><a href='<?php echo site_url('nurse/allergy')?>'> Allergy</a></li>
          <li><a href='<?php echo site_url('nurse/visit_management')?>'> Visits</a></li>-->
          <li><a href='<?php echo site_url('home/do_logout')?>'> Logout</a></li>
         
        </ul>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3 ">
          <div class="well sidebar-nav affix">
            <ul class="nav nav-list">
              <li class="nav-header">Active patients</li>
            
              
              
              <li>
              
              </li>
           
            </ul>
            </div><!--/.well -->
            </div><!--span3-->
            <div class="span8">
              <div class="hero-unit">
                <div>
  <form class="jotform-form" method="post" name="form_31361068607553" id="31361068607553" action="<?php echo base_url()?>mother_child/maternal_profile">
   <div class="form-all">
 
    <ul class="form-section">
     <fieldset>
  <legend>Patient Information</legend>
  <input type="hidden" name="patientid" value="<?php echo 3;?>">
   
 
      <li class="form-line form-line-column" id="id_1">
        <label class="form-label-left" id="label_1" for="input_1"> Name of Institution<span class="form-required">*</span></label>
    <input type="text" class=" form-textbox validate[required]" id="input_1" name="Institution" size="25" />
      </li>
       <li class="form-line form-line-column" id="id_14">
        <label class="form-label-left" id="label_14" for="input_14"> No of ANC </label>
       <input type="text" class=" form-textbox" id="input_14" name="no_of_anc" size="25" />
      </li>
      <li class="form-line form-line-column" id="id_15">
        <label class="form-label-left" id="label_15" for="input_15"> Name of Client </label>
     <input type="text" class=" form-textbox" id="input_15" name="Client" size="25" />
       </li>
       <li class="form-line form-line-column" id="id_16">
        <label class="form-label-left" id="label_16" for="input_16"> Age </label>
     <input type="text" class=" form-textbox" id="input_16" name="Age" size="25" />
      </li>
     </fieldset>
     <fieldset><div class="well" style="margin-top: 200px; margin-left:100px; margin-right:30px;">
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
      </li></div>
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
               
       
                 
                
                </div><!--accordion-->
              </div>
            </div>
        </div><!--/span-->
        
        <footer>
          <p>&copy; CAREtech 2013</p>
        </footer>
        </div><!--container fluid-->
        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
         <script src="<?php echo base_url()?>assets/chosen-master/chosen/chosen.jquery.js" type="text/javascript"></script>
          <script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
        <!--<script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/bootstrap-transition.js"></script>
        <script src="../assets/js/bootstrap-alert.js"></script>
        <script src="../assets/js/bootstrap-modal.js"></script>
        <script src="../assets/js/bootstrap-dropdown.js"></script>
        <script src="../assets/js/bootstrap-scrollspy.js"></script>
        <script src="../assets/js/bootstrap-tab.js"></script>
        <script src="../assets/js/bootstrap-tooltip.js"></script>
        <script src="../assets/js/bootstrap-popover.js"></script>
        <script src="../assets/js/bootstrap-button.js"></script>
        <script src="../assets/js/bootstrap-collapse.js"></script>
        <script src="../assets/js/bootstrap-carousel.js"></script>
        !--->
      	<script src="<?php echo base_url()?>js/prototype.js" type="text/javascript"></script>
		<script src="<?php echo base_url()?>js/protoplus.js" type="text/javascript"></script>
		<script src="<?php echo base_url()?>js/protoplus-ui.js" type="text/javascript"></script>
		<script src="<?php echo base_url()?>js/jotform.js" type="text/javascript"></script>
		<script src="<?php echo base_url()?>js/calendarview.js" type="text/javascript"></script>
		<script type="text/javascript">
   		JotForm.init();
		</script>
        <!--<script src="../assets/js/bootstrap-typeahead.js"></script>!-->
        
      </body>
    </html>