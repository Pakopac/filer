<?php
require('init.php');

$title = "Home";
if (!isset($_SESSION['pseudo'])) {
    header("Location: index.php");
}
if (isset($_SESSION['pseudo'])):
$pseudo = ($_SESSION['pseudo']);
ob_start();
?>
    <div class="link"><a href="checkFiles.php">Click here to check your files</a></div>
    <div class="messageUpload">Upload your files here :</div>
    <form name="upload" method="POST" action="uploadFiles.php" enctype="multipart/form-data">
    <label for="file" class="labelFile"><img class="spear" src="img/spear.png"><img class="icon_file" src="img/icon_file.png"></label>
    <input type="file" id="file" name="inputFile" class="inputFile" onchange="this.form.submit();">
    </form>

<?php
if(isset($_FILES['inputFile'])) {
    $uploaddir = 'files/'.$pseudo.'/';
    $file = basename($_FILES['inputFile']['name']);
    if(move_uploaded_file($_FILES['inputFile']['tmp_name'], $uploaddir . $file))
    {
        echo 'File send !';
    }
    else
    {
        echo 'File not send !';
    }
}

endif;
    $content = ob_get_contents();
    ob_end_clean();

require('layout.php');