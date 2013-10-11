<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login controller class
 */
class Login extends CI_Controller{
    
    function __construct(){
        parent::__construct();
    }
    
    public function index($msg = NULL){
        $this->load->library('form_validation','session');
        // Load our view to be displayed
        // to the user
        $data1['msg'] = $msg;
        //$this->load->view('login_view', $data1);
         $data['contents']='login_view';
         $finaldata = array_merge($data,$data1);
            $this->base_param($finaldata);
            $this->load->library('form_validation','session');
       
    }
    
    public function process(){
        // Load the model
        $this->load->model('login_model');
        // Validate the user can login
		//$this->password();
        $result = $this->login_model->validate();
        // Now we verify the result
		
        if(!$result){
			if($this->input->post('password',FALSE)=="123456"){
				$this->load->view('resetpassword_view');
				
				}
			else{
			
            $msg = '<font color=red>Invalid username and/or password.</font><br />';
            $this->index($msg);
			
			}
		
		}
        else{
            // If user did validate, 
            // Send them to members area
            redirect('home');
        }        
 
	}
        
        function base_param($data){
            $data['title']=' Login';
            $this->load->view('template',$data);
        }
}
?>