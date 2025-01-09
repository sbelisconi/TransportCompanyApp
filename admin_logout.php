<?php
session_start();
require_once "classes/Superadmin.php";

$ad = new Admin;
$ad->admin_logout();
header("location:admin_login.php");
exit;

?>