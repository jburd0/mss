<?php

$pass = "fix";
$file = "./users/rnelson/password/";
$fh = fopen($file, 'w');
fwrite($fh, md5($pass));
fclose($fh);
echo $pass;

?>
