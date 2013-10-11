<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><table border="1">

<?php foreach($history as $gethist){?>
<tr>
<td>Surgical Operation</td>
<td><?php echo $gethist['surgical_operation']?></td>
<td>Diabetes</td>
<td><?php echo $gethist['Diabetes']?></td>
<td>Hypertenion</td>
<td><?php echo $gethist['Hypertension']?></td>
<td>Blood Transfusion</td>
<td><?php echo $gethist['Blood_transfusion']?></td>
<td>Tuberclosis</td>
<td><?php echo $gethist['Tuberclosis']?></td>
</tr>
<tr>
<td>Drug Allergy</td>
<td><?php echo $gethist['Drug_allergy']?></td>
<td>Family History</td>
<td><?php echo $gethist['family_history']?></td>
</tr>
<?php } ?>

</table>