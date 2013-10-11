
        <div class="login-form" >
        	
          <h3>Reset Password</h3>
          <div>   
    
	<form action="<?php echo base_url()?>resetpassword/doforget" method="post" id="crudForm" autocomplete="off" enctype="multipart/form-data" accept-charset="utf-8">		<div>
						<fieldset>
							<div class="clearfix">
					<input id='field-username' placeholder="email_address" name='email_address' type='email'  />				
							</div>
							
							
						</fieldset>
						
						<!-- Start of hidden inputs -->
							<!-- End of hidden inputs -->			
			
			<div id='report-error' class='report-div error' data-dismiss="alert"></div>
			<div id='report-success' class='report-div success'></div>							
		</div>	
		
				<input  type='submit' value="Send Verification Email" class="btn btn-large btn-success "/><br/>	
          </div>
           <?php if( isset($info)): ?>
                <div class="alert alert-success">
                    <?php echo($info) ?>
                </div>
            <?php elseif( isset($error)): ?>
                <div class="alert alert-error">
                    <?php echo($error) ?>
                </div>
            <?php endif; ?>
        
				<!--<input class="btn btn-info" type='button' value='Cancel' onClick="javascript: goToList()" class='ui-input-button' />--><br/>

	</form>
          <p class="btn btn-large btn-success ">
		<?php echo anchor('/login','Login'); ?>
              
	</p>
        <p class="btn btn-large btn-success "> 
              <?php echo anchor('/createaccount','Create an Acount'); ?></p>
    </div>
	
