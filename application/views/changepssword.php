<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/style.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery-ui.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/chosen-master/chosen/chosen.css" />
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
<style type='text/css'>
body
{
	font-family: Arial;
	font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
	text-decoration: underline;
}
</style>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css" media="screen"/>
 <script src="?php echo base_url()?>assets/js/bootstrap.min.js"></script>
 <script src="?php echo base_url()?>assets/js/jquery.min.js"></script>
 
 <style type="text/css">
      /* Override some defaults */
      html, body {
        background-color: #eee;
      }
      body {
        padding-top: 40px; 
      }
      .container {
        width: 300px;
      }

      /* The white background content wrapper */
      .container > .content {
        background-color: #fff;
        padding: 20px;
        margin: 0 -20px; 
        -webkit-border-radius: 10px 10px 10px 10px;
           -moz-border-radius: 10px 10px 10px 10px;
                border-radius: 10px 10px 10px 10px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
                box-shadow: 0 1px 2px rgba(0,0,0,.15);
      }

	  .login-form {
		margin-left: 65px;
	  }
	  input.edit-btn-large {
   padding: 11px 19px;
   font-size: 17.5px;
}
	
	  legend {
		margin-right: -50px;
		font-weight: bold;
	  	color: #404040;
	  }

	  .footer
{
position: relative;
margin-top: -150px; /* negative value of footer height */
height: 150px;
clear:both;
padding-top:20px;
color:#fff;
}

    </style>

</head>
<body>
	<div class="nav">
		<div class="row-fluid">

            <div class="span13 pagination-centered">

   	            <a class="brand" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" href="#"><img src="<?php echo base_url()?>assets/img/shwari.png" border="0"></a>

            </div>

    </div>
		<!--<a href='http://localhost/take/login'>Shwari Healthcare</a> |-->
	</div>


	<div></div>  
    <div class="content">
		<script type="text/javascript">
                var ajax_relation_url = 'http://192.168.0.109/take/login';


</script>
<div class="container">
    <div class="content">
      <div class="row">
        <div class="login-form" >
        	
          <h1>Change password</h1>
           
    <? if(! is_null($msg)) echo $msg;?>
	<form action="<?php echo base_url()?>login/process" method="post" id="crudForm" autocomplete="off" enctype="multipart/form-data" accept-charset="utf-8">		<div>
						<fieldset>
							<div class="clearfix">
					<input id='field-username' placeholder="Username" name='username' type='text'  />				
							</div>
							<div class="clearfix">
					<input id='field-password' name='password' placeholder="Password" type='password' />
							</div>
							
						</fieldset>
						
						<!-- Start of hidden inputs -->
							<!-- End of hidden inputs -->			
			
			<div id='report-error' class='report-div error' data-dismiss="alert"></div>
			<div id='report-success' class='report-div success'></div>							
		</div>	
		
				<input  type='submit' value="LOGIN" class="btn btn-large btn-success "/><br/>			
				<!--<input class="btn btn-info" type='button' value='Cancel' onClick="javascript: goToList()" class='ui-input-button' />--><br/>

	</form>
    </div>
		</div>
			</div>
				</div>
					

<script>
	//var validation_url = 'http://localhost/take/login/employee_logi';
	var list_url = 'http://localhost/take/login/';

	var message_alert_add_form = "The data you had insert may not be saved.\nAre you sure you want to go back to list?";
	var message_insert_error = "An error has occurred on insert.";	
</script><script type="text/javascript">
var js_date_format = 'dd/mm/yy';
</script>
<script type="text/javascript">
	var default_javascript_path = 'http://localhost/take/assets/grocery_crud/js';
	var default_css_path = 'http://localhost/take/assets/grocery_crud/css';
	var default_texteditor_path = 'http://localhost/take/assets/grocery_crud/texteditor';
	var default_theme_path = 'http://localhost/take/assets/grocery_crud/themes';
	var base_url = 'http://localhost/take/';

</script>
    </div>
<div class=" navbar navbar-fixed-bottom span13 pagination-centered"> 
 <footer >
            <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank">HealthStrat 2013</a></p>
          </footer>
    </div><!--container fluid-->
     

</body>
</html>
