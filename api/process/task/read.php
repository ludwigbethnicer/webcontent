<?php

	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	// database connection will be here
	// include database and object files
	include_once "config/database.php";
	include_once 'api/objects/task.php';

	// instantiate database and task object
	$database = new Database();
	$db = $database->getConnection();

	// initialize object
	$tbl_task = new ClassTask($db);

	// read task will be here
	// query task
	$stmt = $tbl_task->read();
	$num = $stmt->rowCount();

	// check if more than 0 record found
	if($num>0) {
		// task array
		$task_arr=array();
		$tasks_arr["records"]=array();

		// retrieve our table contents
		// fetch() is faster than fetchAll()
		// http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			// extract row
			// this will make $row['name'] to
			// just $name only
			extract($row);

			$task_item=array(
				"taskno" => $taskno,
				"title" => $title,
				"xdesc" => html_entity_decode($xdesc),
				"stat_id" => $stat_id,
				"stat" => $stat,
				"notes" => html_entity_decode($notes),
				"remarks" => $remarks,
				"date_created" => $date_created,
				"date_modified" => $date_modified,
				"date_completed" => $date_completed,
				"created_by" => $created_by,
				"verified_by" => $verified_by,
				"completed_by" => $completed_by,
				"due_date" => $due_date,
				"date_time_remain" => $date_time_remain
			);

			array_push($tasks_arr["records"], $task_item);
		}

		// set response code - 200 OK
		http_response_code(200);

		// show task data in json format
		echo json_encode($tasks_arr);
	} else {
 		// no task found will be here
		// set response code - 404 Not found
		http_response_code(404);

		// tell the user no task found
		echo json_encode(
			array("message" => "No Task found.")
		);
	}


	