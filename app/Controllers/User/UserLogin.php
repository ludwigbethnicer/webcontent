<?php

	// start php session
	session_start();
	
	class UserLogin {
		if(isset($_POST["login"])) {
			$field = array(
				'usercode'	=>	clean($_POST["username"]),
				'passcode'	=>	clean($_POST["password"])
			);
		}
	}