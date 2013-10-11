<?
class Active extends CI_Controller{
	public function _construct(){
		parent::_construct();
		}
	function index(){
	//$row['MpesaCode'];
		///$pata=$this->mactive->set_active();
		$data['patients']=$this->mactive->see_active();
		$this->load->view('vactive',$data);
                $this->load->library('form_validation','session');
		
		
		}
	
	}

?>