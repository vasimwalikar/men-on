<?php
include_once ("../dbconnect.inc.php");

$username = mysql_escape_string(isset($_GET['username']) ? $_GET['username'] : "");
$password = mysql_escape_string(isset($_GET['password']) ? md5($_GET['password']) : "");
$super_secret_code = isset($_GET['super_secret_code']) ? $_GET['super_secret_code'] == "U32EqBVvWhSDHbG2s7QcPPkqOYZ6eG41" : false;

if (mysql_num_rows(mysql_query("SELECT * FROM registration WHERE username='".$username."'".($super_secret_code ? "" : " AND password='".$password."'")." AND activation IS NULL")) > 0) {
	echo "Success!";
	$runs_query = mysql_query("SELECT points, litres FROM scores WHERE name='".$username."'");
	if (mysql_num_rows($runs_query)) {
		$runs = mysql_fetch_row($runs_query);
		echo $runs[0]."|".$runs[1]; }
	else
		echo "0|0"; }
else if (mysql_num_rows(mysql_query("SELECT * FROM registration WHERE username='".$username."'")) == 0)
	echo "No such user found";
else if ($super_secret_code ? false : mysql_num_rows(mysql_query("SELECT * FROM registration WHERE username='".$username."' AND password!='".$password."'")) > 0)
	echo "Incorrect password";
else if (mysql_num_rows(mysql_query("SELECT * FROM registration WHERE username='".$username."' AND activation IS NOT NULL")) > 0)
	echo "Account not yet activated. Check your mail."
?>