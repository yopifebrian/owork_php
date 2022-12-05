<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once 'views/partials/title-meta.php'
    ?>

<body>
    <h3>Login to account</h3>
    <p>Access to the most powerfull tool in the entire design and web industry.</p>
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
    <form action="./process/login_query.php" method="POST">
        <input class="form-control" type="text" name="username" placeholder="username" required>
        <input class="form-control" type="password" name="password" placeholder="Password" required>
        <div class="form-button">
            <button id="submit" name="login" class="ibtn">Login</button>
        </div>
    </form>
    <br>
    <a href="/views/general/register.php">Register new account</a>
</body>

</html>