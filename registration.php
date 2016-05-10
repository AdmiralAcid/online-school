<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <title>Онлайн Школа - Регистрация студента</title>
  <link rel="stylesheet" type="text/css" href="main.css">
  <link rel="stylesheet" type="text/css" href="signup.css">
  <script src="signup.js"></script>
</head>
<body>
	<div id="background">
		<nav id="top-header">
			<div id="header-center">
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
		<div id="first-background">
			<div id="info-box">
				<?php
					// truth system needed
					$first_name = $_POST['first_name'];
					$second_name = $_POST['second_name'];
					$patronymic = $_POST['patronymic'];
					$birth_date = $_POST['birth_date'];
					$location = $_POST['location'];
					$school = $_POST['school'];
					$photo = $_FILES['photo']['name'];
					$email = $_POST['email'];
					$pass = $_POST['pass'];
					//$formtype = $_POST['formtype'];

					if (!empty($first_name) && !empty($second_name) && !empty($patronymic) 
						&& !empty($birth_date) && !empty($location) && !empty($school) 
						&& !empty($photo) && !empty($email) && !empty($pass)) 
					{
						$dbc = mysqli_connect('localhost', 'headfirst', 'headfirst', 'temp_learning') 
						or die('error connecting :(');
						mysqli_query($dbc, "SET NAMES 'utf8'");
						$query = "INSERT INTO students VALUES (0, '$first_name', '$second_name', 
							'$patronymic', '$birth_date', '$location', '$school', '$photo', '$email', '$pass')";
						 mysqli_query($dbc, $query) or die($query);
						 echo 'Регистрация успешна!';
						 mysqli_close($dbc);
					}
					else {
						echo 'Регистрация не удалась!';
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>