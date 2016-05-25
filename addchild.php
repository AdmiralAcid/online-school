<?php
	//Start the session
	require_once('session.php');
	//Check if user is not logged in
	if (!isset($_SESSION['username']) || !isset($_SESSION['first_name']) || !isset($_SESSION['user_id']) || 
		!isset($_SESSION['second_name']) || !isset($_SESSION['is_student'])) {
		header("Location: index.php");
	}
	else {
		//if user is logged in, but he is not parent
		if ($_SESSION['is_student'] == 1) {
			header("Location: index.php");
		}
		else {
			//its ok, working here
			//setting variables for header.php
			$page_title = 'Добавить ребенка';
			$page_css = 'addchild.css';
			$page_js = '';
			require_once('header.php');
			require_once('date_sql.php');
?>
		<div id="first-background">
			<div id="find-box">
				<p>Добавление ребенка</p>
				<div id="inner-find-box">				
<?php
			if (isset($_POST['find_submit'])) {
				//gathering data
				$dbc = mysqli_connect('localhost', 'headfirst', 'headfirst', 'temp_learning') 
					or die('error connecting with database :(');
				$errors = Array();
				//checking name
				if (!empty($_POST['f-first_name']) && preg_match('/^([а-яА-ЯЁё]+)$/u', 
					$_POST['f-first_name'])) {
					$first_name = mysqli_real_escape_string($dbc, trim($_POST['f-first_name']));
				} else {
					$errors[] = 'Поле имени пустое или содержит недопустимые символы.';
				}
				if (!empty($_POST['f-second_name']) && preg_match('/^([а-яА-ЯЁё]+)$/u', 
					$_POST['f-second_name'])) {
					$second_name = mysqli_real_escape_string($dbc, trim($_POST['f-second_name']));
				} else {
					$errors[] = 'Поле фамилии пустое или содержит недопустимые символы.';
				}

				if (count($errors) == 0) {
					mysqli_query($dbc, "SET NAMES 'utf8'");
					$id = $_SESSION['user_id'];
					//checking user
					$query = "SELECT parent_one, parent_two, id FROM students WHERE first_name = '$first_name' AND second_name = '$second_name'";
					$data = mysqli_query($dbc, $query);
					
					if (mysqli_num_rows($data) == 0) {
						//there is no such student
						$errors[] = 'Ученик с таким именем или фамилией отсутствует в базе';
						require_once('find_form.php');
					}
					else {
						//checking available space for adding
						$row = mysqli_fetch_array($data);
						$student_id = $row['id'];
						if (is_null($row['parent_one']) && is_null($row['parent_two'])) {
							$query = "UPDATE students SET parent_one = '$id' where id = '$student_id'";
							mysqli_query($dbc, $query);
							echo "\t\t\t\t\t<div id=\"form-box\">";
							echo "\t\t\t\t\t\t<div id=\"form-box-image\">";
							echo "\t\t\t\t\t\t\t<img src=\"./images/check.png\" alt=\"Successful child adding\">";
							echo "\t\t\t\t\t\t</div>";
							echo "\t\t\t\t\t\t<p id=\"form-box-title\">Поздравляем!</p>";
							echo "\t\t\t\t\t\t<p id=\"form-box-text\">Теперь вы указаны в качестве родителя этого студента." . 
								"<br><a href=\"index.php\">Вернуться на главную</a></p>";
							echo "\t\t\t\t\t</div>";
							echo "\t\t\t\t</div>";
							echo "\t\t\t</div>";
							echo "\t\t</div>";
						} 
						elseif (!is_null($row['parent_one']) && is_null($row['parent_two'])) {
							if ($row['parent_one'] != $id) {
								$query = "UPDATE students SET parent_two = '$id' where id = '$student_id'";
								mysqli_query($dbc, $query);
								echo "\t\t\t\t\t<div id=\"form-box\">";
								echo "\t\t\t\t\t\t<div id=\"form-box-image\">";
								echo "\t\t\t\t\t\t\t<img src=\"./images/check.png\" alt=\"Successful child adding\">";
								echo "\t\t\t\t\t\t</div>";
								echo "\t\t\t\t\t\t<p id=\"form-box-title\">Поздравляем!</p>";
								echo "\t\t\t\t\t\t<p id=\"form-box-text\">Теперь вы указаны в качестве родителя этого студента." . 
									"<br><a href=\"index.php\">Вернуться на главную</a></p>";
								echo "\t\t\t\t\t</div>";
								echo "\t\t\t\t</div>";
								echo "\t\t\t</div>";
								echo "\t\t</div>";
							}
							else {
								$errors[] = 'Ученик с таким именем или фамилией уже указан в качестве вашего ребенка';
								require_once('find_form.php');
							}
						}
						else {
							$errors[] = 'У ученика с таким именем или фамилией уже указаны оба родителя';
								require_once('find_form.php');
						}
					}
				}
				else {
					//displaying input form with errors
					require_once('find_form.php');
				}
				mysqli_close($dbc);
			}
			else {
				//displaying input form
				require_once('find_form.php');
			}
		}
	}
?>