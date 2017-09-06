<?php
session_start();
if (isset($_COOKIE['Username']) == "")
{
    $User_name = "";
} else
    if (isset($_COOKIE['Username']) != "")
    {
        $User_name = $_COOKIE['Username'];

    }
if (isset($_COOKIE['Email']) == "")
{
    $Email = "";
} else
    if (isset($_COOKIE['Email']) != "")
    {
        $Email = $_COOKIE['Email'];

    }

include_once "dbconnect.inc.php";
include_once "CryptAES.php"; // To encrypt the user data while sending for payment gateway


?>

<!-- Pulling records from registration tabl for billing and shipping process(Online payment gateway) -->

<?php
$total_amount = 0;
$query=mysql_query("SELECT scores_id,points,litres FROM scores WHERE name='".$User_name."'");
if(mysql_num_rows($query)==1)
$rows_of_fuel=mysql_fetch_array($query);

$select_num_of_transaction = mysql_query("SELECT transaction_amount FROM payment_gateway WHERE score_ids='" .
$rows_of_fuel['scores_id'] . "' AND date(time)=curdate()");

if (mysql_num_rows($select_num_of_transaction) > 0)
{
    while ($amount_transacted = mysql_fetch_array($select_num_of_transaction))
    {
        $total_amount += intval($amount_transacted[0]);
    }
}
$Query_for_SPandBL = mysql_query("SELECT username,address,mobile,city,zipcode,email,state FROM registration WHERE username='" .
    $User_name . "'");
if (isset($_POST['add_amount'])){

    $Query_for_SPandBL = mysql_query("SELECT username,address,mobile,city,zipcode,email,state FROM registration WHERE username='" .
        $User_name. "'");
    if (mysql_num_rows($Query_for_SPandBL) == 1)
    {
        $result_of_SPandBL = mysql_fetch_array($Query_for_SPandBL);
        $BLUser_Name = $result_of_SPandBL['username'];
        $BLcust_Address = empty($result_of_SPandBL['address']) ? "NOT AVAILABLE" : $result_of_SPandBL['address'];
        $BLcust_City = $result_of_SPandBL['city'];
        $BLcust_State = $result_of_SPandBL['state'];
        $BLcust_PinCode = $result_of_SPandBL['zipcode'];
        $BLcust_Country = 'IN';
       // $cust_PhoneNo1 = '91';
      //  $cust_PhoneNo2 = '28000000';
       // $cust_PhoneNo3 = '9123456789';

        $BLcust_MobileNo = $result_of_SPandBL['mobile'];
        $BLcust_EmailId = $result_of_SPandBL['email'];
        $otherNotes = 'other notes';


    }

    /*requestParameter information, PLEASE be carefull when altering these values*/

    $merchantId = '201307241000001';
    $operatingMode = 'DOM';
    $country = 'IND';
    $currency = 'INR';


    $amount = (int)$_POST['amount'];

	$a = explode("|", file_get_contents("response.txt"));
	$today = date("Ymd");
	$rand = sprintf("%04d", rand(0,9999));
	$orderNumber = $today . $rand;
	
	
	
	
    /* $a = explode("|", file_get_contents("response.txt"));
    if (($a[5] == 0) || ($a[5] == ""))
    {
        $orderNumber = 1;
    } else
    {	
        $last_orderNumber = $a[5];

        $orderNumber = $last_orderNumber + 1;
    }*/
    $successUrl = 'http://www.men-on.com/profile/statusoftransaction.php';
    $failureUrl = 'http://www.men-on.com/profile/statusoftransaction.php';
    $otherDetails = 'Other Details';
    $collaboratorId = 'DirecPay';

    // Request params for the payment
    $parameters = array(
        $merchantId,
        $operatingMode,
        $country,
        $currency,
        $amount,
        $orderNumber,
        $otherDetails,
        $successUrl,
        $failureUrl,
        $collaboratorId);
    $requestParameter = implode('|', $parameters);

    //Billingdetails

    $billingDtls = array(
        $BLUser_Name,
        $BLcust_Address,
        $BLcust_City,
        $BLcust_State,
        $BLcust_PinCode,
        $BLcust_Country,
        $cust_PhoneNo1,
        $cust_PhoneNo2,
        $cust_PhoneNo3,
        $BLcust_MobileNo,
        $BLcust_EmailId,
        $otherNotes);
    $requestbillingDtls = implode('|', $billingDtls);

    $shippingDtls = array(
        $BLUser_Name,
        $BLcust_Address,
        $BLcust_City,
        $BLcust_State,
        $BLcust_PinCode,
        $BLcust_Country,
        $cust_PhoneNo1,
        $cust_PhoneNo2,
        $cust_PhoneNo3,
        $BLcust_MobileNo);
    $shippingDtls = implode('|', $shippingDtls);

    // Encrypting RequestParameters and Billing Details using CryptAES.php

    //Be carefull with this key
    $key = "3YziQxP535/FGLqHmOqmOw==";

    $aes = new CryptAES();
    $aes->set_key(base64_decode($key));
    $aes->require_pkcs5();

    $requestParameter = $aes->encrypt($requestParameter);
    $billingDtls = $aes->encrypt($requestbillingDtls);
    $shippingDtls = $aes->encrypt($shippingDtls);
    $_SESSION['requestParam'] = $requestParameter;
    $_SESSION['billingdetails'] = $billingDtls;
    $_SESSION['shippingdetails'] = $shippingDtls;
    $_SESSION['amount'] = $amount;
    $_SESSION['email'] = $result_of_SPandBL['email'];

?>
<script type="text/javascript">
window.location.href="confirmrequest.php";
</script>
<?php

}

?>
<!-- Below block of code is to redeem the runs if the user got more than 250 runs in his/her account -->

<?php
$num_of_racesplayed=mysql_query("SELECT came_first FROM scores WHERE name='".$User_name."'");
if(mysql_num_rows($num_of_racesplayed)==1)
{
	$temp_num_of_racesplayed=mysql_fetch_array($num_of_racesplayed);
}
if (isset($_POST['refund_amount']))
{
    if (intval($rows_of_fuel['litres']) > 2500 && intval($temp_num_of_racesplayed)<25)
    {

        $subject = 'Request to deliver the money to this given address';


        $contents = "Name and mobile number are mentioned here: " . $User_name . "," . $Query_for_SPandBL['mobile'];


        $message = $contents;
        $headers = "From: Men-on <'" . $Query_for_SPandBL['email'] . "'>\r\n";
        $headers .= "Reply-To: info@men-on.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
        if (mail("support@men-on.com", $subject, $message, $headers))
        {

        
            $msg="Your request has been sent successfully. Thanks for your support and interest.";
       

        }
    } else
    {
        $errormsg="You should achieve at least 2500 runs in less than 25 races to process this request";
    }

}
if(isset($_POST['redeem_amount']))
{
	if(intval($rows_of_fuel['litres'])>5000)
	{
		$url="pitshop/index.php";
		header("Location:"."$url");
	}
	else{
		$errormsg="To redeem the runs you must have more than 5000 runs";
	}
}
?>
	<!--header-->
	<?php require_once "header.php";?>
	<script type="text/javascript" src="js/moneyValidation.js"></script>
	<!--//header-->
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Buy Race Bucks/Redeem Race Bucks/Refund Race Bucks</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--cart-items-->
	<div class="cart-items">
		<div class="container">
			<?php
				if(!empty($msg)){
					?>                
						<div style="border:<?php if(!empty($msg)){echo "1px";}else{echo "0px";} ?>solid pink;color:green;margin-top:5px;<?php if(!empty($msg)){ echo "display:inline;";}else{echo "display:none;";}?>" id="display-success-message"><img src="images/resizedright-success.png" style="padding:5px;" /><?php if(!empty($msg)){ echo $msg;}?></div>
		   
					<?php
				}
				elseif(!empty($errormsg)){
					?>
						<div style="border:<?php if(!empty($errormsg)){echo "1px";}else{echo "0px";} ?>solid pink;color:red;margin-top:5px;<?php if(!empty($errormsg)){ echo "display:inline;";}else{echo "display:none;";}?>" id="display-error-message"><img src="images/resizederror-mark.png" style="padding:5px;" /><?php if(!empty($errormsg)){ echo $errormsg;}?></div>
					<?php
				}
			?>
			<div class="grid_3 grid_5 wow fadeInDown animated" data-wow-delay=".5s">
				<div class="col-md-4"  id="buy-rb">
					<h3 class="hdg">Buy Race Bucks</h3>
					<form name="paymentGW" id="paymentGWY" method="post" action="https://www.timesofmoney.com/direcpay/secure/dpMerchantPayment.jsp">
						<div class="input-group input-group-lg wow fadeInDown animated" data-wow-delay=".5s">
							<input  class="form-control" type="text" id="check_amount" name="amount" placeholder="Enter Race bucks" aria-describedby="sizing-addon1">
							<span class="input-group-addon" id="sizing-addon1">RB</span>
							<input type="hidden" name="requestparameter" value="<?php echo $requestParameter; ?>"/>
							<input type="hidden" name="billingDtls" value="<?php echo $billingDtls; ?>"/>
							<input type="hidden" name="shippingDtls" value="<?php echo $shippingDtls; ?>"/>
							<input  type="hidden" name="merchantId" value ="201307241000001"/>
						</div>
						<button id="add_fuel" name="add_amount" type="submit" class="buynow-button" onclick="return isMoneyValid();">BUY PRODUCT</button>
					</form>
				</div>
				<div class="col-md-4"  id="buy-rb">
					<h3 class="hdg">Redeem race bucks</h3>
					<form method="post">
						<button id="redeem_fuel" name="redeem_amount" type="submit" class="buynow-button">REDEEM NOW</button>
					</form>
				</div>
				<div class="col-md-4"  id="buy-rb">
					<h3 class="hdg">Refund race bucks</h3>
					<form method="post">
						<button id="refund_fuel" name="refund_amount" type="submit" class="buynow-button">Refund race bucks</button>
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--//cart-items-->	
	<?php require_once "footer.php"?>