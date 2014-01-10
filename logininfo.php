<?php
$fusername = "./users/$postusername/username";
$fpassword = "./users/$postusername/password";

$username = file_get_contents($fusername);
$password = file_get_contents($fpassword);
settype($username, "string");
settype($password, "string");
?>
