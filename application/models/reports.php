<?php
class Reports extends CI_Model{
	public function _construct(){
		parent::_construct();
		}
	public function all_patients(){
		$query=$this->db->get('patients');
		return $query->result_array();
		}
	public function visits(){
		$query="SELECT patients.fname, visit.patientid, patients.lname, patients.sname, visit.visitdate, visit.id
			FROM patients
			INNER JOIN visit ON patients.id = visit.patientid
			WHERE visit.visitdate >= DATE_ADD( CURDATE( ) , INTERVAL -1
			MONTH )
			AND visit.nq = 'active'
			ORDER BY visit.visitdate
			LIMIT 6";
		$result=$this->db->query($query);
		return $result->result_array();
		}
	public function all_payments(){
		
		$query="Select patients.fname, patients.lname, patients.sname, visit.id, visit.patientid,
		payments.cost AS labs, pharm_payments.cost AS pharm, packages.cost AS package,visit.VisitDate
		FROM patients 
		LEFT JOIN visit ON visit.patientid=patients.id
		LEFT JOIN costs ON visit.id=costs.visitid
		LEFT JOIN packages ON costs.package=packages.id
		LEFT JOIN payments ON payments.visitid=visit.id
		LEFT JOIN pharm_payments ON pharm_payments.visitid=visit.id
		ORDER BY visit.VisitDate";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	
	public function payments(){
		$month=$this->input->post('month');
	 
		$query="Select patients.fname, patients.lname, patients.sname, visit.id, visit.patientid,
		payments.cost AS labs, pharm_payments.cost AS pharm, packages.cost AS package, EXTRACT(MONTH FROM visit.VisitDate) AS month,visit.VisitDate
		FROM patients 
		LEFT JOIN visit ON visit.patientid=patients.id
		LEFT JOIN costs ON visit.id=costs.visitid
		LEFT JOIN packages ON costs.package=packages.id
		LEFT JOIN payments ON payments.visitid=visit.id
		LEFT JOIN pharm_payments ON pharm_payments.visitid=visit.id
		WHERE Extract(MONTH FROM visit.VisitDate)='".$month."'
		ORDER BY visit.VisitDate";
		$result=$this->db->query($query);
		return $result->result_array();
			
	}
	public function paymentsbydate(){
		$date=$this->input->post('Date');
		$date=date('Y-m-d', strtotime($date));
		$Date=mysql_real_escape_string($date);
	
		$query="Select patients.fname, patients.lname, patients.sname, visit.id, visit.patientid,
		payments.cost AS labs, pharm_payments.cost AS pharm, packages.cost AS package,visit.VisitDate
		FROM patients 
		LEFT JOIN visit ON visit.patientid=patients.id
		LEFT JOIN costs ON visit.id=costs.visitid
		LEFT JOIN packages ON costs.package=packages.id
		LEFT JOIN payments ON payments.visitid=visit.id
		LEFT JOIN pharm_payments ON pharm_payments.visitid=visit.id
		WHERE Date(visit.VisitDate)='".$date."'
		ORDER BY visit.VisitDate";
		$result=$this->db->query($query);
		return $result->result_array();
			
	}
	public function labpayments(){
	
		$query="Select DISTINCT  patients.fname, patients.lname, patients.sname, visit.id, visit.patientid,
		payments.cost,visit.VisitDate
		FROM payments
		INNER JOIN visit ON payments.visitid=visit.id
		LEFT JOIN patients ON visit.patientid=patients.id
		ORDER BY visit.VisitDate";
		$result=$this->db->query($query);
		return $result->result_array();
	//	}
		 
	}	
	public function labpaymentsbydate(){
		$date=$this->input->post('Date');
		$date=date('Y-m-d', strtotime($date));
		$Date=mysql_real_escape_string($date);
		
		$query="Select DISTINCT  patients.fname, patients.lname, patients.sname, visit.id, visit.patientid,
		payments.cost,visit.VisitDate
		FROM payments
		INNER JOIN visit ON payments.visitid=visit.id
		LEFT JOIN patients ON visit.patientid=patients.id
		WHERE Date(visit.VisitDate)='".$Date."'
		ORDER BY visit.VisitDate";
		$result=$this->db->query($query);
		return $result->result_array();
		//	}
	}
	public function labpaymentsbymonth(){
		$month=$this->input->post('month');
		
		$query="Select DISTINCT  patients.fname, patients.lname, patients.sname, visit.id, visit.patientid,
		payments.cost,visit.VisitDate
		FROM payments
		INNER JOIN visit ON payments.visitid=visit.id
		LEFT JOIN patients ON visit.patientid=patients.id
		WHERE EXTRACT(MONTH FROM visit.VisitDate)='".$month."'
		ORDER BY visit.VisitDate";
		$result=$this->db->query($query);
		return $result->result_array();
		//	}
	}
	public function pharm_paymentsbydate(){
		$date=$this->input->post('Date');
		$date=date('Y-m-d', strtotime($date));
		$Date=mysql_real_escape_string($date);

		$query="Select DISTINCT  patients.fname, patients.lname, patients.sname, visit.id, visit.patientid,
		pharm_payments.cost,visit.VisitDate
		FROM pharm_payments 
		INNER JOIN visit ON pharm_payments.visitid=visit.id
		LEFT JOIN patients ON visit.patientid=patients.id
		WHERE Date(visit.VisitDate)='".$Date."'
		ORDER BY visit.VisitDate";
		$result=$this->db->query($query);
		return $result->result_array();
			
	}
	public function pharm_paymentsbymonth(){
		$month=$this->input->post('month');
	
		$query="Select DISTINCT  patients.fname, patients.lname, patients.sname, visit.id, visit.patientid,
		pharm_payments.cost,visit.VisitDate
		FROM pharm_payments 
		INNER JOIN visit ON pharm_payments.visitid=visit.id
		LEFT JOIN patients ON visit.patientid=patients.id
		WHERE Extract(MONTH FROM visit.VisitDate)='".$month."'
		ORDER BY visit.VisitDate";
		$result=$this->db->query($query);
		return $result->result_array();
			
	}
	public function pharm_payments(){

		$query="Select DISTINCT  patients.fname, patients.lname, patients.sname, visit.id, visit.patientid,
		pharm_payments.cost,visit.VisitDate
		FROM pharm_payments 
		INNER JOIN visit ON pharm_payments.visitid=visit.id
		LEFT JOIN patients ON visit.patientid=patients.id
		ORDER BY visit.VisitDate";
		$result=$this->db->query($query);
		return $result->result_array();
			
	}
	public function patient_report($id){
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
	

	
}