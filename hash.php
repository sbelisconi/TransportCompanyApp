<?php
$hashed = "1234";
$hash = password_hash($hashed, PASSWORD_DEFAULT);
echo $hash;
?>