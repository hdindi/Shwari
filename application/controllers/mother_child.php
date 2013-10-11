<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mother_child extends CI_Controller{
    
    function __construct(){
        parent::__construct();
		//$this->load->model('mactive');
    }
    
    public function index(){
        $this->load->library('form_validation','session');
        // Load our view to be displayed
		$id=$this->uri->segment(3);
		$patient=$this->uri->segment(4);
		
		$data['view']='maternal_profile';
		$data['hist']='medical_hist';
		//$data['previous']='previous_pregnacies';
		$data['physical']='physical_exam';
		$data['ante']='ante-natal'; 
		$data['present']='present_pregnancy';
		$data['preventive']='preventive_services';
		$data['names']=$this->mactive->name($patient);
		$data['profile']=$this->mother->get_profile($patient);
		$data['history']=$this->mother->get_history($patient);
		$data['antenatal']=$this->mother->get_antenatal($patient);
		if(empty($data['profile'])){
			$data['view']='maternal_profile';
            $this->load->view('mother_child',$data);
		}
		else if(empty($data['history'])){
			 $data['hist']='medical_hist';
			 $this->load->view('mother_child',$data);
			 }
	   else if(empty($data['antenatal'])){
		   $data[]='';
		   $this->load->view('mother_child',$data);
		   }
		else{
			$data['hist']='existing_hist';
			$data['view']='existing_maternal';
			$this->load->view('mother_child',$data);
			}
		
			
    }
	public function ante(){
		//$id=$this->uri->segment(3);
		$this->mother->antenatal_profile();
		//$this->load->view('mother-child',$data);
		}
	public function maternal_profile(){
		$this->mother->add_profile();
		redirect('mother_child');
		
		}
	public function maternal_history(){

		$this->mother->med_history();
		redirect('mother_child');
	//$this->load->view('medical_hist',$data);
		}
	public function pregnancy(){
		$this->mother->pregnancy_history();
		//$this->load->view('previous_pregnacies');
		}
	public function physical(){
		$this->mother->physical_examinations();
		//$this->load->view('mother-child',$data);
		//$this->load->view('physical_exam',$data);
		}
	public function ante_natal(){
		//$data['patients']=$this->mother->nactive();
		$this->load->view('ante-natal');
		} 
	public function present(){
		//$data['patients']=$this->mother->nactive();
		$this->load->view('present_pregnancy');
		} 
	public function preventive(){
		//$data['patients']=$this->mother->nactive();
		$this->load->view('preventive_services');
		} 
	public function details(){
		$id=$this->uri->segment(3);
		$patientid=$this->uri->segment(4);
		
		$data['profile']=$this->mother->get_profile($patientid);
		}
	

	
		
	
}
?>