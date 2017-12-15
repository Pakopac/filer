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

        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="firstname">First name</label>
                <input type="text" name="firstname value="<?= $firstname ?>">
            </div>
            <div class="form-group">
                <label for="lastname">Last name</label>
                <input type="text" name="lastname" id="lastname" value="<?= $lastname ?>">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="<?= $username ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?= $email ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="password_repeat">Repeat password</label>
                <input type="password" name="password_repeat" id="password_repeat">
            </div>
            <button type="submit">Register</button>
        </form>
<?php
$content = ob_get_contents();
ob_end_clean();

require('layout.php');
