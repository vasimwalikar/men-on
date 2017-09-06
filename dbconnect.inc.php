<?php
$con = @mysql_connect("localhost","root","") or die('Could Not Connect:'.mysql_error());

    mysql_select_db("menon_db",$con) or die('Could Not Connect db:'.mysql_error());

    error_reporting(0);
?>