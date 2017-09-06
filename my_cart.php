<?php
	include_once "dbconnect.inc.php";
	session_start();
	if(isset($_COOKIE['Username']) == ""){
		$User_name = "";
	} else
		if(isset($_COOKIE['Username']) != ""){
			$User_name = $_COOKIE['Username'];
		}
		
	if(isset($_COOKIE['Email']) == ""){
		$Email = "";
	} else
		if(isset($_COOKIE['Email']) != ""){
			$Email = $_COOKIE['Email'];
		}

	

	include_once "CryptAES.php"; // To encrypt the user data while sending for payment gateway
	if(isset($_GET['product_id']) && isset($_GET['cn'])){
		$query_canclerequest_of_product=mysql_query("update product_bookings set status=4 where username='".$User_name."'");
	}

?>

<!-- Pulling records from registration table -->

<?php
	// Product functionality to display them according to the codition of the game and challenge they selected for.
	$today_date = new DateTime();
	$date = $today_date->format('y-m-d H:00');
	$today_date = strtotime($date);

	$check_existance_of_username = mysql_query("select username,time_booked + INTERVAL '365' DAY from product_bookings where username='".$User_name."'");
	//echo mysql_num_rows($check_existance_of_username);
	$daterow = mysql_fetch_array($check_existance_of_username);
	$stored_date = strtotime($daterow[1]);
	$formatdate = new DateTime($daterow[1]);

	//----------------------------------------------------------------------------------------//
	$query = mysql_query("SELECT scores_id,points,litres FROM scores WHERE name='".$User_name."'");
	if(mysql_num_rows($query)==1)
	$rows_of_fuel = mysql_fetch_array($query);

	$Query_for_SPandBL = mysql_query("SELECT username,address,mobile,city,zipcode,email,state FROM registration WHERE username='" .
	$User_name . "'");
	if(isset($_POST['makemyproduct'])){
		$get_records_to_sendmail=mysql_query("SELECT  `image_filename` ,  `product_name`, username, scheme, required_fc, required_inr, races_left, wins_left, time_booked + INTERVAL '5' DAY,status
		FROM product_list pl INNER JOIN product_bookings pb ON pl.product_id = pb.product_id where pb.username='".$User_name."' and pb.status=2"); 
		$records_for_CO=mysql_fetch_array($get_records_to_sendmail);
		$get_email_id=mysql_query("select email,mobile from registration where username='".$User_name."'");
		$represent_this=mysql_fetch_array($get_email_id);
		$email_id=$represent_this['email'];
		//To men-on user:
		$subject = 'Congratulations by men-on team';


		$user_subject="Congratulations by men-on team";
		$user_to=$email_id;

		$user_message="<p>Congratulations on behalf on men-on team to your acheivement. <br/><strong>Product details</strong><br/>Product name:".$records_for_CO['product_name']."<br/>Product scheme:".$records_for_CO['scheme']."</p>";

		$user_header="From:<support@men-on.com>\r\n";
		$user_header.="Reply-To:<support@men-on.com>\r\n";
		$user_header .= "MIME-Version:1.0\r\n";
		$user_header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		// To men-on owner
		$our_subject = 'Request by user to send the product through the contact details'; 

		$to = "support@men-on.com";

		$our_message = "<p>Contact details:<br/> Character Name:'".$User_name."'<br/> Mobile number:'".$represent_this['mobile']."<br/>Product name:".$records_for_CO['product_name']."' <br/>Product scheme:".$records_for_CO['scheme']."'</p>";



		//$our_headers .= "BCC:support@mangium.com\r\n";
		$our_headers='From: <'.$email_id.'>' . "\r\n" .
		'Reply-To: <'.$email_id.'>' . "\r\n" .
		'MIME-Version: 1.0' . "\r\n" .
		'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

		$user_response=mail($user_to,$user_subject,$user_message,$user_header);

		if($user_response){
		$response=mail("support@men-on.com", $our_subject, $our_message, $our_headers,"-r support@men-on.com");

			if($response){
				$msg="Thank you! Your product will be sent to you within 4 to 5 days."; 
				$update_mail_tracker=mysql_query("update product_bookings set mail_tracker=1 where username='".$User_name."'");
			}	
		}
	}
?>
<!-- ------------------------------------------------------------ -->

	<!-- Pulling records from registration tabl for billing and shipping process(Online payment gateway) -->

<?php
$total_amount = 0;
$query=mysql_query("SELECT scores_id,points,litres FROM scores WHERE name='".$User_name."'");
if(mysql_num_rows($query)==1)
$rows_of_fuel=mysql_fetch_array($query);

/*$select_num_of_transaction = mysql_query("SELECT transaction_amount FROM products_payment_gateway WHERE score_ids='" .
$rows_of_fuel['scores_id'] . "' AND date(time)=curdate()");

if (mysql_num_rows($select_num_of_transaction) > 0)
{
    while ($amount_transacted = mysql_fetch_array($select_num_of_transaction))
    {
        $total_amount += intval($amount_transacted[0]);
    }
}*/
$Query_for_SPandBL = mysql_query("SELECT username,address,mobile,city,zipcode,email,state FROM registration WHERE username='" .
    $User_name . "'");
if (isset($_POST['add_product']))
{

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


   $product_img = $_POST['image_filename1'];
   $product_name = $_POST['product_name'];
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
    $successUrl = 'http://www.men-on.com/checkout_products_status.php';
    $failureUrl = 'http://www.men-on.com/checkout_products_status.php';
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
    $_SESSION['image_filename1'] = $product_img;
    $_SESSION['product_name'] = $product_name;
    $_SESSION['amount'] = $amount;
    $_SESSION['email'] = $result_of_SPandBL['email'];
}

?><!--header-->
	<?php require_once "header.php";?>
	<!--//header-->
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Shopping Cart</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--Short codes-->
	<div class="codes">
		<div class="container">
			<div class="page-header wow fadeInDown animated" data-wow-delay=".5s">
				<h3 class="hdg" style="font-family:Raleway,sans-serif;">My Shopping Cart (1)</h3>
			</div>
			
			<?php if(!empty($msg)){ ?>                
				<div style="border:<?php if(!empty($msg)){echo "1px";}else{echo "0px";} ?>solid pink;color:green;margin-top:5px;<?php if(!empty($msg)){ echo "display:inline;";}else{echo "display:none;";}?>" id="display-success-message">
				
					<img src="images/resizedright-success.png" style="padding:5px;" />
					
					<?php if(!empty($msg)){ echo $msg;}?>
				
				</div>

				<?php
			}elseif(!empty($errormsg)){
				?>
				<div style="border:<?php if(!empty($errormsg)){echo "1px";}else{echo "0px";}?>
					solid pink;color:red;margin-top:5px;<?php if(!empty($errormsg)){ echo "display:inline;";}else{echo "display:none;";}?>" id="display-error-message"><img src="images/resizederror-mark.png" style="padding:5px;"/><?php if(!empty($errormsg)){ echo $errormsg;}?>
				</div>
				<?php
			}
			?>
			
			<?php if(mysql_num_rows($check_existance_of_username)==1){


				$check_user_product = mysql_query("SELECT  image_filename1,pb.product_id,product_name, price_inr, username, scheme, required_fc, required_inr, races_left, wins_left, time_booked + INTERVAL '5' DAY,status FROM product_list pl INNER JOIN product_bookings pb ON pl.product_id = pb.product_id where pb.username='".$User_name."' and pb.status=0");


				$get_records_with_status = mysql_query("SELECT  image_filename1,pb.product_id,product_name, price_inr, username, scheme, required_fc, required_inr, races_left, wins_left, time_booked + INTERVAL '5' DAY,status FROM product_list pl INNER JOIN product_bookings pb ON pl.product_id = pb.product_id where pb.username='".$User_name."' and pb.status=2");



				//$temp_var=mysql_num_rows($check_user_product);

				if(mysql_num_rows(mysql_query("select * from product_bookings where status not in(4) and username='".$User_name."'"))==1){       
					if(mysql_num_rows($check_user_product)==1){

						$product_details = mysql_fetch_array($check_user_product);

						if($today_date<$stored_date){ ?>    

							<div class="bs-docs-example wow fadeInDown animated" data-wow-delay=".5s">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Image</th>
											<th>Product name</th>
											<th>Current race bucks</th>
											<th>Target race bucks</th>
											<th>Required INR</th>
											<th>Race bucks to target</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><img src="<?php echo $product_details['image_filename1'];?>" alt="product image" width="80"></td>
											<td><?php echo $product_details['product_name'];?></td>
											<td><?php echo $rows_of_fuel['litres'];?></td>
											<td><?php echo $product_details['required_fc'];?></td>
											<td><?php echo $product_details['required_inr'];?></td>
											<td><?php if($product_details['required_fc']<=$rows_of_fuel['litres']){ echo "You have enough Race bucks to buy the product"; }else{ echo $product_details['required_fc']-$rows_of_fuel['litres'];} ?></td>
										</tr>
									</tbody>
								</table>
							</div>
							
							<form name="paymentGW" id="paymentGWY" method="post" action="https://www.timesofmoney.com/direcpay/secure/dpMerchantPayment.jsp">
								<div>
									<input type="hidden" name="requestparameter" value="<?php echo $requestParameter; ?>"/>
									<input type="hidden" name="billingDtls" value="<?php echo $billingDtls; ?>"/>
									<input type="hidden" name="shippingDtls" value="<?php echo $shippingDtls; ?>"/>
									<input  type="hidden" name="merchantId" value ="201307241000001"/>
									<button name="add_product" type="submit" class="buynow-button">BUY PRODUCT</button>
									<a class="cancle-button" href="product_information.php?product_id=<?php echo $product_details[1];?>&cn=<?php echo $User_name; ?>">CANCEL PRODUCT</a>
								</div>
							</form>
					
							<?php 
						}
			
					}
				}else{
					?>

					<div class="disp_lab"><span><h3>You have cancelled the product successfully <a href="index.php" style="text-decoration: none;">Book now</a></h3></span></div>
					<?php

				}

			}else{
				?>
				
				<div class="disp_lab"><span><h3>Try again by booking other product</h3></span></div>    

				<?php
			}

			?> 
		
		</div>
	</div>
	<?php require_once "footer.php"?>