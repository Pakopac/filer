<?php
require ('init.php');
$title = "MyFiles";

ob_start();
?>

<?php
$content = ob_get_contents();
ob_end_clean();
require ('layout.php');