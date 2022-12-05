<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once __ROOT__ . '/partials/title-meta.php';
require_once "../../process/register_query.php";
?>

<body>
  <form method="POST">
    <input type="email" name="email" placeholder="Email" required />
    <br />
    <input type="password" name="password" placeholder="Password" required />
    <br />
    <input type="radio" name="role" id="role" value="Seeker"><label for="role">Pencari Kerja</label>
    <input type="radio" name="role" id="role" value="Company"><label for="role">Perusahaan</label><br>
    <button name="register" value="Register">Register</button>
  </form>
</body>