<?php
require ('init.php');
$title = "MyFiles";

ob_start();
?>
    <div class="link"><a href="index.php">Click here to upload a file</a></div>
<?php
$content = ob_get_contents();
ob_end_clean();
require ('layout.php');