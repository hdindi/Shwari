<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    

        public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('reception_model');
        //$this->load->model('admin_active');
        $this->load->library('grocery_CRUD');
        $this->load->library('form_validation','session');
    }   

    public function index()
    {
        
        
            $data['patients']=$this->admin_active->nactive();
            $data['doctor']=$this->admin_active->dactive();
            $data['lab']=$this->admin_active->lactive();
            $data['pharm']=$this->admin_active->pactive();
            $data['msg'] = '<font color=red>You have no Active patients</font><br />';
            $data['patients']=$this->mactive->nactive();
            $data['doc_patients']=$this->doc_active->dactive();
            $data['lab_patients']=$this->doc_active->lactive();
            $data['pharm_patients']=$this->pharmacy_model->pactive();
            $data['msg']=NULL;
            $data['topay']=$this->reception_model->topaytest();
            $data['topha']=$this->reception_model->topayphar();
            $data['home']=$this->reception_model->see_appointments();
            $this->load->view('adminhome',$data);

    }
     public function loadnewEmp()
    {
        
         $this->load->view('Addemployees');
    }

    public function newEmp()
    {
        $this->admin_active->addEmp();
        
         redirect('admin/index');
    }

    function employee_management()
    {
            $crud = new grocery_CRUD();


            $crud->set_theme('datatables');
            $crud->set_table('employee');
            $crud->columns('Fname','Sname','Lname','username','status','type');
            $crud->set_subject('employee');
            $crud->change_field_type('password','password');
			$crud->set_rules('Fname','First name','alpha|required');
			$crud->set_rules('Sname','Sur name','alpha|required');
            $crud->callback_before_insert(array($this,'encrypt_password_callback'));
            $crud->callback_before_update(array($this,'encrypt_password_callback'));
            $crud->add_action('Reset Password','','forget_password/change',array($this,'reset_password'));
            $crud->display_as('Fname','First name')
                 ->display_as('Sname','Second name')
                 ->display_as('Lname','Third name')
                 ->display_as('DOB','Date of Birth')
                 ->display_as('NationalID','National Id');
            $crud->unset_delete();
            $crud->unset_add();
            
            $output = $crud->render();
           

            //$this->_example_output($output);
            $this->load->view('vadmin.php',$output);
    }
    function patient_management()
    {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('patients');
            $crud->columns('fname','sname','lname','sex','city','phone','status');
            $crud->set_subject('Patient');
            $crud->unset_delete();
            $crud->unset_edit();
            $crud->unset_add();
            //$crud->add_fields('nationalid','fname','sname','lname','sex','age','residence','language','employmentstatus', 'dob','maritalstatus','address','city','phone','status');
            //$crud->required_fields('fname','sname','phone','sex','age','residence','language','employmentstatus', 'dob','maritalstatus','address','city','phone','status');
            //$crud->set_rules('nationalid','National ID','integer');
            $crud->display_as('fname','first name')
                 ->display_as('sname','second name')
                 ->display_as('lname','third name');

            //$crud->unset_delete();
            
            $output = $crud->render();

            $this->load->view('vadmin.php',$output);
    }
    function visit_management()
    {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('visit');

            $crud->set_relation('patientid','patients','{fname}  {lname} {sname} ');
            //$crud->set_relation('MpesaCode', 'payments','{MpesaCode}');
            $crud->columns('patientid','MpesaCode','VisitDate');
                               
            $crud->unset_delete();
            $crud->unset_edit();
            $crud->unset_add();
            $crud->required_fields('patientid','MpesaCode');
            $crud->display_as('MpesaCode','Mpesa Code')
                 ->display_as('patientid','Patient Name');
                
            $output = $crud->render();
            
           $this->load->view('vadmin.php',$output);
    }
    function triage_management()
    {
            $crud = new grocery_CRUD();
            $id = $this->session->userdata('id');


            $crud->set_theme('datatables');
            $crud->set_table('triage');
            $crud->columns('NurseID', 'visitid', 'Temperature', 'OCS');

            $crud->set_subject('Triage');

            $crud->unset_delete();
            $crud->unset_edit();
            $crud->unset_add();
            
            //$crud->set_relation('NurseID','employee','{fname}  {lname} {sname} ');
            $crud->set_relation('visitid','patients','{fname}  {lname} {sname} ');

            //$crud->set_relation_n_n('visitid', 'visit', 'patients' ,'patientid', 'visittid', 'lname');
            $crud->set_relation('visitid','visit','patientid');
            //$crud->set_relation('patientid','patients','fname');

            $crud->callback_add_field('Weight',array($this,'add_field_callback_1'));
            $crud->callback_add_field('Temperature',array($this,'add_field_callback_2'));
            $crud->callback_add_field('Height',array($this,'add_field_callback_3'));
            
            $crud->field_type('NurseID', 'hidden', $id);

            $output = $crud->render();
            
            $this->load->view('vadmin.php',$output);
        
    }
    function check_up()
    {
            $crud = new grocery_CRUD();
            

            $id = $this->session->userdata('id');

            $crud->set_theme('datatables');
            $crud->set_table('check_up');
            $crud->columns('docid', 'patientid', 'symptomes','lab_tests', 'diagnosis');
            //$crud->add_fields('docid', 'patientid', 'symptomes','lab_tests', 'diagnosis');
            //$crud->edit_fields('lab_tests', 'diagnosis');

            //$crud->set_subject('Consultation');

            $crud->unset_delete();
            $crud->unset_edit();
            $crud->unset_add();

            
            $crud->set_relation('docid','employee','{fname}  {lname} {sname} ');
           // $crud->set_relation('patientid','patients','{fname}  {lname} {sname} ');

            $crud->field_type('docid', 'hidden', $id);
                                
            $output = $crud->render();
            
           $this->load->view('vadmin.php',$output);
    }
    function lab_tests()
    {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('check_up');
            $crud->edit_fields('lab_results');
            //$crud->edit_fields('symptomes','lab_tests', 'diagnosis');

            $crud->set_subject('Check up');


            $crud->unset_delete();
            $crud->unset_add();
            $crud->unset_edit();
            
            $crud->set_relation('docid','employee','{fname}  {lname} {sname} ');
            $crud->set_relation('patientid','patients','{fname}  {lname} {sname} ');
                                
            $output = $crud->render();
            
           $this->load->view('vadmin.php',$output);
    }

    public function packages()
    {
            $crud = new grocery_CRUD();
 
             $crud->set_theme('datatables');
             $crud->set_table('packages');
             $crud->set_subject('packages');
             $crud->columns('name', 'description','cost');
             $output = $crud->render();
            
             $this->load->view('vadmin.php',$output);
 
    }
    function prescribed() 
    {

             $crud = new grocery_CRUD();
 
             $crud->set_theme('datatables');
             $crud->set_table('prescription');
             $crud->set_subject('prescription');
             $crud->columns('checkupid', 'docid','patientid', 'medname','administeredstatus', 'amount');

 
    //$crud->add_fields('administeredstatus','amount');
    //$crud->edit_fields('administeredstatus','amount');
    
    //$crud->required_fields('administeredstatus','amount');

    
    $output = $crud->render();
 
    $this->load->view('vadmin.php',$output);
}


    private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('login');
        }
    }
        function encrypt_password_callback($post_array, $primary_key = null)
            {
                $this->load->library('encrypt');
                $this->load->helper('security');

                $key = 'super-secret-key';
                $post_array['password'] = do_hash($post_array['password'], 'md5');
                return $post_array;
            }
            function decrypt_password_callback($value)
            {
                $this->load->library('encrypt');
                $key = 'super-secret-key';
                $decrypted_password = $this->encrypt->decode($value, $key);
                return "<input type='password' name='password' value='$decrypted_password' />";
            }
        function reset_password($primary_key , $row){
             return base_url('forget_password/change/').'id?='.$row->id;
        
        }
		public function lab(){
			
		$data['month']=$this->input->post('month');
		$data['date']=$this->input->post('date');
		$data['payments']=$this->reports->labpayments();
		$data['view']='lab_report';
		$data["links"] = $this->pagination->create_links();
		$this->load->view('adminreports',$data);
		}
	public function labbydate(){
		$data['date']=$this->input->post('Date');
		$data['month']=$this->input->post('month');
		$data['payments']=$this->reports->labpaymentsbydate();
		$data['view']='lab_report';
		$data["links"] = $this->pagination->create_links();
		$this->load->view('adminreports',$data);
		}
	public function labbymonth(){
	
		$data['month']=$this->input->post('month');
		$data['date']=$this->input->post('date');
		$data['payments']=$this->reports->labpaymentsbymonth();
		$data['view']='lab_report';
		$data["links"] = $this->pagination->create_links();
		$this->load->view('adminreports',$data);
		}
	public function pharm(){
		$data['date']=$this->input->post('Date');
		$data['month']=$this->input->post('month');

		$data['pharm']=$this->reports->pharm_payments();
		$data['view']='pharm_report';
		$data["links"] = $this->pagination->create_links();
		$this->load->view('adminreports',$data);
		}
	public function pharmbydate(){
		$data['date']=$this->input->post('Date');
		$data['month']=$this->input->post('month');
	
		$data['pharm']=$this->reports->pharm_paymentsbydate();
		$data['view']='pharm_report';
		$data["links"] = $this->pagination->create_links();
		$this->load->view('adminreports',$data);
		}
	public function pharmbymonth(){
	    $data['date']=$this->input->post('Date');
	 	$data['month']=$this->input->post('month');
		$data['pharm']=$this->reports->pharm_paymentsbymonth();
		$data['view']='pharm_report';
		$data["links"] = $this->pagination->create_links();
		$this->load->view('adminreports',$data);
		}
	public function consultation(){
		$data['date']=$this->input->post('Date');
		$data['month']=$this->input->post('month');
				
		$data['view']='consultation';
		$data['consultation']=$this->reports->payments();
		$data["links"] = $this->pagination->create_links();
		$this->load->view('adminreports',$data);
		}
	public function bydate(){
		$data['date']=$this->input->post('Date');
		$data['month']=$this->input->post('month');
	
		$data['view']='consultation';
		$data['consultation']=$this->reports->paymentsbydate();
		$data["links"] = $this->pagination->create_links();
		$this->load->view('adminreports',$data);
		}
	public function reports(){
	  	$data['date']=$this->input->post('Date');
		$data['month']=$this->input->post('month');
		
		$data['view']='consultation';
		$data['month']='';
		$data['day']='';
		$data['consultation']=$this->reports->all_payments();
		$data["links"] = $this->pagination->create_links();
		
		$this->load->view('adminreports',$data);
		}
	
}