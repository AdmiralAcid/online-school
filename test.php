<?php
	$email_right = false;
	$email = 'coldcore@mail.ru';
	if (!empty($email) && preg_match('/^([a-zA-Z0-9@_\.]+)$/', $email)) {
		$email_right = true;
	}
	if ($email_right) {
		echo "it's OK!";
	}
?>
