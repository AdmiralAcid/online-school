<?php
	$page_title = 'Войти';
	$page_css = 'signin.css';
	$page_js = '';
	require_once('header.php');
?>
		<div id="first-background">
			<div id="login-box">
				<p>Войти</p>
				<div id="inner-login-box">				
					<form id="user-login" action="signin.php" method="post">
						<div id="login-form-box">
<?php
	if (isset($errors)) {
		while (count($errors)>0) {
			echo "\t\t\t\t\t\t\t<p class=\"login-error-msg\">" . array_shift($errors) . "</p>";
		}
	}
?>
							<div class="div-label">
								<label for="l-email">Логин</label>
							</div>
							<div class="div-input">
								<input title="Введите логин (совпадает с адресом вашей электронной почты)" type="email" id="l_email" 
									name="l_email" size="24" pattern="^[a-zA-Z0-9@_\.]+$" required>
							</div>
							<div class="div-label">
								<label for="l_password">Пароль</label>
							</div>
							<div class="div-input">
								<input title="Введите пароль" type="password" id="l_password" name="l_password" 
									size="24" pattern=".{10,20}" required>
							</div>
							<div class="form-dummy"></div>
							<div class="form-dummy"></div>
							<input id="submit-button" type="submit" value="Войти" name="login_submit">
							<div class="form-dummy"></div>
						</div>
					</form>
				</div>
				<div class="other-form-ref-container"><a href="signup.php?student_signup=0">
					Зарегистрироваться как родитель>></a></div>
				<div class="other-form-ref-container"><a href="signup.php?student_signup=1">
					Зарегистрироваться как студент>></a></div>
			</div>
		</div>
	</div>
</body>
</html>