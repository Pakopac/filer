<?php
require ('init.php');
$title = "Login";
?>
<h2>Login</h2>
    <form action="login.php" method="POST">
    <ul>
<li>Pseudo :<input type="text">
<li>Password :<input type="password">
    </ul>
</form>

<?php
$content = ob_get_contents();
ob_end_clean();
require ('layout.php');
