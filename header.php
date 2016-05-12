<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
<?php
  echo '<title>Онлайн Школа - ' . $page_title . '</title>';
  echo '<link rel="stylesheet" type="text/css" href="main.css">';
  echo '<link rel="stylesheet" type="text/css" href="' . $page_css . '">';
  echo '<script src="' . $page_js . '"></script>';
?>
</head>
<body>
	<div id="background">
		<nav id="top-header">
			<div id="header-center">
<?php
	if (isset($_SESSION['username']) && isset($_SESSION['user_id']) 
		&& isset($_SESSION['is_student'])) {
		//well, that is a special and the complex one case
	}
	else {
?>
				<div id="menu-right">
					<div id="menu-right-login">
						<a class="menu-right-href" href="login.html">
							<p>Вход</p>
						</a>
					</div>
					<div id="menu-right-signup">
						<a class="menu-right-href" href="#">
							<p>Регистрация</p>
						</a>
					</div>
				</div>
				<div id="menu-left">
					<div id="menu-left-logo">
						<a href="index.html">
							<span id="logo-left">ОНЛАЙН</span>
							<span id="logo-mid">/</span>
							<span id="logo-right">ШКОЛА</span>
						</a>
					</div>
					<div id="menu-left-additional"></div>
				</div>
				<div id="menu-dummy"></div>
			</div>
		</nav>
<?php 
	}
?>