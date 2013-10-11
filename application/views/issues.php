<?php if($this->session->userdata('id')){
                 
    // redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
  <title>Pharmacy</title>
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

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/grocery_crud\themes\datatables\css\jquery.dataTables.css" media="screen"/>
 <link rel="stylesheet" href="<?php echo base_url() ?>assets/chosen-master/chosen/chosen.css" />
<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/jquery-ui.css" />
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
<script src="<?php echo base_url()?>assets/js/modernizr.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
  <script>
  $(function() {
  $( "#accordion" ).accordion({
  collapsible: true,
  heightStyle: "content"
  });
  });
  </script>
   <script>
  $(function() {
  $( "#datepicker" ).datepicker({ minDate: "-1Y", maxDate: 0});
  });
  </script>
    <script>
    $(function() {
    $( "#dialog-form" ).dialog({
    autoOpen: false,
    height: 300,
    width: 1600,
    modal: true,
    buttons: {
    Cancel: function() {
    $( this ).dialog( "close" );
    }
    },
    close: function() {
    allFields.val( "" ).removeClass( "ui-state-error" );
    }
    });
    $( "#issue" )
    .button()
    .click(function() {
    $( "#dialog-form" ).dialog( "open" );
    });
    });
    </script>
 <script>
function ChooseContact(data) {
    var mystr = data.value;
    var myarr = mystr.split("|");
    var myvar = myarr[0] + "|" + myarr[1] + "|" + myarr[2] + "|" + myarr[3]+ "|" + myarr[4] +"|"+ myarr[5] +"|"+ myarr[6];
    var n = myarr[0];
    var m = myarr[1];
	var p = myarr[3];
	var x = myarr[2];
	var y = myarr[4];
	var z = myarr[5];
	var a = myarr[6];

document.getElementById("batch_no").value = m;
document.getElementById("opening_bal").value = p;
document.getElementById("exp_date").value = x;
document.getElementById("item_id").value = y;
document.getElementById("id").value = n;
document.getElementById("service_point").value = z;
document.getElementById("issues").value=a
document.getElementById("opening").value=p;
document.getElementById("service").value=z;
}

</script>
  <style>table.data-table {border: 1px solid #DDD;margin: 10px auto;border-spacing: 0px;}
table.data-table th {border: none;color: #036;text-align: center;background-color: 	#FFF380;border: 1px solid #DDD;border-top: none;max-width: 450px;}
table.data-table td, table th {padding: 4px;}
table.data-table td {border: none;border-left: 1px solid #DDD;border-right: 1px solid #DDD;height: 30px;margin: 0px;border-bottom: 1px solid #DDD;}
</style>
</head>

<body>
  
	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
      <a class="brand" href='<?php echo site_url('pharm_profile') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/shwari.png" alt="Home"></a>

    <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link"><?php  echo $this->session->userdata('type') ." ". $this->session->userdata('username');?></a>
              <a href='<?php echo site_url('home/do_logout')?>'> <img src="<?php echo base_url()?>assets/img/logout.png" title="Logout"></a>
            </p></div>
    <ul class="nav">
		 <li><a class="brand" href='<?php echo site_url('pharm_profile') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/Home1.png" alt="Home"></a></li>
     <li><a href='<?php echo site_url('phamarcy/add_medicine')?>'><img src="<?php echo base_url()?>assets/img/medical_pot.png" title="Add medicines"></a></li>
		 <li><a href='<?php echo site_url('pharm_profile/history')?>'><img src="<?php echo base_url()?>assets/img/presc_hist.png" title="Prescription History"></a></li> 
	</ul>
		</div>	
	</div>
	<div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list" id="load">
              <li class="nav-header">Quick Menu</li>
              <div id="accordion">
              <h3>Bin Cards</h3>
              <div>
               <form action="<?php echo base_url()?>phamarcy/stock_movement" method="post">
               Drug Name<select name="drug_id" class="chzn-select" tabindex="6"  data-placeholder="Medicine Name">
               <option></option>
               <?php foreach($meds as $drugs){?>
               <option value="<?php echo $drugs['id']?>"><?php echo $drugs['Medicine_name']?></option>
               <?php } ?>
               </select>
               <!--Date<input type="date" id="datepicker" name="Date" required/>!-->
               <input type="submit" value="Search">
               
               </form>
              </div>
               <h3>Reports</h3>
               <div>
                 <li><a href='<?php echo site_url('order_management')?>'>Order Reports</a>
                </div>
                <h3>Department Orders</h3>
                <div>
             		<li><a href="<?php echo site_url('phamarcy/view_orders')?>">Department Orders</a></li>
                    <li><a href="<?php echo site_url('phamarcy/view_bin')?>">Stock Bin Cart</a></li>
                </div>
                 
                 </div>
                 </li>
                 </ul>
                      
          </div><!--/.well -->
        </div><!--/span-->

         <div class="span9">
          <div class="hero-unit">
          <?php echo $this->load->view($view);?>
         
     </div>
</div>

        </div><!--/span-->

         <footer >
            <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank">HealthStrat 2013</a></p>
          </footer>
	
    </div><!--container fluid-->
    <script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
    <script src="<?php echo base_url()?>assets/chosen-master/chosen/chosen.jquery.js" type="text/javascript"></script>
</body>
</html>
