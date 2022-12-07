<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php 
require_once 'views/partials/title-meta.php';
require_once 'process/login_query.php'
    ?>
<body>
	<div id="login-box">
	<div class="left-box">
		<h1> Login </h1>
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
        <form method="post">
		<input type="email" name="email" placeholder="Email"/>
		<input type="password" name="password" placeholder="Password"/>
		<button name="login" type="submit" >Login</button>
        </form>
        <a href="views/general/register.php">Belum memiliki akun?</a>
	</div>

	<div class="right-box">
		<span class="signinwith"> Login Menggunakan<br/>Media Sosial</span>
		<button class="social facebook"> Login menggunakan Facebook </button>
		<button class="social twitter"> Login menggunakan Twitter </button>
		<button class="social google"> Login menggunakan Google+ </button>
	</div>
</div>
<?php 
require_once 'views/partials/footer.php'
?>
</body>
