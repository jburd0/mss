<?php
session_start();
ob_start();
include "header.php";
?>
<script src="./js/status.js"></script>
<script src="./js/tabs.js"></script>
<script src="./js/showUpload.js"></script>
<!--<script src="./js/passwordCheck.js"></script>-->
<?php
if(!$_SESSION['username']) {
	header("Location: upload.php");
} else {
	$postusername = $_SESSION['username'];
}
?>
<body>
	<div id="conholder">
		<div id="uploadbox">
			<div id="adminMenu">
				<ul class="adminul">
					<li class="adminli"><a href="#tabUpload" class="admina" tabIndex="1">Upload Image</a></li>
					<li class="adminli"><a href="#tabDelete" class="admina" tabIndex="2">Delete Image </a></li>
					<li class="adminli"><a href="#tabSettings" class="admina" tabIndex="3">User Settings</a></li>
				</ul>
			</div>
			<div id="tabUpload" class="tabs">
                                <h4 class="texth4"><?php echo $uploadstatus; ?></h4>
                                <form class="adform" method="POST" action="<?php $_SERVER['SELF_PHP']; ?>" enctype="multipart/form-data">
					<h1 class="texth1">Choose File</h1>
					<input class="imginput" type="file" multiple value="Choose File" name="file" onchange="readURL(this);"><br />
					<img id="previewImg" src="#" alt="your image"  onError="this.onerror=null;this.src='./items/noimage.png';"/><br />
					<input class="captionInput" type="textarea" placeholder="Caption" name="caption"><br />
					<div id="submitHold"><input class="adsubmit" type="submit" value="Upload"></div>
                                </form>
        	        	<?php
				$captionText = $_POST['caption']; 
				$filen = $_FILES['file']['name'];
				$filet = $_FILES['file']['type'];
				$files = $_FILES['file']['size'];
				$filetmp = $_FILES['file']['tmp_name'];
				$extention = strtolower(substr($filen, strpos($filen, '.') +1));
				$timestamp =  date('YmdHis');
				$maxsize = 5000000;
				if (isset($filen)) {
					if (!empty($filen)) {
						if (($extention =='jpg' || $extention == 'png' || $extention == 'jpeg' ) && ($files <= $maxsize)) {
							$location = "./items/";
							//move and rename image to server
							$file = "./items/images.php";
							move_uploaded_file($filetmp, $location."$timestamp.$extention");
							//write image information to /items/info.php
							$filecon = "<div id=\"imgHold\"><img class=\"mainimgads\"  src=\"./items/$timestamp.$extention\" alt=\"Image preview\" title=\"$captionText\"></div>\n";
							//read /items/info.php
							$filecon .= file_get_contents($file);
							//write $filecon to ./items/images.php
							file_put_contents($file, $filecon);
							$status = "<div id=\"status\">File uploaded.</div>";
						} else {
							$uploadstatus = "<font color='red'>File must be under 5mb</font>";
							$status = "<div id=\"status\">Problem uploading file please try another.</div>";
						}
					}
				} else {
					$uploadstatus = "";
				}
				?>        
			</div>
			<div id="tabDelete" class="tabs">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
					<input type="hidden" name="image">
					<div id="deleteImg">
						<?php
						include "./items/images.php";
						?>
					</div>
					<script src="./js/imageSelect.js"></script>
					<div id="selected">
					</div>
                                        <input class="adsubmit" type="submit" value="Delete">
				</form>
				<?php
				$delImg = $_POST['img'];
				$delCaption = $_POST['cap'];
				$file = "./items/images.php";
				error_reporting(E_ERROR | E_PARSE);
				foreach (array_combine($delImg, $delCaption) as $img => $caption) {	
					$filedata = file_get_contents($file);
					//get line to delete out of ./items/images.php
					$line  = "<div id=\"imgHold\"><img class=\"mainimgads\"  src=\"$img\" alt=\"Image preview\" title=\"$caption\"></div>";
					//replace $line and replace with \n
					$filedata = str_replace($line, "\n", $filedata);
					//delete blank lines
					$filedata = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $filedata);
					//write $filedata to ./items/images.php
					file_put_contents($file, $filedata);
					//delete image off server 
					unlink($img);
					$status = "<div id=\"status\">File(s) deleted.</div>";
				}
				?>
			</div>
			<div id="tabSettings" class="tabs">
				<form class="passwordForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
					<h1 class="texth1">Settings for <?php echo $postusername; ?></h1>
					<?php echo $passwordChange; ?>
					<input class="captionInput" type="password" name="oldp" placeholder="Old Password"><br />
					<input class="captionInput" type="password" name="newp" placeholder="New Password"><br />
					<input class="captionInput" type="password" name="newpconfirm" placeholder="Retype New Password"><br />
					<input class="adsubmit" type="submit" value="Submit">
				</form>
				<?php
				$oldp = $_POST['oldp'];
				$newp = $_POST['newp'];
				$newpconfirm = $_POST['newpconfirm'];
				$oldpassword = md5($oldp);
				include_once "logininfo.php";
				//$password is from logininfo.php
				if ($oldpassword == $password) {
					if($newp == $newpconfirm) {
						$file = "./users/$postusername/password";
						$fh = fopen($file, 'w');
						fwrite($fh, md5($newp));
						fclose($fh);
						$passwordChange = "<p class=\"loginStatus\">Password changed</p>";
						session_destroy();
					} else {
					}
				} else {
					$passwordChange = "<p class=\"loginStatus\">Old password did not match.</p>";
				}
				?>
			</div>
		</div>
	</div>	
<?php
echo $status;
include "footer.php";
?>
