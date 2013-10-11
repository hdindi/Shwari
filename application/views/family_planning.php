<?php if($this->session->userdata('id')){
                 
    // redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Family planning</title>
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

    <style type="text/css" >
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
echo form_open('family_planning', $attributes); ?>
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

<fieldset><legend>Family planning</legend>
<table>

        <tr><td>
        <label for="date">Date <span class="required">*</span></label></td><td>
        <?php echo form_error('date'); ?>
        <input id="date" type="text" name="date"  value="<?php echo set_value('date'); ?>"  />
        </td></tr>

        <tr><td>
        <label for="clinical_note">Clinical_note <span class="required">*</span></label></td><td>
        <?php echo form_error('clinical_note'); ?>
        <input id="clinical_note" type="text" name="clinical_note" maxlength="255" value="<?php echo set_value('clinical_note'); ?>"  />
        </td></tr>

        <tr><td>
        <label for="next_visit">Next_visit <span class="required">*</span></label></td><td>
        <?php echo form_error('next_visit'); ?>
        <input id="next_visit" type="text" name="next_visit"  value="<?php echo set_value('next_visit'); ?>"  />
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