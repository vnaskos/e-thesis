<?php
session_start();

if(isset($_SESSION['user'])) {
	$user = $_SESSION['user'];
	$authenticated = true;
} else {
	$authenticated = false;
}
?>
