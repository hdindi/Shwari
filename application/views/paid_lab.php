<?php if($this->session->userdata('id')){
                 
     ///redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><table  class="table table-bordered">
                <tr class="success">
                <td>Provisional Diagnosis</td>
                <?php
				foreach($diagnosis as $checkup){?>
					<td><?php echo $checkup['working_diagnosis'];?></td>
					<?php }
                 ?>
                </tr>
                <th>Tests Requested</th>
                <th>Test Results</th>
                
                <tr>
                <?php foreach($paid as $tests){?>
                <td><?php echo $tests['test']?></td>
                <td><?php echo $tests['result']?></td>
               
                </tr>
					<?php }?>
                    
               
                 </table>
          <button id="create-user" class="btn btn-large btn-primary" >Update Test Results</button>
                         <button id="ordermore">Add Tests</button>

