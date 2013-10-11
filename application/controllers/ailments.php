<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ailments extends CI_Controller{
    
    function __construct(){
        parent::__construct();
		//$this->load->model('mactive');
    }
    
    public function index(){
		$this->load->library('form_validation','session');
		$this->load->view('ailments');
		
    }

}
?>