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

	// get id of task to be deleted
	$data = json_decode(file_get_contents("php://input"));

	// set ID property of task to be deleted
	$tbl_task->taskno = $data->taskno;

	// delete the task
	if($tbl_task->delete()) {
		// set response code - 200 ok
		http_response_code(200);

		// tell the user
		echo json_encode(array("message" => "Task was deleted."));
	}
	// if unable to delete the task
	else {
		// set response code - 503 service unavailable
		http_response_code(503);

		// tell the user
		echo json_encode(array("message" => "Unable to delete task."));
	}