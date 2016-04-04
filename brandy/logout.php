<?php
require "dbmember.php";
$member = new member();
$member->logout();
header("Location: login.php");
	// session_start();
	// unset($_SESSION['user_session']);
	//
	// if(session_destroy())
	// {
	// 	header("Location: login.php");
	// }
?>
