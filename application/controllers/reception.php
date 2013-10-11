<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reception extends CI_Controller {

	

		public function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('reception_model');
        $this->load->library('grocery_CRUD');
	}	

	public function index()
	{
            $this->load->library('form_validation','session');
		//$this->load->view('reception');
		$id=$this->uri->segment(3);
		//$data['patients']=$this->reception_model->all();
		$data['patients']=$this->mactive->nactive();
		$data['doc_patients']=$this->doc_active->dactive();
		$data['lab_patients']=$this->doc_active->lactive();
		$data['pharm_patients']=$this->pharmacy_model->pactive();
		$data['msg']=NULL;
		$data['topay']=$this->reception_model->patient_payments();
		$data['topha']=$this->reception_model->topayphar();
		$data['walkin']=$this->reception_model->topaywalkin();
		$data['home']=$this->reception_model->see_appointments();
		//header("Refresh: 5;"); 
		//$this->load->view('reception',$data);
                
                
                $data1['contents']='reception';
                $finaldata = array_merge($data,$data1);
                $this->base_param($finaldata);

    }
	public function viewpat()
	{
		$this->load->view('newpat');
	}

	public function newpat()
	{
		$this->reception_model->addpat();
		
		
	}
	public function visit()
	{
		$data['pack']=$this->reception_model->package();
		$data['name']=$this->reception_model->getName();
		
		$this->load->view('visit',$data);
	}
	public function patients()
    {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('patients');
            $crud->columns('fname','sname','lname','sex','city','phone','status');
            $crud->set_subject('Patient');
            $crud->unset_delete();
            $crud->unset_edit();
            $crud->unset_add();
            
            $crud->display_as('fname','first name')
                 ->display_as('sname','second name')
                 ->display_as('lname','third name');

            //$crud->unset_delete();
            
            $output = $crud->render();
            $this->load->view('patients',$output);

            $this->_example_output($output);
    }
    public function newpatvisit()
    {
		$data['pack']=$this->reception_model->package();
		$data['name']=$this->reception_model->getName();
		//$data['new_visit']=$this->reception_model->new_patvisit();
		//$this->savevisit();
    	$this->load->view('visit',$data);
    }
	public function pharm_payments(){
		$id=$this->uri->segment(3);
		$patient=$this->uri->segment(4);
    	$data['tested']=$this->reception_model->getmeds($id);
    	$this->load->view('pharm_payment',$data);
	}
   public function payments()
    {
    	$id=$this->uri->segment(3);
		$patient=$this->uri->segment(4);
		$data['tested']=$this->reception_model->pat_payments($id);
    	//$data['tested']=$this->reception_model->gettest($id);
    	$this->load->view('payment',$data);
    }
    public function appointment()
    {
		$data['home']=$this->reception_model->see_appointments();
    	$this->load->view('rece_appointments',$data);
    }
    public function add()
    {
    	$this->reception_model->addpat();
		redirect('reception/newpatvisit');
    }
	public function new_visit(){
		$this->reception_model->to_package();
		redirect('reception/index');
		}
   
   public function labcost($id){
	$id=$this->uri->segment(3);
	$this->reception_model->lab_cost();
	$this->reception_model->ToLab($id);
	redirect('reception/index');
	
	}
	public function pharm_cost(){
		$this->reception_model->pharmcost();
		redirect('reception/index');
		}
	public function lab_cost(){
		$this->reception_model->labcost();
		redirect('reception/index');
		}
	public function walkin_patient(){
		$this->load->view('walkin');
		}
	public function add_walkin(){
		$this->reception_model->walkin();
		redirect('reception/index');

	}
	public function walkin(){
		$id=$this->uri->segment(3);
		$data['topay']=$this->reception_model->pay_data($id);
		$this->load->view('topay',$data);
		}
	public function walkin_cost(){
		$this->reception_model->walkinpay();
		redirect('reception/index');
		}
	public function new_pay(){
		
		$this->load->view('payment',$data);
		}
	public function demo(){
		$this->reception_model->pay_demo();
		redirect('reception/index');
	}
        
                function base_param($data){
            $data['title']=' Receptionist';
            $this->load->view('reception_template',$data);
        }
	

}