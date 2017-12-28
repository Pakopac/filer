<?php
require('init.php');

$title = "Home";

ob_start();
?>
 <?php if (!isset($_SESSION['pseudo'])): ?>
    <link rel="stylesheet" href="styles.css">
    <div class="messageWelcome">Welcome to this site</div>
        <div class="messageNotLogged">You need to logged in to upload and access at your files</div>
 <?php endif; ?>
<?php
$content = ob_get_contents();
ob_end_clean();

require('layout.php');

