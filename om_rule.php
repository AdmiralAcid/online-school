<?php
	//Start the session
	require_once('session.php');

	//SHOULD BE REMADE 
	
	//NO HEADER | JUST A TRANSITION PAGE

	function linkToGo($dbc, $theme_id, $student_id) {
		$query = "SELECT id, link FROM chunks WHERE theme_id = '$theme_id'";
		$data = mysqli_query($dbc, $query);
		$go_link = '';
		for ($i = 0; $i < mysqli_num_rows($data); $i++) {
			$row = mysqli_fetch_array($data);
			if ($i == 0) {
				$go_link = $row['link'];
			}
			$de_query = "SELECT chunk_status FROM chunk_progress WHERE chunk_id = '" . $row['id'] . "' AND student_id = '$student_id'";
			$de_data = mysqli_query($dbc, $de_query);
			$de_row = mysqli_fetch_array($de_data);
			if ($de_row['chunk_status'] == 'n' || $de_row['chunk_status'] == 's') {
				return "" . $row['link'] . ".php";
			}
		}
		return "" . $go_link . ".php";
	}
	
	//Check if user is not logged in
	if (!isset($_SESSION['username']) || !isset($_SESSION['first_name']) || 
		!isset($_SESSION['second_name']) || !isset($_SESSION['is_student'])) {
		header("Location: index.php");
	}
	else {
		//if user is logged in, but he is not student
		if ($_SESSION['is_student'] == 0) {
			header("Location: index.php");
		}
		else {
			$dbc = mysqli_connect('localhost', 'headfirst', 'headfirst', 'temp_learning') 
				or die('error connecting with database :(');
			mysqli_query($dbc, "SET NAMES 'utf8'");

			//getting student id
			$query = "SELECT students.id FROM students, users WHERE users.login_mail = '" . $_SESSION['username'] . "' AND students.user_id = users.id";
			$data = mysqli_query($dbc, $query);
			$row = mysqli_fetch_array($data);
			$student_id = $row['id'];

			//getting theme_status
			$theme_id = 20;
			$query = "SELECT theme_status FROM theme_progress WHERE student_id = '$student_id' AND theme_id= '$theme_id'";
			$data = mysqli_query($dbc, $query);

			//checking if theme_progress row exists for this user
			if (mysqli_num_rows($data) == 0) {
				//it doesn't exist
				$query = "INSERT INTO theme_progress (student_id, theme_id, theme_status) VALUES (" . $student_id . ", " . $theme_id . ", 'n')";
				mysqli_query($dbc, $query);

				//chunks time!
				$query = "SELECT id FROM chunks WHERE theme_id = '$theme_id'";
				$data = mysqli_query($dbc, $query);
				while ($row = mysqli_fetch_array($data)) {
					$ch_query = "INSERT INTO chunk_progress (student_id, chunk_id, chunk_status) VALUES (" . $student_id . ", " . $row['id'] . ", 'n')";
					mysqli_query($dbc, $ch_query);
				}
			}

			//decision time!
			header("Location: " . linkToGo($dbc, $theme_id, $student_id) . "");
		}
	}