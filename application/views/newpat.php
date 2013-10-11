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
		<script src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/css/styles/form.css?v3.1.473"/>
		<!--<link href="<?php echo base_url()?>assets/css/calendarview.css?v3.1.473" rel="stylesheet" type="text/css" />

		<link type="text/css" media="print" rel="stylesheet" href="http://cdn.jotfor.ms/css/printForm.css?3.1.473" />-->
		<style type="text/css">
		.form-label{
		width:160px !important;
		}
		.form-label-left{
		width:160px !important;
		}
		.form-line{
		padding-top:12px;
		padding-bottom:12px;
		}
		.form-label-right{
		width:160px !important;
		}
		.form-all{
		
		background:#FFFFFF;
		color:#555555 !important;
		font-family:'Verdana';
		font-size:12px;
		}
		.form-radio-item label, .form-checkbox-item label, .form-grading-label, .form-header{
		color:#555555;
		}
		</style>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/css/styles/buttons/form-submit-button-simple_carolina_blue.css?3.1.473"/>
		<!--<script src="<?php echo base_url()?>assets/js/prototype.js?v=3.1.473" type="text/javascript"></script>
		<script src="<?php echo base_url()?>assets/js/protoplus.js?v=3.1.473" type="text/javascript"></script>
		<script src="<?php echo base_url()?>assets/js/protoplus-ui.js?v=3.1.473" type="text/javascript"></script>
		<script src="<?php echo base_url()?>assets/js/jotform.js?v=3.1.473" type="text/javascript"></script>
		<script src="<?php echo base_url()?>assets/js/calendarview.js?v=3.1.473" type="text/javascript"></script>-->
		  <link rel="stylesheet" href="<?php echo base_url()?>assets/css//jquery-ui.css" />
		<script type="text/javascript">
		$(document).ready(function(){
    $("#trige").validate();
  });
		
		</script>
		
		<script src="?php echo base_url()?>assets/js/jquery-1.9.1.js"></script>
		
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
		
					<div class="well" style="margin-top: 200px;">
					<form id="triage" name="triage" class="form" method="post" action="<?php echo base_url()?>index.php/reception/add" onSubmit="return check()" autocomplete="off">
						<div class="form-all">
							<ul class="form-section">
								<li id="cid_1" class="form-input-wide">
									<div class="form-header-group">
										<h2 id="header_1" class="form-header">
										Register New Patient
										</h2>
									</div>
								</li>
								<li id="cid_30" class="form-input-wide">
									<div class="form-header-group">
										<h2 id="header_30" class="form-header">
										Bio Data
										</h2>
									</div>
								</li>
								<li class="form-line" id="id_5">
									<label class="form-label-top" id="label_5" for="nationalid">
										National ID / Passport<span class="form-required" >*</span>
									</label>
									<div id="cid_5" class="form-input-wide">
										<input type="number" placeholder="7 or 8 numbers" id="nationalid" name="nationalid" style="width:204px" size="23" maxlength="8" minlength="7" data-type="input-number" required/>
									</div>
								</li>
								<li class="form-line form-line-column" id="id_6">
									<label class="form-label-top" id="label_6" for="sname">
										Surname<span class="form-required">*</span>
									</label>
									<div id="cid_6" class="form-input-wide">
										<input type="text" placeholder="Family Name" id="sname" name="sname" size="30" required/>
									</div>
								</li>
								<li class="form-line form-line-column" id="id_36">
									<label class="form-label-top" id="label_36" for="fname">
										First Name<span class="form-required">*</span>
									</label>
									<div id="cid_36" class="form-input-wide">
										<input type="text" placeholder="First Name" id="fname" name="fname" size="30" required/>
									</div>
								</li>
								<li class="form-line form-line-column" id="id_35">
									<label class="form-label-top" id="label_35" for="lname">
										Second Name<span class="form-required">*</span>
									</label>
									<div id="cid_35" class="form-input-wide">
										<input type="text" placeholder="Middle Name" id="lname" name="lname" size="30" required/>
									</div>
								</li>
								<li class="form-line" id="id_10">
									<label class="form-label-top" id="label_10" for="dob">
										Date Of Birth<span class="form-required">*</span>
									</label>
									<div id="cid_10" >
										<input type="text" id="datepicker" name="dob" class="dob" required/>
									</div>
								</li>
								<li class="form-line" id="id_29">
									<label class="form-label-left" id="label_29" for="gender">
										Gender<span class="form-required">*</span>
									</label>
									<div id="cid_29" class="form-input">
									<div class="form-multiple-column">
										<span class="form-radio-item"><input type="radio" class="form-radio validate[required]" id="sex" name="sex" value="Male" />Male
										</span>
										<span class="form-radio-item"><input type="radio" class="form-radio validate[required]" id="sex" name="sex" value="Female" />Female
										</span>
									</div>
								</div>
							</li>
					<li class="form-line" id="id_37">
						<label class="form-label-left" id="label_37" for="input_37"> Marital Status </label>
							<div id="cid_37" class="form-input">
								<div class="form-multiple-column">
						<span class="form-radio-item"><input type="radio" class="form-radio" id="input_37_0" name="maritalstatus" value="Single"/>Single</span>
						<span class="form-radio-item"><input type="radio" class="form-radio" id="input_37_1" name="maritalstatus" value="Married" />Married</span>
						<span class="form-radio-item"><input type="radio" class="form-radio" id="input_37_2" name="maritalstatus" value="Divorced"/>Divorced</span>
						<span class="form-radio-item"><input type="radio" class="form-radio" id="input_37_3" name="maritalstatus" value="Widowed" />Widowed</span>
									
								</div>
							</div>
						</li>
						<li id="cid_31" class="form-input-wide">
							<div class="form-header-group">
								<h2 id="header_31" class="form-header">
								Contact Information
								</h2>
							</div>
						</li>
						<li class="form-line form-line-column form-line-column-clear" id="id_11">
							<label class="form-label-top" id="label_11" for="phone"> Phone Number </label><span class="form-required">*</span>
							<div id="cid_11" class="form-input-wide">
								<input type="text" placeholder="07********" id="phone" name="phone" size="30" maxlength="10" />
							</div>
						</li>
						<li class="form-line form-line-column" id="id_12">
							<label class="form-label-top" id="label_12" for="email"> E-mail </label>
							<div id="cid_12" class="form-input-wide">
								<input type="email" class=" form-textbox validate[Email]" id="email" name="email" size="30" />
							</div>
						</li>
						<li class="form-line form-line-column" id="address">
							<label class="form-label-top" id="label_13" for="address"> Residence </label><span class="form-required">*</span>
							<div id="cid_13" class="form-input-wide">
								<input type="text" class=" form-textbox" id="address" name="address" size="30" />
							</div>
						</li>
						<li class="form-line" id="id_38">
							<label class="form-label-left" id="label_38" for="input_38"> Employment Status </label>
							<div id="cid_38" class="form-input">
								<div class="form-multiple-column">
								<span class="form-radio-item"><input type="radio" class="form-radio" id="employmentstatus" name="employmentstatus" value="Not Employed" onClick="check(this.value)"/>Not Employed
								</span>
								<span class="form-radio-item"><input type="radio" class="form-radio" id="employmentstatus" name="employmentstatus" value="Employed" onClick="check(this.value)" />Employed
								</span>
							</div>
						</div>
					</li>
                    <li class="form-line" id="id_38">
							<label class="form-label-left" id="label_38" for="input_38"> Employer </label>
							<div id="cid_38" class="form-input">
								<div id="cid_13" class="form-input-wide">
								<input type="text" class=" form-textbox" id="employer" name="employer" disabled />
							</div>
						</div>
					</li>
					<li id="cid_32" class="form-input-wide">
						<div class="form-header-group">
							<h2 id="header_32" class="form-header">
							Next Of Kin
							</h2>
						</div>
					</li>
					<li class="form-line form-line-column" id="id_34">
						<label class="form-label-top" id="label_34" for="input_34"> Name </label><span class="form-required">*</span>
						<div id="cid_34" class="form-input-wide">
							<input type="text" class=" form-textbox" id="kinname" name="kinname" size="30" />
						</div>
					</li>
                    <li class="form-line form-line-column" id="id_34">
						<label class="form-label-top" id="label_34" for="input_34"> Other Names </label><span class="form-required">*</span>
						<div id="cid_34" class="form-input-wide">
							<input type="text" class=" form-textbox" id="kinname" name="kinname" size="30" />
						</div>
					</li>
					<li class="form-line form-line-column" id="id_21">
						<label class="form-label-top" id="label_21" for="input_21"> Relation </label><span class="form-required">*</span>
						<div id="cid_21" class="form-input-wide">
							<input type="text" class=" form-textbox" id="kinrelation" name="kinrelation" size="30" />
						</div>
					</li>
					<li class="form-line form-line-column" id="id_22">
						<label class="form-label-top" id="label_22" for="input_22"> Phone Number </label><span class="form-required">*</span>
						<div id="cid_22" class="form-input-wide">
							<input type="text" placeholder="07********" id="kinphone" name="kinphone" size="30" />
						</div>
					</li>
					<li id="cid_39" class="form-input-wide">
						<div class="form-header-group">
							<h2 id="header_39" class="form-header">
							<!--Visit Information!-->
							</h2>
						</div>
					</li>
					<!--<li class="form-line form-line-column" id="id_40">
						<label class="form-label-top" id="label_40" for="package">
							Package<span class="form-required">*</span>
						</label>
						<div id="cid_40" class="form-input-wide">
							<select class="form-dropdown validate[required]" style="width:210px" id="package" name="package">
								<option value="">  </option>
								<?php foreach($pack as $pack_types){?>
                              <option  value="<?php echo $pack_types['id']."|".$pack_types['cost'] ?>" id="<?php echo $pack_types['cost'] ?>" ><?php echo $pack_types['name']?> </option>
                       <?php  } ?>
							</select>
						</div>
					</li>
					<li class="form-line form-line-column" id="id_41">
						<label class="form-label-top" id="label_41" for="cost">
							Cost<span class="form-required">*</span>
						</label>
						<div id="cid_41" class="form-input-wide">
							<input type="text" class=" form-textbox validate[required]" id="cost" name="cost" size="30" value="" />
						</div>
					</li>
					<li class="form-line form-line-column" id="id_42">
						<label class="form-label-top" id="label_42" for="mpesaCode">
							Mpesa Code<span class="form-required">*</span>
						</label>
						<div id="cid_42" class="form-input-wide">
							<input type="text" class=" form-textbox validate[required]" id="mpesaCode" name="mpesaCode" size="30" />
						</div>
					</li>!-->
					<li class="form-line" id="id_27">
						<div id="cid_27" class="form-input-wide">
							<div style="text-align:left" class="form-buttons-wrapper">
								<button id="input_27" type="submit" class="form-submit-button form-submit-button-simple_carolina_blue">
								Add New Patient Info
								</button>
							</div>
						</div>
					</li>
					
				</ul>
			</div>
			<input type="hidden" id="simple_spc" name="simple_spc" value="31363593518559" />
			<script type="text/javascript">
			//document.getElementById("si" + "mple" + "_spc").value = "31363593518559-31363593518559";
			</script>
			<!--</form>-->
		</form>
		</div>
		<!--/row-->

	</div>
	<!--/span-->
</div>
<!--/row-->
<hr>
<footer >
       <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank"><font color=white>HealthStrat 2013</font></a></p> 
</footer>
</div>
<!--/.fluid-container-->
<script src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      
      $("#triage").validate({
        rules:{
         // lname:"required",
          fname:"required",
          sname:"required",
          sex:"required",
          dob:"required",
          kinname:"required",
          kinname:"required",
          kinrelation:"required",
          kinphone:"required",
          phone:"required",
          address:"required",
          nationalid:
          {
            required:true,
            number: true,
            minlength: 7,
            maxlength: 9
          },
          email:{
              
              email: true
            },
          
        },
        messages:{
          //sname:"Enter your last name",
          fname:"Enter your first name",
          lname:"Enter your surname name",
          dob:"Date of Birth is needed",

          
          nationalid:{
            required:"Enter your national id",
            number:"Enter valid Number",
            minlength:"Enter atleast 7 digits",
            maxlength:"Enter atmost 9 digits"
            
          },

          email:{
            
            email:"Enter valid email address"
          },
          
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight:function(element, errorClass, validClass) {
          $(element).parents('.control-group').addClass('error');
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).parents('.control-group').removeClass('error');
          $(element).parents('.control-group').addClass('success');
        }
      });
    });
    </script>
    <script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
   <script>
  $(function() {
  $( "#datepicker" ).datepicker({ 
  	minDate: '-100Y', 
  	maxDate: '+0m +0w',
  	changeMonth: true,
  	dateFormat: 'yy-mm-dd',
	changeYear: true
  });
  $("#datepcker").datepicker({ dateFormat: 'yy-mm-dd'});
   
  });
  </script>

<script>
function check(x)
  {
  if(x=="Employed"){
	  $('#employer').removeAttr('disabled');
	  }
if(x=="Not Employed"){
		var x=document.getElementById("employer");
		x.disabled=true;
		}
  }

</script>
</body>
</html>