<?php
	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "project";
	$link = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($link,'utf8');
?>
