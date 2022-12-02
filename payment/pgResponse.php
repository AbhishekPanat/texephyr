<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("config_paytm.php");
require_once("encdec_paytm.php");
require_once("PaytmChecksum.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;


$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
//$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.
$isValidChecksum = PaytmChecksum::verifySignature($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum);


if($isValidChecksum == "TRUE") {
	//echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	echo "<h1 style='padding:2rem;'>Please Wait !!!</h1>";
	
	
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		//echo "<b>Transaction status is success</b>" . "<br/>";
			$TXNID = $_POST['TXNID'];
			$GATEWAYNAME = $_POST['GATEWAYNAME'];
			$TXNAMOUNT = $_POST['TXNAMOUNT'];
			$ORDERID = $_POST['ORDERID'];
			$TXNDATE  = $_POST['TXNDATE'];
			$BANKTXNID = $_POST['BANKTXNID'];
		?>
				<form id="redirectForm" method="post" action="../payment_success.php">
				    <input type="hidden" name="ORDERID" value="<?php echo $ORDERID; ?>"/>
				    <input type="hidden" name="TXNID" value="<?php echo $TXNID; ?>"/>
				    <input type="hidden" name="TXNAMOUNT" value="<?php echo $TXNAMOUNT; ?>"/>
				    <input type="hidden" name="TXNDATE" value="<?php echo $TXNDATE; ?>"/>
				    <input type="hidden" name="BANKTXNID" value="<?php echo $BANKTXNID; ?>"/>
				    <input type="hidden" name="ORDER_STATUS" value="<?php echo 'SUCCESS'; ?>"/>
				    <input type="hidden" name="GATEWAYNAME" value="<?php echo $GATEWAYNAME; ?>"/>
				    <input type="hidden" name="RESPMSG" value="success"/>
			  </form>
			  <script>document.getElementById("redirectForm").submit();</script>
		<?php	  
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		//echo "<b>Transaction status is failure</b>" . "<br/>";
		    $TXNID = $_POST['TXNID'];
			$ORDERID = $_POST['ORDERID'];
			$RESPMSG = $_POST['RESPMSG'];
		?>
				<form id="redirectForm" method="post" action="../payment_success.php">
				    <input type="hidden" name="ORDERID" value="<?php echo $ORDERID; ?>"/>
				    <input type="hidden" name="TXNID" value="<?php echo $TXNID; ?>"/>
				    <input type="hidden" name="TXNAMOUNT" value="<?php echo $TXNAMOUNT; ?>"/>
				    <input type="hidden" name="ORDER_STATUS" value="<?php echo 'FAILED'; ?>"/>
				    <input type="hidden" name="RESPMSG" value="<?php echo $RESPMSG; ?>"/>
			  </form>
			  <script>document.getElementById("redirectForm").submit();</script>
		<?php	
	}


}
else {
	echo "<b>Checksum mismatched.</b>";
	//header("location: index");
	//Process transaction as suspicious.
}

?>