<?php

	$password = 'anna';
	$hash = password_hash($password, PASSWORD_DEFAULT);
	// $expensiveHash = password_hash($password, PASSWORD_DEFAULT, array('cost' => 20));

	echo $password;
	echo "<br><br>";
	echo $hash;
	echo "<br><br>";
	// echo $expensiveHash;

	echo password_verify('anna', $hash); //Returns true
	echo "<br><br>";
	//echo password_verify('anna', $expensiveHash); //Also returns true
	// echo "<br><br>";
	// echo password_verify('elsa', $hash); //Returns false