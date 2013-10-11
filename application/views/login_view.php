<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                //redirect('/login');
                ?>
     
        <?php }?><div class="login-form" >
        	
          <h1>Login</h1>
           
    <?php if(! is_null($msg)) echo $msg;?>
	<form action="<?php echo base_url()?>login/process" method="post" id="crudForm" autocomplete="off" enctype="multipart/form-data" accept-charset="utf-8">		<div>
						<fieldset>
							<div class="clearfix">
					<input id='field-username' placeholder="Username" name='username' type='text'  />				
							</div>
							<div class="clearfix">
					<input id='field-password' name='password' placeholder="Password" type='password' />
							</div>
							
						</fieldset>
						
						<!-- Start of hidden inputs -->
							<!-- End of hidden inputs -->			
			
			<div id='report-error' class='report-div error' data-dismiss="alert"></div>
			<div id='report-success' class='report-div success'></div>							
		</div>	
		
				<input  type='submit' value="LOGIN" class="btn btn-large btn-success "/><br/>	
                               
				<!--<input class="btn btn-info" type='button' value='Cancel' onClick="javascript: goToList()" class='ui-input-button' />--><br/>

	</form>
          <p class="btn btn-large btn-success ">
		<?php echo anchor('/resetpassword','Forgot Password'); ?>
	</p>
    </div>
		