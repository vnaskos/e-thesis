<?php

class User {
	
	const ROLE_NONE			= 0;
	const ROLE_LOGGED_IN	= 1;
	const ROLE_STUDENT		= 2;
	const ROLE_PROFESSOR	= 3;
	
	protected $id;
	protected $aem;
	protected $username;
	protected $email;
	protected $firstname;
	protected $lastname;
	protected $role;
	
	public function __construct($id, $aem, $username, $email, $firstname, $lastname, $role) {
		$this->id = $id;
		$this->aem = $aem;
		$this->username = $username;
		$this->email = $email;
		$this->firstname = $firstname;
		$this->lastname = $lastname;
		$this->role = $role;
	}
	
	public static function getUser($id) {
		if($id == null) {
			return null;
		}
		
		$conn = DBHelper::getDBO();
		
		$query = 'SELECT `aem`, `username`, `firstname`, `lastname`, `email`, `role` FROM `user` WHERE `id` = ?';
		
		$stmt = $conn->prepare($query);
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$stmt->bind_result($aem, $username, $firstname, $lastname, $email, $role);
		$stmt->store_result();
		$stmt->fetch();
		
		$user = new User($id, $aem, $username, $email, $firstname, $lastname, $role);
		
		$stmt->close();
		DBHelper::close();
		
		return $user;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function getAem() {
		return $this->aem;
	}
	
	public function getFullName() {
		return $this->firstname . ' ' . $this->lastname;
	}
	
	public function getEmail() {
		return $this->email;
	}
	
	public function getRole() {
		return $this->role;
	}
}
