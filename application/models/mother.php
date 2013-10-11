<?php
class Mother extends CI_Model{
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
    public function patient_details($patientid){
	 
	 $sql=$this->db->get_where('patients',array('id'=> $patientid));
	return $sql->result_array();
	 }
	
     public function add_profile(){
		$Nurseid=$this->session->userdata('id');
		
		$patientid=$this->input->post('patientid',TRUE);
		$patientid=mysql_real_escape_string($patientid);
		
		
		$Institution=$this->input->post('Institution',TRUE);
		$Institution=mysql_real_escape_string($Institution);
		
		$no_of_anc=$this->input->post('no_of_anc',TRUE);
		$no_of_anc=mysql_real_escape_string($no_of_anc);

		$Gravida=$this->input->post('Gravida',TRUE);
		$Gravida=mysql_real_escape_string($Gravida);

		$Parity=$this->input->post('Parity',TRUE);
		$Parity=mysql_real_escape_string($Parity);

		$Height=$this->input->post('Height',TRUE);
		$Height=mysql_real_escape_string($Height);
		
		$LMP=$this->input->post('LMP',TRUE);
		$LMP=mysql_real_escape_string($LMP);

		$EDD=$this->input->post('EDD',TRUE);
		$EDD=mysql_real_escape_string($EDD);

		$Education=$this->input->post('Education',TRUE);
		$Education=mysql_real_escape_string($Education);

		$Occupation=$this->input->post('Occupation',TRUE);
		$Occupation=mysql_real_escape_string($Occupation);

		$NOK=$this->input->post('Next_of_Kin',TRUE);
		$NOK=mysql_real_escape_string($NOK);
		
		$NOK_contacts=$this->input->post('NOK_contacts',TRUE);
		$NOK_contacts=mysql_real_escape_string($NOK_contacts);
		
		$Relationship=$this->input->post('Relationship',TRUE);
		$Relationship=mysql_real_escape_string($Relationship);
		
	$this->db->set('patientid',$patientid);
	$this->db->set('NurseID',$Nurseid);
	$this->db->set('Institution',$Institution);
	$this->db->set('no_of_anc',$no_of_anc);
	$this->db->set('Gravida',$Gravida);
	$this->db->set('Parity',$Parity);
	$this->db->set('Height',$Height);
	$this->db->set('LMP',$LMP);
	$this->db->set('EDD',$EDD);
	$this->db->set('Education',$Education);
	$this->db->set('Occupation',$Occupation);
	$this->db->set('Next_of_Kin',$NOK);
	$this->db->set('NOK_contacts',$NOK_contacts);
    $this->db->set('Relationship',$Relationship);
	
	$this->db->insert('maternal');
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
	public function med_history(){
		$Nurseid=$this->session->userdata('id');
		
		$patientid=$this->input->post('patientid',TRUE);
		$patientid=mysql_real_escape_string($patientid);
	
		$surgical_operation=$this->input->post('surgical_operation',TRUE);
		$surgical_operation=mysql_real_escape_string($surgical_operation);

		$diabetes=$this->input->post('Diabetes',TRUE);
		$diabetes=mysql_real_escape_string($diabetes);

		$Hypertension=$this->input->post('Hypertension',TRUE);
		$Hypertension=mysql_real_escape_string($Hypertension);

		$Blood=$this->input->post('Blood_transfusion',TRUE);
		$Blood=mysql_real_escape_string($Blood);
		
		$Tuberclosis=$this->input->post('Tuberclosis',TRUE);
		$Tuberclosis=mysql_real_escape_string($Tuberclosis);

		$drug_allergy=$this->input->post('Drug_allergy',TRUE);
		$drug_allergy=mysql_real_escape_string($drug_allergy);

		$family_history=$this->input->post('family_history',TRUE);
		$family_history=mysql_real_escape_string($family_history);

		
	$this->db->set('patientid',$patientid);
	$this->db->set('nurseid',$Nurseid);
	$this->db->set('surgical_operation',$surgical_operation);
	$this->db->set('Diabetes',$diabetes);
	$this->db->set('Hypertension',$Hypertension);
	$this->db->set('Blood_transfusion',$Blood);
	$this->db->set('Tuberclosis',$Tuberclosis);
	$this->db->set('Drug_allergy',$drug_allergy);
	$this->db->set('family_history',$family_history);
	
	
	$this->db->insert('maternal_history');
		}
	public function pregnancy_history(){
		$Nurseid=$this->session->userdata('id');
		
		$patientid=$this->input->post('patientid',TRUE);
		$patientid=mysql_real_escape_string($patientid);
	
		$pregnancy_order=$this->input->post('pregnancy_order',TRUE);
		$pregnancy_order=mysql_real_escape_string($pregnancy_order);

		$year=$this->input->post('year',TRUE);
		$year=mysql_real_escape_string($year);
		
		$maturity=$this->input->post('maturity',TRUE);
		$maturity=mysql_real_escape_string($maturity);
		
		$labour_duration=$this->input->post('labour_duration',TRUE);
		$labour_duration=mysql_real_escape_string($labour_duration);

		$no_of_anc=$this->input->post('no_of_anc',TRUE);
		$no_of_anc=mysql_real_escape_string($no_of_anc);
		
		$delivery_type=$this->input->post('deliver_type',TRUE);
		$delivery_type=mysql_real_escape_string($delivery_type);

		$delivery_place=$this->input->post('delivery_place',TRUE);
		$delivery_place=mysql_real_escape_string($delivery_place);
		
		$birth_weight=$this->input->post('birth_weight',TRUE);
		$birth_weight=mysql_real_escape_string($birth_weight);

		$sex=$this->input->post('sex',TRUE);
		$sex=mysql_real_escape_string($sex);

		$outcome=$this->input->post('outcome',TRUE);
		$outcome=mysql_real_escape_string($outcome);
		
		$puerperium=$this->input->post('puerperium',TRUE);
		$puerperium=mysql_real_escape_string($puerperium);

		
	$this->db->set('patientid',$patientid);
	$this->db->set('nurseid',$Nurseid);
	$this->db->set('pregnancy_order',$pregnancy_order);
	$this->db->set('year',$year);
	$this->db->set('maturity',$maturity);
	$this->db->set('labour_duration',$labour_duration);
	$this->db->set('delivery_type',$delivery_type);
	$this->db->set('no_of_anc',$no_of_anc);
	$this->db->set('delivery_place',$delivery_place);
	$this->db->set('birth_weight',$birth_weight);
	$this->db->set('sex',$sex);
	$this->db->set('outcome',$outcome);
	$this->db->set('puerperium',$puerperium);
	
	$this->db->insert('pregnancy_history');
		}
	public function physical_examinations(){
		$nurseid=$this->session->userdata('id');
		
		$patientid=$this->input->post('patientid',TRUE);
		$patientid=mysql_real_escape_string($patientid);
	
		$general=$this->input->post('general',TRUE);
		$general=mysql_real_escape_string($general);

		$blood_pressure=$this->input->post('blood_pressure',TRUE);
		$blood_pressure=mysql_real_escape_string($blood_pressure);

		$height=$this->input->post('height',TRUE);
		$height=mysql_real_escape_string($height);
		
		$cvs=$this->input->post('cvs',TRUE);
		$cvs=mysql_real_escape_string($cvs);

		$respiratory=$this->input->post('respiratory',TRUE);
		$respiratory=mysql_real_escape_string($respiratory);

		$breasts=$this->input->post('breasts',TRUE);
		$breasts=mysql_real_escape_string($breasts);
		
		$abdomen=$this->input->post('abdomen',TRUE);
		$abdomen=mysql_real_escape_string($abdomen);
		
		$vaginal_examination=$this->input->post('vaginal_examination',TRUE);
		$vaginal_examination=mysql_real_escape_string($vaginal_examination);
		
		$discharge=$this->input->post('discharge',TRUE);
		$discharge=mysql_real_escape_string($discharge);

		
	$this->db->set('patientid',$patientid);
	$this->db->set('nurseid',$nurseid);
	$this->db->set('general',$general);
	$this->db->set('height',$height);
	$this->db->set('blood_pressure',$blood_pressure);
	$this->db->set('cvs',$cvs);
	$this->db->set('respiratory',$respiratory);
	$this->db->set('breasts',$breasts);
	$this->db->set('abdomen',$abdomen);
	$this->db->set('vaginal_examination',$vaginal_examination);
	$this->db->set('discharge',$discharge);
	
	
	$this->db->insert('physical_examinations');
		
	}
	public function antenatal_profile(){
		
		$Nurseid=$this->session->userdata('id');
		
		$patientid=$this->input->post('patientid',TRUE);
		$patientid=mysql_real_escape_string($patientid);
	
		$Hb=$this->input->post('Hb',TRUE);
		$Hb=mysql_real_escape_string($Hb);

		$blood_group=$this->input->post('blood_group',TRUE);
		$blood_group=mysql_real_escape_string($blood_group);

		$rhesus=$this->input->post('rhesus',TRUE);
		$rhesus=mysql_real_escape_string($rhesus);
		
		$serology=$this->input->post('serology',TRUE);
		$serology=mysql_real_escape_string($serology);

		$tb_screening=$this->input->post('tb_screening',TRUE);
		$tb_screening=mysql_real_escape_string($tb_screening);

		$hiv=$this->input->post('hiv',TRUE);
		$hiv=mysql_real_escape_string($hiv);
		
		$urinalysis=$this->input->post('urinalysis',TRUE);
		$urinalysis=mysql_real_escape_string($urinalysis);
		
		$couple_hiv_testing=$this->input->post('couple_hiv_testing',TRUE);
		$couple_hiv_testing=mysql_real_escape_string($couple_hiv_testing);
		
		$infant_feeding=$this->input->post('infant_feeding',TRUE);
		$infant_feeding=mysql_real_escape_string($infant_feeding);
		
		$exclusive=$this->input->post('exclusive_breastfeeding',TRUE);
		$exclusive=mysql_real_escape_string($exclusive);
		
		$hiv_feeding=$this->input->post('hiv_feeding',TRUE);
		$hiv_feeding=mysql_real_escape_string($hiv_feeding);
		
		$mother=$this->input->post("mother's_decision",TRUE);
		$mother=mysql_real_escape_string($mother);
		
		$counselling=$this->input->post('counselling_assesment',TRUE);
		$counselling=mysql_real_escape_string($counselling);
		
	$this->db->set('Nurseid',$Nurseid);	
	$this->db->set('patientid',$patientid);
	$this->db->set('Hb',$Hb);
	$this->db->set('blood_group',$blood_group);
	$this->db->set('rhesus',$rhesus);
	$this->db->set('serology',$serology);
	$this->db->set('tb_screening',$tb_screening);
	$this->db->set('hiv',$hiv);
	$this->db->set('urinalysis',$urinalysis);
	$this->db->set('couple_hiv_testing',$couple_hiv_testing);
	$this->db->set('infant_feeding',$infant_feeding);
	$this->db->set('exclusive_breastfeeding',$exclusive);
	$this->db->set('hiv_feeding',$hiv_feeding);
	$this->db->set("mother's_decision",$couple_hiv_testing);
    $this->db->set('counselling_assesment',$counselling);

    $this->db->insert('antenatal_profile');
		
		
		}
	public function present_pregnancy(){
		
		$Nurseid=$this->session->userdata('id');
		
		$no_of_visit=$this->input->post('no_of_visit',TRUE);
		$no_of_visit=mysql_real_escape_string($no_of_visit);
	
		$urine=$this->input->post('urine',TRUE);
		$urine=mysql_real_escape_string($urine);

		$weight=$this->input->post('weight',TRUE);
		$weight=mysql_real_escape_string($weight);

		$hb=$this->input->post('hb',TRUE);
		$hb=mysql_real_escape_string($hb);
		
		$pallor=$this->input->post('pallor',TRUE);
		$pallor=mysql_real_escape_string($pallor);

		$maturity=$this->input->post('maturity',TRUE);
		$maturity=mysql_real_escape_string($maturity);

		$fundal_height=$this->input->post('fundal_height',TRUE);
		$fundal_height=mysql_real_escape_string($fundal_height);
		
		$fundal_movmt=$this->input->post('fundal_movmt',TRUE);
		$fundal_movmt=mysql_real_escape_string($fundal_movmt);
		
		$presentation=$this->input->post('presentation',TRUE);
		$presentation=mysql_real_escape_string($presentation);
		
		$lie=$this->input->post('lie',TRUE);
		$lie=mysql_real_escape_string($lie);
		
		
	$this->db->set('visitid',$visitid);
	$this->db->set('patientid',$patientid);
	$this->db->set('no_of_visit',$no_of_visit);
	$this->db->set('urine',$urine);
	$this->db->set('hb',$hb);
	$this->db->set('pallor',$pallor);
	$this->db->set('maturity',$maturity);
	$this->db->set('hiv',$hiv);
	$this->db->set('fundal_height',$fundal_height);
	$this->db->set('fundal_movmt',$fundal_movmt);
	$this->db->set('presentation',$presentation);
	$this->db->set('lie',$lie);
	
	$this->db->insert('present_pregnancy');
		
		
		}
	public function get_profile($patientid){
		$sql="Select * from maternal where patientid='".$patientid."'";
		$result=$this->db->query($sql);
		return $result->result_array();
	
	}
	public function get_history($patientid){
		$sql="Select * from maternal_history where patientid='".$patientid."'";
		$result=$this->db->query($sql);
		return $result->result_array();
	
	}
	public function get_antenatal($patientid){
		$sql="Select * from antenatal_profile where patientid='".$patientid."'";
		$result=$this->db->query($sql);
		return $result->result_array();
	
	}
		
		
}
	
?>