<?php

require_once('configuration.php');
require_once('user/session.php');
require_once('classes/include.php');
require_once('functions.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	echo 'You are not allowed here!';
	return;
}

$pid			= isset($_POST['pid']) ? $_POST['pid'] : null;
$title			= isset($_POST['title']) ? $_POST['title'] : false;
$description	= isset($_POST['description']) ? $_POST['description'] : false;
$status			= isset($_POST['status']) ? $_POST['status'] : false;

if(!$title || !$description || !$status) {
	echo 'Something is missing!';
	return;
}

$prof = User::getUser($user['id']);
$project = new Project($pid, $title, $description, $status, $prof);
$project->store();

redirect('projects.php');
