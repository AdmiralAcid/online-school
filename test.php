<?php
	$username = 'coldcore@mail.com';
	$username = mb_substr($username, 0, stripos($username, '@')+1);
	echo $username;
?>
