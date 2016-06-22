<?php
	require_once('session.php');
	//Check if user is logged in
	if (isset($_SESSION['username']) && isset($_SESSION['first_name']) 
		&& isset($_SESSION['second_name']) && isset($_SESSION['is_student'])) {
		header("Location: index.php");
	}
	else {
		//User IS NOT logged
		if (isset($_POST['login_submit'])) {
			//Gathering data and checking
			$dbc = mysqli_connect('localhost', 'headfirst', 'headfirst', 'temp_learning') 
				or die('error connecting with database :(');
			$errors = Array();

			//checking email
			if (!empty($_POST['l_email']) && preg_match('/^([a-zA-Z0-9@_\.]+)$/', $_POST['l_email'])) {
					$email = mysqli_real_escape_string($dbc, trim($_POST['l_email']));
			} else {
				$errors[] = 'Адрес электронной почты введен неправильно.';
			}

			//checking password
			if (!empty($_POST['l_password']) && preg_match('/^([a-zA-Z0-9]+)$/', $_POST['l_password'])) {
				$password = mysqli_real_escape_string($dbc, trim($_POST['l_password']));
			} else {
				$errors[] = 'Поле пароля пустое или содержит недопустимые символы.';
			}

			//checking data integrity
			if (count($errors) == 0){
				//everything is OK
				mysqli_query($dbc, "SET NAMES 'utf8'");
				//checking user
				$query = "SELECT * FROM users WHERE login_mail = '$email' AND password = " . 
					"SHA('$password')";
				$data = mysqli_query($dbc, $query);
				$row = mysqli_fetch_array($data);
				if (mysqli_num_rows($data) == 1) {
					//user is found
					$user_id = $row['id'];
					//$_SESSION['user_id'] = $user_id;
					$_SESSION['username'] = $row['login_mail'];
					$_SESSION['is_student'] = $row['is_student'];

					if ($_SESSION['is_student'] == 1) {
						$query = "SELECT first_name, second_name FROM students WHERE user_id = '$user_id'";
						$data = mysqli_query($dbc, $query);
						$row = mysqli_fetch_array($data);
						$_SESSION['first_name'] = $row['first_name'];
						$_SESSION['second_name'] = $row['second_name'];
					}
					else {
						$query = "SELECT first_name, second_name FROM parents WHERE user_id = '$user_id'";
						$data = mysqli_query($dbc, $query);
						$row = mysqli_fetch_array($data);
						$_SESSION['first_name'] = $row['first_name'];
						$_SESSION['second_name'] = $row['second_name'];
					}
					//redirect to index
					header("Location: index.php");
				}
				else {
					//no such user
					$errors[] = 'Пользователя с таким логином не существует.';
					require_once('login_form.php');
				}
			}
			else {
				//we got errors
				require_once('login_form.php');
			}
			mysqli_close($dbc);
		}
		else {
			require_once('login_form.php');
		}	
	}
?>