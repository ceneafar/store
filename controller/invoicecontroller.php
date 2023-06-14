<?php
require_once('model/invoice.php');
require_once('view/invoiceview.php');

class InvoiceController
{
    private $invoiceModel;
    private $invoiceView;

    public function __construct()
    {
        $this->invoiceModel = new Invoice();
        $this->invoiceView = new InvoiceView();
    }

    public function showInvoiceForm()
    {
        $customerList = $this->invoiceModel->getCustomerList();
        $productList = $this->invoiceModel->getProductList();
        $this->invoiceView->showInvoiceForm($customerList, $productList);
    }

    public function showAddProductForm()
    {
        session_start();
        $productList = $this->invoiceModel->getProductList();
        $this->invoiceView->showAddProductForm($productList);
        require_once("./view/login.php");
    }

    public function showAddPaymentForm()
    {
        $this->invoiceView->showAddPaymentForm();
        session_start();
        require_once("./view/login.php");
    }

    public function addProduct()
    {
        session_start();
        $productInvoice = $_POST['productInvoice'];
        $productInvoiceQuantity = $_POST['productInvoiceQuantity'];
        $productName = $this->invoiceModel->getProduct($productInvoice);
        $price = $this->invoiceModel->getProductPrice($productInvoice);

        $productInvoiceArr = array();
        $productInvoiceQuantityArr = array();
        $productNameArr = array();
        $productPriceArr = array();

        if (isset($_COOKIE['productsId']) && isset($_COOKIE['productsQuantity'])) {
            $productInvoiceArr = explode(",", $_COOKIE['productsId']);
            $productInvoiceQuantityArr = explode(",", $_COOKIE['productsQuantity']);
            $productNameArr = explode(",", $_COOKIE['productName']);
            $productPriceArr = explode(",", $_COOKIE['priceProduct']);
        }

        array_push($productInvoiceArr, $productInvoice);
        array_push($productInvoiceQuantityArr, $productInvoiceQuantity);
        array_push($productNameArr, $productName);
        array_push($productPriceArr, $price);

        setcookie("productsId", implode(",", $productInvoiceArr));
        setcookie("productsQuantity", implode(",", $productInvoiceQuantityArr));
        setcookie("productName", implode(",", $productNameArr));
        setcookie("priceProduct", implode(",", $productPriceArr));


        header("Location: /store/index.php?nav=invoice");
    }
}
