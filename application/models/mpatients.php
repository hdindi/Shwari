<?php

class Mpatients extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	public function bio_data($patientid){
		$sql=$this->db->get_where('patients',array('id'=> $patientid));
		return $sql->result_array();

	}
	public function triage($patientid){
		$sql="SELECT employee.fname, employee.lname, triage.id ,triage.NurseID, triage.visitid, visit.visitdate, visit.id,triage.Weight, triage.Height, triage.OCS, triage.allergies, triage.diastle, triage.systle, triage.Temperature
			  FROM triage
			  INNER JOIN visit
			  ON triage.visitid=visit.id
			  INNER JOIN employee
			  ON triage.NurseID = employee.id
              WHERE visit.patientid = '".$patientid."'";
			$query=$this->db->query($sql);
			return $query->result_array();
		}
		public function consultation($patientid){
	$sql="SELECT employee.fname, employee.lname, check_up.docid, check_up.visitid, visit.patientid, visit.id, employee.id,
		  	check_up.date, check_up.systemic_inquiry, check_up.working_diagnosis, check_up.complaints,check_up.med_history
		  	FROM check_up
		 	INNER JOIN visit
         	ON check_up.visitid=visit.id
			INNER JOIN employee
         	ON check_up.docid = employee.id
			WHERE visit.patientid = '".$patientid."'";
			$query=$this->db->query($sql);
			return $query->result_array();
	}
	public function test($patientid){
		$sql="SELECT lab_test.test, lab_test.result, visit.id, lab_test.visitid, visit.patientid
			FROM lab_test
			INNER JOIN visit
          	ON lab_test.visitid = visit.id
			WHERE visit.patientid = '".$patientid."'";
			$query=$this->db->query($sql);
			return $query->result_array();
		}

}
?>