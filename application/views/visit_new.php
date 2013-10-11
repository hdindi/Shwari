<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add visit</title>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


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
<script type="text/javascript">
/*function ChooseContact(data) {

//document.getElementById ("cost").value =data.id;



}
*/
</script>
<script>
function ChooseContact(data) {
    var mystr = data.value;
    var myarr = mystr.split("|");
    var myvar = myarr[0] + "|" + myarr[1];
    var n = myarr[0];
    var m = myarr[1];


    document.getElementById("cost").value = m;
    document.getElementById("packageid").value = n;

}
</script>

</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
         <a class="brand" href="#"><img src="<?php echo base_url()?>assets/img/shwari.png" border="0"></a>
           <div class="nav-collapse collapse">
                 <p class="navbar-text pull-right">
                      Logged in as <a href="#" class="navbar-link"><?php  echo $this->session->userdata('type') ." ". $this->session->userdata('username');?></a>
                 </p>
            </div>
                 <ul class="nav nav-tabs nav-pills">
                   <li><a href='<?php echo site_url('reception/patient_management')?>'>Patients</a></li>
                   <li><a href='<?php echo site_url('reception/visit_management')?>'>Visits</a></li>
                   <li><a href='<?php echo site_url('home/do_logout')?>'> Logout</a></li>
                </ul>
      </div>  
  </div>

   <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">

           <!-- <ul class="nav nav-list">
              <li class="nav-header">Active patients</li>
              <?php// foreach($patients as $active){?>
          
            <p>
             <?php// echo anchor('profile/details/'.$active['id']."/".$active['patientid'],$active['fname']." ".$active['lname']." ".$active['sname'])."</br>"; ?>
     <?php //}?>

</p> 

            </ul>-->

          </div><!--/.well -->
        </div><!--/span-->




  <div class="span9">
          <div class="hero-unit">
 

  <fieldset><legend>Visit</legend>
    <form action="<?php echo base_url()?>visit_new/visit_management/<?php ?>" method="post" id="pay">
  <table>
  <tr><td>Id</d><td> <select style="width:350px;" class="chzn-select" tabindex="6" name="visitid" id="visitid">
                          
                              <?php foreach($name as $name_types){?>
                              <option  value="<?php echo $name_types['id']?>" id="<?php echo $name_types['fname'] ?>" ><?php echo $name_types['fname']?>   <?php echo $name_types['sname']?>   <?php echo $name_types['lname']?></option>
                              <?php } ?>

                     </select></td></tr></td></tr>
   
   <tr><td>Package</td><td><select  style="width:350px;" class="chzn-select" tabindex="6" name="package" id="package"onchange="ChooseContact(this)" >

                              
                              <?php foreach($pack as $pack_types){?>
                              <option  value="<?php echo $pack_types['id']."|".$pack_types['cost'] ?>" id="<?php echo $pack_types['cost'] ?>" ><?php echo $pack_types['name']?> (<?php echo $pack_types['cost'] ?>)</option>
                             <?php  
                            //$result = $_POST['packageid'];
                            //$result_explode($id, $cost) = explode('|', $result, 2); 
                             // list($one, $two) = explode("-", "44-xkIolspO", 2);
                             $cost = $pack_types['cost'];
                             $id = $pack_types['id'];

                             ?>

                             <?php  } ?>

  </select></td></tr>

  <tr> <td> <input type="hidden" name="packageid" id="packageid" /></td></tr>

  <tr><td>Cost</td> <td> <input type="text" name="cost" id="cost" /></td></tr>


  <tr><td>Mpesa</td><td><input type="text" name="Mpesa" id="Mpesa" /></td></tr>
  <tr><td>Status</td><td>
    <select name="paid">
      <option value="not paid">not paid</option>
      <option value="paid">paid</option>
    </select></td></tr>


   <tr><td><input type="submit" name="submit" value="Add visit"/></td></tr>
  </table>
</form>
  </fieldset>


    </div>
  </div>

        </div><!--/span-->
          <footer >
            <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank"><font color=white>HealthStrat 2013</font></a></p>
          </footer>
    </div><!--container fluid-->
  
</body>

</html>