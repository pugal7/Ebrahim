<?php
class user_model extends CI_Model
{
function __construct()
{
	// Call the Model constructor
	parent::__construct();
	date_default_timezone_set('Asia/Kuala_Lumpur');
}
function login($username, $password)
{
	$this -> db -> select('*');
	$this -> db -> from('xagent_user');
	$this -> db -> where('email', $username);
	$this -> db -> where('password', $password);
	$this -> db -> where('status', 1);
	$this -> db -> where('verified', 1);
	$this -> db -> where('corp_xagent_id', 0);
	$this -> db -> where('cxagent_id', 0);
	$this -> db -> limit(1);
	
	$query = $this -> db -> get();
	
	if($query -> num_rows() == 1)
	{
	return $query->result();
	}
	else
	{
	return false;
	}
}
//insert into user table
function insertUser($data)
{
	return $this->db->insert('xagent_user', $data);
}
function get_user_by_email($email) {

	$Sql = $this->db->query("select * from xagent_user where email='".$email."'");
	if($Sql -> num_rows() > 0)
	{
	return $Sql->row_array();
	}
	else
	{
	return false;
	}
	
}	
function get_user($user_id) {

	$Sql = $this->db->query("select * from xagent_user where xagent_id='".$user_id."'");
	if($Sql -> num_rows() > 0)
	{
	return $Sql->row_array();
	}
	else
	{
	return false;
	}
	
}	
function get_user_pagests($user_id) {

	 $Sql = $this->db->query("select * from xagent_user where xagent_id='".$user_id."'");
	if($Sql -> num_rows() > 0)
	{
	return $Sql->row_array();
	}
	else
	{
	return 0;
	}
	
}	
function reset_password($id,$newpassword)
{
	$data = array('password' => $newpassword);
	$this->db->where('xagent_id', $id);
	return $this->db->update('xagent_user', $data);
}
//activate user account
function verifyEmailID($key)
{
	$data = array('verified' => 1);
	$this->db->where('md5(email)', $key);
	return $this->db->update('xagent_user', $data);
}
function getAllCountries() {

	$Sql = $this->db->query("SELECT name,id,prefix,ip_code from paste_country where country_allowed=1 order by name");
	$result = $Sql->result_array();
	return $result;
	
}
function getAlllatestupdates() {

	$Sql = $this->db->query("select * from xagent_latest_updates where status=1 order by display_order asc");
	$result = $Sql->result_array();
	return $result;
	
}
function getCountryDetails($id) {

	$Sql = $this->db->query("SELECT name,id,prefix,ip_code from paste_country where id='$id'");
	$result = $Sql->row_array();
	return $result;
	
}
function getSubscribeCountries() {

	$Sql = $this->db->query("SELECT * from paste_country where shipping_price !=0 order by name");
	$result = $Sql->result_array();
	return $result;
	
}
function getProducts() {

	$Sql = $this->db->query("SELECT * from paste_products where status = 1 order by name");
	$result = $Sql->result_array();
	return $result;
	
}
function getDRMAProducts() {

	$Sql = $this->db->query("SELECT * from paste_products where product_id in(2,3,7) order by name");
	$result = $Sql->result_array();
	return $result;
	
}
function getRetailProducts() {

	$Sql = $this->db->query("SELECT * from paste_products where retail_pack = 1 order by product_id");
	$result = $Sql->result_array();
	return $result;
	
}
function getBrightstarRetailProducts() {

	$Sql = $this->db->query("SELECT * from paste_products where retail_pack = 1 order by product_id LIMIT 0,1");
	$result = $Sql->result_array();
	return $result;
	
}
function getXagentProducts() {

	$Sql = $this->db->query("SELECT * from xagent_products where status = 1 order by xagent_product_id");
	$result = $Sql->result_array();
	return $result;
	
}
function getCountry($id) {

	$Sql = $this->db->query("SELECT name,id,code from paste_country where id='$id'");
	$result = $Sql->row_array();
	return $result['code'];
	
}
function getCountry_foruser($id) {

	$Sql = $this->db->query("SELECT name,id,code from paste_country where id='$id'");
	$result = $Sql->row_array();
	return $result;
	
}
function getProductDetails($product_id) {

	$Sql = $this->db->query("SELECT * from paste_products where product_id = '$product_id'");
	$result = $Sql->row_array();
	return $result;
	
}
function getXagentProductDetails($product_id) {

	$Sql = $this->db->query("SELECT * from xagent_products where xagent_product_id = '$product_id'");
	$result = $Sql->row_array();
	return $result;
	
}
function getUserDetails($existing_customer_id) {

	$Sql = $this->db->query("SELECT * from paste_users where user_id = '$existing_customer_id'");
	$result = $Sql->row_array();
	return $result;
	
}
function getXAgentDetails($xagent_id) {

	$Sql = $this->db->query("SELECT * from xagent_user where xagent_id = '$xagent_id'");
	$result = $Sql->row_array();
	return $result;
	
}
function getXAgentPurchaseDetails($xagent_id) {

	$Sql = $this->db->query("SELECT * from xagent_order_purchase_sess where xagent_id = '$xagent_id' and cancel_sts = 0 and payment_status = 0 order by xagent_product_id DESC");
	$result = $Sql->result_array();
	return $result;
}
function getXAgentPurchaseDetailsSUM($xagent_id) {

	$Sql = $this->db->query("SELECT if(ISNULL(SUM(amount)),0,SUM(amount)) AS total from xagent_order_purchase_sess where xagent_id = '".$xagent_id."' and cancel_sts = 0 and payment_status = 0");
	return $Sql->row_array();
	
}
function getXAgentPurchaseDetailsReceipt($xagent_id,$payment_history_id) {

	$Sql = $this->db->query("SELECT * from xagent_order_purchase_sess where xagent_id = '$xagent_id' and payment_id = '$payment_history_id'");
	$result = $Sql->result_array();
	return $result;
	
}
function getXAgentPaymentDetails($xagent_id) {

	$Sql = $this->db->query("SELECT * from xagent_payment_history where xagent_id = '$xagent_id' and xagent_product_id !=6 and xagent_product_id !=7 order by xagent_product_id DESC LIMIT 0,1");
	$result = $Sql->row_array();
	return $result;
	
}
function getBillFromId() {

	$Sql = $this->db->query("SELECT * from paste_receipt_bill_from where status = 1");
	$result = $Sql->row_array();
	return $result;
	
}
function getXagentPaymentHistory($xagent_id) {

	$Sql = $this->db->query("SELECT * from xagent_payment_history where xagent_payment_history_id = '$xagent_id'");
	$result = $Sql->row_array();
	return $result;
	
}
function getXagentReceiptSubject($xagent_id) {

	$Sql = $this->db->query("SELECT * from paste_receipt_subject where id = '$xagent_id'");
	$result = $Sql->row_array();
	return $result;
	
}
function getXagentReceipt($xagent_id) {

	$Sql = $this->db->query("SELECT * FROM xagent_receipt WHERE payment_id='$xagent_id'");
	$result = $Sql->row_array();
	return $result;
	
}
function getXagentReceiptDetails($xagent_id,$payment_id) {

	$Sql = $this->db->query("SELECT * FROM xagent_receipt_details WHERE receipt_id='$xagent_id' and payment_id='$payment_id'");
	
	if($Sql -> num_rows() > 0)
	{
	return $Sql->result_array();
	}
	else
	{
	return 0;
	}
	
}
function getRetailSku($sku_id) {

	$Sql = $this->db->query("SELECT * from paste_iccids where sku = '$sku_id' and status = 0 and user_id = 0");
	
	if($Sql -> num_rows() > 0)
	{
	return 0;
	}
	else
	{
	return 1;
	}
	
}
function getRetailEmail($email_id) {

	$Sql = $this->db->query("SELECT retail_user_id FROM xagent_retail_user WHERE email='$email_id'");
	
	if($Sql -> num_rows() > 0)
	{
	return 1;
	}
	else
	{
	return 0;
	}
	
}
function getRetailMobile($mobile_id) {

	$Sql = $this->db->query("SELECT retail_user_id FROM xagent_retail_user WHERE mobile='$mobile_id'");
	
	if($Sql -> num_rows() > 0)
	{
	return 1;
	}
	else
	{
	return 0;
	}
	
}

function update($id,$field_name,$table_name,$data)
{
	$this->db->where($field_name, $id);
	return $this->db->update($table_name, $data);
}
function updateCredit($id,$price) {

	$Sql = $this->db->query("update xagent_user set credit=credit-'$price'  where xagent_id = '$id'");
	return "DONE";
	
}
function addCredit($id,$price) {

	$Sql = $this->db->query("update xagent_user set credit=credit+'$price'  where xagent_id = '$id'");
	return "DONE";
	
}
function afzalapi($id) {
	return "SUCCESS";
	
}
function checkreferalcode($id) {

    $id=trim($id);
	$Sql = $this->db->query("select xagent_id,airport_staff from xagent_user where referal_code='".$id."'");
	$result = $Sql->row_array();
	
	/*$Sql1 = $this->db->query("SELECT 
		xagent_products.rank
		FROM 
		xagent_payment_history 
		INNER JOIN xagent_products on xagent_payment_history.xagent_product_id=xagent_products.xagent_product_id
		INNER JOIN xagent_user on xagent_payment_history.xagent_id=xagent_user.xagent_id
		WHERE 
		xagent_payment_history.xagent_id = '".$result['xagent_id']."' AND
		xagent_payment_history.xagent_product_id!=6 AND
		xagent_payment_history.xagent_product_id!=7
		order by xagent_products.rank");
		
		$rank_info = $Sql1->row_array();
		
		$rank = 7;
		if($rank_info['rank']!='')
		$rank =  $rank_info['rank'];
		if(($result['airport_staff']==3) || ($result['airport_staff']==1))
		$rank = 1;
		if($rank < 6){*/
		return $result["xagent_id"];
		/*}else{
		return 0;
		}*/
	
}
function getCreditCardDetails($payment_token){
	try{
	
	$creditCards = Braintree_PaymentMethod::find($payment_token);
	$response=array();
	$last4=$creditCards->last4;
	$cardType=$creditCards->cardType;
	$response=array('status'=>'OK','cardType'=>$cardType,'last4'=>'XXXX-XXXX-XXXX-'.$last4);
	return $response;
	}catch (Exception $e){
	$response=array();
	$response=array('status'=>'ERROR','msg'=>'You have no credit card saved. Please add a payment method before you place an order.');
	return $response;
	}

}
function getAllSku($xagent_id) {

	$Sql = $this->db->query("SELECT * from paste_iccids where xagent_id = '$xagent_id' and status = 0 and user_id = 0");
	$result = $Sql->result_array();
	return $result;
}
function getReplacementDetails($replacement_id) {

	$Sql = $this->db->query("SELECT * from xagent_replacement_request where replacement_id = '$replacement_id'");
	$result = $Sql->row_array();
	return $result;
	
}
function getCaptcha($response, $ip) {
    //extract data from the post
    //set POST variables
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $fields = array(
        'secret' => '6Le61igTAAAAAFS3UIy2MDcEvwhmdyEKdCeGmilw',
        'response' => urlencode($response),
        'remoteip' => urlencode($ip)
    );
    //url-ify the data for the POST
    foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
    rtrim($fields_string, '&');

    //open connection
    $ch = curl_init();
    //set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, count($fields));
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);

    $captcha = json_decode($result, true);
    
    //var_dump($captcha);
    if($captcha["success"]) {
        return true;
    }
    
    return false;
}
function createRandomPassword_public() {
// pick the characters that might be part of your random password.
		$chars = "ABCDEFGHJKMNPRTVWXYZ23456789";
		srand((double)microtime()*1000000);
		$i = 0;
		$pass = '' ;
		while ($i <= 5) { // 5 characters (because it's 0 to 4).
		$num = rand() % 27;
		$tmp = substr($chars, $num, 1);
		$pass = $pass . $tmp;
		$i++;
		}
		return $pass;
  }
	//send verification email to user's email id
public function sendEmail($email_txt,$email,$url){

// echo "ddd".$email_txt.$email.$url ;
 require_once('/var/www/html/class.phpmailer.php');  
// require_once($_SERVER['DOCUMENT_ROOT'].'/class.phpmailer.php'); //commented out by jef 8/11/2011
$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

$mail->IsSMTP(); // telling the class to use SMTP

try {
  $mail->Host       = "email-smtp.us-east-1.amazonaws.com";      // sets GMAIL as the SMTP server
//  $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
  $mail->Host       = "email-smtp.us-east-1.amazonaws.com";      // sets GMAIL as the SMTP server
  $mail->Port       = 587;                   // set the SMTP port for the GMAIL server
  $mail->Username   = "AKIAJVF6NVCHIJAEVQRA";  // GMAIL username 
  $mail->Password   = "AnKcWoexWJTkmIyQJw9bgWWeRyaQuzmi4W1bV8exuExO";            // GMAIL password
  $mail->AddReplyTo('donotreply@flexiroam.com', 'Flexiroam');
  $mail->AddAddress($email);
  $mail->SetFrom('donotreply@flexiroam.com', 'Flexiroam');
  $mail->AddReplyTo('donotreply@flexiroam.com', 'Flexiroam');
  $mail->Subject = $email_txt['subject'];
  $mail->Header ='Flexiroam';
  $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
  $mail->MsgHTML($email_txt['msg']);
//  $mail->AddAttachment($AddAttachment);      // attachment
  //$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
  return $mail->Send();
 // echo "Message Sent OK</p>\n";
 
 
 //echo "pppp".$email_tx.$_POST.$url ;
 if(strlen($url) > 0) {
?>
  <META HTTP-EQUIV="Refresh" CONTENT=0;URL="<?=$url;?>">   
<?php   } 




  
} catch (phpmailerException $e) {/*
	
	$res_backup_email=mysql_query("select * from tbl_flexiroam_backup_email where tried=0 order by rand() limit 1");
	if(mysql_num_rows($res_backup_email))
	{
	$row_backup_email=mysql_fetch_array($res_backup_email);
	$femailid=$row_backup_email["email"];
	$femailpass=$row_backup_email["password"];
	sendEmailBackup($email_txt,$email,$url,$femailid,$femailpass);
	}
	
// echo $e->errorMessage(); //Pretty error messages from PHPMailer
*/} catch (Exception $e) {
// echo $e->getMessage(); //Boring error messages from anything else!
}

 }	
	
	
}