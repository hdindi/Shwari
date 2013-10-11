<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><html>
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
<script>
	$('#MpesaCode').hide();
	function payment(this){
		var mystr=data.value;
		if(mystr=="Mpesa")
		{
			$("#MpesaCode").show();
		}
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
        
         </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
		<!--/span-->
		<div class="span13 well" style="margin-top: 200px; margin-left: 100px; width:1000px;">
			<div id="hom">


            <tr>
                <td><form name="frmactive" id="frmactive" method="post" autocomplete="off" action="<?php echo base_url()?>reception/demo" onSubmit="return Blank_TextField_Validator()">
                   <table class="table">
                        <input type="hidden" name="visitid" value="<?php echo $this->uri->segment(3)?>"/>
                    <?php foreach($tested as $rows){?>
                    <tr>
                      <!--<td align="center"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $rows['id']?>" ></td>!-->
                       <?php echo $rows['fname']." ".$rows['lname']." ".$rows['sname']?>
                        <td><?php //echo $rows['cost']; ?></td>
                    
                    </tr>
                    
                     <input type="hidden" name="id" value="<?php echo $rows['id']?>">
             
        <tr>
              <td>
                <br>
                <h4>
                  Total Cost To Be Paid
                </h4>
              </td>
              <td>
                <div class="control-group">
                  <label class="control-label">
                    Cost
                  </label>
                  <div class="controls">
                  <?php $total=0;
				  $total=$rows['labs']+$rows['package']+$rows['pharm_costs'];?>
                    <input id="total" name="total" type="number" value="<?php echo $total; ?>" disabled>
                    <input type="hidden" name="cost" value="<?php echo $total;?>">
                      <?php } ?>
                  </div>
                </div>
              </td>
            
              <td>
                <div class="control-group">
                  <div class="controls">
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <br>
                <h4>
                  Payment Option
                </h4>
              </td>
              <td>
            <select name="pay" onchange="payment(this)">
            	<option></option>
            	<option value="Mpesa">Mpesa</option>
            	<option value="cash">Cash</option>
            	<option value="Visa">Visa</option>
            	<option value="Insurance">Insurance</option>
            </select>
              </td>
            </tr>
            <tr>
              <td>
                <br>
                <h4>
                  Payment
                </h4>
              </td>
              <td>
                <div class="control-group">
                  <label class="control-label">
                   Amount Received
                  </label>
                  <div class="controls">
                   <input type="number" id="cash" name="cash" min="0" value=""/>
                  </div>
                </div>
              </td>
               <td>
                <div class="control-group">
                  <label class="control-label">
                    Balance
                  </label>
                  <div class="controls">
                   <input type="number" id="balance" name="balance" min="0" value=""/>
                  </div>
                </div>
              </td>
            </tr>
         
        </table>
          <button name="activate" type="submit" id="activate" class="btn btn-info pull-right">
          Add Payment Information
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
<script Language="JavaScript">
<!-- 
function Blank_TextField_Validator()
{
// Check the value of the element named text_name from the form named text_form
if (frmactive.cpay.value == "" && frmactive.cash.value == "")
{
  // If null display and alert box
   alert("Please fill in Cash or Mpesa Payment.");
  // Place the cursor on the field for revision
   frmactive.cpay.focus();
  // return false to stop further processing
   return (false);
}
else if (frmactive.cpay.value != "" && frmactive.MpesaCode.value == "")
{
  // If null display and alert box
   alert("Please enter the Mpesa code.");
  // Place the cursor on the field for revision
   frmactive.MpesaCode.focus();
  // return false to stop further processing
   return (false);
}
else if(frmactive.cash.value != "" && frmactive.MpesaCode.value == "")
{
	return true;
}
else if(frmactive.cpay.value!=frmactive.total.value)
{
	if(frmactive.cash.value==""){
		alert("Please check the money you have put in");
		return false;
		}
   if(frmactive.cash.value!=""){
	   var total=0;
	   total=Number(frmactive.cpay.value)+Number(frmactive.cash.value);
	    if(Number(frmactive.total.value) > Number(total)){
			alert("Please confirm that you have enterred the correct amount of money ");
			return false;
			}

		}	
		
}
else if(frmactive.cpay.value==frmactive.total.value)
{
	
   if(frmactive.cash.value!=""){
	   /*var total=0;
	   total=Number(frmactive.cpay.value)+Number(frmactive.cash.value);
	    if(frmactive.total.value!=total){
			*/
			alert("Please confirm that you have enterred the correct amount  ");
			return false;
			//}

		}
	if(frmactive.cash.value==""){
		//alert("Please check the money you have put in");
		//return true;
		}	
}
else if(frmactive.cash.value==frmactive.total.value){
	if(frmactive.cpay.value!=""){
		alert("Please check the amount of money you have put in");
		return false;
		}
	
	}
var q=frmactive.MpesaCode.value;//mPESA code

//var q = document.getElementById('Mpesa').value;
var reg = new RegExp("[D](?=[A-Z][0-9][0-9][A-Z][A-Z][0-9][0-9][0-9])");
if (!reg.test(q)){
//alert("string contai");
alert("Please check the code you have enterred");
return false;

}

return (true);
}
-->
</script>
