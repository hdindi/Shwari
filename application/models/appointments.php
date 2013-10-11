<?php
class appointments extends CI_Model{
	public function _construct(){
		parent::_construct();
		}
	public function appointments(){//Nurse
		
  		$query="SELECT patients.fname, patients.lname, patients.sname, visit.patientid,visit.visitdate, visit.id,
  		appointments.date,appointments.time,appointments.title,appointments.about
		FROM patients
		INNER JOIN visit
		ON patients.id=visit.patientid
		INNER JOIN appointments
		ON patients.id=appointments.patientid
		WHERE visit.lq = 'active'
		ORDER BY visit.visitdate";
		$result=$this->db->query($query);
		return $result->result_array();
	
		  
	 }
	}