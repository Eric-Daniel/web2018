<?php
//	session_start();
//	session_destroy();
//	header("Location: index.php");

	session_start();
	session_unset($_SESSION['username']);
	header('location:admin.php');

?>
