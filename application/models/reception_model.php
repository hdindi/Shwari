<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reception_model extends CI_Model {
	public function _construct()
	{
		parent::_construct();
	}
	public function all()
	{
        $query="SELECT patients.fname, visit.patientid, patients.lname, patients.sname, visit.visitdate, visit.id
	    FROM patients
	    INNER JOIN visit ON patients.id = visit.patientid
	    WHERE visit.visitdate >= DATE_ADD( CURDATE( ) , INTERVAL -1
	    MONTH )
	    AND visit.nq = 'active'
	    ORDER BY visit.visitdate
	    LIMIT 6";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function payments()
	{
		$query ="SELECT patients.fname, patients.lname, patients.sname,visit.id,patients.id,costs.visitid
		FROM patients
		INNER JOIN visit ON patients.id = visit.patientid
		INNER JOIN costs ON visit.id = costs.visitid
		WHERE costs.paid = 'not paid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function addpat()
	{
	
	$nationalid=$this->input->post('nationalid',TRUE);
	$nationalid=mysql_real_escape_string($nationalid);
	$sname=$this->input->post('sname',TRUE);
	$sname=mysql_real_escape_string($sname);
	$fname=$this->input->post('fname',TRUE);
	$fname=mysql_real_escape_string($fname);
	$lname=$this->input->post('lname',TRUE);
	$lname=mysql_real_escape_string($lname);
	$dob=$this->input->post('dob',TRUE);
	$dob=mysql_real_escape_string($dob);
	$address=$this->input->post('address',TRUE);
	$address=mysql_real_escape_string($address);
	$phone=$this->input->post('phone',TRUE);
	$phone=mysql_real_escape_string($phone);
	$email=$this->input->post('email',TRUE);
	$email=mysql_real_escape_string($email);
	$maritalstatus=$this->input->post('maritalstatus',TRUE);
	$maritalstatus=mysql_real_escape_string($maritalstatus);
	$kinname=$this->input->post('kinname',TRUE);
	$kinname=mysql_real_escape_string($kinname);
	$kinphone=$this->input->post('kinphone',TRUE);
	$kinphone=mysql_real_escape_string($kinphone);
	$sex=$this->input->post('sex',TRUE);
	$sex=mysql_real_escape_string($sex);
	$employer=$this->input->post('employer',TRUE);
	$employer=mysql_real_escape_string($employer);
	$residence=$this->input->post('residence',TRUE);
	$residence=mysql_real_escape_string($residence);
	$employmentstatus=$this->input->post('employmentstatus',TRUE);
	$employmentstatus=mysql_real_escape_string($employmentstatus);
	$kinrelation=$this->input->post('kinrelation',TRUE);
	$kinrelation=mysql_real_escape_string($kinrelation);
	
	$this->db->set('nationalid',$nationalid);
	$this->db->set('fname',$fname);
	$this->db->set('sname',$sname);
	$this->db->set('lname',$lname);
	$this->db->set('dob',$dob);
	$this->db->set('address',$address);
	$this->db->set('phone',$phone);
	$this->db->set('email',$email);
	$this->db->set('maritalstatus',$maritalstatus);
	$this->db->set('kinname',$kinname);
	$this->db->set('kinphone',$kinphone);
	$this->db->set('employmentstatus',$employmentstatus);
	$this->db->set('employer',$employer);
	$this->db->set('sex',$sex);
	$this->db->set('residence',$residence);
	$this->db->set('kinrelation',$kinrelation);
	
	
	$this->db->insert('patients');
	
	
	}
	public function to_package(){

        $visiti=$this->input->post('visitid',TRUE);
		$visiti=mysql_real_escape_string($visiti);
		$packageid=$this->input->post('packageid',TRUE);
		$packageid=mysql_real_escape_string($packageid);
		/*$cos=$this->input->post('cos',TRUE);
		$cos=mysql_real_escape_string($cos);
		$Mpesa=$this->input->post('Mpesa',TRUE);
		$Mpesa=mysql_real_escape_string($Mpesa);*/
		$paid=$this->input->post('paid',TRUE);
		$paid=mysql_real_escape_string($paid);
		$total=$this->input->post('total',TRUE);
		$total=mysql_real_escape_string($total);
		//$cash=$this->input->post('cash',TRUE);
		//$cash=mysql_real_escape_string($cash);
		$today = date("H:i:s");
		
		/*$this->db->set('visitid',$visitid);
		$this->db->set('package',$packageid);
		$this->db->set('cost',$cost);
		$this->db->set('Mpesa',$Mpesa);
		$this->db->set('paid',$paid);
		$this->db->insert('costs');*/
		
		$this->db->set('nq','active');
		$this->db->set('patientid',$visiti);
		$this->db->set('nstart',$today);
		
		$this->db->insert('visit');
		$visitid=$this->db->insert_id();
		
		$this->db->set('visitid',$visitid);
		$this->db->set('package',$packageid);
		$this->db->set('cost',$total);
		$this->db->insert('costs');
		
		/*if ($cash != NULL)
		{
			$this->db->set('visitid',$visitid);
			$this->db->set('cost',$cash);
			$this->db->set('package',$packageid);

			$this->db->insert('cash_cost');

			mysql_query("INSERT INTO costs (visitid, package,plus, cost, mpesa, paid)VALUES ('$visitid', '$packageid','cash', '$cos', '$Mpesa','paid')");
		}
		else if($cash==NULL){
			mysql_query("INSERT INTO costs (visitid, package, cost, mpesa, paid)VALUES ('$visitid', '$packageid', '$cos', '$Mpesa','paid')");
		}
		*/
		
  }
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
	public function see_appointments(){
		
		$query="SELECT patients.fname, appointments.patientid, patients.lname, patients.sname,
		appointments.empid, appointments.visitid, appointments.Date, appointments.Time,
		appointments.About, appointments.Title, patients.phone
		FROM appointments
		INNER JOIN patients
		ON appointments.patientid=patients.id
		INNER JOIN employee
		ON employee.id=appointments.empid
		WHERE appointments.Date=CURDATE()
		ORDER BY appointments.Time";
		$result=$this->db->query($query);
		return $result->result_array();
		
		}

		public function gettest($id)
		{	//t.name, t.cost, l.paymentid
			$query="SELECT payments.cost, patients.fname, patients.sname, patients.lname,
			payments.id, payments.visitid
			FROM payments
			INNER JOIN visit ON visit.id=payments.visitid
			INNER JOIN patients ON patients.id=visit.patientid
			WHERE payments.paid=1
            AND payments.visitid='".$id."'";
			$result=$this->db->query($query);
			return $result->result_array();
		}

		public function topaytest()
		{	//t.name, t.cost, l.paymentid
		    $query="SELECT payments.visitid, payments.cost, payments.faculty,patients.fname,
			patients.sname, patients.lname, visit.patientid, visit.VisitDate, payments.id
			FROM payments
			INNER JOIN visit ON visit.id=payments.visitid
			INNER JOIN patients ON patients.id=visit.patientid
			WHERE visit.VisitDate >=CURDATE()
            AND payments.paid=1";
			$result=$this->db->query($query);
			return $result->result_array();
			
		}
		
		public function topayphar()
		{	//t.name, t.cost, l.paymentid
			$query="SELECT pharm_payments.cost,patients.fname, pharm_payments.visitid,
			patients.sname, patients.lname, visit.patientid, visit.VisitDate, pharm_payments.id
			FROM pharm_payments
			INNER JOIN visit ON visit.id=pharm_payments.visitid
			INNER JOIN patients ON patients.id=visit.patientid
			WHERE visit.VisitDate >=CURDATE()
			AND pharm_payments.paid=1";
			$result=$this->db->query($query);
			return $result->result_array();
		}
		public function getmeds($id){
			$query="SELECT pharm_payments.cost, patients.fname, patients.sname, patients.lname,
			pharm_payments.id, pharm_payments.visitid
			FROM pharm_payments
			INNER JOIN visit ON visit.id=pharm_payments.visitid
			INNER JOIN patients ON patients.id=visit.patientid
			WHERE pharm_payments.paid=1
            AND pharm_payments.visitid='".$id."'";
			$result=$this->db->query($query);
			return $result->result_array();
		}
		
	public function ToLab($id)
	{
		$today = date("H:i:s");
		$data = array(
		//'dq' => 'in-active',
		//'dend' => $today,
		'lq' => 'active',
		'lstart' => $today
		);
		$this->db->where('id', $id);
		$this->db->update('visit', $data);
		
	}
	public function pharmcost(){
		$repid=$this->session->userdata('id');
		
		$mpesacode=$this->input->post('mpesa');
		$mpesacode=mysql_real_escape_string($mpesacode);
		
		$id=$this->input->post('id');
	    $id=mysql_real_escape_string($id);
		
		$data=array(
		'mpesa'=> $mpesacode,
		'paid'=> "0"
		);
		
		$this->db->where('id',$id);
		$this->db->update('pharm_payments',$data);
		
		
	}
	public function labcost(){
		//$repid=$this->session->userdata('id');
		
		$mpesacode=$this->input->post('MpesaCode');
		$mpesacode=mysql_real_escape_string($mpesacode);
		
		$visitid=$this->input->post('visitid');
	    $visitid=mysql_real_escape_string($visitid);
		
		$cpay=$this->input->post('cpay');
		$cpay=mysql_real_escape_string($cpay);
		
		$cash=$this->input->post('cash');
		$cash=mysql_real_escape_string($cash);
		
		$this->db->set('MpesaCode',$mpesacode);
		$this->db->set('visitid',$visitid);
		$this->db->set('cpay',$cpay);
		$this->db->set('cash',$cash);
		
		$this->db->insert('patient_payments');
		
		$data=array(
		'paid'=>'paid'
		);
		$this->db->where('visitid',$visitid);
		$this->db->update('costs',$data);
		
	}
	public function walkin(){
		$patientname=$this->input->post('patientname');
		$patientname=mysql_real_escape_string($patientname);
		
		$department=$this->input->post('department');
	    $department=mysql_real_escape_string($department);
		
		$this->db->set('patientname',$patientname);
		$this->db->set('department',$department);
		
		$this->db->insert('walkin');
		
	}
	public function topaywalkin(){
		$query="SELECT walkin_payments.total,walkin_payments.id,
	    walkin.patientname, walkin.Date, walkin_payments.patientid
		FROM walkin_payments
		INNER JOIN walkin ON walkin.id=walkin_payments.patientid
		WHERE walkin.Date >=CURDATE()
		AND walkin.check='1'
		AND walkin_payments.paymentid=1";
		$result=$this->db->query($query);
		return $result->result_array();
	
		}
	public function pay_data($id){
		$query="SELECT walkin_payments.total,walkin_payments.id,
	    walkin.patientname, walkin.Date, walkin_payments.patientid
		FROM walkin_payments
		INNER JOIN walkin ON walkin.id=walkin_payments.patientid
		WHERE walkin.Date >=CURDATE()
		AND walkin_payments.patientid='".$id."'
		AND walkin_payments.paymentid=1";
		$result=$this->db->query($query);
		return $result->result_array();
		}
	public function walkinpay(){
		$repid=$this->session->userdata('id');
		
		$mpesa=$this->input->post('cpay');
		$mpesa=mysql_real_escape_string($mpesa);
		
		$mpesacode=$this->input->post('mpesa');
		$mpesacode=mysql_real_escape_string($mpesacode);
		
		$cash=$this->input->post('cash');
		$cash=mysql_real_escape_string($cash);
		
		$id=$this->input->post('id');
	    $id=mysql_real_escape_string($id);
		
		$data=array(
		'cpay'=> $mpesa,
		'mpesa'=> $mpesacode,
		'cash'=> $cash,
		'paymentid'=> "0",
	
		);
		
		$this->db->where('id',$id);
		$this->db->update('walkin_payments',$data);
		}
		public function patient_payments(){
			$sql="SELECT costs.cost AS package, payments.cost AS labs, patients.fname,patients.lname,patients.sname,visit.id AS visitid,
			patients.id, pharm_payments.cost AS pharm_costs 
			from costs
			LEFT JOIN visit ON costs.visitid=visit.id
			LEFT JOIN patients ON visit.patientid=patients.id
			LEFT JOIN pharm_payments ON pharm_payments.visitid=visit.id
			LEFT JOIN payments ON payments.visitid=visit.id
			WHERE costs.paid='not paid' 
			AND visit.VisitDate>=CURDATE()";
			
			$result=$this->db->query($sql);
			return $result->result_array();
			}
		public function pat_payments($visitid){
			$sql="SELECT costs.cost AS package, payments.cost AS labs, patients.fname,patients.lname,patients.sname,visit.id AS visitid,
			patients.id,pharm_payments.cost AS pharm_costs 
			from patients
			LEFT JOIN visit ON patients.id=visit.patientid
			LEFT JOIN costs ON costs.visitid=visit.id
			LEFT JOIN pharm_payments ON pharm_payments.visitid=visit.id
			LEFT JOIN payments ON payments.visitid=visit.id
			WHERE costs.paid='not paid' 
			AND visit.id='".$visitid."'";
			
			$result=$this->db->query($sql);
			return $result->result_array();
			}
		public function pay_demo(){
			$visit_id=$this->input->post('visitid',TRUE);
			$visit_id=mysql_real_escape_string($visit_id);
			
			$payment_option=$this->input->post('pay',TRUE);
			$payment_option=mysql_real_escape_string($payment_option);
			
			//$total=$this->input->post('total',TRUE);
			//$total=mysql_real_escape_string($total);
			
			$cost=$this->input->post('cost',TRUE);
			$cost=mysql_real_escape_string($cost);
			
			$this->db->set('visitid',$visit_id);
			$this->db->set('payment_option',$payment_option);
			$this->db->set('total',$cost);
	
			$this->db->insert('payment_demo');		
			$data=array(
		    'paid'=>'paid'
		     );
		    $this->db->where('visitid',$visit_id);
		    $this->db->update('costs',$data);
					
		}

		
}
