<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nurse extends CI_Controller {

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
		$this->load->view('vurse.php',$output);	
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

        echo "Welcome ".$type." " .$username." User ID ".$id." ";
	}	

	function patient_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('patients');
			$crud->columns('fname','sname','lname','dob','residence','status');
			$crud->set_subject('Patient');
			$crud->display_as('fname','first name')
				 ->display_as('sname','second name')
				 ->display_as('lname','third name');
			$crud->unset_delete();
			$crud->unset_add();
			$crud->unset_edit();
			$crud->callback_column('fname',array($this,'_callback_webpage_url'));
			$crud->callback_column('sname',array($this,'_callback_webpage_url'));
			$crud->callback_column('lname',array($this,'_callback_webpage_url'));

			$output = $crud->render();

			$this->_example_output($output);
	}

	function triage_management()
	{
			$crud = new grocery_CRUD();
			$id = $this->session->userdata('id');


			$crud->set_theme('datatables');
			$crud->set_table('triage');
			$crud->add_fields('NurseID', 'visitid', 'Weight', 'BP', 'Temperature', 'BMI', 'Height', 'OCS');

			$crud->set_subject('Triage');

			$crud->unset_delete();
			$crud->unset_edit();
			
			//$crud->set_relation('NurseID','employee','{fname}  {lname} {sname} ');
			$crud->set_relation('visitid','patients','{fname}  {lname} {sname} ');
            //$crud->display_as('visitid','first name');
			//$crud->set_relation_n_n('visitid', 'visit', 'patients' ,'patientid', 'visittid', 'lname');
			$crud->set_relation('visitid','visit','patientid');
			//$crud->set_relation('patientid','patients','fname');

			$crud->callback_add_field('Weight',array($this,'add_field_callback_1'));
    		$crud->callback_add_field('Temperature',array($this,'add_field_callback_2'));
    		$crud->callback_add_field('Height',array($this,'add_field_callback_3'));
			
			$crud->field_type('NurseID', 'hidden', $id);

			$output = $crud->render();
			
			$this->_example_output($output);
		
	}

	function add_field_callback_1()
	{
	    return '<input type="text" maxlength="50" value="" name="Weight" style="width:462px"> Kgs';
	}
	 
	function add_field_callback_2()
	{
	    return '<input type="text" maxlength="50" value="" name="Temperature" style="width:400px"> °C';
	}
	function add_field_callback_3()
	{
	    return '<input type="text" maxlength="50" value="" name="Height" style="width:400px"> Feet/Inches';
	}
	function visit_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('visit');
			$crud->set_relation('patientid','patients','{fname}  {lname} {sname} ');
								//comon id,		table, wat
			//$crud->add_fields('patientid','MpesaCode');
			$crud->unset_delete();
			$crud->unset_edit();
			$crud->unset_add();
			$crud->columns('id','patientid','MpesaCode');
			$crud->display_as('MpesaCode','Mpesa Code')
				 ->display_as('patientid','Patient Name');
				 //->display_as('id','ID');
				
			$output = $crud->render();
			
			$this->_example_output($output);
	}
	function patient_allergy()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('patients');
	    	$crud->set_relation_n_n('allergies', 'patient_allergy', 'allergy' ,'patient_id', 'allergy_id', 'name');
	    	$crud->set_relation('id','patients','{fname}  {lname} {sname} ');
	   		
	    	$crud->columns('id', 'allergies');
            
	    	$crud->add_fields('id','allergies');
	    	$crud->edit_fields('id','allergies');
	    	$crud->unset_delete();

	    	$output = $crud->render();
	 
	    	$this->_example_output($output);
		
	}

	public function _callback_webpage_url($value, $row){
		return "<a href=".base_url('npatient/details/'.$row->id).">".$value."</a>";
	}

	function allergy()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('allergy');
	    	
			$crud->columns('name','description');
            $crud->set_subject('allergies');
	    	$output = $crud->render();
	 
	    	$this->_example_output($output);
	}

	private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('login');
        }
    }
	
}