<?php
require_once("layouts/header.php");
?>

<form action="./index.php" method="post">
    <input type="text" name="username" placeholder="username">
    <input type="text" name="password" placeholder="password">
    <input type="text" name="password2" placeholder="repeat password">
    <input type="submit" name="flag" value="create">
</form>

<a href="index.php">back</a>

<?php
require_once("layouts/footer.php");
?>