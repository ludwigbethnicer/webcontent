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

	// get id of task to be edited
	$data = json_decode(file_get_contents("php://input"));

	// set ID property of task to be edited
	$tbl_task->taskno = $data->taskno;

	// set task property values
	$tbl_task->title = $data->title;
	$tbl_task->xdesc = $data->xdesc;
	$tbl_task->stat_id = $data->stat_id;
	$tbl_task->notes = $data->notes;
	$tbl_task->date_modified = date('Y-m-d H:i:s');
	$tbl_task->date_completed = $data->date_completed;
	$tbl_task->created_by = $data->created_by;
	$tbl_task->verified_by = $data->verified_by;
	$tbl_task->completed_by = $data->completed_by;
	$tbl_task->due_date = $data->due_date;

	// update the task
	if($tbl_task->update()) {
		// set response code - 200 ok
		http_response_code(200);

		// tell the user
		echo json_encode(array("message" => "Task was updated."));
	}

	// if unable to update the task, tell the user
	else {
		// set response code - 503 service unavailable
		http_response_code(503);

		// tell the user
		echo json_encode(array("message" => "Unable to update task."));
	}