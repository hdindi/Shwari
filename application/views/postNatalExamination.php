<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Nurse</title>
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
echo form_open('postNatalExamination', $attributes); ?>
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

<h3>Post Natal Examination</h3>

<fieldset><legend>Mother</legend>
<table border="1">

   <tr><td><label for="timing_of_visit">Timing Of Visit <span class="required">*</span></label></td><td>
        <?php echo form_error('timing_of_visit'); ?>
        
        <?php // Change the values in this array to populate your dropdown as required ?>
        <?php $options = array(
                                                  ''  => 'Please Select',
                                                  '48 hours'    => '48 hours',
                                                  '1 - 2 weeks'    => '1 - 2 weeks',
                                                  '4 - 6 weeks'    => '4 - 6 weeks',
                                                  '3 targeted visits'    => '3 targeted visits'

                                                ); ?>

        <?php echo form_dropdown('timing_of_visit', $options, set_value('timing_of_visit'))?>
</td></tr>                                             
                        
<tr><td>
        <label for="date_visit">Date/visit <span class="required">*</span></label></td><td>
        <?php echo form_error('date_visit'); ?>
        <input id="date_visit" type="text" name="date_visit"  value="<?php echo set_value('date_visit'); ?>"  />
</td></tr>

<tr><td>
        <label for="blood_pressure">Blood Pressure <span class="required">*</span></label></td><td>
        <?php echo form_error('blood_pressure'); ?>
        <input id="blood_pressure" type="text" name="blood_pressure" maxlength="55" value="<?php echo set_value('blood_pressure'); ?>"  />
</td></tr>

<tr><td>
        <label for="temperature">Temperature <span class="required">*</span></label></td><td>
        <?php echo form_error('temperature'); ?>
        <input id="temperature" type="text" name="temperature" maxlength="55" value="<?php echo set_value('temperature'); ?>"  />
</td></tr>

<tr><td>
        <label for="pulse">Tulse <span class="required">*</span></label></td><td>
        <?php echo form_error('pulse'); ?>
        <input id="pulse" type="text" name="pulse" maxlength="55" value="<?php echo set_value('pulse'); ?>"  />
</td></tr>

<tr><td>
        <label for="respiratory_rate">Respiratory Rate <span class="required">*</span></label></td><td>
        <?php echo form_error('respiratory_rate'); ?>
        <input id="respiratory_rate" type="text" name="respiratory_rate" maxlength="255" value="<?php echo set_value('respiratory_rate'); ?>"  />
</td></tr>

<tr><td>
        <label for="general_codition">General Codition <span class="required">*</span></label></td><td>
	<?php echo form_error('general_codition'); ?>

							
	<?php echo form_textarea( array( 'name' => 'general_codition', 'rows' => '5', 'cols' => '10', 'value' => set_value('general_codition') ) )?>
</td></tr>

<tr><td>
        <label for="breast">Breast <span class="required">*</span></label></td><td>
        <?php echo form_error('breast'); ?>
        <input id="breast" type="text" name="breast" maxlength="255" value="<?php echo set_value('breast'); ?>"  />
</td></tr>

<tr><td>
        <label for="c_s_scar">C/S Scar <span class="required">*</span></label></td><td>
        <?php echo form_error('c_s_scar'); ?>
        <input id="c_s_scar" type="text" name="c_s_scar" maxlength="255" value="<?php echo set_value('c_s_scar'); ?>"  />
</td></tr>

<tr><td>
        <label for="involution_of_uterus">Involution Of Uterus <span class="required">*</span></label></td><td>
        <?php echo form_error('involution_of_uterus'); ?>
        <input id="involution_of_uterus" type="text" name="involution_of_uterus" maxlength="255" value="<?php echo set_value('involution_of_uterus'); ?>"  />
</td></tr>

<tr><td>
        <label for="condition_of_episiotomy">Condition Of Episiotomy <span class="required">*</span></label></td><td>
	<?php echo form_error('condition_of_episiotomy'); ?>
	
							
	<?php echo form_textarea( array( 'name' => 'condition_of_episiotomy', 'rows' => '5', 'cols' => '80', 'value' => set_value('condition_of_episiotomy') ) )?>
</td></tr>
<tr><td>
        <label for="lochia">Lochia <span class="required">*</span></label></td><td>
        <?php echo form_error('lochia'); ?>
     <input id="lochia" type="text" name="lochia" maxlength="255" value="<?php echo set_value('lochia'); ?>"  />
</td></tr>

<tr><td>
        <label for="pelvic_exam">Pelvic Exam <span class="required">*</span></label></td><td>
	<?php echo form_error('pelvic_exam'); ?>

							
	<?php echo form_textarea( array( 'name' => 'pelvic_exam', 'rows' => '5', 'cols' => '80', 'value' => set_value('pelvic_exam') ) )?>
</td></tr>

<tr><td>
        <label for="heamoglobin">Heamoglobin <span class="required">*</span></label></td><td>
	<?php echo form_error('heamoglobin'); ?>
	
							
	<?php echo form_textarea( array( 'name' => 'heamoglobin', 'rows' => '5', 'cols' => '80', 'value' => set_value('heamoglobin') ) )?>
</td></tr>

<tr><td>
        <label for="mothers_hiv_status">Mother's HIV Status <span class="required">*</span></label></td><td>
        <?php echo form_error('mothers_hiv_status'); ?>
        
        <?php // Change the values in this array to populate your dropdown as required ?>
        <input id="mothers_hiv_status" name="mothers_hiv_status" type="radio" class="" value="Yes" <?php echo $this->form_validation->set_radio('mothers_hiv_status', 'Yes'); ?> />Yes
                
        <input id="mothers_hiv_status" name="mothers_hiv_status" type="radio" class="" value="No" <?php echo $this->form_validation->set_radio('mothers_hiv_status', 'No'); ?> />No
</td></tr>                                            
                        
<tr><td>
        <label for="mother_given_vit">mother given Vit <span class="required">*</span></label></td><td>
        <?php echo form_error('mother_given_vit'); ?>
     
                <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
                <input id="mother_given_vit" name="mother_given_vit" type="radio" class="" value="Yes" <?php echo $this->form_validation->set_radio('mother_given_vit', 'Yes'); ?> />Yes
        		

        		<input id="mother_given_vit" name="mother_given_vit" type="radio" class="" value="No" <?php echo $this->form_validation->set_radio('mother_given_vit', 'No'); ?> />No
        		
</td></tr>


<tr><td>
        <label for="mother_given_art_b_plus_prophylaxis">Mother Given ART/B Plus Prophylaxis <span class="required">*</span></label></td><td>
        <?php echo form_error('mother_given_art_b_plus_prophylaxis'); ?>
    
                <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
                <input id="mother_given_art_b_plus_prophylaxis" name="mother_given_art_b_plus_prophylaxis" type="radio" class="" value="Yes" <?php echo $this->form_validation->set_radio('mother_given_art_b_plus_prophylaxis', 'Yes'); ?> />Yes
        	
        		<input id="mother_given_art_b_plus_prophylaxis" name="mother_given_art_b_plus_prophylaxis" type="radio" class="" value="No" <?php echo $this->form_validation->set_radio('mother_given_art_b_plus_prophylaxis', 'No'); ?> />No
        	
                <input id="mother_given_art_b_plus_prophylaxis" name="mother_given_art_b_plus_prophylaxis" type="radio" class="" value="N/A" <?php echo $this->form_validation->set_radio('mother_given_art_b_plus_prophylaxis', 'N/A'); ?> />N/A
                
</td></tr>


<tr><td>
        <label for="mother_on_haart">Mother On HAART <span class="required">*</span></label></td><td>
        <?php echo form_error('mother_on_haart'); ?>
        
                <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
                <input id="mother_on_haart" name="mother_on_haart" type="radio" class="" value="Yes" <?php echo $this->form_validation->set_radio('mother_on_haart', 'Yes'); ?> />Yes
        	
        		<input id="mother_on_haart" name="mother_on_haart" type="radio" class="" value="No" <?php echo $this->form_validation->set_radio('mother_on_haart', 'No'); ?> />No
        	
</td></tr>


<tr><td>
        <label for="mother_contrimoxazole_prophylaxis_initiated">Mother Contrimoxazole Prophylaxis Initiated <span class="required">*</span></label></td><td>
        <?php echo form_error('mother_contrimoxazole_prophylaxis_initiated'); ?>
     
                <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
                <input id="mother_contrimoxazole_prophylaxis_initiated" name="mother_contrimoxazole_prophylaxis_initiated" type="radio" class="" value="Yes" <?php echo $this->form_validation->set_radio('mother_contrimoxazole_prophylaxis_initiated', 'Yes'); ?> />Yes
        		<input id="mother_contrimoxazole_prophylaxis_initiated" name="mother_contrimoxazole_prophylaxis_initiated" type="radio" class="" value="No" <?php echo $this->form_validation->set_radio('mother_contrimoxazole_prophylaxis_initiated', 'No'); ?> />No
                <input id="mother_contrimoxazole_prophylaxis_initiated" name="mother_contrimoxazole_prophylaxis_initiated" type="radio" class="" value="N/A" <?php echo $this->form_validation->set_radio('mother_contrimoxazole_prophylaxis_initiated', 'N/A'); ?> />N/A
        		
</td></tr>


<tr><td>
        <label for="counseling_on_family_planning">Counseling On Family Planning <span class="required">*</span></label></td><td>
        <?php echo form_error('counseling_on_family_planning'); ?>
      
                <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
                <input id="counseling_on_family_planning" name="counseling_on_family_planning" type="radio" class="" value="Yes" <?php echo $this->form_validation->set_radio('counseling_on_family_planning', 'Yes'); ?> />Yes
        	

        		<input id="counseling_on_family_planning" name="counseling_on_family_planning" type="radio" class="" value="No" <?php echo $this->form_validation->set_radio('counseling_on_family_planning', 'No'); ?> />No
        		
</td></tr>
</table>
</fieldset>

<fieldset><legend>Baby</legend>
<table border="1">

<tr><td>
        <label for="babys_condition">Baby's Condition <span class="required">*</span></label></td><td>
	<?php echo form_error('babys_condition'); ?>

							
	<?php echo form_textarea( array( 'name' => 'babys_condition', 'rows' => '3', 'cols' => '10', 'value' => set_value('babys_condition') ) )?>
</td></tr>

<tr><td>
        <label for="babys_temperature">Baby's Temperature <span class="required">*</span></label></td><td>
        <?php echo form_error('babys_temperature'); ?>
      <input id="babys_temperature" type="text" name="babys_temperature" maxlength="55" value="<?php echo set_value('babys_temperature'); ?>"  />
</td></tr>

<tr><td>
        <label for="babys_breaths_minute">Baby's Breaths / Minute <span class="required">*</span></label></td><td>
        <?php echo form_error('babys_breaths_minute'); ?>
       <input id="babys_breaths_minute" type="text" name="babys_breaths_minute" maxlength="255" value="<?php echo set_value('babys_breaths_minute'); ?>"  />
</td></tr>

<tr><td>
        <label for="babys_feeding_method">Baby's Feeding Method <span class="required">*</span></label></td><td>
	<?php echo form_error('babys_feeding_method'); ?>

							
	<?php echo form_textarea( array( 'name' => 'babys_feeding_method', 'rows' => '3', 'cols' => '10', 'value' => set_value('babys_feeding_method') ) )?>
</td></tr>

<tr><td>
        <label for="breastfeeding">Breastfeeding</label></td><td>
        <?php echo form_error('breastfeeding'); ?>
     
                <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
                <input id="breastfeeding" name="breastfeeding" type="radio" class="" value="Correct" <?php echo $this->form_validation->set_radio('breastfeeding', 'Correct'); ?> />Correct

        		<input id="breastfeeding" name="breastfeeding" type="radio" class="" value="Not Correct" <?php echo $this->form_validation->set_radio('breastfeeding', 'Not Correct'); ?> />Not Correct
        		
</td></tr>


<tr><td>
        <label for="umbilical_cord">Umbilical Cord <span class="required">*</span></label></td><td>
	<?php echo form_error('umbilical_cord'); ?>

							
	<?php echo form_textarea( array( 'name' => 'umbilical_cord', 'rows' => '3', 'cols' => '10', 'value' => set_value('umbilical_cord') ) )?>
</td></tr>

<tr><td>
        <label for="babys_immunization_started">Baby's Immunization Started <span class="required">*</span></label></td><td>
        <?php echo form_error('babys_immunization_started'); ?>
    
                <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
                <input id="babys_immunization_started" name="babys_immunization_started" type="radio" class="" value="Yes" <?php echo $this->form_validation->set_radio('babys_immunization_started', 'Yes'); ?> />Yes
        		

        		<input id="babys_immunization_started" name="babys_immunization_started" type="radio" class="" value="No" <?php echo $this->form_validation->set_radio('babys_immunization_started', 'No'); ?> />No
        		
</td></tr>


<tr><td>
        <label for="infant_given_arv_prophylaxis">Infant Given ARV Prophylaxis <span class="required">*</span></label></td><td>
        <?php echo form_error('infant_given_arv_prophylaxis'); ?>
      
                <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
                <input id="infant_given_arv_prophylaxis" name="infant_given_arv_prophylaxis" type="radio" class="" value="Yes" <?php echo $this->form_validation->set_radio('infant_given_arv_prophylaxis', 'Yes'); ?> />Yes
        		<input id="infant_given_arv_prophylaxis" name="infant_given_arv_prophylaxis" type="radio" class="" value="No" <?php echo $this->form_validation->set_radio('infant_given_arv_prophylaxis', 'No'); ?> />No
                <input id="infant_given_arv_prophylaxis" name="infant_given_arv_prophylaxis" type="radio" class="" value="N/A" <?php echo $this->form_validation->set_radio('infant_given_arv_prophylaxis', 'N/A'); ?> />N/A
        	
</td></tr>


<tr><td>
        <label for="infant_cotrimoxazole_prophylaxis_initiated">Infant Cotrimoxazole Prophylaxis Initiated <span class="required">*</span></label></td><td>
        <?php echo form_error('infant_cotrimoxazole_prophylaxis_initiated'); ?>
 
                <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
                <input id="infant_cotrimoxazole_prophylaxis_initiated" name="infant_cotrimoxazole_prophylaxis_initiated" type="radio" class="" value="Yes" <?php echo $this->form_validation->set_radio('infant_cotrimoxazole_prophylaxis_initiated', 'Yes'); ?> />Yes
        		<input id="infant_cotrimoxazole_prophylaxis_initiated" name="infant_cotrimoxazole_prophylaxis_initiated" type="radio" class="" value="No" <?php echo $this->form_validation->set_radio('infant_cotrimoxazole_prophylaxis_initiated', 'No'); ?> />No
                <input id="infant_cotrimoxazole_prophylaxis_initiated" name="infant_cotrimoxazole_prophylaxis_initiated" type="radio" class="" value="N/A" <?php echo $this->form_validation->set_radio('infant_cotrimoxazole_prophylaxis_initiated', 'N/A'); ?> />N/A
        		
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
