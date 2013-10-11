<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><html>
<body>
<h1><?php echo $heading?></h1>
<img src=".../temp/test.png"/>
<?php echo $graph;?>
</body>
</html>