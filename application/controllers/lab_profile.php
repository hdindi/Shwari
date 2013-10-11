<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lab_profile extends CI_Controller{
    
    function __construct(){
        parent::__construct();
		$this->load->model('mactive');
		$this->load->model('lab_active');
    }
    
    public function index(){
	$this->load->library('form_validation','session');	
        header("Refresh: 5;"); 
		$labid=$this->session->userdata('id');
		if($labid){
		$data['walkin']=$this->lab_active->walkin();
    	$data['patients']=$this->lab_active->lactive();
        if(empty($data['patients'])){
			//$data['msg']="You have no new Patients";
				$pata['msg'] = '<font color=red>You have no Active patients</font><br />';
				$pata['walkin']=$this->lab_active->walkin();
				//$this->index($msg);

				$this->load->view('lhome',$pata);
			}
			else{
				$data['msg']=NULL;
				$this->load->view('lhome',$data);
				}
		}
		else{
			redirect('login');
			}
    }
	public function details(){
		$id=$this->uri->segment(3);
		$patient=$this->uri->segment(4);
		$labid=$this->session->userdata('id');
		if($labid){
		
		$data['patients']=$this->lab_active->lactive();
		$data['details']=$this->lab_active->see_details($id);
		$data['bio_data']=$this->lab_active->bio_data($patient);
		$data['names']=$this->mactive->name($patient);
		$data['diagnosis']=$this->lab_active->diagnosis($id);
		$data['consultation']=$this->pharmacy_model->consultation($id);
		$data['tests']=$this->lab_active->tests($id);
		$data['all_tests']=$this->lab_active->lab_test();
		$data['test_details']=$this->lab_active->test_details($id);
        $data['alls']=$this->lab_active->getallergy($patient);
		$data['msg']=NULL;
		$data['new']=$this->lab_active->test($id);
		$data['paid']=$this->lab_active->paid_lab($id);
		$data['unpaid']=$this->lab_active->unpaid($id);
		$data['tested']=$this->lab_active->tested($id);
        $data['lab']=$this->lab_active->lab($id);

		if(empty($data['paid'])){
			$data['view']='unpaid_lab';
			$this->load->view('lab_profile_New1',$data);
			}
			
		/*else if(empty($data['lab'])){
			$data['view']='not_yet';
			$this->load->view('lab_profile_New1',$data);
			}*/
		  else if(empty($data['new'])){
			$data['view']='paid_lab';
		   $this->load->view('lab_profile_New1',$data);
		  }
           else{ 
			$data['view']='other_lab';
			$this->load->view('lab_profile_New1',$data);
			}
		  
		}
		else{
			redirect('login');
			}
	}



	public function add_results(){
	$labid=$this->session->userdata('id');
	if($labid){
		
	$this->lab_active->results();
	}
	else{
		redirect('login');
		}
	
	}

	public function todoc($id)
		{
			$labid=$this->session->userdata('id');
	        if($labid){
			$id=$this->uri->segment(3);
			$this->lab_active->ToDoc($id);
			//$this->lab_active->results();
			redirect('lab_profile');
			}else{
				redirect('login');
		         }
		}

	public function torep(){
		$id=$this->uri->segment(3);
		$patient=$this->uri->segment(4);
		
		$this->lab_active->save();
		//$this->lab_active->red();
		redirect('lab_profile/details/'.$id.'/'.$patient);
		}
	public function tolab()
	{  $labid=$this->session->userdata('id');
	    if($labid){
		$this->lab_active->order_labs();	
		}else{
			redirect('login');	
			}
		
		
	 }
	public function walk_in(){
		$id=$this->uri->segment(3);
		$data['msg']=NULL;
		$data['tests']=$this->doc_active->lab_test();
		$data['walkin']=$this->lab_active->walkin();
		$data['tested']=$this->lab_active->tobetested($id);
		$data['patients']=$this->lab_active->lactive();
		$data['trial']=$this->lab_active->unpaid_walkin($id);
		$data['paid']=$this->lab_active->lab_walkin($id);
		$data['unpaid']=$this->lab_active->check_test($id);
		if(empty($data['trial'])){
			$data['view']='lab_walkin';
			$this->load->view('labWalkin',$data);
		}
		else if(empty($data['unpaid'])){
			$data['view']='unpaid_walkinlab';
			$this->load->view('labWalkin',$data);
		}
		else if(empty($data['paid'])){
			$data['view']='repWalkin';
			$this->load->view('labWalkin',$data);
			}
		else {
			$data['view']='paid_walkinlab';
			$this->load->view('labWalkin',$data);

			}
		}
	public function save_tests(){
		$this->lab_active->walkinlab();
		redirect('lab_profile/index');
		}
	public function walkin_pay(){
		$this->lab_active->savecost();
		redirect('lab_profile/index');
	}
	public function walkin_test(){
		$this->lab_active->walkin_results();
		}
	public function finish_walkin(){
		$id=$this->uri->segment(3);
		$this->lab_active->deactivate($id);
		redirect('lab_profile/index');

		}
	public function order(){
		$data['none_meds']=$this->inventory->get_nonemeds();
		$data['view']='lab_makeorder';
		$data['ordered']=$this->inventory->get_nurseorders();
		$data['hist']=$this->inventory->order_history();
		$this->load->view('lab_order',$data);
		}
	public function bin(){
		$data['view']='lab_bin';
		$data['hist']=$this->inventory->lab_orderhistory();
		$this->load->view('lab_order',$data);
		}
	public function save_orders(){
		$this->inventory->department_orders();
		redirect('lab_profile/order');
		}

	
		
	
}
?>