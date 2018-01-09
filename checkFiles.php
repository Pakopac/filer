<?php
require ('init.php');
$title = "MyFiles";
$pseudo = ($_SESSION['pseudo']);

ob_start();
?>
    <div class="link"><a href="uploadFiles.php">Click here to upload a file</a></div>
<?php
echo '<ul>';
if($dir = opendir('files/' . $pseudo . '')) {
    while (false !== ($file = readdir($dir))) {
        if($file != '.' && $file != '..') {
            echo '<li><a name="nameFile" class="files" href="files/'.$pseudo.'/'.$file.'" download>' . $file . '</a>
            <img class="icons" src="img/icon_edit.png">
            <img class="icons" src="img/icon_delete.png">
        </li>';
        }

        }
        echo '</ul>';
    }
$content = ob_get_contents();
ob_end_clean();
require ('layout.php');