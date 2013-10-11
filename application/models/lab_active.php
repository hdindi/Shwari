<?php
class Lab_active extends CI_Model{
	public function _construct(){
		parent::_construct();
		}
	public function lactive(){//lab
		
  		$query="SELECT patients.fname, visit.patientid, patients.lname, patients.sname, visit.visitdate, visit.id
		FROM patients
		INNER JOIN visit
		ON patients.id=visit.patientid
		WHERE visit.visitdate >= CURDATE()
		AND visit.lq = 'active'
		ORDER BY visit.visitdate ";
		$result=$this->db->query($query);
		return $result->result_array();
	
		  
	 }
	
	public function see_details($visitid){
		$query="SELECT lab_test.result, lab_test.visitid, check_up.id, check_up.working_diagnosis, lab_test.test, check_up.visitid
		FROM lab_test
		INNER JOIN check_up
		ON lab_test.visitid=check_up.visitid
		WHERE lab_test.visitid='".$visitid."'";
		$result=$this->db->query($query);
		return $result->result_array();
		
		}
		
	public function test_details($visitid){
	$sql=$this->db->get_where('lab_test',array('visitid'=> $visitid));
	return $sql->result_array();
	}

	public function bio_data($patient){
		$query=$this->db->get_where('patients',array('id'=> $patient));
		return $query->result_array();
		}
	public function results(){
		
		$visitid=$this->input->post('visitid',TRUE);
		$visitid=mysql_real_escape_string($visitid);
		
		$tech_id=$this->session->userdata('id');
		
		$lab_results=$this->input->post('lab_results',TRUE);
		$results = str_replace(PHP_EOL,",", $lab_results);
		$labresults=mysql_real_escape_string($results);
		
		$lab_tests=$this->input->post('test',TRUE);
		$tests=mysql_real_escape_string($lab_tests);
		
		//$sql="UPDATE lab_test SET 'lab_re'";
		
		$data=array(
		'result'=> $labresults,
		'labtechid'=> $tech_id,
		'check'=> "0"
			);
		
		$this->db->where('test',$tests);
		$this->db->where('visitid',$visitid);
		$this->db->update('lab_test',$data);
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
	public function ToDoc($id)
	{
		$today = date("H:i:s"); 
		$data = array(
               'dq' => 'active',
               'lq' => 'in-active',
               'dstart' => $today,
               'lend' => $today,
			   'results'=> 'Lab results ready'
            );

		$this->db->where('id', $id);
		$this->db->update('visit', $data); 
		
		
	}
	public function tests($visitid){
		$query="SELECT lab_test.test, lab_test.result, lab_test.check, lab_test.id,
		        tests.cost
				FROM lab_test
				INNER JOIN tests ON tests.name=lab_test.test 
				WHERE lab_test.check =1
				AND lab_test.visitid ='".$visitid."'";
				$result=$this->db->query($query);
				return $result->result_array();
		}
	public function diagnosis($visitid){
		$query=$this->db->get_where('check_up',array('visitid'=> $visitid));
		return $query->result_array();
		}
		
	public function save(){
		$total=$this->input->post('cost');
		$total=mysql_real_escape_string($total);
		
		$visitid=$this->input->post('visitid');
		$visitid=mysql_real_escape_string($visitid);
		
		$faculty=$this->session->userdata('type');
		
		$this->db->set('cost',$total);
		$this->db->set('visitid',$visitid);
		//$this->db->set('faculty',$faculty);
		
		$this->db->insert('payments');
		
		$this->red();
	
		
		}
	public function red(){
		$checkbox=$_POST['chk'];
		foreach($checkbox as $box){
		$result_explode=explode("|",$box);
		$result=array($result_explode[0]);
		if(isset($_POST['save'])?$activate = $_POST['save']:$deactivate = $_POST["deactivate"])
		$id = "('" . implode( ",",$result) . "');" ;
		$sql="UPDATE lab_test SET paymentid = '".(isset($activate)?'1':'0')."', paid='yes' WHERE id IN $id" ;
        $result = mysql_query($sql) or die(mysql_error());
		}
	
	
 }   
    public function lab($id){
		$sql="Select * from payments where visitid='".$id."' and paid='0'";
		$result=$this->db->query($sql);
		return $result->result_array();
		}
    public function paid_lab($id)
		{	//t.name, t.cost, l.paymentid
		$sql="SELECT lab_test.test, lab_test.result, lab_test.id
		FROM lab_test
		WHERE lab_test.visitid ='".$id."'
		AND lab_test.paymentid=1"; 
		$result=$this->db->query($sql);
		return $result->result_array();	
		}
	public function unpaid($id){
		$sql="SELECT lab_test.test, lab_test.result, lab_test.id, lab_test.paid
		FROM lab_test
		WHERE lab_test.visitid ='".$id."'";		
		$result=$this->db->query($sql);
		return $result->result_array();	
		}
	public function test($visitid){
		$query="SELECT lab_test.test, lab_test.result, lab_test.check, lab_test.id,
		 tests.cost
		 FROM lab_test
		 INNER JOIN tests ON tests.name=lab_test.test 
		 WHERE lab_test.check =1
		 AND lab_test.paymentid=0
		 AND lab_test.visitid ='".$visitid."'";
		 $result=$this->db->query($query);
		 return $result->result_array();
		}
			
	public function lab_test(){
	$sql="Select * from tests";
	$query=$this->db->query($sql);
	return $query->result_array();
	
		}

	public function order_labs()
	{
	$labid=$this->session->userdata('id');
	
	$visitid=$this->input->post('visitid',TRUE);
	$visitid=mysql_real_escape_string($visitid);
	
	$lab_tests=$this->input->post('test',TRUE);
	//$lab_tests=mysql_real_escape_string($lab_tests);
	
	foreach($lab_tests as $tests){
		
		$this->db->set('visitid',$visitid);
		$this->db->set('doc_id',$labid);
		$this->db->set('test',$tests);
		
		$this->db->insert('lab_test');
// Insert a record...
    }
	
  }
    public function tested($visitid){
		$query="SELECT lab_test.test, lab_test.result, lab_test.check, lab_test.id
		 FROM lab_test
		 WHERE lab_test.check =1
		 AND lab_test.paymentid=1
		 AND lab_test.visitid ='".$visitid."'";
		 $result=$this->db->query($query);
		 return $result->result_array();
		}

public function walkinlab(){
$lab_id=$this->session->userdata('id');
	
	$patientid=$this->input->post('patientid',TRUE);
	$patientid=mysql_real_escape_string($patientid);
	
	$lab_tests=$this->input->post('test',TRUE);
	//$lab_tests=mysql_real_escape_string($lab_tests);
	
	foreach($lab_tests as $tests){
		
		$this->db->set('patientid',$patientid);
		$this->db->set('labtechid',$lab_id);
		$this->db->set('test',$tests);
		
		$this->db->insert('walkin_lab');
// Insert a record...
    }
	
}
public function walkin(){//lab
		
  		$query="SELECT walkin.patientname, walkin.id, walkin.department, walkin.Date, walkin.check
		FROM walkin
		WHERE walkin.Date >= CURDATE()
		AND walkin.department = 'Lab Tech'
		AND walkin.check='1'
		ORDER BY walkin.Date ";
		$result=$this->db->query($query);
		return $result->result_array();
		  
	 }
public function unpaid_walkin($id){
	$sql="SELECT walkin_lab.test, walkin_lab.results, walkin_lab.id, tests.cost, walkin_lab.paid
		FROM walkin_lab
		INNER JOIN tests ON tests.name=walkin_lab.test 
		WHERE walkin_lab.patientid ='".$id."'";
		$result=$this->db->query($sql);
		return $result->result_array();	

	}
public function savecost(){
	    $total=$this->input->post('total');
		$total=mysql_real_escape_string($total);
		
		$patientid=$this->input->post('patientid');
		$patientid=mysql_real_escape_string($patientid);
		
		$faculty=$this->session->userdata('type');
		
		$this->db->set('total',$total);
		$this->db->set('patientid',$patientid);
		$this->db->set('faculty',$faculty);
		
		$this->db->insert('walkin_payments');
		
		if(isset($_POST['chk'])){
		$checkbox=$_POST['chk'];
		foreach($checkbox as $box){
		$result_explode=explode("|",$box);
		$result=array($result_explode[0]);
		if(isset($_POST['save'])?$activate = $_POST['save']:$deactivate = $_POST["deactivate"])
		$id = "('" . implode( ",",$result) . "');" ;
		$sql="UPDATE walkin_lab SET paymentid = '".(isset($activate)?'1':'0')."', paid='yes' WHERE id IN $id" ;
        $result = mysql_query($sql) or die(mysql_error());
		}
		
	}
}
public function tobepaid($id){
	$que="SELECT walkin_lab.test, walkin_lab.results, walkin_lab.patientid, walkin_lab.id,
		walkin_lab.paymentid, walkin_lab.check, walkin_lab.paid
		from walkin_lab
		INNER JOIN walkin ON walkin.id =  walkin_lab.patientid
		WHERE walkin_lab.patientid ='".$id."'
		AND walkin_lab.paymentid='1'";	
		$result=$this->db->query($que);
		return $result->result_array();

	
	}
public function lab_walkin($id){
	$query="Select * from walkin_payments where paymentid='0' AND faculty='Lab Tech' AND patientid='".$id."'";
		 $result=$this->db->query($query);
		 return $result->result_array();
	}

public function check_test($id){
	$que="SELECT walkin_lab.test, walkin_lab.results, walkin_lab.patientid, walkin_lab.id,
		walkin_lab.paymentid, walkin_lab.check, walkin_lab.paid
		from walkin_lab
		INNER JOIN walkin ON walkin.id =  walkin_lab.patientid
		WHERE walkin_lab.patientid ='".$id."'
		AND walkin_lab.paymentid='1'";		
		$result=$this->db->query($que);
		return $result->result_array();
	}
public function tobetested($id){
	$que="SELECT walkin_lab.test, walkin_lab.results, walkin_lab.patientid, walkin_lab.id,
		walkin_lab.paymentid, walkin_lab.check, walkin_lab.paid
		from walkin_lab
		INNER JOIN walkin ON walkin.id =  walkin_lab.patientid
		WHERE walkin_lab.patientid ='".$id."'
		AND walkin_lab.paymentid='1'
		AND walkin_lab.check='1'";
		
		$result=$this->db->query($que);
		return $result->result_array();
	}
public function walkin_results(){
		$patientid=$this->input->post('patientid',TRUE);
		$patientid=mysql_real_escape_string($patientid);
		
		$tech_id=$this->session->userdata('id');
		
		$lab_results=$this->input->post('results',TRUE);
		$results = str_replace(PHP_EOL,",", $lab_results);
		$labresults=mysql_real_escape_string($results);
		
		$lab_tests=$this->input->post('test',TRUE);
		$tests=mysql_real_escape_string($lab_tests);
		
		//$sql="UPDATE lab_test SET 'lab_re'";
		
		$data=array(
		'results'=> $labresults,
		'labtechid'=> $tech_id,
		'check'=> "0"
			);
		
		$this->db->where('test',$tests);
		$this->db->where('patientid',$patientid);
		$this->db->update('walkin_lab',$data);
		}
public function deactivate($id){
	$data=array(
	'check'=> '0'
	);
	
	$this->db->where('id',$id);
	$this->db->update('walkin',$data);
	}
	

}
?>