<?php
class Model_calendar extends CI_Model{
	public function _construct(){
		parent::_construct();
		}
	public function get_appointments(){
		$query=$this->db->get('appointments');
		return $query->result_array();
		}
}
?>