<?php
require_once("controller/customercontroller.php");
require_once("controller/productcontroller.php");
require_once("controller/currencycontroller.php");
require_once("controller/suppliercontroller.php");

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

    static function dashboard(){
        session_start();
        require_once("./view/login.php");
    }

    static function currency(){
        $currency = new CurrencyController();
        $currency->showCurrencyView();        
        session_start();
        require_once("./view/login.php");
    }

    static function supplier(){
        $supplier =  new SupplierController();
        session_start();
        $supplier->showSupplierView();
        
        require_once("./view/login.php");
    }
}
