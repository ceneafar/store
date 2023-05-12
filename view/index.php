<?php
require_once("layouts/header.php");
?>

<form method="post" class="form">
    <input class="input" type="text" name="username" placeholder="username">
    <input class="input" type="text" name="password" placeholder="password">
    <input class="buttons" type="submit" name="flag" value="login">
    <a class="buttons" href="index.php?flag=signup">sign up</a>
</form>

<?php
require_once("layouts/footer.php");
?>