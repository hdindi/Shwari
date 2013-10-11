<?php
class Medicine_log extends CI_Controller {

	public function index()
	{
		echo 'add medicine!';
	    $this->load->view('Medicine_log');
	}

	public function add_meds()
	{
	$this->load->library('form_validation','session');	
            $id=$this->uri->segment(3);
		$data['medicationid']=$this->medic_log->toMed();
		$data['barcode_id']=$this->medic_log->toMed();
		

		$this->load->view('Medicine_log',$data);
	}
}


?>