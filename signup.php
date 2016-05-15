<?php
	//Start the session
	session_start();
	//setting variables for header.php
	$page_title = 'Регистрация';
	$page_css = 'signup.css';
	$page_js = 'signup.js';
	require_once('header.php');
	require_once('date_sql.php');
?>
		<div id="first-background">
			<div id="reg-box">
				<p>Регистрация</p>
				<div id="inner-reg-box">				
<?php 
	//Check if user is logged in
	if (isset($_SESSION['username']) && isset($_SESSION['user_id']) 
		&& isset($_SESSION['is_student'])) {
		//User IS logged
		echo "\t\t\t\t\t<div id=\"form-box\">";
		echo "\t\t\t\t\t\t<div id=\"form-box-image\">";
		echo "\t\t\t\t\t\t\t<img src=\"./images/floppy.png\" alt=\"Floppy Disc\">";
		echo "\t\t\t\t\t\t</div>";
		echo "\t\t\t\t\t\t<p id=\"form-box-title\">Мы Вас уже знаем! :)</p>";
		echo "\t\t\t\t\t\t<p id=\"form-box-text\">Вы уже были зарегистрированы ранее." . 
		"<br><a href=\"index.php\">Вернуться на главную</a></p>";
		echo "\t\t\t\t\t</div>";
		echo "\t\t\t\t</div>";
		echo "\t\t\t</div>";
		echo "\t\t</div>";
	}
	else {
		//User IS NOT logged
		if (isset($_POST['student_signup']) && isset($_POST['submit'])) {
			//POST data (means that we are computing sign up data)
			if ($_POST['student_signup'] == 1) {
				//Connection to database
				$dbc = mysqli_connect('localhost', 'headfirst', 'headfirst', 'temp_learning') 
					or die('error connecting with database :(');
				//Getting student post data
				$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
				$password = mysqli_real_escape_string($dbc, trim($_POST['password']));
				$is_student = 1;

				$first_name = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
				$second_name = mysqli_real_escape_string($dbc, trim($_POST['second_name']));
				$patronymic = mysqli_real_escape_string($dbc, trim($_POST['patronymic']));
				$birth_date = mysqli_real_escape_string($dbc, trim($_POST['birth_date']));
				$location = mysqli_real_escape_string($dbc, trim($_POST['location']));
				$school = mysqli_real_escape_string($dbc, trim($_POST['school']));
				$photo = mysqli_real_escape_string($dbc, trim($_FILES['photo']['name']));
    		$photo_type = $_FILES['photo']['type'];
    		$photo_size = $_FILES['photo']['size']; 

    		$email_right = false;
    		$passw_right = false;
				$f_name_right = false;
				$s_name_right = false;
				$b_date_right = false;
				$photo_right = false;
				$errors = Array(); //описать происходящее в файле

				//checking email
				if (!empty($email) && preg_match('/^([a-zA-Z0-9@_\.]+)$/', $email)) {
					$email_right = true;
				} else {
					$errors[] = 'Адрес электронной почты введен неправильно.';
				}

				//checking password
				if (!empty($password) && preg_match('/^([a-zA-Z0-9]+)$/', $password)) {
					$passw_right = true;
				} else {
					$errors[] = 'Поле пароля пустое или содержит недопустимые символы.';
				}

				//checking name
				if (!empty($first_name) && preg_match('/^([а-яА-ЯЁё]+)$/u', $first_name)) {
					$f_name_right = true;
				} else {
					$errors[] = 'Поле имени пустое или содержит недопустимые символы.';
				}
				if (!empty($second_name) && preg_match('/^([а-яА-ЯЁё]+)$/u', $second_name)) {
					$s_name_right = true;
				} else {
					$errors[] = 'Поле фамилии пустое или содержит недопустимые символы.';
				}
				if (!preg_match('/^([а-яА-ЯЁё]+)$/u', $patronymic)) {
					$patronymic = '';
				}
				
				//checking time
				$birth_date = date2sql($birth_date);
				if ($birth_date) {
					$b_date_right = true;
				} else {
					$errors[] = 'Поле даты рождения пустое или дата введена в неверном формате.';
				}
				
				//checking photo
				if (!empty($photo) && ($_FILES['photo']['type'] == 'image/png' || 
					$_FILES['photo']['type'] == 'image/jpeg' || 
      		$_FILES['photo']['type'] == 'image/pjpeg') && 
      		($_FILES['photo']['size'] <= 2097152) && ($_FILES['photo']['size'] > 0)) {
					if ($_FILES['photo']['error'] == 0) {
        		$target = $_SERVER['DOCUMENT_ROOT'] . '/Learning/student_images/' . $photo;
        		move_uploaded_file($_FILES['photo']['tmp_name'], $target);
        		$photo_right = true;
        	}
				} else {
					$errors[] = 'Фотография неподходящего формата или размера.';
				}

				//checking data integrity
				if (count($errors) == 0){
					//everything is OK
					mysqli_query($dbc, "SET NAMES 'utf8'");
					//check if user is unique
					$query = "SELECT * FROM users WHERE login_mail = '$email'";
					$data = mysqli_query($dbc, $query);
					if (mysqli_num_rows($data) == 0) {
						//creating new user
						$query = "INSERT INTO users (login_mail, password, is_student) VALUES ('$email', " .
							"SHA('$password'), 1)";
						mysqli_query($dbc, $query) or die('error sending query to database');
						$query = "SELECT id FROM users WHERE login_mail = '$email' AND password = " . 
							"SHA('$password')";
						$data = mysqli_query($dbc, $query);
						$row = mysqli_fetch_array($data);
						$user_id = $row['id'];
						$query = "INSERT INTO students (user_id, first_name, second_name, patronymic, " . 
							"birth_date, location, school, photo) VALUES ('$user_id', '$first_name', " . 
							"'$second_name', '$patronymic', '$birth_date', '$location', '$school', '$photo')";
						mysqli_query($dbc, $query) or die('error sending query to database');
						mysqli_close($dbc);
						echo "\t\t\t\t\t<div id=\"form-box\">";
						echo "\t\t\t\t\t\t<div id=\"form-box-image\">";
						echo "\t\t\t\t\t\t\t<img src=\"./images/check.png\" alt=\"Successful sign up\">";
						echo "\t\t\t\t\t\t</div>";
						echo "\t\t\t\t\t\t<p id=\"form-box-title\">Поздравляем! :)</p>";
						echo "\t\t\t\t\t\t<p id=\"form-box-text\">Вы успешно зарегистрированы!" . 
							"<br><a href=\"index.php\">Вернуться на главную</a></p>";
						echo "\t\t\t\t\t</div>";
						echo "\t\t\t\t</div>";
						echo "\t\t\t</div>";
						echo "\t\t</div>";

						//exit();
					}
					else {
						//login is already in use
						// FORM TEMPLATE IS NEEDED
						$errors[] = "Данный адрес электронной почты уже используется";
					}
				}
				else {
					//We got problems
					// FORM TEMPLATE IS NEEDED
				}

			}
		}
		else {
			//GET data (means that we are displaying forms)
		}
	}
?>
	</div>
</body>
</html>