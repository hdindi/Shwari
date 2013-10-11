<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><p class="validateTips">All form fields are required.</p>
                  <table id="visit">
                    
                   <form action="<?php echo base_url()?>lab_profile/save_tests" method="post" autocomplete="off" >
                    
                    <input type="hidden" name="patientid" value="<?php echo $this->uri->segment(3);?>">
                    <input type="hidden" id="tested" name="tested" value="1" />
                        Lab Tests<span class="form-required">*</span>
                    <select data-placeholder="Lab Tests" style="width:350px;" class="chzn-select"multiple tabindex="6" name="test[]" required >
                      <option value=""></option>
                      <?php foreach ($tests as $lab_tests){?>
                      <option value="<?php echo $lab_tests['name']; ?>"><?php echo $lab_tests['name'] ;?></option>
                      <?php  }?>
                    </select>
                    <input type="submit" name="save" value="Add Lab Tests" class="btn btn-warning">
                    
                </form>                 
             </table>
