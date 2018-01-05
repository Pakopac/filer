<?php
require ('init.php');
$id = $_GET['id'];
$title = "MyFiles";

ob_start();
$result = mysqli_query($link, 'SELECT * FROM files WHERE id='.$id);
$file = mysqli_fetch_assoc($result);
?>
    <div class="link"><a href="uploadFiles.php">Click here to upload a file</a></div>
    <div><?= $file['name'] ?></div>
<?php
$content = ob_get_contents();
ob_end_clean();
require ('layout.php');