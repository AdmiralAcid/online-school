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
				<p>Регистрация студента</p>
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

				$f_name_right = false;
				$s_name_right = false;
				$b_date_right = false;
				$photo_right = false;

				// + email
				// + password

				//checking name
				if (!empty($first_name) && preg_match('/^([а-яА-ЯЁё]+)$/u', $first_name)) {
					$f_name_right = true;
				}
				if (!empty($second_name) && preg_match('/^([а-яА-ЯЁё]+)$/u', $second_name)) {
					$s_name_right = true;
				}
				if (!preg_match('/^([а-яА-ЯЁё]+)$/u', $patronymic)) {
					$patronymic = '';
				}
				//checking time
				$birth_date = date2sql($birth_date);
				if ($birth_date) {
					$b_date_right = true;
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
				}

				//checking data integrity
				if ($f_name_right && $s_name_right && $b_date_right && $photo_right){ //MAINCHECK
					//everything is OK
					mysqli_query($dbc, "SET NAMES 'utf8'");
					//check if user is unique
					$query = "SELECT FROM users WHERE login_mail = '$email'";
					$data = mysqli_query($dbc, $query);
					if (mysqli_num_rows($data) == 0) { //unite with MAINCHECK ^^^^^^
						//creating new user
						$query = "INSERT INTO users (login_mail, password, is_student) VALUES ('$email', " .
							"SHA('$password'), 1)";
						mysqli_query($dbc, $query) or die('error sending query to database');
						$query = "SELECT FROM users WHERE login_mail = '$email' AND password = SHA('$password')";
						//$query = "INSERT INTO students VALUES (0, '$first_name', '$second_name', 
						//	'$patronymic', '$birth_date', '$location', '$school', '$photo', '$email', '$pass')";
						//mysqli_query($dbc, $query) or die($query);
					}
					else {
						//login is already in use error
						// FORM TEMPLATE IS NEEDED
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