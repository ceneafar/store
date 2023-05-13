<?php
require_once("layouts/header.php");

if (!isset($_SESSION["username"])) {
    header("location:/store");
}
?>

<div class="container">
    <div class='bar'>
        <ul class='sub-bar'>
            <a href="#">
                <li>@<?php echo $_SESSION['username']; ?></li>
            </a>
            <a href="#">
                <li>profile</li>
            </a>
            <a href="index.php?flag=close">
                <li>log out</li>
            </a>
        </ul>
    </div>

    <nav class="menu">
        <ul>
            <a href="#">
                <li>prop1</li>
            </a>
            <a href="#">
                <li>prop2</li>
            </a>
            <a href="#">
                <li>prop3</li>
            </a>
            <a href="#">
                <li>prop4</li>
            </a>
        </ul>
    </nav>
</div>

<?php
require_once("layouts/footer.php");
?>