<?php
require_once("layouts/header.php");
?>

<form method="post" class="form">
    <h1>log in</h1>
    <input class="input" type="text" name="username" placeholder="username">
    <input class="input" type="password" name="password" placeholder="password">
    <?php
    if (isset($_COOKIE["message"])) {
        echo "<span>" . $_COOKIE["message"] . "</span>";
        setcookie("message", "", -1);
    }
    ?>
    <input class="buttons" type="submit" name="flag" value="login">
    <a class="buttons" href="index.php?flag=signup">sign up</a>
</form>

<?php
require_once("layouts/footer.php");
?>