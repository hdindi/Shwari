<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Management extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
		$this->load->library('grocery_CRUD');	
		
    } 
	public function _example_output($output = null)
	{
		$this->load->view('management.php',$output);	
	}
  /* public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
       
	}	
   
	*/
	function index()
	{
			$this->load->library('form_validation','session');
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('patients');
			$crud->columns('fname','sname','lname','address','phone','email','maritalstatus','sex','residence','status');
			$crud->set_subject('Patient');
			$crud->display_as('fname','first name')
				 ->display_as('sname','second name')
				 ->display_as('lname','third name')
				 ->display_as('maritalstatus','marital status')
				 ->display_as('sex','gender');
			$crud->unset_delete();
			$crud->unset_add();
			$crud->unset_edit();
			$crud->callback_column('fname',array($this,'_callback_webpage_url'));
			$crud->callback_column('sname',array($this,'_callback_webpage_url'));
			$crud->callback_column('lname',array($this,'_callback_webpage_url'));

			$output = $crud->render();

			$this->_example_output($output);
			//$this->load->view('management',$output);
	} 
    public function _callback_webpage_url($value, $row)
    {
		return "<a href=".base_url('management/pat_details/'.$row->id).">".$value."</a>";
		
	}
	
	public function pat_details(){
	$patientid=$this->uri->segment(3);
		//$patient=$this->uri->segment(4);
	$doc_id=$this->session->userdata('id');
	
	$data['patient_info']=$this->mpatients->bio_data($patientid);
	$data['triage_history']=$this->mpatients->triage($patientid);
	$data['consults']=$this->mpatients->consultation($patientid);
	$data['test_details']=$this->mpatients->test($patientid);
	$data['prescription']=$this->doc_active->prescription_history($patientid);
	$data['labs']=$this->doc_active->lab_history($patientid);
	
	$data['view']='patient_details';
	
	$this->load->view('manage_home',$data);
	}
	public function employees()
	{
			
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('employee');
			$crud->columns('Fname','Sname','Lname','type','phone','Email','sex','residence');
			$crud->set_subject('Employee');
			$crud->display_as('fname','first name')
				 ->display_as('sname','second name')
				 ->display_as('lname','third name')
				 ->display_as('sex','gender');
			$crud->unset_delete();
			$crud->unset_add();
			$crud->unset_edit();
			

			$output = $crud->render();

			$this->_example_output($output);
	} 
	public function logs(){
		$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('login_logs');
			$crud->columns('Username','login_time');
			$crud->set_subject('Employee');
			
			$crud->unset_delete();
			$crud->unset_add();
			$crud->unset_edit();
			$crud->order_by('login_time','desc');

			$output = $crud->render();

			$this->_example_output($output);
		
	}
	public function lab(){
			
		$data['month']=$this->input->post('month');
		$data['date']=$this->input->post('date');
		$data['payments']=$this->reports->labpayments();
		$data['view']='manage_lab';
		$this->load->view('manage_home',$data);
		}
	public function labbydate(){
		$data['date']=$this->input->post('Date');
		$data['month']=$this->input->post('month');
		$data['payments']=$this->reports->labpaymentsbydate();
		$data['view']='manage_lab';
		$this->load->view('manage_home',$data);
		}
	public function labbymonth(){
	
		$data['month']=$this->input->post('month');
		$data['date']=$this->input->post('date');
		$data['payments']=$this->reports->labpaymentsbymonth();
		$data['view']='manage_lab';
		$this->load->view('manage_home',$data);
		}
	public function pharm(){
		$data['date']=$this->input->post('Date');
		$data['month']=$this->input->post('month');

		$data['pharm']=$this->reports->pharm_payments();
		$data['view']='manage_pharm';
		$this->load->view('manage_home',$data);
		}
	public function pharmbydate(){
		$data['date']=$this->input->post('Date');
		$data['month']=$this->input->post('month');
	
		$data['pharm']=$this->reports->pharm_paymentsbydate();
		$data['view']='manage_pharm';
		$this->load->view('manage_home',$data);
		}
	public function pharmbymonth(){
	    $data['date']=$this->input->post('Date');
	 	$data['month']=$this->input->post('month');
		$data['pharm']=$this->reports->pharm_paymentsbymonth();
		$data['view']='manage_pharm';
		$this->load->view('manage_home',$data);
		}
	public function consultation(){
		$data['date']=$this->input->post('Date');
		$data['month']=$this->input->post('month');
				
		$data['view']='manage_consult';
		$data['consultation']=$this->reports->payments();
		$data["links"] = $this->pagination->create_links();
		$this->load->view('manage_home',$data);
		}
	public function bydate(){
		$data['date']=$this->input->post('Date');
		$data['month']=$this->input->post('month');
	
		$data['view']='manage_consult';
		$data['consultation']=$this->reports->paymentsbydate();
		$data["links"] = $this->pagination->create_links();
		$this->load->view('manage_home',$data);
		}
	public function reports(){
	  	$data['date']=$this->input->post('Date');
		$data['month']=$this->input->post('month');
		
		$data['view']='manage_consult';
		$data['month']='';
		$data['day']='';
		$data['consultation']=$this->reports->all_payments();
		$data["links"] = $this->pagination->create_links();
		
		$this->load->view('manage_home',$data);
		}
}

  ?>