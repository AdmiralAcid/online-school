<?php
	//Start the session
	require_once('session.php');
	//setting variables for header.php
	$page_title = 'Главная';
	$page_css = 'index.css';

	//Check if user is logged in
	if (isset($_SESSION['username']) && isset($_SESSION['is_student'])) {
		//User IS logged, but who he is?
		if ($_SESSION['is_student'] == 1) {
			//loading header with student's javascript
			$page_js = 'st_index.js';
			require_once('header.php');

			//displaying list of subjects
			require_once('stud_subj.php');
			
		}
		else {
			//loading header with parent's javascript
			$page_js = 'pr_index.js'; //if it's needed of course
			require_once('header.php');

			//displaying menu of student scores - 2 types of it 
		}
	}
	else {
		//standart index
		$page_js = '';
		require_once('header.php');
?>
		<div id="first_background">
			<div id="info">
				<p id="info-one">
					Вселенная открытий ждет вас в проекте
				</p>
				<p id="info-two">
					<span id="info-two-left">ОНЛАЙН</span>
					<span id="info-two-mid">/</span>
					<span id="info-two-right">ШКОЛА</span>
				</p>
				<p id="info-three">
					Онлайн-школа - это образовательный проект, призванный наилучшим образом подстроиться под ученика
				</p>
				<a class="log-button" href="signin.php">Вход</a>
				<a class="log-button" href="signup.php?student_signup=1">Регистрация студента</a>
				<a class="log-button-parents" href="signup.php?student_signup=0">Регистрация родителя</a>
			</div>
		</div>
	</div>
</body>
</html>
<?php 
	}
?>