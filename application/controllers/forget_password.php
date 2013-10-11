<?php
class Forget_password extends CI_Controller{
	public function _construct(){
		parent::_construct();
		}
	function index(){
            $this->load->library('form_validation','session');
		$this->load->view('reset_password');
		
		//redirect('change');
	}
	function change($id){
		$repid=$this->session->userdata('id');
		if($repid){
		$id=$this->uri->segment(3);
		$this->mreset->password_reset($id);
		redirect('admin/employee_management');
			}
	else{
		redirect('login');
        }
		
	}
	function new_password(){
		$this->mreset->password();
		redirect('login');
		
			}
	
}

?>