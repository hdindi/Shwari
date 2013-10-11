<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recall extends CI_Controller {

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
		$this->load->view('allpat.php',$output);	
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
			//$crud->unset_add();
			//$crud->unset_edit();


			$output = $crud->render();

			$this->_example_output($output);
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
	

	private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('login');
        }
    }
	
}