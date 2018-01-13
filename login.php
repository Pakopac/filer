<?php
require('init.php');
if (isset($_SESSION['pseudo'])){
    header("Location: index.php");
}
$pseudo = '';
$password = '';
$error = '';
if (!empty($_POST['pseudo']) && !empty($_POST['password'])){
    $pseudo = htmlentities($_POST['pseudo']);
    $password = $_POST['password'];

    $q = "SELECT * FROM users WHERE password = '". $password . "' AND pseudo = '" . $pseudo . "'";
    $result = mysqli_query($link, $q);
    $user = mysqli_fetch_assoc($result);

    if ($user === NULL)
    {
        $error = 'invalid pseudo or password';
    }
    else
    {
        session_start();
        $_SESSION['id'] = $user['id'];
        $_SESSION['pseudo'] = $user['pseudo'];

        header('Location: index.php');
        exit();
    }
}

$title = "Login";

ob_start();
?>
<div class="block_register">
    <form action="login.php" method="POST">
    <ul>
        <li><h2 class="title-login">Login</h2></li>

        <li><label for="pseudo">Pseudo :</label>
            <input type="text" id="pseudo" name="pseudo" value="<?= $pseudo ?>">

        <li><label for="password">Password :</label>
            <input type="password" id="password" name="password" value="<?= $password?>">

        <li><button class="btnForm">Login</button></li>
        <li class="errorLogin"><?= $error ?></li>
    </ul>
</form>
</div>

<?php
$content = ob_get_contents();
ob_end_clean();
require ('layout.php');
