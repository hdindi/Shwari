<?php
class Admin_active extends CI_Model{
	public function _construct(){
		parent::_construct();
		}
	public function nactive(){//Nurse
		
  		$query="SELECT patients.fname, visit.patientid, patients.lname, patients.sname, visit.visitdate, visit.id,visit.nq
		FROM patients
		INNER JOIN visit
		ON patients.id=visit.patientid
		WHERE visit.visitdate >= CURDATE()
		AND visit.nq = 'active'
		ORDER BY visit.visitdate ";
		$result=$this->db->query($query);
		return $result->result_array();
	
		  
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


	public function see_history($id){
		$sql="SELECT employee.fname, employee.lname, triage.NurseID, triage.visitid, visit.visitdate, visit.id,triage.Weight, triage.Height, triage.OCS, triage.allergies, triage.BP, triage.Temperature
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

    public function depato(){
	    $sql="Select type from employee";
	    $query=$this->db->query($sql);
	    return $query->result_array();
	}
	

	public function see_visit($id){
	
		$query=$this->db->get_where('triage',array('visitid'=> $id));
		return $query->result_array();
		
		    }
	public function see_details($visit_id){
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
	
		$Height=$this->input->post('Height',TRUE);
		$Height=mysql_real_escape_string($Height);
		$BP=$this->input->post('BP',TRUE);
		$BP=mysql_real_escape_string($BP);
		$Temperature=$this->input->post('Temperature',TRUE);
		$Temperature=mysql_real_escape_string($Temperature);
		//$BMI=$this->input->post('BMI',TRUE);
		//$BMI=mysql_real_escape_string($BMI);
		$Weight=$this->input->post('Weight',TRUE);
		$Weight=mysql_real_escape_string($Weight);
		$allergies=$this->input->post('allergies',TRUE);
		$allergies=mysql_real_escape_string($allergies);
		$OCS=$this->input->post('OCS',TRUE);
		$OCS=mysql_real_escape_string($OCS);
		
	$this->db->set('visitid',$visitid);
	$this->db->set('NurseID',$Nurseid);
	$this->db->set('Weight',$Weight);
	$this->db->set('Height',$Height);
	$this->db->set('BP',$BP);
	$this->db->set('Temperature',$Temperature);
	//$this->db->set('BMI',$BMI);
	$this->db->set('allergies',$allergies);
	$this->db->set('OCS',$OCS);
	
	$this->db->insert('triage');
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}

	public function addEmp()
	{
	$Fname=$this->input->post('Fname',TRUE);
	$Fname=mysql_real_escape_string($Fname);
	
	$Sname=$this->input->post('Sname',TRUE);
	$Sname=mysql_real_escape_string($Sname);

	$Lname=$this->input->post('Lname',TRUE);
	$Lname=mysql_real_escape_string($Lname);

	$DOB=$this->input->post('DOB',TRUE);
	$DOB=mysql_real_escape_string($DOB);

	$sex=$this->input->post('sex',TRUE);
	$sex=mysql_real_escape_string($sex);

	$NationalID=$this->input->post('NationalID',TRUE);
	$NationalID=mysql_real_escape_string($NationalID);
	
	$phone=$this->input->post('phone',TRUE);
	$phone=mysql_real_escape_string($phone);

	$residence=$this->input->post('residence',TRUE);
	$residence=mysql_real_escape_string($residence);

	$Email=$this->input->post('Email',TRUE);
	$Email=mysql_real_escape_string($Email);

	$username=$this->input->post('username',TRUE);
	$username=mysql_real_escape_string($username);

	$password=$this->input->post('password',TRUE);
	$new_password=md5($password);
	$new_password=mysql_real_escape_string($new_password);

	$status=$this->input->post('status',TRUE);
	$status=mysql_real_escape_string($status);

	$type=$this->input->post('type',TRUE);
	$type=mysql_real_escape_string($type);

	
	$this->db->set('Fname',$Fname);
	$this->db->set('Sname',$Sname);
	$this->db->set('Lname',$Lname);
	$this->db->set('DOB',$DOB);
	$this->db->set('sex',$sex);
	$this->db->set('NationalID',$NationalID);
	$this->db->set('phone',$phone);
	$this->db->set('residence',$residence);	
	$this->db->set('Email',$Email);
	$this->db->set('username',$username);
	$this->db->set('password',$new_password);
	$this->db->set('status',$status);
	$this->db->set('type',$type);
		
	
	$this->db->insert('employee');
	}

    public function ToDoc($id)
	{
		$data = array(
               'dq' => 'active'
            );

		$this->db->where('id', $id);
		$this->db->update('visit', $data); 

		$dat = array(
               'nq' => 'in-active'
            );

		$this->db->where('id', $id);
		$this->db->update('visit', $dat); 
	}	
	public function Finish($id)
	{
		$dat = array(
               'nq' => 'in-active'
            );

		$this->db->where('id', $id);
		$this->db->update('visit', $dat); 
	}
}
	
?>