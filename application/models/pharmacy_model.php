<?php
class Pharmacy_model extends CI_Model{
	public function _construct(){
		parent::_construct();
		}
	public function pactive(){//pharm
		
  		$query="SELECT patients.fname, visit.patientid, patients.lname, patients.sname, visit.visitdate, visit.id
		FROM patients
		INNER JOIN visit
		ON patients.id=visit.patientid
		WHERE visit.visitdate >= CURDATE()
		AND visit.pq = 'active'
		ORDER BY visit.visitdate ";
		$result=$this->db->query($query);
		return $result->result_array();
	
		  
	}
    public function see_details($visit_id){
		//$visit_id=$this->uri->segment(3);
	$query=$this->db->get_where('visit', array('id'=> $visit_id));
	 // if($query->num_rows()==1){
		  foreach($query->result_array() as $row){
			  $patient_id=$row['patientid'];
			  $sql=$this->db->get_where('patients',array('id'=> $patient_id));
			  return $sql->result_array();
			  
		}
	}

	public function see_history($id){
		$sql="SELECT employee.fname, employee.lname, triage.NurseID, triage.visitid, visit.visitdate, visit.id,triage.Weight, 
			triage.Height, triage.OCS, triage.allergies, triage.diastle, triage.systle, triage.Temperature
            FROM triage
            INNER JOIN visit
            ON triage.visitid=visit.id
            INNER JOIN employee
            ON triage.NurseID = employee.id
            WHERE visit.patientid = '".$id."'";
			$query=$this->db->query($sql);
			return $query->result_array();
	
		}
	public function prescription($id){
		$que="SELECT prescription.medname, prescription.dosage, prescription.duration, prescription.id,
		prescription.remarks, prescription.administeredstatus, employee.Fname, prescription.amount,
		employee.Sname, employee.Lname, prescription.docid, medicines.code,medicines.Medicine_name, 
		medicines.strength, medicines.units, medicines.price
		FROM prescription
		INNER JOIN medicines ON prescription.medname = medicines.code
		INNER JOIN employee ON employee.id = prescription.docid
		INNER JOIN visit ON prescription.checkupid = visit.id
		WHERE prescription.checkupid ='".$id."'";

		$result=$this->db->query($que);
		return $result->result_array();
		
		}
	

	
	public function Finish($id)
	{
		$today = date("H:i:s"); 
		$data = array(
               'pq' => 'in-active',
               'pend' => $today
            );

		$this->db->where('id', $id);
		$this->db->update('visit', $data); 
	}
	public function ToNur($id)
	{
		$today = date("H:i:s");
		$data = array(
		'pq' => 'in-active',
		'pend' => $today,
		'nq' => 'active',
		'nstart' => $today
		);
		$this->db->where('id', $id);
		$this->db->update('visit', $data);
		
		}
	public function administered(){
		$pharmid=$this->session->userdata('id');
		$visitid=$this->input->post('checkupid', TRUE);
		
		if(isset($_POST['checkbox'])){
		$checkbox = $_POST['checkbox'];
		if(isset($_POST["activate"])?$activate = $_POST["activate"]:$deactivate = $_POST["deactivate"])
		$id = "('" . implode( "','", $checkbox ) . "');" ;
		$sql="UPDATE prescription SET pharmid = '".$pharmid."',administeredstatus = '".(isset($activate)?'dispensed':'not dispensed')."' WHERE id IN $id" ;
		$result = mysql_query($sql) or die(mysql_error());
		}
		$this->update_stock($visitid);
		 
   }   
   public function update_stock($id){
		$sql="SELECT visit.patientid, medicines.exp_date, prescription.pharmid, prescription.amount, prescription.administeredstatus, prescription.medname, medicines.code, medicines.stock_in_hand, medicines.min_amount, medicines.id AS drug_id, prescription.id AS prescription_id
        FROM prescription
        INNER JOIN medicines ON prescription.medname = medicines.code
        LEFT JOIN visit ON prescription.checkupid = visit.id
		WHERE prescription.checkupid= '".$id."'
		AND prescription.administeredstatus= 'dispensed'";
		$result=$this->db->query($sql);
		foreach($result->result_array() as $query){
			
			$stock=$query['stock_in_hand'];
			$amount=$query['amount'];
			$drug_id=$query['drug_id'];
			$exp_date=$query['exp_date'];
			$pharmid=$query['pharmid'];
			$patientid=$query['patientid'];
			if($stock > $amount){
					
				
				
				
			$new_stock=$stock-$amount;
			
			 $data=array(
			'stock_in_hand'=> $new_stock
			);
			
			$this->db->where('code',$query['code']);
			$this->db->update('medicines',$data);
			
			
			
		$sql="insert into stock_movement set drug_id=$drug_id, date_of_issue=NOW(),
		reference='Dispensed',exp_date=$exp_date,opening_bal=$stock,issues=$amount,
		closing_bal=$new_stock,issuing_officer=$pharmid,service_point='Patient :$patientid'";
		$result=$this->db->query($sql);	
			
			}
			else{
				$data=array(
				'administeredstatus'=> 'not dispensed'
				);
				
				$this->db->where('id',$query['id']);
			    $this->db->update('prescription',$data);
				$this->stock_control();
				}
			
		}
	}
	public function stock_control(){
		return false;
		}
	public function change_order(){
	   $pharmid=$this->session->userdata('id');
	
	   $id=$this->input->post('id',TRUE);
	   $id=mysql_real_escape_string($id);
	   $prescid=$this->input->post('prescid',TRUE);
	   $prescid=mysql_real_escape_string($prescid);
	   $medicine=$this->input->post('medname',TRUE);
	   $medname=mysql_real_escape_string($medicine);
	   $dosage=$this->input->post('dosage',TRUE);
	   $dosage=mysql_real_escape_string($dosage);
	   $duration=$this->input->post('duration',TRUE);
	   $medduration=mysql_real_escape_string($duration);
	   $remarks=$this->input->post('remarks',TRUE);
	   $medremarks=mysql_real_escape_string($remarks);
		
		$data=array(
		'medname'=> $medname,
		'dosage'=> $dosage,
		'duration'=> $medduration,
		'remarks'=> $medremarks,
		'pharmid'=> $pharmid
		
		);
		$this->db->where('id',$id);
		$this->db->update('prescription',$data);
		if ($this->db->affected_rows() == '1')
		{
			
			return TRUE;
		}
		
		return FALSE;
	
		
		}
	public function medicine(){
		$query=$this->db->get('medicines');
		return $query->result_array();

		}
	public function prescription_history($patientid){
		$que="SELECT patients.fname, patients.lname, patients.sname, visit.VisitDate, prescription.medname, prescription.docid, prescription.dosage, prescription.duration, prescription.remarks, prescription.administeredstatus
			  FROM prescription
			  INNER JOIN visit 
			  ON prescription.checkupid = visit.id
			  INNER JOIN patients 
			  ON patients.id = visit.patientid
			  WHERE patients.id= '".$patientid."'";

		
			$result=$this->db->query($que);
		    return $result->result_array();
			}
	public function getallergy($patient)
		{
	$query="SELECT patient_allergy.allergy
		    FROM patients
		    INNER JOIN patient_allergy
		    ON patients.id=patient_allergy.patient_id
		    WHERE patient_allergy.patient_id = '".$patient."'";
		    $result=$this->db->query($query);
		    return $result->result_array();
	}
	public function consultation($visitid){
		$sql="SELECT employee.Fname, employee.Lname, employee.Sname, check_up.complaints,check_up.med_history,  
		check_up.systemic_inquiry, check_up.examination_findings, check_up.diagnosis
		from check_up
		INNER JOIN visit 
		ON check_up.visitid = visit.id
	    INNER JOIN employee 
		ON employee.id = check_up.docid
		WHERE check_up.visitid= '".$visitid."'";
		$result=$this->db->query($sql);
		return $result->result_array();
		}
	
	public function stocks(){
		$query="SELECT medicines.code,medicines.Medicine_name, 
		medicines.strength, medicines.units, medicines.price, medicines.stock_in_hand, medicines.min_amount
		FROM medicines
		WHERE medicines.stock_in_hand <= medicines.min_amount";
		$result=$this->db->query($query);
		return $result->result_array();
		}
	public function save(){
		$total=$this->input->post('cost');
		$total=mysql_real_escape_string($total);
		
		$visitid=$this->input->post('visitid');
		$visitid=mysql_real_escape_string($visitid);
		
		//$faculty=$this->session->userdata('type');
		
		$this->db->set('cost',$total);
		$this->db->set('visitid',$visitid);
		//$this->db->set('faculty',$faculty);
		
		$this->db->insert('pharm_payments');
		if($this->db->affected_rows()){
			$this->red();
			}
	
		
		}
	public function red(){
		if(isset($_POST['chk'])){
		$checkbox=$_POST['chk'];
		foreach($checkbox as $box){
		$result_explode=explode("|",$box);
		$result=array($result_explode[0]);
		if(isset($_POST['save'])?$activate = $_POST["save"]:$deactivate = $_POST["deactivate"])
		$id = "('" . implode( ",",$result) . "');" ;
		$sql="UPDATE prescription SET paymentid = '".(isset($activate)?'1':'0')."', paid='yes' WHERE id IN $id" ;
        $result = mysql_query($sql) or die(mysql_error());
		}
		
	}
 }
   public function pharm_paid($id){
	   	$que="SELECT prescription.medname, prescription.dosage, prescription.duration, prescription.id,
		prescription.remarks, prescription.administeredstatus, employee.Fname, prescription.amount,
		employee.Sname, employee.Lname, prescription.docid, medicines.code,medicines.Medicine_name, 
		medicines.strength, medicines.units, medicines.price
		FROM prescription
		INNER JOIN medicines ON prescription.medname = medicines.code
		INNER JOIN employee ON employee.id = prescription.docid
		INNER JOIN visit ON prescription.checkupid = visit.id
		WHERE prescription.checkupid ='".$id."'
		AND prescription.paymentid=1";

		$result=$this->db->query($que);
		return $result->result_array();
	   
	   }
	
	public function get_presc($id){
		$que="SELECT prescription.medname, prescription.dosage, prescription.duration, prescription.id,
        medicines.code,medicines.Medicine_name, prescription.remarks, prescription.amount,
		medicines.strength, medicines.units, medicines.price
		FROM prescription
		INNER JOIN medicines ON prescription.medname = medicines.code
		WHERE prescription.id ='".$id."'";
		/*$query=$this->db->get_where('prescription',array('id'=> $id));*/
		$result=$this->db->query($que);
		return $result->result_array();
		
		}
	public function paid($id){
		$que="SELECT prescription.medname, prescription.dosage, prescription.duration, prescription.id,
		prescription.remarks, prescription.administeredstatus, employee.Fname, 
		employee.Sname, employee.Lname, prescription.docid, medicines.code,medicines.Medicine_name, 
		medicines.strength, medicines.units, medicines.price
		FROM prescription
		INNER JOIN medicines ON prescription.medname = medicines.code
		INNER JOIN employee ON employee.id = prescription.docid
		INNER JOIN visit ON prescription.checkupid = visit.id
		WHERE prescription.checkupid ='".$id."'
		AND prescription.paymentid=1
		AND prescription.administeredstatus='dispensed'";
		
		$result=$this->db->query($que);
		return $result->result_array();

		}
	
    public function new_prescription(){	
	$pharmid=$this->session->userdata('id');
	$visitid=$this->input->post('visitid',TRUE);
	$visitid=mysql_real_escape_string($visitid);
	
	$medicine=$this->input->post('medname',TRUE);
	$medname=mysql_real_escape_string($medicine);
	$amount=$this->input->post('amount',TRUE);
	$amount=mysql_real_escape_string($amount);
	$dosage=$this->input->post('dosage',TRUE);
	$meddosage=mysql_real_escape_string($dosage);
	$duration=$this->input->post('duration',TRUE);
	$medduration=mysql_real_escape_string($duration);
	$remarks=$this->input->post('remarks',TRUE);
	$medremarks=mysql_real_escape_string($remarks);
		
		
	$this->db->set('checkupid',$visitid);
	$this->db->set('pharmid',$pharmid);
	$this->db->set('medname',$medname);
	$this->db->set('amount',$amount);
	$this->db->set('dosage',$meddosage);
	$this->db->set('duration',$medduration);
	$this->db->set('remarks',$medremarks);
	//$this->db->set('provisional',$provisional);
	
	$this->db->insert('prescription');
    }
   public function pharm($id){
		$sql="Select * from pharm_payments where visitid='".$id."' and paid='0'";
		$result=$this->db->query($sql);
		return $result->result_array();
		}
	public function unpaid($id){
		$que="SELECT prescription.medname, prescription.dosage, prescription.duration, prescription.id,
		prescription.remarks, prescription.administeredstatus, employee.Fname, prescription.amount, prescription.paid,
		employee.Sname, employee.Lname, prescription.docid, medicines.code,medicines.Medicine_name, 
		medicines.strength, medicines.units, medicines.price
		FROM prescription
		INNER JOIN medicines ON prescription.medname = medicines.code
		INNER JOIN employee ON employee.id = prescription.docid
		INNER JOIN visit ON prescription.checkupid = visit.id
		WHERE prescription.checkupid ='".$id."'";		
		$result=$this->db->query($que);
		return $result->result_array();

		}
	
    public function add_walkin(){
	$pharmid=$this->session->userdata('id');
		
	$patientname=$this->input->post('patientid',TRUE);
	$patientname=mysql_real_escape_string($patientname);
	$medicine=$this->input->post('medname',TRUE);
	$medname=mysql_real_escape_string($medicine);
	$amount=$this->input->post('amount',TRUE);
	$amount=mysql_real_escape_string($amount);
	$dosage=$this->input->post('dosage',TRUE);
	$meddosage=mysql_real_escape_string($dosage);
	$duration=$this->input->post('duration',TRUE);
	$medduration=mysql_real_escape_string($duration);
	$remarks=$this->input->post('remarks',TRUE);
	$medremarks=mysql_real_escape_string($remarks);
		
		
	$this->db->set('patientid',$patientname);
	$this->db->set('pharmid',$pharmid);
	$this->db->set('medname',$medname);
	$this->db->set('amount',$amount);
	$this->db->set('dosage',$meddosage);
	$this->db->set('duration',$medduration);
	$this->db->set('remarks',$medremarks);
	//$this->db->set('provisional',$provisional);
	
	$this->db->insert('walkin_pharm');
		
		}
     public function walkin(){//pharm
		
  		$query="SELECT walkin.patientname, walkin.id, walkin.department, walkin.Date, walkin.check
		FROM walkin
		WHERE walkin.Date >= CURDATE()
		AND walkin.department = 'Pharmacy'
		AND walkin.check='1'
		ORDER BY walkin.Date ";
		$result=$this->db->query($query);
		return $result->result_array();
	
		  
	 }
	 public function walkin_data($id){
		$que="SELECT walkin_pharm.medname, walkin_pharm.dosage, walkin_pharm.duration, walkin_pharm.id,
		walkin_pharm.remarks, walkin_pharm.administeredstatus, walkin_pharm.amount, walkin_pharm.paid, walkin_pharm.patientid,
		medicines.code,medicines.Medicine_name,medicines.strength, medicines.units, medicines.price, walkin_pharm.paid
		FROM walkin_pharm
		INNER JOIN medicines ON walkin_pharm.medname = medicines.code
		WHERE walkin_pharm.patientid ='".$id."'
		AND walkin_pharm.Date>=CURDATE()";		
		$result=$this->db->query($que);
		return $result->result_array();
		 }
	public function walkin_payments(){
		$total=$this->input->post('total');
		$total=mysql_real_escape_string($total);
		
		$patientid=$this->input->post('patientid');
		$patientid=mysql_real_escape_string($patientid);
		
		$faculty=$this->session->userdata('type');
		
		$this->db->set('total',$total);
		$this->db->set('patientid',$patientid);
		$this->db->set('faculty',$faculty);
		
		$this->db->insert('walkin_payments');
		if($this->db->affected_rows()){
		if(isset($_POST['chk'])){
		$checkbox=$_POST['chk'];
		foreach($checkbox as $box){
		$result_explode=explode("|",$box);
		$result=array($result_explode[0]);
		if(isset($_POST['save'])?$activate = $_POST["save"]:$deactivate = $_POST["deactivate"])
		$id = "('" . implode( ",",$result) . "');" ;
		$sql="UPDATE walkin_pharm SET paymentid = '".(isset($activate)?'1':'0')."', paid='yes' WHERE id IN $id" ;
        $result = mysql_query($sql) or die(mysql_error());
		 }
	   }
	}
  }
   public function paid_walkin($id){
	   $que="SELECT walkin_pharm.medname, walkin_pharm.dosage, walkin_pharm.duration, walkin_pharm.id,
	   walkin_pharm.remarks, walkin_pharm.administeredstatus, walkin_pharm.amount,
	   medicines.code,medicines.Medicine_name,medicines.strength, medicines.units, medicines.price
	   FROM walkin_pharm
	   INNER JOIN medicines ON walkin_pharm.medname = medicines.code
	   INNER JOIN walkin ON walkin_pharm.patientid = walkin.id
	   WHERE walkin_pharm.patientid ='".$id."'
	   AND walkin_pharm.paymentid=1";

		$result=$this->db->query($que);
		return $result->result_array();
	   }
	 public function pharm_walkin($id){
		 $query="Select * from walkin_payments where paymentid='0' AND faculty='Pharmacy' AND patientid='".$id."'";
		 $result=$this->db->query($query);
		 return $result->result_array();
		 }
	public function walkin_dispense($id){
		$que="SELECT walkin_pharm.medname, walkin_pharm.dosage, walkin_pharm.duration, walkin_pharm.id,
		walkin_pharm.remarks, walkin_pharm.administeredstatus, medicines.code,medicines.Medicine_name, 
		medicines.strength, medicines.units, medicines.price, walkin_pharm.patientid
		FROM walkin_pharm
		INNER JOIN medicines ON walkin_pharm.medname = medicines.code
		INNER JOIN walkin ON walkin.id =  walkin_pharm.patientid
		WHERE walkin_pharm.patientid ='".$id."'
		AND walkin_pharm.paymentid=1
		AND walkin_pharm.administeredstatus='dispensed'";
		
		$result=$this->db->query($que);
		return $result->result_array();

		
	}
	public function admin(){
		$pharmid=$this->session->userdata('id');
		$patientid=$this->input->post('patientid', TRUE);
		
		if(isset($_POST['checkbox'])){
		$checkbox = $_POST['checkbox'];
		if(isset($_POST["activate"])?$activate = $_POST["activate"]:$deactivate = $_POST["deactivate"])
		$id = "('" . implode( "','", $checkbox ) . "');" ;
		$sql="UPDATE walkin_pharm SET pharmid = '".$pharmid."',administeredstatus = '".(isset($activate)?'dispensed':'not dispensed')."' WHERE id IN $id" ;
		$result = mysql_query($sql) or die(mysql_error());
		}
		$this->dispensing_walkin($patientid);
		}
	public function dispensing_walkin($id){
		$sql="SELECT walkin_pharm.amount, walkin_pharm.administeredstatus, walkin_pharm.medname, 
		medicines.code, medicines.stock_in_hand, medicines.min_amount, medicines.id, walkin_pharm.id
		from walkin_pharm
		INNER JOIN medicines 
		ON walkin_pharm.medname= medicines.code
		WHERE walkin_pharm.patientid= '".$id."'
		AND walkin_pharm.administeredstatus= 'dispensed'";
		$result=$this->db->query($sql);
		foreach($result->result_array() as $query){
			
			$stock=$query['stock_in_hand'];
			$amount=$query['amount'];
			if($stock > $amount){
			$new_stock=$stock-$amount;
			
			 $data=array(
			'stock_in_hand'=> $new_stock
			);
			
			$this->db->where('code',$query['code']);
			$this->db->update('medicines',$data);
			
			}
			else{
				$data=array(
				'administeredstatus'=> 'not dispensed'
				);
				
				$this->db->where('id',$query['id']);
			    $this->db->update('prescription',$data);
				$this->stock_control();
				}
			
		}
	}

}