<?php
session_start();
?>
<html>
<head>
	<title>2CanArt</title>
        <script src="./js/jquery.js"></script>
        <script src="./js/dropDown.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="colorStyle.css">
	<link rel="stylesheet" type="text/css" href="sizeStyle.css">
	<div id="nav">	
		<div id="navbar">	
			<div id="logoslide">
				<div id="aboutslide">
				</div>
				<h1 class="mainlogo"><i>2CanArt</i></h1>
			</div>
			<div id="navbara">
				<ul>
					<li><a class="nava" href="#">Contact</a></li>
					<li><a class="nava" href="#">About</a></li>
<?php				
if (!$_SESSION['username']) {
	echo "<li><a class=\"nava\" href=\"upload.php\">Login</a></li>";
} else {
	echo "<ul><li><a class=\"nava\" id=\"dropdown\" href=\"choseimg.php\">Upload</a>";
	echo "<ul><li><a href=\"logout.php\" class=\"logout\">Logout</a></li</ul></li>";
}
?>					<li><a class="nava" href="index.php">Home</a></li>
				</ul>
			</div>
		</div>
	</div>
</head>
