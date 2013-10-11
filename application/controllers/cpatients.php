<?php

class Cpatients extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('mpatients');
	}	
	function index()
	{	$this->load->library('form_validation','session');		
		$this->form_validation->set_rules('nationalid', 'Nationalid', 'required|trim|xss_clean|is_numeric|max_length[30]');			
		$this->form_validation->set_rules('first_name', 'first name', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('second_name', 'second name', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('third_name', 'third name', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('gender', 'gender', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('residence', 'Residence', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('employment_status', 'employment status', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('dob', 'Dob', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('marital_status', 'Marital status', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('city', 'City', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('address', 'Address', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('phone', 'phone', 'required|trim|xss_clean|max_length[34]');			
		$this->form_validation->set_rules('status', 'status', 'required|trim|xss_clean|max_length[255]');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('patients_view');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'nationalid' => set_value('nationalid'),
					       	'first_name' => set_value('first_name'),
					       	'second_name' => set_value('second_name'),
					       	'third_name' => set_value('third_name'),
					       	'gender' => set_value('gender'),
					       	'residence' => set_value('residence'),
					       	'employment_status' => set_value('employment_status'),
					       	'dob' => set_value('dob'),
					       	'marital_status' => set_value('marital_status'),
					       	'city' => set_value('city'),
					       	'address' => set_value('address'),
					       	'phone' => set_value('phone'),
					       	'status' => set_value('status')
						);
					
			// run insert model to write data to db
		
			if ($this->mpatients->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('cpatients/success');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}
	function success()
	{
			echo 'this form has been successfully submitted with all validation being passed. All messages or logic here. Please note
			sessions have not been used and would need to be added in to suit your app';
	}
}
?>