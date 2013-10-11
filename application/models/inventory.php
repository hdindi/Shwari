<?php
class Inventory extends CI_Model{
	public function _construct(){
		parent::_construct();
		}
	 public function get_nonemeds(){
		 $query=$this->db->get('none_meds');
		 return $query->result_array();
		 }
	public function get_stock(){
		$id=$this->input->post('drug_id');
		//$date=$this->input->post('date');
		
		$query="SELECT stock_movement.drug_id,stock_movement.date_of_issue,stock_movement.reference,stock_movement.exp_date,
				stock_movement.opening_bal,stock_movement.issues,stock_movement.closing_bal,stock_movement.issuing_officer,stock_movement.service_point,
				medicines.Medicine_name,employee.fname,employee.lname,employee.sname
				FROM stock_movement
				INNER JOIN medicines ON medicines.id=stock_movement.drug_id
				INNER JOIN employee ON employee.id=stock_movement.issuing_officer
				WHERE stock_movement.drug_id='".$id."'";
				$result=$this->db->query($query);
		return $result->result_array();
		}
	public function getallmovements(){
		//$id=$this->input->post('drug_id');
		
		$query="SELECT stock_movement.drug_id,stock_movement.date_of_issue,stock_movement.reference,stock_movement.exp_date,
				stock_movement.opening_bal,stock_movement.issues,stock_movement.closing_bal,stock_movement.issuing_officer,stock_movement.service_point,
				medicines.Medicine_name,employee.fname,employee.lname,employee.sname
				FROM stock_movement
				INNER JOIN medicines ON medicines.id=stock_movement.drug_id
				INNER JOIN employee ON employee.id=stock_movement.issuing_officer";
		$result=$this->db->query($query);
		return $result->result_array();
		}
	public function get_meds(){
		$query=$this->db->get('medicines');
		return $query->result_array();
		
		}
	public function department_orders(){
		$department=$this->session->userdata('type');
		
		$empid=$this->session->userdata('id');
		
		$opening_bal=$this->input->post('opening_bal');
		$opening_bal=mysql_real_escape_string($opening_bal);
		
		$ordered=$this->input->post('ordered');
		$ordered=mysql_real_escape_string($ordered);
		
		$item_id=$this->input->post('item_id');
		$item_id=mysql_real_escape_string($item_id);
		
		$sql="Insert into department_orders set item_id=$item_id,empid=$empid,ordered=$ordered,department='$department',date_ordered=NOW()";
		$this->db->query($sql);
			
	}
	public function get_orders(){
		
		$sql="Select department_orders.item_id,department_orders.department,department_orders.ordered,department_orders.id,
		none_meds.available_quantity,none_meds.name,none_meds.batch_no,none_meds.exp_date,department_orders.date_ordered
		FROM department_orders
		INNER JOIN none_meds ON none_meds.id=department_orders.item_id
		WHERE department_orders.issued='no'";
		$result=$this->db->query($sql);
		return $result->result_array();
		}
	public function issue(){
		$issuing_officer=$this->session->userdata('id');
		
		$drug_id=$this->input->post('id');
		$drug_id=mysql_real_escape_string($drug_id);
		
		$item_id=$this->input->post('item_id');
		$item_id=mysql_real_escape_string($item_id);
	
		
		$exp_date=$this->input->post('exp_date');
		$exp_date=mysql_real_escape_string($exp_date);
		
		$opening_bal=$this->input->post('opening_bal');
		$opening_bal=mysql_real_escape_string($opening_bal);
		
		$issues=$this->input->post('issues');
		$issues=mysql_real_escape_string($issues);
		
		$closing_bal=$this->input->post('closing_bal');
		$closing_bal=mysql_real_escape_string($closing_bal);
		
		$service_point=$this->input->post('service_point');
		$service_point=mysql_real_escape_string($service_point);
		
		
		$this->db->set('item_id',$item_id);
		$this->db->set('reference','INTERNAL');
		$this->db->set('exp_date',$exp_date);
		$this->db->set('opening_bal',$opening_bal);
		$this->db->set('issues',$issues);
		$this->db->set('closing_bal',$closing_bal);
		$this->db->set('issuing_officer',$issuing_officer);
		$this->db->set('service_point',$service_point);
		
		$this->db->insert('items_movement');
		if($this->db->affected_rows()==1){
	
		
		$remaining_bal=$opening_bal-$issues;
		
		$sql="Update department_orders SET issued='yes' WHERE id=$item_id";
		$this->db->query($sql);
		
		$query="Update none_meds SET available_quantity=$remaining_bal WHERE id=$drug_id";
		$this->db->query($query);
				
		
		
		
		}
	}
		public function tobeordered(){
			$query="SELECT * FROM  `medicines` WHERE  `stock_in_hand` <=  `min_amount`  ";
			$result=$this->db->query($query);
			return $result->result_array();
			}
		public function nurse_orderhistory(){
		$sql="Select department_orders.item_id,department_orders.department,department_orders.ordered,department_orders.id,
		none_meds.available_quantity,none_meds.name,none_meds.batch_no,none_meds.exp_date,items_movement.issuing_officer,items_movement.reference,
		items_movement.opening_bal,items_movement.issues,items_movement.closing_bal,items_movement.service_point,items_movement.date_of_issue,
		employee.fname,employee.lname,employee.sname
		FROM department_orders
		INNER JOIN none_meds ON none_meds.id=department_orders.item_id
		INNER JOIN items_movement ON items_movement.item_id=department_orders.id
		INNER JOIN employee ON employee.id=items_movement.issuing_officer
		WHERE department_orders.issued='yes'
		AND department_orders.department='Nurse'";
		$result=$this->db->query($sql);
		return $result->result_array();
		}
		public function doc_orderhistory(){
		$sql="Select department_orders.item_id,department_orders.department,department_orders.ordered,department_orders.id,
		none_meds.available_quantity,none_meds.name,none_meds.batch_no,none_meds.exp_date,items_movement.issuing_officer,items_movement.reference,
		items_movement.opening_bal,items_movement.issues,items_movement.closing_bal,items_movement.service_point,items_movement.date_of_issue,
		employee.fname,employee.lname,employee.sname
		FROM department_orders
		INNER JOIN none_meds ON none_meds.id=department_orders.item_id
		INNER JOIN items_movement ON items_movement.item_id=department_orders.id
		INNER JOIN employee ON employee.id=items_movement.issuing_officer
		WHERE department_orders.issued='yes'
		AND department_orders.department='Doctor'";
		$result=$this->db->query($sql);
		return $result->result_array();
		}
		public function lab_orderhistory(){
		$sql="Select department_orders.item_id,department_orders.department,department_orders.ordered,department_orders.id,
		none_meds.available_quantity,none_meds.name,none_meds.batch_no,none_meds.exp_date,items_movement.issuing_officer,items_movement.reference,
		items_movement.opening_bal,items_movement.issues,items_movement.closing_bal,items_movement.service_point,items_movement.date_of_issue,
		employee.fname,employee.lname,employee.sname
		FROM department_orders
		INNER JOIN none_meds ON none_meds.id=department_orders.item_id
		INNER JOIN items_movement ON items_movement.item_id=department_orders.id
		INNER JOIN employee ON employee.id=items_movement.issuing_officer
		WHERE department_orders.issued='yes'
		AND department_orders.department='Lab Technician'";
		$result=$this->db->query($sql);
		return $result->result_array();
		}
		public function order_history(){
		$sql="Select department_orders.item_id,department_orders.department,department_orders.ordered,department_orders.id,
		none_meds.available_quantity,none_meds.name,none_meds.batch_no,none_meds.exp_date,items_movement.issuing_officer,items_movement.reference,
		items_movement.opening_bal,items_movement.issues,items_movement.closing_bal,items_movement.service_point,items_movement.date_of_issue,
		employee.fname,employee.lname,employee.sname
		FROM department_orders
		INNER JOIN none_meds ON none_meds.id=department_orders.item_id
		INNER JOIN items_movement ON items_movement.item_id=department_orders.id
		INNER JOIN employee ON employee.id=items_movement.issuing_officer";
		$result=$this->db->query($sql);
		return $result->result_array();
		}
		public function get_nurseorders(){
			
		$id=$this->session->userdata('id');
		
		$sql="Select department_orders.item_id,department_orders.department,department_orders.ordered,department_orders.id,
		none_meds.available_quantity,none_meds.name,none_meds.batch_no,none_meds.exp_date,department_orders.date_ordered
		FROM department_orders
		INNER JOIN none_meds ON none_meds.id=department_orders.item_id
		WHERE department_orders.issued='no'
		AND department_orders.empid=$id
		ORDER BY department_orders.date_ordered";
		$result=$this->db->query($sql);
		return $result->result_array();
		}

	

}
?>