<?php

require_once("controller/usercontroller.php");
require_once("controller/navigationController.php");
require_once("controller/productController.php");

$products = new ProductController();

if (isset($_GET["product"]) && $_GET["product"] == "create") {
    $products->create_product();
} else if (isset($_GET["nav"]) && $_GET["nav"] == "products") {
    navigationController::products();
} else if (isset($_GET["nav"]) && $_GET["nav"] == "clients") {
    navigationController::clients();
} else if (isset($_GET["flag"]) && $_GET["flag"] == "signup") {
    userController::showSignupView();
} elseif (isset($_POST["flag"]) && $_POST["flag"] == "create") {
    userController::createUser();
} elseif (isset($_POST["flag"]) && $_POST["flag"] == "login") {
    userController::loginUser();
} elseif (isset($_GET["flag"]) && $_GET["flag"] == "close") {
    userController::closeSession();
} else {
    userController::showLoginView();
}
