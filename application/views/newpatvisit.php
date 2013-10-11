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
        
          <script>
function ChooseContact(data) {
    var mystr = data.value;
    var myarr = mystr.split("|");
    var myvar = myarr[0] + "|" + myarr[1];
    var n = myarr[0];
    var m = myarr[1];

document.getElementById("packageid").value = n;
document.getElementById("cost").value = m;
    

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
				<ul class="nav nav-stacked">
				
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
			
			<!--/row-->
			<form action="<?php echo base_url()?>index.php/reception/savevisit" method="post">
				<table class="table">
					<tbody>
						<tr>
							<td>
								<div class="control-group">
									<label class="control-label">
										Package
									</label>
									<div class="controls">
					<select  style="width:350px;" class="chzn-select" tabindex="6" name="package" id="package"onchange="ChooseContact(this)" >											<option value="pizza">
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
									</div>
								</div>
							</td>
							<td>
								<div class="control-group">
									<label class="control-label">
										Mpesa Code
									</label>
									<div class="controls">
										<input class="pull-left" type="text" name="Mpesa" >
									</div>
								</div>
							</td>
                           <tr>
                          <td> <button type="submit" class="btn btn-info pull-right">
									Add Payment Information
								</button>
                                </td>
                           </tr>
                            </table>
                            </form>
		</div>
		<!--/span-->
	</div>
	<!--/row-->
	<hr>
	<footer>
		<p>
			© Company 2013
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