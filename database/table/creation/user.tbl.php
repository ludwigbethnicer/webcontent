<?php

	include_once "../config/database.php";

	$chksql = "SELECT 1 FROM tbl_users LIMIT 1";
	$chksql = $dbcretbl->query($chksql); //$db needs to be PDO instance

	if($chksql) {
		echo "Database Table: System User; Already exist!<br>";
	} else {
		try {
			$sql = "CREATE TABLE IF NOT EXISTS TBL_USERS(
				usercode VARCHAR(50) PRIMARY KEY, 
				passcode TEXT NOT NULL, 
				email TEXT NOT NULL, 
				nickname VARCHAR(50) NULL, 
				ustatus INT(11) NULL, 
				ulevel INT(11) NULL, 
				createdby VARCHAR(50), 
				modifiedby VARCHAR(50), 
				yearcreated YEAR NOT NULL, 
				monthcreated VARCHAR(2) NOT NULL, 
				daycreated VARCHAR(2) NOT NULL, 
				timecreated TIME NOT NULL, 
				datecreated DATE NOT NULL, 
				yearmodified YEAR NOT NULL, 
				monthmodified VARCHAR(2) NOT NULL, 
				daymodified VARCHAR(2) NOT NULL, 
				timemodified TIME NOT NULL, 
				datemodified DATE NOT NULL);";
			$dbcretbl->exec($sql);
			echo "Database Table created successfully: System User<br>";
		} catch(PDOException $e) {
			echo $e->getMessage()."<br>";
		}
		$dbcnn = null;
	}