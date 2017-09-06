<?php
include_once ("../dbconnect.inc.php");

$super_secret_code = isset($_GET['super_secret_code']) ? $_GET['super_secret_code'] == "U32EqBVvWhSDHbG2s7QcPPkqOYZ6eG41" : false;
$name = mysql_escape_string(isset($_GET['name']) ? $_GET['name'] : "");
$password = mysql_escape_string(isset($_GET['password']) ? $_GET['password'] : "");
$email = mysql_escape_string(isset($_GET['email']) ? $_GET['email'] : "");
$phone = mysql_escape_string(isset($_GET['phone']) ? $_GET['phone'] : "");
$question = mysql_escape_string(isset($_GET['question']) ? $_GET['question'] : "");
$answer = mysql_escape_string(isset($_GET['answer']) ? $_GET['answer'] : "");

if ($super_secret_code) {
	$questions = ["What's your pet name?", "What city were you born in?", "What's your favourite colour?", "What's your mum's first name?", "What's your dad's middle name?", "What's your favourite movie?", "What's your favourite food?", "What's your favourite band?"];
	$answer = str_replace("_;", " ", $answer);
	// Validation checks
	if (strlen($name) < 6 || preg_match('/[^A-Za-z0-9]/', $name))
		echo "Username must be at least 6 characters and contain only letters and numbers.";
	else if (strpos($email, '@') == false)
		echo "Please enter a valid email address.";
	else if (strlen($phone) != 10 || preg_match('/[^0-9]/', $phone))
		echo "Your phone number must be 10 digits long and consist of numbers only.";
	else if (mysql_num_rows(mysql_query("SELECT username, email, mobile FROM registration WHERE username='".$name."' OR email='".$email."' OR mobile=".$phone)) > 0)
		echo "An account with this username or email already exists.";
	else {
		$Activation = md5(uniqid(rand(), true));
		$query_str = "INSERT INTO registration (username, password, activation, question, answer, email, mobile) VALUES (\"".$name."\", \"".md5($password)."\", \"".$Activation."\", \"".$questions[$question]."\", \"".$answer."\", \"".$email."\", \"".$phone."\")";
		if (!mysql_query($query_str)) {
			echo "There was a problem creating your account. Please try again.";
			return; }
		
		// Send activation mail
		$subject = 'Welcome to Men-on.com';
		$filename ="../emailformat/email_format.html";
		if($mailtemplate = fopen($filename, "r")) {
			$contents 		= fread($mailtemplate, filesize($filename));
			$contents 		= str_replace('@Username@',$Username,$contents);
			$Link			= "http:www.men-on.com/activate.php?email=". $email ."&key=".$Activation."";
			$contents 		= str_replace('@link@',$Link,$contents);
			fclose($mailtemplate);
		}	
		$message=$contents;
		$headers = "From: Men-on <info@men-on.com>\r\n";
		$headers .= "Reply-To: info@men-on.com\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$headers .= "X-Mailer: PHP/". phpversion();
		mail($email, $subject, $message, $headers);
		echo "Your account was successfully created. An activation mail has been sent to your email. Please follow the instructions there.";
	}
}
else
	echo "An authentication error occurred.";
?>