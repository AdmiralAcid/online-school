<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
<?php
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
	if (isset($_SESSION['username']) && isset($_SESSION['first_name']) 
		&& isset($_SESSION['second_name']) && isset($_SESSION['is_student'])) {
		//well, that is a special and the complex one case
		$username_h = mb_substr($_SESSION['username'], 0, stripos($_SESSION['username'], '@')+1);
		echo "\t\t\t\t<div id=\"menu-right-personified\">";
		echo "\t\t\t\t\t<div id=\"arrow-container\"></div><div id=\"dropdown-head\"><span id=\"mail-part\">" . $username_h . " </span><span id=\"name-part\">" . $_SESSION['first_name'] . " " . $_SESSION['second_name'] . "</span></div>";
		echo "\t\t\t\t\t<ul id=\"action-list\">";
		//student or parent
		if ($_SESSION['is_student'] == 1) {
			echo "\t\t\t\t\t\t<li><a href=\"profile.php\">Профиль</a></li>";
			echo "\t\t\t\t\t\t<li><a href=\"subjects.php\">Обучение</a></li>";
			echo "\t\t\t\t\t\t<li><a href=\"logout.php\">Выйти</a></li>";
			echo "\t\t\t\t\t</ul>";
		}
		else {
			echo "\t\t\t\t\t\t<li><a href=\"profile.php\">Профиль</a></li>";
			echo "\t\t\t\t\t\t<li><a href=\"schoolrecords.php\">Посмотреть дневник</a></li>";
			echo "\t\t\t\t\t\t<li><a href=\"addchild.php\">Добавить ребенка</a></li>";
			echo "\t\t\t\t\t\t<li><a href=\"logout.php\">Выйти</a></li>";
			echo "\t\t\t\t\t</ul>";
		}
		//other
		echo "\t\t\t\t</div>";
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
<?php
	}
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