<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Doctor extends CI_Controller {

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
		$this->load->view('voctor.php',$output);	
	}
	
	
	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
		$username = $this->session->userdata('username');
                $this->load->library('form_validation','session');
        
        $id = $this->session->userdata('id');
		$type = $this->session->userdata('type');

		
		$data['patients']=$this->mactive->dactive();
		$this->load->view('voctor',$data);
		if(!$this->mactive->dactive()){
			$pata['msg']="You have no new Visitors";
			$this->load->view('voctor',$pata);
			}
	}	

	function patient_management()
	{
			
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
	}

	public function _callback_webpage_url($value, $row){
		return "<a href=".base_url('patient/details/'.$row->id).">".$value."</a>";
		
		}

	function check_up()
	{
			$crud = new grocery_CRUD();
			

			$id = $this->session->userdata('id');

			$crud->set_theme('datatables');
			$crud->set_table('check_up');
			$crud->add_fields('docid', 'visitid', 'symptomes','lab_tests', 'diagnosis');
			$crud->edit_fields('lab_tests', 'diagnosis');

			$crud->set_subject('Consultation');

			$crud->unset_delete();
			
			$crud->set_relation('docid','employee','{fname}  {lname} {sname} ');
			//$crud->set_relation('patientid','visits','{fname}  {lname} {sname} ');

			$crud->field_type('docid', 'hidden', $id);
								
			$output = $crud->render();
			
			$this->_example_output($output);
	}


	function prescription()
	{
			$crud = new grocery_CRUD();
			
			$id = $this->session->userdata('id');

			$crud->set_theme('datatables');
			$crud->set_table('prescription');
			$crud->add_fields('docid', 'patientid', 'checkupid', 'medname','amount');

			$crud->set_subject('prescription');

			$crud->unset_delete();
			
			$crud->set_relation('docid','employee','{fname}  {lname} {sname} ');
			$crud->set_relation('medname','medication','{name} {type}');
			$crud->set_relation('patientid','patients','{fname}  {lname} {sname} ');
			//$crud->set_relation('checkupid','check_up','patientid');



			$crud->field_type('docid', 'hidden', $id);
								
			$output = $crud->render();
			
			$this->_example_output($output);
	}

	
	function history()
	{
		
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('patients');
	    	$crud->set_relation_n_n('allergies', 'patient_allergy', 'allergy' ,'patient_id', 'allergy_id', 'name');
	    	//$crud->set_relation_n_n('triage', 'patient_allergy', 'allergy' ,'patient_id', 'allergy_id', 'name');

	    		
	    

	    	$crud->set_relation('id','patients','{fname}  {lname} {sname} ');
	    	//$crud->set_relation('triage','triage','{weight}  {height} {temperature} ');
	    	$crud->columns('id', 'allergies','triage','symptomes','diagnosis','date');

	    	//$crud->fields('id','allergies');
	    	//$crud->unset_delete();

	    	$output = $crud->render();
	    	$this->_example_output($output);
	}



	private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('login');
        }
    }
	

   
	
	
}

    
