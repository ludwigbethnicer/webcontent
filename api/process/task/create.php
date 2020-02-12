<?php

	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	// get database connection
	include_once 'config/database.php';

	// instantiate task object
	include_once 'api/objects/task.php';

	// get database connection
	$database = new Database();
	$db = $database->getConnection();

	// prepare task object
	$tbl_task = new ClassTask($db);

	// get posted data
	$data = json_decode(file_get_contents("php://input"));

	// make sure data is not empty
	if(
		!empty($data->title) &&
		!empty($data->xdesc) &&
		!empty($data->stat_id) &&
		!empty($data->notes) &&
		!empty($data->created_by) &&
		!empty($data->verified_by) &&
		!empty($data->completed_by) &&
		!empty($data->due_date)
	) {
		// set task property values
		$tbl_task->title = $data->title;
		$tbl_task->xdesc = $data->xdesc;
		$tbl_task->stat_id = $data->stat_id;
		$tbl_task->notes = $data->notes;
		$tbl_task->date_created = date('Y-m-d H:i:s');
		$tbl_task->date_modified = date('Y-m-d H:i:s');
		$tbl_task->date_completed = $data->date_completed;
		$tbl_task->created_by = $data->created_by;
		$tbl_task->verified_by = $data->verified_by;
		$tbl_task->completed_by = $data->completed_by;
		$tbl_task->due_date = $data->due_date;

		// create the task
		if($task->create()) {
			// set response code - 201 created
			http_response_code(201);

			// tell the user
			echo json_encode(array("message" => "Task was created."));
		}

		// if unable to create the task, tell the user
		else {
			// set response code - 503 service unavailable
			http_response_code(503);

			// tell the user
			echo json_encode(array("message" => "Unable to create task."));
		}
	}

	// tell the user data is incomplete
	else {
		// set response code - 400 bad request
		http_response_code(400);

		// tell the user
		echo json_encode(array("message" => "Unable to create task. Data is incomplete."));
	}