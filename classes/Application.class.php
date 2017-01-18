<?php

class Application {
	
	const STATUS_WAITING	= 0;
	const STATUS_ACCEPTED	= 1;
	const STATUS_REJECTED	= 2;
	const STATUS_CANCELED	= 3;
	
	protected $student;
	protected $project;
	protected $status;
	
	protected function __construct($student_id, $project_id, $status) {
		$this->student = User::getUser($student_id);
		$this->project = Project::getProject($project_id);
		$this->status = $status;
	}
	
	public function getStudent() {
		return $this->student;
	}
	
	public function getProject() {
		return $this->project;
	}
	
	public function getStatus() {
		return $this->status;
	}
	
	public function getHumanReadableStatus() {
		switch($this->status) {
			case Application::STATUS_WAITING:
				return 'WAITING';
			case Application::STATUS_ACCEPTED:
				return 'ACCEPTED';
			case Application::STATUS_REJECTED:
				return 'REJECTED';
			case Application::STATUS_CANCELED:
				return 'CANCELED';
			default:
				return 'UNKNOWN ('.$this->status.')';
		}
	}
	
	public static function getApplicationsByProject($project_id) {
		$query = 'SELECT `student_id`,`project_id`,`status` FROM `application` WHERE project_id = ?';
		
		return self::getApplications($query, $project_id);
	}
	
	public static function getApplicationsByStudent($student_id) {
		$query = 'SELECT `student_id`,`project_id`,`status` FROM `application` WHERE student_id = ?';
		
		return self::getApplications($query, $student_id);
	}
	
	public static function getApplicationsByProfessor($prof_id) {
		$query = 'SELECT `student_id`,`project_id`, `application`.`status` FROM `application` INNER JOIN `project` ON application.project_id = project.id WHERE `prof_id` = ?';
		
		return self::getApplications($query, $prof_id);
	}
	
	protected static function getApplications($query, $param) {
		$conn = DBHelper::getDBO();
		
		$stmt = $conn->prepare($query);
		$stmt->bind_param('i', $param);
		$stmt->execute();
		$stmt->bind_result($student_id, $project_id, $status);
		$stmt->store_result();
		
		$applications = array();
		
		while($stmt->fetch()) {
			$applications[] = new Application($student_id, $project_id, $status);
		}
		
		$stmt->close();
		DBHelper::close();
		
		return $applications;
	}
	
	public static function createApplication($uid, $pid) {
		$conn = DBHelper::getDBO();
		
		$query = 'INSERT INTO `application` (`student_id`, `project_id`) VALUES (?,?)';
		$stmt = $conn->prepare($query);
		$stmt->bind_param('ii', $uid, $pid);
		$stmt->execute();
		
		$stmt->close();
		DBHelper::close();
		
		return true;
	}
	
	public static function chnageStatus($uid, $pid, $status) {
		$conn = DBHelper::getDBO();
		
		$query = 'UPDATE `application` SET `status` = ? WHERE `student_id` = ? AND `project_id` = ?';
		$stmt = $conn->prepare($query);
		$stmt->bind_param('iii', $status, $uid, $pid);
		$stmt->execute();
		
		$stmt->close();
		DBHelper::close();
		
		return true;
	}
}
