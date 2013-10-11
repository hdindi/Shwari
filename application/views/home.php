<?php if($this->session->userdata('id')){
                 
     //redirect('/adminhome');
    
            }else{ 
                redirect('/login');
                ?>
     
        <?php }?><?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index()
	{
            $data['contents']='home';
            $this->base_param($data);
	}
        
        
        
        
        
        
        
        
        
        function base_param($data){
            $data['title']='Home';
            $this->load->view('template',$data);
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */