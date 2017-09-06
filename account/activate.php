<?php
	require_once("dbcontroller.php");
	$db_handle = new DBController();
	if(!empty($_GET["id"])) {
	$query = "UPDATE registration set activation = NULL WHERE id='" . $_GET["id"]. "' AND email = '" . $_GET["email"] . "'" ;
	$result = $db_handle->updateQuery($query);
		if(!empty($result)) {
			$message = "Your account is activated.";
		} else {
			$message = "Problem in account activation.";
		}
	}
?>
<html>
	<head>
		<title>PHP User Registration Form</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<?php if(isset($message)) { ?>
		<div class="message"><?php echo $message; ?><a href="../index.php">Login</a></div>
		<?php } ?>
	</body>
</html>
		