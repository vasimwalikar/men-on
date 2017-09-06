<?php
	if(isset($_COOKIE['Username'])==""){
		$User_name="";
		$url = $_SERVER['HTTP_REFERER'];
		header('Location:'.$url);
	}else if(isset($_COOKIE['Username'])!=""){
		$User_name=$_COOKIE['Username'];
	}
		
	if(isset($_COOKIE['Email'])==""){
			$Email="";
	}else if(isset($_COOKIE['Email'])!=""){
		$Email=$_COOKIE['Email'];
	}
	/* echo '<pre>';
	print_r($_COOKIE);
	echo '</pre>';*/
	
    include_once "dbconnect.inc.php";
	
    $clientsquery1 = "select * from product_list where product_id='".$_GET['imageid']."'";
	$clientrs1 = mysql_query($clientsquery1);
	$clientdata1 = mysql_fetch_array($clientrs1);
	
	// date and time function
	$dateandtime = new DateTime();
	$dateandtime->format('Y-m-d H:i:s');
	
	//fetching RB to perticular user

	$query = mysql_query("SELECT litres FROM scores WHERE name = '".$User_name."'");
	if(mysql_num_rows($query)==1){
		$rows_of_fuel = mysql_fetch_array($query);
		
		if(intval($rows_of_fuel['litres'])>($clientdata1['price_fc'])){
			$check_username = mysql_query("select username from product_bookings where username='".$User_name."' and status=0");

			if(mysql_num_rows($check_username)==1){
				?>
					<script type="text/javascript">
					alert("A product is already booked!.");
					history.go(-1);
					</script>
				<?php
			}

			else{
				$delete_changed_request = mysql_query("delete from product_bookings where status in (5,2,4,1) and username='".$User_name."'");
				$insert_qurey = mysql_query("insert into product_bookings(username,product_id,scheme,time_booked,required_fc,required_inr,races_left) values('".$User_name."','".$_GET['imageid']."','T20','".$dateandtime->format("Y-m-d H:i:s")."','".$clientdata1['price_fc']."','".$clientdata1['price_inr']."',20)")or die('error in inserting to product_bookings'.mysql_error()); 
				//$url="www.men-on.com";
				//header("Location:".$url);
				// sending mail once product booked
					
					$user_subject="Thank you for placing your order on men-on.com.";
					$user_to = $Email;

					$user_message="<p>Here are the<br/><strong>Product details</strong><br/>Product name:".$clientdata1['product_name']."<br/>Cost in INR:".$clientdata1['price_inr']."<br/>Cost in RB::".$clientdata1['price_fc']."</p>";

					$user_header="From:<support@men-on.com>\r\n";
					$user_header.="Reply-To:<support@men-on.com>\r\n";
					$user_header .= "MIME-Version:1.0\r\n";
					$user_header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
					// To men-on owner
					$our_subject = 'Request by user to send the product through the contact details'; 

					$to = "support@men-on.com";

					$our_message = "<p>Contact details:<br/> Character Name:'".$User_name."'<br/> Mobile number:'".$represent_this['mobile']."<br/>Product name:".$clientdata1['product_name']."<br/>Cost in INR:".$clientdata1['price_inr']."<br/>Cost in RB::".$clientdata1['price_fc']."'</p>";



					//$our_headers .= "BCC:support@mangium.com\r\n";
					$our_headers ='From: <support@men-on.com>' . "\r\n" .
					'Reply-To: <'.$Email.'>' . "\r\n" .
					'MIME-Version: 1.0' . "\r\n" .
					'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();

					$user_response = mail($user_to,$user_subject,$user_message,$user_header);

					if($user_response){

						$response = mail($to, $our_subject, $our_message, $our_headers,"-r support@men-on.com");

					}
				
				?>
				<script type="text/javascript">
				history.go(-1);
				</script>
				<?php
			}
		}
		else{
			?>
				<script type="text/javascript">
					alert(" You need to earn more RB before you can get this product! Keep winning races to earn more RB!");
					history.go(-1);
				</script>
			<?php
		}
	}                                                                                                   
	?>