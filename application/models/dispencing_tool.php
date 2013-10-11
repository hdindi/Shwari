<?php
class dispencing_tool extends CI_Model{
	public function _construct(){
		parent::_construct();
		}

		 public function pactive(){//pharm
		
  		$query="SELECT patients.fname, visit.patientid, patients.lname, patients.sname, visit.visitdate, visit.id
		FROM patients
		INNER JOIN visit
		ON patients.id=visit.patientid
		WHERE visit.visitdate >= CURDATE()
		AND visit.pq = 'active'
		ORDER BY visit.visitdate ";
		$result=$this->db->query($query);
		return $result->result_array();
	
		  
	 }
	 

	}