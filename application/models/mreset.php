<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mreset extends CI_Model{
	public function _construct(){
		parent::_construct();
		}
	public function password(){
		$username=$this->input->post('username',TRUE);
		$password=$this->input->post('password',TRUE);
		
		$query=$this->db->get_where('employee',array('username'=> $username));
		if($query->num_rows()==1){
			foreach($query->result_array() as $row){
				$id=$row['id'];
				
			$Enc_password=md5($password);
			$data=array(
			'password'=>$Enc_password 
			);
	  		$this->db->where('id',$id);
	  		$this->db->update('employee',$data); 
				}
			}	
	  
	}
	public function password_reset($id){
		$password="123456";
		$Enc_password=md5($password);
		$data=array(
		'password'=> $Enc_password
		);
			$this->db->where('id',$id);
			$this->db->update('employee',$data);
		}
	
	
}
	

	
?>