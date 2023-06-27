<?php
require_once("controller/customercontroller.php");
require_once("controller/productcontroller.php");
require_once("controller/currencycontroller.php");
require_once("controller/suppliercontroller.php");
require_once("controller/purchasecontroller.php");
require_once("controller/invoicecontroller.php");

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
        //session_start();
        $customer->showCustomers();

        require_once("./view/login.php");
    }

    static function dashboard()
    {
        session_start();
        require_once("./view/login.php");
    }

    static function currency()
    {
        
        $currency = new CurrencyController();
        $currency->showCurrencyView();
        
        require_once("./view/login.php");
    }

    static function supplier()
    {
        $supplier =  new SupplierController();
        session_start();
        $supplier->showSupplierView();

        require_once("./view/login.php");
    }

    static function purchase()
    {
        $purchase =  new PurchaseController();
        session_start();
        $purchase->showPurchaseForm();

        require_once("./view/login.php");
    }

    static function invoice(){
        session_start();
        $invoice = new InvoiceController();
        $invoice->showInvoiceForm();
        
        require_once("./view/login.php");
    }
}
