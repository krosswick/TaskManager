<?php
	$password = 'pass';
	$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
	
	print $password . "<br />";
	print $hashedPassword . "<br />";
	
	if (password_verify($password, $hashedPassword)) {
		print("Password matches.<br />");
	} else {
		print("Password does not match.<br />");
	}
?>