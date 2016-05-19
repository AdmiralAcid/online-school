<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
<?php
	$page_title = 'Регистрация';
	$page_css = 'signup.css';
	$page_js = 'signup.js';
	$username = 'volodin@dolbit.normalno';
	$first_name = 'Селестина';
	$second_name = 'Простоквашеничко';
  echo '<title>Онлайн Школа - ' . $page_title . '</title>';
  echo '<link rel="stylesheet" type="text/css" href="main.css">';
  echo '<link rel="stylesheet" type="text/css" href="' . $page_css . '">';
  echo '<script src="main.js"></script>';
  echo '<script src="' . $page_js . '"></script>';
?>
</head>
<body>
	<div id="background">
		<nav id="top-header">
			<div id="header-center">
<?php
		$username_h = mb_substr($username, 0, stripos($username, '@')+1);
		echo "\t\t\t\t<div id=\"menu-right-personified\">";
		echo "\t\t\t\t\t<div id=\"arrow-container\"></div><div id=\"dropdown-head\"><span id=\"mail-part\">" . $username_h . " </span><span id=\"name-part\">" . $first_name . " " . $second_name . "</span></div>";
		echo "\t\t\t\t\t<ul id=\"action-list\">";
		echo "\t\t\t\t\t\t<li><a href=\"profile.php\">Профиль</a></li>";
		echo "\t\t\t\t\t\t<li><a href=\"subjects.php\">Обучение</a></li>";
		echo "\t\t\t\t\t\t<li><a href=\"logout.php\">Выйти</a></li>";
		echo "\t\t\t\t\t</ul>";
		//other
		echo "\t\t\t\t</div>";
?>
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