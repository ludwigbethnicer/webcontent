<?php

	class UserController {

		// Database
		private $dbcnn;
		private $tblusers = 'posts';

		// POST Properties
		public $usercode;
		public $passcode;
		public $email;
		public $nickname;
		public $ustatus;
		public $ulevel;
		public $createdby;
		public $modifiedby;
		public $yearcreated;
		public $monthcreated;
		public $daycreated;
		public $timecreated;
		public $datecreated;
		public $yearmodified;
		public $monthmodified;
		public $daymodified;
		public $timemodified;
		public $datemodified;

		// Constractor with DB
		public function __constractor($db) {
			$this->dbcnn = $db;
		}

		// Get POSTs
		public function read() {

			// Create Query
			$query = 'SELECT 
				c.username as username_name, 
				p.passcode, 
				p.email, 
				p.nickname, 
				p.ustatus, 
				p.ulevel, 
				p.createdby, 
				p.modifiedby 
				
			FROM
				' . $this- . '
			'
		}
	}