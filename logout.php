<?php
	require_once('session.php');
	if (isset($_SESSION['username']) && isset($_SESSION['first_name']) 
		&& isset($_SESSION['second_name']) && isset($_SESSION['is_student'])) {
		$_SESSION = array();
		if (isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time() - 3600);
		}
		session_destroy();
		//redirect
		header("Location: index.php");
	}
?>