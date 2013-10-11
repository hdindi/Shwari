<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Home extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->check_isvalidated();
    }
    
    public function index(){
        $this->load->library('form_validation','session');
      $this->load->helper('url');
     // echo anchor('home/do_logout','Logout');
       $this->session->userdata('username');
       $this->session->userdata('type');

       $username =$this->session->userdata('username');
       $type =$this->session->userdata('type');
       
       if($type == "Doctor"){
           redirect ('doc_profile');
        }

        else if($type == "Admin"){
            redirect ('admin');
        }

        else if($type == "Nurse"){
            redirect ('profile');
        }

        else if($type == "Reception"){
            redirect ('reception');
        }

        else if($type == "Lab Tech"){
            redirect ('lab_profile');
        }

        else if($type == "Pharmacist"){
            redirect ('pharm_profile');
        }

        else if($type == "manager"){
            redirect ('manager');
        }

       
    }
    
    private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('login');
        }
    }
    
    public function do_logout(){
        $this->session->sess_destroy();
        redirect('login');
    }

 }
 ?>