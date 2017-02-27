<?php
/**
 * @author Vasilis Naskos (vnaskos[at]gmail[dot]com)
 */
class Notification {
	
	protected $id;
	protected $user_id;
	protected $text;
	protected $created_date;
	
	protected function __construct($id, $user_id, $text, $created_date) {
		$this->id = $id;
		$this->user_id = $user_id;
		$this->text = $text;
		$this->created_date = $created_date;
	}
	
	public static function getNotificationsByUser($uid) {
		$conn = DBHelper::getDBO();
		
		$query = 'SELECT `id`,`text`,`created_date` FROM `notification` WHERE `user_id` = ? ORDER BY `created_date` DESC LIMIT 25';
		$stmt = $conn->prepare($query);
		$stmt->bind_param('i', $uid);
		$stmt->execute();
		$stmt->bind_result($id, $text, $created_date);
		$stmt->store_result();
		
		$notifications = array();
		
		while($stmt->fetch()) {
			$notifications[] = new Notification($id, $uid, $text, $created_date);
		}
		
		$stmt->close();
		DBHelper::close();
		
		return $notifications;
	}
	
	public static function createNotification($uid, $text) {
		$conn = DBHelper::getDBO();
		
		$query = 'INSERT INTO `notification` (`user_id`, `text`) VALUES (?,?)';
		$stmt = $conn->prepare($query);
		$stmt->bind_param('is', $uid, $text);
		$stmt->execute();
		
		$stmt->close();
		DBHelper::close();
		
		return true;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function getText() {
		return $this->text;
	}
	
	public function getCreatedDate() {
		return $this->created_date;
	}
}
