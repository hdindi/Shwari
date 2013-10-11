<!DOCTYPE html>
<html lang="en">
<head>
  <title>Administrator</title>
   <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<?php 
if ($this->uri->segment(2)==NULL) {
  
} else {
  foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; 
  
}?>


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
<script src="?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script src="?php echo base_url()?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
   <script type="text/javascript">
    $(document).ready(function(){
      
      $("#crudForm").validate({
        rules:{
         // lname:"required",
          Fname:"required",
          Sname:"required",
          sex:"required",
          DOB:"required",
		  username:"required",
		  password:"required",
		  type:"required",
          residence:"required",
          Address:"required"
          NationalID:
          {
            required:true,
            number: true,
            minlength: 7,
            maxlength: 9
          },
          Email:{
              
              email: true
            },
		 Phone:
		 {
			required:true,
            number: true,
            minlength: 10,
            maxlength: 10
		 },
          
        },
        messages:{
          //sname:"Enter your last name",
          Fname:"Enter your first name",
          Lname:"Enter your surname name",
          DOB:"Date of Birth is required",
		  username:"Username is required",

          
          NationalID:{
            required:"Enter your national id",
            number:"Enter valid Number",
            minlength:"Enter atleast 7 digits",
            maxlength:"Enter atmost 9 digits"
            
          },

          Email:{
            
            email:"Enter valid email address"
          },
		  Phone:{
			  required:"Enter the phone number",
            number:"Enter valid Number",
            minlength:"Enter 10 digits",
            maxlength:"Enter 10 digits"
			  }
          
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
    
    </script>

</head>
<body>
<!-- Beginning header -->
   <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
   <a class="brand" href='<?php echo site_url('admin') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/shwari.png" alt="Home"></a>
    <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link"><?php  echo $this->session->userdata('type') ." ". $this->session->userdata('username');?></a>
               <a href='<?php echo site_url('home/do_logout')?>'><img src="<?php echo base_url()?>assets/img/logout.png" title="Logout"></a>
            </p></div>
    <ul class="nav">
        <li><a class="brand" href='<?php echo site_url('admin') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/Home1.png" alt="Home"></a></li>
        <li><a href='<?php echo site_url('admin/loadnewEmp')?>'><img src="<?php echo base_url()?>assets/img/addemp.png"  title="Add Employee"></a></li>
        <li><a href='<?php echo site_url('admin/employee_management')?>'><img src="<?php echo base_url()?>assets/img/employees.png"  title="Employee management"></a></li>
        <li> <a href='<?php echo site_url('admin/patient_management')?>'><img src="<?php echo base_url()?>assets/img/patient1.png" title="All patients"></a></li>
        <li> <a href='<?php echo site_url('admin/visit_management')?>'><img src="<?php echo base_url()?>assets/img/visits.png" title="visit patients"></a> </li>
        <li> <a href='<?php echo site_url('admin/packages')?>' title="css menus"><img src="<?php echo base_url()?>assets/img/package.png" title="Package Management"></a> </li>
        
     </ul>
        </div>  
    </div>
        
        
 
    </div>
<!-- End of header-->
   
        <div class="span15">
          <div class="hero-unit">

       <?php
          echo $output;
       
          ?>
    </div>
</div>

        </div><!--/span-->
         <footer >
            <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank"><font color=white>HealthStrat 2013</font></a></p>
   </footer>
    </div><!--container fluid-->
 
</body>
</html>