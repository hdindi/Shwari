<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Doc_profile extends CI_Controller{

function __construct(){
parent::__construct();
		//$this->load->model('doc_active');
}

public function index(){

		if($this->session->userdata('id')){

		$data['patients']=$this->doc_active->dactive();
		$data['lab_patients']=$this->lab_active->lactive();
		$data['home']=$this->doc_active->see_appointments();
                $this->load->library('form_validation','session');

		$data['msg'] = '<font color=red>You have no Active patients</font><br />';
		
		//$this->load->view('dhome',$data);
                header("Refresh: 5;"); 
                
                $data1['contents']='dhome_v';
                $finaldata = array_merge($data,$data1);
                $this->base_param($finaldata);
                
                
}
	else{
		redirect('login');
		}
		
}
	public function details(){
	
	    $id=$this->uri->segment(3);
		$patient=$this->uri->segment(4);
	    $doc_id=$this->session->userdata('id');
		if($doc_id){
	    $data['results']=$this->doc_active->see_labs();
        $data['msg2']=NULL;
		$data['see']=$this->doc_active->see_visit($id);
		$data['visits']=$this->doc_active->see_history($patient);
		$data['patients']=$this->doc_active->dactive();
		$data['alls']=$this->doc_active->getallergy($patient);
		$data['results']=$this->doc_active->see_labs();
		$data['lab_results']=$this->doc_active->labs($id);
		$data['details']=$this->doc_active->see_details($id);
		$data['lab_patients']=$this->doc_active->lactive();
		$data['test_data']=$this->doc_active->test_details($id);
		$data['names']=$this->doc_active->name($patient);
		//$data['labs']=$this->doc_active->working_diagnosis($id);
		$data['msg']=NULL;
		$data['consult']=$this->doc_active->consultation($id);
		$data['tests']=$this->doc_active->lab_test();
		$data['pack']=$this->doc_active->package();
		$data['meds']=$this->doc_active->meds();
		$data['check']=$this->doc_active->check_consult($id);
		$data['presc']=$this->doc_active->visit_presc($id);
		//$data['view']="before_consult";
		/*if($data['check']){
			$data['view']='after_consult';
			$this->load->view('doc_profile',$data);
			}
		else{
			$data['view']='before_consult';
			$this->load->view('doc_profile',$data);
			}*/
		
		$this->load->view('doc_profile',$data);

		}
		else{
			redirect('login');
			}
	}

	public function add_checkup(){

		$id=$this->uri->segment(3);
		$patient=$this->uri->segment(4);
	    $doc_id=$this->session->userdata('id');
		if($doc_id){
        $data['check']=$this->doc_active->checkup();
		$data['checkup']=$this->doc_active->allergy();
		$data['see']=$this->doc_active->see_visit($id);
		$data['visits']=$this->doc_active->see_history($patient);
		$data['patients']=$this->doc_active->dactive();
		$data['lab_patients']=$this->doc_active->lactive();
		$data['msg']=NULL;
		$data['details']=$this->doc_active->see_details($id);
		$this->load->view('doc_profile',$data);	
		}
		else{
			redirect('login');
			}
	}
	public function labs(){
		$doc_id=$this->session->userdata('id');
	if($doc_id){
		$id=$this->uri->segment(3);
		$patient=$this->uri->segment(4);
		$this->doc_active->order_labs();
		redirect('doc_profile');
	}
	else{
		redirect('login');
		}
	}
	public function prescription(){
		$doc_id=$this->session->userdata('id');
	   if($doc_id){
		$id=$this->uri->segment(3);
		$patient=$this->uri->segment(4);
		//$this->doc_active->ToPha($id);
		$data['see']=$this->doc_active->see_visit($id);
		$data['visits']=$this->doc_active->see_history($patient);
		$data['patients']=$this->doc_active->dactive();
		$data['docdetails']=$this->doc_active->docdetails();
		$data['details']=$this->doc_active->see_details($id);
		$data['lab_patients']=$this->doc_active->lactive();
		$data['lab_results']=$this->doc_active->labs($id);
		//$this->doc_active->order_labs();
		$data['msg']=NULL;
		$data['prescript']=$this->doc_active->med_prescription();
			//$this->load->view('doc_profile',$data);
		}
		else{
			redirect('login');
			}
	}
	public function results(){
		$id=$this->uri->segment(3);
		$patient=$this->uri->segment(4);
		$doc_id=$this->session->userdata('id');
		if($doc_id){
		$data['results']=$this->doc_active->see_labs();
		}
		else{
			redirect('login');
			}
	}
	public function tolab($id)
		{   
			$doc_id=$this->session->userdata('id');
		    if($doc_id){
			$id=$this->uri->segment(3);
			$this->doc_active->ToLab($id);
			$this->doc_active->order_labs();			
			redirect('doc_profile');
			}
			else{
				redirect('login');
				}
			
		}
	public function topha($id)
		{
			$id=$this->uri->segment(3);
			$doc_id=$this->session->userdata('id');
		    if($doc_id){
			$this->doc_active->ToPha($id);
			
			//$this->doc_active->med_prescription();
			redirect('doc_profile');
			}
			else{
				redirect('login');
				}
			
		}
	public function finish($id)
		{
		    $doc_id=$this->session->userdata('id');
			if($doc_id){
			$id=$this->uri->segment(3);
			$this->doc_active->Finish($id);
			redirect(doc_profile);
			}else{
				redirect('login');
				}
		}

     public function appoint(){
	//$id=$this->uri->segment(3);
    $doc_id=$this->session->userdata('id');
	if($doc_id){
	$this->doc_active->appointments();
	}
	else{
		redirect('login');
		}
	//$this->load->view('doc_profile',$data);
	//redirect('doc_profile');
	}

     public function prescript(){
	//$id=$this->uri->segment(3);
	$doc_id=$this->session->userdata('id');
	if($doc_id){
	$this->doc_active->med_prescription();
	//$this->load->view('doc_profile',$data);
	//redirect('doc_profile');
	}
	else{
				redirect('login');

		}
}

	public function refer()
	{
	$doc_id=$this->session->userdata('id');
	if($doc_id){
	$this->doc_active->refer();
	}
	else{
		redirect('login');
        }
	}

    public function final_diagnosis(){
	  $id=$this->uri->segment(3);
	  $patient=$this->uri->segment(4);
	  $doc_id=$this->session->userdata('id');
	  if($doc_id){
	
	  $data['final']=$this->doc_active->diagnosis($id);
		}
	else{
		redirect('login');
        }
	}
	
			
	
		public function appointment()
    {
		$doc_id=$this->session->userdata('id');
	    if($doc_id){
		$data['home']=$this->doc_active->see_appointments();
    	$this->load->view('doc_appointment',$data);
			}
	else{
		redirect('login');
        }
    }
	public function edit_consult(){
		$id=$this->uri->segment(3);
		$patient=$this->uri->segment(4);
		$data['patients']=$this->doc_active->dactive();
		$data['names']=$this->doc_active->name($patient);
		$data['alls']=$this->doc_active->getallergy($patient);
		$data['check']=$this->doc_active->check_consult($id);
		$data['msg']=NULL;
		
		$this->load->view('edit_consult',$data);
		}
	public function edit(){
		$id=$this->uri->segment(3);
		$patient=$this->uri->segment(4);
		$this->doc_active->update_consult();
		redirect('doc_profile/details/'.$id.'/'.$patient);
		}
	public function order(){
		$data['none_meds']=$this->inventory->get_nonemeds();
		$data['view']='doc_makeorder';
		$data['ordered']=$this->inventory->get_nurseorders();
		$data['hist']=$this->inventory->order_history();
		$this->load->view('doc_order',$data);
		}
	public function bin(){
		$data['view']='doc_bin';
		$data['hist']=$this->inventory->doc_orderhistory();
		$this->load->view('doc_order',$data);
		}
	public function save_orders(){
		$this->inventory->department_orders();
		redirect('doc_profile/order');
		}
                
                
                function base_param($data){
            $data['title']='Doctors Profile';
            $this->load->view('doc_template',$data);
        }

	
}
?>