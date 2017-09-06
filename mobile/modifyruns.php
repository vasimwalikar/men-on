<?php
include_once ("../dbconnect.inc.php");

$super_secret_code = isset($_GET['super_secret_code']) ? $_GET['super_secret_code'] == "U32EqBVvWhSDHbG2s7QcPPkqOYZ6eG41" : false;
$username1 = mysql_escape_string(isset($_GET['username1']) ? $_GET['username1'] : "");
$username2 = mysql_escape_string(isset($_GET['username2']) ? $_GET['username2'] : "");
$username3 = mysql_escape_string(isset($_GET['username3']) ? $_GET['username3'] : "");
$username4 = mysql_escape_string(isset($_GET['username4']) ? $_GET['username4'] : "");
$litres = mysql_escape_string(isset($_GET['runs']) ? $_GET['runs'] : 0);

if ($super_secret_code) {
	mysql_query("UPDATE scores SET litres = litres".sprintf("%+d", $litres)." WHERE name='".$username1."'");
	mysql_query("UPDATE scores SET litres = litres".sprintf("%+d", $litres)." WHERE name='".$username2."'");
	mysql_query("UPDATE scores SET litres = litres".sprintf("%+d", $litres)." WHERE name='".$username3."'");
	mysql_query("UPDATE scores SET litres = litres".sprintf("%+d", $litres)." WHERE name='".$username4."'");
	echo "Runs updated for ".$username1.", ".$username2.", ".$username3.", ".$username4;
}
?>