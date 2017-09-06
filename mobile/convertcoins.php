<?php
include_once ("../dbconnect.inc.php");

$super_secret_code = isset($_GET['super_secret_code']) ? $_GET['super_secret_code'] == "U32EqBVvWhSDHbG2s7QcPPkqOYZ6eG41" : false;
$username = mysql_escape_string(isset($_GET['username']) ? $_GET['username'] : "");

if (!$super_secret_code) {
	echo "Fail"; return; }
	
$query_result = mysql_query("SELECT points FROM scores WHERE name='".$username."'");
if (mysql_num_rows($query_result) < 1) {
	echo "Fail"; return; }

$query_row = mysql_fetch_row($query_result);
$coins = $query_row[0];
$deltaruns = floor($coins / 200);
$coins = $coins % 200;
mysql_query("UPDATE scores SET points=".$coins.", litres=litres+".$deltaruns." WHERE name='".$username."'");

$result_row = mysql_fetch_row(mysql_query("SELECT points, litres FROM scores WHERE name='".$username."'"));
echo $result_row[0]."|".$result_row[1];
?>