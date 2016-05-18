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
	if (isset($_SESSION['username']) && isset($_SESSION['first_name']) 
		&& isset($_SESSION['second_name']) && isset($_SESSION['is_student'])) {
		//well, that is a special and the complex one case
		$username_h = mb_substr($_SESSION['username'], 0, stripos($_SESSION['username'], '@')+1);
		echo "\t\t\t\t<div id=\"menu-right-personified\">";
		echo "\t\t\t\t\t<a href=\"\"><span id=\"mail_part\">" . $username_h . " </span><span id=\"name_part\">" . $_SESSION['first_name'] . " " . $_SESSION['second_name'] . "</span></a>";
		
		if ($_SESSION['is_student'] == 1) {

		}
		else {

		}
	}
	else {
?>
				<div id="menu-right">
					<div id="menu-right-dummy"></div>
					<div id="menu-right-signup">
						<a class="menu-right-href" href="signin.php">
							<p>Вход / Регистрация</p>
						</a>
					</div>
				</div>
				<div id="menu-left">
					<div id="menu-left-logo">
						<a href="index.php">
							<span id="logo-left">ОНЛАЙН</span>
							<span id="logo-mid">/</span>
							<span id="logo-right">ШКОЛА</span>
						</a>
					</div>
				</div>
				<div id="menu-dummy"></div>
			</div>
		</nav>
<?php 
	}
?>