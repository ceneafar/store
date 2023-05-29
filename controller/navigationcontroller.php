<?php
require_once("controller/customercontroller.php");
require_once("controller/productcontroller.php");

class navigationController
{

    static function product()
    {
        $products = new productController();
        session_start();
        $products->showProducts();

        require_once("./view/login.php");
    }

    static function customer()
    {
        $customer = new CustomerController();
        session_start();
        $customer->showCustomers();
        
        require_once("./view/login.php");
    }
}
