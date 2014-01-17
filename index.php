<?php
include "header.php";
?>
<body>
	<div id="conholder">
		<div id="conmain">
			<div id="maincontent">
				<div id="adblock">
				<?php
				//include only first 16 lines of ./items/images.php
				$array = file('./items/images.php');
				for ($x = 0; $x < 16; $x++) {
					echo $array[$x];
				}
				//make empty boxes for images
				$file = "./items/images.php";
				$lineCount = count(file($file));
				if($lineCount[1] == '') {
					$lineCount--;
				}
				if ($lineCount <= 15) {		
					$blankImg = $lineCount;
					for ($x = $blankImg; $x < 16; $x++) {
						echo "<div id=\"imgHold\"><img class=\"mainimgads\" src=\"./items/noimage.png\" title=\"\"></div> ";
					}
				}
				?>		
				</div>
				<div id="mainadtext">
					<h1 class="adtexth1">Welcome</h1>
					<h4 class="adtexth4">
						Click on an image on the left to display a larger image with info.
					</h4>
					<div id="photo"></div>
        				</div>
				</div>
			</div>
		</div>
		<div id="consub">
			<p id="subcontent">
			</p>
			<p id="subcontent">
			</p>
			<p id="subcontent">
			</p>
		</div>
	</div>
</body>
<style type="text/css">
#photo{
	padding-top: 50px;
	position: relative;
}
#photo img {
        margin: auto;
	position: absolute;
	width: 440px;
	height:  340px;
	border: 2px solid #a4a4a4;
}
</style>
<script src="./js/imagePreview.js"></script>
<?php
include "footer.php";
?>
