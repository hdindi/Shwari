<?php
class Mactive extends CI_Model{
	public function _construct(){
		parent::_construct();
		}
	public function nactive(){//Nurse
		
  		$query="SELECT visit.id,patients.fname, visit.patientid, patients.lname, 
		patients.sname, visit.visitdate
		FROM patients
		INNER JOIN visit
		ON patients.id=visit.patientid
		INNER JOIN costs
		ON visit.id=costs.visitid
		WHERE visit.visitdate >= CURDATE()
		AND visit.nq = 'active'
		ORDER BY visit.visitdate ";
		$result=$this->db->query($query);
		return $result->result();
	
		  
	 }
	 public function dactive(){//Doctor
		
  		$query="SELECT patients.fname, visit.patientid, patients.lname, patients.sname, visit.visitdate, visit.id
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


	public function see_history($id)
	{
		$sql="SELECT employee.fname, employee.lname, triage.NurseID, triage.visitid, visit.visitdate, visit.id,triage.Weight, triage.Height, 
			triage.OCS, triage.diastle, triage.systle,triage.Temperature
            FROM triage
            INNER JOIN visit
            ON triage.visitid=visit.id
            INNER JOIN employee
            ON triage.NurseID = employee.id
            WHERE visit.patientid = '".$id."'";
			$query=$this->db->query($sql);
			return $query->result_array();
		//$query=$this->db->get_where('visit',array('patientid'=> $patientid));
		//$result=$this->db->query($query);
		//return $query->result_array();
		
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
	public function see_visit($id)
	{
	
		$query=$this->db->get_where('triage',array('visitid'=> $id));
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
	public function triage(){
		$Nurseid=$this->session->userdata('id');
		
		$visitid=$this->input->post('visitid',TRUE);
		$visitid=mysql_real_escape_string($visitid);

		$patientid=$this->input->post('patientid',TRUE);
		$patientid=mysql_real_escape_string($patientid);
	
		$Height=$this->input->post('Height',TRUE);
		$Height=mysql_real_escape_string($Height);

		$diastle=$this->input->post('diastle',TRUE);
		$diastle=mysql_real_escape_string($diastle);

		$systle=$this->input->post('systle',TRUE);
		$systle=mysql_real_escape_string($systle);

		$Temperature=$this->input->post('Temperature',TRUE);
		$Temperature=mysql_real_escape_string($Temperature);
		
		$Weight=$this->input->post('Weight',TRUE);
		$Weight=mysql_real_escape_string($Weight);

		$OCS=$this->input->post('OCS',TRUE);
		$OCS=mysql_real_escape_string($OCS);
		
		//$urgency=mysql_real_escape_string($urgency);
	

	$this->db->set('visitid',$visitid);
	$this->db->set('NurseID',$Nurseid);
	$this->db->set('Weight',$Weight);
	$this->db->set('Height',$Height);
	$this->db->set('diastle',$diastle);
	$this->db->set('systle',$systle);
	$this->db->set('Temperature',$Temperature);
	$this->db->set('OCS',$OCS);
	
	$this->db->insert('triage');
	if($this->db->affected_rows()){
			$this->urgent($visitid);
			}

}

	public function urgent($id)
	{
        $urgent=$this->input->post('urgency',TRUE);

        $data=array(
		'urgency'=>$urgent
		);
		$this->db->where('id',$id);
		$this->db->update('visit',$data); 
	}

    public function ToDoc($id)
	{
		$today = date("H:i:s");
		$data = array(
               'dq' => 'active',
               'dstart' => $today,
               'nq' => 'in-active',
               'nend' => $today
            );

		$this->db->where('id', $id);
		$this->db->update('visit', $data); 

	}	
	public function Finish($id)
	{
		$today = date("H:i:s");
		$data = array(
               'nq' => 'in-active',
               'nend' => $today
            );

		$this->db->where('id', $id);
		$this->db->update('visit', $data); 
	}
	public function name($patientid){
		$query=$this->db->get_where('patients',array('id'=> $patientid));
		return $query->result_array();
		
		}
	public function see_appointments(){
		$empid = $this->session->userdata('id');
		$sql="SELECT patients.fname, patients.lname, patients.sname,patients.phone, visit.visitdate, visit.id, 
		appointments.About,appointments.Time
		FROM appointments
		INNER JOIN visit
		ON appointments.visitid=visit.id
		INNER JOIN patients
		ON appointments.patientid=patients.id
		INNER JOIN employee
		ON appointments.empid=employee.id
		WHERE appointments.Date = CURDATE()
		AND employee.id='".$empid."'
		ORDER BY appointments.Time";
		$result=$this->db->query($sql);
		return $result->result_array();
		}
		
}
	
?>