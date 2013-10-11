<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller{
    
    function __construct(){
        parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		
		$this->load->library('grocery_CRUD');
		$this->load->model('mactive');
    }
    
    public function index(){
        $this->load->library('form_validation','session');
		//$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
        //header("Refresh: 5;"); 
		$data['patients']=$this->mactive->nactive();
	    $data['home']=$this->mactive->see_appointments();

		if(empty($data['patients'])){
			//$data['msg']="You have no new Patients";
				$pata['msg'] = '<font color=red>You have no Active patients</font><br />';
				//$this->index($msg);
				//$this->load->view('nhome',$pata);
                                
                                $data1['contents']='nhome_v';
                                $finaldata = array_merge($pata,$data1);
                                $this->base_param($finaldata);
				

			}
			else{
				$data['msg']=NULL;
				//$this->load->view('nhome',$data);
				//$this->load->view('vadmin',$data);
                                
                                
                                
                                $data1['contents']='nhome_v';
                                $finaldata = array_merge($data,$data1);
                                $this->base_param($finaldata);
                                
				}
    }
    
    public function load_data(){
        $patients = $this->mactive->nactive();
        //echo  array_values($data);
	    //$data['home']=$this->mactive->see_appointments();

		if(empty($patients)){
			//$data['msg']="You have no new Patients";
				//$pata = 'You have no Active patients';
                                //echo json_encode($pata);
				//$this->index($msg);
				//$this->load->view('nhome_v',$pata);
                    $data =  "You have no patients in your waiting list";
                     echo json_encode($data);
                                
				

			}
			else{
				//$data['msg']=NULL;
                                echo json_encode($patients);
                                
				//$this->load->view('nhome_v',$data);
				//$this->load->view('vadmin',$data);
				}
        
    }
    public function details(){
		$id=$this->uri->segment(3);
		$patient=$this->uri->segment(4);
		
		$data['see']=$this->mactive->see_visit($id);
		$data['visits']=$this->mactive->see_history($patient);
		$data['patients']=$this->mactive->nactive();
		$data['details']=$this->mactive->see_details($id);
		$data['alls']=$this->mactive->getallergy($patient);
		$data['msg']=NULL;
		$data['names']=$this->mactive->name($patient);
		$data['appoint']=$this->mactive->see_appointments();
		$data['home']=$this->mactive->see_appointments();		
		$this->load->view('profile',$data);
		}

	public function add_triage(){		
		$this->mactive->triage();
		//$this->mactive->allergies();		
	}
	
		public function todoc($id)
		{
			$id=$this->uri->segment(3);
			$this->mactive->ToDoc($id);
			redirect(profile);
		}
		public function finish($id)
		{
			$id=$this->uri->segment(3);
			$this->mactive->Finish($id);
			redirect(profile);
		}
		public function appointment()
    {
		$data['home']=$this->mactive->see_appointments();
    	$this->load->view('nurse_appointment',$data);
    }
	  
	function _example_output($output = null)
	{
		$this->load->view('all_nonemeds',$output);	
	}
	function add_nonemed(){
	$crud = new grocery_CRUD();

    $crud->set_theme('datatables');
    $crud->set_table('none_meds');
    //$crud->set_subject('Medicines');
    $crud->columns('name','batch_no','units','available_quantity','exp_date');
 
    //$crud->add_fields('batch_no','supplier','name','units','pack_size','packs','quantity','available_quantity','price','exp_date');
   // $crud->edit_fields('batch_no','supplier','name','units','pack_size','packs','quantity','available_quantity','price','exp_date');
   $crud->unset_edit();
   $crud->unset_add();

 
    $crud->required_fields('name','supplier','price','pack_size','packs','quantity','exp_date','batch_no','available_quantity');
    $crud->display_as('name','Name')
         ->display_as('supplier','Supplier')
		 ->display_as('units','Units')
		 ->display_as('price','Price')
		 ->display_as('pack_size','Pack Size')
		 ->display_as('packs','Packs')
		 ->display_as('quantity','Quantity')
		 ->display_as('exp_date','Expiry Date')
		 ->display_as('batch_no','Batch No')
         ->display_as('available_quantity','Available Quantity');
 	$crud->unset_delete();
      $output = $crud->render();
 
   $this->_example_output($output);
      //$this->load->view('issues',$output);
	}
	public function order(){
		if($this->session->userdata('id')){
		$data['none_meds']=$this->inventory->get_nonemeds();
		$data['view']='game';
		$data['ordered']=$this->inventory->get_nurseorders();
		$data['hist']=$this->inventory->order_history();
		$this->load->view('order_stock',$data);
		}
		else{
			redirect('login');
			}
	}
	public function bin(){
		$data['view']='nurse_bin';
		$data['hist']=$this->inventory->nurse_orderhistory();
		$this->load->view('order_stock',$data);
		}
	public function save_orders(){
		$this->inventory->department_orders();
		redirect('profile/order');
		}
                
    
                public function enable(){
                    $this->load->view('enable');
                }


                function base_param($data){
            $data['title']='Nurse Profile';
            $this->load->view('nurse_template',$data);
        }
	
}
?>