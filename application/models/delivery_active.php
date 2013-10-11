<?php

class Delivery_active extends CI_Model {
   
   function __construct()
	{
		parent::__construct();
	}
	
	
	 public function add_profile(){
		$Nurseid=$this->session->userdata('id');
		
		$duration_of_pregnancy=$this->input->post('duration_of_pregnancy',TRUE);
		$duration_of_pregnancy=mysql_real_escape_string($duration_of_pregnancy);
		
		
		$mode_of_delivery=$this->input->post('mode_of_delivery',TRUE);
		$mode_of_delivery=mysql_real_escape_string($mode_of_delivery);
		
		$date=$this->input->post('date',TRUE);
		$date=mysql_real_escape_string($date);

		$blood_loss=$this->input->post('blood_loss',TRUE);
		$blood_loss=mysql_real_escape_string($blood_loss);

		$condition_of_mother=$this->input->post('condition_of_mother',TRUE);
		$condition_of_mother=mysql_real_escape_string($condition_of_mother);

		$rescuscitation=$this->input->post('rescuscitation',TRUE);
		$rescuscitation=mysql_real_escape_string($rescuscitation);
		
		$health_facility=$this->input->post('health_facility',TRUE);
		$health_facility=mysql_real_escape_string($health_facility);

		$home=$this->input->post('home',TRUE);
		$home=mysql_real_escape_string($home);

		$otherspecify=$this->input->post('otherspecify',TRUE);
		$otherspecify=mysql_real_escape_string($otherspecify);

		$nurse=$this->input->post('nurse',TRUE);
		$nurse=mysql_real_escape_string($nurse);

		$midwife=$this->input->post('midwife',TRUE);
		$midwife=mysql_real_escape_string($midwife);
		
		$clinical_officer=$this->input->post('clinical_officer',TRUE);
		$clinical_officer=mysql_real_escape_string($clinical_officer);
		
		$Relationship=$this->input->post('Relationship',TRUE);
		$Relationship=mysql_real_escape_string($Relationship);

		$Relationship=$this->input->post('Relationship',TRUE);
		$Relationship=mysql_real_escape_string($Relationship);

		$Relationship=$this->input->post('Relationship',TRUE);
		$Relationship=mysql_real_escape_string($Relationship);

		$Relationship=$this->input->post('Relationship',TRUE);
		$Relationship=mysql_real_escape_string($Relationship);

		$Relationship=$this->input->post('Relationship',TRUE);
		$Relationship=mysql_real_escape_string($Relationship);

		$Relationship=$this->input->post('Relationship',TRUE);
		$Relationship=mysql_real_escape_string($Relationship);

		$Relationship=$this->input->post('Relationship',TRUE);
		$Relationship=mysql_real_escape_string($Relationship);

		$Relationship=$this->input->post('Relationship',TRUE);
		$Relationship=mysql_real_escape_string($Relationship);

		$Relationship=$this->input->post('Relationship',TRUE);
		$Relationship=mysql_real_escape_string($Relationship);

		$Relationship=$this->input->post('Relationship',TRUE);
		$Relationship=mysql_real_escape_string($Relationship);

		$Relationship=$this->input->post('Relationship',TRUE);
		$Relationship=mysql_real_escape_string($Relationship);


		
	$this->db->set('duration_of_pregnancy',$duration_of_pregnancy);
	$this->db->set('mode_of_delivery',$mode_of_delivery);
	$this->db->set('date',$date);
	$this->db->set('blood_loss',$blood_loss);
    $this->db->set('condition_of_mother',$condition_of_mother);
	$this->db->set('rescuscitation',$rescuscitation);
	$this->db->set('health_facility',$health_facility);
	$this->db->set('home',$home);
	$this->db->set('otherspecify',$otherspecify);
	$this->db->set('nurse',$nurse);
	$this->db->set('midwife',$midwife);
	$this->db->set('clinical_officer',$clinical_officer);

	$this->db->set('NOK_contacts',$NOK_contacts);
    $this->db->set('Relationship',$Relationship);
	
	$this->db->insert('maternal');
	}
}
?>