<?php
include_once "../dbconnect.inc.php";

$super_secret_code = isset($_GET['super_secret_code']) ? $_GET['super_secret_code'] == "U32EqBVvWhSDHbG2s7QcPPkqOYZ6eG41" : false;

$platform = mysql_escape_string(isset($_GET['platform']) ? $_GET['platform'] : 'mobile');
$logname = mysql_escape_string(isset($_GET['logname']) ? $_GET['logname'] : null);
$reward = mysql_escape_string(isset($_GET['reward']) ? $_GET['reward'] : null);
$player1 = mysql_escape_string(isset($_GET['player1']) ? $_GET['player1'] : null);
$player2 = mysql_escape_string(isset($_GET['player2']) ? $_GET['player2'] : null);
$player3 = mysql_escape_string(isset($_GET['player3']) ? $_GET['player3'] : null);
$player4 = mysql_escape_string(isset($_GET['player4']) ? $_GET['player4'] : null);
$winner = mysql_escape_string(isset($_GET['winner']) ? $_GET['winner'] : null);

if ($super_secret_code && $logname != null) {
	if (mysql_num_rows(mysql_query("SELECT raceid FROM racelog WHERE logfile = '".$logname."'")) == 0) {
		if ($player1 != null && $player2 != null) {
			$numplayers = 2;
			if ($player3 != null)
				$numplayers++;
			if ($player4 != null)
				$numplayers++;
			$query = "INSERT INTO racelog (start, numplayers, playing_for, type, player1, player2".($player3 == null ? "" : ", player3").($player4 == null ? "" : ", player4").", logfile) VALUES
					 ('".date('Y-m-d H:i:s')."', $numplayers, '$reward', '$platform', '$player1', '$player2'".($player3 == null ? "" : ", '$player3'").($player4 == null ? "" : ", '$player4'").", '$logname')";
			echo $query."<br/>";
			if (mysql_query($query))
				echo "Race logged.";
			else
				echo "Race not logged.";
		}
		else
			echo "More details needed";
	}
	else if ($winner != null) {
		echo "Records modified: ".mysql_num_rows(mysql_query("UPDATE racelog SET winner = '$winner' WHERE logfile = '$logname'"));
	}
	else
		echo "Nothing logged";
}
else
	echo "Nothing to see here";
?>