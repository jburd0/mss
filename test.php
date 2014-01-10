<?php
$file = "./users/john/username";
$pass = "rnelson";

$fh = fopen($file, "w");
fwrite($fh, $pass);
fclose($fh);
echo $pass;
?>
