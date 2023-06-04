<?php

require_once("controller/usercontroller.php");
require_once("controller/navigationController.php");
require_once("controller/productcontroller.php");
require_once("controller/customercontroller.php");
require_once("controller/suppliercontroller.php");

$product = new ProductController();
$customer = new CustomerController();
$supplier = new SupplierController();

if (isset($_GET["product"]) && $_GET["product"] == "createProduct") {
    $product->createProduct();
} else if (isset($_GET["product"]) && $_GET["product"] == "editProduct") {
    if (isset($_POST['editProductBtn'])) {
        $product->editProduct();
    } else if (isset($_POST['deleteProductBtn'])) {
        $product->deleteProduct();
    }
} else if (isset($_GET["customer"]) && $_GET["customer"] == "createCustomer") {
    $customer->createCustomer();
} else if (isset($_GET["supplier"]) && $_GET["supplier"] == "createSupplier") {
    $supplier->createSupplier();
} else if (isset($_GET["nav"])) {
    if ($_GET["nav"] == "products") {
        navigationController::product();
    } else if ($_GET["nav"] == "customers") {
        navigationController::customer();
    } else if ($_GET["nav"] == "dashboard") {
        navigationController::dashboard();
    } else if ($_GET["nav"] == "currency") {
        navigationController::currency();
    }else if ($_GET["nav"] == "supplier") {
        navigationController::supplier();
    }
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
