<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><!DOCTYPE html>
<html lang="en"><head>
  <meta charset="utf-8" />
  <title>Patient infomation</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <style type="text/css">
  body {
  padding-top: 150px;
  padding-bottom: 40px;
  }
  .sidebar-nav {
  padding: 9px 0;
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
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/style.css" />
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery-ui.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/chosen-master/chosen/chosen.css" />
  <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
  <script src="<?php echo base_url()?>assets/js/modernizr.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/tiny_mce/tiny_mce.js"></script>
  
<script>
tinymce.init({
    mode : "textareas",
    theme : "advanced",
    plugins: "lists" 
    //toolbar1: " bullist numlist",
   
   /* templates: [
        
        {title: 'Test template 2', content: 'Test 2'}
    ],*/
});

</script>
	
  <script>
  $(function() {
  $( "#accordion" ).accordion({
  collapsible: true,
  heightStyle: "content"
  });
  });
  </script>
  <script>
  $(function() {
  $( "#appointment" ).dialog({
  autoOpen: false,
  height: 600,
  width: 600,
  modal: true,
  buttons: {
  Cancel: function() {
  $( this ).dialog( "close" );
  }
  },
  close: function() {
  allFields.val( "" ).removeClass( "ui-state-error" );
  }
  });
  $( "#make" )
  .button()
  .click(function() {
  $( "#appointment" ).dialog( "open" );
  });
  });

  </script>
  <style type="text/css">
  body {
  padding-top: 150px;
  padding-bottom: 40px;
  }
  .sidebar-nav {
  padding: 9px 0;
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
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>
<style type="text/css">
label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }
</style>
	
</head>
<body>

  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
     <a class="brand" href='<?php echo site_url('profile') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/shwari.png" alt="Home"></a>
      <div class="nav-collapse collapse">
        <p class="navbar-text pull-right">
        Logged in as <a href="#" class="navbar-link"><?php  echo $this->session->userdata('type') ." ". $this->session->userdata('username');?></a>
        <a href='<?php echo site_url('home/do_logout')?>'> <img src="<?php echo base_url()?>assets/img/logout.png" title="Logout"></a>
        <br/>
  </p>
      </div>
      <ul class="nav">
        <li><a href='<?php echo site_url('profile')?>'><img src="<?php echo base_url()?>assets/img/Home1.png" alt="Home"></a></li>-->
        
        
      </ul>
      
    </div>
  </div>

 <div class="container-fluid">
    <div class="row-fluid">

     
         

          
          <div class="span15">
            <div class="hero-unit">
              <button id="make" class="btn btn-small btn-info">Make An Appointment</button>

              <div id="accordion">



                      <h3>Bio Data</h3>
                <div>
             <?php
                      if($this->uri->segment(3))
                      {
                      foreach($patient_info as $bio_data){
						  if(empty($bio_data['fname'])){
							  echo "No Bio Data";
							  }
					else{
                        
                  ?>
                  <?php
                  $dob =  $bio_data['dob'];
                  $age = date_diff(date_create($dob), date_create('now'))->y;
                  $ids =$this->uri->segment(3);
                  if ($age <= 0){ $bage = date_diff(date_create($dob), date_create('now'))->d; $nage=$bage." Days Old"; }
                    elseif ($age > 0) { $nage = $age." Years Old"; }
                  //replace  $visit_info['dob'] with $age
                  ?>
                  <table class="table table-striped" >
                    <tr>
                      <td>Patient Name:</td><td><?php echo $bio_data['fname']." ".$bio_data['lname']." ".$bio_data['sname'];?></td>
                    </tr>
                    
                    <tr>
                      <td>Age:</td><td><?php echo $nage;?></td>
                    </tr>
                    
                    <tr>
                     <td>Residence:</td><td><?php echo $bio_data['residence'];?></td>
                    </tr>
                  </table>
                  
                 
                  <?php }
					  }
					  }?>
                </div>

          
                       <h3>Patient Triage History</h3>
                       <div>

                        <table class="table table-bordered">
                 <tr>           
                      <td>Nurse Name</td>
                       <td><font color=blue>Blood pressure (mmHg)</font></td>
                       <td><font color=blue>Temperature (°C)</font></td>
                       <td><font color=blue>Height (M)</font></td>
                       <td><font color=blue>Weight (KGs)</font></td>
                       <td><font color=blue>BMI</font></td>
                       <td><font color=blue>Allergies </font>
                  </tr>
                      <?php if($this->uri->segment(3)){?>
                  
                      <?php foreach ($triage_history as $history){
              if(empty($history['id'])){
                echo "This patient has no previous history";
                }
               else{
               $vdate = date('l jS \of F Y ',strtotime($history['visitdate']));
                 ?>
                     <tr class="success">
                      <td><?php echo $history['fname']." ".$history['lname'];?></td>  
                      <td> <?php echo $history['diastle']."/". $history['systle'];?></td> 
                      <td><?php echo $history['Temperature'];?></td> 
                      <td><?php echo $history['Height'];?></td> 
                      <td><?php echo $history['Weight'];?></td> 
                      <td><?php $weight=$history['Weight'];
                        $height=$history['Height'];
                        $new_height=$height*$height;
                        $BMI=$weight/$new_height;
                        // echo round($BMI,2); ?>
                       <?php 
                        if($BMI <= 20){?>
                           <font color=orange><?php echo round($BMI,2)?> </font> 
                       <?php }?>

                       <?php 
                        if($BMI >= 25){?>
                            <font color=red><?php echo round($BMI,2)?></font> 
                       <?php }?>

                       <?php 
                        if($BMI >= 21 && $BMI <= 24){?>
                            <font color=green><?php echo round($BMI,2)?></font> 
                       <?php }?></td>
                       <td> 
                       <?php// echo $visit_history['allergies'];?>
                       </td>
                     </tr>
                    
                
                  <?php }?>
                  <?php }?>
                <?php }?>
                           
                </table>
                </div>
                          

                      <h3>Patient Consultation</h3>
              <div>
                <table class="table table-bordered">
                   <tr>
                    <th>Consultation Date</th>
                     <th>Doctor Name</th>
                     <th>complaints</th>
                     <th>Working Diagnosis</th>
                     <th>Lab tests
                     (Lab Results)</th>
                    </tr>
                <?php foreach($consults as $previous_data){?>
                
                  
                    <tr class="warning">
                      <td><?php echo $previous_data['date']; ?></td>
                      <td><?php echo $previous_data['fname']." ".$previous_data['lname'];?></td>
                      <td><?php echo $previous_data['complaints'];?></td>
                      <td><?php echo $previous_data['working_diagnosis']; ?></td>  
                      
                     <?php foreach($test_details as $tests){
						  if(empty($tests['test'])){
							  echo "You did not order any tests";
							  }
							 else{
								?>
                               <td><?php  echo $tests['test'];?>(
                               <?php  echo $tests['result'];?>)</td>
                    
                                
								<?php }
					  			}?>
              
            <?php }?>
                    </tr> 
               
                  </table>
                </div>
                       
            </div><!--accordion-->
                </div><!--hero unit-->
                </div><!--span9-->
                  
              <?php if($this->uri->segment(3)){?> 
             <div id="appointment" title="Make appointment">
              
                     
                  <table>
                    <p class="validateTips">All form fields are required.</p>
                   
                   <form id="appoints" class="form_data">
                      <tr>
                   
                      <input type="hidden" name="patientid" value="<?php echo $this->uri->segment(3)?>">
                       <input type="hidden" name="visitid" value="<?php//echo $active['id']?>">
                      <td><label for="Date">Date:</label></td>
                      <td><input type="text" id="datepicker" name="Date" class="required"></td>
                      <td><label for="Time">Time:</label></td>
                      <td><input type="text" id="time" name="Time" class="required"></td>
                      </tr>
                      <tr>
                        <td><label for="Title">Title:</label></td>
                        <td> <input type="text" name="Title" id="title" class="required" /></td>
                      </tr>
                      <tr>
                        <td><label for="About">About:</label></td>
                        <td><textarea name="About" id= "About" class="required" /></textarea></td>
                      </tr>
                     <tr>
                    <td></td>
                    <td><input type="submit" name="save" value="Save Appointment" class="btn btn-small btn-info"/></td>
                   </tr>
                   </form>
                  </table>
                   
                </div>

                
                <?php } ?>
               
              </div>
                <!--/span-->
                <footer >
            <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank">HealthStrat 2013</p>
          </footer>
                </div>
                <!--container fluid-->
                
                
              </body>
            </html>