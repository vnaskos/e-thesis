<?php

class Project {
	
	const STATUS_ACTIVE		= 1;
	const STATUS_CLOSED		= 2;
	const STATUS_ASSIGNED	= 3;
	
	protected $id;
	protected $title;
	protected $description;
	protected $status;
	protected $prof;
	protected $created_date;
	protected $modified_date;
	
	public function __construct($id, $title, $description, $status, $prof, $created_date = null, $modified_date = null) {
		$this->id = $id;
		$this->title = $title;
		$this->description = $description;
		$this->status = $status;
		$this->prof = $prof;
		$this->created_date = $created_date;
		$this->modified_date = $modified_date;
	}
	
	public static function getProject($id) {
		$conn = DBHelper::getDBO();
		
		$query = 'SELECT `id`,`title`,`description`,`prof_id`,`status`,`created_date`,`modified_date` FROM `project` WHERE `id` = ?';
		$stmt = $conn->prepare($query);
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$stmt->bind_result($id, $title, $description, $prof_id, $status, $created_date, $modified_date);
		$stmt->store_result();
		
		$stmt->fetch();
		$prof = User::getUser($prof_id);
		$project = new Project($id, $title, $description, $status, $prof, $created_date, $modified_date);
		
		$stmt->close();
		DBHelper::close();
		
		return $project;
	}
	
	public static function getProjects() {
		$conn = DBHelper::getDBO();
		
		$query = 'SELECT `id`,`title`,`description`,`prof_id`,`status`,`created_date`,`modified_date` FROM `project` ORDER BY `created_date` DESC';
		$stmt = $conn->prepare($query);
		$stmt->execute();
		$stmt->bind_result($id, $title, $description, $prof_id, $status, $created_date, $modified_date);
		$stmt->store_result();
		
		$projects = array();
		
		while($stmt->fetch()) {
			$prof = User::getUser($prof_id);
			$projects[] = new Project($id, $title, $description, $status, $prof, $created_date, $modified_date);
		}
		
		$stmt->close();
		DBHelper::close();
		
		return $projects;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function getTitle() {
		return $this->title;
	}
	
	public function getDescription() {
		return $this->description;
	}
	
	public function getProfId() {
		return $this->prof->getId();
	}
	
	public function getProfName() {
		return $this->prof->getFullName();
	}
	
	public function getProfEmail() {
		return $this->prof->getEmail();
	}
	
	public function getCreatedDate() {
		return $this->created_date;
	}
	
	public function getModifiedDate() {
		return $this->modified_date;
	}
	
	public function getStatus() {
		return $this->status;
	}
	
	public function getHumanReadableStatus() {
		switch($this->status) {
			case Project::STATUS_ACTIVE:
				return 'ACTIVE';
			case Project::STATUS_ASSIGNED:
				return 'ASSIGNED';
			case Project::STATUS_CLOSED:
				return 'CLOSED';
			default:
				return 'UNKNOWN ('.$this->status.')';
		}
	}
	
	public function store() {
		if($this->id == null) {
			$this->insert();
		} else {
			$this->update();
		}
	}
	
	public static function delete($id) {
		$conn = DBHelper::getDBO();
		
		$query = 'DELETE FROM `project` WHERE `id` = ?';
		$stmt = $conn->prepare($query);
		$stmt->bind_param('i', $id);
		$stmt->execute();
		
		if($stmt->error) {
			return $stmt->error;
		}
		
		$stmt->close();
		DBHelper::close();
		
		return true;
	}
	
	protected function insert() {
		$conn = DBHelper::getDBO();
		
		$query = 'INSERT INTO `project` (`id`,`title`,`description`,`prof_id`,`status`) VALUES (?,?,?,?,?)';
		$stmt = $conn->prepare($query);
		$stmt->bind_param('issii', $this->id, $this->title, $this->description, $this->prof->getId(), $this->status);
		$stmt->execute();
		
		if($stmt->error) {
			return $stmt->error;
		}
		
		$this->id = $stmt->insert_id;
		
		$stmt->close();
		DBHelper::close();
		
		return true;
	}
	
	protected function update() {
		$conn = DBHelper::getDBO();
		
		$query = 'UPDATE `project` SET `title` = ?, `description` = ?, `status` = ? WHERE `id` = ?';
		$stmt = $conn->prepare($query);
		var_dump($conn->error);
		$stmt->bind_param('ssii', $this->title, $this->description, $this->status, $this->id);
		$stmt->execute();
		
		if($stmt->error) {
			return $stmt->error;
		}
		
		$stmt->close();
		DBHelper::close();
		
		return true;
	}
}
