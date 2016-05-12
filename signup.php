<?php
	//Start the session
	session_start();
	//setting variables for header.php
	$page_title = 'Регистрация';
	$page_css = 'signup.css';
	$page_js = 'signup.js';
	require_once('header.php');
?>
		<div id="first-background">
			<div id="reg-box">
				<p>Регистрация студента</p>
				<div id="inner-reg-box">				
<?php 
	//Check if user is logged in
	if (isset($_SESSION['username']) && isset($_SESSION['user_id']) 
		&& isset($_SESSION['is_student'])) {
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
?>
	</div>
</body>
</html>