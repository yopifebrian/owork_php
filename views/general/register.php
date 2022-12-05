<?php
  require_once './views/partials/title-meta.php';
  ?>

<body>
  <form action="./process/register_query.php" method="POST">
    <input type="text" name="firstname" placeholder="First Name" required />
    <br />
    <input type="text" name="lastname" placeholder="Last Name" required />
    <br />
    <input type="text" name="username" placeholder="Username" required />
    <br />
    <input type="password" name="password" placeholder="Password" required />
    <br />
    <input type="submit" value="Register">
  </form>
</body>