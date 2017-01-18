<?php

require_once('configuration.php');
require_once('user/session.php');
require_once('classes/include.php');
require_once('functions.php');

//Check for unauthorized access
if($_SERVER['REQUEST_METHOD'] !== 'POST') {
	echo '{"msg": "You are not allowed here!"}';
	return;
}


$file = $_FILES['file'];
$uid = $user['id'];

$target_dir = ETH_CONF_UPLOAD_DIR;
$target_file = $target_dir . date('YmdHis') . '_' . basename($file["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

//Check if file was provided
if(empty($file["tmp_name"])) {
	echo '{"msg": "No file selected"}';
	return;
}

// Check if file already exists
if (file_exists($target_file)) {
	echo '{"msg": "Sorry, file already exists"}';
	return;
}

// Check file size (max 5mb)
if ($file["size"] > 5000000) {
	echo '{"msg": "Sorry, your file is too large"}';
	return;
}

// Allow certain file formats
if(strtolower($imageFileType) != 'jpg'
		&& $imageFileType != 'png'
		&& $imageFileType != 'jpeg'
		&& $imageFileType != 'gif'
		&& $imageFileType != 'pdf') {
	echo '{"msg": "Sorry, only JPG, JPEG, PNG, GIF & PDF files are allowed"}';
	return;
}

//Try to upload
if (!move_uploaded_file($file["tmp_name"], $target_file)) {
	echo '{"msg": "Sorry, there was an error uploading your file"}';
	return;
}

$conn = DBHelper::getDBO();

$query = 'INSERT INTO `upload` (`filepath`,`user_id`) VALUES (?,?)';
$stmt = $conn->prepare($query);
$stmt->bind_param('si', $target_file, $uid);
$stmt->execute();

if($stmt->error) {
	echo '{"msg": '.$stmt->error.'"}';
	return;
}

$stmt->close();
DBHelper::close();

echo '{"msg": "success"}';
