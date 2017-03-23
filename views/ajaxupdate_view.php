<?php
if($mode=="checkingdiscountcode"){

$discount_code=$this->input->post('discount_code');

$res=$this->db->query("select * from samsung_coupon_codes where coupon_code='".$discount_code."' and status=1 and used_status=0");
//echo $res->num_rows();exit;
if($res->num_rows() > 0){
echo "DONE";
} else{
echo "This coupon code is invalid.";
}

}
?>