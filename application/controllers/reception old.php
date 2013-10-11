<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reception extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		
		$this->load->library('grocery_CRUD');	
		$this->check_isvalidated();
	}
	
	function _example_output($output = null)
	{
		$this->load->view('veception.php',$output);	
	}
	
	function offices()
	{
		$output = $this->grocery_crud->render();

		$this->_example_output($output);
	}
	
	function index()
	{
            $this->load->library('form_validation','session');
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
		$username = $this->session->userdata('username');
        $type = $this->session->userdata('type');
        
        $id = $this->session->userdata('id');

        /*echo "Welcome ".$type." " .$username." User ID ".$id." ";*/
	}

	function patient_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('patients');
			$crud->columns('fname','sname','lname','sex','residence');
			$crud->set_subject('Patient');
			$crud->add_fields('nationalid','fname','sname','lname','sex','dob','phone','address','residence','email','employmentstatus','maritalstatus','kinname','kinrelation','kinphone','status');
			$crud->required_fields('fname','lname','phone','sex','residence','employmentstatus','dob','maritalstatus','address','phone');
			$crud->set_rules('nationalid','National ID','numeric|min_length[7]|max_length[8]|required');
			$crud->set_rules('fname','First name','alpha|required');
			$crud->set_rules('lname','Sur name','alpha|required');
			//$crud->set_rules('lname','last name','alpha|required');
			$crud->set_rules('sex','Gender','required');
			
			$crud->display_as('nationalid','Nationalid/Passport')
				 ->display_as('fname','First name')
				 ->display_as('sname','Middle name')
				 ->display_as('lname','Sur name')
				 ->display_as('kinname','Next of Kin')
				 ->display_as('kinrelation','Relation')
				 ->display_as('kinphone','Phone No.')
				 ->display_as('sex','Gender')
				 ->display_as('address','Address(P.O BOX)')
				 ->display_as('dob','Date of Birth')
				 ->display_as('employmentstatus','employment status')
				 ->display_as('maritalstatus','marital status');
				 
			$crud->unset_delete();
			
			$output = $crud->render();

			$this->_example_output($output);
	}
	

	function visit_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$date = date("Y-m-d H:i:s");
			$crud->where('VisitDate >=',$date);
			$crud->set_table('visit');
			$crud->set_relation('patientid','patients','{fname}  {lname} {sname} ');
								//comon id,		table, wat

			$crud->set_subject('visit');
			$crud->columns('patientid','VisitDate');
			$crud->add_fields('patientid','nq','dq','lq','pq','nstart','dstart','lstart','pstart');
			$crud->unset_delete('patientid','visitdate');
			//$crud->unset_edit('patientid','MpesaCode','visitdate');
			$crud->edit_fields('nq','dq','lq','pq');

			
			$crud->set_rules('nq','Send to Nurse','required');
			
			$crud->required_fields('patientid','MpesaCode');
			
			 $crud->display_as('patientid','Patient Name')
				 ->display_as('nq','Send to Nurse')
				 ->display_as('dq','Send to Doctor')
				 ->display_as('lq','Send to Lab')
				 ->display_as('pq','Send to Pharmacy');

			$today = date("H:i:s");
			$crud->field_type('nstart', 'hidden', $today);
			$crud->field_type('dstart', 'hidden', $today);
			$crud->field_type('lstart', 'hidden', $today);
			$crud->field_type('pstart', 'hidden', $today);
			$crud->callback_column('patientid',array($this,'_callback_webpage_url'));
				
			$output = $crud->render();
			
			$this->_example_output($output);
	}
	 
	 function _callback_webpage_url($value, $row){
		return "<a href=".base_url('patient/details/'.$row->id).">".$value."</a>";
		
		}


	
	private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('login');
        }
    }
	
	
}