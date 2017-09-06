<?php
include_once ("../dbconnect.inc.php");

$super_secret_code = isset($_GET['super_secret_code']) ? $_GET['super_secret_code'] == "U32EqBVvWhSDHbG2s7QcPPkqOYZ6eG41" : false;
$username = mysql_escape_string(isset($_GET['username']) ? $_GET['username'] : "");
$points = mysql_escape_string(isset($_GET['coins']) ? $_GET['coins'] : 0);

if ($super_secret_code) {
	mysql_query("UPDATE scores SET points=".$points." WHERE name='".$username."' AND points < ".$points);
	echo "Coins updated"; }
?>