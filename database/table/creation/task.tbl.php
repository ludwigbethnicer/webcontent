<?php

	include_once "../config/database.php";

	$chksql = "SELECT 1 FROM tbl_task LIMIT 1";
	$chksql = $dbcretbl->query($chksql); //$db needs to be PDO instance

	if($chksql) {
		echo "Database Table: Task; Already exist!<br>";
	} else {
		try {
			$sql = "CREATE TABLE IF NOT EXISTS TBL_TASK(
				taskno INT(11) AUTO_INCREMENT PRIMARY KEY, 
				title VARCHAR(18) NULL, 
				xdesc TEXT NULL, 
				stat_id INT(11) NULL, 
				notes TEXT NOT NULL, 
				remarks TEXT NOT NULL, 
				date_created DATE NOT NULL, 
				date_modified DATE NOT NULL, 
				date_completed DATE NOT NULL, 
				created_by VARCHAR(50) NULL, 
				verified_by VARCHAR(50) NULL, 
				completed_by VARCHAR(50) NULL, 
				due_date DATE NOT NULL, 
				date_time_remain TEXT NOT NULL
			);";
			$dbcretbl->exec($sql);
			echo "Database Table created successfully: Task.<br>";

			$sql = "INSERT INTO tbl_task (title, xdesc, stat_id, notes, remarks, date_created, date_modified, date_completed, created_by, verified_by, completed_by, due_date) VALUES ('Fix Problem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '1', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'none', '2020-01-31', '2020-01-31', '2020-01-31', 'Shiela', 'Rica', 'Ludwig', '2020-01-31'), ('Debug', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'none', '2020-01-31', '2020-01-31', '2020-01-31', 'Shiela', 'Rica', 'Ludwig', '2020-01-31')";
			// use exec() because no results are returned
			$dbcretbl->exec($sql);
			echo "New record created successfully at Sample Task!<br>";
		} catch(PDOException $e) {
			echo $e->getMessage()."<br>";
		}
		$dbcnn = null;
	}