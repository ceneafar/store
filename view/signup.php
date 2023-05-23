<?php
require_once("layouts/header.php");
?>

<form action="./index.php" method="post" class="form">
    <h1>create account</h1>
    <input class="input" type="text" name="username" placeholder="username">
    <input class="input" type="password" name="password" placeholder="password">
    <input class="input" type="password" name="password2" placeholder="repeat password">
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