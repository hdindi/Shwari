<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><div class="login-form" >
        	
          <h3>Reset Password</h3>
          <div>   
    
          <p class="btn btn-large btn-success ">
              <?php echo anchor('/createaccount','Create an Acount'); ?>
		<?php echo anchor('/login','Login'); ?>
              <?php echo anchor('/home','Home');?>
              
	</p>
    </div>