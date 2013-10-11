<?php if($this->session->userdata('id')){
                 
    // redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><!DOCTYPE html>
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
<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('delivery', $attributes); ?>
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

<fieldset><legend><h3>Delivery</h3></legend>
<table border="0">
<tr><td>
        <label for="duration_of_pregnancy">Duration Of Pregnancy(weeks) <span class="required">*</span></label></td><td>
        <?php echo form_error('duration_of_pregnancy'); ?>
       <input id="duration_of_pregnancy" type="text" name="duration_of_pregnancy" maxlength="255" value="<?php echo set_value('duration_of_pregnancy'); ?>"  />
</td></tr>

<tr><td>
        <label for="mode_of_delivery">Mode Of Delivery <span class="required">*</span></label></td><td>
        <?php echo form_error('mode_of_delivery'); ?>
       <input id="mode_of_delivery" type="text" name="mode_of_delivery" maxlength="255" value="<?php echo set_value('mode_of_delivery'); ?>"  />
</td></tr>

<tr><td>
        <label for="date">Date <span class="required">*</span></label></td><td>
        <?php echo form_error('date'); ?>
        <input id="date" type="text" name="date"  value="<?php echo set_value('date'); ?>"  />
</td></tr>

<tr><td>
        <label for="blood_loss">Blood Loss <span class="required">*</span></label></td><td>
        <?php echo form_error('blood_loss'); ?>
        
                <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
                <input id="blood_loss" name="blood_loss" type="radio" class="" value="Light" <?php echo $this->form_validation->set_radio('blood_loss','Light');?> />Light&nbsp;&nbsp;&nbsp;
        		<input id="blood_loss" name="blood_loss" type="radio" class="" value="Medium" <?php echo $this->form_validation->set_radio('blood_loss','Medium'); ?> />Medium&nbsp;&nbsp;&nbsp;
                <input id="blood_loss" name="blood_loss" type="radio" class="" value="Heavy" <?php echo $this->form_validation->set_radio('blood_loss','Heavy'); ?> />Heavy
</td></tr>


<tr><td>
        <label for="condition_of_mother">Condition Of Mother <span class="required">*</span></label></td><td>
	<?php echo form_error('condition_of_mother'); ?>
	
							
	<?php echo form_textarea( array( 'name' => 'condition_of_mother', 'rows' => '3', 'cols' => '80', 'value' => set_value('condition_of_mother') ) )?>
</td></tr>
<tr><td>
        <label for="apgar_score">Apgar Score <span class="required">*</span></label></td><td>
        <?php echo form_error('apgar_score'); ?>
    
                <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
                <input id="apgar_score" name="apgar_score" type="radio" class="" value="1min" <?php echo $this->form_validation->set_radio('apgar_score', '1min'); ?>/>1min&nbsp;&nbsp;&nbsp;
                <input id="apgar_score" name="apgar_score" type="radio" class="" value="5min" <?php echo $this->form_validation->set_radio('apgar_score', '5min'); ?> />5min&nbsp;&nbsp;&nbsp;
                <input id="apgar_score" name="apgar_score" type="radio" class="" value="10min" <?php echo $this->form_validation->set_radio('apgar_score', '10min'); ?> />10min
</td></tr>


<tr><td>
        <label for="rescuscitation">Rescuscitation <span class="required">*</span></label></td><td>
        <?php echo form_error('rescuscitation'); ?>
        <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
                <input id="rescuscitation" name="rescuscitation" type="radio" class="" value="Yes" <?php echo $this->form_validation->set_radio('rescuscitation', 'Yes'); ?> />Yes&nbsp;&nbsp;&nbsp;

        		<input id="rescuscitation" name="rescuscitation" type="radio" class="" value="No" <?php echo $this->form_validation->set_radio('rescuscitation', 'No'); ?> />No&nbsp;&nbsp;&nbsp;
</td></tr>
</table>
</fieldset>



<!--<fieldset><legend>Drug administered at delivery</legend>
<table>
<tr><td>
	      <span class="required">*</span>
        <?php echo form_error('drug_administered_at_delivery_mother'); ?>
        
        <?php // Change the values/css classes to suit your needs ?>
        <input type="checkbox" id="drug_administered_at_delivery_mother" name="drug_administered_at_delivery_mother" value="enter_value_here" class="" <?php echo set_checkbox('drug_administered_at_delivery_mother', 'enter_value_here'); ?>> Mother<br/>
</td></tr>

<tr><td>
	 <span class="required">*</span>
        <?php echo form_error('drug_administered_at_delivery_baby'); ?>
        
        <?php // Change the values/css classes to suit your needs ?>
        <input type="checkbox" id="drug_administered_at_delivery_baby" name="drug_administered_at_delivery_baby" value="enter_value_here" class="" <?php echo set_checkbox('drug_administered_at_delivery_baby', 'enter_value_here'); ?>> Baby
</td></tr>
</table>
</fieldset>-->


<fieldset><legend><h3>Place of delivery</h3></legend>
        <table>
<tr><td>
        <label for="health_facility">health facility <span class="required">*</span></label></td><td>
        <?php echo form_error('health_facility'); ?>
        <input id="health_facility" type="text" name="health_facility" maxlength="255" value="<?php echo set_value('health_facility'); ?>"  />
</td></tr>

<tr><td>
        <label for="home">home <span class="required">*</span></label></td><td>
        <?php echo form_error('home'); ?>
        <input id="home" type="text" name="home" maxlength="255" value="<?php echo set_value('home'); ?>"  />
</td></tr>

<tr><td>
        <label for="otherspecify">other(specify) <span class="required">*</span></label></td><td>
        <?php echo form_error('otherspecify'); ?>
        <input id="otherspecify" type="text" name="otherspecify" maxlength="255" value="<?php echo set_value('otherspecify'); ?>"  />
</td></tr>

<tr><td>
        <label for="nurse">nurse <span class="required">*</span></label></td><td>
        <?php echo form_error('nurse'); ?>
        <input id="nurse" type="text" name="nurse" maxlength="255" value="<?php echo set_value('nurse'); ?>"  />
</td></tr>

<tr><td>
        <label for="midwife">midwife <span class="required">*</span></label></td><td>
        <?php echo form_error('midwife'); ?>
        <input id="midwife" type="text" name="midwife" maxlength="255" value="<?php echo set_value('midwife'); ?>"  />
</td></tr>

<tr><td>
        <label for="clinical_officer">clinical officer <span class="required">*</span></label></td><td>
        <?php echo form_error('clinical_officer'); ?>
        <input id="clinical_officer" type="text" name="clinical_officer" maxlength="255" value="<?php echo set_value('clinical_officer'); ?>"  />
</td></tr>

<tr><td>
        <label for="doctor">doctor <span class="required">*</span></label></td><td>
        <?php echo form_error('doctor'); ?>
        <input id="doctor" type="text" name="doctor" maxlength="255" value="<?php echo set_value('doctor'); ?>"  />
</td></tr>

<tr><td>
        <label for="other">other <span class="required">*</span></label></td><td>
        <?php echo form_error('other'); ?>
        <input id="other" type="text" name="other" maxlength="255" value="<?php echo set_value('other'); ?>"  />
</td></tr>


<tr><td>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</td></tr>

<?php echo form_close(); ?>
</table>
</fieldset>
 </div><!--/span-->
                  
          <footer >
            <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank"><font color=white>HealthStrat 2013</font></a></p>
          </footer>
          </div><!--container fluid-->
           </body>
      </html>
