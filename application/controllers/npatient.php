<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class NPatient extends CI_Controller{

function __construct(){
	parent::__construct();
		//$this->load->model('doc_active');
}


	public function details(){
	$this->load->library('form_validation','session');
	$patientid=$this->uri->segment(3);
		//$patient=$this->uri->segment(4);
	$doc_id=$this->session->userdata('id');
	
	$data['patient_info']=$this->mpatients->bio_data($patientid);
	$data['triage_history']=$this->mpatients->triage($patientid);
	$data['consults']=$this->mpatients->consultation($patientid);
	$data['test_details']=$this->mpatients->test($patientid);
	$this->load->view('npatient',$data);
	
		}
	public function appoint(){
	//$id=$this->uri->segment(3);
	$this->doc_active->appointments();
	//$this->load->view('doc_profile',$data);
	//redirect('doc_profile');
	}
	
}?>