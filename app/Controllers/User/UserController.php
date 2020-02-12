<?php

	class UserController {

		// Database
		private $dbcnn;
		private $tblusers = 'posts';

		// POST Properties
		public $user_id;
		public $user_name;
		public $user_password;
		public $user_email;
		public $displayname;
		public $ustat;
		public $acctlevel;
		public $datecreated;

		// Constractor with DB
		public function __constractor($db) {
			$this->dbcnn = $db;
		}

		// Get POSTs
		public function read() {

			// Create Query
			$query = 'SELECT 
				c.username as username_name, 
				p.user_id, 
				p.user_password, 
				p.user_email, 
				p.displayname, 
				p.ustat, 
				p.acctlevel, 
				p.datecreated 
			FROM
				' . $this- . '
			'
		}
	}