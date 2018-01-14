<?php
require ('init.php');
$title = "MyFiles";

if (!isset($_SESSION['pseudo'])) {
    header("Location: index.php");
}

if (isset($_SESSION['pseudo'])):?>
    <?php $pseudo = ($_SESSION['pseudo']);
    if (isset($_POST['newName'])) {
        $rename = $_POST['newName'] ;
    };
    if (isset($_GET['name'])){
        $fileName = $_GET['name'];
        };
    if (isset($rename)){
        $file = $fileName;
        header("Location: rename.php?name=$file&newName=$rename");
    }
    ob_start();
    ?>

        <div class="link"><a href="uploadFiles.php">Click here to upload a file</a></div>
    <?php if ($dir = opendir('files/' . $pseudo . '')): ?>
        <?php while (false !== ($file = readdir($dir))): ?>
            <?php if ($file != '.' && $file != '..'):?>

                <ul>
                <li class="file"><a class="nameFile" href="files/<?= $pseudo ?>/<?= $file?>" download><?= $file ?></a>
                    <a href="?name=<?= $file?>#pop-up"><img class="icon_edit" src="img/icon_edit.png" alt="icon edit"></a>
                    <a href=" delete.php?name=<?= $file ?>"> <img class="icon_delete" src="img/icon_delete.png" alt="icon delete"></a>
                </li>
                </ul>

                <div id="pop-up">
                    <div class="popUp">
                            <form method="POST">
                                <ul>
                                    <li class="exitPopup"><a href="#">X</a></li>
                                    <li class="edit">Change the File name</li>
                                    <li><input type="text" name="newName" class="inputEdit" value="<?=$fileName?>"></li>
                                    <li><a href="#"><button class="btnForm" id="btnEdit">Enter</button></a></li>
                                    <li><img src="img/icon_danger.png" class="icon_danger" alt="icon danger"><div class="ext">Dont change the extension</div></li>
                                </ul>
                            </form>
                    </div>
                </div>

            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>
<?php endif;

$content = ob_get_contents();
ob_end_clean();
require ('layout.php');