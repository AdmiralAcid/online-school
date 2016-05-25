<?php
	//Start the session
	require_once('session.php');
	//setting variables for header.php
	$page_title = 'Закон Ома. Напряжение';
	$page_css = 'chunk.css';
	$page_js = 'chunk.js';
	require_once('header.php');

	//Check if user is not logged in
	if (!isset($_SESSION['username']) || !isset($_SESSION['first_name']) || 
		!isset($_SESSION['user_id']) || !isset($_SESSION['second_name']) || 
		!isset($_SESSION['is_student'])) {
		header("Location: index.php");
	}
	else {
		//if user is logged in, but he is not student
		if ($_SESSION['is_student'] == 0) {
			header("Location: index.php");
		}
		else {
			 
		}
	}