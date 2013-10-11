<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class dispencing_tool extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        
    }
 
    public function index(){
        // Load our view to be displayed
        // to the user\
		  echo $this->uri->segment(2);
		//$data['details']=$this->mactive->see_details($id);
		//$data['visit']=$this->mactive->see_visit();
		//$data['triage']=$this->mactive->see_history();
		//$data['visits']=$this->mactive->see_history();
		//$data['category']=$this->doc_active->ShowCategory();
		//$data['type']=$this->dispencing_tool->ShowType();
        //$data['patients']=$this->dispencing_tool->pactive();
		$this->load->library('form_validation','session');
		
		$this->load->view('dispencing_tool',$data);
		//header('Refresh: 10; http://localhost/take/doc_profile');
     
		//echo $visit_id;
         //$this->load->view('dispencing_tool');
    }

   public function details(){
	//	$opt=new SelectList();
	$pharm_id=$this->session->userdata('id');
	
	if($pharm_id){
		$id=$this->uri->segment(3);
		$patient=$this->uri->segment(4);
		
		//$data['see']=$this->dispencing_tool->see_visit($id);
		//$data['visits']=$this->dispencing_tool->see_history($patient);
		$data['patients']=$this->dispencing_tool->pactive();
		//$data['details']=$this->dispencing_tool->see_details($id);
		//$data['consult']=$this->dispencing_tool->consultation($patient);
		//$data['tests']=$this->dispencing_tool->lab_test();
		$data['msg']=NULL;
		
		//$data['category']=$opt->ShowCategory();
		
		//$data['category']=$opt->ShowCategory();
		//$this->doc_active->ShowType();
		//$data['triage']=$this->mactive->triage($id);
		//header('Refresh: 10; http://localhost/take/doc_profile/details/'.$id."/".$patient);

		$this->load->view('dispencing_tool',$data);
		}
		else{
			$this->load->view('login_view');
			}
	}
}