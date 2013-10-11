<html>
	<head>
    <title>Payments</title>
		<link rel="stylesheet" href="style.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>css/style.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery-ui.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/chosen-master/chosen/chosen.css" />
<script src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>
		<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
		<script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#frmactive").validate();
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
		
		//div.innerHTML = "Total : " +total ;
		
	}
</script>

	</head>
	<body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">

        <div class="container-fluid">
         
          <a class="brand" href='<?php echo site_url('reception') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/shwari.png" alt="Home"></a>
          <div class="nav-collapse collapse">

            <p class="navbar-text pull-right">
              Logged in as <a href="" class="navbar-link"><?php echo $this->session->userdata('type') ." ". $this->session->userdata('username');?></a>
          <a href='<?php echo site_url('home/do_logout')?>'><img src="<?php echo base_url()?>assets/img/logout.png" title="Logout"></a>
         <?php if($this->uri->segment(3)){ ?>
          
          <?php }?> 
        </p>
         <ul class="nav nav-tabs nav-pills">
        <li><a class="brand" href='<?php echo site_url('reception') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/Home1.png" alt="Home"></a></li>
        <li><a href="<?php echo base_url('recall/patient_management')?>"><img src="<?php echo base_url()?>assets/img/patient1.png" title="All patients"></a></li> <li><a href="<?php echo base_url()?>index.php/reception/viewpat"><img src="<?php echo base_url()?>assets/img/newpatients.png" title="add new patient"></a></li>
        <li><a href="<?php echo base_url()?>index.php/reception/appointment"><img src="<?php echo base_url()?>assets/img/appointment-new.png" title="Appointments"></a></li>
        <li><a href="<?php echo base_url()?>index.php/reception/visit"><img src="<?php echo base_url()?>assets/img/visits.png" title="visit for regular patients"></a></li>
        <li><a href="<?php echo base_url()?>reception/walkin_patient">Walk In Patient</a></li>

         </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
		<!--/span-->
		<div class="span9 well" style="margin-top: 200px; margin-left: 100px; width:1000px;">
			<div id="hom">
                 <form name="frmactive" id="frmactive" method="post" autocomplete="off" action="<?php echo base_url()?>reception/add_walkin">
                   <table class="table">
               <tr>
              <td>
                <br>
                <h4>
                  Walk In Patient
                </h4>
              </td>
              <td>
                <div class="control-group">
                  <label class="control-label">
                    Patient Name
                  </label>
                  <div class="controls">
                    <input type="text" name="patientname" id="patientname" value=""/>
                  </div>
                </div>
              </td>
              <td>
                <div class="control-group">
                  <label class="control-label">
                    Department
                  </label>
                  <div class="controls">
                    <select name="department">
                    <option value="Pharmacy">Pharmacy</option>
                    <option value="Lab Tech">Lab</option>

                    </select>
                  </div>
                </div>
              </td>
            </tr>
   
        </table>
          <button name="activate" type="submit" id="activate" class="btn btn-info pull-right">
          Add Walk In Patient
        </button>
				</form>
		</div>
		<!--/span-->
	</div>
	<!--/row-->
	<hr>
	 <footer >
            <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank"><font color=white>HealthStrat 2013</font></a></p>
          </footer>
</div>
 
	</body>
</html>
