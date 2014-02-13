<?php
$file = getcwd() . "./users/username/password";
$pass = md5('password');
file_put_contents($file,$pass);
?>
