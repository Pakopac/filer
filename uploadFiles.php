<?php
require('init.php');

$title = "Home";

ob_start();
?>
    <link rel="stylesheet" href="styles.css">
<?php if (!isset($_SESSION['pseudo'])): ?>
    <div class="messageWelcome">Welcome to this site</div>
    <div class="messageNotLogged">You need to logged in to upload and access at your files</div>
<?php endif; ?>
<?php if (isset($_SESSION['pseudo'])):?>
    <div class="link"><a href="checkFiles.php">Click here to check your files</a></div>
    <div class="messageUpload">Upload your files here :</div>

    <form name="upload" method="POST" action="uploadFiles.php" enctype="multipart/form-data">
    <label for="file" class="labelFile"><img class="spear" src="img/spear.png"><img class="icon_file" src="img/icon_file.png"></label>
    <input type="file" id="file" name="inputFile" class="inputFile" onchange="this.form.submit();">
    </form>

<?php
endif;
if (isset($_POST['upload']))
{
    $file = $_FILES['inputFile']['name'];
    $q = "INSERT INTO `files` (`id`, `name`) VALUES (NULL, '".$file."')";
    mysqli_query($link, $q);

    header('Location: upload.php');
    exit();
}

$content = ob_get_contents();
ob_end_clean();

require('layout.php');