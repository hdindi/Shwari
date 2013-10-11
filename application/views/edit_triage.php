<?php if($this->session->userdata('id')){
                 
    // redirect('/adminhome');
    
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
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery-ui.css" />
<link rel="stylesheet" href="/resources/demos/style.css" />
</head>

<body>
  
	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
    <a class="brand" href='<?php echo site_url('pharm_profile') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/shwari.png" alt="Home"></a>

    <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link"><?php  echo $this->session->userdata('type') ." ". $this->session->userdata('username');?></a>
              <a href='<?php echo site_url('home/do_logout')?>'> <img src="<?php echo base_url()?>assets/img/logout.png" title="Logout"></a>
              <br/>
                <?php if($this->uri->segment(4)){?>
      <?php echo anchor('pharm_profile/finish/'.$this->uri->segment(3)."/", 'Release patient','class="btn btn-danger" type="button"'); 
       echo anchor('pharm_profile/tonur/'.$this->uri->segment(3)."/", 'Send to nurse','class="btn btn-warning" type="button"'); ?>
      
 
			<?php	}?> 
   
            </p></div>
   <ul class="nav">
     <li><a class="brand" href='<?php echo site_url('pharm_profile') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/Home1.png" alt="Home"></a></li>
     <li><a href='<?php echo site_url('phamarcy/add_medicine')?>'><img src="<?php echo base_url()?>assets/img/medical_pot.png" title="Add medicines"></a></li>
    <li><a href='<?php echo site_url('pharm_profile/history')?>'><img src="<?php echo base_url()?>assets/img/presc_hist.png" title="Prescription History"></a></li>  
    <li><a href='<?php echo site_url('pharm_profile/reorders')?>'><img src="<?php echo base_url()?>assets/img/Drugreorder.png" title="Drug reorder"></a></li>   
 
  </ul>

   <div class="nav-collapse collapse" >
    <?php if($this->uri->segment(4)){?>
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
	</div>
	<div class="container-fluid">
      <div class="row-fluid ">

        <div class="span2 ">
          <div class="well sidebar-nav affix">
            <ul class="nav nav-list" id="load">
              <li class="nav-header">Patients in waiting</li>
             
            <?php if(!is_null($msg)){
				   echo $msg;
			   }
			   else{
				   ?>
              <?php foreach($patients as $active){?>
                    <li> 
                    <?php echo anchor('pharm_profile/details/'.$active['id']."/".$active['patientid'],$active['fname']." ".$active['lname']." ".$active['sname'])."</br>"; ?>
                  </li>
                    <?php }}?>
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
           <?php } ?> 
           
          </div><!--/.well -->
        </div><!--/span-->
 <div class="span10">
          <div class="hero-unit">       
         		<form action="<?php echo base_url()?>pharm_profile/change" method="post">

                 <table>
                 <tr>
                 <input type="hidden" name="visitid" value="<?php echo $this->uri->segment(3)?>">
                 <input type="hidden" name="id" value="<?php echo $this->uri->segment(5)?>">
				 <td><label for="name">Medicine Name:</label></td> 
                 <td><select data-placeholder="Medicine Name" style="width:350px;" class="chzn-select" tabindex="6" name="medname">
                 <option value=""></option>
                  <?php foreach($medicine as $med_types){?>
                  
                  <option value="<?php echo $med_types['code']?>" ><?php echo $med_types['Medicine_name'].'( '.$med_types['strength'].' , '.$med_types['units'].' )'?>
                  </option>
                   <?php } ?>
                  </select></td>
                 </tr>
                 <tr>
                 <td><label for="dosage">Drug Dosage</label></td>
                 <?php foreach($edit as $now){?>
                 <td><input type="text" name="dosage" class="required" style="width:200px;" value="<?php echo $now['dosage'] ?>"></td>                                                  </tr>
                 </tr>
                 <tr>
                 <td><label for="duration">Duration</label>  </td>
                 <td><input type="text"style="width:200px;" name="duration" value="<?php echo $now['duration']?>">
                 </tr>
                  <tr>
                 <td><label for="duration">Quantity</label>  </td>
                 <td><input type="text"style="width:200px;" name="duration" value="<?php echo $now['amount']?>">
                 </tr>
                 <tr>
                 <td><label for="remarks">Dosage Remarks:</label></td>
                 <td><textarea name="remarks" rows="5" cols="20"><?php echo $now['remarks']?></textarea></td>
                  <?php }?>
                 </tr>
                 <tr>
                 <td><input type="submit" name="Save" value="Edit Prescription" class="btn btn-primary"/></td>
                 <td><input type="reset" name="reset" value="Cancel"></td>
                 </tr>
                 </table>
                 
                 </form>
    

  
     
   </div>
 </div>
        </div>

        
        <footer >
   <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank"><font color=white>HealthStrat 2013</font></a></p>
          </footer>

    </div><!--container fluid-->

<script src="<?php echo base_url()?>assets/chosen-master/chosen/chosen.jquery.js" type="text/javascript"></script>
  <script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
      <!-- Le javascript
    ================================================== -->
   <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>


 <script>
 $(function() {
$( "#accordion" ).accordion({
  collapsible: true,
  heightStyle: "content" 
  });
});
 
 </script> 
 <script src="jquery.js"></script>
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


<script>
  $(function() {
  $('#edit_prescription').submit(function (event) {
  dataString = $("#edit_prescrition").serialize();
  $.ajax({
  type:"POST",
  url:"<?php echo base_url()?>pharm_profile/change",
  data:dataString,
  success:function (data) {
  alert('The patient has been refered');
  
  // $("#final_diagnosis").hide();
   document.location.reload(true);
  $("#refer").dialog('destroy').remove();
  }
  
  });
  event.preventDefault();
  return false;
  });
  });
  
  </script>
  <script type="text/javascript">
$(document).ready(function(){
    $("#dispense").validate();
  });

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
  $( "#presc" ).button()
  .click(function() {
  $( "#dialog" ).dialog( "open" );
  });
  });
  </script>
</body>

</html>
