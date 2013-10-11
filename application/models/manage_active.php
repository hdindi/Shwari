<?php
class Manage_active extends CI_Model{
	public function _construct(){
		parent::_construct();
		}
    public function visits()
    {
        $query="Select DISTINCT patients.fname,patients.lname,patients.sname,visit.VisitDate,lab_test.test,lab_test.result,
		prescription.medname,prescription.dosage,prescription.duration,prescription.remarks,
		pharm_payments.cost AS pharm,payments.cost as labs,packages.cost
		FROM patients
		LEFT JOIN visit ON visit.patientid=patients.id
		RIGHT JOIN prescription ON prescription.checkupid=visit.id
		LEFT JOIN lab_test ON lab_test.visitid=visit.id
		LEFT JOIN pharm_payments ON pharm_payments.visitid=visit.id
		LEFT JOIN payments ON payments.visitid=visit.id
		LEFT JOIN costs ON visit.id=costs.visitid
		LEFT JOIN packages ON costs.package=packages.id
		WHERE visit.id='".$id."'";
		
		$result=$this->db->query($query);
		return $result->result_array();
    }
	public function login_logs(){
		$sql="Select * from login_logs";
		$result=$this->db->query($sql);
		return $result->result_array();
		
       }
}
?>