<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class visit_new extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	
		
	}
function index()
	{       $this->load->library('form_validation','session');
		$id=$this->uri->segment(3);
		$data['pack']=$this->visit_active->package();
		$data['name']=$this->visit_active->getName();

		$this->load->view('visit_new',$data);

       
	}

function visit_management()
	{
		$id=$this->uri->segment(3);
		$data['pack']=$this->visit_active->package();
		$data['name']=$this->visit_active->getName();

		$this->load->view('visit_new',$data);
		
	}
	public function add_visit(){
			//$id=$this->uri->segment(3);
			
			$this->visit_active->to_package();
			//$this->visit_active->to_visit();
			//redirect('pharm_profile');
			}
	public function get_cost($id){
		$id=$this->uri->segment(3);
		$this->visit_active->cost($id);
		}

}
?>