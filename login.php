<?php
require ('init.php');
$title = "Login";
?>

<?php
$content = ob_get_contents();
ob_end_clean();
require ('layout.php');
