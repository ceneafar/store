<?php
require_once("layouts/header.php");
?>

<form action="./index.php" method="post" class="form">
    <input class="input" type="text" name="username" placeholder="username">
    <input class="input" type="text" name="password" placeholder="password">
    <input class="input" type="text" name="password2" placeholder="repeat password">
    <?php
    if (isset($_COOKIE["message"])) {
        echo "<span>" . $_COOKIE["message"] . "</span>";
        setcookie("message", "", -1);
    }
    ?>
    <input class="buttons" type="submit" name="flag" value="create">
    <a class="buttons" href="index.php">back</a>
</form>

<?php
require_once("layouts/footer.php");
?>