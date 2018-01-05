<?php
require ('init.php');
$title = "MyFiles";

ob_start();
?>
    <div class="link"><a href="uploadFiles.php">Click here to upload a file</a></div>
<?php
echo '<ul>';

if($dir = opendir('./files')) {
    while (false !== ($file = readdir($dir))) {
        if($file != '.' && $file != '..' && $file != 'index.php') {
            echo '<li><a class="files" href="./files/' . $file . '">' . $file . '</a></li>';
        }
        echo '</ul>';
    }
}
$content = ob_get_contents();
ob_end_clean();
require ('layout.php');