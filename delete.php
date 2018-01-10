<?php
require ('init.php');
    $file = $_GET['name'];
    $pseudo = ($_SESSION['pseudo']);
    $dir = 'files/' . $pseudo . '/';
    unlink($dir.$file);
header('Location: checkFiles.php');
