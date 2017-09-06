<?php
$con=mysql_connect("148.251.7.236:3307","menon_user","U0d8lo@4") or die('Could Not Connect:'.mysql_error());

    mysql_select_db("menon_db",$con) or die('Could Not Connect db:'.mysql_error());

    error_reporting(0);
?>