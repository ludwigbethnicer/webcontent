<?php

	include_once "../config/database.php";

	$chksql = "SELECT 1 FROM tbl_task_status LIMIT 1";
	$chksql = $dbcretbl->query($chksql); //$db needs to be PDO instance

	if($chksql) {
		echo "Database Table: TBL_TASK_STATUS; Already exist!<br>";
	} else {
		try {
			$sql = "CREATE TABLE IF NOT EXISTS TBL_TASK_STATUS(
				stat_id INT(11) AUTO_INCREMENT PRIMARY KEY, 
				stat VARCHAR(18) NULL
			);";
			$dbcretbl->exec($sql);
			echo "Database Table created successfully: TBL_TASK_STATUS<br>";

			$sql = "INSERT INTO tbl_task_status (stat) VALUES ('New Task'),('Return'),('In Progress'),('For Verification'),('Verified'),('Complete'),('Overdue')";
			// use exec() because no results are returned
			$dbcretbl->exec($sql);
			echo "New record created successfully at Task Status!<br>";
		} catch(PDOException $e) {
			echo $e->getMessage()."<br>";
		}
	}