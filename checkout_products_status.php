<?php
	include_once "../dbconnect.inc.php";
	session_start();
	if(isset($_COOKIE['Username'])==""){
		$User_name="";
	}else if(isset($_COOKIE['Username'])!=""){
		$User_name=$_COOKIE['Username'];
        
	}
	if(isset($_COOKIE['Email'])==""){
		$Email="";
	}else if(isset($_COOKIE['Email'])!=""){
		$Email=$_COOKIE['Email'];
        
	}
	
	$product_img= $_SESSION['image_filename1'];
	$product_name= $_SESSION['product_name'];
	$amount = $_SESSION['amount'];
	
	
	//response parameters from payment gateway
	$text = $_REQUEST['responseparams'];
	$a = explode("|",$_REQUEST['responseparams']);
	
	

	if($a[1]=="SUCCESS"){
		
		//Insert tansaction data into the database//
      $query = "INSERT INTO products_payment_gateway(product_booked,reference_id,flag,countrty,currency,other_details,merchant_order_no,amount) VALUES(NOW(),'".$a[0]."','".$a[1]."','".$a[2]."','".$a[3]."','".$a[4]."','".$a[5]."','".$a[6]."')";
      $result = mysql_query($query);
	  
	  
      
	   //delet product from brooduct booking table in database//
	  $updatsatus_of_change=mysql_query("update product_bookings set status=5 where username='".$User_name."'");
	  
	  //send mail to product buyer
	  
		$get_email_id=mysql_query("select email,mobile from registration where username='".$User_name."'");
		$represent_this=mysql_fetch_array($get_email_id);
		
		$email_id=$represent_this['email'];
		
		/*$to = "support@men-on.com"; // this is your Email address
		$from = $email_id; // this is the sender's Email address
		
		$subject = "Congratulations by men-on team";
		$subject2 = "Congratulations by men-on team";
		$message = "<p>Congratulations on behalf on men-on team to your product. <br/><strong>Product details</strong><br/>Product name:".$product_name." <br/>Product price:".$amount."</p>";
		$message2 = "<p>Contact details:<br/> Character Name:'".$User_name."'<br/> Mobile number:'".$represent_this['mobile']."<br/>Product name:".$product_name."<br/>Product price:".$amount."'</p>";

		 $headers = "From:" . $from;
		$headers2 = "From:" . $to;
		mail($to,$subject,$message,$headers);
		mail($from,$subject2,$message2,$headers2);*/
		
		
		
		//To men-on user:
		$subject = 'Congratulations by men-on team';


		$user_subject="Congratulations by men-on team";
		$user_to=$email_id;

		$user_message="<p>Congratulations on behalf on men-on team to your acheivement. <br/><strong>Product details</strong><br/>Product Name:".$product_name."<br/>Product Price:".$amount."<br/>Thank you! Your product will be sent to you within 4 to 5 days.</p>";

		$user_header="From:<support@men-on.com>\r\n";
		$user_header.="Reply-To:<support@men-on.com>\r\n";
		$user_header .= "MIME-Version:1.0\r\n";
		$user_header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		// To men-on owner
		$our_subject = 'Request by user to send the product through the contact details'; 

		$to = "support@men-on.com";

		$our_message = "<p>Contact details:<br/> Character Name:'".$User_name."'<br/> Mobile number:'".$represent_this['mobile']."<br/>Product Name:".$product_name."' <br/>Product Price:".$amount."'</p>";



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
		
		
		
	?>
		<h1>Your payment has been successful.</h1>
		
		
	<?php
	}else if(($a[1]=="FAIL")||($a[1]=="ERROR")){
		$query = "INSERT INTO products_payment_gateway(product_booked,reference_id,flag,countrty,currency,other_details,merchant_order_no,amount) VALUES(NOW(),'".$a[0]."','".$a[1]."','".$a[2]."','".$a[3]."','".$a[4]."','".$a[5]."','".$a[6]."')";
		$result = mysql_query($query);
      if($result){
        
      }else{
        die("error in mysql query " . mysql_error());
      }
	?>
		<h1>Your payment has failed.</h1>
	<?php
	}
?>