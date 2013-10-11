<?php

class Delivery extends CI_Controller

{
               
  function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('delivery_active');
                $this->load->library('form_validation','session');
	}

	function index()
	{
		$id=$this->uri->segment(3);
		$patient=$this->uri->segment(4);
		

		$this->load->view('delivery');
	}

	function deliver()
	{
		$this->load->view('delivery');
	}

	function postBirth()
	{
		$this->load->view('delivery');
	}	

}