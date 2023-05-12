<?php
require_once("layouts/header.php");

if (!isset($_SESSION["username"])) {
    header("location:/store");
}

echo "<h1>welcome " . $_SESSION["username"] . "</h1>";

?>

<a href="index.php?flag=close">log out</a>

<?php
require_once("layouts/footer.php");
?>