 <script>
    $(document).ready(function(){
        setInterval(function() {
            $.ajax({
                type: "GET",
                url: "<?php echo base_url(); ?>profile/load_data",
                dataType: "JSON",
                success: function(people) {               
                    waiting_list=$('#waiting_list').empty();
                    
                    $.each(people, function(i, waiting){                    
                    waiting_list.append('<a href="profile/details/'+waiting.id+'/'+waiting.patientid+'">'+waiting.fname+" "+waiting.lname+" "+waiting.sname+'</a>');
                    });
                },
                error: function(data) {
                  //  alert('An error occured, kindly try later');
                }
            });
        }, 10000);
    
    
    });
</script>

<div class="row-fluid">
                <div class="span3">
                     <ul class="nav nav-list">
                         <div class="refreshdiv" id="refreshdiv"> <fieldset><legend><h4>Patients in Waiting</h4></legend>

                                 <ul>
                                     <li class="refresh" id="refresh">
                                       <div class='waiting'>
    <p>Waiting List</p><br>
    <ol id='waiting_list'></ol>
</div>
                                     </li>
                                 </ul>
                 </fieldset> </div>
                         
              </ul>
                </div>
                <!--/span-->
                <div class="span3">
                    
                    <div class="refresh2" id="refresh2" >  <fieldset><legend><h4>Appointments</h4></legend>
                    
                    <ul class="nav nav-list nav-stacked">
                
                            <?php if(!is_null($msg)){
                                  echo $msg;
                                       }
                                   else{?>
              
                        <?php foreach($home as $active){?>
            <li> 
                <?php echo anchor('profile/appointment',$active['fname']." ".$active['lname']." ".$active['sname'])."</br>"; ?>
                <?php }?>

            </li>
                 <?php } ?>
             </ul>
                    
                    </fieldset>
                </div> </div>
                <!--/span-->
          
            <div class="row-fluid">
                <!--/span-->
                
            </div>
            <!--/row-->
        </div>