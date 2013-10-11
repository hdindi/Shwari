    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Lab extends CI_Controller {

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
                $this->load->view('vab.php',$output);	
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
                        $crud->columns('nationalid','fname','sname','lname','dob','address','city','phone','status');
                        $crud->set_subject('Patient');
                        $crud->display_as('fname','first name')
                             ->display_as('sname','second name')
                             ->display_as('lname','third name');
                        $crud->unset_delete();
                        $crud->unset_add();
                        $crud->unset_edit();

                        $output = $crud->render();

                        $this->_example_output($output);
        }

        function lab_tests()
        {
                        $crud = new grocery_CRUD();

                        $crud->set_theme('datatables');
                        $crud->set_table('check_up');
                        $crud->columns('patientid','docid','visitid','lab_tests','lab results','diagnosis','date');
                        $crud->display_as('lab tests','lab tests requested')
                             ->display_as('diagnosis','provisional diagnosis');
                        $crud->edit_fields('lab_results');
                        //$crud->edit_fields('symptomes','lab_tests', 'diagnosis');

                        $crud->set_subject('Check up');


                        $crud->unset_delete();
                        $crud->unset_add();
                        //$crud->unset_edit();

                        $crud->set_relation('docid','employee','{fname}  {lname} {sname} ');
                        //$crud->set_relation('patientid','patients','{fname}  {lname} {sname} ');

                        $output = $crud->render();

                        $this->_example_output($output);
        }
        function tests()
        {
                        $crud = new grocery_CRUD();

                        $crud->set_theme('datatables');
                        $crud->set_table('tests');
                        //$crud->edit_fields('lab_results');
                        //$crud->edit_fields('symptomes','lab_tests', 'diagnosis');

                        $crud->set_subject('Tests');


                        //$crud->unset_delete();
                        //$crud->unset_add();
                        //$crud->unset_edit();

                        //$crud->set_relation('docid','employee','{fname}  {lname} {sname} ');
                        //$crud->set_relation('patientid','patients','{fname}  {lname} {sname} ');

                        $output = $crud->render();

                        $this->_example_output($output);
        }



        private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('login');
        }
    }


    }

    /* End of file lab.php */
    /* Location: ./application/controllers/lab.php */