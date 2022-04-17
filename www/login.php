<?php

require "includes/init.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = require "includes/db.php";

    if(User::authenticate($conn, $_POST['username'], $_POST['password'])) {
        Auth::login();

        Url::redirect('/');
    } else {
        $error = "login incorrect";
    }
}

?>
<?php require "includes/header.php"; ?>

    <h2>Login</h2>

    <?php if(!empty($error)): ?>
        <p><?= $error ?></p>
    <?php endif ?>

    <form method="post">
        <div class="form-group">
            <label>Username<input class="form-control" name="username"></label><br>
        </div>
        <div class="form-group">
            <label>Password<input class="form-control" name="password"></label><br>
        </div>
        <button class="btn">Log in</button>
    </form>

<?php require "includes/footer.php"; ?>
