<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
  <title>pharmacy</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

<style type='text/css'>
 
      body {
        padding-top: 135px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 90px 0;
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
     <link rel="stylesheet" href="<?php echo base_url() ?>assets/chosen-master/chosen/chosen.css" />


<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css" media="screen"/>
<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/jquery-ui.css" />
<link rel="stylesheet" href="<?php echo base_url()?>/assets/chosen-master/chosen/chosen.css" />
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
</head>
<body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
         <a class="brand" href="#"><img src="<?php echo base_url()?>assets/img/shwari.png" border="0"></a>
           <div class="nav-collapse collapse">
                 <p class="navbar-text pull-right">
                      Logged in as <a href="#" class="navbar-link">Username</a>
                 </p>
            </div>
                 <ul class="nav">
                       <li><a href='<?php echo site_url('reception/patient_management')?>'>Patients</a></li>
                       <li><a href='<?php echo site_url('reception/visit_management')?>'>Visits</a></li>
                       <li><a href='<?php echo site_url('home/do_logout')?>'> Logout</a></li>
                    </ul>
          </div>    
    </div>
<div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">

           <!-- <ul class="nav nav-list">
              <li class="nav-header">Active patients</li>
              <?php// foreach($patients as $active){?>
          
            <p>
             <?php// echo anchor('profile/details/'.$active['id']."/".$active['patientid'],$active['fname']." ".$active['lname']." ".$active['sname'])."</br>"; ?>
     <?php //}?>

</p> 

            </ul>-->

          </div><!--/.well -->
        </div><!--/span-->

         <div class="span9">
              <div class="hero-unit">

<?php 

$attributes = array('class' => '', 'id' => '');
echo form_open('cpatients', $attributes); ?>

<p>
        <label for="nationalid">Nationalid <span class="required">*</span></label>
        <?php echo form_error('nationalid'); ?>
        <br /><input id="nationalid" type="text" name="nationalid" maxlength="30" value="<?php echo set_value('nationalid'); ?>"  />
</p>

<p>
        <label for="first_name">first name <span class="required">*</span></label>
        <?php echo form_error('first_name'); ?>
        <br /><input id="first_name" type="text" name="first_name" maxlength="255" value="<?php echo set_value('first_name'); ?>"  />
</p>

<p>
        <label for="second_name">second name <span class="required">*</span></label>
        <?php echo form_error('second_name'); ?>
        <br /><input id="second_name" type="text" name="second_name" maxlength="255" value="<?php echo set_value('second_name'); ?>"  />
</p>

<p>
        <label for="third_name">third name <span class="required">*</span></label>
        <?php echo form_error('third_name'); ?>
        <br /><input id="third_name" type="text" name="third_name" maxlength="255" value="<?php echo set_value('third_name'); ?>"  />
</p>

<p>
        <label for="gender">gender <span class="required">*</span></label>
        <?php echo form_error('gender'); ?>
        
        <?php // Change the values in this array to populate your dropdown as required ?>
        <?php $options = array(
                                                  ''  => 'Please Select',
                                                  'example_value1'    => 'example option 1'
                                                ); ?>

        <br /><?php echo form_dropdown('gender', $options, set_value('gender'))?>
</p>                                             
                        
<p>
        <label for="residence">Residence <span class="required">*</span></label>
        <?php echo form_error('residence'); ?>
        <br /><input id="residence" type="text" name="residence" maxlength="255" value="<?php echo set_value('residence'); ?>"  />
</p>

<p>
        <label for="employment_status">employment status <span class="required">*</span></label>
        <?php echo form_error('employment_status'); ?>
        
        <?php // Change the values in this array to populate your dropdown as required ?>
        <?php $options = array(
                                                  ''  => 'Please Select',
                                                  'example_value1'    => 'example option 1'
                                                ); ?>

        <br /><?php echo form_dropdown('employment_status', $options, set_value('employment_status'))?>
</p>                                             
                        
<p>
        <label for="dob">Dob <span class="required">*</span></label>
        <?php echo form_error('dob'); ?>
        <br /><input id="dob" type="text" name="dob" maxlength="255" value="<?php echo set_value('dob'); ?>"  />
</p>

<p>
        <label for="marital_status">Marital status <span class="required">*</span></label>
        <?php echo form_error('marital_status'); ?>
        
        <?php // Change the values in this array to populate your dropdown as required ?>
        <?php $options = array(
                                                  ''  => 'Please Select',
                                                  'example_value1'    => 'example option 1'
                                                ); ?>

        <br /><?php echo form_dropdown('marital_status', $options, set_value('marital_status'))?>
</p>                       
                       
<p>
        <label for="city">City <span class="required">*</span></label>
        <?php echo form_error('city'); ?>
        <br /><input id="city" type="text" name="city" maxlength="255" value="<?php echo set_value('city'); ?>"  />
</p>

<p>
        <label for="address">Address <span class="required">*</span></label>
        <?php echo form_error('address'); ?>
        <br /><input id="address" type="text" name="address" maxlength="255" value="<?php echo set_value('address'); ?>"  />
</p>

<p>
        <label for="phone">phone <span class="required">*</span></label>
        <?php echo form_error('phone'); ?>
        <br /><input id="phone" type="text" name="phone" maxlength="34" value="<?php echo set_value('phone'); ?>"  />
</p>

<p>
        <label for="status">status <span class="required">*</span></label>
        <?php echo form_error('status'); ?>
        
        <?php // Change the values in this array to populate your dropdown as required ?>
        <?php $options = array(
                                                  ''  => 'Please Select',
                                                  'example_value1'    => 'example option 1'
                                                ); ?>

        <br /><?php echo form_dropdown('status', $options, set_value('status'))?>
</p>                                             
                        

<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>

<?php echo form_close(); ?>
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
            <script src="../assets/js/jquery.js"></script>
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
            <script src="../assets/js/bootstrap-typeahead.js"></script>
            
          </body>
        </html>