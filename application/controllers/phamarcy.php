<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Phamarcy extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		
		$this->load->library('grocery_CRUD');	
		$this->check_isvalidated();
	}
	
	function _example_output($view = null)
	{
		$this->load->view('vharmacy',$view);	
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
  function add_nonemed(){
	$crud = new grocery_CRUD();

    $crud->set_theme('datatables');
    $crud->set_table('none_meds');
    $crud->set_subject('Stock');
    $crud->columns('name','batch_no','units','pack_size','packs','quantity','available_quantity','exp_date','price','supplier');
 
    $crud->add_fields('batch_no','supplier','name','units','pack_size','packs','quantity','available_quantity','price','exp_date');
    $crud->edit_fields('batch_no','supplier','name','units','pack_size','packs','quantity','available_quantity','price','exp_date');

 
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
   public function todoc($id)
		{
			$id=$this->uri->segment(3);
			//$this->doc_active->med_prescription();
			$this->doc_active->ToPha($id);
			//$this->doc_active->med_prescription();
			redirect('doc_profile');
			//redirect('doc_profile/prescription');
		}
	public function finish($id)
		{
			$id=$this->uri->segment(3);
			$this->doc_active->Finish($id);
			redirect(phamarcy);
		}

   private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('login');
        }
    }
   function add_medicine() {

    $crud = new grocery_CRUD();

    $crud->set_theme('datatables');
    $crud->set_table('medicines');
    $crud->set_subject('medicine');
    $crud->columns('code','Medicine_name','notes','strength','units','price','stock_in_hand','exp_date','min_amount');
 
    $crud->add_fields('code','Medicine_name','notes','strength','supplier','units','packs','price','stock_in_hand','min_amount','exp_date','batch_no');
    $crud->edit_fields('code','Medicine_name','price','stock_in_hand','min_amount');

 
    $crud->required_fields('code','Medicine_name','strength','units','price','stock_in_hand','min_amount');
    $crud->display_as('medicine_name','Medicine name')
         ->display_as('stock_in_hand','Stock in hand')
		 ->display_as('supplier','Prefferd Supplier')
		 ->display_as('units','Pack Size')
		// ->display_as('packs','No of Packs')
		 ->display_as('price','Unit Cost')
		 ->display_as('exp_date','Expiry Date')
		 ->display_as('batch_no','Batch No')
         ->display_as('min_amount','Minimum amount');
 	$crud->unset_delete();
    //$output= $crud->render();
 	$view=$crud->render();
    $this->_example_output($view);
	//$this->load->view('issues',$view);
}
	public function stock_movement(){
		$data['stocks']=$this->inventory->get_stock();
		$data['meds']=$this->inventory->get_meds();
		$data['view']='bin_card';
		$this->load->view('issues',$data);
		}
	public function all_movements(){
		$data['stocks']=$this->inventory->getallmovements();
		$data['meds']=$this->inventory->get_meds();
		$data['view']='all_stockmovements';
		$this->load->view('issues',$data);
		
		}
	public function invent(){
		$this->load->view('issues');
		}
	public function view_orders(){
		$data['orders']=$this->inventory->get_orders();
		$data['meds']=$this->inventory->get_meds();
		$data['view']='process_orders';
		$this->load->view('issues',$data);
		}
	public function issues(){
		$this->inventory->issue();
		redirect('phamarcy/view_orders');
		}
	public function view_bin(){
		$data['meds']=$this->inventory->get_meds();
		$data['hist']=$this->inventory->order_history();
		$data['view']='nurse_bin';
		$this->load->view('issues',$data);

	}
	
	
}