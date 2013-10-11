<?php if($this->session->userdata('id')){
                 
    // redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Immunization</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/style.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery-ui.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/chosen-master/chosen/chosen.css" />
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
   
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css" media="screen"/>
    <script src="?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="?php echo base_url()?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/modernizr.js"></script>


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
<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
//echo form_open('immunizations', $attributes); ?>
<form>
<fieldset>
<legend>BCG VACCINE</legend>
<table>
<tr>
<th>BCG VACCINE:at birth</th>
<th>Date Given</th>
<th>Date of Next Visit</th>
</tr>
<tr>
<td>Intra-dermal left fore arm</td>
<tr>
<tr>
<p>
       <td> <label for="dose">Dose:(0.05mls for child below 1 year)</label></td>
        <?php echo form_error('dose'); ?>
        <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose'); ?>"  /></td>
        <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose'); ?>"  /></td>
</p>
</tr>
<tr>
<p>
        <td><label for="">Dose:(0.1 mls for child above 1 year)</label></td>
        <?php echo form_error(''); ?>
        <td><input id="" type="text" name=""  value="<?php echo set_value(''); ?>"  /></td>
        <td><input id="" type="text" name=""  value="<?php echo set_value(''); ?>"  /></td>
</p>
</tr>
<tr>
<p>
       <td> <label for="">BCG-Scar checked</label></td>
        <?php echo form_error(''); ?>
        <td><input id="" type="text" name=""  value="<?php echo set_value(''); ?>"  /></td>
        <td><input id="" type="text" name=""  value="<?php echo set_value(''); ?>"  /></td>
</p>
</tr>
<tr>
<p>
        <td><label for="">PRESENT</label></td>
        <?php echo form_error(''); ?>
        <td><input id="" type="text" name=""  value="<?php echo set_value(''); ?>"  /></td>
        <td><input id="" type="text" name=""  value="<?php echo set_value(''); ?>"  /></td>
</p>
</tr>
<tr>
<p>
        <td><label for="255">ABSENT</label></td>
        <?php echo form_error('255'); ?>
        <td><input id="255" type="text" name="255"  value="<?php echo set_value(''); ?>"  /></td>
        <td><input id="" type="text" name=""  value="<?php echo set_value(''); ?>"  /></td>
</p>
</tr>

<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>
</table>
</fieldset>
<?php //echo form_close(); ?>
</form>
</div>
<div>
<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
?>
<form>
<fieldset>
<legend>POLIO VACCINE</legend>
<table>
<tr>
<th>ORAL POLIO VACCINE(OPV)</th>
<th>Date Given</th>
<th>Date of Next Visit</th>
</tr>
<tr>
<td>Dose:2 drops orally</td>
<tr>
<tr>
<p>
       <td> <label for="dose">Birth Dose:at birth or within 2 weeks(OPV O)</label></td>
        <?php echo form_error('dose'); ?>
        <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose'); ?>"  /></td>
        <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose'); ?>"  /></td>
</p>
</tr>
<tr>
<p>
        <td><label for="">1st dose at 6 weeks(OPV 1)</label></td>
        <?php echo form_error(''); ?>
        <td><input id="" type="text" name=""  value="<?php echo set_value(''); ?>"  /></td>
        <td><input id="" type="text" name=""  value="<?php echo set_value(''); ?>"  /></td>
</p>
</tr>
<tr>
<p>
       <td> <label for="">2nd dose at 10 weeks(OPV 2)</label></td>
        <?php echo form_error(''); ?>
        <td><input id="" type="text" name=""  value="<?php echo set_value(''); ?>"  /></td>
        <td><input id="" type="text" name=""  value="<?php echo set_value(''); ?>"  /></td>
</p>
</tr>
<tr>
<p>
        <td><label for="">3rd dose at 14 weeks(OPV 3)</label></td>
        <?php echo form_error(''); ?>
        <td><input id="" type="text" name=""  value="<?php echo set_value(''); ?>"  /></td>
        <td><input id="" type="text" name=""  value="<?php echo set_value(''); ?>"  /></td>
</p>
</tr>
<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>
</table>
</fieldset>
<?php //echo form_close(); ?>
</form>
</div>
<div>
<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
//echo form_open('diptheria', $attributes); ?>
<form>
<fieldset>
<legend>Diptheria</legend>
<table>
<tr>
<th>DIPTHERIA/PERTUSSIS/TETANUS/HEPATITIS B/HAEMOPHILUS Type b</th>
<th>Date Given</th>
<th>Date of Next Visit</th>
</tr>
<tr>
<td>Dose:(0.5 mls) Intra Muscular left outer thigh</td>
<tr>
<tr>
<p>
       <td> <label for="dose">1st dose at 6 weeks</label></td>
        <?php echo form_error('dose'); ?>
        <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose'); ?>"  /></td>
        <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose'); ?>"  /></td>
</p>
</tr>
<tr>
<p>
        <td><label for="">2nd dose at 10 weeks</label></td>
        <?php echo form_error(''); ?>
        <td><input id="" type="text" name=""  value="<?php echo set_value(''); ?>"  /></td>
        <td><input id="" type="text" name=""  value="<?php echo set_value(''); ?>"  /></td>
</p>
</tr>
<tr>
<p>
       <td> <label for="">3rd dose at 14 weeks</label></td>
        <?php echo form_error(''); ?>
        <td><input id="" type="text" name=""  value="<?php echo set_value(''); ?>"  /></td>
        <td><input id="" type="text" name=""  value="<?php echo set_value(''); ?>"  /></td>
</p>
</tr>
>
<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>
</table>
</fieldset>
<?php //echo form_close(); ?>
</form>

</div>
<div>
<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
//echo form_open('Pneumococcal', $attributes); ?>
<form>
<fieldset>
<legend>Pneumococcal Vaccine</legend>
<table>
<tr>
<th>PNEUMOCOCCAL VACCINE</th>
<th>Date Given</th>
<th>Date of Next Visit</th>
</tr>
<tr>
<td>Dose:(0.5 mls) Intra Muscular right outer thigh</td>
<tr>
<tr>
<p>
       <td> <label for="dose">1st dose at 6 weeks</label></td>
        <?php echo form_error('dose'); ?>
        <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose'); ?>"  /></td>
        <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose'); ?>"  /></td>
</p>
</tr>
<tr>
<p>
        <td><label for="">2nd dose at 10 weeks</label></td>
        <?php echo form_error(''); ?>
        <td><input id="" type="text" name=""  value="<?php echo set_value(''); ?>"  /></td>
        <td><input id="" type="text" name=""  value="<?php echo set_value(''); ?>"  /></td>
</p>
</tr>
<tr>
<p>
       <td> <label for="">3rd dose at 14 weeks</label></td>
        <?php echo form_error(''); ?>
        <td><input id="" type="text" name=""  value="<?php echo set_value(''); ?>"  /></td>
        <td><input id="" type="text" name=""  value="<?php echo set_value(''); ?>"  /></td>
</p>
</tr>
<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>
</table>
</fieldset>
<?php //echo form_close(); ?>
</form>

</div>
<div>
<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
//echo form_open('rotarix', $attributes); ?>
<form>
<fieldset>
<legend>ROTA VIRUS VACCINE(ROTARIX)</legend>
<table>
<tr>
<th>ROTA VIRUS VACCINE(ROTARIX)</th>
<th>Date Given</th>
<th>Date of Next Visit</th>
</tr>
<tr>
<td>Dose:1.5 mls orally </td>
<tr>
<tr>
<p>
       <td> <label for="dose">1st dose at 6 weeks</label></td>
        <?php echo form_error('dose'); ?>
        <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose'); ?>"  /></td>
        <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose'); ?>"  /></td>
</p>
</tr>
<tr>
<p>
        <td><label for="">2nd dose at 10 weeks</label></td>
        <?php echo form_error(''); ?>
        <td><input id="" type="text" name=""  value="<?php echo set_value(''); ?>"  /></td>
        <td><input id="" type="text" name=""  value="<?php echo set_value(''); ?>"  /></td>
</p>
</tr>

<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>
</table>
</fieldset>
<?php //echo form_close(); ?>
</form>

</div>
<div>
<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
//echo form_open('rotarix', $attributes); ?>
<form>
<fieldset>
<legend>Measles Vaccine at 6 months</legend>
<table>
<tr>
<th>Measles Vaccine at 6 months: In the event of Measles outbreak or HIV Exposed children(HEI)</th>
<th>Date Given</th>
</tr>
<tr>
<p>
       <td> <label for="dose">Dose:(0.5 mls)Subctaneously right upper arm</label></td>
        <?php echo form_error('dose'); ?>
        <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose'); ?>"  /></td>
</p>
</tr>
<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>
</table>
</fieldset>
<?php //echo form_close(); ?>
</form>

</div>
<div>
<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
//echo form_open('rotarix', $attributes); ?>
<form>
<fieldset>
<legend>Measles Vaccine at 9 months</legend>
<table>
<tr>
<th>Measles Vaccine at 9 months</th>
<th>Date Given</th>
</tr>
<tr>
<p>
       <td> <label for="dose">Dose:(0.5 mls)Subctaneously right upper arm</label></td>
        <?php echo form_error('dose'); ?>
        <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose'); ?>"  /></td>
</p>
</tr>
<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>
</table>
</fieldset>
<?php //echo form_close(); ?>
</form>
</div>
<div>
<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
//echo form_open('rotarix', $attributes); ?>
<form>
<fieldset>
<legend>Measles Vaccine at 18 months</legend>
<table>
<tr>
<th>Measles Vaccine at 18 months</th>
<th>Date Given</th>
</tr>
<tr>
<p>
       <td> <label for="dose">Dose:(0.5 mls)Subctaneously right upper arm</label></td>
        <?php echo form_error('dose'); ?>
        <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose'); ?>"  /></td>
</p>
</tr>
<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>
</table>
</fieldset>
<?php //echo form_close(); ?>
</form>
</div>
<div>
<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
//echo form_open('rotarix', $attributes); ?>
<form>
<fieldset>
<legend>Yellow Fever Vaccine</legend>
<table>
<tr>
<th>YELLOW FEVER VACCINE</th>
<th>Date Given</th>
</tr>
<tr>
<p>
       <td> <label for="dose">Dose:(0.5 mls)Intra Muscular left upper deltoid</label></td>
        <?php echo form_error('dose'); ?>
        <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose'); ?>"  /></td>
</p>
</tr>
<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>
</table>
</fieldset>
<?php //echo form_close(); ?>
</form>
</div>
<div>
<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
//echo form_open('rotarix', $attributes); ?>
<form>
<fieldset>
<legend>Other Vaccines</legend>
<table>
<tr>
<th>Vaccine</th>
<th>Date Given</th>
</tr>
<tr>
<p>
       <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose');?>"></td>
        <?php echo form_error('dose'); ?>
        <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose'); ?>"  /></td>
</p>
</tr>
<tr>
<p>
       <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose');?>"></td>
        <?php echo form_error('dose'); ?>
        <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose'); ?>"  /></td>
</p>
</tr>
<tr>
<p>
       <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose');?>"></td>
        <?php echo form_error('dose'); ?>
        <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose'); ?>"  /></td>
</p>
</tr>
<tr>
<p>
       <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose');?>"></td>
        <?php echo form_error('dose'); ?>
        <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose'); ?>"  /></td>
</p>
</tr>
<tr>
<p>
       <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose');?>"></td>
        <?php echo form_error('dose'); ?>
        <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose'); ?>"  /></td>
</p>
</tr>
<tr>
<p>
       <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose');?>"></td>
        <?php echo form_error('dose'); ?>
        <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose'); ?>"  /></td>
</p>
</tr>
<tr>
<p>
       <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose');?>"></td>
        <?php echo form_error('dose'); ?>
        <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose'); ?>"  /></td>
</p>
</tr>
<tr>
<p>
       <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose');?>"></td>
        <?php echo form_error('dose'); ?>
        <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose'); ?>"  /></td>
</p>
</tr>
<tr>
<p>
       <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose');?>"></td>
        <?php echo form_error('dose'); ?>
        <td><input id="dose" type="text" name="dose"  value="<?php echo set_value('dose'); ?>"  /></td>
</p>
<td>
<p>NB: Other vaccines refer to those not in the usual KEPI schedule and may include MMR, Typhoid etc.
</p>
</td>
</tr>


<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>
</table>
</fieldset>
<?php //echo form_close(); ?>
</form>



                </div><!--/span-->
                  
          <footer >
            <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank"><font color=white>HealthStrat 2013</font></a></p>
          </footer>
          </div><!--container fluid-->
           </body>
      </html>