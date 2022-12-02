<?php
include_once("../include/all.php");
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("config_paytm.php");
require_once("encdec_paytm.php");
require_once("PaytmChecksum.php");
/*require_once("function_inc.php");*/

$checkSum = "";
$paramList = array();

$festid = '';
if(isset($_SESSION['USER_ID']))
{
    $festid = $_SESSION['USER_ID'];
}

$paytm_url = '';

/*if(isset($_SERVER['HTTP_ORIGIN']))
{
	if($_SERVER['HTTP_ORIGIN'] == "http://www.texephyr.in")
	{
		alertredirect('This link is not secure! Please proceed with the payment on our secure server.', 'https://texephyr.in');
	}
	else if($_SERVER['HTTP_ORIGIN'] == "http://texephyr.in")
	{
    alertredirect('This link is not secure! Please proceed with the payment on our secure server.', 'https://texephyr.in');
	}
}*/

$amount = 0; 
foreach ($_SESSION['event_list'] as $key => $value) {
    
    //$amount1 = $amount1 + get_event_value($value['event'],'base_price');
    
    $mit = get_event_value($value['event'],'base_price');
    $nonmit = get_event_value($value['event'],'fees');
    
    $amount = (isset($_SESSION['USER_ID']))?((get_user_value($_SESSION['USER_ID'],'college')=="0")?($mit):($nonmit)):('10000');
    $amounts = $amounts + $amount; 
}

$orderid = "ORDER" . rand(10000,99999999);
$ORDER_ID = $orderid;
$CUST_ID = (isset($_SESSION['USER_ID']))?($_SESSION['USER_ID']):('');
$INDUSTRY_TYPE_ID = 'Retail';
$CHANNEL_ID = 'WEB';
$TXN_AMOUNT = $amounts;



	$sql = "INSERT INTO `receipts`(`order_id`, `user_id`,`type`,`receipt_amount`, `receipt_status`) VALUES ('$ORDER_ID','$CUST_ID','0','$TXN_AMOUNT','0')";
	$check = mysqli_query($con, $sql);
    if($check)
    {
        $RECEPT_ID = mysqli_insert_id($con);
        foreach ($_SESSION['event_list'] as $key => $value) {
            $EVENT_ID = $value['event'];
            $sqls = "INSERT INTO `receipts_events`(`receipts_id`, `event_id`, `re_status`) VALUES ('$RECEPT_ID','$EVENT_ID','1')";
            mysqli_query($con,$sqls);
            if(!empty($value['users']))
            {
                foreach($value['users'] as $users => $USER_ID)
                {
                    $sqlss = "INSERT INTO `receipts_event_participant`(`receipt_id`, `event_id`, `user_id`) VALUES ('$RECEPT_ID','$EVENT_ID','$USER_ID')";
                    mysqli_query($con,$sqlss);    
                }
            }
        }
        
    }

//$_SESSION['PAYMENT_TYPE']="PAYTM";


// Create an array having all required parameters for creating checksum.
$paramList["MID"] = PAYTM_MERCHANT_MID;
$paramList["ORDER_ID"] = $ORDER_ID;
$paramList["CUST_ID"] = $CUST_ID;
$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
$paramList["CHANNEL_ID"] = $CHANNEL_ID;
$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
$paramList["CALLBACK_URL"] = PAYTM_CALLBACK_URL; //https://texephyr.in/pgResponse.php";
//$paramList["URL"] = PAYTM_MERCHANT_KEY; //https://texephyr.in/pgResponse.php";
//echo $checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
//prx($paramList);

/*
$paramList["CALLBACK_URL"] = "http://localhost/PaytmKit/pgResponse.php";
$paramList["MSISDN"] = $MSISDN; //Mobile number of customer
$paramList["EMAIL"] = $EMAIL; //Email ID of customer
$paramList["VERIFIED_BY"] = "EMAIL"; //
$paramList["IS_USER_VERIFIED"] = "YES"; //

*/

//Here checksum string will return by getChecksumFromArray() function.
//$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
$checkSum = PaytmChecksum::generateSignature($paramList, PAYTM_MERCHANT_KEY);

?>
<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
		<table border="1">
			<tbody>
			<?php
			foreach($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
			</tbody>
		</table>
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
</body>
</html>
