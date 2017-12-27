<?php
require('init.php');
$firstname = '';
$lastname = '';
$username = '';
$email = '';
$password = '';
$password_repeat = '';
if (!empty($_POST['firstname']) && !empty($_POST['lastname'])
    && !empty($_POST['username']) && !empty($_POST['email'])
    && !empty($_POST['password']) && !empty($_POST['password_repeat']))
{
    $firstname = htmlentities($_POST['firstname']);
    $lastname = htmlentities($_POST['lastname']);
    $username = htmlentities($_POST['username']);
    $email = htmlentities($_POST['email']);
    $password = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];

    if ($password === $password_repeat)
    {
        $creation = date('Y-m-d H:i:s');

        $q = "INSERT INTO `users` (`id`, `creation`, `firstname`, `lastname`, `username`, `email`, `password`) VALUES (NULL, '".$creation."', '".$firstname."', '".$lastname."', '".$username."', '".$email."', '".$password."')";
        mysqli_query($link, $q);

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
                <h2 class="title-form">Register</h2>
                <li><label for="firstname">First name :</label>
                    <input type="text" name="firstname" id="firstname" value="<?= $firstname ?>"></li>

                <li><label for="lastname">Last name :</label>
                    <input type="text" name="lastname" id="lastname" value="<?= $lastname ?>"></li>

                <li><label for="username">Username :</label>
                    <input type="text" name="username" id="username" value="<?= $username ?>"></li>

                <li><label for="email">Email :</label>
                    <input type="email" name="email" id="email" value="<?= $email ?>"></li>

                <li><label for="password">Password :</label>
                    <input type="password" name="password" id="password"></li>

                <li><label for="password_repeat">Repeat password :</label>
                    <input type="password" name="password_repeat" id="password_repeat"></li>

            <li><button type="submit">Register</button></li>
            </ul>
        </form>
    </div>
<?php
$content = ob_get_contents();
ob_end_clean();

require('layout.php');

