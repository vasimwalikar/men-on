<?php
include_once ("../dbconnect.inc.php");

$super_secret_code = isset($_GET['super_secret_code']) ? $_GET['super_secret_code'] == "U32EqBVvWhSDHbG2s7QcPPkqOYZ6eG41" : false;
$username = mysql_escape_string(isset($_GET['username']) ? $_GET['username'] : "");

if (isset($_GET['achievements']) && $super_secret_code) {
	$achievements = mysql_escape_string($_GET['achievements']);
	if (mysql_num_rows(mysql_query("SELECT username FROM achievements WHERE username='".$username)) > 0)
		mysql_query("UPDATE achievements SET achievements='".$achievements."' WHERE username='".$username);
	else
		mysql_query("INSERT INTO achievements (username, achievements) VALUES ('".$username."', '".$achievements."')");
}

?>