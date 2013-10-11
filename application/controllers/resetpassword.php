<?php

    class Resetpassword extends CI_Controller{

    function __construct(){
        parent::__construct();
    }


    public function index()
        {
            $this->load->library('form_validation','session');
            $data['contents']='resetpassword_view';
            $this->base_param($data);
            $this->load->helper('url');
        }




    function base_param($data){
            $data['title']='Reset Password';
            $this->load->view('template',$data);
        }



                public function forget()
    {
    if (isset($_GET['info'])) {
           $data['info'] = $_GET['info'];
          }
    if (isset($_GET['error'])) {
          $data['error'] = $_GET['error'];
          }

    $this->load->view('login_forget',$data);
    }
        public function doforget()
{
    $this->load->helper('url');
    $email= $_POST['email_address'];
    $q = $this->db->query("select * from employee where Email='" . $email . "'");
    if ($q->num_rows > 0) {
        $r = $q->result();
        $user=$r[0];
        $this->resetpassword($user);
        $info= "Password has been reset and has been sent to email id: ". $email;
        redirect('/resetpassword/forget?info=' . $info, 'refresh');
    }
    $error= "The email id you entered not found on our database ";
    redirect('/resetpassword/forget?error=' . $error, 'refresh');
     
}

    private function resetpassword($user)
{
    date_default_timezone_set('GMT');
    $this->load->helper('string');
    $password= random_string('alnum', 16);
    $this->db->where('id', $user->id);
    $this->db->update('Employee',array('password'=>MD5($password)));
    $this->load->library('email');
    $this->email->from('admin@shwarihealthcare.co.ke', 'Administrator');
    $this->email->to($user->Email);   
    $this->email->subject('Password Reset');
    $this->email->message('You have requested the new password, Here is you new password:'. $password);  
    $this->email->send();
} 

    }   

    ?>
