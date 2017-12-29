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
    <div class="messageUpload">Upload your files here :</div>
    <label for="file" class="labelFile"><img class="spear" src="img/spear.jpg"><img class="icon_file" src="img/icon_file.png"></label>
    <input type="file" id="file" class="inputFile">
<?php endif; ?>
<?php
$content = ob_get_contents();
ob_end_clean();

require('layout.php');

