<?php

	$router = new Router(new Request);

	// Install System Database
	$router->get('/database', function() {
		include_once "database/index.php";
	});

	$router->get('/', function() {
		include_once "content/themes/default/index.php";
	});

	$router->get('/index', function() {
		include_once "content/themes/default/index.php";
	});

	$router->get('/home', function() {
		include_once "content/themes/default/index.php";
	});

	$router->get('/default', function() {
		include_once "content/themes/default/index.php";
	});

	$router->get('/profile', function() {
		return "<h1>Profile</h1>";
	});

	// Task Manager
	$router->get('/taskmngr', function() {
		include_once "admin/taskmanagement/index.html";
	});

	// API-CRUD: Task
	$router->get('/api_create_task', function() {
		include_once "api/process/task/create.php";
	});

	$router->get('/api_read_task', function() {
		include_once "api/process/task/read.php";
	});

	$router->get('/api_update_task', function() {
		include_once "api/process/task/update.php";
	});

	$router->get('/api_delete_task', function() {
		include_once "api/process/task/delete.php";
	});
	// ---- End API-CRUD Task ------ //

	$router->post('/data', function($request) {
		return json_encode($request->getBody());
	});

	$router->get('/password_encrytpt', function() {
		include_once "run/password_encrytpt.php";
	});

	$router->get('/hello', function() {
		include_once "run/hello.php";
	});

	$router->get('/php-version', function() {
		include_once "run/php-version.php";
	});

	// Bootstrap 3.4.0
	$router->get('/cssbootstrap340', function() {
		header("Content-Type: text/css");
		include_once "bootstrap/3.4.0/css/bootstrap.min.css";
	});

	$router->get('/jsbootstrap340', function() {
		header("Content-Type: text/js");
		include_once "bootstrap/3.4.0/js/bootstrap.min.js";
	});

	// Bootstrap 4.3.1
	$router->get('/cssbootstrap431', function() {
		header("Content-Type: text/css");
		include_once "bootstrap/4.3.1/css/bootstrap.min.css";
	});

	$router->get('/jsbootstrap431', function() {
		header("Content-Type: text/js");
		include_once "bootstrap/4.3.1/js/bootstrap.min.js";
	});

	// JQuery 3.3.1
	$router->get('/jquery331', function() {
		header("Content-Type: text/js");
		include_once "ajax/libs/jquery/3.3.1/jquery.min.js";
	});

	// JQuery 3.4.0
	$router->get('/jquery340', function() {
		header("Content-Type: text/js");
		include_once "ajax/libs/jquery/3.4.0/jquery.min.js";
	});

	// Admin Assets
	$router->get('/adminstyle', function() {
		header("Content-Type: text/css");
		include_once "admin/assets/css/style.css";
	});

	$router->get('/adminscript', function() {
		header("Content-Type: text/js");
		include_once "admin/assets/js/script.js";
	});

	// Default Theme Assets
	$router->get('/themestyle', function() {
		header("Content-Type: text/css");
		include_once "content/themes/default/assets/css/style.css";
	});

	$router->get('/themescript', function() {
		header("Content-Type: text/js");
		include_once "content/themes/default/assets/js/script.js";
	});