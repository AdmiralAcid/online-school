					<form id="stud-reg" action="registration.php" method="post" enctype="multipart/form-data">
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
<?php
	
?>