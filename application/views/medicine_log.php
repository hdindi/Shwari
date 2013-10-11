<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
  <title>Add medicine</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
</head>
<body>
	
<form action="<?php echo base_url() ?>medicine_log/add_meds" method="POST" id="barcode"> 

<p>Enter the Medication id:<input type="text" name="medicationid" id="medicationid" required="required"></p>
<p>Enter the Barcode:<input type="text" name="barcode_id" id="barcode_id" required="required"></p>
 
 <input type="submit" id="barcodesave" value="save" class="save">

</form>

</body>
</html>