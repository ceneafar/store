<?php
require_once("layouts/header.php");
?>

<form method="post" class="form">
    <input type="text" name="username" placeholder="username">
    <input type="text" name="password" placeholder="password">
    <input type="submit" name="flag" value="login">
    <a href="index.php?flag=signup">sign up</a>
</form>

<?php
require_once("layouts/footer.php");
?>