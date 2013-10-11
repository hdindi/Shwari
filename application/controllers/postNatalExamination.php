<?php

class PostNatalExamination extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('postNatalExamination_active');
	}	
	function index()
	{		
                $this->load->library('form_validation','session');
		$this->form_validation->set_rules('timing_of_visit', 'timing of visit', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('date_visit', 'date/visit', 'required|trim|xss_clean');			
		$this->form_validation->set_rules('blood_pressure', 'blood pressure', 'required|trim|xss_clean|is_numeric|max_length[55]');			
		$this->form_validation->set_rules('temperature', 'temperature', 'required|trim|xss_clean|is_numeric|max_length[55]');			
		$this->form_validation->set_rules('pulse', 'pulse', 'required|trim|xss_clean|is_numeric|max_length[55]');			
		$this->form_validation->set_rules('respiratory_rate', 'respiratory rate', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('general_codition', 'general codition', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('breast', 'breast', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('c_s_scar', 'c/s scar', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('involution_of_uterus', 'involution of uterus', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('condition_of_episiotomy', 'condition of episiotomy', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('lochia', 'lochia', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('pelvic_exam', 'pelvic exam', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('heamoglobin', 'heamoglobin', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('mothers_hiv_status', 'mother HIV status', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('mother_given_vit', 'mother given Vit', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('mother_given_art_b_plus_prophylaxis', 'mother given ART/B plus prophylaxis', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('mother_on_haart', 'mother on HAART', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('mother_contrimoxazole_prophylaxis_initiated', 'mother contrimoxazole prophylaxis initiated', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('counseling_on_family_planning', 'counseling on family planning', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('babys_condition', 'baby condition', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('babys_temperature', 'baby temperature', 'required|trim|xss_clean|is_numeric|max_length[55]');			
		$this->form_validation->set_rules('babys_breaths_minute', 'baby breaths / minute', 'required|trim|xss_clean|is_numeric|max_length[255]');			
		$this->form_validation->set_rules('babys_feeding_method', 'baby feeding method', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('breastfeeding', 'breastfeeding', 'trim|xss_clean|valid_email|max_length[255]');			
		$this->form_validation->set_rules('umbilical_cord', 'umbilical cord', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('babys_immunization_started', 'baby immunization started', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('infant_given_arv_prophylaxis', 'infant given ARV prophylaxis', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('infant_cotrimoxazole_prophylaxis_initiated', 'infant cotrimoxazole prophylaxis initiated', 'required|trim|xss_clean|max_length[255]');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('postNatalExamination');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'timing_of_visit' => set_value('timing_of_visit'),
					       	'date_visit' => set_value('date_visit'),
					       	'blood_pressure' => set_value('blood_pressure'),
					       	'temperature' => set_value('temperature'),
					       	'pulse' => set_value('pulse'),
					       	'respiratory_rate' => set_value('respiratory_rate'),
					       	'general_codition' => set_value('general_codition'),
					       	'breast' => set_value('breast'),
					       	'c_s_scar' => set_value('c_s_scar'),
					       	'involution_of_uterus' => set_value('involution_of_uterus'),
					       	'condition_of_episiotomy' => set_value('condition_of_episiotomy'),
					       	'lochia' => set_value('lochia'),
					       	'pelvic_exam' => set_value('pelvic_exam'),
					       	'heamoglobin' => set_value('heamoglobin'),
					       	'mothers_hiv_status' => set_value('mothers_hiv_status'),
					       	'mother_given_vit' => set_value('mother_given_vit'),
					       	'mother_given_art_b_plus_prophylaxis' => set_value('mother_given_art_b_plus_prophylaxis'),
					       	'mother_on_haart' => set_value('mother_on_haart'),
					       	'mother_contrimoxazole_prophylaxis_initiated' => set_value('mother_contrimoxazole_prophylaxis_initiated'),
					       	'counseling_on_family_planning' => set_value('counseling_on_family_planning'),
					       	'babys_condition' => set_value('babys_condition'),
					       	'babys_temperature' => set_value('babys_temperature'),
					       	'babys_breaths_minute' => set_value('babys_breaths_minute'),
					       	'babys_feeding_method' => set_value('babys_feeding_method'),
					       	'breastfeeding' => set_value('breastfeeding'),
					       	'umbilical_cord' => set_value('umbilical_cord'),
					       	'babys_immunization_started' => set_value('babys_immunization_started'),
					       	'infant_given_arv_prophylaxis' => set_value('infant_given_arv_prophylaxis'),
					       	'infant_cotrimoxazole_prophylaxis_initiated' => set_value('infant_cotrimoxazole_prophylaxis_initiated')
						);
					
			// run insert model to write data to db
		
			if ($this->postNatalExamination->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('postNatalExamination/success');   // or whatever logic needs to occur
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