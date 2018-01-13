<?php
require ('init.php');
$file = $_GET['name'];
$pseudo = ($_SESSION['pseudo']);
$dir = 'files/' . $pseudo . '/';
$newName = $_GET['newName'];
rename($dir.$file, $dir.$newName);
header('Location: checkFiles.php#');
