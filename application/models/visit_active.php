<?php
class Visit_active extends CI_Model{

	public function _construct(){
		parent::_construct();
		}

public function to_package(){
    
        $visitid=$this->input->post('visitid',TRUE);
		$visitid=mysql_real_escape_string($visitid);

		$packageid=$this->input->post('packageid',TRUE);
		$packageid=mysql_real_escape_string($packageid);

		$cost=$this->input->post('cost',TRUE);
		$cost=mysql_real_escape_string($cost);

		$Mpesa=$this->input->post('Mpesa',TRUE);
		$Mpesa=mysql_real_escape_string($Mpesa);

		$paid=$this->input->post('paid',TRUE);
		$paid=mysql_real_escape_string($paid);

           $this->db->set('visitid',$visitid);
		   //$this->db->set('packageid',$packageid);
		   $this->db->set('cost',$cost);
		   $this->db->set('Mpesa',$Mpesa);
		   $this->db->set('paid',$paid);

		   $this->db->insert('costs');
		   

}/*
public function to_visit(){
        $id=$this->input->post('id',TRUE);
		$id=mysql_real_escape_string($id);
		 $this->db->set('package',$package);
        $this->db->insert('visit');

}*/
public function package(){
       $sql="SELECT *
        FROM packages
        WHERE type IS NOT NULL";

        $query=$this->db->query($sql);
		return $query->result_array();
		}
		public function getName(){
		$query=$this->db->get('patients');
		
		return $query->result_array();

		}
public function costs($id){
	$sql=$this->db->get_where('packages',array('id'=> $id));
	return $sql->result_array();
	
	}
}
	?>