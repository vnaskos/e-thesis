<?php
require_once '../configuration.php';
require_once '../classes/include.php';
require_once 'scrape.php';

$isPost = filter_input(INPUT_POST, "action");

if (isset($isPost)):
	$username = filter_input(INPUT_POST, 'username', FILTER_DEFAULT);
	$password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
	
	if (strlen($username)==0 || strlen($password)==0) {
		echo "Please enter username and password";
		exit(1);
	}
	
	if(isUsernameExists($username)) {
		login($username, $password);
	} else {
		register($username, $password);
	}
endif;

function login($username, $password) {
	$conn = DBHelper::getDBO();
	
	$sql = "SELECT id,username,password,firstname,lastname,aem,email,role FROM user WHERE username=?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$stmt->bind_result($id,$uname,$hash,$firstname,$lastname,$aem,$email,$role);
	$stmt->store_result();
	$stmt->fetch();
	
	if($stmt->num_rows() == 0) {
		echo "Please check username";
		exit();
	}
	
	if (!password_verify($password, $hash)) {
		echo 'Please check your password';
		exit();
	}
	
	session_start();

	$user = array('id' => $id,
			'username' => $uname,
			'firstname' => $firstname,
			'lastname' => $lastname,
			'aem' => $aem,
			'email' => $email,
			'role' => $role
	);
	
	$_SESSION['user'] = $user;
	
	DBHelper::close();
	
	header('Location: ../index.php');
}

function register($username, $password) {
	$conn = DBHelper::getDBO();
	
	//Validate password
	$options = [
			'cost' => 12,
	];
	$hash = password_hash($password, PASSWORD_BCRYPT, $options);

	if (strlen($password) == 0) {
		echo "Please supply password";
		exit();
	}

	//Get validate accound and retreive user info
	$info = validateAccount($username, $password);

	$email = "";
	
	//Default user roles (2 => student) (3 => prof)
	$role = 2;

	$sql = "INSERT INTO user(username,password,firstname,lastname,aem,email,role) VALUES (?,?,?,?,?,?,?)";
	$stm = $conn->prepare($sql);
	$stm->bind_param("ssssssi", $username, $hash, $info['firstname'], $info['lastname'], $info['aem'], $email, $role);

	$result = $stm->execute();

	if ($result === true) {
		DBHelper::close();
		login($username, $password);
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		DBHelper::close();
	}
}

function isUsernameExists($username) {
	$conn = DBHelper::getDBO();

	$query = "SELECT count(*) FROM user WHERE username=?";
	$stm = $conn->prepare($query);
	$stm->bind_param("s", $username);
	$stm->execute();
	$stm->bind_result($count);
	$stm->store_result();
	$stm->fetch();
	$stm->close();
	DBHelper::close();

	return $count > 0;
}

function validateAccount($username, $password) {
	$url_egram_login = "https://egram.teicm.gr/unistudent/login.asp?userName1=$username&pwd=$password";
	$response = scrape("https://egram.teicm.gr/unistudent");
	$response = scrape($url_egram_login);

	$dom = new DOMDocument();
	@$dom->loadHTML($response);

	$xpath = new DOMXPath($dom);

	$info = array("lastname" => $xpath->evaluate("//*[@id=\"main\"]/div[2]/table/tr[2]/td[2]")->item(0)->textContent,
			"firstname" => $xpath->evaluate("//*[@id=\"main\"]/div[2]/table/tr[3]/td[2]")->item(0)->textContent,
			"aem" => $xpath->evaluate("//*[@id=\"main\"]/div[2]/table/tr[4]/td[2]")->item(0)->textContent
	);

	return $info;
}
