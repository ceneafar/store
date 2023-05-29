<?php

require_once("controller/usercontroller.php");
require_once("controller/navigationController.php");
require_once("controller/productcontroller.php");
require_once("controller/customercontroller.php");

$product = new ProductController();
$customer = new CustomerController();

if (isset($_GET["product"]) && $_GET["product"] == "createProduct") {
    $product->createProduct();
} else if (isset($_GET["customer"]) && $_GET["customer"] == "createCustomer") {
    $customer->createCustomer();
} else if (isset($_GET["nav"]) && $_GET["nav"] == "products") {
    navigationController::product();
} else if (isset($_GET["nav"]) && $_GET["nav"] == "clients") {
    navigationController::customer();
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
