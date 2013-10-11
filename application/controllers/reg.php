<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reg extends CI_Controller {

	public function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('reg_model');
	}	

	public function index()
	{
                $this->load->library('form_validation','session');
		$this->load->view('reg');
		
	}

	public function newpatient()
	{
		$form_data = array(

					       	'nationalid' => set_value('nationalid'),
					       	'fname' => set_value('fname'),
					       	'sname' => set_value('sname'),
					       	'lname' => set_value('lname'),
					       	'dob' => set_value('dob'),
					       	'sex' => set_value('sex'),
					       	'maritalstatus' => set_value('maritalstatus'),
					       	'phone' => set_value('phone'),
					       	'email' => set_value('email'),
					       	'address'=>set_value('address'),
					       	'employmentstatus' => set_value('employmentstatus'),
					       	'kinrelation' => set_value('kinrelation'),
					       	'kinphone' => set_value('kinphone'),
					       	'kinname' => set_value('kinname')
						);
		$this->reception_model->SaveForm($form_data);
		$this->load->view('newpatvisit');
	}

}

/* End of file reg.php */
/* Location: ./application/controllers/reg.php */