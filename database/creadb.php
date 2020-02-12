<?php

	try {
		$conn = new PDO("mysql:host=localhost;", "root", "");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "CREATE DATABASE IF NOT EXISTS dbmain";
		$conn->exec($sql);
		$sql = "use dbmain";
		$conn->exec($sql);
		echo "Database: dbmain; Successfully Created!<br>";
	} catch(PDOException $e) {
	    echo "Error".$e->getMessage()."<br>";
	}