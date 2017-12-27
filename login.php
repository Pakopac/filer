<?php
require ('init.php');
$title = "Login";
?>
<div class="block_register">
    <form action="login.php" method="POST">
    <ul>
        <li><h2 class="title-login">Login</h2></li>
<li>Pseudo :<input type="text">
<li>Password :<input type="password">
        <li><button>Login</button></li>
    </ul>
</form>
</div>

<?php
$content = ob_get_contents();
ob_end_clean();
require ('layout.php');
