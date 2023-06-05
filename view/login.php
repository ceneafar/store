<?php
require_once("layouts/header.php");

if (!isset($_SESSION["username"])) {
    header("location:/store");
}
?>

<div class="container">
    <div class='bar'>
        <ul class='sub-bar'>
            <div class="space-bar">
                <a href="#">
                    <li>store</li>
                </a>
            </div>
            <div class="space-bar">
                <a href="#">
                    <li><?php echo $_SESSION['username']; ?></li>
                </a>
                <a href="#">
                    <li>profile</li>
                </a>
                <a href="index.php?flag=close">
                    <li>log out</li>
                </a>
            </div>
        </ul>
    </div>

    <nav class="menu">
        <ul>
            <a href="index.php?nav=dashboard">
                <li><i class="fa fa-bar-chart"></i> Dashboard</li>
            </a>
            <a href="index.php?nav=products">
                <li><i class="fa fa-cubes"></i> Products</li>
            </a>
            <a href="index.php?nav=customers">
                <li><i class="fa fa-group"></i> Customers</li>
            </a>
            <a href="index.php?nav=currency">
                <li><i class="fa fa-money"></i> Currency</li>
            </a>
            <a href="index.php?nav=supplier">
                <li><i class="fa fa-money"></i> Suppliers</li>
            </a>
            <a href="index.php?nav=purchase">
                <li><i class="fa fa-money"></i> Purchase</li>
            </a>
        </ul>
    </nav>


    <div id="content" class="content"></div>
</div>

<?php
require_once("layouts/footer.php");
?>