<?php
require_once('model/invoice.php');
require_once('view/invoiceview.php');
require_once('model/currency.php');

class InvoiceController
{
    private $invoiceModel;
    private $invoiceView;
    private $currencyModel;

    public function __construct()
    {
        $this->invoiceModel = new Invoice();
        $this->currencyModel = new Currency();
        $this->invoiceView = new InvoiceView();
    }

    public function showInvoiceForm()
    {
        $customerList = $this->invoiceModel->getCustomerList();
        $productList = $this->invoiceModel->getProductList();
        $total = $this->invoiceModel->showPaymentMethodsTotal();
        $this->invoiceView->showInvoiceForm($customerList, $productList, $total);
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
        $list = $this->currencyModel->getPaymentMethods();
        $this->invoiceView->showAddPaymentForm($list);
        require_once("./view/login.php");
    }

    public function cancelInvoice()
    {
        setcookie("productsId", "", -1);
        setcookie("productsQuantity", "", -1);
        setcookie("productName", "", -1);
        setcookie("priceProduct", "", -1);
        setcookie("totalPrice", "", -1);

        setcookie("paymentMethodId", "", -1);
        setcookie("paymantAmount", "", -1);

        header("Location: /store/index.php?nav=invoice");
    }

    public function addProduct()
    {
        session_start();
        $productInvoice = $_POST['productInvoice'];
        $productInvoiceQuantity = $_POST['productInvoiceQuantity'];
        $productName = $this->invoiceModel->getProduct($productInvoice);
        $price = $this->invoiceModel->getProductPrice($productInvoice);
        $totalPrice = floatval($productInvoiceQuantity) * floatval($price);

        $productInvoiceArr = array();
        $productInvoiceQuantityArr = array();
        $productNameArr = array();
        $productPriceArr = array();
        $totalPriceArr = array();

        if (isset($_COOKIE['productsId']) && isset($_COOKIE['productsQuantity'])) {
            $productInvoiceArr = explode(",", $_COOKIE['productsId']);
            $productInvoiceQuantityArr = explode(",", $_COOKIE['productsQuantity']);
            $productNameArr = explode(",", $_COOKIE['productName']);
            $productPriceArr = explode(",", $_COOKIE['priceProduct']);
            $totalPriceArr = explode(",", $_COOKIE['totalPrice']);
        }

        array_push($productInvoiceArr, $productInvoice);
        array_push($productInvoiceQuantityArr, $productInvoiceQuantity);
        array_push($productNameArr, $productName);
        array_push($productPriceArr, $price);
        array_push($totalPriceArr, $totalPrice);

        setcookie("productsId", implode(",", $productInvoiceArr));
        setcookie("productsQuantity", implode(",", $productInvoiceQuantityArr));
        setcookie("productName", implode(",", $productNameArr));
        setcookie("priceProduct", implode(",", $productPriceArr));
        setcookie("totalPrice", implode(",", $totalPriceArr));


        header("Location: /store/index.php?nav=invoice");
    }

    public static function showTotalPrice()
    {
        if (!isset($_COOKIE['totalPrice'])) {
            return 0.00;
        }

        $totalPriceArr = explode(",", $_COOKIE['totalPrice']);
        $totalPrice = 0.00;

        foreach ($totalPriceArr as $price) {
            $totalPrice += floatval($price);
        }

        return $totalPrice;
    }

    public function addPaymentMethod()
    {
        $this->invoiceModel->addPaymentMethod();
    }

    public function billing()
    {
        $this->invoiceModel->billing();
    }
}
