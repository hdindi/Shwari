<html>
	<head>
    <title>Visit</title>
		<link rel="stylesheet" href="style.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>css/style.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery-ui.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/chosen.css" />
		<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>

		<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
		<script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
		<script src="<?php echo base_url()?>assets/js/chosen.jquery.js"></script>
       
        <script>
        jQuery(document).ready(function(){
	jQuery(".chzn-select").chosen();
});
</script>

 <script>
        $(document).ready(function(){
    $("#frmactive").validate();
  });
</script>
        <script>
function ChooseContact(data) {
    var mystr = data.value;
    var myarr = mystr.split("|");
    var myvar = myarr[0] + "|" + myarr[1];
    var n = myarr[0];
    var m = myarr[1];

document.getElementById("packageid").value = n;
document.getElementById("cost").value = m;
document.getElementById("total").value = m;


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
        <li><a href="<?php echo base_url('pats/patient_management')?>"><img src="<?php echo base_url()?>assets/img/patient1.png" title="All patients"></a></li> <li><a href="<?php echo base_url()?>index.php/reception/viewpat"><img src="<?php echo base_url()?>assets/img/newpatients.png" title="add new patient"></a></li>
        <li><a href="<?php echo base_url()?>index.php/reception/appointment"><img src="<?php echo base_url()?>assets/img/appointment-new.png" title="Appointments"></a></li>
        <li><a href="<?php echo base_url()?>index.php/reception/visit"><img src="<?php echo base_url()?>assets/img/visits.png" title="visit for regular patients"></a></li>
       
         </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
		<div class="span9 well" style="margin-top: 200px; margin-left: 50px; width:80em;">
			
			<!--/row-->
			<form id="frmactive" action="<?php echo base_url()?>reception/new_visit" method="post" onSubmit="return validateForm()" autocomplete="off">
				<table class="table">
					<tbody>
						<tr>
							<td>
								
								<div class="control-group">
									<label class="control-label">
										Patient Name
									</label>
									<div class="controls">
 							<select style="width:350px;" data-placeholder="Choose a patient..." class="chzn-select" tabindex="6" name="visitid" id="visitid" >
                <option ></option>							
									 <?php foreach($name as $name_types){?>
                              <option  value="<?php echo $name_types['id']?>" id="<?php echo $name_types['fname'] ?>" ><?php echo $name_types['fname']?>   <?php echo $name_types['sname']?>   <?php echo $name_types['lname']?></option>
                              <?php } ?></select>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="control-group">
									<label class="control-label">
										Package
									</label>
									<div class="controls">
					<select  style="width:350px;" data-placeholder="Select a Package..." class="chzn-select" tabindex="6" name="package" id="package" onChange="ChooseContact(this)" >											<option ></option>
							  <?php foreach($pack as $pack_types){?>
                              <option  value="<?php echo $pack_types['id']."|".$pack_types['cost'] ?>" id="<?php echo $pack_types['cost'] ?>" ><?php echo $pack_types['name']?> </option>
                             <?php  }?>
										</select>
									</div>
								</div>
							</td>
							<td>
                            <input type="hidden" name="packageid" id="packageid" value="" />
								<div class="control-group">
									<label class="control-label">
										Cost
									</label>
									<div class="controls">
										<input type="text" name="cost" id="cost" value="" disabled/>
                                        <input type="hidden" name="total" id="total" value="" />
									</div>
								</div>
							</td>
						</tr>
		<!--	<tr>
              <td>
                <br>
                <h4>
                  Mpesa Payment Option
                </h4>
              </td>
              <td>
                <div class="control-group">
                  <label class="control-label">
                    Mpesa Amount
                  </label>
                  <div class="controls">
                    <input type="number" name="cos" id="cos" min="0" value=""/>
                  </div>
                </div>
              </td>
              <td>
                <div class="control-group">
                  <label class="control-label">
                    Mpesa Code
                  </label>
                  <div class="controls">
                    <input type="text" id="Mpesa" name="Mpesa"/>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <br>
                <h4>
                  Cash Payment Option
                </h4>
              </td>
              <td>
                <div class="control-group">
                  <label class="control-label">
                    Cash Amount
                  </label>
                  <div class="controls">
                   <input type="number" id="cash" name="cash" min="0" value=""/>
                  </div>
                </div>
              </td>
            </tr>!-->
						<tr>
							<td>
								<button type="submit" class="btn btn-info pull-right" >
									Add Payment Information
								</button>
							</td>
						</tr>
						<tr>
						</tr>
					</tbody>
				</table>
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

<script>
function validateForm(inputtxt)
{
var x=document.forms["frmactive"]["visitid"].value;
if (x==null || x=="")
  {
  alert("Patients name must be filled out");
  return false;
  }
var y=document.forms["frmactive"]["packageid"].value;
if (y==null || y=="")
  {
  alert("Package field must be filled out");
  return false;
  }
  var z=document.forms["frmactive"]["cost"].value;
if (z==null || z=="")
  {
  alert("Cost must be filled out");
  return false;
  }
  
if (frmactive.cos.value == "" && frmactive.cash.value == "")
{
  // If null display and alert box
   alert("Please fill in Cash or Mpesa Payment.");
  // Place the cursor on the field for revision
  // frmactive.cos.focus();
  // return false to stop further processing
   return false;
}
else if (frmactive.cos.value != "" && frmactive.Mpesa.value == "")
{
  // If null display and alert box
   alert("Please enter the Mpesa code.");
  // Place the cursor on the field for revision
   frmactive.Mpesa.focus();
  // return false to stop further processing
   return false;
}


else if(frmactive.cos.value!=frmactive.cost.value)
{
	if(frmactive.cash.value==""){
		alert("Please check the money you have put in");
		return false;
		}
   if(frmactive.cash.value!=""){
	   var total=0;
	   total=Number(frmactive.cos.value)+Number(frmactive.cash.value);
	    if(frmactive.cost.value!=total){
			alert("Please confirm that you have enterred the correct amount of money ");
			return false;
			}

		}
	
	
		
}



var q=frmactive.Mpesa.value;
var reg = new RegExp("[D](?=[A-Z][0-9][0-9][A-Z][A-Z][0-9][0-9][0-9]|.)");
if (!reg.test(q)){
//alert("string contai");
alert("Please check the code you have enterred");
return false
}

}

</script>