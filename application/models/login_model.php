<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Login_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	public function validate(){
		
		// grab user input
		$username = $this->security->xss_clean($this->input->post('username'));
		$password = $this->security->xss_clean($this->input->post('password'));
		$Enc_password=md5($password);
		
		// Prep the query
		$this->db->where('username', $username);
		$this->db->where('password', $Enc_password);
		$this->db->where('status', "active");
		// Run the query
		$query = $this->db->get('employee');
		
		if($password=="123456"){
			return false;
			}
		
		if($query->num_rows() == 1)
		{
			// If there is a user, then create session data
			$row = $query->row();
			$data = array(
					'id' => $row->id,
					'Fname' => $row->Fname,
					'Lname' => $row->Lname,
					'username' => $row->username,
					'type' => $row->type,
					'validated' => true
					);
			$this->session->set_userdata($data);
			
			$this->db->set('empid',$row->id);
			$this->db->set('Username',$row->username);
			$this->db->insert('login_logs');
			return true;
		}
		// If the previous process did not validate
		// then return false.
		return false;
	}
	
		
}
?>