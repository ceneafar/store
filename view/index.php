<?php
require_once("layouts/header.php");
?>

<form method="post">
    <input type="text" name="username" placeholder="username">
    <input type="text" name="password" placeholder="password">
    <input type="submit" name="flag" value="login">
</form>

<a href="index.php?flag=signup">sign up</a>

<?php
require_once("layouts/footer.php");
?>