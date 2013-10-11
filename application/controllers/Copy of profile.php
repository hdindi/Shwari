<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller{
    
    function __construct(){
        parent::__construct();
		$this->load->model('mactive');
    }
    
    public function index(){
	
		
		
        $this->load->library('form_validation','session');
		$data['patients']=$this->mactive->nactive();
	    $data['home']=$this->mactive->see_appointments();

		if(empty($data['patients'])){
			//$data['msg']="You have no new Patients";
				$pata['msg'] = '<font color=red>You have no Active patients</font><br />';
				//$this->index($msg);
				$this->load->view('nhome',$pata);
				

			}
			else{
				$data['msg']=NULL;
				$this->load->view('nhome',$data);
				//$this->load->view('vadmin',$data);
				}
    }
	public function details(){
		$id=$this->uri->segment(3);
		$patient=$this->uri->segment(4);
		
		$data['see']=$this->mactive->see_visit($id);
		$data['visits']=$this->mactive->see_history($patient);
		$data['patients']=$this->mactive->nactive();
		$data['details']=$this->mactive->see_details($id);
		$data['alls']=$this->mactive->getallergy($patient);
		$data['msg']=NULL;
		$data['names']=$this->mactive->name($patient);
		$data['appoint']=$this->mactive->see_appointments();
		$data['home']=$this->mactive->see_appointments();		
		$this->load->view('profile',$data);
		}

	public function add_triage(){		
		$this->mactive->triage();
		//$this->mactive->allergies();		
	}
	
		public function todoc($id)
		{
			$id=$this->uri->segment(3);
			$this->mactive->ToDoc($id);
			redirect(profile);
		}
		public function finish($id)
		{
			$id=$this->uri->segment(3);
			$this->mactive->Finish($id);
			redirect(profile);
		}
		public function appointment()
    {
		$data['home']=$this->mactive->see_appointments();
    	$this->load->view('nurse_appointment',$data);
    }
	   public function immunizations(){
		   $this->load->view('immunizations_view');
		   }
	
}
?>