<?php
include "header.php";
?>
<?php
session_start();
if(!$_SESSION['username']) {
	header("Location: upload.php");
} else {
}
?>
<style type="text/css">
#adminMenu {
	float: left;
	height:400px;
	margin: 0px;
	background-color: #CEE3F6;
	text-align: center;
}
ul.adminul {
	list-style-type: none;
	margin: 0px;
}
li.adminli {	
	text-align: center;
	padding: 50px 1px;
	border-radius: 10px 0px 0px 10px;
	border-right: 2px solid #E6E6E6;
}
li.adminli:hover {
	background-color: #fafafa;
	border-right: 2px solid #FE2E2E;
}
a.admina {
	padding: 50px 5px;
	text-decoration: none;
	color: #FA5858;
}
a.admina:hover, .active {
	font-weight: 900;
	color: #D32F2F !important;
	text-decoration: underline !important;
}
#tabDelete {
	height: 800px;
}
#tabDelete > .mainimgads {

}
</style>
<script>
$(document).ready(function() {
	$('.admina').click(function() {
		var $this = $(this);
		//hide tabs
		$('.tab').hide();
		$('.active').removeClass('active');
		$this.addClass('active');
                var tab = $this.attr('href');
		// show panel
                $(tab).show();
		return (false);
	}); // end click
	$('.adminli:first .admina').click();
}); //end ready function
</script>
<body>
	<div id="conholder">
		<div id="uploadbox">
			<div id="adminMenu">
				<ul class="adminul">
					<li class="adminli"><a href="#tabUpload" class="admina" tabIndex="1">Upload Image</a></li>
					<li class="adminli"><a href="#tabDelete" class="admina" tabIndex="2">Delete Image</a></li>
					<li class="adminli"><a href="#tabSettings" class="admina" tabIndex="3">Account Settings</a></li>
				</ul>
			</div>
			<div id="tabUpload" class="tab">
                                <h4 class="texth4"><?php echo $uploadstatus; ?></h4>
                                <form class="adform" method="POST" action="<?php $_SERVER['SELF_PHP']; ?>" enctype="multipart/form-data">
					<h1 class="texth1">Choose File</h1>
                                        <input class="imginput" type="file" name="file">
                                        <input class="adsubmit" type="submit" value="Upload">
                                </form>
        	        	<?php
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
							$filecon = "<img class=\"mainimgads\"  src=\"./items/$timestamp.$extention\" alt=\"Image preview\" title=\"test\">\n";
							//read /items/info.php
							$filecon .= file_get_contents($file);
							//write $filecon to ./items/images.php
							file_put_contents($file, $filecon);
							header("Location: index.php");
						} else {
							$uploadstatus = "<font color='red'>File must be under 5mb</font>";
						}
					}
				} else {
					$uploadstatus = "";
				}
				?>        
			</div>
			<div id="tabDelete" class="tab">
				<?php 
				include "./items/images.php";
				?>
				<p> <font color="red" size="28px">&#10003</font></p>
			</div>

		</div>
	</div>	
<?php
include "footer.php";
?>
