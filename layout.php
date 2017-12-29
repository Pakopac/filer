<!doctype html>
<html lang="en">
  <head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <div class="container">
        <header>
            <div class="titles">
                <h1>hyperFiles</h1>
                <h2>upload and share</h2>
            </div>
            <div class="login">
                <div class="col-2">
                    <?php if (isset($_SESSION['pseudo'])): ?>
                        Logged in as <?= $_SESSION['pseudo'] ?>
                    <?php else: ?>
                        Not logged in
                    <?php endif; ?>
                </div>
                <br><a href="index.php">Home</a>
            <br> <?php if (isset($_SESSION['pseudo'])): ?>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
            <?php endif; ?>
                <br><?php if (!isset($_SESSION['pseudo'])): ?>
                    <a href="register.php">Register</a>
                <?php endif; ?>
            </div>
        </header>
        </nav>
        <div class="content">
            <?php echo $content; ?>
        </div>
    </div>
  </body>
</html>
