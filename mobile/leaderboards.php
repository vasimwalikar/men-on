<?php
include_once "../dbconnect.inc.php";

$q_leaderboards = mysql_query("SELECT scores.name, scores.litres FROM scores INNER JOIN registration ON scores.name=registration.username WHERE registration.admin=0 ORDER BY scores.litres DESC LIMIT 0,20");
$row = mysql_fetch_assoc($q_leaderboards);
while ($row) {
	echo $row['name'].":".$row['litres']."|";
	$row = mysql_fetch_assoc($q_leaderboards);
}
?>