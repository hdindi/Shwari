<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><table border="1">

<?php foreach($profile as $getprofile){?>
<tr>
<td>Gravida</td>
<td><?php echo $getprofile['Gravida']?></td>
<td>No of ANC</td>
<td><?php echo $getprofile['no_of_anc']?></td>
<td>Parity</td>
<td><?php echo $getprofile['Parity']?></td>
<td>Height</td>
<td><?php echo $getprofile['Height']?></td>
<td>L.M.P</td>
<td><?php echo $getprofile['LMP']?></td>
</tr>
<tr>
<td>EDD</td>
<td><?php echo $getprofile['EDD']?></td>
<td>Education</td>
<td><?php echo $getprofile['Education']?></td>
<td>Occupation</td>
<td><?php echo $getprofile['Occupation']?></td>
<td>Next of Kin</td>
<td><?php echo $getprofile['Next_of_Kin']?></td>
</tr>
<tr>
<td>Next of Kin's Contacts</td>
<td><?php echo $getprofile['NOK_contacts']?></td>
<td>Relationship</td>
<td><?php echo $getprofile['Relationship']?></td>
</tr>
<?php } ?>

</table>