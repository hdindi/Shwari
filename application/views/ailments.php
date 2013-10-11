<?php if($this->session->userdata('id')){
                 
    // redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><script type="text/javascript" src="http://192.168.0.109/take/assets/js/jquery.min.js"></script> 
    <script type="text/javascript" src="http://192.168.0.109/take/assets/chosen-master/chosen/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="http://192.168.0.109/take/assets/chosen-master/chosen/chosen.proto.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://192.168.0.109/take/assets/chosen-master/chosen/chosen.css">
     
     
    <script type="text/javascript">
        $(document).ready(function(){
            $("select#type").attr("disabled","disabled");
            $("select#category").change(function(){
            $("select#type").attr("disabled","disabled");
            $("select#type").html("<option>wait...</option>");
            var id = $("select#category option:selected").attr('value');
            $.post("select_type.php", {id:id}, function(data){
                $("select#type").removeAttr("disabled");
                $("select#type").html(data);
            });
        });
            $(".chzn-select").chosen({no_results_text: "No results matched"});
            //New Chosen($("chzn_select_field"),{no_results_text: "No results matched"});
        $("form#select_form").submit(function(){
            var cat = $("select#category option:selected").attr('value');
            var type = $("select#type option:selected").attr('value');
            if(cat>0 && type>0)
            {
                var result = $("select#type option:selected").html();
                $("#result").html('your choice: '+result);
            }
            else
            {
                $("#result").html("you must choose two options!");
            }
            return false;
        });
    });
    </script>
     
<script>
$(function() {
// run the currently selected effect
function runEffect() {
// get effect type from
var selectedEffect = $( "#effectTypes" ).val();
// most effect types need no options passed by default
var options = {};
// some effects have required parameters
if ( selectedEffect === "pulsate" ) {
options = { percent: 100 };
} else if ( selectedEffect === "size" ) {
options = { to: { width: 5000, height: 500 } };
}
// run the effect
$( "#effect" ).show( selectedEffect, options, 500, callback );
};
//callback function to bring a hidden box back
function callback() {
setTimeout(function() {
$( "#effect:visible" ).removeAttr( "style" ).fadeOut();
}, 1000 );
};
// set effect from select menu value
$( "#button" ).click(function() {
runEffect();
return false;
});
$( "#cancel" ).click(function() {
$( "#effect" ).hide();
return false;
});
$( "#effect" ).hide();
});
</script>
    <div class="toggler">
<div id="effect" class="ui-widget-content ui-corner-all">
<h3 class="ui-widget-header ui-corner-all">Ailments</h3>
 <?php include "select.class.php"?>
        <form id="select_form">
            Choose a category:<br />
            <select id="category" class="chzn-select" >
                <?php echo $opt->ShowCategory(); ?>
            </select>
        <br /><br />
        Choose a type:<br />
        <select id="type" class="czn-select">
             <!--<option value="0">choose...</option>-->
        </select>
        <br /><br />
        <input type="submit" value="Add" />
        <a href="#" id="cancel">cancel</a>

        </form>
        <div id="result"></div>

         </div>
</div>

<a href="#" id="button" class="ui-state-default ui-corner-all">Ailments</a>

