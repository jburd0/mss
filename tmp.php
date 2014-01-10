<?php
include "header.php";
?>
<body>
	<div id="conholder">
		<div id="conmain">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<input type="hidden" name="image">

<?php
include "./items/images.php";
echo "<p> $photo hey</p>";
include "footer.php";
?>
<script>
$(document).ready(function() {
        $('.mainimgads').toggle(
	function() {
                $(this).css({'border':'2px solid red'});
		var src = $(this).attr("src");
		var select = $('<input id="input" type="hidden" value="' + src + '" name="img[]">');
	        $("#selected").append(select);
        },
	function() {
		$(this).css({'border':'2px solid green'});
		$('#input').remove();
	}
	);
});
</script>
<div id="selected">
</div>
<input type="submit" value="Submit">
</form>
<?php
$delImg = $_POST['img'];
$file = "./items/images.php";
foreach($delImg as $img) {
	$filedata= file_get_contents($file);
	//get line to delete out of ./items/images.php
	$line  = "<img class=\"mainimgads\"  src=\"$img\" alt=\"Image preview\" title=\"test\">";
	//replace $line and replace with \n
	$filedata = str_replace($line, "\n", $filedata);
	//delete blank lines
	$filedata = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $filedata);
	//write $filedata to ./items/images.php
	file_put_contents($file, $filedata);
}
?>

