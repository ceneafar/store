<?php
require_once("layouts/header.php");
?>

<form action="./index.php" method="post" class="form">
    <h1>create account</h1>
    <input class="input" type="text" name="username" placeholder="username">
    <input class="input" id='pass1' type="password" name="password1" placeholder="password">
    <input class="input" id='pass2' type="password" name="password2" placeholder="repeat password">
    <label for="checkbox1"><input type="checkbox" id="checkbox1" onclick="showPass1()">show</label>
    <?php
    if (isset($_COOKIE["message"])) {
        echo "<span>" . $_COOKIE["message"] . "</span>";
        setcookie("message", "", -1);
    }
    ?>
    <input class="buttons" type="submit" name="flag" value="create">
    <a class="buttons" href="index.php">back</a>
</form>

<script>
    function showPass1() {
        let element = document.getElementById('pass1');
        let element2 = document.getElementById('pass2');

        element.type == "password" ? element.type = "text" : element.type = "password";
        element2.type == "password" ? element2.type = "text" : element2.type = "password";
    }
</script>

<?php
require_once("layouts/footer.php");
?>