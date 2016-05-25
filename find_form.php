					<form id="find-student" action="addchild.php" method="post">
						<div id="form-box">
<?php
	if (isset($errors)) {
		while (count($errors)>0) {
			echo "\t\t\t\t\t\t\t<p class=\"login-error-msg\">" . array_shift($errors) . "</p>";
		}
	}
?>
							<div class="div-label">
								<label for="f-first_name">Имя</label>
							</div>
							<div class="div-input">
								<input title="Введите имя ребенка" type="text" id="f-first_name" 
									name="f-first_name" size="24" pattern="^[А-Яа-яЁё]+$" required>
							</div>
							<div class="div-label">
								<label for="f-second_name">Фамилия</label>
							</div>
							<div class="div-input">
								<input title="Введите фамилию ребенка" type="text" id="f-second_name" 
									name="f-second_name" size="24" pattern="^[А-Яа-яЁё]+$" required>
							</div>
							<div class="form-dummy"></div>
							<div class="form-dummy"></div>
							<input id="submit-button" type="submit" value="Поиск" name="find_submit">
							<div class="form-dummy"></div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>