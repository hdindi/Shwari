<?php
class Doc_active extends CI_Model{
	public function _construct(){
		parent::_construct();
		}
	public function dactive(){//Doctor
		
		$query="SELECT patients.fname, visit.patientid, patients.lname, patients.sname, visit.visitdate, visit.id,visit.urgency, visit.results
		FROM patients
		INNER JOIN visit
		ON patients.id=visit.patientid
		WHERE visit.visitdate >= CURDATE()
		AND visit.dq = 'active'
		ORDER BY visit.visitdate ";
		$result=$this->db->query($query);
		return $result->result_array();
	
		
	}
	public function lactive(){//lab
		
		$query="SELECT patients.fname, visit.patientid, patients.lname, patients.sname, visit.visitdate, visit.id
		FROM patients
		INNER JOIN visit
		ON patients.id=visit.patientid
		WHERE visit.visitdate >= CURDATE()
		AND visit.lq = 'active'
		ORDER BY visit.visitdate ";
		$result=$this->db->query($query);
		return $result->result_array();
	
		
	}
	public function see_labs(){
		
							/*	$query="SELECT patients.fname, visit.patientid, patients.lname, patients.sname, visit.visitdate, visit.id, check_up.date
		FROM check_up
		INNER JOIN visit
		ON visit.id=check_up.visitid
		INNER JOIN patients
		ON patients.id=visit.patientid
		WHERE check_up.date>= CURDATE()
		AND check_up.lab_results IS NOT NULL";
		$result=$this->db->query($query);
		return $result->result_array();
		*/
	
		
	}
	public function see_history($patientid){
		$sql="SELECT employee.fname, employee.lname, triage.NurseID, triage.visitid, visit.visitdate, visit.id,triage.Weight, triage.Height, 
		triage.OCS, triage.diastle, triage.systle, triage.Temperature
			FROM triage
			INNER JOIN visit
			ON triage.visitid=visit.id
			INNER JOIN employee
			ON triage.NurseID = employee.id
            WHERE visit.patientid = '".$patientid."'
            ORDER BY visit.VisitDate DESC";
			$query=$this->db->query($sql);
			return $query->result_array();
		
		
		}
	public function see_visit($id)
	{
	$sql="SELECT employee.fname, employee.lname, triage.id ,triage.NurseID, triage.visitid, visit.visitdate, 
		visit.id,triage.Weight, triage.Height, triage.OCS, triage.diastle, triage.systle, triage.Temperature
			FROM triage
			INNER JOIN visit
			ON triage.visitid=visit.id
			INNER JOIN employee
			ON triage.NurseID = employee.id
            WHERE visit.id = '".$id."'";
			$query=$this->db->query($sql);
			return $query->result_array();
		
		}

		public function docdetails()
		{
			$empid=$this->session->userdata('id');
	        $sql="SELECT employee.fname, employee.lname, employee.email
			FROM employee
			WHERE employee.id = '".$empid."'";

			$query=$this->db->query($sql);
			return $query->result_array();
		
		}
	
	public function see_details($visit_id)
	{
		//$visit_id=$this->uri->segment(3);
	$query=$this->db->get_where('visit', array('id'=> $visit_id));
	// if($query->num_rows()==1){
		foreach($query->result_array() as $row){
			$patient_id=$row['patientid'];
			$sql=$this->db->get_where('patients',array('id'=> $patient_id));
			return $sql->result_array();
			//}
		}
	
			
}
public function test_details($visitid){
	$sql=$this->db->get_where('lab_test',array('visitid'=> $visitid));
	return $sql->result_array();
	}
	
public function consultation($id){
	$sql="SELECT employee.fname, employee.lname, check_up.docid, check_up.visitid, visit.patientid, visit.id, employee.id,
		check_up.date, check_up.systemic_inquiry, check_up.working_diagnosis, check_up.complaints,check_up.med_history
		FROM check_up
		INNER JOIN visit
		ON check_up.visitid=visit.id
		INNER JOIN employee
		ON check_up.docid = employee.id
		WHERE visit.id = '".$id."'";
		$query=$this->db->query($sql);
		return $query->result_array();
	}
public function getallergy($patient)
{
	$query="SELECT patient_allergy.allergy
		FROM patients
		INNER JOIN patient_allergy
		ON patients.id=patient_allergy.patient_id
		WHERE patient_allergy.patient_id = '".$patient."'";
		$result=$this->db->query($query);
		return $result->result_array();
}
public function checkup()
{
	    $docid=$this->session->userdata('id');
	
        $visitid=$this->input->post('visitid',TRUE);
        $visitid=mysql_real_escape_string($visitid);

		$Systemic=$this->input->post('systemic_inquiry',TRUE);
		$inquiry = str_replace(PHP_EOL,",", $Systemic);
		$Systemic_inquiry=mysql_real_escape_string($inquiry);
		
		$complaints=$this->input->post('complaints',TRUE);
		$Complaints = str_replace(PHP_EOL,",", $complaints);
		$COMPLAINTS=mysql_real_escape_string($Complaints);
		
		$med_history=$this->input->post('med_history',TRUE);
		$history = str_replace(PHP_EOL,",", $med_history);
		$Med_history=mysql_real_escape_string($history);
		
		$examination_findings=$this->input->post('examination_findings',TRUE);
		$examination = str_replace(PHP_EOL,",", $examination_findings);
		$findings=mysql_real_escape_string($examination);
		
		$remarks=$this->input->post('remarks',TRUE);
		$Remarks = str_replace(PHP_EOL,",", $remarks);
		$Remark=mysql_real_escape_string($Remarks);
		
		$working_diagnosis=$this->input->post('working_diagnosis',TRUE);
		$working_diagnosis = str_replace(PHP_EOL,",", $working_diagnosis);
		$workings=mysql_real_escape_string($working_diagnosis);

		$diagnosis=$this->input->post('diagnosis',TRUE);
		$diagnosis = str_replace(PHP_EOL,",", $diagnosis);
		$diagnosis=mysql_real_escape_string($diagnosis);

		$diff=$this->input->post('diff',TRUE);
		$diff = str_replace(PHP_EOL,",", $diff);
		$diff=mysql_real_escape_string($diff);
		
		$institute_field=$this->input->post('institute_field',TRUE);
		$institute_field=mysql_real_escape_string($institute_field);
		
		$this->db->set('visitid',$visitid);
		$this->db->set('docid',$docid);
		$this->db->set('complaints',$COMPLAINTS);
		$this->db->set('med_history',$Med_history);
		$this->db->set('systemic_inquiry',$Systemic_inquiry);
		$this->db->set('working_diagnosis',$workings);
		$this->db->set('diagnosis',$diagnosis);
		$this->db->set('diff',$diff);
		$this->db->set('examination_findings',$findings);
		$this->db->set('remarks',$Remark);
		$this->db->set('institute_field',$institute_field);
		
		
		$this->db->insert('check_up');
	
	
	}
	public function allergy()
	{
	$patientid=$this->input->post('patientid',TRUE);
	$patientid=mysql_real_escape_string($patientid);
	
	$allergy=$this->input->post('allergy',TRUE);
	$allergy=mysql_real_escape_string($allergy);
	
	if ($allergy != NULL)
		{
			$this->db->set('allergy',$allergy);
			$this->db->set('patient_id',$patientid);
		    $this->db->insert('patient_allergy');
		}
		{
		return false;
		}
	
	}


	public function order_labs()
	{
	$doc_id=$this->session->userdata('id');
	
	$visitid=$this->input->post('visitid',TRUE);
	$visitid=mysql_real_escape_string($visitid);
	
	$lab_tests=$this->input->post('test',TRUE);
	//$lab_tests=mysql_real_escape_string($lab_tests);
	
	foreach($lab_tests as $tests){
		
		$this->db->set('visitid',$visitid);
		$this->db->set('doc_id',$doc_id);
		$this->db->set('test',$tests);
		
		$this->db->insert('lab_test');
// Insert a record...
    }
	
    }
	public function appointments()
	{
	
	$empid=$this->session->userdata('id');
	//$doc_id=mysql_real_escape_string($docid);
	$patient=$this->input->post('patientid',TRUE);
	$patientid=mysql_real_escape_string($patient);
	//$patientid=intval($patient);
	
	$visitid=$this->input->post('visitid',TRUE);
	$Visitid=mysql_real_escape_string($visitid);
	
	$Appointment_date=$this->input->post('Date',TRUE);
	$date=date('Y-m-d', strtotime($Appointment_date));
	$Date=mysql_real_escape_string($date);
		
	$Appointment_Time=$this->input->post('time',TRUE);
	$time=mysql_real_escape_string($Appointment_Time);
		
	$Appointment_title=$this->input->post('Title',TRUE);
	$title=mysql_real_escape_string($Appointment_title);
		
	$About_appointment=$this->input->post('About',TRUE);
	$about=mysql_real_escape_string($About_appointment);
		
	$this->db->set('empid',$empid);
	$this->db->set('patientid',$patientid);
	$this->db->set('visitid',$Visitid);
	$this->db->set('Date',$Date);
	$this->db->set('Time',$time);
	$this->db->set('Title',$title);
	$this->db->set('About',$about);
	
	$this->db->insert('appointments');
	}
	
	public function refer()
	{
	
	$empid=$this->session->userdata('id');
	//$doc_id=mysql_real_escape_string($docid);
	$sub=$this->input->post('subject',TRUE);
	$subject=mysql_real_escape_string($sub);
	//$patientid=intval($patient);
	
	$visitid=$this->input->post('visitid',TRUE);
	$Visitid=mysql_real_escape_string($visitid);
	
	/*$Appointment_date=$this->input->post('Date',TRUE);
	$date=date('Y-m-d', strtotime($Appointment_date));
	$Date=mysql_real_escape_string($date);*/
		
	$send_email=$this->input->post('email',TRUE);
	$email=mysql_real_escape_string($send_email);
		
	$doc_email=$this->input->post('docemail',TRUE);
	$docemail=mysql_real_escape_string($doc_email);
		
	$mes_sage=$this->input->post('message',TRUE);
	$message=mysql_real_escape_string($mes_sage);
		
	$this->db->set('docid',$empid);
	//$this->db->set('patientid',$patientid);
	$this->db->set('visitid',$Visitid);
	$this->db->set('docemail',$docemail);
	$this->db->set('email',$email);
	$this->db->set('subject',$subject);
	$this->db->set('message',$message);
	
	$this->db->insert('refer');
	}
	

    public function lab_test(){
	$sql="Select * from tests";
	$query=$this->db->query($sql);
	return $query->result_array();
	
	}
	public function med_prescription(){
	$docid=$this->session->userdata('id');
	
	$visitid=$this->input->post('visitid',TRUE);
	$visitid=mysql_real_escape_string($visitid);
	
	$medicine=$this->input->post('medname',TRUE);
	$medname=mysql_real_escape_string($medicine);
	$amount=$this->input->post('amount',TRUE);
	$amount=mysql_real_escape_string($amount);
	$dosage=$this->input->post('dosage',TRUE);
	$meddosage=mysql_real_escape_string($dosage);
	$duration=$this->input->post('duration',TRUE);
	$medduration=mysql_real_escape_string($duration);
	$remarks=$this->input->post('remarks',TRUE);
	$medremarks=mysql_real_escape_string($remarks);
		
		
	$this->db->set('checkupid',$visitid);
	$this->db->set('docid',$docid);
	$this->db->set('medname',$medname);
	$this->db->set('amount',$amount);
	$this->db->set('dosage',$meddosage);
	$this->db->set('duration',$medduration);
	$this->db->set('remarks',$medremarks);
	//$this->db->set('provisional',$provisional);
	
	$this->db->insert('prescription');
    }
	public function ToLab($id)
	{
		$today = date("H:i:s");
		$data = array(
		'dq' => 'in-active',
		'dend' => $today,
		'lq' => 'active',
		'lstart' => $today
		);
		$this->db->where('id', $id);
		$this->db->update('visit', $data);
		
		}
	public function ToPha($id)
	{
		$today = date("H:i:s");
		$data = array(
		'pq' => 'active',
		'pstart' => $today,
		'dq' => 'in-active',
		'dend' => $today
         );
		$this->db->where('id', $id);
		$this->db->update('visit', $data);
	
		}
	public function Finish($id)
	{
		$today = date("H:i:s");
		$data = array(
        'dq' => 'in-active',
        'dend' => $today
         );
		$this->db->where('id', $id);
		$this->db->update('visit', $data);
	}
	public function labs($id){
		$query=$this->db->get_where('check_up',array('visitid'=> $id));
		return $query->result_array();
		}
	public function diagnosis()
	{
		$id=$this->input->post('visitid');
		$visitid=mysql_real_escape_string($id);
		
		$diagnose=$this->input->post('diagnosis',TRUE);
		$diagnosis=mysql_real_escape_string($diagnose);
		
		$data=array(
		'diagnosis'=> $diagnosis
		);
		
		$this->db->where('visitid',$id);
		$this->db->update('check_up',$data);
	
	}
		public function package()
	{
		$sql="SELECT * FROM `packages` WHERE type IS NULL";
		$query=$this->db->query($sql);
		return $query->result_array();
	}
		public function meds()
	{
		$query="SELECT medicines.code,medicines.Medicine_name, 
		medicines.strength, medicines.units, medicines.price, medicines.stock_in_hand, medicines.min_amount
		FROM medicines";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function name($patientid){
		$query=$this->db->get_where('patients',array('id'=> $patientid));
		return $query->result_array();
		
		}
		
		public function see_appointments(){

		$empid = $this->session->userdata('id');
		
		$query="SELECT patients.fname, appointments.patientid, patients.lname, patients.sname,
		appointments.empid, appointments.visitid, appointments.Date, appointments.Time,
		appointments.About, appointments.Title, patients.phone
		FROM appointments
		INNER JOIN patients
		ON appointments.patientid=patients.id
		INNER JOIN employee
		ON employee.id=appointments.empid
		WHERE appointments.Date=CURDATE()
		AND employee.id='".$empid."'
		ORDER BY appointments.Time";

		$result=$this->db->query($query);
		return $result->result_array();
		
		}	
	public function check_consult($id){
		$Sql="Select * from check_up where visitid='".$id."'";
		$result=$this->db->query($Sql);
		return $result->result_array();
		}
	public function update_consult(){
		$docid=$this->session->userdata('id');
	
		
	   $visitid=$this->input->post('visitid',TRUE);
	   $visitid=mysql_real_escape_string($visitid);
	   $complaints=$this->input->post('complaints',TRUE);
	   $complaints=mysql_real_escape_string($complaints);
	   $med_history=$this->input->post('med_history',TRUE);
	   $med_history=mysql_real_escape_string($med_history);
	   $systemic_inquiry=$this->input->post('systemic_inquiry',TRUE);
	   $systemic_inquiry=mysql_real_escape_string($systemic_inquiry);
	   $examination_findings=$this->input->post('examination_findings',TRUE);
	   $examination_findings=mysql_real_escape_string($examination_findings);
	   $working_diagnosis=$this->input->post('working_diagnosis',TRUE);
	   $working_diagnosis=mysql_real_escape_string($working_diagnosis);
		
		$data=array(
		'complaints'=> $complaints,
		'med_history'=> $med_history,
		'systemic_inquiry'=> $systemic_inquiry,
		'examination_findings'=> $examination_findings,
		'working_diagnosis'=> $working_diagnosis
		
		);
		$this->db->where('visitid',$visitid);
		$this->db->update('check_up',$data);
		if ($this->db->affected_rows() == '1')
		{
			
			return TRUE;
		}
		
		return FALSE;
	
		
		}
		public function prescription_history($id){
		$que="SELECT prescription.medname, prescription.dosage, prescription.duration, prescription.id,
		prescription.remarks, prescription.administeredstatus, employee.Fname, prescription.amount,
		employee.Sname, employee.Lname, prescription.docid, medicines.code,medicines.Medicine_name, 
		medicines.strength, medicines.units, medicines.price
		FROM prescription
		INNER JOIN medicines ON prescription.medname = medicines.code
		INNER JOIN employee ON employee.id = prescription.docid
		INNER JOIN visit ON prescription.checkupid = visit.id
		INNER JOIN patients ON visit.patientid=patients.id
		WHERE patients.id ='".$id."'";

		$result=$this->db->query($que);
		return $result->result_array();
			}
		public function lab_history($id){
			$sql="SELECT lab_test.test, lab_test.result,lab_test.doc_id,lab_test.labtechid ,employee.fname,employee.lname,employee.sname,lab_test.visitid
			FROM lab_test
			INNER JOIN employee ON employee.id=lab_test.doc_id
			INNER JOIN Visit ON visit.id=lab_test.visitid
			INNER JOIN patients ON patients.id=visit.patientid
			WHERE patients.id='".$id."'";
			
			$result=$this->db->query($sql);
		   return $result->result_array();
			}
		public function visit_presc($id){
		$que="SELECT prescription.medname, prescription.dosage, prescription.duration, prescription.id,
		prescription.remarks, prescription.administeredstatus, employee.Fname, prescription.amount,
		employee.Sname, employee.Lname, prescription.docid, medicines.code,medicines.Medicine_name, 
		medicines.strength, medicines.units, medicines.price
		FROM prescription
		INNER JOIN medicines ON prescription.medname = medicines.code
		INNER JOIN employee ON employee.id = prescription.docid
		INNER JOIN visit ON prescription.checkupid = visit.id
		INNER JOIN patients ON visit.patientid=patients.id
		WHERE prescription.checkupid ='".$id."'";

		$result=$this->db->query($que);
		return $result->result_array();
		}
}
	
?>