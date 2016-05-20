					<form id="stud-reg" action="signup.php" method="post" enctype="multipart/form-data">
						<div id="form-box">
<?php
	if (isset($errors)) {
		while (count($errors)>0) {
			echo "\t\t\t\t\t\t\t<p class=\"error-msg\">" . array_shift($errors) . "</p>";
		}
	}
?>
							<div class="div-label">
								<label for="first_name">Имя</label>
							</div>
							<div class="div-input">
								<input title="Введите имя" type="text" id="first_name" name="first_name" 
									value="<?php if (!empty($first_name)) echo $first_name; ?>" size="24" 
									pattern="^[А-Яа-яЁё]+$" required>
							</div>
							<div class="div-label">
								<label for="second_name">Фамилия</label>
							</div>
							<div class="div-input">
								<input title="Введите фамилию" type="text" id="second_name" name="second_name" 
									value="<?php if (!empty($second_name)) echo $second_name; ?>" size="24" 
									pattern="^[А-Яа-яЁё]+$" required>
							</div>
							<div class="div-label">
								<label for="patronymic">Отчество</label>
							</div>
							<div class="div-input">
								<input title="Введите отчество" type="text" id="patronymic" name="patronymic" 
									value="<?php if (!empty($patronymic)) echo $patronymic; ?>" size="24" 
									pattern="^[А-Яа-яЁё]+$" required>
							</div>
							<div class="div-label">
								<label for="birth_date">Дата рождения</label>
							</div>
							<div class="div-input">
								<input title="Введите дату рождения в заданном формате" type="text" 
									id="birth_date" name="birth_date" size="24" placeholder="ДД.ММ.ГГГГ" 
									value="<?php if (!empty($_POST['birth_date'])) echo $_POST['birth_date']; ?>" 
									maxlength="10" required>
							</div>
							<div class="div-label">
								<label for="location">Населенный пункт</label>
							</div>
							<div class="div-input">
								<select title="Выберите из списка место своего проживания" id="location" name="location" size="1" required>
									<option disabled>Выберите нас.пункт</option>
									<option value="Moscow">Москва</option>
									<option value="Petersburg">Санкт-Петербург</option>
								</select>
							</div>
							<div class="div-label">
								<label for="school">Школа</label>
							</div>
							<div class="div-input">
								<select title="Выберите из списка свою школу" id="school" name="school" size="1" required>
									<option value="znayka">Гимназия "Знайка"</option>
									<option value="morozko">Лицей "Морозко"</option>
									<option value="school_11">Школа №11</option>
								</select>
							</div>
							<div class="div-label">
								<label for="photo">Фото</label>
							</div>
							<div class="div-input">
								<input title="Загрузите свое фото в формате jpeg или png. Размер файла не должен превышать 2 мегабайта." 
									type="file" id="photo" name="photo" accept="image/*,image/jpeg,image/png" required>
							</div>
							<div class="div-label">
								<label for="email">Электронная почта</label>
							</div>
							<div class="div-input">
								<input title="Введите адрес своей электронной почты" type="email" id="email" 
									value="<?php if (!empty($email)) echo $email; ?>" name="email" size="24" 
									pattern="^[a-zA-Z0-9@_\.]+$" required>
							</div>
							<div class="div-label">
								<label for="password">Пароль</label>
							</div>
							<div class="div-input">
								<input title="Придумайте пароль. Пароль может содержать только латинские буквы и цифры, а также он не должен быть длиннее 20 и короче 10 символов." 
									type="password" id="password" name="password" size="24" pattern=".{10,20}" required>
							</div>
							<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
							<input type="hidden" name="student_signup" id="student_signup" value="1">
							<div class="form-dummy"></div>
							<div class="form-dummy"></div>
							<input id="submit-button" type="submit" value="Зарегистрироваться" name="submit">
							<div class="form-dummy"></div>
						</div>
					</form>
				</div>
				<div id="other-form-ref-container"><a href="signup.php?student_signup=0">
					Зарегистрироваться как родитель>></a></div>
			</div>
		</div>
	</div>
</body>
</html>