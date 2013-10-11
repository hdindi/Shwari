<?php
class Medic_log extends CI_Model{

	public function _construct(){
		parent::_construct();
		}

		public function toMed(){

			$medicationid=$this->input->post('medicationid',TRUE);
		    $medicationid=mysql_real_escape_string($medicationid);


			$barcode_id=$this->input->post('barcode_id',TRUE);
		    $barcode_id=mysql_real_escape_string($barcode_id);

		    $this->db->set('medicationid',$medicationid);
		    $this->db->set('barcode_id',$barcode_id);
		    


		    $this->db->insert('barcode');
		}
}