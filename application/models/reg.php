<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reg extends CI_Model {
	public function _construct()
	{
		parent::_construct();
	}

	public function patient()
	{
	
	$nationalid=$this->input->post('nationalid',TRUE);
	$nationalid=mysql_real_escape_string($nationalid);

	$sname=$this->input->post('sname',TRUE);
	$sname=mysql_real_escape_string($sname);

	$fname=$this->input->post('fname',TRUE);
	$fname=mysql_real_escape_string($fname);

	$lname=$this->input->post('lname',TRUE);
	$lname=mysql_real_escape_string($lname);

	$dob=$this->input->post('dob',TRUE);
	$dob=mysql_real_escape_string($dob);

	$address=$this->input->post('address',TRUE);
	$address=mysql_real_escape_string($address);

	$phone=$this->input->post('phone',TRUE);
	$phone=mysql_real_escape_string($phone);

	$email=$this->input->post('email',TRUE);
	$email=mysql_real_escape_string($email);

	$maritalstatus=$this->input->post('maritalstatus',TRUE);
	$maritalstatus=mysql_real_escape_string($maritalstatus);

	$kinname=$this->input->post('kinname',TRUE);
	$kinname=mysql_real_escape_string($kinname);

	$kinphone=$this->input->post('kinphone',TRUE);
	$kinphone=mysql_real_escape_string($kinphone);

	$sex=$this->input->post('sex',TRUE);
	$sex=mysql_real_escape_string($sex);

	$residence=$this->input->post('residence',TRUE);
	$residence=mysql_real_escape_string($residence);

	$employmentstatus=$this->input->post('employmentstatus',TRUE);
	$employmentstatus=mysql_real_escape_string($employmentstatus);

	$kinrelation=$this->input->post('kinrelation',TRUE);
	$kinrelation=mysql_real_escape_string($kinrelation);



	
	$this->db->set('nationalid',$nationalid);
	$this->db->set('fname',$fname);
	$this->db->set('sname',$sname);
	$this->db->set('lname',$lname);
	$this->db->set('dob',$dob);
	$this->db->set('address',$address);
	$this->db->set('phone',$phone);
	$this->db->set('email',$email);
	$this->db->set('maritalstatus',$maritalstatus);
	$this->db->set('kinname',$kinname);
	$this->db->set('kinphone',$kinphone);
	$this->db->set('sex',$sex);
	$this->db->set('residence',$residence);
	$this->db->set('kinrelation',$kinrelation);
	
	
	$this->db->insert('patients');
	
	
	}
	public function visit()
	{

	$patientid=$this->input->post('patientid',TRUE);
	$patientid=mysql_real_escape_string($patientid);

	$this->db->set('patientid',$patientid);
	$this->db->set('nq','active');

	$this->db->insert('visit');
	$visitid = $this->db->insert_id();

	$this->package();
	
	}

	public function package()
	{
	
	$package=$this->input->post('package',TRUE);
	$package=mysql_real_escape_string($package);

	$cost=$this->input->post('cost',TRUE);
	$cost=mysql_real_escape_string($cost);

	$mpesaCode=$this->input->post('mpesa',TRUE);
	$mpesaCode=mysql_real_escape_string($mpesaCode);

	$this->db->set('visitid',$visitid);
	$this->db->set('package',$package);
	$this->db->set('cost',$cost);
	$this->db->set('Mpesa',$mpesaCode);
	$this->db->set('paid','paid');

	$this->db->insert('costs');
	}

	

}

/* End of file reg.php */
/* Location: ./application/models/reg.php */