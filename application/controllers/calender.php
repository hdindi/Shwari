<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Calender extends CI_Controller{

function __construct(){
     parent::__construct();
}
public function index(){
        $this->load->library('form_validation','session');
	$data['appoints']=$this->model_calendar->get_appointments();
	$this->load->view('calendar',$data);
	}
}
?>