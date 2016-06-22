<?php
	//Start the session
	require_once('session.php');
	
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
			//setting variables for header.php
			$page_title = 'Закон Ома. Напряжение';
			$page_css = 'study.css';
			$page_js = 'voltage.js';
			require_once('header.php');

			$dbc = mysqli_connect('localhost', 'headfirst', 'headfirst', 'temp_learning') 
				or die('error connecting with database :(');
			mysqli_query($dbc, "SET NAMES 'utf8'");

?>
		<p id="p-title"><span id="grey-text">Закон Ома</span> 5.1 Напряжение</p>
		<div id="bicolor-background">
			<div id="work-space">
				<div id="status-panel">
					<p id="status-panel-para">5.Закон Ома</p>
					<ul id="status-panel-list">
						<li>5.1 Напряжение</li>
						<li>5.2 Сила тока</li>
						<li>5.3 Сопротивление</li>
						<li>5.4 Закон Ома</li>
						<li>5.5 Формулы</li>
					</ul>
					<div class="greyline"></div>
					<div id="status-panel-changer">
						<div class="narration-button" id="text-button"></div>
						<div class="narration-button" id="video-button"></div>
						<div class="narration-button" id="audio-button"></div>
					</div>
					<div class="greyline"></div>
					<div id="getback">
						<a href="index.php"><<Вернуться к выбору урока</a>
					</div>
				</div>
				<div id="study-panel"></div>
			</div>
		</div>
<?php

		}
	}


?>
	</div>
</body>
</html>