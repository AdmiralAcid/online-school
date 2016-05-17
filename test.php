<?php
	$page_title = 'Регистрация';
	$page_css = 'signup.css';
	$page_js = 'signup.js';
	require_once('header.php');
?>
			<div id="first-background">
			<div id="reg-box">
				<p>Регистрация</p>
				<div id="inner-reg-box">	
<?php
	require_once('student_form.php');
?>
