<?php if($this->session->userdata('id')){
                 
    // redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Lab Technician</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/css/style.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/jquery-ui.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/chosen-master/chosen/chosen.css" />
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
    <script src="<?php echo base_url()?>assets/js/modernizr.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
     <script>
  $(function() {
  $( "#dialog" ).dialog({
  autoOpen: false,
  height: 500,
  width: 500,
  modal: true,
  buttons: {
  Done: function() {
  $( this ).dialog( "close" );
  }
  },
  close: function() {
  allFields.val( "" ).removeClass( "ui-state-error" );
  }
  });
  /*$( "#order_labs" )
  .button()
  .click(function() {
  $( "#dialog" ).dialog( "open" );
  });*/
  $( "#ordermore" )
  .button()
  .click(function() {
  $( "#dialog" ).dialog( "open" );
  });
  });
  </script>
    <script>
    $(function() {
    $( "#dialog-form" ).dialog({
    autoOpen: false,
    height: 500,
    width: 500,
    modal: true,
    buttons: {
    Done: function() {
    $( this ).dialog( "close" );
    }
    },
    close: function() {
    allFields.val( "" ).removeClass( "ui-state-error" );
    }
    });
    $( "#create-user" )
    .button()
    .click(function() {
    $( "#dialog-form" ).dialog( "open" );
    });
    });
    </script>
    <style type="text/css">
    body {
    padding-top: 135px;
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
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="?php echo base_url()?>assets/js/jquery.min.js"></script>
    <script>
    $(function() {
    $( "#accordion" ).accordion({
    collapsible: true,
	heightStyle: "content"
    });
    });
</script>
    <script>
    $(document).ready(function(){
    $("#triage").validate()
	  
    });
     $(function() {
	 $('#triage').submit(function (event) {
    dataString = $("#triage").serialize();
	var form=$(this);
	if(form.valid()){
    $.ajax({
    type:"POST",
    url:"<?php echo base_url() ?>lab_profile/add_results",
    data:dataString,
    success:function (data) {
	 alert('The results have been added');
	 document.location.reload(true);
	$("#dialog-form").dialog('destroy').remove();
    }
    });
    event.preventDefault();
    return false;
	}
    });
    });

    </script>
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <a class="brand" href='<?php echo site_url('lab_profile') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/shwari.png" alt="Home"></a>
        <div class="nav-collapse collapse">
          <p class="navbar-text pull-right">
           Logged in as <a href="#" class="navbar-link"><?php  echo $this->session->userdata('type') ." ". $this->session->userdata('username');?></a>
              <a href='<?php echo site_url('home/do_logout')?>'> <img src="<?php echo base_url()?>assets/img/logout.png" title="Logout"></a>
        </p></div>

         <ul class="nav">
          <li><a class="brand" href='<?php echo site_url('lab_profile')?>'title="Home"><img src="<?php echo base_url()?>assets/img/Home1.png" alt="Home"></a></li>
          <li><a href='<?php echo site_url('lab/tests')?>'><img src="<?php echo base_url()?>assets/img/laboratory.png" title="laboratory tests"></a></li>
         </ul><br/>

           <?php if($this->uri->segment(4)){?>
         <?php echo anchor('lab_profile/todoc/'.$this->uri->segment(3)."/", 'Send to Doctor','class="btn btn-success" type="button"'); ?>
         
      <?php foreach($names as $patientname){
		if(empty($patientname)){
			echo " ";
			}
		else{
		echo "<strong>".$patientname['fname']." ".$patientname['lname']." ".$patientname['sname']."</strong>";
		}
		}
       }?>
        
      </div>
    </div>
    
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span2">
          <div class="well sidebar-nav affix">
            <ul class="nav nav-list">
              <li class="nav-header">Patients in waiting</li>
              <?php if(!is_null($msg)){
              echo $msg;
              }
              else{
              ?>
              <?php foreach($patients as $active){?>
              <li>
                <?php echo anchor('lab_profile/details/'.$active['id']."/".$active['patientid'],$active['fname']." ".$active['lname']." ".$active['sname'])."</br>"; ?>
                <?php }?>
              </li>
              <?php } ?>
            </ul>
             <?php if($this->uri->segment(4)){?>
            <div class="alert">
            <table > 
          <?php foreach($names as $patientname){
              if(empty($patientname)){
                echo " ";
                }
              else{
              echo "<strong>".$patientname['fname']." ".$patientname['lname']." ".$patientname['sname']."</strong>";
              }}?>
          
              <th><p class="alert alert-error">Allergic to</p></th>
                  <?php
                       if($this->uri->segment(3))
                      {
                      foreach($alls as $ally){?>
                       <tr class="alert alert-error"><td><?php echo $ally['allergy'];?><td></tr>
                      <?php } }?>      
             </table>
                  </p>
              
           </div>
           <?php }?>
        
            </div><!--/.well -->
            </div><!--/span-->
            
            <div id="dialog-form" title="Lab Results">
              <p class="validateTips">All form fields are required.</p>
              <table>
              <?php if($this->uri->segment(3)){?>
              <form id="triage" class="form" onSubmit="return validateResults()">
               <input type="hidden" name="visitid" value="<?php echo $this->uri->segment(3)?>">
                 <tr>
                 <td><label for="lab_results">Lab Test</label></td>
                  <td><select data-placeholder="Lab Tests" style="width:350px;" class="chzn-select" tabindex="6" name="test" id="test" required>
                         <option value=""></option>
                          <?php foreach($tested as $test_details){?>
                          <option value="<?php echo $test_details['test'];?>" ><?php echo $test_details['test'];?></option>
                       <?php 
							  
					}?>
                          </select>  </td>
                         
                 </tr>
                 <tr>
                 <td><label for="lab_results">Lab Results</label></td>
                <td><textarea rows="5" cols="70" name="lab_results" id="lab_results" required></textarea></td>
                
                </tr>
                        
          <tr>
              <td> <input type="submit" name="save" value="Update test Results" class="btn btn-success"></td>
               </tr>
              </form>
			   <?php 
			  }?>
              </table>
            </div>
            <div id="dialog" title="Order Lab">
                  <p class="validateTips">All form fields are required.</p>
                  <table id="visit">
                    
                   <form autocomplete="off" onSubmit="return validateLabs()" id="labs" class="labs">
                    
                    <input type="hidden" name="visitid" value="<?php echo $this->uri->segment(3);?>">
                    <input type="hidden" id="tested" name="tested" value="1" />
                        Lab Tests<span class="form-required">*</span>
                    <select data-placeholder="Lab Tests" style="width:350px;" class="chzn-select"multiple tabindex="6" name="test[]" required >
                      <option value=""></option>
                      <?php foreach ($all_tests as $lab_tests){?>
                      <option value="<?php echo $lab_tests['name']; ?>"><?php echo $lab_tests['name'] ;?></option>
                      <?php  }?>
                    </select>
                    <input type="submit" name="save" value="Send to Lab" class="btn btn-warning">
                    
                </form>                 
             </table>
                </div>
            <div class="span10">
              <div class="hero-unit">
                <div id="accordion"><!--accordion begin-->
                <h3>Bio Data</h3>
                <div>
                  
                  <?php
                  if($this->uri->segment(3))
                  {
                  foreach($bio_data as $visit_info){
                  
                  ?>
                  <?php
                  $dob =  $visit_info['dob'];
                  $age = date_diff(date_create($dob), date_create('now'))->y;
                  $ids =$this->uri->segment(3);
                  if ($age <= 0){ $bage = date_diff(date_create($dob), date_create('now'))->d; $nage=$bage." Days"; }
                    elseif ($age > 0) { $nage = $age." Years"; }
                  //replace  $visit_info['dob'] with $age
                  ?>
                  <table class="table table-striped">
                    <tr>
                      <td>Patient Name:</td><td><?php echo $visit_info['fname']." ".$visit_info['lname']." ".$visit_info['sname'];?></td>
                    </tr>
                    
                    <tr>
                      <td>Age:</td><td><?php echo $nage;?></td>
                    </tr>
                    
                    <tr>
                      <td>Residence:</td><td><?php echo $visit_info['address'];?></td>
                    </tr>
                  </table>
                 
                  <?php } ?>
                  
                  <?php } ?>
                </div>
                
                  <h3>Patient Consultation</h3>
     <div>
     <?php if($this->uri->segment(3)){?>
      <table class="table table-bordered">
       <th>Doctor's Name</th>
       <th>Complaints</th>
       <th>Past Medical History</th>
       <th>Systemic Inquiry</th>
       <th>Examination Findings</th>
       <th>Diagnosis</th>
      <tr>
       
     <?php foreach($consultation as $current){?>
     <?php if(empty($current)){
		 echo "No data";
		 }else{?>

		  <tr class="success">
       <td><?php echo $current['Fname']." ".$current['Sname']." ".$current['Lname'];?></td>
       <td><?php echo $current['complaints'];?></td>
       <td><?php echo $current['med_history'];?></td>
       <td><?php echo $current['systemic_inquiry'];?></td>
       <td><?php echo $current['examination_findings'];?></td>
       <td><?php echo $current['diagnosis'];?></td>
       
    </tr>
       </table>
		<?php }
	 }
	}?>
   </div>
               <h3>Lab Test Requested</h3>
                <div>
               <?php echo $this->load->view($view);?>
                </div>
                
                </div><!--accordion--><br/>
                 

              </div>
              
              </div><!--/span-->
            </div>
            <footer >
            <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank"><font color = white>HealthStrat 2013</font></a></p>
          </footer>
 
            </div><!--container fluid-->
			<script src="<?php echo base_url()?>assets/chosen-master/chosen/chosen.jquery.js" type="text/javascript"></script>
           <script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
            <script type="text/javascript">
        <!--
        function un_check(){
     for (var i = 0; i < document.frmactive.elements.length; i++) {
      var e = document.frmactive.elements[i];
         if ((e.name != 'allbox') && (e.type == 'checkbox')) {
        e.checked = document.frmactive.allbox.checked;
        }}}
        //-->
        </script>
  <script type="text/javascript">
   function calculate() {
        var el, i = 0;
		var total = 0;
		while(el = document.getElementsByName("chk[]")[i++]) {
			  var mystr = el.value;
    		  var myarr = mystr.split("|");
              var myvar = myarr[0] + "|" + myarr[1];
              var n = myarr[0];
              var m = myarr[1];
			 // 
		if(el.checked) { total= total + Number(m);
		}
		}
		//alert(total);
		document.getElementById("total").value = total;
		document.getElementById("cost").value = total;
		
		//div.innerHTML = "Total : " +total ;
		
	}
</script>
 <script>
 
    $(function() {
    $('#labs').submit(function (event) {
    dataString = $("#labs").serialize();
	$.ajax({
    type:"POST",
    url:"<?php echo base_url() ?>lab_profile/tolab",
    data:dataString,
    success:function (data) {
    alert('Labs have been added');
    document.location.reload(true);
    $("#labs").dialog('destroy').remove();
    }
    });
    event.preventDefault();
	    return false;
	

    });
    });
  </script>

  <script>
function validateLabs()
{
  var x=document.forms["labs"]["test[]"].value;
  if (x==null || x=="")
  {
  alert("Please choose a medicine");
  return false;
  }
}
</script>
 <script>
function validateResults()
{
  var z=document.forms["triage"]["test"].value;
  if (z==null || z=="")
  {
  alert("Please choose a test");
  return false;
  }
  var y=document.forms["triage"]["lab_results"].value;
  if (y==null || y=="")
  {
  alert("Please enter lab results");
  return false;
  }
}
</script>
<!--<script>
  $(function() {
  $('#dispense').submit(function (event) {
  dataString = $("#dispense").serialize();
  $.ajax({
  type:"POST",
  url:"<?php echo base_url()?>lab_profile/torep",
  data:dataString,
  success:function (data) {
  alert('The payment Information has been added');
  document.location.reload(true);
  }
  });
  event.preventDefault();
  return false;
  
  });
  });
  
  </script>!-->
          </body>
        </html>