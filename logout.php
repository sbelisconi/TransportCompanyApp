<?php
session_start();
require_once "classes/User.php";

$us = new User;
$us->user_logout();
header("location:index.php");
exit;

?>