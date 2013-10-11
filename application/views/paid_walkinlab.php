<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><table  class="table table-bordered">
              
                <th>Tests Requested</th>
                <th>Test Results</th>
                
                <tr>
                <?php foreach($unpaid as $tests){?>
                <td><?php echo $tests['test']?></td>
                <td><?php echo $tests['results']?></td>
               
                </tr>
					<?php }?>
                    
               
                 </table>
          <button id="create-user" class="btn btn-large btn-primary" >Update Test Results</button>

