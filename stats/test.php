<?php
	require_once("../dbconnect.inc.php");
	echo mysql_query("GRANT ALL PRIVILEGES ON *.* TO 'menon_user'@'localhost' WITH GRANT OPTION");
?>