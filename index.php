<?php
require('init.php');

$title = "Home";

ob_start();
$content = ob_get_contents();
ob_end_clean();

require('layout.php');