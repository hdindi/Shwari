<?php

class Reportings extends CI_Controller
{

	function __construct(){
        parent::__construct();
        
    }
	
	function index() 
	{	$this->load->library('form_validation','session');
		$this->hello_world();
	}


	function hello_world()
	{
		$this->load->library('cezpdf');

		$this->cezpdf->ezText('Shwari Healthcare', 12, array('justification' => 'center'));
		$this->cezpdf->ezSetDy(-10);

		$content = 'Shwari Heathcare is located in Githurai 44.';

		$this->cezpdf->ezText($content, 10);

		$this->cezpdf->ezStream();
	}
	
	
	function patients()
	{
		$this->load->library('cezpdf');
		//$this->load->helper('pdf_helper');
		
		//prep_pdf();
		$db=$this->reports->all_patients();
		foreach($db as $pats){

		$table[] = array('fname' => $pats['fname'], 'lname' =>$pats['lname'] , 'sname' => $pats['sname'], 'phone'=> $pats['phone'],'email'=> $pats['email']);
		}
		
		$col_names = array(
			'fname' => 'First Name',
			'lname' => 'Last Name',
			'sname' => 'Surname',
			'phone' => 'Phone Number',
			'email' => 'E-mail Address'
		);
		

		$this->cezpdf->addJpegFromFile("shwari.jpg",25,20,40,20);
		$this->cezpdf->ezTable($table, $col_names, 'All Patients', array('width'=>550));
		$this->cezpdf->ezStream();
		
		//$this->cezpdf->ezOutput();
		$directory = './pdf/';

		set_realpath($directory);
		$file = $directory.date('d-m-Y h:i:s').'.pdf';
	    $pdfcode = $this->cezpdf->ezOutput();
        $fp = fopen($file,'wb');
		fwrite($fp,$pdfcode);
		fclose($fp);
		
		}

	
	function visits()
	{
		$this->load->library('cezpdf');
		//$this->load->helper('pdf');
		//prep_pdf(); // creates the footer for the document we are creating.
		
		$db=$this->reports->visits();
		foreach($db as $visits){
		$db_data[] = array('fname' => $visits['fname'], 'lname' => $visits['lname'], 'visitid' => $visits['id']);
		}
		$col_names = array(
			'fname' => 'First Name',
			'lname' => 'Last Name',
			'visitid' => 'Visit Identification'
		);
		
		$this->cezpdf->ezTable($db_data, $col_names, 'Jana Visits', array('width'=>550));
		$this->cezpdf->ezStream();
	}
	function labs()
	{
		$this->load->library('cezpdf');
	//	$this->load->helper('pdf');
		//prep_pdf(); // creates the footer for the document we are creating.
		
		$db=$this->reports->lab_payments();
		foreach($db as $lab_payments){
		$db_data[] = array('fname' => $lab_payments['fname'], 
		'lname' => $lab_payments['lname'],
		'cost' => $lab_payments['cost'],
		'id'=> $lab_payments['id']
		 
		 );
		}
		$col_names = array(
			'fname' => 'First Name',
			'lname' => 'Last Name',
			'cost' => 'Lab Costs'
		);
		
		$this->cezpdf->ezTable($db_data, $col_names, 'Lab Payments', array('width'=>550));
		$this->cezpdf->ezStream();
		
	}

public function pdf_report(){
// $this->load->helper(array('My_Pdf'));   //  Load helper
 $data = file_get_contents(site_url('admin/reports')); // Pass the url of html report
 create_pdf($data); //Create pdf
 }
 
}


?>