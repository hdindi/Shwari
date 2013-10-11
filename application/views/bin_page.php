<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bin Cards</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css" media="screen"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/style.css" />
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery-ui.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/chosen-master/chosen/chosen.css" />
  <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
  <script src="<?php echo base_url()?>assets/js/modernizr.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/tiny_mce/tiny_mce.js"></script>
     <script>
  $(function() {
  $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 500,
      width: 1200,
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
 
    $( "#create-user" )
      .button()
      .click(function() {
        $( "#dialog-form" ).dialog( "open" );
      });
    });
  </script>
   
 
    <style type="text/css">
    body {
    padding-top: 140px;
    padding-bottom: 40px;
    }
    .sidebar-nav {
    padding: 9px 0;
    }
    .dialog-form{
    padding-top: 150px;
    padding-bottom: 40px;
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
    <script src="<?php echo base_url()?>assets/js/modernizr.js"></script>
      
    
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>
    <style type="text/css">
    label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }
    </style>
    
    
  </head>
  <body data-spy="scroll" data-target=".hom">
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">

        <a class="brand" href='<?php echo site_url('profile') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/shwari.png" alt="Home"></a>

        <div class="nav-collapse collapse">
          <p class="navbar-text pull-right">
          Logged in as <a href="" class="navbar-link"><?php echo $this->session->userdata('type') ." ". $this->session->userdata('username');?></a>
          <a href='<?php echo site_url('home/do_logout')?>'><img src="<?php echo base_url()?>assets/img/logout.png" title="Logout"></a>
        
        </p>


        </div>
        <ul class="nav nav-tabs nav-pills">
           <li><a class="brand" href='<?php echo site_url('profile') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/Home1.png" alt="Home"></a></li>

           <li><a href='<?php echo site_url('nurse/patient_management')?>'><img src="<?php echo base_url()?>assets/img/patient1.png" title="All patients"></a></li>
            
        </ul>
          
       
       </div>
    </div>


    <div class="container-fluid">
      <div class="row-fluid">

        <div class="span2 ">
          <div class="well sidebar-nav affix">
            <ul class="nav nav-list">
             <form action="<?php echo base_url()?>phamarcy/stock_movement" method="post">
             <select name="drug_id">
             <?php foreach($meds as $drugs){?>
             <option value="<?php echo $drugs['id']?>"><?php echo $drugs['Medicine_name']?></option>
             <?php } ?>
             </select>
             <input type="submit" value="Search">
             </form>
          </ul>
         

          </div><!--/.well -->
          </div><!--span2-->
       
          
          <div class="span10">
            <div class="hero-unit">
           <?php echo $this->load->view($view);?>
            <br/>

            </div>
          </div>   
          </div><!--/span-->
                  
          <footer >
            <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank"><font color=white>HealthStrat 2013</font></a></p>
          </footer>
          </div><!--container fluid-->
           <script src="<?php echo base_url()?>assets/chosen-master/chosen/chosen.jquery.js" type="text/javascript"></script>
        </body>
      </html>