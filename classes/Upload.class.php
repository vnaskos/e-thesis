<?php

class Upload {
	
	const UPLOAD_DIR = ETH_CONF_UPLOAD_DIR;
	
	protected $id;
	protected $uid;
	protected $filepath;
	
	protected function __construct($id, $uid, $filepath) {
		$this->id = $id;
		$this->uid = $uid;
		$this->filepath = $filepath;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function getUId() {
		return $this->uid;
	}
	
	public function getFilepath() {
		return $this->filepath;
	}
	
	public static function getUploadsByUser($uid) {
		$conn = DBHelper::getDBO();
		
		$query = 'SELECT `id`,`filepath` FROM `upload` WHERE `user_id` = ?';
		$stmt = $conn->prepare($query);
		$stmt->bind_param('i', $uid);
		$stmt->execute();
		$stmt->bind_result($id, $filepath);
		$stmt->store_result();
		
		$uploads = array();
		
		while($stmt->fetch()) {
			$uploads[] = new Upload($id, $uid, $filepath);
		}
		
		$stmt->close();
		DBHelper::close();
		
		return $uploads;
	}
}
