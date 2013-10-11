<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Delivery</title>
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css" media="screen"/>
    <script src="?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="?php echo base_url()?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/modernizr.js"></script>
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="HandheldFriendly" content="true" />
<title>Form</title>
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/form.css"/>
<link href="<?php echo base_url()?>ccss/calendarview.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>ccss/nova.css" />
<style type="text/css">
    .form-label{
        width:150px !important;
    }
    .form-label-left{
        width:150px !important;
    }
    .form-line{
        padding-top:12px;
        padding-bottom:12px;
    }
    .form-label-right{
        width:150px !important;
    }
    .form-all{
        width:900px;
        color:#555 !important;
        font-family:'Lucida Grande';
        font-size:14px;
    }
    .form-radio-item label, .form-checkbox-item label, .form-grading-label, .form-header{
        color:#555;
    }

</style>

<script src="<?php echo base_url()?>js/prototype.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>js/protoplus.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>js/protoplus-ui.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>js/jotform.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>js/calendarview.js" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.init();
</script>
</head>
  <body data-spy="scroll" data-target=".hom">
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">

        <a class="brand" href='<?php echo site_url('profile') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/shwari.png" alt="Home"></a>

        <div class="nav-collapse collapse">
          <p class="navbar-text pull-right">
          Logged in as <a href="" class="navbar-link"><?php echo $this->session->userdata('type') ." ". $this->session->userdata('username');?></a>
          <a href='<?php echo site_url('home/do_logout')?>'> <img src="<?php echo base_url()?>assets/img/logout.png" title="Logout"></a>
         <?php if($this->uri->segment(3)){ ?>
          
          <?php }?> 
        </p>


        </div>
        <ul class="nav nav-tabs nav-pills">
           <li><a class="brand" href='<?php echo site_url('profile') ?>' title="Home" ><img src="<?php echo base_url()?>assets/img/Home1.png" alt="Home"></a></li>
           <li><a href='<?php echo site_url('nurse/patient_management')?>'><img src="<?php echo base_url()?>assets/img/patient1.png" title="All patients"></a></li>
            
        </ul>
          
          <?php if($this->uri->segment(4)){?>
          <?php echo anchor('profile/todoc/'.$this->uri->segment(3)."/", 'Send to doctor','class="btn btn-primary" type="button"'); ?>
       
          <?php foreach($names as $patientname){
              if(empty($patientname)){
                echo " ";
                }
              else{
              echo "<strong>".$patientname['fname']." ".$patientname['lname']." ".$patientname['sname']."</strong>";
              }
          }?>
          
          <?php }//echo anchor('profile/finish/'.$this->uri->segment(3)."/", 'Deactivate patient','class="btn btn-danger" type="button"'); ?><br/>
          
       </div>
    </div>
    <div class="container-fluid">
      <div class="row-fluid">

        
          <div class="span15">
            <div class="hero-unit">
<form class="jotform-form" action="<?php echo base_url()?>mother_child/preventive" method="post" name="form_31372816066555" id="31372816066555">
  <input type="hidden" name="formID" value="31372816066555" />
  <div class="form-all">
    <ul class="form-section">
      <li id="cid_1" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_1" class="form-header">
            Preventive Service
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_2">
        <label class="form-label-top" id="label_2" for="input_2"> Preventive Services </label>
        <div id="cid_2" class="form-input-wide">
          <table summary="" cellpadding="4" cellspacing="0" class="form-matrix-table">
            <tr>
              <th style="border:none">&nbsp;
                
              </th>
              <th class="form-matrix-column-headers form-matrix-column_0">
                Date
              </th>
              <th class="form-matrix-column-headers form-matrix-column_1">
                Next Visit
              </th>
            </tr>
            <tr>
              <th align="left" class="form-matrix-row-headers" nowrap="nowrap">
                **Tetanus toxoid 1
              </th>
              <td align="center" class="form-matrix-values">
                <input class="form-textbox" type="text" size="5" name="q2_preventiveServices[0][]" />
              </td>
              <td align="center" class="form-matrix-values">
                <input class="form-textbox" type="text" size="5" name="q2_preventiveServices[0][]" />
              </td>
            </tr>
            <tr>
              <th align="left" class="form-matrix-row-headers" nowrap="nowrap">
                Tetanus toxoid 2
              </th>
              <td align="center" class="form-matrix-values">
                <input class="form-textbox" type="text" size="5" name="q2_preventiveServices[1][]" />
              </td>
              <td align="center" class="form-matrix-values">
                <input class="form-textbox" type="text" size="5" name="q2_preventiveServices[1][]" />
              </td>
            </tr>
            <tr>
              <th align="left" class="form-matrix-row-headers" nowrap="nowrap">
                Tetanus toxoid 3
              </th>
              <td align="center" class="form-matrix-values">
                <input class="form-textbox" type="text" size="5" name="q2_preventiveServices[2][]" />
              </td>
              <td align="center" class="form-matrix-values">
                <input class="form-textbox" type="text" size="5" name="q2_preventiveServices[2][]" />
              </td>
            </tr>
            <tr>
              <th align="left" class="form-matrix-row-headers" nowrap="nowrap">
                Tetanus toxoid 4
              </th>
              <td align="center" class="form-matrix-values">
                <input class="form-textbox" type="text" size="5" name="q2_preventiveServices[3][]" />
              </td>
              <td align="center" class="form-matrix-values">
                <input class="form-textbox" type="text" size="5" name="q2_preventiveServices[3][]" />
              </td>
            </tr>
            <tr>
              <th align="left" class="form-matrix-row-headers" nowrap="nowrap">
                Tetanus toxoid 5
              </th>
              <td align="center" class="form-matrix-values">
                <input class="form-textbox" type="text" size="5" name="q2_preventiveServices[4][]" />
              </td>
              <td align="center" class="form-matrix-values">
                <input class="form-textbox" type="text" size="5" name="q2_preventiveServices[4][]" />
              </td>
            </tr>
            <tr>
              <th align="left" class="form-matrix-row-headers" nowrap="nowrap">
                *Malaria Prophylaxis(IPT1)at 16 weeks
              </th>
              <td align="center" class="form-matrix-values">
                <input class="form-textbox" type="text" size="5" name="q2_preventiveServices[5][]" />
              </td>
              <td align="center" class="form-matrix-values">
                <input class="form-textbox" type="text" size="5" name="q2_preventiveServices[5][]" />
              </td>
            </tr>
            <tr>
              <th align="left" class="form-matrix-row-headers" nowrap="nowrap">
                *Malaria Prophylaxis(IPT2)after 4 weeks
              </th>
              <td align="center" class="form-matrix-values">
                <input class="form-textbox" type="text" size="5" name="q2_preventiveServices[6][]" />
              </td>
              <td align="center" class="form-matrix-values">
                <input class="form-textbox" type="text" size="5" name="q2_preventiveServices[6][]" />
              </td>
            </tr>
            <tr>
              <th align="left" class="form-matrix-row-headers" nowrap="nowrap">
                Malaria Prophylaxis(IPT3)after 4 weeks
              </th>
              <td align="center" class="form-matrix-values">
                <input class="form-textbox" type="text" size="5" name="q2_preventiveServices[7][]" />
              </td>
              <td align="center" class="form-matrix-values">
                <input class="form-textbox" type="text" size="5" name="q2_preventiveServices[7][]" />
              </td>
            </tr>
            <tr>
              <th align="left" class="form-matrix-row-headers" nowrap="nowrap">
                Malaria Prophylaxis(IPT4)after 4 weeks
              </th>
              <td align="center" class="form-matrix-values">
                <input class="form-textbox" type="text" size="5" name="q2_preventiveServices[8][]" />
              </td>
              <td align="center" class="form-matrix-values">
                <input class="form-textbox" type="text" size="5" name="q2_preventiveServices[8][]" />
              </td>
            </tr>
            <tr>
              <th align="left" class="form-matrix-row-headers" nowrap="nowrap">
                Malaria Prophylaxis(IPT5)after 4 weeks
              </th>
              <td align="center" class="form-matrix-values">
                <input class="form-textbox" type="text" size="5" name="q2_preventiveServices[9][]" />
              </td>
              <td align="center" class="form-matrix-values">
                <input class="form-textbox" type="text" size="5" name="q2_preventiveServices[9][]" />
              </td>
            </tr>
            <tr>
              <th align="left" class="form-matrix-row-headers" nowrap="nowrap">
                Malaria Prophylaxis(IPT6)after 4 weeks
              </th>
              <td align="center" class="form-matrix-values">
                <input class="form-textbox" type="text" size="5" name="q2_preventiveServices[10][]" />
              </td>
              <td align="center" class="form-matrix-values">
                <input class="form-textbox" type="text" size="5" name="q2_preventiveServices[10][]" />
              </td>
            </tr>
            <tr>
              <th align="left" class="form-matrix-row-headers" nowrap="nowrap">
                Malaria Prophylaxis(IPT7)after 4 weeks
              </th>
              <td align="center" class="form-matrix-values">
                <input class="form-textbox" type="text" size="5" name="q2_preventiveServices[11][]" />
              </td>
              <td align="center" class="form-matrix-values">
                <input class="form-textbox" type="text" size="5" name="q2_preventiveServices[11][]" />
              </td>
            </tr>
          </table>
        </div>
      </li>
      <li class="form-line" id="id_3">
        <div id="cid_3" class="form-input-wide">
          <div id="text_3" class="form-html">
            <p>
              * IPT give SP 4 weeks intervals from 16 weeks gestation to term, in malaria endemic areas.
            </p>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_4">
        <label class="form-label-left" id="label_4" for="input_4"> Insecticide Treated net(LLIN)date given </label>
        <div id="cid_4" class="form-input">
          <input type="text" class=" form-textbox" id="input_4" name="q4_insecticideTreated" size="25" />
        </div>
      </li>
      <li class="form-line" id="id_5">
        <label class="form-label-left" id="label_5" for="input_5"> Deworming (Mebendazole 500mgs) given once in the 2nd trimester date given </label>
        <div id="cid_5" class="form-input">
          <input type="text" class=" form-textbox" id="input_5" name="q5_dewormingmebendazole5" size="25" />
        </div>
      </li>
     <li class="form-line" id="id_5">
      <table border="1">
  <tr>
    <td>Ferrous Fumarate
(Combined Tablet-60mg iron and 400 μg folic acid) or any other available</td>
    <td>1st Visit</td>
    <td>30 tablets</td>
    <td>Date Given………………</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>2nd Visit</td>
    <td>90 tablets</td>
    <td>Date given………………</td>
  </tr>
  <tr>
  <td>&nbsp;</td>
    <td>3RD Visit</td>
    <td>30 tablets</td>
    <td>Date given……………….</td>
    
  </tr>
   <tr>
  <td>&nbsp;</td>
    <td>4TH Visit</td>
    <td>30 tablets</td>
    <td>Date given……………….</td>
    
  </tr>
</table>
</li>
PMTCT:
 <li class="form-line" id="id_5">
 <table border="1">
  <tr>
    <td>Mother on ARV prophylaxis</td>
    <td>AZT as from 14 weeks or thereafter, then AZT+3TC +NVP in labour and delivery, then AZT+3TC for 7
days after delivery.</td>
  </tr>
  <tr>
    <td>Baby</td>
    <td>NVP Syrup prophylaxis until one week after cessation of breast feeding.</td>
  </tr>
   <tr>
    <td>Mother on ARV or option B
plus (HAART)</td>
    <td><li>AZT+3TC+NVP for life ( CD4 < 350)</li>
<li>AZT +3TC+EFV or TDF+3TC+EFV (CD4>350)</li></td>
  </tr>
  <tr>
    <td>Baby</td>
    <td>NVP syrup prophylaxis for 6 weeks only, whether breast feeding or not.</td>
  </tr>
</table>

 </li>
  <li class="form-line" id="id_7">
        <div id="cid_7" class="form-input-wide">
          <div id="text_7" class="form-html">
            <p>
              <strong><span style="color: #000080;">**T.T Instructions/Notes</span>
              </strong>
            </p>
            <p>
              All the ante-natal clients should be asked about the number of tetanus toxoid injections they have received in their life to date-including those given after injuries and through schools.
            </p>
            <p>
              This forms part of the 5 T.Ts. If none given start as follows;
            </p>
            <p>
              T.T. 1- Give to Primigravida or on first contact
            </p>
            <p>
              T.T. 2- Give not less than 4 weeks after T.T. 1
            </p>
            <p>
              T.T. 3- Give during the second pregnancy any time before 8 months of pregnancy
            </p>
            <p>
              T.T. 4- Give during the 3rd pregnancy, any time befoe 8months of pregnancy
            </p>
            <p>
              T.T. 5-Give during the 4th pregnancy, gives protection for life.
            </p>
            <p><span style="color: #ff6600;"><strong>
                  Special note
                </strong></span>
              <br />
              When using the 5&acirc;&euro;"T.T. schedule during F.A.N.C., the interval between pregnancies is not relevant (unless &ge; 10
              <br />
              years between the 1st & 2nd pregnancies) because the body&rsquo;s immunological memory responds well to booster
              <br />
              doses given even beyond the recommended time for boosters.
              <br />
              Only when the interval between the 1st and 2nd pregnancy is greater than (or equal to) 10yrs, should the
              <br />
              schedule be re-started from T.T.â€"1.
              <br />
              (This rule does not apply to intervals greater than 10yrs between the 2nd&mdash;3rd pregnancies or the 3rd&mdash;4th
              <br />
              pregnancies. Meaning that a long delay between T.T.2 & T.T. 3 is more risky than a long delay between T.T.3 &
              <br />
              T.T4 or between T.T.4 & T.T.5)
            </p>
          </div>
        </div>
      </li>
    </ul>
  </div>
</form>
</div><!--/span-->
                  
          <footer >
            <p>&copy; <a href="http://healthstrat.co.ke/" title="HEALTHSTRAT - WELCOME TO A HEALTHY WORLD" target="_blank"><font color=white>HealthStrat 2013</font></a></p>
          </footer>
          </div><!--container fluid-->
           </body>
      </html>