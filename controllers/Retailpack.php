<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controllername extends CI_Controller {
	var $data;
	public function __construct()
    {
        parent::__construct();
		$this->load->helper(array('form','url', 'date'));
        $this->load->library(array('session', 'form_validation', 'email'));
		//$this->data=is_logged_in();  // if you add in constructor no need write each function in above controller.
		//log_message('error', 'Controller Index was called!');
	}
	
public function index()
{		
		$this->session->sess_destroy();
		$xagent_ref_id=0;
		
		if($this->input->get('refxagent', TRUE)){
			$xagent_ref_id=$this->input->get('refxagent', TRUE);
		}
		
		$this->data['ref_url']=$xagent_ref_id;
		$query = $this->db->query("SELECT * FROM paste_products WHERE product_id=8");
		$this->data['productList'] = $query->row_array();
		
		$query = $this->db->query("SELECT name,id,prefix,ip_code from paste_country where country_allowed=1 order by name");
		$this->data['countryList'] = $query->result_array();
		
		$query = $this->db->query("SELECT name,id,prefix,ip_code,shipping_price from paste_country where country_allowed=1 and shipping_price>0 order by name");
		$this->data['shippingcountryList'] = $query->result_array();
		
		$this->load->view('redirecturl',$this->data);
}

public function ajaxupdate()
	{
		$this->session->set_userdata("my_session_id", session_id());
		$session_id=$this->session->userdata('my_session_id');
		$curr_date=date("Y-m-d H:i:s");
		
		$billing_name=$this->input->post('billing_name');
		$billing_email=$this->input->post('billing_email');
		$billing_country=$this->input->post('billing_country');
		$phonec=substr($this->input->post('billing_country_code_hid'), 1);
		$mobile=$this->input->post('billing_mobile');
		$billing_mobile_number123 = $phonec.$mobile;
		$shipping_address1=$this->input->post('shipping_address1');
		$shipping_address2=$this->input->post('shipping_address2');
		$shipping_city=$this->input->post('shipping_city');
		$shipping_postcode=$this->input->post('shipping_postcode');
		$shipping_state=$this->input->post('shipping_state');
		$shipping_country=$this->input->post('shipping_country');
		$quantity=$this->input->post('quantity');
		$action_form=$this->input->post('action_form');
		if($action_form=="ADD"){
				$shopping_history = array(
				'billing_name' => $billing_name,
				'billing_email' => $billing_email,
				'billing_country' => $billing_country,
				'billing_mobile_number' => $billing_mobile_number123,
				'shipping_address1' => $shipping_address1,
				'shipping_address2' => $shipping_address2,
				'shipping_city' => $shipping_city,
				'shipping_postcode' => $shipping_postcode,
				'shipping_state' => $shipping_state,
				'shipping_country' => $shipping_country,
				'creation_date' => $curr_date,
				'quantity' => $quantity,
				'session_id' => $session_id,
				'user_from' => 1,
				);
				
				$this->db->insert('tablename', $shopping_history);
				$shopping_history_id = $this->db->insert_id();
				echo "DONE";					
		}else if($action_form=="UPDATE"){
				$this->db->query("update tablename set billing_name='".$billing_name."',billing_email='".$billing_email."',billing_country='".$billing_country."',billing_mobile_number='".$billing_mobile_number123."',shipping_address1='".$shipping_address1."',shipping_address2='".$shipping_address2."',shipping_city='".$shipping_city."',shipping_postcode='".$shipping_postcode."',shipping_state='".$shipping_state."',shipping_country='".$shipping_country."',quantity='".$quantity."' where session_id = '".$session_id."'");
				echo "DONE";
	}							
	
	}
public function ajaxcheck(){

		$this->data['mode']=$this->input->post('mode');
		$discount_code=$this->input->post('discount_code');
			if($discount_code==""){
				echo "Please Enter the code";
			}else{
				$this->load->view('ajaxupdate_view',$this->data);
			}

}		

public function payout()
{	
	       
			$xagent_ref_id1=$this->input->post('ref_url');
			$xagent_id=0;
			
		    $ip = $this->input->ip_address();
			$query = $this->db->query("SELECT * FROM tablename WHERE product_id=8");
			$productList = $query->row_array();
			$productList['discount_price'];
			$quantity=$this->uri->segment(3);
			
			$session_id=$this->session->userdata('my_session_id');
			$query1 = $this->db->query("SELECT * FROM tablename WHERE session_id='".$session_id."'");
			$userList = $query1->row_array();
			
			
			$query1 = $this->db->query("SELECT tablename from paste_country where id='".$userList['shipping_country']."'");
			$shipCountry = $query1->row_array();
			$maintotal=($productList['discount_price']*$quantity+$shipCountry['shipping_price'])*100;
			$maintotal1=$productList['discount_price']*$quantity+$shipCountry['shipping_price'];
			
			$this->db->query("update tablename set amount='".$maintotal1."',shipping_price='".$shipCountry['shipping_price']."',quantity='".$quantity."' where session_id = '".$session_id."'");
			
			$query1 = $this->db->query("SELECT * FROM tablename WHERE session_id='".$session_id."'");
			$userListamount = $query1->row_array();
			
			$query1 = $this->db->query("SELECT name,id,prefix,ip_code from tablename where id='".$userList['billing_country']."'");
			$userCountry = $query1->row_array();
			
		  $adyen_encrypted_data = $this->input->post('adyen-encrypted-data');
		  $fin='';
		  $ref='';
		  $result['paymentResult_authCode']='';
			 if($fin == ''){
			 
			          try{
			 
							$this->load->library('Braintree_lib');
							$this->data['MerchantAccountId']='MerchantAccountId';
							$discount_code_final=$this->input->post('discount_code_final');
							
							$result = Braintree_Transaction::sale(array(
							"amount" => $maintotal1,
							"merchantAccountId"=>$this->data['MerchantAccountId'],
							"creditCard" => array(
							"number" => $this->input->post('number'),
							"cvv" => $this->input->post('cvc'),
							"expirationMonth" => $this->input->post('month'),
							"expirationYear" => $this->input->post('year')
							),
							'customer' => array(
							'id' => 'Retail_'.$userList['order_id'],
							"firstName" => $this->input->post('name')
							),
							"options" => array(
							"submitForSettlement" => true
							)
							));
							
							
							
							if ($result->success) {
									$pay_code=$result->transaction->id;
							        
									$this->db->query("update tablename set payment_code='".$pay_code."',payment_method='2',xagent_id='".$xagent_id."' where session_id = '".$session_id."'");
									
									$query1 = $this->db->query("SELECT * from tablename where status = 1");
									$bill_from = $query1->row_array();
									
									$query2 = $this->db->query("SELECT * from tablename where id = '9'");
									$SubjectRow = $query2->row_array();
									
									$data_invoice = array(
									'payment_id' => $userList['order_id'],
									'receipt_bill_from_id' => $bill_from["id"],
									'name' => $userList["billing_name"],
									'mobile' => $userList["billing_mobile_number"],
									'email' => $userList["billing_email"],
									'bill_from_name' => $bill_from["name"],
									'bill_from_companyId' => $bill_from["companyId"],
									'bill_from_address' => $bill_from["address"],
									'bill_to' => $userList["billing_name"]."<br>".$userList["billing_mobile_number"]."<br>".$userList["billing_email"],
									'payment_date' => $userList["creation_date"],
									'payment_method' => "Credit Card",
									'currency' => "USD",
									'total_price' => $userListamount["amount"],
									'publish' => 1,
									);
									
									$this->db->insert('tablename', $data_invoice);
									
									$receipt_id = $this->db->insert_id();
									$invoice_no='FXR - '.str_pad($receipt_id, 6, "0", STR_PAD_LEFT);
									$receipt_subject=str_replace('{invoice_no}',$invoice_no,$SubjectRow['title']);
									
									$this->db->query("update tablename set invoice_no='".$invoice_no."',receipt_subject='".$receipt_subject."' where receipt_id = '".$receipt_id."'");
									
									$data_receipt_details = array(
									'receipt_id' => $receipt_id,
									'item_title' => $productList["name"],
									'item_description' => $productList["description"],
									'item_code' => $productList["item_code"],
									'qty' => $quantity,
									'unit_price' => $productList["discount_price"],
									'amount' => $userListamount["amount"]-$userListamount["shipping_price"],
									'shipping_price' => $userListamount["shipping_price"],
									'payment_id' => $userList['order_id'],
									);
									
									$this->db->insert('tablename', $data_receipt_details);
									
									if(!empty($discount_code_final)){
									$res=$this->db->query("select * from tablename where coupon_code='".$discount_code_final."' and status=1 and used_status=0");
									if($res->num_rows() > 0){
									$code_success=1;
									} else{
									$code_success=0;
									}
									
									if($code_success==1){
									$this->db->query("update tablename set quantity=quantity+1,samsung_coupon_code='".$discount_code_final."' where session_id = '".$session_id."'");
									$this->db->query("update tablename set used_status='1' where coupon_code='".$discount_code_final."'");
									//$this->db->query("update retail_online_receipt_details set qty=qty+1 where receipt_id=$receipt_id");
									
									
									$data_receipt_details = array(
									'receipt_id' => $receipt_id,
									'item_title' => $productList["name"].' (Complimentary)',
									'item_description' => $productList["description"],
									'item_code' => $productList["item_code"],
									'qty' => $quantity,
									'unit_price' => '0.00',
									'amount' => '0.00',
									'shipping_price' => '0.00',
									'payment_id' => $userList['order_id'],
									);
									
									$this->db->insert('tablename', $data_receipt_details);
									}
									}
									
									if($userListamount["shipping_price"]>0)
									{
										$data_receipt_details = array(
										'receipt_id' => $receipt_id,
										'item_title' => 'Shipping Fee',
										'item_description' => '',
										'item_code' => 'FX-RSP-SH',
										'qty' => 1,
										'unit_price' => $userListamount["shipping_price"],
										'amount' => $userListamount["shipping_price"],
										'shipping_price' => $userListamount["shipping_price"],
										'payment_id' => $userList['order_id'],
										);
										
										$this->db->insert('tablename', $data_receipt_details);
									}
									
									$this->db->query("update tablename set session_id='0' where session_id = '".$session_id."'");
									//redirect('retailpack/thankyou/'.$userList['order_id'], 'refresh');
									
									$response_array=array('status'=>'DONE','amount'=>$maintotal1,'invoice'=>$invoice_no,'order_id'=>$userList['order_id']);  
                                    echo json_encode($response_array);exit;
							
							} else {
							   //$response_array["status"]="Error";
							   $response_array=array('status'=>'ERROR','msg'=>"Error: " . $result->message);  
							   echo json_encode($response_array);
							}

			     }catch (Exception $e){
					 $response_array=array('status'=>'ERROR','msg'=>"Invalid card details.");  
					 echo json_encode($response_array);
				 }
			 }else{
				$response_array=array('status'=>'ERROR','amount'=>$maintotal1,'invoice'=>$invoice_no);  
				echo json_encode($response_array);
			 }
}
	public function thankyou(){
	$this->load->template('thankyou_view',$this->data);
	}		
}
