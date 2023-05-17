<?php

require_once("controller/index.php");
require_once("controller/navigation.php");
require_once("controller/productsController.php");

$products = new ProductsController();

if (isset($_GET["product"]) && $_GET["product"] == "create") {
    $products->create_product();
} else if (isset($_GET["nav"]) && $_GET["nav"] == "prop1") {
    navigation::prop1();
} else if (isset($_GET["nav"]) && $_GET["nav"] == "prop2") {
    navigation::prop2();
} else if (isset($_GET["flag"]) && $_GET["flag"] == "signup") {
    controller::signup();
} elseif (isset($_POST["flag"]) && $_POST["flag"] == "create") {
    controller::create();
} elseif (isset($_POST["flag"]) && $_POST["flag"] == "login") {
    controller::login();
} elseif (isset($_GET["flag"]) && $_GET["flag"] == "close") {
    controller::close();
} else {
    controller::index();
}
