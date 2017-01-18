<?php

function redirect($url, $statusCode = 303) {
	header('Location: ' . $url, true, $statusCode);
	die();
}

function getNavBarMenu($authenticated) {
	if($authenticated):
		echo '<li><a href="profile.php">Profile</a></li>';
		echo '<li><a href="user/logout.php">Logout</a></li>';
	else:
		echo '<li><a href="login.php">Login</a></li>';
	endif;
}

function getCopyrightText() {
	echo 'Copyright 2016-17 <a href="index.php">e-thesis</a>';
}
