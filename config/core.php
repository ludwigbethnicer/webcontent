<?php

	// show error reporting
	error_reporting(E_ALL);

	// set your default time-zone
	date_default_timezone_set('Asia/Jerusalem');

	// home page url
	$home_url = "http://localhost" or "http://192.168.1.223";

	// do not show error reporting
	error_reporting( error_reporting() & ~E_NOTICE );

	// show error reporting
	// ini_set('display_errors', 1);
	// error_reporting(E_ALL);

	// page given in URL parameter, default page is one
	$page = isset($_GET['page']) ? $_GET['page'] : 1;

	// set number of records per page
	$records_per_page = 5;

	// calculate for the query LIMIT clause
	$from_record_num = ($records_per_page * $page) - $records_per_page;