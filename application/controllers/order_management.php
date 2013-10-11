<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Order_Management extends CI_Controller{
	public function _construct(){
		parent::_construct();
		}
	
	public function index(){
            $this->load->library('form_validation','session');
		$data['order']=$this->inventory->tobeordered();
		$data['view']='orders';
		$data['meds']=$this->inventory->get_meds();
		$this->load->view('issues',$data);
	/*$query="SELECT * FROM  `medicines` WHERE  `stock_in_hand` <=  `min_amount`  ";
	$result=$this->db->query($query)-> result_array();

	
	$table_body="";
	$order_total=0;
		
		foreach($result as $row){
			
	$total_units=$row['stock_in_hand']*3;
	
	$units_to_compute=$total_units/$row['units'];
	$total_cost=$units_to_compute*$row['buying_price'];
			
	$table_body .="<tr>
	<td>".$row['code']."</td>
	<td>".$row['Medicine_name']."</td>
	<td>".$row['strength']."</td>
	<td>".$row['units']."</td>
	<td>".$row['buying_price']."</td>
	<td>".$total_units."</td>
	<td>".$total_cost."</td>
	</tr>
	";

	$order_total=$order_total+$total_cost;		  
		}
	

		 
		 		//create the report title
$html_title="<div ALIGN=CENTER><img src='".base_url()."assets/img/shwari.jpg' height='70' width='70'style='vertical-align: top;' > </img></div>
 <div style='text-align:center; font-size: 14px;display: block;font-weight: bold;'>Order Report</div>
 <div style='text-align:center; font-family: arial,helvetica,clean,sans-serif;display: block; font-weight: bold; font-size: 14px;'>
  CareTech</div>
  <div style='text-align:center; font-family: arial,helvetica,clean,sans-serif;display: block; font-weight: bold;display: block; font-size: 13px;'></div><hr />   ";
  	
$html_body ="<style>table.data-table {border: 1px solid #DDD;margin: 10px auto;border-spacing: 0px;}
table.data-table th {border: none;color: #036;text-align: center;background-color: 	#FFF380;border: 1px solid #DDD;border-top: none;max-width: 450px;}
table.data-table td, table th {padding: 4px;}
table.data-table td {border: none;border-left: 1px solid #DDD;border-right: 1px solid #DDD;height: 30px;margin: 0px;border-bottom: 1px solid #DDD;}
</style>
<table class='data-table'>
<thead>
<tr>
<th><b>DRUG Code</b></th>
<th><b>Description</b></th>
<th><b>Strength</b></th>
<th><b>Order Unit Size</b></th>
<th><b>Order Unit Cost</b></th>
<th><b>Order Quantity</b></th>
<th><b>Order cost(Ksh)</b></th>
</tr>".$table_body."<tr><td colspan='6'></td><td>TOTAL: ".number_format($order_total, 2, '.', ',')."</td><tr>
</thead>
<tbody>";

$html_body .='</tbody></table></ol>'; 

$data['view']= $html_title.$html_body;
          // $this->load->library('mpdf');
		//now ganerate an order pdf from the generated report
          //  $this->mpdf = new mPDF('', 'A4-L', 0, '', 15, 15, 16, 16, 9, 9, '');
          //  $report_name='facility_order_no';
          //  $this->mpdf->WriteHTML($html_body);
          //  $this->mpdf->defaultheaderline = 1;  
          //  $this->mpdf->simpleTables = true;
          //  $this->mpdf->WriteHTML($html_body);
          //  $this->mpdf->Output($report_name,'D');
			
			
		  /* if(!$this->mpdf->Output($report_name,'D')):
				
		die("error");
else:
   redirect("/");
endif;*/
		
		 
	} 
}

?>
	