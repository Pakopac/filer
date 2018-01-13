<?php
require('init.php');

$title = "Home";

ob_start();
?>
    <link rel="stylesheet" href="styles.css">
 <?php if (isset($_SESSION['pseudo'])): ?>
    <div class="hello">Hello: <?= $_SESSION['pseudo']?></div>
    <br><div class="msgHome">you are on the home page there is nothing to do here but you can click on these links</div>
    <br><div class="linkHome"> <a href="uploadFiles.php">Upload your files</a>
        <br><a href="checkFiles.php">Check your files</a></div>
 <?php endif; ?>
<?php if(!isset($_SESSION['pseudo'])):?>
    <div class="messageWelcome">Welcome to this site</div>
    <div class="messageNotLogged">You need to logged in to upload and access at your files</div>
<?php endif ?>

<?php
$content = ob_get_contents();
ob_end_clean();

require('layout.php');

