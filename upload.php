<?php
ob_start();
session_start();
include "header.php";
?>
<?php
$postusername = htmlentities($_POST['username']);
$postpassword = htmlentities(md5($_POST['password']));
settype($postusername, "string");
settype($postpassword, "string");
$file = "./users/$postusername/username";

if (!$postusername || !$postpassword) {
	$loginstatus = "";
}
else {
	if (file_exists($file)) {
		require_once"logininfo.php";
		if (isset($postusername, $postpassword)) {
			if ($username == $postusername && $password == $postpassword) {
				$_SESSION['username'] = $username;
				header("Location: ./choseimg.php");
			} else {
				$loginstatus =	"<p class=\"loginStatus\">Incorrect username and/or password.</p>";
			}
		}
	} else {
		$loginstatus =	"<p class=\"loginStatus\">Incorrect username and/or password.</p>";
	}
}
?>
<body>				
<?php echo "$loginstatus"; ?>
<div id="conholder">
	<div id="loginbox">
		<div id="front">
			<h1 class="texth1">Login</h1>
			<form class="adform" method="POST" action="upload.php">
				<input class="adinput" type="text" name="username" placeholder="Username">
				<input class="adinput" type="password" name="password" placeholder="Password"></ br></ br/>
				<input type="hidden" name="usernameHidden" value="<?php echo $postusername; ?>">
				<input class="adsubmit" type="submit" value="Login">
			</form>
		</div>
	</div>		
</div>
<?php
include "footer.php";
?>
