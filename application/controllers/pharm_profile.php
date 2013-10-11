<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class pharm_profile extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        
    }
 
    public function index(){
        $this->load->library('form_validation','session');
        // Load our view to be displayed
        // to the user\
	$data['patients']=$this->pharmacy_model->pactive();
	$data['walkin']=$this->pharmacy_model->walkin();
	header("Refresh: 5;"); 

		if(empty($data['patients'])){
			//$data['msg']="You have no new Patients";
			$pata['walkin']=$this->pharmacy_model->walkin();
				$pata['msg'] = '<font color=red>You have no Active patients</font><br />';
				//$this->index($msg);
				$this->load->view('phome',$pata);
			}
			else{
				$data['msg']=NULL;
				
				$this->load->view('phome',$data);
				}
				//$this->$this->load->helper('gchart_helper');

		
    }

	public function details(){
	//	$opt=new SelectList();
		$id=$this->uri->segment(3);
		$patient=$this->uri->segment(4);
		$med=$this->uri->segment(5);

		$data['details']=$this->pharmacy_model->see_details($id);
		$data['patients']=$this->pharmacy_model->pactive();
		$data['visits']=$this->pharmacy_model->see_history($patient);
		$data['msg']=NULL;
		$data['consultation']=$this->pharmacy_model->consultation($id);
		$data['prescription']=$this->pharmacy_model->prescription($id);
		$data['alls']=$this->doc_active->getallergy($patient);
		$data['meds']=$this->pharmacy_model->medicine();
		$data['names']=$this->mactive->name($patient);
		$data['row']=$this->pharmacy_model->get_presc($med);
		$data['pharm']=$this->pharmacy_model->pharm($id);
		$data['paid']=$this->pharmacy_model->pharm_paid($id);
		$data['unpaid']=$this->pharmacy_model->unpaid($id);
		$data['check']=$this->pharmacy_model->paid($id);
        if(empty($data['paid'])){
			$data['view']='unpaid_pharm';
			$this->load->view('pharmacy_view',$data);
			}
		/*else if(empty($data['pharm'])){
			$data['view']='pharm';
			$this->load->view('pharmacy_view',$data);
			}
			*/
		else if(empty($data['check'])){
			$data['view']='paid_pharm';
			 $this->load->view('pharmacy_view',$data);
		}else{
			$data['view']='after_dispense';
			$this->load->view('pharmacy_view',$data);

			 }
			
			
		}
		
       private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('login');
        }
        }
	
		public function finish($id)
		{
			$id=$this->uri->segment(3);
			$this->pharmacy_model->Finish($id);
			
			
			redirect('pharm_profile');
		}
		public function tonur($id)
		{
			$id=$this->uri->segment(3);
			$this->pharmacy_model->ToNur($id);
			redirect('pharm_profile');
			
		}
		public function change($id){
			$id=$this->uri->segment(3);
			
			$this->pharmacy_model->change_order();
			redirect('pharm_profile');
			}
		public function status(){
			$id=$this->uri->segment(3);
			$patient=$this->uri->segment(4);
		   // $this->pharmacy_model->update_stock($id);

		    $this->pharmacy_model->administered();
			redirect('pharm_profile/details/'.$id.'/'.$patient);
		}

		public function history()
		{
			$id=$this->uri->segment(3);
			$patient=$this->uri->segment(4);

		    $data['details']=$this->pharmacy_model->see_details($id);
		    $data['patients']=$this->pharmacy_model->pactive();
		    $data['visits']=$this->pharmacy_model->see_history($patient);
            $data['patients']=$this->pharmacy_model->pactive();
		    $data['prescription']=$this->pharmacy_model->prescription_history($patient);
		    $data['meds']=$this->pharmacy_model->medicine();
		    $data['msg']=NULL;
		    $this->load->view('prescription_history',$data);
	   
		}
		
		public function reorders(){
			$data['order']=$this->pharmacy_model->stocks();
			if(empty($data['order'])){
				 $pata['msg1']='<font color=red>There are no drugs to be reordered</font><br />';
				 $pata['msg']=NULL;
				 
				 $pata['patients']=$this->pharmacy_model->pactive();
				 
				$this->load->view('reorder',$pata);
				}
			else{
			$data['patients']=$this->pharmacy_model->pactive();
			$data['msg']=NULL;
			$data['msg1']=NULL;
			$this->load->view('reorder',$data);
			}
		}
		public function payments(){
			$id=$this->uri->segment(3);
			$patient=$this->uri->segment(4);
			
			$this->pharmacy_model->save();
			redirect('pharm_profile/details/'.$id.'/'.$patient);
		}
		public function edit($id){
			$id=$this->uri->segment(5);
			$patient=$this->uri->segment(4);
			
		   $data['patients']=$this->pharmacy_model->pactive();
		   $data['names']=$this->mactive->name($patient);
		   $data['medicine']=$this->pharmacy_model->medicine();
           $data['edit']=$this->pharmacy_model->get_presc($id);
		   $data['msg']=NULL;
		   $data['alls']=$this->doc_active->getallergy($patient);
           $this->load->view('edit_triage',$data);
		}
		public function add_prescription(){
			$this->doc_active->med_prescription();
			}
		public function stock(){
			$stock=$this->pharmacy_model->stock_control();
			
			}
		public function walk_in(){
			$id=$this->uri->segment(3);
			
	  		$data['patients']=$this->pharmacy_model->pactive();
		    $data['medicine']=$this->pharmacy_model->medicine();
			$data['walkin']=$this->pharmacy_model->walkin_data($id);
			$data['msg']=NULL;
			$data['paid']=$this->pharmacy_model->pharm_walkin($id);
			$data['unpaid']=$this->pharmacy_model->paid_walkin($id);
			$data['check']=$this->pharmacy_model->walkin_dispense($id);
			if(empty($data['unpaid'])){
				$data['view']='unpaid_walkin';
				$this->load->view('walkin_pharm',$data);
			}
			else if(empty($data['paid'])){
			    $data['view']='walkin_paying';
			    $this->load->view('walkin_pharm',$data);
			}
			else if(empty($data['check'])){
				$data['view']='paid_walkin';
			    $this->load->view('walkin_pharm',$data);
			   	}
			else{
				$data['view']='walkin_dipense';
			    $this->load->view('walkin_pharm',$data);
				}
			
		}
		public function add_med(){
			$this->pharmacy_model->add_walkin();
			}
		 public function walkinpayments(){
			 $this->pharmacy_model->walkin_payments();
			 redirect('pharm_profile/index');
			 }
		public function dispense_walkin(){
		 $this->pharmacy_model->admin();
		 redirect('pharm_profile/index');
			
			}
		public function finish_walkin(){
		$id=$this->uri->segment(3);
		$this->lab_active->deactivate($id);
		redirect('pharm_profile/index');

		}
		

		
}
	
