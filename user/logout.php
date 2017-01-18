<?php
session_start();

session_destroy();

$user = [];

header('Location: ../index.php');
?>
