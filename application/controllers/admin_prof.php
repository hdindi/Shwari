<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Admin_prof extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        
    }
 
    public function index(){
        // Load our view to be displayed
        // to the user\
        $this->load->library('form_validation','session');
	$userid=$this->session->userdata('id');
	if($userid){
	$data['patients']=$this->admin_active->nactive();
		if(empty($data['patients'])){
			//$data['msg']="You have no new Patients";
				$pata['msg'] = '<font color=red>You have no Active patients</font><br />';
				//$this->index($msg);
				//$this->load->view('profile',$pata);
				//$this->load->view('vadmin',$pata);
				$this->load->view('admin_prof',$pata);
			}
			else{
				$data['msg']=NULL;
				//$this->load->view('profile',$data);
				//$this->load->view('vadmin',$data);
				$this->load->view('admin_prof',$data);
				}
	//$this->load->view('admin_prof',$data);
	//$this->load->view('vadmin',$data);
		
	}
	else{
		redirect('login');
		}
		
    }
	public function details(){
	//	$opt=new SelectList();
		$userid=$this->session->userdata('id');
        if($userid){
		$id=$this->uri->segment(3);
		$patient=$this->uri->segment(4);


		$data['details']=$this->pharmacy_model->see_details($id);
		$data['patients']=$this->pharmacy_model->pactive();
		$data['visits']=$this->pharmacy_model->see_history($patient);
		$data['msg']=NULL;
		$data['prescription']=$this->pharmacy_model->prescription($id);
		$data['alls']=$this->doc_active->getallergy($patient);
		$data['meds']=$this->pharmacy_model->medicine();
		//$data['meds']=$this->pharmacy_model->medicine();
		$this->load->view('pharmacy_view',$data);
		//$this->load->view('vadmin',$data);
		
		}
		else{
			 redirect('login');

			}
	}
		
private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('login');
        }
    }
	
		public function finish($id)
		{
			$userid=$this->session->userdata('id');
			if($userid){
			$id=$this->uri->segment(3);
			$this->pharmacy_model->Finish($id);
			
			
			redirect(pharm_profile);
			}
			else{
				redirect('login');
				}
		}
		public function change($id){
			$userid=$this->session->userdata('id');
			if($userid){
				

			$id=$this->uri->segment(3);
			
			$this->pharmacy_model->change_order();
			redirect('pharm_profile');
			}
			else{
				redirect('login');
				}
		}
		public function status($id){			
		$userid=$this->session->userdata('id');
        $id=$this->uri->segment(3);
		$patient=$this->uri->segment(4);
		if($userid){
			
		$data['admin']=$this->pharmacy_model->administered($id);
		$data['details']=$this->pharmacy_model->see_details($id);
		$data['patients']=$this->pharmacy_model->pactive();
		$data['visits']=$this->pharmacy_model->see_history($patient);
		$data['msg']=NULL;
		$data['prescription']=$this->pharmacy_model->prescription($id);
		
		$this->load->view('pharmacy_view',$data);
			}
			else{
			redirect('login');
			}
		}

		public function history()
		{
		$id=$this->uri->segment(3);
		$patient=$this->uri->segment(4);
		
		$userid=$this->session->userdata('id');
		if($userid){

		$data['details']=$this->pharmacy_model->see_details($id);
		$data['patients']=$this->pharmacy_model->pactive();
		$data['visits']=$this->pharmacy_model->see_history($patient);
        $data['patients']=$this->pharmacy_model->pactive();
		$data['prescription']=$this->pharmacy_model->prescription_history($patient);
		$data['meds']=$this->pharmacy_model->medicine();
		$data['msg']=NULL;
		$this->load->view('prescription_history',$data);
	   
		}else{
			redirect('login');
			}
		
	}
	
}
	
