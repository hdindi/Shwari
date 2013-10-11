<?php

class Family_planning extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('family_planning_active');
	}	
	function index()
	{			
		$this->form_validation->set_rules('date', 'date', 'required|trim|xss_clean');			
		$this->form_validation->set_rules('clinical_note', 'clinical_note', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('next_visit', 'next_visit', 'required|trim|xss_clean');
		$this->load->library('form_validation','session');
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('family_planning');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'date' => set_value('date'),
					       	'clinical_note' => set_value('clinical_note'),
					       	'next_visit' => set_value('next_visit')
						);
					
			// run insert model to write data to db
		
			if ($this->family_planning_active->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('family_planning');   // or whatever logic needs to occur
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