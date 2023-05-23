<?php
require_once("layouts/header.php");
?>

<form method="post" class="form">
    <h1>log in</h1>
    <input class="input" type="text" name="username" placeholder="username">
    <input id='pass' class="input" type="password" name="password" placeholder="password">
    <label for="checkbox1"><input type="checkbox" id="checkbox1" onclick="showPass()">show</label>
    <?php
    if (isset($_COOKIE["message"])) {
        echo "<span>" . $_COOKIE["message"] . "</span>";
        setcookie("message", "", -1);
    }
    ?>
    <input class="buttons" type="submit" name="flag" value="login">
    <a class="buttons" href="index.php?flag=signup">sign up</a>
</form>

<script>
    function showPass() {
        let element = document.getElementById('pass');
        element.type == "password" ? element.type = "text" : element.type = "password";
    }
</script>

<?php
require_once("layouts/footer.php");
?>