<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><html>
	<head>
		<link rel="stylesheet" href="style.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>css/style.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery-ui.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/chosen-master/chosen/chosen.css" />

		<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
		<script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
		<script type="text/javascript">

function calculate() {
var el, i = 0;
var total = 0;
while(el = document.getElementsByName("chk")[i++]) {
if(el.checked) { total= total + Number(el.value);}
}
//alert(total);
var div = document.getElementById('divid');
div.innerHTML = "Total : " +total ;
}
</script>
	</head>
	<body>
		<header>
			<section class="user">

			</section>
			<nav class="page-nav">
				<section class="logo">

				</section>
			</nav>
		</header>
		    <hr>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span3">
			<div class="well ">
				<ul class="nav nav-pills nav-stacked">

				<li><a href="<?php echo base_url()?>/index.php/reception">Home</a></li>
		    	<li><a href="<?php echo base_url()?>/index.php/reception/viewpat">Add New Patient</a></li>
		    	<li><a href="<?php echo base_url()?>/index.php/reception/patients">All Patients</a></li>
		    	<li><a href="<?php echo base_url()?>/index.php/reception/appointmets">Appointments</a></li>
		    	<li><a href="<?php echo base_url()?>/index.php/reception/visit">Visits For Regular</a></li>
		    	<li><a href="<?php echo base_url()?>/index.php/reception/payments">Payments</a></li>

			</ul>
			</div>
			<!--/.well -->
		</div>
		<!--/span-->
		<div class="span9 well">
			<div id="hom">


            <tr>
                <td><form name="frmactive" method="post" action="">
                   <table class="table">
                        <tr>
                            <td colspan="5"><input name="activate" type="submit" id="activate" value="Dispened" />
                            <input name="deactivate" type="submit" id="deactivate" value="not dispensed" /></td>
                        </tr>
                        <tr>
                        <td align="center"> </td>
                        <td align="center"><strong>Id</strong></td>
                        <td align="center"><strong>name</strong></td>
                        <td align="center"><strong>cost</strong></td>
                        <td align="center"><strong>paymentid</strong></td>
                    </tr>
                    <?php foreach($tested as $rows){?>
                    <tr>
                        <td align="center"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $rows['id']; ?>"></td>
                        <td><?php echo $rows['id']; ?></td>
                        <td><?php echo $rows['name']; ?></td>
                        <td><?php echo $rows['cost']; ?></td>
                        <td align="center"><input name="chk" type="checkbox" id="chk" value="<?php echo $rows['cost']; ?>" onclick="calculate()"></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td align="center"> </td>
                        <td align="center"><strong>Total Cost</strong></td>
                        <td align="center"><div id="divid" style="color:red;"></div></td>
                        <td align="center"><strong>Mpesa</strong></td>
                        <td align="center"><input type="number" id="mpesa" name="mpesa"/></td>
                    </tr>
            </form>
        </td>
    </tr>
</table>
		</div>
		<!--/span-->
	</div>
	<!--/row-->
	<hr>
	<footer>
		<p>
			Company 2013
		</p>
	</footer>
</div>
<!--/.fluid-container
		<footer>
			<nav class="move">

			</nav>
		</footer>-->
	</body>
</html>