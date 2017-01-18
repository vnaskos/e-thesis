<?php 

require_once('configuration.php');
require_once('user/session.php');
require_once('classes/include.php');
require_once('functions.php');

$action	= isset($_GET['action']) ? $_GET['action'] : false;
$pid	= isset($_GET['pid']) ? $_GET['pid'] : null;

if($action == false) {
	redirect('index.php');
	return;
}

switch($action) {
	case 'new':
		redirect('edit_project.php');
		break;
	case 'edit':
		if($pid == null) { redirect('projects.php'); }
		redirect('edit_project.php?pid='.$pid);
		break;
	case 'delete':
		if($pid == null) { redirect('index.php'); }
		$project = Project::delete($pid);
		redirect('projects.php');
		break;
	case 'apply':
		$uid = $user['id'];
		Application::createApplication($uid, $pid);
		
		$project = Project::getProject($pid);
		$student = User::getUser($uid);
		Notification::createNotification($project->getProfId(), 
				sprintf('Student (%s) applied to project (%s)',
						$student->getFullName(), $project->getTitle()));
		
		redirect('applications.php');
		break;
	default:
		redirect('projects.php');
}
