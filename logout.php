<?php
	ob_start();
	include_once "dbconnect.inc.php";
	if(!isset($_SESSION)){
		session_start();
	}
	if($_COOKIE['Username']!=""){
		setcookie("Username","",time()-86400);
	}
	if($_COOKIE['Id']!=""){
		setcookie("Id","",time()-86400);
	}
	if($_COOKIE['Email']!=""){
		setcookie("Email","",time()-86400);
	}
	session_unset();
	session_destroy();
	header('location:index.php');
?>