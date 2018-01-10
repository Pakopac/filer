<script src="script.js"></script>
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
            echo '<li class="file"><a name="nameFile" class="nameFile" href="files/'.$pseudo.'/'.$file.'" download>' . $file . '</a>
            <a href="#pop-up"><img class="icon_edit" src="img/icon_edit.png"></a>
            <img class="icon_delete" src="img/icon_delete.png">
        </li>
        <div id="pop-up">
    <div class="popUp">
        <ul>
            <li class="exitPopup"><a href="#">X</a></li>
            <li class="edit">Change the File name</li>
            <li><input class="inputEdit" type="text" value="'.$file.'"></li>
            <li><a href="#"><button class="btnForm" id="btnEdit">Enter</button></a></li>
        </ul>
    </div>
</div>';
        }

        }
        echo '</ul>';
    }
$content = ob_get_contents();
ob_end_clean();
require ('layout.php');