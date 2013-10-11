<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<fieldset>
<legend>Today's Appoinments</legend>
<table border="1">
<tr>
<th>Patient Name</th>
<th>Appointmment Time</th>
<th>Reason for Appoinment</th>
<th>Phone Number</th>
</tr>
<tr>
<?php foreach($home as $appointment){?>
<?php if(empty($appointment)){
	echo "You have no appointments";
}else{?>
<td><?php echo $appointment['fname']." ".$appointment['lname']." ".$appointment['sname']?></td>
<td><?php echo $appointment['Time']?></td>
<td><?php echo $appointment['About']?></td>
<td><?php echo $appointment['phone']?></td>
<?php } 
}?>
</tr>
</table>
</fieldset>
</body>
</html>