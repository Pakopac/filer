<?php
require('init.php');
if (isset($_SESSION['pseudo'])){
    header("Location: index.php");
}
$firstname = '';
$lastname = '';
$pseudo = '';
$email = '';
$password = '';
$password_repeat = '';
$errors = [];
$regexPassword = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$^";
$regexEmail =  " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ";

if (!empty($_POST['firstname']) && !empty($_POST['lastname'])
    && !empty($_POST['pseudo']) && !empty($_POST['email'])
    && !empty($_POST['password']) && !empty($_POST['password_repeat']))
{
    $firstname = htmlentities($_POST['firstname']);
    $lastname = htmlentities($_POST['lastname']);
    $pseudo = htmlentities($_POST['pseudo']);
    $email = htmlentities($_POST['email']);
    $password = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];

    if (!preg_match($regexEmail,$email)){
        $errors[] = 'Invalid Email';
    }
    if((strlen($pseudo) < 4) || (strlen($pseudo) > 20)){
        $errors[] = 'Pseudo too short or too long';
    }
    if(!preg_match($regexPassword,$password)){
        $errors[] = 'Password must have at least 6 characters with 1 letter uppercase and 1 number';
    }
    if($password !== $password_repeat){
        $errors[] = 'Password must be identical to the verification';
    }
    $r = "SELECT pseudo FROM users";
    $resultVerif = mysqli_query($link,$r);
    while($users = mysqli_fetch_assoc($resultVerif)) {
        if ($users['pseudo'] == $pseudo) {
            $errors[] = 'Pseudo already choose';
        }
    }

    if ($errors == []) {
        $creation = date('Y-m-d H:i:s');

        $q = "INSERT INTO `users` (`id`, `creation`, `firstname`, `lastname`, `pseudo`, `email`, `password`) VALUES (NULL, '".$creation."', '".$firstname."', '".$lastname."', '".$pseudo."', '".$email."', '".$password."')";
        mysqli_query($link, $q);
        mkdir('./files/'.$pseudo);

        $p = "SELECT * FROM users WHERE password = '". $password . "' AND pseudo = '" . $pseudo . "'";
        $result = mysqli_query($link, $p);
        $user = mysqli_fetch_assoc($result);

        session_start();
        $_SESSION['id'] = $user['id'];
        $_SESSION['pseudo'] = $user['pseudo'];

        header('Location: index.php');
        exit();
    }
}

$title = "Register";

ob_start();
?>
    <div class="block_register">
        <form action="register.php" method="POST">
            <ul>
                <li class="title-form">Register</li>
                <li><label for="firstname">First name :</label>
                    <input type="text" id="firstname" name="firstname" value="<?= $firstname ?>"></li>

                <li><label for="lastname">Last name :</label>
                    <input type="text" id="lastname" name="lastname" value="<?= $lastname ?>"></li>

                <li><label for="email">Email :</label>
                    <input type="email" id="email" name="email" value="<?= $email ?>"></li>

                <li><label for="pseudo">Pseudo :</label>
                    <input type="text" id="pseudo" name="pseudo" value="<?= $pseudo ?>"></li>


                <li><label for="password">Password :</label>
                    <input type="password" id="password" name="password"></li>

                <li><label for="password_repeat">Repeat password : </label>
                    <input type="password" id="password_repeat" name="password_repeat"></li>

            <li><button class="btnForm" type="submit">Register</button></li>
                <?php if(!empty($errors)):?>
                <?php foreach ($errors as $error):?>
                    <li class="error"><?= $error ?></li>
                <?php endforeach;?>
                <?php endif; ?>
            </ul>
        </form>
    </div>
<?php
$content = ob_get_contents();
ob_end_clean();

require('layout.php');

