<?php
include "header.php";
?>
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
                                foreach (array_combine($delImg, $delCaption) as $img => $caption) {
                                        echo "$img $caption <br/>";
                                        $filedata= file_get_contents($file);
                                        //get line to delete out of ./items/images.php
                                        $line  = "<div id=\"imgHold\"><img class=\"mainimgads\"  src=\"$img\" alt=\"Image preview\" title=\"$caption\"></div>";
                                        //replace $line and replace with \n
                                        $filedata = str_replace($line, "\n", $filedata);
                                        //delete blank lines
                                        $filedata = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $filedata);
                                        //write $filedata to ./items/images.php
                                        file_put_contents($file, $filedata);
                                        unlink($img);
                                        
                                }
                                ?>

<?php
include "footer.php";
?>
