<?php

extract($_REQUEST);
/*$con=mysql_connect("localhost","root","") or die('Could Not Connect:'.mysql_error());
$db=mysql_select_db("menon",$con) or die('Could Not Connect db:'.mysql_error());*/
$con=mysql_connect("localhost","menon_user","27rEb#(u4%ge") or die('Could Not Connect:'.mysql_error());
mysql_select_db("menon_db",$con) or die('Could Not Connect db:'.mysql_error());
error_reporting(0);

?>