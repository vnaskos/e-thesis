<?php

require_once('configuration.php');
require_once('user/session.php');
require_once('classes/include.php');
require_once('functions.php');

$action	= isset($_GET['action']) ? $_GET['action'] : false;
$pid	= isset($_GET['pid']) ? $_GET['pid'] : false;
$sid	= isset($_GET['sid']) ? $_GET['sid'] : null;

if($action == false || $pid == false) {
	redirect('index.php');
	return;
}

switch($action) {
	case 'accept':
		if($sid == null) { redirect('index.php'); }
		Application::chnageStatus($sid, $pid, Application::STATUS_ACCEPTED);
		
		$project = Project::getProject($pid);
		Notification::createNotification($sid,
				sprintf('Project (%s) changed status to ACCEPTED',
						$project->getTitle()));
		
		redirect('applications.php');
		break;
	case 'reject':
		if($sid == null) { redirect('index.php'); }
		Application::chnageStatus($sid, $pid, Application::STATUS_REJECTED);
		
		$project = Project::getProject($pid);
		Notification::createNotification($sid,
				sprintf('Project (%s) changed status to REJECTED',
						$project->getTitle()));
		
		redirect('applications.php');
		break;
	case 'cancel':
		$sid = $user['id'];
		if($sid == null) { redirect('index.php'); }
		Application::chnageStatus($sid, $pid, Application::STATUS_CANCELED);
		redirect('applications.php');
		break;
	case 'reopen':
		$sid = $user['id'];
		if($sid == null) { redirect('index.php'); }
		Application::chnageStatus($sid, $pid, Application::STATUS_WAITING);
		redirect('applications.php');
		break;
	default:
		redirect('applications.php');
}