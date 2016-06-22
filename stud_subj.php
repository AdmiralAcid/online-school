<?php
	$dbc = mysqli_connect('localhost', 'headfirst', 'headfirst', 'temp_learning') 
		or die('error connecting with database :(');
	mysqli_query($dbc, "SET NAMES 'utf8'");

	function coagulator($keyword, $dbc) {
		//getting user id
		$query = "SELECT id FROM users WHERE login_mail = '" . $_SESSION['username'] . "'";
		$data = mysqli_query($dbc, $query);
		$row = mysqli_fetch_array($data);
		$user_id = $row['id'];
		//getting student id
		$query = "SELECT id FROM students WHERE user_id = '" . $user_id . "'";
		$data = mysqli_query($dbc, $query);
		$row = mysqli_fetch_array($data);
		$student_id = $row['id'];

		//getting subject id
		$query = "SELECT id FROM subjects WHERE subject_name = '$keyword'";
		$data = mysqli_query($dbc, $query);
		$row = mysqli_fetch_array($data);
		$subject_id = $row['id'];
		$query = "SELECT * FROM themes WHERE subject_id = '$subject_id' ORDER BY order_number ASC";
		$data = mysqli_query($dbc, $query);

		while ($row = mysqli_fetch_array($data)) {
			$theme_name = $row['theme_name'];
			$theme_id = $row['id'];
			$link = $row['link'];
			$order_number = $row['order_number'];
			
			$proquery = "SELECT theme_status FROM theme_progress WHERE theme_id = '$theme_id' AND 
				student_id = '$student_id'";
			$prodata = mysqli_query($dbc, $proquery);
			$prorow = mysqli_fetch_array($prodata);
			
			if ($prorow['theme_status'] == 'n' || $prorow['theme_status'] == NULL){
				echo "<div class=\"paragraph\"><a class=\"new-para\" href=\"" . $link . ".php\">" . 
					$order_number . "." . $theme_name . "</a></div>";
			} elseif ($prorow['theme_status'] == 'e') {
				echo "<div class=\"paragraph\"><a class=\"ended-para\" href=\"" . $link . ".php\">" . 
					$order_number . "." . $theme_name . "</a></div>";
			} elseif ($prorow['theme_status'] == 's') {
				echo "<div class=\"paragraph\"><a class=\"start-para\" href=\"" . $link . ".php\">" . 
					$order_number . "." . $theme_name . "</a></div>";
			}
		}
	}
?>		
		<p id="p-choice">Выбор предметов и тем</p>
		<div id="student-first-background">
			<div id="subject-container">
				<div class="subject-row">
					<div class="inner-subject-container" id="algebra">
						<p class="p-subject">Алгебра</p>
					</div>
					<div class="inner-theme-container" id="algebra-links">
<?php
	coagulator('Алгебра', $dbc);
?>
					</div>
				</div>
				<div class="subject-row">
					<div class="inner-subject-container" id="geometry">
						<p class="p-subject">Геометрия</p>
					</div>
					<div class="inner-theme-container" id="geometry-links">
<?php
	coagulator('Геометрия', $dbc);
?>
					</div>
				</div>
				<div class="subject-row">
					<div class="inner-subject-container" id="physics">
						<p class="p-subject">Физика</p>
					</div>
					<div class="inner-theme-container" id="physics-links">
<?php
	coagulator('Физика', $dbc);
?>
					</div>
				</div>
				<div class="subject-row">
					<div class="inner-subject-container" id="chems">
						<p class="p-subject">Химия</p>
					</div>
					<div class="inner-theme-container" id="chems-links">
<?php
	coagulator('Химия', $dbc);
?>
					</div>
				</div>
				<div class="subject-row">
					<div class="inner-subject-container" id="biology">
						<p class="p-subject">Биология</p>
					</div>
					<div class="inner-theme-container" id="biology-links">
<?php
	coagulator('Биология', $dbc);
?>
					</div>
				</div>
			</div>
		</div>