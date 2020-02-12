<?php

	class ClassTask {

		// database connection and table name
		private $dbcnn;
		private $tbl_task = "tbl_task";

		// object properties
		public $taskno;
		public $title;
		public $desc;
		public $stat_id;
		public $stat;
		public $notes;
		public $remarks;
		public $date_created;
		public $date_modified;
		public $date_completed;
		public $created_by;
		public $verified_by;
		public $completed_by;
		public $due_date;
		public $date_time_remain;

		// constructor with $db as database connection
		public function __construct($db){
			$this->dbcnn = $db;
		}

		// read task
		function read() {
			// select all query
			$query = "SELECT s.stat as stat, task.taskno, task.title, task.xdesc, task.stat_id, task.notes, task.remarks, task.date_created, task.date_modified, task.date_completed, task.created_by, task.verified_by, task.completed_by, task.due_date, task.date_time_remain FROM " . $this->tbl_task . " task LEFT JOIN tbl_task_status s ON task.stat_id = s.stat_id ORDER BY task.taskno ASC";

			// prepare query statement
			$stmt = $this->dbcnn->prepare($query);

			// execute query
			$stmt->execute();

			return $stmt;
		}

		// create task
		function create() {
			// query to insert record
			$query = "INSERT INTO " . $this->tbl_task . " SET title=:title, xdesc=:xdesc, stat_id=:stat_id, notes=:notes, remarks=:remarks, date_created=:date_created, date_modified=:date_modified, date_completed=:date_completed, created_by=:created_by, verified_by=:verified_by, completed_by=:completed_by, due_date=:due_date, date_time_remain=:date_time_remain";

			// prepare query
			$stmt = $this->dbcnn->prepare($query);

			// sanitize
			$this->title=htmlspecialchars(strip_tags($this->title));
			$this->xdesc=htmlspecialchars(strip_tags($this->xdesc));
			$this->stat_id=htmlspecialchars(strip_tags($this->stat_id));
			$this->notes=htmlspecialchars(strip_tags($this->notes));
			$this->remarks=htmlspecialchars(strip_tags($this->remarks));
			$this->date_created=htmlspecialchars(strip_tags($this->date_created));
			$this->date_modified=htmlspecialchars(strip_tags($this->date_modified));
			$this->date_completed=htmlspecialchars(strip_tags($this->date_completed));
			$this->created_by=htmlspecialchars(strip_tags($this->created_by));
			$this->verified_by=htmlspecialchars(strip_tags($this->verified_by));
			$this->completed_by=htmlspecialchars(strip_tags($this->completed_by));
			$this->due_date=htmlspecialchars(strip_tags($this->due_date));
			$this->date_time_remain=htmlspecialchars(strip_tags($this->date_time_remain));

			// bind values
			$stmt->bindParam(":title", $this->title);
			$stmt->bindParam(":xdesc", $this->xdesc);
			$stmt->bindParam(":stat_id", $this->stat_id);
			$stmt->bindParam(":notes", $this->notes);
			$stmt->bindParam(":remarks", $this->remarks);
			$stmt->bindParam(":date_created", $this->date_created);
			$stmt->bindParam(":date_modified", $this->date_modified);
			$stmt->bindParam(":date_completed", $this->date_completed);
			$stmt->bindParam(":created_by", $this->created_by);
			$stmt->bindParam(":verified_by", $this->verified_by);
			$stmt->bindParam(":completed_by", $this->completed_by);
			$stmt->bindParam(":due_date", $this->due_date);
			$stmt->bindParam(":date_time_remain", $this->date_time_remain);

			// execute query
			if($stmt->execute()) {
				return true;
			}
			return false;
		}

		// update the task
		function update() {
			// update query
			$query = "UPDATE " . $this->tbl_task . " SET title=:title, xdesc=:xdesc, notes=:notes, remarks=:remarks, date_modified=:date_modified, date_completed=:date_completed, created_by=:created_by, verified_by=:verified_by, completed_by=:completed_by, due_date=:due_date, date_time_remain=:date_time_remain, stat_id=:stat_id WHERE taskno=:taskno";

			// prepare query statement
			$stmt = $this->dbcnn->prepare($query);

			// sanitize
			$this->title=htmlspecialchars(strip_tags($this->title));
			$this->xdesc=htmlspecialchars(strip_tags($this->xdesc));
			$this->stat_id=htmlspecialchars(strip_tags($this->stat_id));
			$this->notes=htmlspecialchars(strip_tags($this->notes));
			$this->remarks=htmlspecialchars(strip_tags($this->remarks));
			$this->date_modified=htmlspecialchars(strip_tags($this->date_modified));
			$this->date_completed=htmlspecialchars(strip_tags($this->date_completed));
			$this->created_by=htmlspecialchars(strip_tags($this->created_by));
			$this->verified_by=htmlspecialchars(strip_tags($this->verified_by));
			$this->completed_by=htmlspecialchars(strip_tags($this->completed_by));
			$this->due_date=htmlspecialchars(strip_tags($this->due_date));
			$this->date_time_remain=htmlspecialchars(strip_tags($this->date_time_remain));
			$this->taskno=htmlspecialchars(strip_tags($this->taskno));

			// bind new values
			$stmt->bindParam(":title", $this->title);
			$stmt->bindParam(":xdesc", $this->xdesc);
			$stmt->bindParam(":stat_id", $this->stat_id);
			$stmt->bindParam(":notes", $this->notes);
			$stmt->bindParam(":remarks", $this->remarks);
			$stmt->bindParam(":date_modified", $this->date_modified);
			$stmt->bindParam(":date_completed", $this->date_completed);
			$stmt->bindParam(":created_by", $this->created_by);
			$stmt->bindParam(":verified_by", $this->verified_by);
			$stmt->bindParam(":completed_by", $this->completed_by);
			$stmt->bindParam(":due_date", $this->due_date);
			$stmt->bindParam(":date_time_remain", $this->date_time_remain);
			$stmt->bindParam(':taskno', $this->taskno);

			// execute the query
			if($stmt->execute()) {
				return true;
			}

			return false;
		}

		// delete the task
		function delete(){
			// delete query
			$query = "DELETE FROM " . $this->tbl_task . " WHERE taskno = ?";

			// prepare query
			$stmt = $this->dbcnn->prepare($query);

			// sanitize
			$this->taskno=htmlspecialchars(strip_tags($this->taskno));

			// bind taskno of record to delete
			$stmt->bindParam(1, $this->taskno);

			// execute query
			if($stmt->execute()) {
				return true;
			}

			return false;
		}

	}
