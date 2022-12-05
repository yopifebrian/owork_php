<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once 'views/partials/title-meta.php';
require_once 'process/login_query.php'
    ?>

<body>
    <h3>Login to account</h3>
    <p>Selamat datang di o-work</p>
    <?php if (isset($_SESSION['message'])): ?>
    <div class="alert alert-<?php echo $_SESSION['message']['alert'] ?> msg">
        <?php echo $_SESSION['message']['text'] ?>
    </div>
    <script>
        (function () {
            // removing the message 3 seconds after the page load
            setTimeout(function () {
                document.querySelector('.msg').remove();
            }, 3000)
        })();
    </script>
    <?php
    endif;
    // clearing the message
    unset($_SESSION['message']);
    ?>
    <form method="POST">
        <input type="email" name="email" placeholder="Enter your email" required><br>
        <input type="password" name="password" placeholder="Password" required> <br>
        <button name="login" type="submit">Sign In</button>
    </form>
    <br>
    <a href="<?php echo $_SERVER['REQUEST_URI']?>/views/general/register.php">Register new account</a>
    <br><br>
    <?php
    include 'views/partials/footer.php'
    ?>
</body>
