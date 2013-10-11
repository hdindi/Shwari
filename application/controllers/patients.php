<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Patients extends CI_Controller {

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
		$this->load->view('all_patients.php',$output);	
	}
	
	
	public function index()
	{
            $this->load->library('form_validation','session');
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
		$username = $this->session->userdata('username');
        
        $id = $this->session->userdata('id');
		$type = $this->session->userdata('type');
		$data['view']='all_patients';
		$data['patients']=$this->mactive->nactive();
		$this->load->view('profile',$data);
			
			
	}	

	function patient_management()
	{
			
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('patients');
			$crud->columns('fname','sname','lname','phone','sex','residence','status');
			$crud->set_subject('Patient');
			$crud->display_as('fname','First Name')
				 ->display_as('sname','Second Name')
				 ->display_as('lname','Last Name')
				 ->display_as('maritalstatus','marital status')
				 ->display_as('sex','gender');
			$crud->unset_delete();
			$crud->unset_add();
			$crud->unset_edit();
			//$crud->callback();
			//$crud->callback_column('sname',array($this,'_callback_webpage_url'));
			//$crud->callback_column('lname',array($this,'_callback_webpage_url'));

			$output = $crud->render();

			$this->_example_output($output);
	}

	
private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('login');
        }
    }
	

   
	
	
}

    
